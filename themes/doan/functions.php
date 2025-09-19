<?php

if (!defined('_S_VERSION')) {
    define('_S_VERSION', '1.0.0');
}

function dulichvietnhat_setup() {
    add_theme_support('automatic-feed-links');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    register_nav_menus(
        array(
            'primary' => esc_html__('Primary Menu', 'dulichvietnhat'),
            'footer'  => esc_html__('Footer Menu', 'dulichvietnhat'),
        )
    );

   
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

    add_theme_support('customize-selective-refresh-widgets');


    add_theme_support(
        'custom-logo',
        array(
            'height'      => 250,
            'width'       => 250,
            'flex-width'  => true,
            'flex-height' => true,
        )
    );

    add_theme_support('woocommerce');
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');
}
add_action('after_setup_theme', 'dulichvietnhat_setup');

add_action('after_setup_theme', function(){
    add_theme_support('title-tag');
});

add_filter('document_title_separator', function($sep){ return '|'; });
add_filter('document_title_parts', function($parts){
    if (is_front_page() || is_home()) {
        $parts['title'] = get_bloginfo('name');
        $parts['tagline'] = get_bloginfo('description');
    }
    return $parts;
});

add_action('wp_head', function(){
    if (!function_exists('has_site_icon') || !has_site_icon()) {
        $base = get_stylesheet_directory_uri() . '/icon';
        echo '<link rel="icon" href="' . esc_url($base . '/favicon.ico') . '" sizes="any">';
        echo '<link rel="icon" type="image/png" href="' . esc_url($base . '/favicon-32.png') . '" sizes="32x32">';
        echo '<link rel="icon" type="image/png" href="' . esc_url($base . '/favicon-16.png') . '" sizes="16x16">';
        echo '<link rel="apple-touch-icon" href="' . esc_url($base . '/apple-touch-icon.png') . '" sizes="180x180">';
        $manifest = $base . '/site.webmanifest';
        echo '<link rel="manifest" href="' . esc_url($manifest) . '">';
        echo '<meta name="theme-color" content="#ffffff">';
    }
}, 1);

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
    $style_path = get_stylesheet_directory() . '/style.css';
    $style_version = file_exists($style_path) ? filemtime($style_path) : _S_VERSION;
    wp_enqueue_style('dulichvietnhat-style', get_stylesheet_uri(), array(), $style_version);

    $assets = array(
        'header-css'              => '/assets/css/header.css',
        'header-override-css'     => '/assets/css/header-override.css',
        'banner-css'              => '/assets/css/banner.css',
        'featured-posts-css'      => '/assets/css/featured-posts.css',
        'featured-tours-css'      => '/assets/css/featured-tours.css',
        'placeholder-images-css'  => '/assets/css/placeholder-images.css'
    );
    foreach ($assets as $handle => $rel) {
        $path = get_stylesheet_directory() . $rel;
        if (file_exists($path)) {
            $ver = filemtime($path);
            wp_enqueue_style($handle, get_stylesheet_directory_uri() . $rel, array('dulichvietnhat-style'), $ver);
        }
    }

    wp_enqueue_script('jquery');
    wp_enqueue_script('dulichvietnhat-main-js', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), _S_VERSION, true);
    wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/assets/js/bootstrap.bundle.js', array('jquery'), _S_VERSION, true);
    wp_enqueue_script('header-js', get_template_directory_uri() . '/assets/js/header.js', array('jquery'), _S_VERSION, true);
    wp_enqueue_script('banner-js', get_template_directory_uri() . '/assets/js/banner.js', array('jquery'), _S_VERSION, true);
    wp_enqueue_script('dulichvietnhat-custom-js', get_template_directory_uri() . '/assets/js/custom.js', array('jquery'), _S_VERSION, true);

    wp_localize_script('dulichvietnhat-custom-js', 'dulichvietnhatSettings', array(
        'ajaxUrl' => admin_url('admin-ajax.php'),
        'homeUrl' => home_url(),
        'isMobile' => wp_is_mobile(),
    ));

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }

    $main_path = get_stylesheet_directory() . '/main.css';
    if (file_exists($main_path)) {
        $main_version = filemtime($main_path);
        wp_enqueue_style('dulichvietnhat-main', get_stylesheet_directory_uri() . '/main.css', array('dulichvietnhat-style','header-css','banner-css','featured-posts-css','featured-tours-css'), $main_version);
        $overlay_fix_css = '.posts-grid .post-category,.post-card .post-category,.tour-card .post-category,.card .post-category{display:none!important}.post-thumbnail .overlay,.post-thumbnail::before,.post-thumbnail::after,.post-image::before,.post-image::after,.tour-image::before,.tour-image::after,.destination-image::before,.destination-image::after,.entry-media::before,.entry-media::after{content:none!important;display:none!important;background:transparent!important;opacity:0!important}.post-thumbnail img,.post-image img,.tour-image img,.destination-image img,.entry-media img{filter:none!important;opacity:1!important}.custom-logo{max-height:48px;width:auto;height:auto}.site-header .logo-text{margin-left:10px;display:inline-block;vertical-align:middle}';
        wp_add_inline_style('dulichvietnhat-main', $overlay_fix_css);
    }
}
add_action('wp_enqueue_scripts', 'dulichvietnhat_scripts', 100);

/**
 * Handle custom contact form submission
 */
function handle_contact_form_submission() {
    if (isset($_POST['contact_form_nonce']) && wp_verify_nonce($_POST['contact_form_nonce'], 'contact_form_action')) {
        $name = sanitize_text_field($_POST['contact_name']);
        $phone = sanitize_text_field($_POST['contact_phone']);
        $email = sanitize_email($_POST['contact_email']);
        $tour = sanitize_text_field($_POST['contact_tour']);
        $message = sanitize_textarea_field($_POST['contact_message']);

        // Email content
        $subject = 'Yêu cầu tư vấn tour từ ' . $name;
        $body = "Thông tin khách hàng:\n\n";
        $body .= "Họ và tên: " . $name . "\n";
        $body .= "Số điện thoại: " . $phone . "\n";
        $body .= "Email: " . $email . "\n";
        $body .= "Tour quan tâm: " . $tour . "\n";
        $body .= "Tin nhắn: " . $message . "\n\n";
        $body .= "Thời gian: " . current_time('d/m/Y H:i:s');

        // Send email
        $admin_email = get_option('admin_email');
        $headers = array('Content-Type: text/plain; charset=UTF-8');

        if (wp_mail($admin_email, $subject, $body, $headers)) {
            // Success message
            add_action('wp_footer', function() {
                echo '<script>
                    document.addEventListener("DOMContentLoaded", function() {
                        alert("Cảm ơn bạn đã liên hệ! Chúng tôi sẽ phản hồi sớm nhất có thể.");
                    });
                </script>';
            });
        }
    }
}
add_action('init', 'handle_contact_form_submission');

/**
 * Remove Website (URL) field from comment form
 */
function dulichvietnhat_remove_comment_url_field($fields) {
    if (isset($fields['url'])) {
        unset($fields['url']);
    }
    return $fields;
}
add_filter('comment_form_default_fields', 'dulichvietnhat_remove_comment_url_field');

/**
 * Optional: adjust comment form defaults (shorten notes)
 */
function dulichvietnhat_comment_form_defaults($defaults) {
    $defaults['comment_notes_before'] = '<p class="comment-notes">Email của bạn sẽ không được hiển thị công khai. Các trường bắt buộc được đánh dấu <span class="required">*</span></p>';
    return $defaults;
}
add_filter('comment_form_defaults', 'dulichvietnhat_comment_form_defaults');

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
function dulichvietnhat_add_image_sizes() {
    add_image_size('tour-thumbnail', 350, 250, true);
    add_image_size('destination-thumbnail', 400, 300, true);
    add_image_size('post-thumbnail-large', 800, 500, true);
}
add_action('after_setup_theme', 'dulichvietnhat_add_image_sizes');

function dulichvietnhat_excerpt_length($length) {
    return 20;
}
add_filter('excerpt_length', 'dulichvietnhat_excerpt_length', 999);

function dulichvietnhat_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'dulichvietnhat_excerpt_more');
function add_tour_rewrite_rules() {
    add_rewrite_rule(
        '^tour-7-ngay-6-dem/?$',
        'index.php?pagename=tour-7-ngay-6-dem',
        'top'
    );

    add_rewrite_rule(
        '^tour-nhat-ban-mua-thu-2025/?$',
        'index.php?pagename=tour-nhat-ban-mua-thu-2025',
        'top'
    );

    add_rewrite_rule(
        '^tour-6-ngay-5-dem/?$',
        'index.php?pagename=tour-6-ngay-5-dem',
        'top'
    );

    add_rewrite_rule(
        '^tour-5-ngay-4-dem/?$',
        'index.php?pagename=tour-5-ngay-4-dem',
        'top'
    );
}
add_action('init', 'add_tour_rewrite_rules');
function flush_tour_rewrite_rules() {
    add_tour_rewrite_rules();
    flush_rewrite_rules();
}
add_action('after_switch_theme', 'flush_tour_rewrite_rules');

function force_flush_rewrite_rules() {
    if (get_option('tour_rewrite_rules_flushed') !== 'yes') {
        flush_rewrite_rules();
        update_option('tour_rewrite_rules_flushed', 'yes');
    }
}
add_action('admin_init', 'force_flush_rewrite_rules');

function dulichvietnhat_kill_thumbnail_overlays_css() {
    ?>
    <style id="dulichvietnhat-kill-overlays">
    .post-thumbnail::before,.post-thumbnail::after,.post-image::before,.post-image::after,.tour-image::before,.tour-image::after,.destination-image::before,.destination-image::after,.entry-media::before,.entry-media::after{content:none!important;display:none!important;background:transparent!important;opacity:0!important}
    .post-thumbnail .post-category,.post-card .post-category,.tour-card .post-category,.card .post-category,.category-tag,.post-badge,.image-badge{display:none!important}
    .post-thumbnail [class*="overlay"],.post-thumbnail [class*="mask"],.post-thumbnail [class*="shade"],.post-thumbnail [class*="cover"],.post-image [class*="overlay"],.post-image [class*="mask"],.post-image [class*="shade"],.post-image [class*="cover"],.tour-image [class*="overlay"],.destination-image [class*="overlay"],.entry-media [class*="overlay"]{display:none!important;opacity:0!important}
    .post-thumbnail img,.post-image img,.tour-image img,.destination-image img,.entry-media img{filter:none!important;opacity:1!important}
    body.search-results .post-thumbnail::before,body.search-results .post-thumbnail::after,body.search-results .post-thumbnail [class*="overlay"]{display:none!important;opacity:0!important}
    </style>
    <?php
}
add_action('wp_head', 'dulichvietnhat_kill_thumbnail_overlays_css', 999);

function dulichvietnhat_strip_overlays_dom() {
    ?>
    <script>
    (function(){
      function killOverlays(){
        var sel = [
          '.post-thumbnail .overlay', '.post-thumbnail .mask', '.post-thumbnail .shade', '.post-thumbnail .cover',
          '.post-image .overlay', '.post-image .mask', '.post-image .shade', '.post-image .cover',
          '.tour-image .overlay', '.destination-image .overlay', '.entry-media .overlay',
          '.post-thumbnail .post-category', '.post-card .post-category', '.tour-card .post-category',
          '.card .post-category', '.category-tag', '.post-badge', '.image-badge'
        ];
        try { document.querySelectorAll(sel.join(',')).forEach(function(el){ el.style.display='none'; el.removeAttribute('style'); el.remove(); }); } catch(e){}

        var wrappers = document.querySelectorAll('.post-thumbnail, .post-image, .tour-image, .destination-image, .entry-media');
        wrappers.forEach(function(w){
          Array.prototype.slice.call(w.children).forEach(function(ch){
            if (ch.tagName && ch.tagName.toLowerCase() === 'img') return;
            var cs = window.getComputedStyle(ch);
            var isAbs = cs.position === 'absolute' || cs.position === 'fixed';
            var covers = (cs.top === '0px' && cs.left === '0px') || (cs.inset === '0px');
            var hasBg = cs.backgroundColor && cs.backgroundColor !== 'rgba(0, 0, 0, 0)' && cs.backgroundColor !== 'transparent';
            if (isAbs && covers) { ch.style.display = 'none'; }
            if (hasBg) { ch.style.background = 'transparent'; ch.style.opacity = '0'; }
          });
        });
      }
      if (document.readyState === 'loading') { document.addEventListener('DOMContentLoaded', killOverlays); }
      else { killOverlays(); }
      window.addEventListener('load', function(){ setTimeout(killOverlays, 0); setTimeout(killOverlays, 300); });
    })();
    </script>
    <?php
}
add_action('wp_footer', 'dulichvietnhat_strip_overlays_dom', 9999);

add_action('after_setup_theme', function () {
    $domains = array();
    $theme = wp_get_theme();
    $td = $theme->get('TextDomain');
    if ($td) { $domains[] = $td; }
    $domains[] = 'doan';
    $domains[] = 'dulichvietnhat';
    $domains = array_unique($domains);
    foreach ($domains as $domain) {
        load_theme_textdomain($domain, get_stylesheet_directory() . '/languages');
    }
});

add_action('change_locale', function($locale){
    $domains = array();
    $theme = wp_get_theme();
    $td = $theme->get('TextDomain');
    if ($td) { $domains[] = $td; }
    $domains[] = 'doan';
    $domains[] = 'dulichvietnhat';
    $domains = array_unique($domains);
    foreach ($domains as $domain) {
        unload_textdomain($domain);
        load_theme_textdomain($domain, get_stylesheet_directory() . '/languages');
    }
});

function dln_detect_locale_from_request() {
    $supported = array(
        'vi' => 'vi',
        'en' => 'en_US',
        'ja' => 'ja',
        'fr' => 'fr_FR',
        'zh' => 'zh_CN'
    );
    $locale = '';
    if (isset($_GET['lang'])) {
        $q = strtolower(sanitize_text_field($_GET['lang']));
        if (isset($supported[$q])) { $locale = $supported[$q]; }
    }
    if (!$locale && isset($_COOKIE['site_lang'])) {
        $c = strtolower(sanitize_text_field($_COOKIE['site_lang']));
        if (isset($supported[$c])) { $locale = $supported[$c]; }
    }
    return $locale;
}

if (!function_exists('pll_current_language') && !defined('ICL_SITEPRESS_VERSION')) {
    add_filter('locale', function($current){
        $override = dln_detect_locale_from_request();
        return $override ? $override : $current;
    }, 1);

    add_action('setup_theme', function(){
        $locale = dln_detect_locale_from_request();
        if ($locale) { switch_to_locale($locale); }
    });

    add_action('init', 'dln_set_lang_cookie', 0);
}

add_action('change_locale', function($locale){
    $theme = wp_get_theme();
    $domain = $theme->get('TextDomain');
    if (!$domain) { $domain = 'dulichvietnhat'; }
    unload_textdomain($domain);
    load_theme_textdomain($domain, get_stylesheet_directory() . '/languages');
});

add_filter('body_class', function($classes){
    $locale = determine_locale();
    $classes[] = 'locale-' . sanitize_html_class(strtolower($locale));
    return $classes;
});

function dln_current_url() {
    $scheme = is_ssl() ? 'https' : 'http';
    $host = $_SERVER['HTTP_HOST'];
    $uri  = strtok($_SERVER['REQUEST_URI'], '#');
    return esc_url_raw($scheme . '://' . $host . $uri);
}

function dln_lang_switcher($show_labels = true) {
    $langs = array(
        'vi' => 'VI',
        'en' => 'EN',
        'ja' => 'JA'
    );
    $current_param = isset($_COOKIE['site_lang']) ? strtolower(sanitize_text_field($_COOKIE['site_lang'])) : '';
    if (!$current_param) {
        $det = strtolower(determine_locale());
        if (strpos($det, 'vi') === 0) $current_param = 'vi';
        elseif (strpos($det, 'ja') === 0) $current_param = 'ja';
        else $current_param = 'en';
    }
    $url = dln_current_url();
    $out = '<div class="lang-switcher" role="navigation" aria-label="Language">';
    foreach ($langs as $code => $label) {
        $u = esc_url(add_query_arg(array('lang' => $code), $url));
        $active = $code === $current_param ? ' active' : '';
        $out .= '<a class="lang-item' . $active . '" href="' . $u . '" rel="nofollow">' . ($show_labels ? esc_html($label) : esc_html($code)) . '</a>';
    }
    $out .= '</div>';
    return $out;
}

function dln_set_lang_cookie() {
    if (!headers_sent() && isset($_GET['lang'])) {
        $supported = array('vi','en','ja','fr','zh');
        $q = strtolower(sanitize_text_field($_GET['lang']));
        if (in_array($q, $supported, true)) {
            $path = defined('COOKIEPATH') && COOKIEPATH ? COOKIEPATH : '/';
            $domain = defined('COOKIE_DOMAIN') ? COOKIE_DOMAIN : '';
            setcookie('site_lang', $q, time()+3600*24*365, $path, $domain);
            $_COOKIE['site_lang'] = $q;
        }
    }
}