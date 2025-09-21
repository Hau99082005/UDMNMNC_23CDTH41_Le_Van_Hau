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

add_action('acf/init', function () {
    // Thêm "Taxonomy Term" vào danh sách Location Rules
    add_filter('acf/location/rule_types', function ($choices) {
        $choices['Taxonomy']['taxonomy_term'] = 'Taxonomy Term';
        return $choices;
    });

    // Liệt kê các taxonomy có trong site
    add_filter('acf/location/rule_values/taxonomy_term', function ($choices) {
        $taxonomies = get_taxonomies([], 'objects');
        foreach ($taxonomies as $taxonomy) {
            $choices[$taxonomy->name] = $taxonomy->label;
        }
        return $choices;
    });

    // Match taxonomy khi chọn rule
    add_filter('acf/location/rule_match/taxonomy_term', function ($match, $rule, $options) {
        if (isset($options['taxonomy']) && $options['taxonomy'] == $rule['value']) {
            $match = true;
        }
        return $match;
    }, 10, 3);
});



/**
 * Enqueue scripts and styles.
 */
function dulichvietnhat_scripts() {
    $style_path = get_stylesheet_directory() . '/style.css';
    $style_version = file_exists($style_path) ? filemtime($style_path) : _S_VERSION;
    wp_enqueue_style('dulichvietnhat-style', get_stylesheet_uri(), array(), $style_version);

    // Ensure Font Awesome is available for header icons
    wp_enqueue_style('fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css', array(), '6.5.0');

    // Bootstrap CSS for components (e.g., Carousel)
    wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/assets/css/bootstrap.css', array(), _S_VERSION);

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
            wp_enqueue_style($handle, get_stylesheet_directory_uri() . $rel, array('dulichvietnhat-style','fontawesome','bootstrap-css'), $ver);
        }
    }

    
    $icon_fix = get_stylesheet_directory() . '/assets/css/icon-fix.css';
    if (file_exists($icon_fix)) {
        wp_enqueue_style('icon-fix', get_stylesheet_directory_uri() . '/assets/css/icon-fix.css', array('fontawesome'), filemtime($icon_fix));
    }
    wp_enqueue_style('slick-css', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css', array(), '1.8.1');
    wp_enqueue_style('slick-theme-css', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css', array('slick-css'), '1.8.1');
    wp_enqueue_script('slick-js', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js', array('jquery'), '1.8.1', true);

    $news_slider_init = <<<'JS'
(function($){
  $(function(){
    var $el = $('.news-grid.news-slider');
    if(!$el.length) return;
    if($el.hasClass('slick-initialized')) return;
    $el.slick({
      slidesToShow: 4,
      slidesToScroll: 1,
      infinite: false,
      speed: 500,
      cssEase: 'cubic-bezier(.22,.61,.36,1)',
      autoplay: true,
      autoplaySpeed: 3500,
      pauseOnHover: true,
      swipeToSlide: true,
      touchThreshold: 12,
      adaptiveHeight: false,
      arrows: true,
      dots: true,
      prevArrow: '<button type="button" class="slick-prev" aria-label="Previous" title="Previous">\n         <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">\n           <path d="M15 18L9 12L15 6" stroke="#111827" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>\n         </svg>\n       </button>',
      nextArrow: '<button type="button" class="slick-next" aria-label="Next" title="Next">\n         <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">\n           <path d="M9 6L15 12L9 18" stroke="#111827" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>\n         </svg>\n       </button>',
      responsive: [
        { breakpoint: 1280, settings: { slidesToShow: 3 } },
        { breakpoint: 992,  settings: { slidesToShow: 2 } },
        { breakpoint: 576,  settings: { slidesToShow: 1 } }
      ]
    });
  });
})(jQuery);
JS;
     wp_add_inline_script('slick-js', $news_slider_init);

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

// Ensure external CPTs like 'slider' support thumbnails (featured images)
add_action('init', function(){
    if (post_type_exists('slider')) {
        add_post_type_support('slider', array('thumbnail', 'title', 'editor')); 
    }
}, 20);

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

    // Only set cookies on the front-end to avoid headers sent warnings during admin/plugin activation
    if (!is_admin() && !wp_doing_ajax()) {
        add_action('init', 'dln_set_lang_cookie', 0);
    }
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
    // Extra safety: never attempt to modify headers in admin or after output started
    if (is_admin() || (function_exists('wp_doing_ajax') && wp_doing_ajax())) {
        return;
    }
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

// Auto ensure temp directory exists for plugin/theme installs on local
function dln_ensure_temp_dir() {
    if (defined('WP_TEMP_DIR') && WP_TEMP_DIR && !is_dir(WP_TEMP_DIR)) {
        wp_mkdir_p(WP_TEMP_DIR);
    }
}
add_action('init', 'dln_ensure_temp_dir', 0);
function dln_relax_ssl_on_local($args, $url) {
    if (defined('WP_ENVIRONMENT_TYPE') && WP_ENVIRONMENT_TYPE === 'local') {
        $host = parse_url($url, PHP_URL_HOST);
        if (in_array($host, array('api.wordpress.org','downloads.wordpress.org','wordpress.org'), true)) {
            $args['sslverify'] = false; 
        }
        if (empty($args['timeout']) || $args['timeout'] < 60) {
            $args['timeout'] = 60;
        }
    }
    return $args;
}
add_filter('http_request_args', 'dln_relax_ssl_on_local', 10, 2);

add_action('add_meta_boxes', function(){
    $pts = get_post_types(array('public' => true), 'names');
    foreach ($pts as $pt) {
        add_meta_box('dln_gallery_metabox', __('Gallery', 'dulichvietnhat'), 'dln_gallery_metabox_html', $pt, 'normal', 'default');
    }
});

function dln_gallery_metabox_html($post){
    $ids = get_post_meta($post->ID, '_dln_gallery_ids', true);
    $ids = is_array($ids) ? $ids : array();
    wp_nonce_field('dln_gallery_save', 'dln_gallery_nonce');
    echo '<div class="dln-gallery-wrapper">';
    echo '<input type="hidden" class="dln-gallery-ids" name="dln_gallery_ids" value="' . esc_attr(implode(',', array_map('intval', $ids))) . '">';
    echo '<div class="dln-gallery-items" style="display:flex;gap:10px;flex-wrap:wrap;">';
    foreach ($ids as $id) {
        $thumb = wp_get_attachment_image($id, 'thumbnail', false, array('style' => 'border:1px solid #ddd;border-radius:4px;'));
        echo '<div class="dln-gallery-item" data-id="' . intval($id) . '" style="position:relative">' . $thumb . '<button type="button" class="button-link dln-remove" style="position:absolute;top:-6px;right:-6px;background:#fff;border:1px solid #ddd;border-radius:50%;width:22px;height:22px;line-height:20px;text-align:center;">×</button></div>';
    }
    echo '</div>';
    echo '<p><button type="button" class="button button-primary dln-gallery-add">' . esc_html__('Add Images', 'dulichvietnhat') . '</button> ';
    echo '<button type="button" class="button dln-gallery-clear">' . esc_html__('Clear', 'dulichvietnhat') . '</button></p>';
    echo '</div>';
}

add_action('save_post', function($post_id){
    if (!isset($_POST['dln_gallery_nonce']) || !wp_verify_nonce($_POST['dln_gallery_nonce'], 'dln_gallery_save')) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (!current_user_can('edit_post', $post_id)) return;
    $raw = isset($_POST['dln_gallery_ids']) ? sanitize_text_field($_POST['dln_gallery_ids']) : '';
    $ids = $raw ? array_filter(array_map('intval', array_map('trim', explode(',', $raw)))) : array();
    update_post_meta($post_id, '_dln_gallery_ids', $ids);
});

add_action('admin_enqueue_scripts', function($hook){
    if ($hook !== 'post.php' && $hook !== 'post-new.php') return;
    $screen = function_exists('get_current_screen') ? get_current_screen() : null;
    if (!$screen) return;
    wp_enqueue_media();
    wp_enqueue_script('jquery');
    add_action('admin_print_footer_scripts', function(){ ?>
        <script>
        (function($){var f;function u(w){var a=[];w.find('.dln-gallery-item').each(function(){a.push($(this).data('id'));});w.find('.dln-gallery-ids').val(a.join(','));}
        $(document).on('click','.dln-gallery-add',function(e){e.preventDefault();var $wrap=$(this).closest('.dln-gallery-wrapper');if(!f){f=wp.media({title:'<?php echo esc_js(__('Select images','dulichvietnhat')); ?>',multiple:true,library:{type:'image'}});}f.off('select');f.on('select',function(){var s=f.state().get('selection'),w=$wrap;s.each(function(att){att=att.toJSON();var h='<div class="dln-gallery-item" data-id="'+att.id+'" style="position:relative">'+
        '<img src="'+(att.sizes&&att.sizes.thumbnail?att.sizes.thumbnail.url:att.url)+'" style="border:1px solid #ddd;border-radius:4px;" />'+
        '<button type="button" class="button-link dln-remove" style="position:absolute;top:-6px;right:-6px;background:#fff;border:1px solid #ddd;border-radius:50%;width:22px;height:22px;line-height:20px;text-align:center;">×</button>'+
        '</div>';w.find('.dln-gallery-items').append(h);});u($wrap);});f.open();});
        $(document).on('click','.dln-gallery-item .dln-remove',function(){var $wrap=$(this).closest('.dln-gallery-wrapper');$(this).closest('.dln-gallery-item').remove();u($wrap);});
        $(document).on('click','.dln-gallery-clear',function(){var $wrap=$(this).closest('.dln-gallery-wrapper');$wrap.find('.dln-gallery-items').empty();u($wrap);});})(jQuery);
        </script>
        <style>
            #dln-gallery-wrapper .dln-gallery-item img{display:block;width:100px;height:100px;object-fit:cover}
        </style>
    <?php });
});

function dln_get_gallery_image_ids($post_id = null){
    $post_id = $post_id ? $post_id : get_the_ID();
    $ids = get_post_meta($post_id, '_dln_gallery_ids', true);
    return is_array($ids) ? array_map('intval', $ids) : array();
}

function dln_render_gallery($post_id = null){
    $ids = dln_get_gallery_image_ids($post_id);
    if (empty($ids)) return '';
    $html = '<div class="dln-gallery">';
    foreach ($ids as $id){ $html .= '<a href="' . esc_url(wp_get_attachment_url($id)) . '" class="dln-gallery-link">' . wp_get_attachment_image($id, 'large') . '</a>'; }
    $html .= '</div>';
    return $html;
}
