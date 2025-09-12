<?php
/**
 * Du Lịch Việt Nhật Theme Functions
 */

if (!defined('_S_VERSION')) {
    // Replace the version number of the theme on each release.
    define('_S_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function dulichvietnhat_setup() {
    // Add default posts and comments RSS feed links to head.
    add_theme_support('automatic-feed-links');

    // Let WordPress manage the document title.
    add_theme_support('title-tag');

    // Enable support for Post Thumbnails on posts and pages.
    add_theme_support('post-thumbnails');

    // Register navigation menus.
    register_nav_menus(
        array(
            'primary' => esc_html__('Primary Menu', 'dulichvietnhat'),
            'footer'  => esc_html__('Footer Menu', 'dulichvietnhat'),
        )
    );

    // Switch default core markup to output valid HTML5.
    add_theme_support(
        'html5',
        array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
        )
    );

    // Add theme support for selective refresh for widgets.
    add_theme_support('customize-selective-refresh-widgets');

    // Add support for core custom logo.
    add_theme_support(
        'custom-logo',
        array(
            'height'      => 250,
            'width'       => 250,
            'flex-width'  => true,
            'flex-height' => true,
        )
    );

    // Add support for WooCommerce
    add_theme_support('woocommerce');
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');
}
add_action('after_setup_theme', 'dulichvietnhat_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function dulichvietnhat_content_width() {
    $GLOBALS['content_width'] = apply_filters('dulichvietnhat_content_width', 1200);
}
add_action('after_setup_theme', 'dulichvietnhat_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function dulichvietnhat_widgets_init() {
    // Main Sidebar
    register_sidebar(
        array(
            'name'          => esc_html__('Sidebar', 'dulichvietnhat'),
            'id'            => 'sidebar-1',
            'description'   => esc_html__('Add widgets here.', 'dulichvietnhat'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );

    // Footer Widget Areas
    for ($i = 1; $i <= 4; $i++) {
        register_sidebar(
            array(
                'name'          => sprintf(esc_html__('Footer Widget Area %d', 'dulichvietnhat'), $i),
                'id'            => 'footer-' . $i,
                'description'   => esc_html__('Add footer widgets here.', 'dulichvietnhat'),
                'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<h3 class="widget-title">',
                'after_title'   => '</h3>',
            )
        );
    }
}
add_action('widgets_init', 'dulichvietnhat_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function dulichvietnhat_scripts() {
    // Theme stylesheet
    wp_enqueue_style('dulichvietnhat-style', get_stylesheet_uri(), array(), _S_VERSION);
    
    // Google Fonts
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap', array(), null);
    
    // Font Awesome
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css', array(), '6.0.0');
    
    // Main CSS
    wp_enqueue_style('dulichvietnhat-main-style', get_template_directory_uri() . '/assets/css/main.css', array(), _S_VERSION);
    
    // Featured Tours CSS
    wp_enqueue_style('featured-tours-css', get_template_directory_uri() . '/assets/css/featured-tours.css', array(), _S_VERSION);
    
    // Main JavaScript
    wp_enqueue_script('dulichvietnhat-main-js', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), _S_VERSION, true);
    
    // Localize script with theme settings
    wp_localize_script('dulichvietnhat-main-js', 'dulichvietnhatSettings', array(
        'ajaxUrl' => admin_url('admin-ajax.php'),
        'homeUrl' => home_url(),
        'isMobile' => wp_is_mobile(),
    ));

    // Comment reply script
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'dulichvietnhat_scripts');

/**
 * Add preconnect for Google Fonts.
 *
 * @param array  $urls          URLs to print for resource hints.
 * @param string $relation_type The relation type the URLs are printed.
 * @return array $urls           URLs to print for resource hints.
 */
function dulichvietnhat_resource_hints($urls, $relation_type) {
    if (wp_style_is('google-fonts', 'queue') && 'preconnect' === $relation_type) {
        $urls[] = array(
            'href' => 'https://fonts.gstatic.com',
            'crossorigin',
        );
    }
    return $urls;
}
add_filter('wp_resource_hints', 'dulichvietnhat_resource_hints', 10, 2);

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
    require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if (class_exists('WooCommerce')) {
    require get_template_directory() . '/inc/woocommerce.php';
}

/**
 * Register Custom Post Type for Tours
 */
function create_tour_post_type() {
    register_post_type('tour',
        array(
            'labels' => array(
                'name' => __('Tours', 'dulichvietnhat'),
                'singular_name' => __('Tour', 'dulichvietnhat'),
                'add_new' => __('Add New', 'dulichvietnhat'),
                'add_new_item' => __('Add New Tour', 'dulichvietnhat'),
                'edit_item' => __('Edit Tour', 'dulichvietnhat'),
                'new_item' => __('New Tour', 'dulichvietnhat'),
                'view_item' => __('View Tour', 'dulichvietnhat'),
                'search_items' => __('Search Tours', 'dulichvietnhat'),
                'not_found' => __('No tours found', 'dulichvietnhat'),
                'not_found_in_trash' => __('No tours found in Trash', 'dulichvietnhat')
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'tours'),
            'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'comments'),
            'menu_icon' => 'dashicons-palmtree',
            'show_in_rest' => true,
        )
    );
}
add_action('init', 'create_tour_post_type');

/**
 * Register Custom Taxonomies
 */
function create_tour_taxonomies() {
    // Destination Taxonomy
    register_taxonomy(
        'destination',
        'tour',
        array(
            'labels' => array(
                'name' => _x('Destinations', 'taxonomy general name', 'dulichvietnhat'),
                'singular_name' => _x('Destination', 'taxonomy singular name', 'dulichvietnhat'),
                'search_items' => __('Search Destinations', 'dulichvietnhat'),
                'all_items' => __('All Destinations', 'dulichvietnhat'),
                'edit_item' => __('Edit Destination', 'dulichvietnhat'),
                'update_item' => __('Update Destination', 'dulichvietnhat'),
                'add_new_item' => __('Add New Destination', 'dulichvietnhat'),
                'new_item_name' => __('New Destination Name', 'dulichvietnhat'),
                'menu_name' => __('Destinations', 'dulichvietnhat'),
            ),
            'hierarchical' => true,
            'show_admin_column' => true,
            'rewrite' => array('slug' => 'destination'),
        )
    );
    
    // Tour Type Taxonomy
    register_taxonomy(
        'tour_type',
        'tour',
        array(
            'labels' => array(
                'name' => _x('Tour Types', 'taxonomy general name', 'dulichvietnhat'),
                'singular_name' => _x('Tour Type', 'taxonomy singular name', 'dulichvietnhat'),
                'search_items' => __('Search Tour Types', 'dulichvietnhat'),
                'all_items' => __('All Tour Types', 'dulichvietnhat'),
                'edit_item' => __('Edit Tour Type', 'dulichvietnhat'),
                'update_item' => __('Update Tour Type', 'dulichvietnhat'),
                'add_new_item' => __('Add New Tour Type', 'dulichvietnhat'),
                'new_item_name' => __('New Tour Type Name', 'dulichvietnhat'),
                'menu_name' => __('Tour Types', 'dulichvietnhat'),
            ),
            'hierarchical' => true,
            'show_admin_column' => true,
            'rewrite' => array('slug' => 'tour-type'),
        )
    );
}
add_action('init', 'create_tour_taxonomies', 0);

/**
 * Add custom image sizes
 */
function dulichvietnhat_add_image_sizes() {
    // Featured Tour Image
    add_image_size('tour-thumbnail', 350, 250, true);
    
    // Destination Thumbnail
    add_image_size('destination-thumbnail', 400, 300, true);
    
    // Blog Post Thumbnail
    add_image_size('post-thumbnail-large', 800, 500, true);
}
add_action('after_setup_theme', 'dulichvietnhat_add_image_sizes');

/**
 * Custom excerpt length
 */
function dulichvietnhat_excerpt_length($length) {
    return 20;
}
add_filter('excerpt_length', 'dulichvietnhat_excerpt_length', 999);

/**
 * Custom excerpt more
 */
function dulichvietnhat_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'dulichvietnhat_excerpt_more');