<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package RAMCafe
 * @since 1.0.0
 */

get_header();
?>

<main id="primary" class="site-main">

    <section class="error-404 not-found">
        <header class="page-header text-center">
            <h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'ramcafe' ); ?></h1>
        </header><!-- .page-header -->

        <div class="page-content container-narrow">
            <p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try searching for what you need?', 'ramcafe' ); ?></p>

            <div style="margin: var(--spacing-lg) 0;">
                <?php get_search_form(); ?>
            </div>

            <div class="helpful-links" style="background-color: var(--color-beige); padding: var(--spacing-md); border-radius: var(--radius-lg); margin-top: var(--spacing-lg);">
                <h2 style="text-align: center; margin-bottom: var(--spacing-md);"><?php esc_html_e( 'Helpful Links', 'ramcafe' ); ?></h2>

                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: var(--spacing-md); text-align: center;">
                    <div>
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="button">
                            <?php esc_html_e( 'Home', 'ramcafe' ); ?>
                        </a>
                    </div>

                    <?php
                    // Get About page
                    $about_page = get_page_by_path( 'about' );
                    if ( $about_page ) :
                        ?>
                        <div>
                            <a href="<?php echo esc_url( get_permalink( $about_page ) ); ?>" class="button">
                                <?php esc_html_e( 'About Us', 'ramcafe' ); ?>
                            </a>
                        </div>
                    <?php endif; ?>

                    <?php
                    // Get Events page
                    $events_page = get_page_by_path( 'events' );
                    if ( $events_page ) :
                        ?>
                        <div>
                            <a href="<?php echo esc_url( get_permalink( $events_page ) ); ?>" class="button">
                                <?php esc_html_e( 'Events', 'ramcafe' ); ?>
                            </a>
                        </div>
                    <?php endif; ?>

                    <?php
                    // Get Contact page
                    $contact_page = get_page_by_path( 'contact' );
                    if ( $contact_page ) :
                        ?>
                        <div>
                            <a href="<?php echo esc_url( get_permalink( $contact_page ) ); ?>" class="button">
                                <?php esc_html_e( 'Contact', 'ramcafe' ); ?>
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

        </div><!-- .page-content -->
    </section><!-- .error-404 -->

</main><!-- #primary -->

<?php
get_footer();
