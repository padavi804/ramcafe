<?php
/**
 * Rivers Area Memory Café Theme Functions
 *
 * @package RAMCafe
 * @since 1.0.0
 */

// Prevent direct access
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Theme Setup
 *
 * This function runs when the theme is initialized. It registers support
 * for various WordPress features like menus, post thumbnails, etc.
 */
function ramcafe_setup() {
    // Make theme available for translation
    load_theme_textdomain( 'ramcafe', get_template_directory() . '/languages' );

    // Add default posts and comments RSS feed links to head
    add_theme_support( 'automatic-feed-links' );

    // Let WordPress manage the document title
    // This adds <title> tag support
    add_theme_support( 'title-tag' );

    // Enable support for Post Thumbnails (featured images)
    add_theme_support( 'post-thumbnails' );

    // Set default thumbnail size
    set_post_thumbnail_size( 1200, 630, true );

    // Add additional image sizes for different use cases
    add_image_size( 'ramcafe-featured', 800, 450, true );
    add_image_size( 'ramcafe-thumbnail', 400, 300, true );

    // Register navigation menus
    // Staff can assign menus to these locations in Appearance > Menus
    register_nav_menus( array(
        'primary' => esc_html__( 'Primary Menu', 'ramcafe' ),
        'footer'  => esc_html__( 'Footer Menu', 'ramcafe' ),
    ) );

    // Switch default core markup for search form, comment form, and comments
    // to output valid HTML5
    add_theme_support( 'html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ) );

    // Add support for Block Styles (WordPress block editor)
    add_theme_support( 'wp-block-styles' );

    // Add support for responsive embedded content
    add_theme_support( 'responsive-embeds' );

    // Add support for editor styles
    add_theme_support( 'editor-styles' );

    // Add custom logo support
    // Staff can upload logo in Customizer > Site Identity
    add_theme_support( 'custom-logo', array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
    ) );

    // Add support for custom header
    add_theme_support( 'custom-header', array(
        'default-image'      => '',
        'width'              => 1920,
        'height'             => 500,
        'flex-height'        => true,
        'flex-width'         => true,
        'header-text'        => true,
        'default-text-color' => 'CE593A',
    ) );

    // Add support for custom background
    add_theme_support( 'custom-background', array(
        'default-color' => 'ffffff',
    ) );
}
add_action( 'after_setup_theme', 'ramcafe_setup' );

/**
 * Set content width
 *
 * This prevents content from breaking the layout
 */
if ( ! isset( $content_width ) ) {
    $content_width = 1200;
}

/**
 * Enqueue Styles and Scripts
 *
 * This function loads CSS and JavaScript files for the theme
 */
function ramcafe_scripts() {
    // Enqueue Google Fonts - Montserrat
    wp_enqueue_style( 'ramcafe-google-fonts', 'https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&display=swap', array(), null );

    // Enqueue main stylesheet
    wp_enqueue_style( 'ramcafe-style', get_stylesheet_uri(), array( 'ramcafe-google-fonts' ), '1.0.0' );

    // Enqueue custom JavaScript for navigation
    wp_enqueue_script( 'ramcafe-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '1.0.0', true );

    // Enqueue comment reply script on singular posts/pages with comments open
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'ramcafe_scripts' );

/**
 * Register Widget Areas (Sidebars)
 *
 * Staff can add widgets to these areas in Appearance > Widgets
 */
function ramcafe_widgets_init() {
    // Footer Widget Area 1
    register_sidebar( array(
        'name'          => esc_html__( 'Footer Area 1', 'ramcafe' ),
        'id'            => 'footer-1',
        'description'   => esc_html__( 'Appears in the footer - first column', 'ramcafe' ),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    // Footer Widget Area 2
    register_sidebar( array(
        'name'          => esc_html__( 'Footer Area 2', 'ramcafe' ),
        'id'            => 'footer-2',
        'description'   => esc_html__( 'Appears in the footer - second column', 'ramcafe' ),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    // Footer Widget Area 3
    register_sidebar( array(
        'name'          => esc_html__( 'Footer Area 3', 'ramcafe' ),
        'id'            => 'footer-3',
        'description'   => esc_html__( 'Appears in the footer - third column', 'ramcafe' ),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    // Sidebar Widget Area (optional for blog posts)
    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar', 'ramcafe' ),
        'id'            => 'sidebar-1',
        'description'   => esc_html__( 'Appears on blog posts and archives', 'ramcafe' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
}
add_action( 'widgets_init', 'ramcafe_widgets_init' );

/**
 * Custom Excerpt Length
 *
 * Limits post excerpts to 30 words instead of default 55
 */
function ramcafe_excerpt_length( $length ) {
    return 30;
}
add_filter( 'excerpt_length', 'ramcafe_excerpt_length' );

/**
 * Custom Excerpt More Text
 *
 * Changes the [...] to a custom "Read more" link
 */
function ramcafe_excerpt_more( $more ) {
    return '... <a class="read-more" href="' . get_permalink() . '">' . esc_html__( 'Read More', 'ramcafe' ) . '</a>';
}
add_filter( 'excerpt_more', 'ramcafe_excerpt_more' );

/**
 * Add Custom Body Classes
 *
 * Adds helpful classes to the <body> tag for styling purposes
 */
function ramcafe_body_classes( $classes ) {
    // Add a class if there's a custom header image
    if ( get_header_image() ) {
        $classes[] = 'has-header-image';
    }

    // Add class for pages without sidebar
    if ( ! is_active_sidebar( 'sidebar-1' ) || is_page() ) {
        $classes[] = 'no-sidebar';
    }

    return $classes;
}
add_filter( 'body_class', 'ramcafe_body_classes' );

/**
 * Customizer Additions
 *
 * Adds theme-specific options to the WordPress Customizer
 */
function ramcafe_customize_register( $wp_customize ) {
    // Add Contact Information Section
    $wp_customize->add_section( 'ramcafe_contact_info', array(
        'title'    => esc_html__( 'Contact Information', 'ramcafe' ),
        'priority' => 30,
    ) );

    // Phone Number
    $wp_customize->add_setting( 'ramcafe_phone', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'ramcafe_phone', array(
        'label'   => esc_html__( 'Phone Number', 'ramcafe' ),
        'section' => 'ramcafe_contact_info',
        'type'    => 'text',
    ) );

    // Email Address
    $wp_customize->add_setting( 'ramcafe_email', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_email',
    ) );

    $wp_customize->add_control( 'ramcafe_email', array(
        'label'   => esc_html__( 'Email Address', 'ramcafe' ),
        'section' => 'ramcafe_contact_info',
        'type'    => 'email',
    ) );

    // Address
    $wp_customize->add_setting( 'ramcafe_address', array(
        'default'           => 'Fergus Falls YMCA',
        'sanitize_callback' => 'sanitize_textarea_field',
    ) );

    $wp_customize->add_control( 'ramcafe_address', array(
        'label'   => esc_html__( 'Address', 'ramcafe' ),
        'section' => 'ramcafe_contact_info',
        'type'    => 'textarea',
    ) );

    // Social Media Links Section
    $wp_customize->add_section( 'ramcafe_social_media', array(
        'title'    => esc_html__( 'Social Media Links', 'ramcafe' ),
        'priority' => 35,
    ) );

    // Facebook
    $wp_customize->add_setting( 'ramcafe_facebook', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ) );

    $wp_customize->add_control( 'ramcafe_facebook', array(
        'label'   => esc_html__( 'Facebook URL', 'ramcafe' ),
        'section' => 'ramcafe_social_media',
        'type'    => 'url',
    ) );

    // Instagram
    $wp_customize->add_setting( 'ramcafe_instagram', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ) );

    $wp_customize->add_control( 'ramcafe_instagram', array(
        'label'   => esc_html__( 'Instagram URL', 'ramcafe' ),
        'section' => 'ramcafe_social_media',
        'type'    => 'url',
    ) );
}
add_action( 'customize_register', 'ramcafe_customize_register' );

/**
 * Display social media links
 *
 * Helper function to output social media icons
 */
function ramcafe_social_links() {
    $facebook  = get_theme_mod( 'ramcafe_facebook' );
    $instagram = get_theme_mod( 'ramcafe_instagram' );

    if ( ! $facebook && ! $instagram ) {
        return;
    }

    echo '<div class="social-links">';

    if ( $facebook ) {
        echo '<a href="' . esc_url( $facebook ) . '" target="_blank" rel="noopener noreferrer" aria-label="' . esc_attr__( 'Facebook', 'ramcafe' ) . '">';
        echo '<span class="screen-reader-text">' . esc_html__( 'Facebook', 'ramcafe' ) . '</span>';
        echo '<svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>';
        echo '</a>';
    }

    if ( $instagram ) {
        echo '<a href="' . esc_url( $instagram ) . '" target="_blank" rel="noopener noreferrer" aria-label="' . esc_attr__( 'Instagram', 'ramcafe' ) . '">';
        echo '<span class="screen-reader-text">' . esc_html__( 'Instagram', 'ramcafe' ) . '</span>';
        echo '<svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>';
        echo '</a>';
    }

    echo '</div>';
}

/**
 * Include custom template tags and functions
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Include About page meta boxes for feature images
 */
require get_template_directory() . '/inc/about-page-meta-boxes.php';

/**
 * Security: Remove WordPress version from head
 */
remove_action( 'wp_head', 'wp_generator' );

/**
 * Register Custom Meta Boxes for About Page
 *
 * Provides a user-friendly interface for editing About page content
 */
function ramcafe_add_about_page_meta_boxes() {
    add_meta_box(
        'ramcafe_about_page_fields',
        __( 'About Page Content Settings', 'ramcafe' ),
        'ramcafe_about_page_meta_box_callback',
        'page',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'ramcafe_add_about_page_meta_boxes' );

/**
 * Meta Box Callback - Display the fields
 */
function ramcafe_about_page_meta_box_callback( $post ) {
    // Only show on About page template
    $template = get_post_meta( $post->ID, '_wp_page_template', true );

    if ( 'page-about.php' !== $template ) {
        echo '<p>' . __( 'These fields are only available when using the "About/Mission Page" template.', 'ramcafe' ) . '</p>';
        echo '<p>' . __( 'To use this template, select it from the "Template" dropdown in the Page Attributes section on the right.', 'ramcafe' ) . '</p>';
        return;
    }

    // Add nonce for security
    wp_nonce_field( 'ramcafe_about_page_meta_box', 'ramcafe_about_page_nonce' );

    // Get current values
    $cafe_heading = get_post_meta( $post->ID, 'cafe_heading', true );
    $cafe_description = get_post_meta( $post->ID, 'cafe_description', true );

    $feature_1_title = get_post_meta( $post->ID, 'feature_1_title', true );
    $feature_1_text = get_post_meta( $post->ID, 'feature_1_text', true );

    $feature_2_title = get_post_meta( $post->ID, 'feature_2_title', true );
    $feature_2_text = get_post_meta( $post->ID, 'feature_2_text', true );

    $feature_3_title = get_post_meta( $post->ID, 'feature_3_title', true );
    $feature_3_text = get_post_meta( $post->ID, 'feature_3_text', true );

    ?>
    <style>
        .ramcafe-meta-box-field { margin-bottom: 20px; }
        .ramcafe-meta-box-field label { display: block; font-weight: 600; margin-bottom: 5px; }
        .ramcafe-meta-box-field input[type="text"] { width: 100%; padding: 8px; }
        .ramcafe-meta-box-field textarea { width: 100%; padding: 8px; min-height: 80px; }
        .ramcafe-meta-box-field .description { font-size: 13px; color: #666; margin-top: 5px; font-style: italic; }
        .ramcafe-section-header { background: #f0f0f0; padding: 12px; margin: 20px -12px 15px; font-weight: 600; border-left: 4px solid #CE593A; }
        .ramcafe-field-group { border: 1px solid #e5e5e5; padding: 15px; margin-bottom: 15px; background: #fafafa; }
    </style>

    <div class="ramcafe-meta-box-fields">

        <p><strong><?php _e( 'Note:', 'ramcafe' ); ?></strong> <?php _e( 'Your mission statement is entered in the main content editor above. The fields below control the other sections of the About page.', 'ramcafe' ); ?></p>

        <div class="ramcafe-section-header">
            <?php _e( 'Memory Café Section', 'ramcafe' ); ?>
        </div>

        <div class="ramcafe-meta-box-field">
            <label for="cafe_heading">
                <?php _e( 'Section Heading', 'ramcafe' ); ?>
            </label>
            <input
                type="text"
                id="cafe_heading"
                name="cafe_heading"
                value="<?php echo esc_attr( $cafe_heading ); ?>"
                placeholder="<?php _e( 'What is a Memory Café?', 'ramcafe' ); ?>"
            />
            <p class="description">
                <?php _e( 'Leave blank to use default: "What is a Memory Café?"', 'ramcafe' ); ?>
            </p>
        </div>

        <div class="ramcafe-meta-box-field">
            <label for="cafe_description">
                <?php _e( 'Section Description', 'ramcafe' ); ?>
            </label>
            <textarea
                id="cafe_description"
                name="cafe_description"
                placeholder="<?php _e( 'Memory Cafés are welcoming gatherings...', 'ramcafe' ); ?>"
            ><?php echo esc_textarea( $cafe_description ); ?></textarea>
            <p class="description">
                <?php _e( 'Leave blank to use default text.', 'ramcafe' ); ?>
            </p>
        </div>

        <div class="ramcafe-section-header">
            <?php _e( 'Feature Boxes', 'ramcafe' ); ?>
        </div>

        <div class="ramcafe-field-group">
            <h4 style="margin-top: 0;"><?php _e( 'Feature Box 1 (Social Connection)', 'ramcafe' ); ?></h4>

            <div class="ramcafe-meta-box-field">
                <label for="feature_1_title">
                    <?php _e( 'Title', 'ramcafe' ); ?>
                </label>
                <input
                    type="text"
                    id="feature_1_title"
                    name="feature_1_title"
                    value="<?php echo esc_attr( $feature_1_title ); ?>"
                    placeholder="<?php _e( 'Social Connection', 'ramcafe' ); ?>"
                />
            </div>

            <div class="ramcafe-meta-box-field">
                <label for="feature_1_text">
                    <?php _e( 'Description', 'ramcafe' ); ?>
                </label>
                <textarea
                    id="feature_1_text"
                    name="feature_1_text"
                    placeholder="<?php _e( 'Build friendships and feel part of a community...', 'ramcafe' ); ?>"
                ><?php echo esc_textarea( $feature_1_text ); ?></textarea>
            </div>
        </div>

        <div class="ramcafe-field-group">
            <h4 style="margin-top: 0;"><?php _e( 'Feature Box 2 (Safe & Welcoming)', 'ramcafe' ); ?></h4>

            <div class="ramcafe-meta-box-field">
                <label for="feature_2_title">
                    <?php _e( 'Title', 'ramcafe' ); ?>
                </label>
                <input
                    type="text"
                    id="feature_2_title"
                    name="feature_2_title"
                    value="<?php echo esc_attr( $feature_2_title ); ?>"
                    placeholder="<?php _e( 'Safe & Welcoming', 'ramcafe' ); ?>"
                />
            </div>

            <div class="ramcafe-meta-box-field">
                <label for="feature_2_text">
                    <?php _e( 'Description', 'ramcafe' ); ?>
                </label>
                <textarea
                    id="feature_2_text"
                    name="feature_2_text"
                    placeholder="<?php _e( 'A judgment-free space where you can be yourself...', 'ramcafe' ); ?>"
                ><?php echo esc_textarea( $feature_2_text ); ?></textarea>
            </div>
        </div>

        <div class="ramcafe-field-group">
            <h4 style="margin-top: 0;"><?php _e( 'Feature Box 3 (Engaging Activities)', 'ramcafe' ); ?></h4>

            <div class="ramcafe-meta-box-field">
                <label for="feature_3_title">
                    <?php _e( 'Title', 'ramcafe' ); ?>
                </label>
                <input
                    type="text"
                    id="feature_3_title"
                    name="feature_3_title"
                    value="<?php echo esc_attr( $feature_3_title ); ?>"
                    placeholder="<?php _e( 'Engaging Activities', 'ramcafe' ); ?>"
                />
            </div>

            <div class="ramcafe-meta-box-field">
                <label for="feature_3_text">
                    <?php _e( 'Description', 'ramcafe' ); ?>
                </label>
                <textarea
                    id="feature_3_text"
                    name="feature_3_text"
                    placeholder="<?php _e( 'Participate in memory-friendly activities...', 'ramcafe' ); ?>"
                ><?php echo esc_textarea( $feature_3_text ); ?></textarea>
            </div>
        </div>

        <p style="background: #fff3cd; border-left: 4px solid #ffc107; padding: 12px; margin-top: 20px;">
            <strong><?php _e( 'Tip:', 'ramcafe' ); ?></strong>
            <?php _e( 'Leave any field blank to use the default text. This makes it easy to reset if needed.', 'ramcafe' ); ?>
        </p>

    </div>
    <?php
}

/**
 * Save Meta Box Data
 */
function ramcafe_save_about_page_meta_box( $post_id ) {
    // Verify nonce
    if ( ! isset( $_POST['ramcafe_about_page_nonce'] ) ) {
        return;
    }

    if ( ! wp_verify_nonce( $_POST['ramcafe_about_page_nonce'], 'ramcafe_about_page_meta_box' ) ) {
        return;
    }

    // Check if autosave
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }

    // Check user permissions
    if ( ! current_user_can( 'edit_post', $post_id ) ) {
        return;
    }

    // List of fields to save
    $fields = array(
        'cafe_heading',
        'cafe_description',
        'feature_1_title',
        'feature_1_text',
        'feature_2_title',
        'feature_2_text',
        'feature_3_title',
        'feature_3_text',
    );

    // Save each field
    foreach ( $fields as $field ) {
        if ( isset( $_POST[ $field ] ) ) {
            // Sanitize based on field type
            if ( strpos( $field, '_text' ) !== false || strpos( $field, '_description' ) !== false ) {
                // Allow some HTML in text/description fields
                $value = wp_kses_post( $_POST[ $field ] );
            } else {
                // Plain text for titles/headings
                $value = sanitize_text_field( $_POST[ $field ] );
            }

            update_post_meta( $post_id, $field, $value );
        }
    }

    // Save feature images (from the Café Feature Images meta box)
    $image_fields = array( 'feature_1_image', 'feature_2_image', 'feature_3_image' );

    foreach ( $image_fields as $image_field ) {
        if ( isset( $_POST[ $image_field ] ) && ! empty( $_POST[ $image_field ] ) ) {
            $image_id = absint( $_POST[ $image_field ] );
            update_post_meta( $post_id, $image_field, $image_id );
        } elseif ( isset( $_POST[ $image_field ] ) && empty( $_POST[ $image_field ] ) ) {
            delete_post_meta( $post_id, $image_field );
        }
    }
}
add_action( 'save_post', 'ramcafe_save_about_page_meta_box' );

/**
 * Create default Home page on theme activation
 *
 * This function creates a Home page and sets it as the front page
 * so that staff can edit it through the Pages section in WordPress admin.
 */
function ramcafe_create_home_page() {
    // Check if we've already run this on activation
    if ( get_option( 'ramcafe_home_page_created' ) ) {
        return;
    }

    // Check if a page with slug 'home' already exists
    $home_page = get_page_by_path( 'home' );

    if ( ! $home_page ) {
        // Create the Home page
        $home_page_id = wp_insert_post( array(
            'post_title'     => __( 'Home', 'ramcafe' ),
            'post_content'   => __( 'Welcome to Rivers Area Memory Café! We provide a welcoming and supportive community for individuals with memory loss and their care partners.', 'ramcafe' ),
            'post_status'    => 'publish',
            'post_type'      => 'page',
            'post_name'      => 'home',
            'comment_status' => 'closed',
            'ping_status'    => 'closed',
        ) );

        // Set this page as the front page
        if ( $home_page_id && ! is_wp_error( $home_page_id ) ) {
            update_option( 'page_on_front', $home_page_id );
            update_option( 'show_on_front', 'page' );
        }
    } else {
        // If home page exists, just set it as the front page
        update_option( 'page_on_front', $home_page->ID );
        update_option( 'show_on_front', 'page' );
    }

    // Mark that we've created the home page
    update_option( 'ramcafe_home_page_created', true );
}
add_action( 'after_switch_theme', 'ramcafe_create_home_page' );

/**
 * Show admin notice if Home page doesn't exist
 */
function ramcafe_home_page_admin_notice() {
    // Only show to administrators
    if ( ! current_user_can( 'manage_options' ) ) {
        return;
    }

    // Check if home page has been created
    if ( get_option( 'ramcafe_home_page_created' ) ) {
        return;
    }

    // Check if we're dismissing the notice
    if ( isset( $_GET['ramcafe_create_home'] ) && $_GET['ramcafe_create_home'] === '1' ) {
        ramcafe_create_home_page();
        echo '<div class="notice notice-success is-dismissible">';
        echo '<p><strong>' . __( 'Home page created successfully!', 'ramcafe' ) . '</strong> ' . __( 'You can now edit it in Pages > Home.', 'ramcafe' ) . '</p>';
        echo '</div>';
        return;
    }

    // Show the notice
    $create_url = add_query_arg( 'ramcafe_create_home', '1' );
    ?>
    <div class="notice notice-info">
        <p>
            <strong><?php _e( 'RAMCafe Theme Setup:', 'ramcafe' ); ?></strong>
            <?php _e( 'Would you like to create a Home page that you can edit in the Pages section?', 'ramcafe' ); ?>
            <a href="<?php echo esc_url( $create_url ); ?>" class="button button-primary" style="margin-left: 10px;">
                <?php _e( 'Create Home Page', 'ramcafe' ); ?>
            </a>
        </p>
    </div>
    <?php
}
add_action( 'admin_notices', 'ramcafe_home_page_admin_notice' );
