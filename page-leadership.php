<?php
/**
 * Template Name: Leadership / Board of Directors
 *
 * Displays the board of directors as a grid of member cards.
 * Member data is managed via WordPress Custom Fields on this page:
 *   member_N_name, member_N_title, member_N_bio, member_N_image (attachment ID)
 * for N = 1 through 9. Slots without a member_N_name are skipped, so removing
 * a member only requires deleting their fields.
 *
 * @package RAMCafe
 * @since 1.2.0
 */

get_header();
?>

<main id="primary" class="site-main">
    <div class="container">

        <?php
        while ( have_posts() ) :
            the_post();
            $page_id = get_the_ID();
            ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                <header class="entry-header leadership-header">
                    <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

                    <?php if ( get_the_content() ) : ?>
                        <div class="leadership-intro">
                            <?php the_content(); ?>
                        </div>
                    <?php endif; ?>
                </header>

                <!-- Board Member Grid -->
                <section class="member-grid-section">
                    <div class="member-grid">

                        <?php
                        $default_titles = array(
                            1 => 'President',
                            2 => 'Vice President',
                            3 => 'Treasurer',
                            4 => 'Secretary',
                            5 => 'Member at Large',
                            6 => 'Member at Large',
                            7 => 'Member at Large',
                            8 => 'Member at Large',
                            9 => 'Member at Large',
                        );

                        for ( $i = 1; $i <= 9; $i++ ) :
                            $name     = get_post_meta( $page_id, "member_{$i}_name", true );
                            $title    = get_post_meta( $page_id, "member_{$i}_title", true );
                            $bio      = get_post_meta( $page_id, "member_{$i}_bio", true );
                            $image_id = get_post_meta( $page_id, "member_{$i}_image", true );

                            if ( ! $name ) {
                                continue;
                            }

                            $name  = esc_html( $name );
                            $title = $title ? esc_html( $title ) : esc_html( $default_titles[ $i ] );
                            $bio   = $bio   ? wp_kses_post( $bio ) : '';

                            $image_url = '';
                            if ( $image_id && is_numeric( $image_id ) ) {
                                $image_url = wp_get_attachment_image_url( $image_id, 'medium' );
                            }
                            ?>
                            <div class="member-card">
                                <div class="member-photo-wrap">
                                    <?php if ( $image_url ) : ?>
                                        <img
                                            class="member-photo"
                                            src="<?php echo esc_url( $image_url ); ?>"
                                            alt="<?php echo esc_attr( $name ); ?>"
                                        >
                                    <?php else : ?>
                                        <div class="member-photo-placeholder">
                                            <svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true">
                                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                <circle cx="12" cy="7" r="4"></circle>
                                            </svg>
                                        </div>
                                    <?php endif; ?>
                                </div>

                                <div class="member-info">
                                    <h3 class="member-name"><?php echo $name; ?></h3>
                                    <p class="member-role"><?php echo $title; ?></p>
                                    <?php if ( $bio ) : ?>
                                        <p class="member-bio"><?php echo $bio; ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endfor; ?>

                    </div>
                </section>

                <!-- CTA Section -->
                <section class="leadership-contact">
                    <h2 class="leadership-contact-title">Get in Touch</h2>
                    <p class="leadership-contact-text">
                        Have questions for our leadership team? We'd love to hear from you.
                    </p>
                    <div class="leadership-contact-buttons">
                        <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="button">Contact Us</a>
                        <a href="<?php echo esc_url( home_url( '/about' ) ); ?>" class="button button-secondary">About Us</a>
                    </div>
                </section>

            </article>

        <?php endwhile; ?>

    </div>
</main>

<?php
get_footer();
