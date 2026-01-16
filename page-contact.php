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

            <div class="entry-content container-narrow">
                <!-- Contact Information Section -->
                <div class="contact-info" style="margin-top: var(--spacing-lg); padding: var(--spacing-lg); background-color: var(--color-beige); border: 2px solid var(--color-slate-blue); border-radius: var(--radius-lg);">
                    <h2 style="text-align: center; margin-bottom: var(--spacing-md); color: var(--color-terracotta);"><?php esc_html_e( 'Get in Touch', 'ramcafe' ); ?></h2>

                    <!-- Contact Form -->
                    <div style="margin-bottom: var(--spacing-lg);">
                        <?php the_content(); ?>
                    </div>

                    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: var(--spacing-md);">
                        <?php
                        $phone   = get_theme_mod( 'ramcafe_phone' );
                        $email   = get_theme_mod( 'ramcafe_email' );
                        $address = get_theme_mod( 'ramcafe_address' );

                        if ( $address ) :
                            ?>
                            <div class="contact-item">
                                <h3 style="color: var(--color-terracotta); font-size: 1.4rem; margin-bottom: var(--spacing-xs); font-weight: 600;">
                                    <?php esc_html_e( 'Visit Us', 'ramcafe' ); ?>
                                </h3>
                                <p style="font-size: 1.125rem; line-height: 1.8; font-weight: 500;"><?php echo nl2br( esc_html( $address ) ); ?></p>
                            </div>
                            <?php
                        endif;

                        if ( $phone ) :
                            ?>
                            <div class="contact-item">
                                <h3 style="color: var(--color-terracotta); font-size: 1.4rem; margin-bottom: var(--spacing-xs); font-weight: 600;">
                                    <?php esc_html_e( 'Call Us', 'ramcafe' ); ?>
                                </h3>
                                <p style="font-size: 1.125rem; line-height: 1.8; font-weight: 500;">
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
                                <h3 style="color: var(--color-terracotta); font-size: 1.4rem; margin-bottom: var(--spacing-xs); font-weight: 600;">
                                    <?php esc_html_e( 'Email Us', 'ramcafe' ); ?>
                                </h3>
                                <p style="font-size: 1.125rem; line-height: 1.8; font-weight: 500;">
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
                            <h3 style="color: var(--color-terracotta); font-size: 1.4rem; margin-bottom: var(--spacing-sm); font-weight: 600;">
                                <?php esc_html_e( 'Follow Us', 'ramcafe' ); ?>
                            </h3>
                            <style>
                                .social-links {
                                    display: flex;
                                    gap: 1rem;
                                    justify-content: center;
                                    align-items: center;
                                }
                                .social-links a {
                                    display: inline-flex;
                                    align-items: center;
                                    justify-content: center;
                                    color: var(--color-terracotta);
                                    transition: color 0.3s ease;
                                }
                                .social-links a:hover {
                                    color: var(--color-sage);
                                }
                                .social-links svg {
                                    width: 32px;
                                    height: 32px;
                                }
                            </style>
                            <?php ramcafe_social_links(); ?>
                        </div>
                        <?php
                    endif;
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
