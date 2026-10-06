<?php
/**
 * Front Page Photo Carousel
 * Adds a meta box to the homepage for choosing extra hero carousel photos,
 * plus a helper that returns every photo the carousel should show.
 *
 * @package RAMCafe
 * @since 1.2.6
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Get the attachment IDs for the front page carousel.
 *
 * The featured image always comes first, followed by the photos chosen
 * in the "Homepage Photo Carousel" meta box.
 *
 * @param int $post_id The front page ID.
 * @return int[] Attachment IDs, in display order.
 */
function ramcafe_get_carousel_image_ids( $post_id ) {
    $ids = array();

    $thumbnail_id = (int) get_post_thumbnail_id( $post_id );
    if ( $thumbnail_id ) {
        $ids[] = $thumbnail_id;
    }

    $extra_ids = array_filter( array_map( 'absint', explode( ',', (string) get_post_meta( $post_id, 'ramcafe_carousel_images', true ) ) ) );
    foreach ( $extra_ids as $id ) {
        // Skip deleted attachments
        if ( wp_attachment_is_image( $id ) ) {
            $ids[] = $id;
        }
    }

    return array_values( array_unique( $ids ) );
}

/**
 * Add the carousel meta box, only on the page set as the homepage
 */
function ramcafe_add_carousel_meta_box( $post_type, $post ) {
    if ( 'page' !== $post_type || (int) get_option( 'page_on_front' ) !== (int) $post->ID ) {
        return;
    }

    add_meta_box(
        'ramcafe_carousel_images',
        'Homepage Photo Carousel',
        'ramcafe_carousel_meta_box_callback',
        'page',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'ramcafe_add_carousel_meta_box', 10, 2 );

/**
 * Meta box callback function
 */
function ramcafe_carousel_meta_box_callback( $post ) {
    // Add nonce for security
    wp_nonce_field( 'ramcafe_save_carousel_images', 'ramcafe_carousel_images_nonce' );

    $image_ids = array_filter( array_map( 'absint', explode( ',', (string) get_post_meta( $post->ID, 'ramcafe_carousel_images', true ) ) ) );
    ?>

    <style>
        .ramcafe-carousel-thumbs {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin: 10px 0;
            padding: 0;
            list-style: none;
        }
        .ramcafe-carousel-thumbs li {
            position: relative;
            width: 120px;
            height: 90px;
            margin: 0;
            cursor: move;
        }
        .ramcafe-carousel-thumbs img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 6px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.15);
        }
        .ramcafe-carousel-thumbs .ramcafe-carousel-remove {
            position: absolute;
            top: -8px;
            right: -8px;
            width: 24px;
            height: 24px;
            padding: 0;
            border: none;
            border-radius: 50%;
            background: #CE593A;
            color: #fff;
            font-size: 16px;
            line-height: 24px;
            cursor: pointer;
        }
        .ramcafe-carousel-placeholder {
            width: 120px;
            height: 90px;
            border: 2px dashed #ccc;
            border-radius: 6px;
        }
    </style>

    <p><strong>Choose extra photos to rotate through on the homepage.</strong></p>
    <p style="color: #666; font-size: 13px;">The page's Featured Image is always shown first. Drag photos to change their order. Photos are cropped to match the Featured Image's shape, so keep the subject near the center.</p>

    <input type="hidden" id="ramcafe_carousel_images" name="ramcafe_carousel_images" value="<?php echo esc_attr( implode( ',', $image_ids ) ); ?>" />

    <ul class="ramcafe-carousel-thumbs" id="ramcafe_carousel_thumbs">
        <?php foreach ( $image_ids as $id ) : ?>
            <?php $thumb_url = wp_get_attachment_image_url( $id, 'thumbnail' ); ?>
            <?php if ( $thumb_url ) : ?>
                <li data-id="<?php echo esc_attr( $id ); ?>">
                    <img src="<?php echo esc_url( $thumb_url ); ?>" alt="" />
                    <button type="button" class="ramcafe-carousel-remove" aria-label="Remove photo">&times;</button>
                </li>
            <?php endif; ?>
        <?php endforeach; ?>
    </ul>

    <button type="button" class="button" id="ramcafe_carousel_add">Add Photos</button>

    <script>
    jQuery(document).ready(function($) {
        var $input = $('#ramcafe_carousel_images');
        var $list = $('#ramcafe_carousel_thumbs');

        // Write the current thumbnail order back to the hidden field
        function syncIds() {
            var ids = $list.children('li').map(function() {
                return $(this).data('id');
            }).get();
            $input.val(ids.join(','));
        }

        $list.sortable({
            placeholder: 'ramcafe-carousel-placeholder',
            update: syncIds
        });

        $('#ramcafe_carousel_add').on('click', function(e) {
            e.preventDefault();

            var uploader = wp.media({
                title: 'Select Carousel Photos',
                button: {
                    text: 'Add to Carousel'
                },
                library: {
                    type: 'image'
                },
                multiple: true
            });

            uploader.on('select', function() {
                uploader.state().get('selection').each(function(attachment) {
                    attachment = attachment.toJSON();

                    var thumbUrl = attachment.url;
                    if (attachment.sizes && attachment.sizes.thumbnail) {
                        thumbUrl = attachment.sizes.thumbnail.url;
                    }

                    var $item = $('<li>').attr('data-id', attachment.id);
                    $('<img alt="">').attr('src', thumbUrl).appendTo($item);
                    $('<button type="button" class="ramcafe-carousel-remove" aria-label="Remove photo">&times;</button>').appendTo($item);
                    $list.append($item);
                });

                syncIds();
            });

            uploader.open();
        });

        $list.on('click', '.ramcafe-carousel-remove', function(e) {
            e.preventDefault();
            $(this).closest('li').remove();
            syncIds();
        });
    });
    </script>
    <?php
}

/**
 * Save the carousel photo IDs
 */
function ramcafe_save_carousel_meta_box( $post_id ) {
    if ( ! isset( $_POST['ramcafe_carousel_images_nonce'] ) || ! wp_verify_nonce( $_POST['ramcafe_carousel_images_nonce'], 'ramcafe_save_carousel_images' ) ) {
        return;
    }

    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }

    if ( ! current_user_can( 'edit_page', $post_id ) ) {
        return;
    }

    if ( ! isset( $_POST['ramcafe_carousel_images'] ) ) {
        return;
    }

    $ids = array_filter( array_map( 'absint', explode( ',', sanitize_text_field( wp_unslash( $_POST['ramcafe_carousel_images'] ) ) ) ) );

    if ( $ids ) {
        update_post_meta( $post_id, 'ramcafe_carousel_images', implode( ',', $ids ) );
    } else {
        delete_post_meta( $post_id, 'ramcafe_carousel_images' );
    }
}
add_action( 'save_post_page', 'ramcafe_save_carousel_meta_box' );

/**
 * Load drag-to-reorder support on the homepage edit screen.
 * The media uploader itself is enqueued for all pages in about-page-meta-boxes.php.
 */
function ramcafe_enqueue_carousel_admin_scripts( $hook ) {
    global $post;

    if ( 'post.php' === $hook && $post && (int) get_option( 'page_on_front' ) === (int) $post->ID ) {
        wp_enqueue_script( 'jquery-ui-sortable' );
    }
}
add_action( 'admin_enqueue_scripts', 'ramcafe_enqueue_carousel_admin_scripts' );
