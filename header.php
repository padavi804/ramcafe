<?php
/**
 * The header template
 *
 * Displays the <head> section and site header
 *
 * @package RAMCafe
 * @since 1.0.0
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'ramcafe' ); ?></a>

    <header id="masthead" class="site-header">
        <div class="container">
            <div class="site-branding">
                <?php
                // Display custom logo if set, otherwise show default horizontal logo
                if ( has_custom_logo() ) {
                    the_custom_logo();
                } else {
                    ?>
                    <div class="site-logo">
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/logo-horizontal.png"
                                 alt="<?php bloginfo( 'name' ); ?>"
                                 class="default-logo">
                        </a>
                    </div>
                    <?php
                }
                ?>

                <div class="site-identity">
                    <?php
                    if ( is_front_page() && is_home() ) :
                        ?>
                        <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                        <?php
                    else :
                        ?>
                        <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                        <?php
                    endif;

                    $description = get_bloginfo( 'description', 'display' );
                    if ( $description || is_customize_preview() ) :
                        ?>
                        <p class="site-description"><?php echo $description; ?></p>
                        <?php
                    endif;
                    ?>
                </div>
            </div>

            <nav id="site-navigation" class="main-navigation">
                <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
                    <?php esc_html_e( 'Menu', 'ramcafe' ); ?>
                </button>
                <?php
                // Display the primary menu
                // Staff can create this menu in Appearance > Menus
                wp_nav_menu(
                    array(
                        'theme_location' => 'primary',
                        'menu_id'        => 'primary-menu',
                        'container'      => false,
                        'fallback_cb'    => 'ramcafe_fallback_menu',
                    )
                );
                ?>
            </nav>
        </div>
    </header>

    <?php
    // Display custom header image if set
    if ( get_header_image() ) :
        ?>
        <div class="header-image">
            <img src="<?php header_image(); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="<?php bloginfo( 'name' ); ?>">
        </div>
        <?php
    endif;
    ?>

    <div id="content" class="site-content">
        <div class="container">

<?php
/**
 * Fallback menu when no menu is assigned
 */
function ramcafe_fallback_menu() {
    echo '<ul id="primary-menu">';
    wp_list_pages(
        array(
            'title_li' => '',
            'depth'    => 1,
        )
    );
    echo '</ul>';
}
