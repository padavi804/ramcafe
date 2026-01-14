<?php
/**
 * Custom template tags for this theme
 *
 * These are helper functions that output common HTML elements
 *
 * @package RAMCafe
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Display posted date
 */
function ramcafe_posted_on() {
    $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

    $time_string = sprintf( $time_string,
        esc_attr( get_the_date( 'c' ) ),
        esc_html( get_the_date() )
    );

    $posted_on = sprintf(
        esc_html_x( 'Posted on %s', 'post date', 'ramcafe' ),
        '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
    );

    echo '<span class="posted-on">' . $posted_on . '</span>';
}

/**
 * Display post author
 */
function ramcafe_posted_by() {
    $byline = sprintf(
        esc_html_x( 'by %s', 'post author', 'ramcafe' ),
        '<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
    );

    echo '<span class="byline"> ' . $byline . '</span>';
}

/**
 * Display entry footer with categories and tags
 */
function ramcafe_entry_footer() {
    // Categories
    $categories_list = get_the_category_list( esc_html__( ', ', 'ramcafe' ) );
    if ( $categories_list ) {
        printf( '<span class="cat-links">' . esc_html__( 'Categories: %1$s', 'ramcafe' ) . '</span>', $categories_list );
    }

    // Tags
    $tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'ramcafe' ) );
    if ( $tags_list ) {
        printf( '<span class="tags-links"> | ' . esc_html__( 'Tags: %1$s', 'ramcafe' ) . '</span>', $tags_list );
    }
}

/**
 * Display post thumbnail
 */
function ramcafe_post_thumbnail() {
    if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
        return;
    }

    if ( is_singular() ) {
        ?>
        <div class="post-thumbnail">
            <?php the_post_thumbnail( 'ramcafe-featured' ); ?>
        </div>
        <?php
    } else {
        ?>
        <a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
            <?php the_post_thumbnail( 'ramcafe-thumbnail', array( 'alt' => the_title_attribute( array( 'echo' => false ) ) ) ); ?>
        </a>
        <?php
    }
}
