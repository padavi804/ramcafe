<?php
/**
 * Template Name: Contact Page
 *
 * Template for displaying the contact page with additional contact information
 *
 * @package RAMCafe
 * @since 1.0.0
 */

get_header();
?>

<main id="primary" class="site-main">

    <?php
    while ( have_posts() ) :
        the_post();
        ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

            <header class="entry-header text-center">
                <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
            </header>

            <div class="entry-content container-narrow">
                <?php
                the_content();

                wp_link_pages(
                    array(
                        'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'ramcafe' ),
                        'after'  => '</div>',
                    )
                );
                ?>

                <!-- Contact Information Section -->
                <div class="contact-info" style="margin-top: var(--spacing-lg); padding: var(--spacing-lg); background-color: var(--color-beige); border-radius: var(--radius-lg);">
                    <h2 style="text-align: center; margin-bottom: var(--spacing-md);"><?php esc_html_e( 'Get in Touch', 'ramcafe' ); ?></h2>

                    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: var(--spacing-md);">
                        <?php
                        $phone   = get_theme_mod( 'ramcafe_phone' );
                        $email   = get_theme_mod( 'ramcafe_email' );
                        $address = get_theme_mod( 'ramcafe_address' );

                        if ( $address ) :
                            ?>
                            <div class="contact-item">
                                <h3 style="color: var(--color-terracotta); font-size: 1.25rem; margin-bottom: var(--spacing-xs);">
                                    <?php esc_html_e( 'Visit Us', 'ramcafe' ); ?>
                                </h3>
                                <p><?php echo nl2br( esc_html( $address ) ); ?></p>
                            </div>
                            <?php
                        endif;

                        if ( $phone ) :
                            ?>
                            <div class="contact-item">
                                <h3 style="color: var(--color-terracotta); font-size: 1.25rem; margin-bottom: var(--spacing-xs);">
                                    <?php esc_html_e( 'Call Us', 'ramcafe' ); ?>
                                </h3>
                                <p>
                                    <a href="tel:<?php echo esc_attr( preg_replace( '/[^0-9+]/', '', $phone ) ); ?>">
                                        <?php echo esc_html( $phone ); ?>
                                    </a>
                                </p>
                            </div>
                            <?php
                        endif;

                        if ( $email ) :
                            ?>
                            <div class="contact-item">
                                <h3 style="color: var(--color-terracotta); font-size: 1.25rem; margin-bottom: var(--spacing-xs);">
                                    <?php esc_html_e( 'Email Us', 'ramcafe' ); ?>
                                </h3>
                                <p>
                                    <a href="mailto:<?php echo esc_attr( $email ); ?>">
                                        <?php echo esc_html( $email ); ?>
                                    </a>
                                </p>
                            </div>
                            <?php
                        endif;
                        ?>
                    </div>

                    <?php
                    // Display social media links if any are set
                    if ( get_theme_mod( 'ramcafe_facebook' ) || get_theme_mod( 'ramcafe_instagram' ) ) :
                        ?>
                        <div class="contact-social" style="margin-top: var(--spacing-md); text-align: center;">
                            <h3 style="color: var(--color-terracotta); font-size: 1.25rem; margin-bottom: var(--spacing-sm);">
                                <?php esc_html_e( 'Follow Us', 'ramcafe' ); ?>
                            </h3>
                            <?php ramcafe_social_links(); ?>
                        </div>
                        <?php
                    endif;
                    ?>
                </div>

                <!-- Contact Form Section -->
                <div class="contact-form-section" style="margin-top: var(--spacing-lg);">
                    <h2 style="text-align: center; margin-bottom: var(--spacing-md);"><?php esc_html_e( 'Send Us a Message', 'ramcafe' ); ?></h2>

                    <?php
                    // Display contact form shortcode if a form plugin is active
                    // Example: [contact-form-7 id="123" title="Contact form"]
                    // Or: [wpforms id="123"]
                    // Or: [ninja_form id=123]

                    // Check if Contact Form 7 is active and display a placeholder message
                    if ( function_exists( 'wpcf7' ) ) {
                        echo '<p style="text-align: center; color: var(--color-gray-medium);">';
                        echo esc_html__( 'Please add your Contact Form 7 shortcode here.', 'ramcafe' );
                        echo '<br>';
                        echo esc_html__( 'Example: [contact-form-7 id="123" title="Contact form"]', 'ramcafe' );
                        echo '</p>';
                    } else {
                        echo '<p style="text-align: center; color: var(--color-gray-medium);">';
                        echo esc_html__( 'Install a contact form plugin like Contact Form 7, WPForms, or Ninja Forms to enable the contact form.', 'ramcafe' );
                        echo '</p>';
                    }
                    ?>
                </div>

            </div><!-- .entry-content -->

        </article><!-- #post-<?php the_ID(); ?> -->

        <?php
    endwhile;
    ?>

</main><!-- #primary -->

<?php
get_footer();
