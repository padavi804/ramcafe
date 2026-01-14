<?php
/**
 * Template Name: Events Page
 *
 * This template displays all upcoming events in a calendar/list format.
 * Works with The Events Calendar plugin or can be used standalone.
 *
 * @package RAMCafe
 * @since 1.0.0
 */

get_header();
?>

<main id="primary" class="site-main">
    <div class="container">

        <?php
        while ( have_posts() ) :
            the_post();
            ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                <header class="entry-header">
                    <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                </header>

                <?php if ( has_post_thumbnail() ) : ?>
                    <div class="entry-featured-image">
                        <?php the_post_thumbnail( 'large' ); ?>
                    </div>
                <?php endif; ?>

                <div class="entry-content">
                    <?php
                    // Display the page content (intro text about events)
                    the_content();
                    ?>

                    <!-- Regular Monthly Meeting Section -->
                    <section class="regular-meeting-info" style="background-color: var(--color-beige); padding: var(--spacing-md); border-radius: var(--radius-lg); margin: var(--spacing-lg) 0;">
                        <h2 style="color: var(--color-terracotta); margin-top: 0;">Our Monthly Memory Café Meetings</h2>

                        <div class="meeting-details" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: var(--spacing-md); margin-top: var(--spacing-md);">

                            <div class="meeting-detail">
                                <h3 style="color: var(--color-olive-green); font-size: 1.25rem;">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" style="vertical-align: middle; margin-right: 8px;">
                                        <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                        <line x1="16" y1="2" x2="16" y2="6"></line>
                                        <line x1="8" y1="2" x2="8" y2="6"></line>
                                        <line x1="3" y1="10" x2="21" y2="10"></line>
                                    </svg>
                                    When
                                </h3>
                                <p><strong>Third Tuesday of Every Month</strong><br>
                                1:00 PM - 3:00 PM</p>
                            </div>

                            <div class="meeting-detail">
                                <h3 style="color: var(--color-olive-green); font-size: 1.25rem;">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" style="vertical-align: middle; margin-right: 8px;">
                                        <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                        <circle cx="12" cy="10" r="3"></circle>
                                    </svg>
                                    Where
                                </h3>
                                <p><strong>Fergus Falls YMCA Community Room</strong><br>
                                1164 Friberg Ave<br>
                                Fergus Falls, MN 56537</p>
                            </div>

                            <div class="meeting-detail">
                                <h3 style="color: var(--color-olive-green); font-size: 1.25rem;">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" style="vertical-align: middle; margin-right: 8px;">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg>
                                    Who
                                </h3>
                                <p>Open to individuals with memory loss and their care partners<br>
                                <strong>Free and open to all</strong></p>
                            </div>

                        </div>

                        <div style="margin-top: var(--spacing-md); padding-top: var(--spacing-md); border-top: 1px solid rgba(0,0,0,0.1);">
                            <h4 style="color: var(--color-terracotta);">What to Expect</h4>
                            <ul style="margin: 0; padding-left: var(--spacing-md);">
                                <li>Welcoming, judgment-free environment</li>
                                <li>Social time with refreshments</li>
                                <li>Memory-friendly activities and games</li>
                                <li>Opportunities to connect with others</li>
                                <li>Support for both individuals and caregivers</li>
                            </ul>
                            <p style="margin-top: var(--spacing-sm);"><strong>No registration required - just drop in!</strong></p>
                        </div>
                    </section>

                    <?php
                    /**
                     * Check if The Events Calendar plugin is active
                     * If it is, display the events calendar
                     */
                    if ( function_exists( 'tribe_events' ) ) :
                        ?>
                        <section class="events-calendar-section">
                            <h2>Upcoming Special Events & Workshops</h2>
                            <?php
                            // Display The Events Calendar
                            echo do_shortcode( '[tribe_events view="list" events_per_page="6"]' );
                            ?>
                        </section>
                    <?php
                    else :
                        // If The Events Calendar is not installed, show a fallback message
                        ?>
                        <section class="events-fallback" style="margin-top: var(--spacing-lg); padding: var(--spacing-md); background-color: var(--color-gray-light); border-radius: var(--radius-md);">
                            <h2>Special Events & Workshops</h2>
                            <p>To display a full events calendar, please install <strong>The Events Calendar</strong> plugin.</p>
                            <p>In the meantime, check back here for announcements about special workshops and activities!</p>

                            <?php
                            // Display recent posts from "Events" category as fallback
                            $events_category = get_category_by_slug( 'events' );

                            if ( $events_category ) :
                                $events_query = new WP_Query( array(
                                    'category_name' => 'events',
                                    'posts_per_page' => 5,
                                    'orderby' => 'date',
                                    'order' => 'DESC',
                                ) );

                                if ( $events_query->have_posts() ) :
                                    echo '<div class="event-posts">';

                                    while ( $events_query->have_posts() ) :
                                        $events_query->the_post();
                                        ?>
                                        <article class="event-card">
                                            <h3 class="event-title">
                                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                            </h3>
                                            <div class="event-date">
                                                <?php echo get_the_date(); ?>
                                            </div>
                                            <div class="event-excerpt">
                                                <?php the_excerpt(); ?>
                                            </div>
                                            <a href="<?php the_permalink(); ?>" class="button button-secondary">Learn More</a>
                                        </article>
                                        <?php
                                    endwhile;

                                    echo '</div>';
                                    wp_reset_postdata();
                                endif;
                            endif;
                            ?>
                        </section>
                    <?php endif; ?>

                    <!-- Contact Section -->
                    <section class="events-contact" style="margin-top: var(--spacing-lg); padding: var(--spacing-md); background-color: var(--color-olive-green); color: var(--color-white); border-radius: var(--radius-lg); text-align: center;">
                        <h2 style="color: var(--color-white);">Questions About Our Events?</h2>
                        <p style="font-size: 1.125rem;">We'd love to hear from you!</p>

                        <?php
                        $phone = get_theme_mod( 'ramcafe_phone' );
                        $email = get_theme_mod( 'ramcafe_email' );

                        if ( $phone || $email ) :
                            echo '<div style="margin-top: var(--spacing-md);">';

                            if ( $phone ) {
                                echo '<p><strong>Call:</strong> <a href="tel:' . esc_attr( str_replace( array( ' ', '-', '(', ')' ), '', $phone ) ) . '" style="color: var(--color-beige);">' . esc_html( $phone ) . '</a></p>';
                            }

                            if ( $email ) {
                                echo '<p><strong>Email:</strong> <a href="mailto:' . esc_attr( $email ) . '" style="color: var(--color-beige);">' . esc_html( $email ) . '</a></p>';
                            }

                            echo '</div>';
                        endif;
                        ?>

                        <p style="margin-top: var(--spacing-md);">
                            <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="button" style="background-color: var(--color-terracotta);">Contact Us</a>
                        </p>
                    </section>

                </div>

            </article>

            <?php
        endwhile;
        ?>

    </div>
</main>

<?php
get_footer();
