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

    add_filter('acf/location/rule_match/taxonomy_term', function ($match, $rule, $options) {
        if (isset($options['taxonomy']) && $options['taxonomy'] == $rule['value']) {
            $match = true;
        }
        return $match;
    }, 10, 3);
});

function register_consultation_post_type() {
    $labels = array(
        'name'               => __('Đăng ký tư vấn', 'doan'),
        'singular_name'      => __('Đăng ký tư vấn', 'doan'),
        'menu_name'          => __('Đăng ký tư vấn', 'doan'),
        'name_admin_bar'     => __('Đăng ký tư vấn', 'doan'),
        'add_new'            => __('Thêm mới', 'doan'),
        'add_new_item'       => __('Thêm đăng ký mới', 'doan'),
        'new_item'           => __('Đăng ký mới', 'doan'),
        'edit_item'          => __('Chỉnh sửa đăng ký', 'doan'),
        'view_item'          => __('Xem đăng ký', 'doan'),
        'all_items'          => __('Tất cả đăng ký', 'doan'),
        'search_items'       => __('Tìm kiếm đăng ký', 'doan'),
        'not_found'          => __('Không tìm thấy', 'doan'),
        'not_found_in_trash' => __('Không có trong thùng rác', 'doan'),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => false,
        'publicly_queryable' => false,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => false,
        'rewrite'            => false,
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => 25,
        'menu_icon'          => 'dashicons-email-alt',
        'supports'           => array('title'),
    );

    register_post_type('consultation', $args);
}
add_action('init', 'register_consultation_post_type');

function dulichvietnhat_scripts() {
    // Critical CSS - Inline for performance
    $critical_css = '
        :root{--primary:#ef4444;--accent:#f97316;--gray-900:#111827;--white:#ffffff;--font-base:Inter,sans-serif}
        *{box-sizing:border-box}
        body{font-family:var(--font-base);margin:0;padding:0;color:var(--gray-900);background:var(--white)}
        .site-header{position:relative;z-index:1000;background:var(--white);box-shadow:0 4px 6px -1px rgba(0,0,0,0.1)}
        .post-thumbnail,.tour-thumbnail{position:relative;width:100%;height:0;padding-bottom:62.5%;overflow:hidden}
        .post-thumbnail img,.tour-thumbnail img{position:absolute;top:0;left:0;width:100%;height:100%;object-fit:cover;display:block}
        .preloader,.loader,.loading,.banner-loading{display:none!important}
        body,.site-content,.site-main{opacity:1!important;visibility:visible!important}
    ';
    
    // Enqueue only essential styles
    $style_path = get_stylesheet_directory() . '/style.css';
    $style_version = file_exists($style_path) ? filemtime($style_path) : _S_VERSION;
    wp_enqueue_style('dulichvietnhat-style', get_stylesheet_uri(), array(), $style_version);
    
    // Add critical CSS inline
    wp_add_inline_style('dulichvietnhat-style', $critical_css);
    
    // Enqueue essential CSS files that were removed
    wp_enqueue_style('fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css', array(), '6.5.0');
    wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/assets/css/bootstrap.css', array(), _S_VERSION);

    $assets = array(
        'header-css'              => '/assets/css/header.css',
        'banner-css'              => '/assets/css/banner.css',
        'featured-posts-css'      => '/assets/css/featured-posts.css',
        'featured-tours-css'      => '/assets/css/featured-tours.css',
        'placeholder-images-css'  => '/assets/css/placeholder-images.css',
        'tour-pages-css'          =>  '/assets/css/tour-pages.css'
    );
    foreach ($assets as $handle => $rel) {
        $path = get_stylesheet_directory() . $rel;
        if (file_exists($path)) {
            $ver = filemtime($path);
            wp_enqueue_style($handle, get_stylesheet_directory_uri() . $rel, array('dulichvietnhat-style','fontawesome','bootstrap-css'), $ver);
        }
    }

    // Enqueue professional upgrade CSS files
    $professional_upgrade_path = get_stylesheet_directory() . '/assets/css/professional-upgrade.css';
    if (file_exists($professional_upgrade_path)) {
        $professional_upgrade_version = filemtime($professional_upgrade_path);
        wp_enqueue_style('professional-upgrade', get_stylesheet_directory_uri() . '/assets/css/professional-upgrade.css', array('dulichvietnhat-main'), $professional_upgrade_version);
    }

    // Enqueue responsive enhancements CSS
    $responsive_enhancements_path = get_stylesheet_directory() . '/assets/css/responsive-enhancements.css';
    if (file_exists($responsive_enhancements_path)) {
        $responsive_enhancements_version = filemtime($responsive_enhancements_path);
        wp_enqueue_style('responsive-enhancements', get_stylesheet_directory_uri() . '/assets/css/responsive-enhancements.css', array('professional-upgrade'), $responsive_enhancements_version);
    }

    // Enqueue premium design CSS
    $premium_design_path = get_stylesheet_directory() . '/assets/css/premium-design.css';
    if (file_exists($premium_design_path)) {
        $premium_design_version = filemtime($premium_design_path);
        wp_enqueue_style('premium-design', get_stylesheet_directory_uri() . '/assets/css/premium-design.css', array('responsive-enhancements'), $premium_design_version);
    }

    // Enqueue slider enhancements CSS
    $slider_enhancements_path = get_stylesheet_directory() . '/assets/css/slider-enhancements.css';
    if (file_exists($slider_enhancements_path)) {
        $slider_enhancements_version = filemtime($slider_enhancements_path);
        wp_enqueue_style('slider-enhancements', get_stylesheet_directory_uri() . '/assets/css/slider-enhancements.css', array('premium-design'), $slider_enhancements_version);
    }

    // Enqueue professional layout CSS
    $professional_layout_path = get_stylesheet_directory() . '/assets/css/professional-layout.css';
    if (file_exists($professional_layout_path)) {
        $professional_layout_version = filemtime($professional_layout_path);
        wp_enqueue_style('professional-layout', get_stylesheet_directory_uri() . '/assets/css/professional-layout.css', array('slider-enhancements'), $professional_layout_version);
    }

    // Enqueue image fix override CSS
    $image_fix_path = get_stylesheet_directory() . '/assets/css/image-fix-override.css';
    if (file_exists($image_fix_path)) {
        $image_fix_version = filemtime($image_fix_path);
        wp_enqueue_style('image-fix-override', get_stylesheet_directory_uri() . '/assets/css/image-fix-override.css', array('professional-layout'), $image_fix_version);
    }

    // Enqueue no loading CSS
    $no_loading_path = get_stylesheet_directory() . '/assets/css/no-loading.css';
    if (file_exists($no_loading_path)) {
        $no_loading_version = filemtime($no_loading_path);
        wp_enqueue_style('no-loading', get_stylesheet_directory_uri() . '/assets/css/no-loading.css', array('image-fix-override'), $no_loading_version);
    }

    // Enqueue balanced optimization CSS - Final layer for performance
    $balanced_opt_path = get_stylesheet_directory() . '/assets/css/balanced-optimization.css';
    if (file_exists($balanced_opt_path)) {
        $balanced_opt_version = filemtime($balanced_opt_path);
        wp_enqueue_style('balanced-optimization', get_stylesheet_directory_uri() . '/assets/css/balanced-optimization.css', array('no-loading'), $balanced_opt_version);
    }

    // Enqueue search page CSS for search results
    if (is_search()) {
        $search_page_path = get_stylesheet_directory() . '/assets/css/search-page.css';
        if (file_exists($search_page_path)) {
            $search_page_version = filemtime($search_page_path);
            wp_enqueue_style('search-page', get_stylesheet_directory_uri() . '/assets/css/search-page.css', array('balanced-optimization'), $search_page_version);
            
            // Critical inline CSS to force remove blur
            $search_critical_css = '
                body.search .tour-image,body.search .tour-image img,body.search .post-thumbnail,body.search .post-thumbnail img,.search .tour-image,.search .tour-image img,.search .post-thumbnail,.search .post-thumbnail img{filter:none!important;-webkit-filter:none!important;opacity:1!important;backdrop-filter:none!important;-webkit-backdrop-filter:none!important;visibility:visible!important}
                body.search .tour-image::before,body.search .tour-image::after,body.search .tour-image .overlay,.search .tour-image::before,.search .tour-image::after,.search .tour-image .overlay{content:none!important;display:none!important;opacity:0!important;visibility:hidden!important;background:none!important}
            ';
            wp_add_inline_style('search-page', $search_critical_css);
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

    // Enqueue Professional Enhancements JS
    $professional_js_path = get_stylesheet_directory() . '/assets/js/professional-enhancements.js';
    if (file_exists($professional_js_path)) {
        wp_enqueue_script('professional-enhancements', get_stylesheet_directory_uri() . '/assets/js/professional-enhancements.js', array('jquery'), filemtime($professional_js_path), true);
    }

    // Enqueue Balanced Optimization JS - Final optimization layer
    $balanced_js_path = get_stylesheet_directory() . '/assets/js/balanced-optimization.js';
    if (file_exists($balanced_js_path)) {
        wp_enqueue_script('balanced-optimization', get_stylesheet_directory_uri() . '/assets/js/balanced-optimization.js', array('jquery'), filemtime($balanced_js_path), true);
    }

    // Enqueue search page JS for search results
    if (is_search()) {
        $search_page_js_path = get_stylesheet_directory() . '/assets/js/search-page.js';
        if (file_exists($search_page_js_path)) {
            wp_enqueue_script('search-page-js', get_stylesheet_directory_uri() . '/assets/js/search-page.js', array('jquery'), filemtime($search_page_js_path), true);
        }
    }

    // Only enqueue comment reply if needed
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }

    $main_path = get_stylesheet_directory() . '/main.css';
    if (file_exists($main_path)) {
        $main_version = filemtime($main_path);
        wp_enqueue_style('dulichvietnhat-main', get_stylesheet_directory_uri() . '/main.css', array('dulichvietnhat-style','header-css','banner-css','featured-posts-css','featured-tours-css'), $main_version);
        $overlay_fix_css = '.posts-grid .post-category,.post-card .post-category,.tour-card .post-category,.card .post-category,.category-tag,.post-badge,.image-badge{display:none!important}.post-thumbnail .overlay,.post-thumbnail::before,.post-thumbnail::after,.post-thumbnail .post-category,.post-image::before,.post-image::after,.tour-image::before,.tour-image::after,.destination-image::before,.destination-image::after,.entry-media::before,.entry-media::after{content:none!important;display:none!important;background:transparent!important;opacity:0!important}.post-thumbnail img,.post-image img,.tour-image img,.destination-image img,.entry-media img{filter:none!important;opacity:1!important}.custom-logo{max-height:48px;width:auto;height:auto}.site-header .logo-text{margin-left:10px;display:inline-block;vertical-align:middle}';
        wp_add_inline_style('dulichvietnhat-main', $overlay_fix_css);
    }

    // All CSS files have been restored for full functionality

    // Enqueue header-override.css LAST so it can override previous styles (depends on main if present)
    $header_override_path = get_stylesheet_directory() . '/assets/css/header-override.css';
    if (file_exists($header_override_path)) {
        $deps = array('dulichvietnhat-style','fontawesome','bootstrap-css');
        if (wp_style_is('dulichvietnhat-main', 'registered') || wp_style_is('dulichvietnhat-main', 'enqueued')) {
            $deps[] = 'dulichvietnhat-main';
        } else {
            // still ensure it comes after header.css
            $deps[] = 'header-css';
        }
        wp_enqueue_style('header-override-css', get_stylesheet_directory_uri() . '/assets/css/header-override.css', $deps, filemtime($header_override_path));
    }
    
    // Enqueue tour pages stylesheet last so it overrides where needed
    $tour_pages_css = get_stylesheet_directory() . '/assets/css/tour-pages.css';
    if (file_exists($tour_pages_css)) {
        $deps = array('dulichvietnhat-style','fontawesome','bootstrap-css');
        if (wp_style_is('dulichvietnhat-main', 'registered') || wp_style_is('dulichvietnhat-main', 'enqueued')) {
            $deps[] = 'dulichvietnhat-main';
        }
        if (wp_style_is('header-override-css', 'registered') || wp_style_is('header-override-css', 'enqueued')) {
            $deps[] = 'header-override-css';
        }
        wp_enqueue_style('tour-pages-css', get_stylesheet_directory_uri() . '/assets/css/tour-pages.css', $deps, filemtime($tour_pages_css));
    }
}
add_action('wp_enqueue_scripts', 'dulichvietnhat_scripts', 100);

/* Force-load tour pages stylesheet as the very last CSS to avoid being overridden */
add_action('wp_enqueue_scripts', function(){
    if (!is_page(array('tour-7-ngay-6-dem','tour-nhat-ban-mua-thu-2025','tour-6-ngay-5-dem','tour-5-ngay-4-dem'))) {
        return;
    }
    $tour_pages_css = get_stylesheet_directory() . '/assets/css/tour-pages.css';
    if (file_exists($tour_pages_css)) {
        // Register with unique handle if not registered, then enqueue with high priority
        $handle = 'tour-pages-css-final';
        wp_register_style($handle, get_stylesheet_directory_uri() . '/assets/css/tour-pages.css', array(), filemtime($tour_pages_css));
        wp_enqueue_style($handle);
    }
}, 9999);

function handle_contact_form_submission() {
    if (isset($_POST['contact_form_nonce']) && wp_verify_nonce($_POST['contact_form_nonce'], 'contact_form_action')) {
        // Collect and sanitize
        $name = isset($_POST['contact_name']) ? sanitize_text_field($_POST['contact_name']) : '';
        $phone = isset($_POST['contact_phone']) ? sanitize_text_field($_POST['contact_phone']) : '';
        $email = isset($_POST['contact_email']) ? sanitize_email($_POST['contact_email']) : '';
        $tour = isset($_POST['contact_tour']) ? sanitize_text_field($_POST['contact_tour']) : '';
        $message = isset($_POST['contact_message']) ? sanitize_textarea_field($_POST['contact_message']) : '';

        // Save to admin as a custom post type entry
        $post_id = wp_insert_post(array(
            'post_type'   => 'consultation',
            'post_title'  => $name ? ( 'Tư vấn: ' . $name . ' - ' . current_time('d/m/Y H:i') ) : ( 'Tư vấn - ' . current_time('d/m/Y H:i') ),
            'post_status' => 'private',
            'meta_input'  => array(
                '_consultation_name'    => $name,
                '_consultation_phone'   => $phone,
                '_consultation_email'   => $email,
                '_consultation_tour'    => $tour,
                '_consultation_message' => $message,
                '_consultation_time'    => current_time('mysql'),
            ),
        ));

        $subject = 'Yêu cầu tư vấn tour từ ' . ($name ? $name : 'Khách hàng');
        $body = "Thông tin khách hàng:\n\n";
        $body .= "Họ và tên: " . $name . "\n";
        $body .= "Số điện thoại: " . $phone . "\n";
        $body .= "Email: " . $email . "\n";
        $body .= "Tour quan tâm: " . $tour . "\n";
        $body .= "Tin nhắn: " . $message . "\n\n";
        $body .= "Thời gian: " . current_time('d/m/Y H:i:s');

        $admin_email = get_option('admin_email');
        $headers = array('Content-Type: text/plain; charset=UTF-8');

       
        $thank_url = '';
        if (!empty($_POST['redirect_to'])) {
            $thank_url = esc_url_raw($_POST['redirect_to']);
        }
        if (!$thank_url) {
            $thank_page = get_page_by_path('dang-ky-tu-van');
            // If Polylang is active, redirect to the translated page in current language
            if (function_exists('pll_current_language')) {
                $lang = pll_current_language('slug');
                if ($thank_page && function_exists('pll_get_post')) {
                    $translated_id = pll_get_post($thank_page->ID, $lang);
                    if ($translated_id) {
                        $thank_url = get_permalink($translated_id);
                    }
                }
                if (!$thank_url && function_exists('pll_home_url')) {
                    $thank_url = trailingslashit(pll_home_url($lang)) . 'dang-ky-tu-van/';
                }
            }
            // Fallback if Polylang not active or translation missing
            if (!$thank_url) {
                $thank_url  = $thank_page ? get_permalink($thank_page) : home_url('/dang-ky-tu-van');
            }
        }

        
        if ($post_id && !is_wp_error($post_id)) {
            if ($admin_email) { wp_mail($admin_email, $subject, $body, $headers); }
          
            $redir = add_query_arg(array(
                'consult' => 'success',
                'tour'    => rawurlencode($tour),
            ), $thank_url);
            wp_safe_redirect($redir);
            exit;
        } else {
            $redir = add_query_arg(array('consult' => 'error'), $thank_url);
            wp_safe_redirect($redir);
            exit;
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
require get_template_directory() . '/inc/performance-optimizer.php';
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

if (!function_exists('dln_ensure_consultation_page')) {
    function dln_ensure_consultation_page(){
        $slug = 'dang-ky-tu-van';
        $tpl  = 'page-dang-ky-tu-van.php';

        // Find by slug first
        $page = get_page_by_path($slug);

        // If not found, also try to find by exact title
        if (!$page) {
            $q = new WP_Query(array(
                'post_type' => 'page',
                'title'     => 'Đăng ký tư vấn',
                'post_status' => array('publish','draft','pending','private'),
                'posts_per_page' => 1,
            ));
            if ($q->have_posts()) { $page = $q->posts[0]; }
            wp_reset_postdata();
        }

        if (!$page) {
            // Create page
            $page_id = wp_insert_post(array(
                'post_type'   => 'page',
                'post_title'  => 'Đăng ký tư vấn',
                'post_name'   => $slug,
                'post_status' => 'publish',
                'meta_input'  => array(
                    '_wp_page_template' => $tpl,
                ),
            ));
            if (!is_wp_error($page_id)) {
                update_option('consultation_page_id', (int)$page_id);
                if (get_option('consultation_rewrite_flushed') !== 'yes') {
                    flush_rewrite_rules();
                    update_option('consultation_rewrite_flushed', 'yes');
                }
            }
        } else {
            // Ensure correct slug and template
            $needs_update = false;
            $arr = array('ID' => (int)$page->ID);
            if ($page->post_name !== $slug) { $arr['post_name'] = $slug; $needs_update = true; }
            $current_tpl = get_post_meta($page->ID, '_wp_page_template', true);
            if ($current_tpl !== $tpl) { update_post_meta($page->ID, '_wp_page_template', $tpl); }
            if ($page->post_status !== 'publish') { $arr['post_status'] = 'publish'; $needs_update = true; }
            if ($needs_update) { wp_update_post($arr); }
        }
    }
}

// Run in admin always
add_action('admin_init', 'dln_ensure_consultation_page');
// Also run on front-end for logged-in users to repair without entering admin
add_action('init', function(){ if (!is_admin() && is_user_logged_in()) { dln_ensure_consultation_page(); } }, 20);

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
    // Add a safe page slug class for easier page-specific styling
    if (is_page()) {
        $post = get_queried_object();
        if ($post && !empty($post->post_name)) {
            $classes[] = 'page-slug-' . sanitize_html_class($post->post_name);
        }
    }
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

// Polylang-aware language switcher: reuse the same VI/EN pill UI
if (!function_exists('dln_poly_switcher')) {
    function dln_poly_switcher($show_labels = true) {
        if (!function_exists('pll_the_languages')) { return ''; }
        $items = pll_the_languages(array('raw' => true));
        if (!is_array($items) || empty($items)) { return ''; }
        $out = '<div class="lang-switcher" role="navigation" aria-label="Language">';
        foreach ($items as $it) {
            $slug = strtolower($it['slug']);
            $label = $show_labels ? strtoupper(substr($slug, 0, 2)) : $slug;
            if ($slug === 'vi') { $label = 'VI'; }
            if ($slug === 'en') { $label = 'EN'; }
            $active = !empty($it['current_lang']) ? ' active' : '';
            $out .= '<a class="lang-item' . $active . '" href="' . esc_url($it['url']) . '">' . esc_html($label) . '</a>';
        }
        $out .= '</div>';
        return $out;
    }
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

// Floating Contact Widget (no plugin)
add_action('wp_footer', function(){
    // Do not show in admin or login pages
    if (is_admin()) return;

    // Get phone from existing theme mod or default
    $raw_phone = get_theme_mod('header_phone', '0367722389');
    $digits    = preg_replace('/[^0-9]/', '', (string)$raw_phone);

    // Allow overrides via theme mods (optional)
    $wa_number   = preg_replace('/[^0-9]/', '', (string) get_theme_mod('contact_whatsapp', $digits));
    $zalo_number = preg_replace('/[^0-9]/', '', (string) get_theme_mod('contact_zalo', $digits));

    // Build links
    $tel_link  = $digits ? 'tel:' . esc_attr($digits) : '';
    $wa_text   = rawurlencode( __( 'Xin chào! Tôi cần được tư vấn tour.', 'doan' ) );
    $wa_link   = $wa_number ? 'https://wa.me/' . esc_attr($wa_number) . '?text=' . $wa_text : '';
    $zalo_link = $zalo_number ? 'https://zalo.me/' . esc_attr($zalo_number) : '';

    ?>
    <div class="floating-contact" aria-label="Liên hệ nhanh">
        <?php if ($tel_link): ?>
        <a class="contact-btn contact-phone" href="<?php echo esc_url($tel_link); ?>" rel="nofollow" aria-label="<?php echo esc_attr__('Gọi điện', 'doan'); ?>">
            <i class="fas fa-phone"></i>
            <span><?php echo esc_html( $raw_phone ? $raw_phone : __( 'Gọi điện', 'doan') ); ?></span>
        </a>
        <?php endif; ?>

        <?php if ($wa_link): ?>
        <a class="contact-btn contact-whatsapp" href="<?php echo esc_url($wa_link); ?>" target="_blank" rel="nofollow noopener" aria-label="<?php echo esc_attr__('Liên hệ tư vấn (WhatsApp)', 'doan'); ?>">
            <i class="fab fa-whatsapp"></i>
            <span><?php echo esc_html__('Liên hệ tư vấn', 'doan'); ?></span>
        </a>
        <?php endif; ?>

        <?php if ($zalo_link): ?>
        <a class="contact-btn contact-zalo" href="<?php echo esc_url($zalo_link); ?>" target="_blank" rel="nofollow noopener" aria-label="<?php echo esc_attr__('Chat Zalo', 'doan'); ?>">
            <i class="fas fa-comment-dots"></i>
            <span><?php echo esc_html__('Chat Zalo', 'doan'); ?></span>
        </a>
        <?php endif; ?>
    </div>
    <?php
});

add_action('customize_register', function($wp_customize){
    $wp_customize->add_section('contact_widget_section', array(
        'title'       => __('Liên hệ nhanh', 'doan'),
        'priority'    => 35,
        'description' => __('Cấu hình số điện thoại, WhatsApp, Zalo cho nút liên hệ nổi.', 'doan'),
    ));
    if (!$wp_customize->get_setting('header_phone')) {
        $wp_customize->add_setting('header_phone', array(
            'default'           => '0367722389',
            'sanitize_callback' => function($v){ return preg_replace('/[^0-9 +()-]/', '', (string)$v); },
        ));
    }
    if (!$wp_customize->get_control('header_phone')) {
        $wp_customize->add_control('header_phone', array(
            'label'       => __('Số điện thoại', 'doan'),
            'section'     => 'contact_widget_section',
            'type'        => 'text',
            'description' => __('Ví dụ: 0367722389', 'doan'),
        ));
    }

    // WhatsApp number
    $wp_customize->add_setting('contact_whatsapp', array(
        'default'           => '',
        'sanitize_callback' => function($v){ return preg_replace('/[^0-9]/', '', (string)$v); },
    ));
    $wp_customize->add_control('contact_whatsapp', array(
        'label'       => __('Số WhatsApp', 'doan'),
        'section'     => 'contact_widget_section',
        'type'        => 'text',
        'description' => __('Chỉ nhập số. Ví dụ: 84901234567', 'doan'),
    ));

    // Zalo number
    $wp_customize->add_setting('contact_zalo', array(
        'default'           => '',
        'sanitize_callback' => function($v){ return preg_replace('/[^0-9]/', '', (string)$v); },
    ));
    $wp_customize->add_control('contact_zalo', array(
        'label'       => __('Số Zalo', 'doan'),
        'section'     => 'contact_widget_section',
        'type'        => 'text',
        'description' => __('Chỉ nhập số. Ví dụ: 0367722389', 'doan'),
    ));
});

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

add_filter('comments_open', function($open, $post_id){
    if (is_page('dang-ky-tu-van') || is_page_template('page-dang-ky-tu-van.php')) {
        return false;
    }
    return $open;
}, 10, 2);

add_filter('pings_open', function($open){
    if (is_page('dang-ky-tu-van') || is_page_template('page-dang-ky-tu-van.php')) {
        return false;
    }
    return $open;
});

add_action('init', function(){
    if (empty($_POST['acc_action'])) return;

    $redir = isset($_POST['redirect_to']) ? esc_url_raw($_POST['redirect_to']) : home_url('/');
    $redir = $redir ?: home_url('/');

   
    if ($_POST['acc_action'] === 'login') {
        if (!isset($_POST['acc_login_nonce']) || !wp_verify_nonce($_POST['acc_login_nonce'], 'acc_login_action')) {
            wp_safe_redirect(add_query_arg(['acc'=>'error','msg'=>rawurlencode(__('Token không hợp lệ.', 'doan'))], $redir));
            exit;
        }
        $user_login = isset($_POST['acc_user']) ? sanitize_text_field($_POST['acc_user']) : '';
        $pass       = isset($_POST['acc_pass']) ? (string)$_POST['acc_pass'] : '';
        $remember   = !empty($_POST['remember']);
        if (!$user_login || !$pass) {
            wp_safe_redirect(add_query_arg(['acc'=>'error','msg'=>rawurlencode(__('Vui lòng nhập đầy đủ thông tin.', 'doan'))], $redir));
            exit;
        }
     
        if (is_email($user_login)) {
            $u = get_user_by('email', $user_login);
            if ($u) { $user_login = $u->user_login; }
        }
        $signon = wp_signon(['user_login'=>$user_login,'user_password'=>$pass,'remember'=>$remember], is_ssl());
        if (is_wp_error($signon)) {
            wp_safe_redirect(add_query_arg(['acc'=>'error','msg'=>rawurlencode($signon->get_error_message())], $redir));
            exit;
        }
        wp_safe_redirect(add_query_arg(['acc'=>'login_ok'], $redir));
        exit;
    }

    if ($_POST['acc_action'] === 'register') {
        if (!isset($_POST['acc_register_nonce']) || !wp_verify_nonce($_POST['acc_register_nonce'], 'acc_register_action')) {
            wp_safe_redirect(add_query_arg(['acc'=>'error','msg'=>rawurlencode(__('Token không hợp lệ.', 'doan'))], $redir));
            exit;
        }
        $display   = isset($_POST['acc_name']) ? sanitize_text_field($_POST['acc_name']) : '';
        $user_login= isset($_POST['acc_user']) ? sanitize_user($_POST['acc_user'], true) : '';
        $email     = isset($_POST['acc_email']) ? sanitize_email($_POST['acc_email']) : '';
        $pass      = isset($_POST['acc_pass']) ? (string)$_POST['acc_pass'] : '';
        $pass2     = isset($_POST['acc_pass2']) ? (string)$_POST['acc_pass2'] : '';

        if (!$user_login || !$email || !$pass || !$pass2) {
            wp_safe_redirect(add_query_arg(['acc'=>'error','msg'=>rawurlencode(__('Vui lòng nhập đầy đủ thông tin.', 'doan'))], $redir));
            exit;
        }
        if ($pass !== $pass2) {
            wp_safe_redirect(add_query_arg(['acc'=>'error','msg'=>rawurlencode(__('Mật khẩu xác nhận không khớp.', 'doan'))], $redir));
            exit;
        }
        if (username_exists($user_login) || email_exists($email)) {
            wp_safe_redirect(add_query_arg(['acc'=>'error','msg'=>rawurlencode(__('Tên đăng nhập hoặc email đã tồn tại.', 'doan'))], $redir));
            exit;
        }
        $uid = wp_create_user($user_login, $pass, $email);
        if (is_wp_error($uid)) {
            wp_safe_redirect(add_query_arg(['acc'=>'error','msg'=>rawurlencode($uid->get_error_message())], $redir));
            exit;
        }
        if ($display) { wp_update_user(['ID'=>$uid,'display_name'=>$display]); }
      
        wp_set_current_user($uid);
        wp_set_auth_cookie($uid);
        wp_safe_redirect(add_query_arg(['acc'=>'registered'], $redir));
        exit;
    }
});

add_filter('comments_open', function($open){
    if (is_page_template('page-dang-ky-tu-van.php') || is_page_template('page-tai-khoan.php')) { return false; }
    return $open;
});
add_filter('pings_open', function($open){
    if (is_page_template('page-dang-ky-tu-van.php') || is_page_template('page-tai-khoan.php')) { return false; }
    return $open;
});
