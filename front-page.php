<?php
/**
 * The front page template
 *
 * This is the template for the homepage. It displays a custom welcome section
 * and highlights upcoming events.
 *
 * @package RAMCafe
 * @since 1.0.0
 */

get_header();
?>

<main id="primary" class="site-main">

    <?php
    // Display the page content if a static page is set as homepage
    while ( have_posts() ) :
        the_post();
        ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class( 'home-hero-split' ); ?>>
            <div class="hero-split-container">
                <div class="hero-split-content">
                    <div class="entry-content">
                        <?php
                        the_content();

                        wp_link_pages(
                            array(
                                'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'ramcafe' ),
                                'after'  => '</div>',
                            )
                        );
                        ?>

                        <div class="hero-cta-buttons">
                            <a href="<?php echo esc_url( get_permalink( get_page_by_path( 'events' ) ) ); ?>" class="button">
                                <?php esc_html_e( 'Upcoming Events', 'ramcafe' ); ?>
                            </a>
                        </div>
                    </div>
                </div>

                <?php if ( has_post_thumbnail() ) : ?>
                    <div class="hero-split-image">
                        <?php the_post_thumbnail( 'full' ); ?>
                    </div>
                <?php endif; ?>
            </div>
        </article>

        <?php
    endwhile;
    ?>

    <!-- Community Connection Section -->
    <section class="community-connection-section">
        <h2 class="community-tagline">
            <?php esc_html_e( 'Growing Community.', 'ramcafe' ); ?>
            <span class="highlight"><?php esc_html_e( 'Celebrating Connection.', 'ramcafe' ); ?></span>
        </h2>
        <p class="community-subtitle"><?php esc_html_e( 'Serving the Rivers Area Community', 'ramcafe' ); ?></p>

        <div class="community-grid">
            <!-- Community -->
            <div class="community-item">
                <div class="community-icon">
                    <img src="<?php echo esc_url( get_template_directory_uri() . '/images/community-icon.png' ); ?>"
                         alt="<?php esc_attr_e( 'Community', 'ramcafe' ); ?>">
                </div>
                <h3 class="community-item-title"><?php esc_html_e( 'Community', 'ramcafe' ); ?></h3>
            </div>

            <!-- Engagement -->
            <div class="community-item">
                <div class="community-icon">
                    <img src="<?php echo esc_url( get_template_directory_uri() . '/images/engagement-icon.png' ); ?>"
                         alt="<?php esc_attr_e( 'Engagement', 'ramcafe' ); ?>">
                </div>
                <h3 class="community-item-title"><?php esc_html_e( 'Engagement', 'ramcafe' ); ?></h3>
            </div>

            <!-- Support -->
            <div class="community-item">
                <div class="community-icon">
                    <img src="<?php echo esc_url( get_template_directory_uri() . '/images/support-icon.png' ); ?>"
                         alt="<?php esc_attr_e( 'Support', 'ramcafe' ); ?>">
                </div>
                <h3 class="community-item-title"><?php esc_html_e( 'Support', 'ramcafe' ); ?></h3>
            </div>
        </div>
    </section>

    <!-- Meeting Information Section -->
    <section class="meeting-info" style="background-color: var(--color-slate-blue); padding: var(--spacing-xl) var(--spacing-sm); border-radius: var(--radius-lg); margin-top: var(--spacing-xl);">
        <div class="container-narrow text-center">
            <h2 style="color: var(--color-beige);"><?php esc_html_e( 'Join Us for Memory Café', 'ramcafe' ); ?></h2>
            <div class="meeting-details" style="font-size: 1.25rem; color: var(--color-beige); line-height: 1.8; margin-top: var(--spacing-md);">
                <p><strong><?php esc_html_e( 'When:', 'ramcafe' ); ?></strong> <?php esc_html_e( 'Third Tuesday of Every Month', 'ramcafe' ); ?></p>
                <p><strong><?php esc_html_e( 'Time:', 'ramcafe' ); ?></strong> <?php esc_html_e( '1:00 PM - 3:00 PM', 'ramcafe' ); ?></p>
                <p><strong><?php esc_html_e( 'Location:', 'ramcafe' ); ?></strong> <?php echo esc_html( get_theme_mod( 'ramcafe_address', 'Fergus Falls YMCA' ) ); ?></p>
            </div>
            <div style="margin-top: var(--spacing-md); color: var(--color-beige);">
                <a href="<?php echo esc_url( get_permalink( get_page_by_path( 'events' ) ) ); ?>" class="button">
                    <?php esc_html_e( 'View All Events', 'ramcafe' ); ?>
                </a>
            </div>
        </div>
    </section>

 </main><!-- #primary -->

<?php
get_footer();
