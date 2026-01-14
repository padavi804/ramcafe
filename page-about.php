<?php
/**
 * Template Name: About/Mission Page
 *
 * This template is designed for the About or Mission page with
 * special sections for mission statement, team, and community impact.
 *
 * @package RAMCafe
 * @since 1.0.0
 */

get_header();
?>

<main id="primary" class="site-main">
    <div class="container-narrow">

        <?php
        while ( have_posts() ) :
            the_post();
            ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                <header class="entry-header" style="text-align: center; margin-bottom: var(--spacing-lg);">
                    <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

                    <?php if ( has_post_thumbnail() ) : ?>
                        <div class="entry-featured-image" style="margin-top: var(--spacing-md);">
                            <?php the_post_thumbnail( 'large' ); ?>
                        </div>
                    <?php endif; ?>
                </header>

                <div class="entry-content">

                    <!-- Mission Statement Callout -->
                    <section class="mission-statement" style="background-color: var(--color-beige); padding: var(--spacing-lg); border-radius: var(--radius-lg); margin-bottom: var(--spacing-lg); text-align: center; border-left: 4px solid var(--color-terracotta);">
                        <h2 style="color: var(--color-terracotta); font-size: 1.75rem; margin-top: 0;">Our Mission</h2>
                        <div style="font-size: 1.125rem; line-height: 1.8; color: var(--color-gray-dark);">
                            <?php
                            /**
                             * Display the main content which should include the mission statement
                             * Site admins can write their mission statement in the page content
                             */
                            the_content();
                            ?>
                        </div>
                    </section>

                    <!-- What is a Memory Café Section -->
                    <section class="memory-cafe-explanation" style="margin-bottom: var(--spacing-lg);">
                        <h2 style="color: var(--color-terracotta);">
                            <?php
                            // Editable heading - can be changed in WordPress Custom Fields
                            $cafe_heading = get_post_meta( get_the_ID(), 'cafe_heading', true );
                            echo $cafe_heading ? esc_html( $cafe_heading ) : 'What is a Memory Café?';
                            ?>
                        </h2>
                        <p style="font-size: 1.125rem; line-height: 1.8;">
                            <?php
                            // Editable description - can be changed in WordPress Custom Fields
                            $cafe_description = get_post_meta( get_the_ID(), 'cafe_description', true );
                            echo $cafe_description ? wp_kses_post( $cafe_description ) : 'Memory Cafés are welcoming gatherings where people with memory loss and their care partners can socialize, enjoy activities, and connect with others in a supportive, judgment-free environment.';
                            ?>
                        </p>

                        <div class="cafe-features" style="display: flex; flex-wrap: wrap; gap: var(--spacing-md); margin-top: var(--spacing-md); justify-content: center;">

                            <?php
                            // Feature boxes - editable via Custom Fields
                            $features = array(
                                array(
                                    'key' => 'feature_1',
                                    'default_title' => 'Social Connection',
                                    'default_text' => 'Build friendships and feel part of a community that understands your journey.',
                                    'icon' => '<path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path>'
                                ),
                                array(
                                    'key' => 'feature_2',
                                    'default_title' => 'Safe & Welcoming',
                                    'default_text' => 'A judgment-free space where you can be yourself and enjoy the moment.',
                                    'icon' => '<circle cx="12" cy="12" r="10"></circle><path d="M8 14s1.5 2 4 2 4-2 4-2"></path><line x1="9" y1="9" x2="9.01" y2="9"></line><line x1="15" y1="9" x2="15.01" y2="9"></line>'
                                ),
                                array(
                                    'key' => 'feature_3',
                                    'default_title' => 'Engaging Activities',
                                    'default_text' => 'Participate in memory-friendly activities, games, music, and conversations.',
                                    'icon' => '<path d="M12 2L2 7l10 5 10-5-10-5z"></path><path d="M2 17l10 5 10-5"></path><path d="M2 12l10 5 10-5"></path>'
                                )
                            );

                            foreach ( $features as $feature ) {
                                $title = get_post_meta( get_the_ID(), $feature['key'] . '_title', true );
                                $text = get_post_meta( get_the_ID(), $feature['key'] . '_text', true );

                                $title = $title ? esc_html( $title ) : $feature['default_title'];
                                $text = $text ? wp_kses_post( $text ) : $feature['default_text'];
                                ?>
                                <div class="feature-box" style="background-color: var(--color-gray-light); padding: var(--spacing-md); border-radius: var(--radius-md); flex: 1 1 300px; max-width: 350px;">
                                    <h3 style="color: var(--color-olive-green); font-size: 1.25rem;">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" style="vertical-align: middle; margin-right: 8px;">
                                            <?php echo $feature['icon']; ?>
                                        </svg>
                                        <?php echo $title; ?>
                                    </h3>
                                    <p><?php echo $text; ?></p>
                                </div>
                                <?php
                            }
                            ?>

                        </div>
                    </section>

                    <!-- Who We Serve Section -->
                    <section class="who-we-serve" style="margin-bottom: var(--spacing-lg); padding: var(--spacing-md); background: linear-gradient(135deg, var(--color-teal) 0%, var(--color-olive-green) 100%); color: var(--color-white); border-radius: var(--radius-lg);">
                        <h2 style="color: var(--color-white); margin-top: 0;">Who We Serve</h2>

                        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: var(--spacing-md);">
                            <div>
                                <h3 style="color: var(--color-beige); font-size: 1.25rem;">Individuals with Memory Loss</h3>
                                <p>Those experiencing Alzheimer's disease, dementia, or other memory-related conditions are warmly welcomed.</p>
                            </div>

                            <div>
                                <h3 style="color: var(--color-beige); font-size: 1.25rem;">Care Partners</h3>
                                <p>Spouses, family members, friends, or professional caregivers can attend together and find mutual support.</p>
                            </div>

                            <div>
                                <h3 style="color: var(--color-beige); font-size: 1.25rem;">Community Members</h3>
                                <p>Anyone interested in learning more about memory care and supporting our community is welcome.</p>
                            </div>
                        </div>
                    </section>

                    <!-- Our Values Section -->
                    <section class="our-values" style="margin-bottom: var(--spacing-lg);">
                        <h2 style="color: var(--color-terracotta); text-align: center;">Our Core Values</h2>

                        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: var(--spacing-md); margin-top: var(--spacing-md);">

                            <div class="value-item" style="text-align: center; padding: var(--spacing-md);">
                                <div style="width: 60px; height: 60px; margin: 0 auto var(--spacing-sm); background-color: var(--color-beige); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                    <svg width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="var(--color-terracotta)" stroke-width="2">
                                        <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                                    </svg>
                                </div>
                                <h3 style="color: var(--color-olive-green); font-size: 1.125rem;">Compassion</h3>
                                <p style="font-size: 0.9rem;">Leading with empathy and understanding</p>
                            </div>

                            <div class="value-item" style="text-align: center; padding: var(--spacing-md);">
                                <div style="width: 60px; height: 60px; margin: 0 auto var(--spacing-sm); background-color: var(--color-beige); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                    <svg width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="var(--color-terracotta)" stroke-width="2">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <polyline points="12 6 12 12 16 14"></polyline>
                                    </svg>
                                </div>
                                <h3 style="color: var(--color-olive-green); font-size: 1.125rem;">Respect</h3>
                                <p style="font-size: 0.9rem;">Honoring every individual's dignity</p>
                            </div>

                            <div class="value-item" style="text-align: center; padding: var(--spacing-md);">
                                <div style="width: 60px; height: 60px; margin: 0 auto var(--spacing-sm); background-color: var(--color-beige); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                    <svg width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="var(--color-terracotta)" stroke-width="2">
                                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="9" cy="7" r="4"></circle>
                                        <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                    </svg>
                                </div>
                                <h3 style="color: var(--color-olive-green); font-size: 1.125rem;">Community</h3>
                                <p style="font-size: 0.9rem;">Building connections that matter</p>
                            </div>

                            <div class="value-item" style="text-align: center; padding: var(--spacing-md);">
                                <div style="width: 60px; height: 60px; margin: 0 auto var(--spacing-sm); background-color: var(--color-beige); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                    <svg width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="var(--color-terracotta)" stroke-width="2">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <path d="M8 14s1.5 2 4 2 4-2 4-2"></path>
                                        <line x1="9" y1="9" x2="9.01" y2="9"></line>
                                        <line x1="15" y1="9" x2="15.01" y2="9"></line>
                                    </svg>
                                </div>
                                <h3 style="color: var(--color-olive-green); font-size: 1.125rem;">Joy</h3>
                                <p style="font-size: 0.9rem;">Celebrating moments of happiness</p>
                            </div>

                        </div>
                    </section>

                    <!-- Get Involved Section -->
                    <section class="get-involved" style="background-color: var(--color-beige); padding: var(--spacing-lg); border-radius: var(--radius-lg); text-align: center; margin-bottom: var(--spacing-lg);">
                        <h2 style="color: var(--color-terracotta); margin-top: 0;">Get Involved</h2>
                        <p style="font-size: 1.125rem; margin-bottom: var(--spacing-md);">
                            Whether you're looking to attend, volunteer, or support our mission, there are many ways to connect with Rivers Area Memory Café.
                        </p>

                        <div style="display: flex; gap: var(--spacing-sm); justify-content: center; flex-wrap: wrap;">
                            <a href="<?php echo esc_url( home_url( '/events' ) ); ?>" class="button">View Events</a>
                            <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="button button-secondary">Contact Us</a>
                        </div>
                    </section>

                    <?php
                    // If comments are open or we have at least one comment, load up the comment template.
                    if ( comments_open() || get_comments_number() ) :
                        comments_template();
                    endif;
                    ?>

                </div>

            </article>

            <?php
        endwhile;
        ?>

    </div>
</main>

<?php
get_footer();
