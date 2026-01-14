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

    <!-- Featured Content Section -->
    <section class="featured-content" style="padding: var(--spacing-xl) var(--spacing-sm);">
        <div class="container">
            <h2 class="text-center" style="margin-bottom: var(--spacing-lg);"><?php esc_html_e( 'What We Offer', 'ramcafe' ); ?></h2>

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: var(--spacing-md);">
                <!-- Feature 1 -->
                <div class="feature-box" style="background-color: var(--color-beige); padding: var(--spacing-md); border-radius: var(--radius-lg); text-align: center;">
                    <h3 style="color: var(--color-terracotta);"><?php esc_html_e( 'Community Connection', 'ramcafe' ); ?></h3>
                    <p><?php esc_html_e( 'A welcoming space for individuals with memory loss and their care partners to connect with others facing similar experiences.', 'ramcafe' ); ?></p>
                </div>

                <!-- Feature 2 -->
                <div class="feature-box" style="background-color: var(--color-beige); padding: var(--spacing-md); border-radius: var(--radius-lg); text-align: center;">
                    <h3 style="color: var(--color-terracotta);"><?php esc_html_e( 'Engaging Activities', 'ramcafe' ); ?></h3>
                    <p><?php esc_html_e( 'Enjoy music, art, conversation, and activities designed to promote engagement and social connection.', 'ramcafe' ); ?></p>
                </div>

                <!-- Feature 3 -->
                <div class="feature-box" style="background-color: var(--color-beige); padding: var(--spacing-md); border-radius: var(--radius-lg); text-align: center;">
                    <h3 style="color: var(--color-terracotta);"><?php esc_html_e( 'Support & Resources', 'ramcafe' ); ?></h3>
                    <p><?php esc_html_e( 'Access information, resources, and a supportive community that understands the journey of memory loss.', 'ramcafe' ); ?></p>
                </div>
            </div>
        </div>
    </section>

    <!-- Latest News Section -->
    <?php
    $recent_posts = new WP_Query(
        array(
            'posts_per_page' => 3,
            'post_status'    => 'publish',
            'orderby'        => 'date',
            'order'          => 'DESC',
        )
    );

    if ( $recent_posts->have_posts() ) :
        ?>
        <section class="latest-news" style="background-color: var(--color-gray-light); padding: var(--spacing-xl) var(--spacing-sm);">
            <div class="container">
                <h2 class="text-center" style="margin-bottom: var(--spacing-lg);"><?php esc_html_e( 'Latest News & Updates', 'ramcafe' ); ?></h2>

                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: var(--spacing-md);">
                    <?php
                    while ( $recent_posts->have_posts() ) :
                        $recent_posts->the_post();
                        ?>
                        <article class="news-card" style="background-color: var(--color-white); padding: var(--spacing-md); border-radius: var(--radius-lg);">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <div class="news-thumbnail" style="margin-bottom: var(--spacing-sm);">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail( 'ramcafe-thumbnail' ); ?>
                                    </a>
                                </div>
                            <?php endif; ?>

                            <h3 style="font-size: 1.25rem; margin-bottom: var(--spacing-xs);">
                                <a href="<?php the_permalink(); ?>" style="color: var(--color-terracotta);">
                                    <?php the_title(); ?>
                                </a>
                            </h3>

                            <div class="news-meta" style="font-size: 0.875rem; color: var(--color-gray-medium); margin-bottom: var(--spacing-sm);">
                                <?php echo get_the_date(); ?>
                            </div>

                            <div class="news-excerpt">
                                <?php the_excerpt(); ?>
                            </div>
                        </article>
                        <?php
                    endwhile;
                    wp_reset_postdata();
                    ?>
                </div>

                <div class="text-center" style="margin-top: var(--spacing-lg);">
                    <a href="<?php echo esc_url( get_permalink( get_option( 'page_for_posts' ) ) ); ?>" class="button-secondary button">
                        <?php esc_html_e( 'View All News', 'ramcafe' ); ?>
                    </a>
                </div>
            </div>
        </section>
        <?php
    endif;
    ?>

</main><!-- #primary -->

<?php
get_footer();
