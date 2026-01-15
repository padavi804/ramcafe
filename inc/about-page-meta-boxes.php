<?php
/**
 * About Page Meta Boxes
 * Adds image upload fields for cafe features
 *
 * @package RAMCafe
 * @since 1.0.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Add meta box for cafe feature images
 */
function ramcafe_add_about_meta_boxes() {
    add_meta_box(
        'ramcafe_cafe_features_images',
        'Café Feature Images',
        'ramcafe_cafe_features_images_callback',
        'page',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'ramcafe_add_about_meta_boxes' );

/**
 * Meta box callback function
 */
function ramcafe_cafe_features_images_callback( $post ) {
    // Add nonce for security
    wp_nonce_field( 'ramcafe_save_cafe_features', 'ramcafe_cafe_features_nonce' );

    // Get current values
    $feature_1_image = get_post_meta( $post->ID, 'feature_1_image', true );
    $feature_2_image = get_post_meta( $post->ID, 'feature_2_image', true );
    $feature_3_image = get_post_meta( $post->ID, 'feature_3_image', true );

    // Get image URLs - try 'large' first, fallback to 'full' if medium doesn't exist
    $feature_1_url = '';
    if ( $feature_1_image ) {
        $feature_1_url = wp_get_attachment_image_url( $feature_1_image, 'large' );
        if ( ! $feature_1_url ) {
            $feature_1_url = wp_get_attachment_url( $feature_1_image );
        }
    }

    $feature_2_url = '';
    if ( $feature_2_image ) {
        $feature_2_url = wp_get_attachment_image_url( $feature_2_image, 'large' );
        if ( ! $feature_2_url ) {
            $feature_2_url = wp_get_attachment_url( $feature_2_image );
        }
    }

    $feature_3_url = '';
    if ( $feature_3_image ) {
        $feature_3_url = wp_get_attachment_image_url( $feature_3_image, 'large' );
        if ( ! $feature_3_url ) {
            $feature_3_url = wp_get_attachment_url( $feature_3_image );
        }
    }
    ?>

    <style>
        .ramcafe-feature-image-field {
            margin-bottom: 25px;
            padding: 15px;
            background: #f9f9f9;
            border-left: 4px solid #CE593A;
        }
        .ramcafe-feature-image-field h4 {
            margin-top: 0;
            color: #CE593A;
        }
        .ramcafe-image-preview {
            margin: 10px 0;
            min-height: 200px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #fafafa;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 10px;
        }
        .ramcafe-image-preview img {
            max-width: 100%;
            max-height: 250px;
            height: auto;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        .ramcafe-image-preview p {
            margin: 0;
            color: #999;
        }
        .ramcafe-image-buttons {
            margin-top: 10px;
            display: flex;
            gap: 10px;
        }
        .ramcafe-upload-button,
        .ramcafe-remove-button {
            margin-right: 10px;
        }
    </style>

    <div class="ramcafe-meta-box-wrap">
        <p><strong>Upload images for the three café features on your About page.</strong></p>
        <p style="color: #666; font-size: 13px;">These images will appear alongside the feature descriptions in an alternating layout.</p>

        <!-- Feature 1 -->
        <div class="ramcafe-feature-image-field">
            <h4>Feature 1: Social Connection</h4>
            <p style="color: #666; font-size: 12px;">This image appears on the RIGHT side (text on left, image on right)</p>

            <input type="hidden" id="feature_1_image" name="feature_1_image" value="<?php echo esc_attr( $feature_1_image ); ?>" />

            <div class="ramcafe-image-preview" id="feature_1_preview">
                <?php if ( $feature_1_url ) : ?>
                    <img src="<?php echo esc_url( $feature_1_url ); ?>" alt="Feature 1 Preview" />
                <?php else : ?>
                    <p style="color: #999;">No image selected</p>
                <?php endif; ?>
            </div>

            <div class="ramcafe-image-buttons">
                <button type="button" class="button ramcafe-upload-button" data-feature="feature_1_image">
                    <?php echo $feature_1_url ? 'Change Image' : 'Upload Image'; ?>
                </button>
                <?php if ( $feature_1_url ) : ?>
                    <button type="button" class="button ramcafe-remove-button" data-feature="feature_1_image">Remove Image</button>
                <?php endif; ?>
            </div>
        </div>

        <!-- Feature 2 -->
        <div class="ramcafe-feature-image-field">
            <h4>Feature 2: Safe &amp; Welcoming</h4>
            <p style="color: #666; font-size: 12px;">This image appears on the LEFT side (image on left, text on right)</p>

            <input type="hidden" id="feature_2_image" name="feature_2_image" value="<?php echo esc_attr( $feature_2_image ); ?>" />

            <div class="ramcafe-image-preview" id="feature_2_preview">
                <?php if ( $feature_2_url ) : ?>
                    <img src="<?php echo esc_url( $feature_2_url ); ?>" alt="Feature 2 Preview" />
                <?php else : ?>
                    <p style="color: #999;">No image selected</p>
                <?php endif; ?>
            </div>

            <div class="ramcafe-image-buttons">
                <button type="button" class="button ramcafe-upload-button" data-feature="feature_2_image">
                    <?php echo $feature_2_url ? 'Change Image' : 'Upload Image'; ?>
                </button>
                <?php if ( $feature_2_url ) : ?>
                    <button type="button" class="button ramcafe-remove-button" data-feature="feature_2_image">Remove Image</button>
                <?php endif; ?>
            </div>
        </div>

        <!-- Feature 3 -->
        <div class="ramcafe-feature-image-field">
            <h4>Feature 3: Engaging Activities</h4>
            <p style="color: #666; font-size: 12px;">This image appears on the RIGHT side (text on left, image on right)</p>

            <input type="hidden" id="feature_3_image" name="feature_3_image" value="<?php echo esc_attr( $feature_3_image ); ?>" />

            <div class="ramcafe-image-preview" id="feature_3_preview">
                <?php if ( $feature_3_url ) : ?>
                    <img src="<?php echo esc_url( $feature_3_url ); ?>" alt="Feature 3 Preview" />
                <?php else : ?>
                    <p style="color: #999;">No image selected</p>
                <?php endif; ?>
            </div>

            <div class="ramcafe-image-buttons">
                <button type="button" class="button ramcafe-upload-button" data-feature="feature_3_image">
                    <?php echo $feature_3_url ? 'Change Image' : 'Upload Image'; ?>
                </button>
                <?php if ( $feature_3_url ) : ?>
                    <button type="button" class="button ramcafe-remove-button" data-feature="feature_3_image">Remove Image</button>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <script>
    jQuery(document).ready(function($) {
        // Function to save meta via WordPress API (for block editor)
        function saveFeatureImageMeta(metaKey, value) {
            if (typeof wp !== 'undefined' && wp.data && wp.data.dispatch('core/editor')) {
                wp.data.dispatch('core/editor').editPost({
                    meta: {
                        [metaKey]: value
                    }
                });
            }
        }

        // Upload button click
        $('.ramcafe-upload-button').on('click', function(e) {
            e.preventDefault();

            var button = $(this);
            var featureId = button.data('feature');
            var customUploader = wp.media({
                title: 'Select Image for ' + featureId.replace('_', ' ').toUpperCase(),
                button: {
                    text: 'Use This Image'
                },
                multiple: false
            });

            customUploader.on('select', function() {
                var attachment = customUploader.state().get('selection').first().toJSON();

                // Set the image ID in hidden field
                $('#' + featureId).val(attachment.id);

                // Save via Block Editor API
                saveFeatureImageMeta(featureId, parseInt(attachment.id));

                // Get the best available image size - try 'large' first, fallback to full
                var imageUrl = attachment.url; // Default to full size
                if (attachment.sizes && attachment.sizes.large && attachment.sizes.large.url) {
                    imageUrl = attachment.sizes.large.url;
                }

                // Update preview - featureId is like 'feature_1_image', preview ID is like 'feature_1_preview'
                var previewId = featureId.replace('_image', '_preview');
                var imgHtml = '<img src="' + imageUrl + '" alt="Preview" />';
                $('#' + previewId).html(imgHtml);

                // Update button text
                button.text('Change Image');

                // Add remove button if it doesn't exist
                if (!button.siblings('.ramcafe-remove-button').length) {
                    button.after('<button type="button" class="button ramcafe-remove-button" data-feature="' + featureId + '">Remove Image</button>');
                }
            });

            customUploader.open();
        });

        // Remove button click (delegated event)
        $(document).on('click', '.ramcafe-remove-button', function(e) {
            e.preventDefault();

            var button = $(this);
            var featureId = button.data('feature');

            // Clear the image ID
            $('#' + featureId).val('');

            // Save via Block Editor API (empty value)
            saveFeatureImageMeta(featureId, 0);

            // Clear preview - featureId is like 'feature_1_image', preview ID is like 'feature_1_preview'
            var previewId = featureId.replace('_image', '_preview');
            $('#' + previewId).html('<p style="color: #999;">No image selected</p>');

            // Update upload button text
            button.siblings('.ramcafe-upload-button').text('Upload Image');

            // Remove the remove button
            button.remove();
        });
    });
    </script>
    <?php
}

/**
 * Register meta fields for Block Editor compatibility
 */
function ramcafe_register_feature_image_meta() {
    $fields = array( 'feature_1_image', 'feature_2_image', 'feature_3_image' );

    foreach ( $fields as $field ) {
        register_post_meta( 'page', $field, array(
            'type'              => 'integer',
            'description'       => 'Feature image ID',
            'single'            => true,
            'show_in_rest'      => true,
            'sanitize_callback' => 'absint',
            'auth_callback'     => function() {
                return current_user_can( 'edit_posts' );
            }
        ) );
    }
}
add_action( 'init', 'ramcafe_register_feature_image_meta' );

/**
 * Note: The save functionality for these fields is handled in functions.php
 * by the ramcafe_save_about_page_meta_box() function to avoid conflicts.
 */

/**
 * Enqueue media uploader
 */
function ramcafe_enqueue_admin_scripts( $hook ) {
    global $post;

    // Only load on post edit pages
    if ( $hook == 'post-new.php' || $hook == 'post.php' ) {
        // Only load on pages (not posts)
        if ( 'page' === $post->post_type ) {
            wp_enqueue_media();
        }
    }
}
add_action( 'admin_enqueue_scripts', 'ramcafe_enqueue_admin_scripts' );
