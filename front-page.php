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


    <!-- Featured Content Section -->
    <section class="featured-content" style="padding: var(--spacing-sm) var(--spacing-sm);">
        <div class="container">
            <h1 class="text-center" style="margin-bottom: var(--spacing-lg);"><?php esc_html_e( 'What We Offer', 'ramcafe' ); ?></h1>

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: var(--spacing-md);">
                <!-- Feature 1 -->
                <div class="feature-box" style="background-color: var(--color-terracotta); padding: var(--spacing-md); border-radius: var(--radius-lg); text-align: center;">
                    <h3 style="color: var(--color-beige);"><?php esc_html_e( 'Community Connection', 'ramcafe' ); ?></h3>
                    <p style="color: var(--color-white); font-size: 1.15rem;"><?php esc_html_e( 'A welcoming space for individuals with memory loss and their care partners to connect with others facing similar experiences.', 'ramcafe' ); ?></p>
                </div>

                <!-- Feature 2 -->
                <div class="feature-box" style="background-color: var(--color-terracotta); padding: var(--spacing-md); border-radius: var(--radius-lg); text-align: center;">
                    <h3 style="color: var(--color-beige);"><?php esc_html_e( 'Engaging Activities', 'ramcafe' ); ?></h3>
                    <p style="color: var(--color-white); font-size: 1.15rem;"><?php esc_html_e( 'Enjoy music, art, conversation, and activities designed to promote engagement and social connection.', 'ramcafe' ); ?></p>
                </div>

                <!-- Feature 3 -->
                <div class="feature-box" style="background-color: var(--color-terracotta); padding: var(--spacing-md); border-radius: var(--radius-lg); text-align: center;">
                    <h3 style="color: var(--color-beige);"><?php esc_html_e( 'Support & Resources', 'ramcafe' ); ?></h3>
                    <p style="color: var(--color-white); font-size: 1.15rem;"><?php esc_html_e( 'Access information, resources, and a supportive community that understands the journey of memory loss.', 'ramcafe' ); ?></p>
                </div>
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
