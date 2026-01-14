<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme and is used as
 * a fallback when a more specific template doesn't exist.
 *
 * @package RAMCafe
 * @since 1.0.0
 */

get_header();
?>

<main id="primary" class="site-main">

    <?php
    if ( have_posts() ) :

        // Check if this is a blog archive or search results page
        if ( is_home() && ! is_front_page() ) :
            ?>
            <header class="page-header">
                <h1 class="page-title"><?php esc_html_e( 'Latest News & Updates', 'ramcafe' ); ?></h1>
            </header>
            <?php
        endif;

        if ( is_archive() ) :
            ?>
            <header class="page-header">
                <?php
                the_archive_title( '<h1 class="page-title">', '</h1>' );
                the_archive_description( '<div class="archive-description">', '</div>' );
                ?>
            </header>
            <?php
        endif;

        if ( is_search() ) :
            ?>
            <header class="page-header">
                <h1 class="page-title">
                    <?php
                    printf(
                        esc_html__( 'Search Results for: %s', 'ramcafe' ),
                        '<span>' . get_search_query() . '</span>'
                    );
                    ?>
                </h1>
            </header>
            <?php
        endif;

        // Start the Loop
        while ( have_posts() ) :
            the_post();

            // Load the content template part
            get_template_part( 'template-parts/content', get_post_type() );

        endwhile;

        // Display pagination
        the_posts_pagination(
            array(
                'mid_size'  => 2,
                'prev_text' => __( '&laquo; Previous', 'ramcafe' ),
                'next_text' => __( 'Next &raquo;', 'ramcafe' ),
            )
        );

    else :

        // No posts found
        get_template_part( 'template-parts/content', 'none' );

    endif;
    ?>

</main><!-- #primary -->

<?php
// Display sidebar if active
if ( is_active_sidebar( 'sidebar-1' ) && ! is_page() ) :
    get_sidebar();
endif;

get_footer();
