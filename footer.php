<?php
/**
 * The footer template
 *
 * Displays the site footer with widget areas and copyright
 *
 * @package RAMCafe
 * @since 1.0.0
 */
?>

        </div><!-- .container -->
    </div><!-- #content -->

    <footer id="colophon" class="site-footer">
        <div class="container">
            <?php
            // Check if any footer widget areas have widgets
            $has_footer_widgets = is_active_sidebar( 'footer-1' ) || is_active_sidebar( 'footer-2' ) || is_active_sidebar( 'footer-3' );

            if ( $has_footer_widgets ) :
                ?>
                <div class="footer-content">
                    <?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
                        <div class="footer-widget-area">
                            <?php dynamic_sidebar( 'footer-1' ); ?>
                        </div>
                    <?php endif; ?>

                    <?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
                        <div class="footer-widget-area">
                            <?php dynamic_sidebar( 'footer-2' ); ?>
                        </div>
                    <?php endif; ?>

                    <?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
                        <div class="footer-widget-area">
                            <?php dynamic_sidebar( 'footer-3' ); ?>
                        </div>
                    <?php endif; ?>
                </div>
                <?php
            endif;
            ?>

            <div class="site-info">
                <?php
                // Display contact information from Customizer
                $phone   = get_theme_mod( 'ramcafe_phone' );
                $email   = get_theme_mod( 'ramcafe_email' );
                $address = get_theme_mod( 'ramcafe_address' );

                if ( $address ) :
                    ?>
                    <p class="footer-address">
                        <strong><?php esc_html_e( 'Location:', 'ramcafe' ); ?></strong> <?php echo esc_html( $address ); ?>
                    </p>
                    <?php
                endif;

                if ( $phone || $email ) :
                    ?>
                    <p class="footer-contact">
                        <?php if ( $phone ) : ?>
                            <span class="footer-phone">
                                <strong><?php esc_html_e( 'Phone:', 'ramcafe' ); ?></strong>
                                <a href="tel:<?php echo esc_attr( preg_replace( '/[^0-9+]/', '', $phone ) ); ?>"><?php echo esc_html( $phone ); ?></a>
                            </span>
                        <?php endif; ?>

                        <?php if ( $phone && $email ) : ?>
                            <span class="separator"> | </span>
                        <?php endif; ?>

                        <?php if ( $email ) : ?>
                            <span class="footer-email">
                                <strong><?php esc_html_e( 'Email:', 'ramcafe' ); ?></strong>
                                <a href="mailto:<?php echo esc_attr( $email ); ?>"><?php echo esc_html( $email ); ?></a>
                            </span>
                        <?php endif; ?>
                    </p>
                    <?php
                endif;

                // Display social media links
                ramcafe_social_links();

                // Display footer menu if assigned
                if ( has_nav_menu( 'footer' ) ) :
                    ?>
                    <nav class="footer-navigation">
                        <?php
                        wp_nav_menu(
                            array(
                                'theme_location' => 'footer',
                                'menu_id'        => 'footer-menu',
                                'depth'          => 1,
                                'container'      => false,
                            )
                        );
                        ?>
                    </nav>
                    <?php
                endif;
                ?>

                <p class="copyright">
                    <?php
                    printf(
                        esc_html__( '&copy; %1$s %2$s. All rights reserved.', 'ramcafe' ),
                        date_i18n( 'Y' ),
                        get_bloginfo( 'name' )
                    );
                    ?>
                </p>

                <p class="theme-credit">
                    <?php
                    printf(
                        esc_html__( 'Powered by %1$s', 'ramcafe' ),
                        '<a href="https://wordpress.org/">WordPress</a>'
                    );
                    ?>
                </p>
            </div><!-- .site-info -->
        </div><!-- .container -->
    </footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
