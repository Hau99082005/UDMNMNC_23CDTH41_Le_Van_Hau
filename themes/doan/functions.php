<?php

if (!defined('_S_VERSION')) {
    // 🎨 V10.1 - PERFECT DULICHVIETNHAT.VN HEADER MATCH
    define('_S_VERSION', '10.1.' . time() . '.' . rand(1000, 9999)); // V10.1: Perfect dulichvietnhat.vn Header Match
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

/**
 * Fallback menu function for Bootstrap
 */
function doan_fallback_menu_bootstrap() {
    echo '<li class="nav-item"><a class="nav-link" href="' . esc_url(home_url('/')) . '">' . esc_html__('Trang chủ','doan') . '</a></li>';
    echo '<li class="nav-item"><a class="nav-link" href="' . esc_url(home_url('/lich-khoi-hanh')) . '">' . esc_html__('Lịch khởi hành','doan') . '</a></li>';
    echo '<li class="nav-item"><a class="nav-link" href="' . esc_url(home_url('/hinh-anh-thuc-te')) . '">' . esc_html__('Hình ảnh thực tế','doan') . '</a></li>';
    echo '<li class="nav-item"><a class="nav-link" href="' . esc_url(home_url('/kham-pha-nhat-ban')) . '">' . esc_html__('Khám phá Nhật Bản','doan') . '</a></li>';
}

/**
 * Custom Walker for Desktop Navigation
 */
class Doan_Walker_Nav_Menu extends Walker_Nav_Menu {
    
    function start_lvl(&$output, $depth = 0, $args = null) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"sub-menu\" style=\"position:absolute!important;top:100%!important;left:0!important;background:#ffffff!important;min-width:250px!important;box-shadow:0 4px 20px rgba(0,0,0,0.1)!important;border-radius:8px!important;padding:10px 0!important;margin:0!important;list-style:none!important;opacity:0!important;visibility:hidden!important;transform:translateY(-10px)!important;transition:var(--transition)!important;z-index:1000!important;\">\n";
    }
    
    function end_lvl(&$output, $depth = 0, $args = null) {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul>\n";
    }
    
    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        $indent = ($depth) ? str_repeat("\t", $depth) : '';
        
        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;
        
        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';
        
        $id = apply_filters('nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args);
        $id = $id ? ' id="' . esc_attr($id) . '"' : '';
        
        if ($depth == 0) {
            $output .= $indent . '<li' . $id . $class_names . ' style="position:relative!important;">';
        } else {
            $output .= $indent . '<li' . $id . $class_names . ' style="padding:0!important;">';
        }
        
        $attributes = ! empty($item->attr_title) ? ' title="'  . esc_attr($item->attr_title) .'"' : '';
        $attributes .= ! empty($item->target)     ? ' target="' . esc_attr($item->target     ) .'"' : '';
        $attributes .= ! empty($item->xfn)        ? ' rel="'    . esc_attr($item->xfn        ) .'"' : '';
        $attributes .= ! empty($item->url)        ? ' href="'   . esc_attr($item->url        ) .'"' : '';
        
        if ($depth == 0) {
            if (in_array('menu-item-has-children', $classes)) {
                $attributes .= ' style="color:#374151!important;text-decoration:none!important;font-weight:600!important;font-size:16px!important;padding:12px 0!important;transition:var(--transition)!important;display:flex!important;align-items:center!important;gap:5px!important;"';
                $item_output = $args->before;
                $item_output .= '<a' . $attributes . '>';
                $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
                $item_output .= '<i class="fas fa-chevron-down dropdown-icon" style="font-size:12px!important;transition:var(--transition)!important;"></i>';
                $item_output .= '</a>';
                $item_output .= $args->after;
            } else {
                $attributes .= ' style="color:#374151!important;text-decoration:none!important;font-weight:600!important;font-size:16px!important;padding:12px 0!important;transition:var(--transition)!important;"';
                $item_output = $args->before;
                $item_output .= '<a' . $attributes . '>';
                $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
                $item_output .= '</a>';
                $item_output .= $args->after;
            }
        } else {
            $attributes .= ' style="color:#374151!important;text-decoration:none!important;font-size:14px!important;padding:10px 20px!important;display:block!important;transition:var(--transition)!important;"';
            $item_output = $args->before;
            $item_output .= '<a' . $attributes . '>';
            $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
            $item_output .= '</a>';
            $item_output .= $args->after;
        }
        
        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }
    
    function end_el(&$output, $item, $depth = 0, $args = null) {
        $output .= "</li>\n";
    }
}

/**
 * Bootstrap Walker for Navigation Menu
 */
class Doan_Bootstrap_Walker_Nav_Menu extends Walker_Nav_Menu {
    
    function start_lvl(&$output, $depth = 0, $args = null) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"dropdown-menu\">\n";
    }
    
    function end_lvl(&$output, $depth = 0, $args = null) {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul>\n";
    }
    
    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        $indent = ($depth) ? str_repeat("\t", $depth) : '';
        
        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;
        
        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';
        
        $id = apply_filters('nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args);
        $id = $id ? ' id="' . esc_attr($id) . '"' : '';
        
        if ($depth == 0) {
            if (in_array('menu-item-has-children', $classes)) {
                $output .= $indent . '<li' . $id . $class_names . ' class="nav-item dropdown">';
            } else {
                $output .= $indent . '<li' . $id . $class_names . ' class="nav-item">';
            }
        } else {
            $output .= $indent . '<li' . $id . $class_names . '>';
        }
        
        $attributes = ! empty($item->attr_title) ? ' title="'  . esc_attr($item->attr_title) .'"' : '';
        $attributes .= ! empty($item->target)     ? ' target="' . esc_attr($item->target     ) .'"' : '';
        $attributes .= ! empty($item->xfn)        ? ' rel="'    . esc_attr($item->xfn        ) .'"' : '';
        $attributes .= ! empty($item->url)        ? ' href="'   . esc_attr($item->url        ) .'"' : '';
        
        if ($depth == 0) {
            if (in_array('menu-item-has-children', $classes)) {
                $attributes .= ' class="nav-link dropdown-toggle" data-bs-toggle="dropdown" role="button" aria-expanded="false"';
                $item_output = $args->before;
                $item_output .= '<a' . $attributes . '>';
                $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
                $item_output .= '</a>';
                $item_output .= $args->after;
            } else {
                $attributes .= ' class="nav-link"';
                $item_output = $args->before;
                $item_output .= '<a' . $attributes . '>';
                $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
                $item_output .= '</a>';
                $item_output .= $args->after;
            }
        } else {
            $attributes .= ' class="dropdown-item"';
            $item_output = $args->before;
            $item_output .= '<a' . $attributes . '>';
            $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
            $item_output .= '</a>';
            $item_output .= $args->after;
        }
        
        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }
    
    function end_el(&$output, $item, $depth = 0, $args = null) {
        $output .= "</li>\n";
    }
}

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

add_action('wp_enqueue_scripts', function() {
    // Remove ALL CSS that conflicts with inline styles
    wp_dequeue_style('dulichvietnhat-main'); // MAIN CSS CONFLICTS!
    wp_dequeue_style('main-css');
}, 999);

function dulichvietnhat_scripts() {
    // Critical CSS - Inline for performance + FORCE CLEAR BLUR + NO LOADING
    $critical_css = '
        :root{--primary:#ef4444;--accent:#f97316;--gray-900:#111827;--white:#ffffff;--font-base:Inter,sans-serif}
        *{box-sizing:border-box}
        body,html{font-family:var(--font-base);margin:0;padding:0;color:var(--gray-900);background:var(--white);opacity:1!important;visibility:visible!important}
        .site-header{position:relative;z-index:1000;background:var(--white);box-shadow:0 4px 6px -1px rgba(0,0,0,0.1)}
        .post-thumbnail,.tour-thumbnail,.tour-image{position:relative;width:100%;height:0;padding-bottom:62.5%;overflow:hidden}
        .post-thumbnail img,.tour-thumbnail img,.tour-image img{position:absolute;top:0;left:0;width:100%;height:100%;object-fit:cover;display:block;filter:none!important;-webkit-filter:none!important;backdrop-filter:none!important;opacity:1!important}
        .tour-image::before,.tour-image::after,.post-thumbnail::before,.post-thumbnail::after{content:none!important;display:none!important}
        .preloader,.loader,.loading,.loading-screen,.banner-loading,.spinner,[class*="loading"]{display:none!important;opacity:0!important;visibility:hidden!important}
        body,.site,.site-content,.site-main,main,section,article,img{opacity:1!important;visibility:visible!important;animation:none!important}
    ';

    
    
    // Remove WordPress block library CSS (saves 114KB!)
    wp_dequeue_style('wp-block-library');
    wp_dequeue_style('wp-block-library-theme');
    wp_dequeue_style('wc-block-style');
    wp_dequeue_style('global-styles');
    
    // Enqueue only essential styles
    $style_path = get_stylesheet_directory() . '/style.css';
    $style_version = file_exists($style_path) ? filemtime($style_path) : _S_VERSION;
    wp_enqueue_style('dulichvietnhat-style', get_stylesheet_uri(), array(), $style_version);
    
    // Add ULTRA critical CSS inline - icons + search + gallery
    $ultra_critical = '
        /* FontAwesome icons force display */
        .fas,.far,.fab,i[class*="fa-"]{font-family:"Font Awesome 6 Free"!important;font-weight:900;display:inline-block!important;visibility:visible!important;opacity:1!important;}
        .fab{font-family:"Font Awesome 6 Brands"!important;font-weight:400!important;}
        
        /* Search overlay emergency fix */
        .search-overlay.active{display:flex!important;position:fixed!important;top:0!important;left:0!important;width:100vw!important;height:100vh!important;z-index:999999!important;background:rgba(0,0,0,0.85)!important;opacity:1!important;visibility:visible!important;}
        
        /* Gallery tabs clickable */
        .gallery-tab{cursor:pointer!important;pointer-events:auto!important;z-index:100!important;}
        .gallery-panel{display:none!important;}
        .gallery-panel.active{display:block!important;}
    ';
    
    wp_add_inline_style('dulichvietnhat-style', $critical_css . $ultra_critical);
    
    // FontAwesome - REMOVED from here (already in header.php to prevent duplicates)
    
    // Font Display Fix - Skip to avoid duplicate FontAwesome
    // Removed - FontAwesome already in header.php
    
    // ============================================
    // CRITICAL: DEQUEUE ALL CONFLICTING CSS
    // ONLY KEEP ESSENTIAL: Bootstrap + Inline CSS
    // ============================================
    
    // Use Bootstrap min version (ONLY THIS)
    wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), _S_VERSION);
    
    // MODERN CSS - Now in header.php directly (NO DUPLICATE HERE)
    // Removed duplicate CSS (lines 244-652) - All styles are in header.php now
    
    // Continue with essential CSS - ALL CSS NOW IN HEADER.PHP
    
    // ENQUEUE MAIN.CSS AND DEQUEUE CONFLICTING CSS FILES
    add_action('wp_enqueue_scripts', function() {
        // Enqueue main.css
        wp_enqueue_style('dulichvietnhat-main', get_template_directory_uri() . '/main.css', array(), _S_VERSION);
        
        // Remove other CSS that conflicts with inline styles
        wp_dequeue_style('header-css');
        wp_dequeue_style('header-clean');
        wp_dequeue_style('header-override-css');
        wp_dequeue_style('comprehensive-layout-fix');
        wp_dequeue_style('mobile-responsive-fix');
        wp_dequeue_style('responsive-layout-pro');
        wp_dequeue_style('professional-layout');
        wp_dequeue_style('mobile-first-layout');
        wp_dequeue_style('professional-upgrade');
        wp_dequeue_style('responsive-enhancements');
        wp_dequeue_style('premium-design');
        wp_dequeue_style('slider-enhancements');
    }, 999);
    
    // ONLY LOAD ESSENTIAL CSS (NOT HEADER-RELATED)
    $essential_css = array(
        'banner-css'              => '/assets/css/banner.css',
        'featured-posts-css'      => '/assets/css/featured-posts.css',
        'featured-tours-css'      => '/assets/css/featured-tours.css',
    );
    
    foreach ($essential_css as $handle => $rel) {
        $path = get_stylesheet_directory() . $rel;
        if (file_exists($path)) {
            $ver = filemtime($path);
            wp_enqueue_style($handle, get_stylesheet_directory_uri() . $rel, array('bootstrap-css'), $ver);
        }
    }

    // DISABLED ALL ENHANCEMENT CSS - They cause conflicts with inline styles
    // All critical styles are now inline in wp_head

    // Enqueue search page CSS for search results
    if (is_search()) {
        $search_page_path = get_stylesheet_directory() . '/assets/css/search-page.css';
        if (file_exists($search_page_path)) {
            $search_page_version = filemtime($search_page_path);
            wp_enqueue_style('search-page', get_stylesheet_directory_uri() . '/assets/css/search-page.css', array(), $search_page_version);
            
            // ULTRA CRITICAL inline CSS - HIGHEST PRIORITY to force remove ALL blur/overlay
            $search_ultra_critical_css = '
                body.search *,body.search-results *,.search *,.search-results *{filter:none!important;-webkit-filter:none!important;backdrop-filter:none!important;-webkit-backdrop-filter:none!important}
                body.search .tour-card,body.search .tour-image,body.search .tour-image *,body.search .tour-image img,body.search .post-thumbnail,body.search .post-thumbnail *,body.search .post-thumbnail img,body.search-results .tour-card,body.search-results .tour-image,body.search-results .tour-image *,body.search-results .tour-image img,body.search-results .post-thumbnail,body.search-results .post-thumbnail *,body.search-results .post-thumbnail img,.search .tour-card,.search .tour-image,.search .tour-image *,.search .tour-image img,.search .post-thumbnail,.search .post-thumbnail *,.search .post-thumbnail img,.search-results .tour-card,.search-results .tour-image,.search-results .tour-image *,.search-results .tour-image img,.search-results .post-thumbnail,.search-results .post-thumbnail *,.search-results .post-thumbnail img{filter:none!important;-webkit-filter:none!important;opacity:1!important;backdrop-filter:none!important;-webkit-backdrop-filter:none!important;visibility:visible!important;transform:none!important;-webkit-transform:none!important;display:block!important}
                body.search .tour-image::before,body.search .tour-image::after,body.search .tour-image .overlay,body.search .tour-image [class*="overlay"],body.search .tour-image [class*="mask"],body.search .post-thumbnail::before,body.search .post-thumbnail::after,body.search .post-thumbnail .overlay,body.search .post-thumbnail [class*="overlay"],body.search .post-thumbnail [class*="mask"],body.search-results .tour-image::before,body.search-results .tour-image::after,body.search-results .tour-image .overlay,body.search-results .tour-image [class*="overlay"],body.search-results .tour-image [class*="mask"],body.search-results .post-thumbnail::before,body.search-results .post-thumbnail::after,body.search-results .post-thumbnail .overlay,body.search-results .post-thumbnail [class*="overlay"],body.search-results .post-thumbnail [class*="mask"],.search .tour-image::before,.search .tour-image::after,.search .tour-image .overlay,.search .tour-image [class*="overlay"],.search .tour-image [class*="mask"],.search .post-thumbnail::before,.search .post-thumbnail::after,.search .post-thumbnail .overlay,.search .post-thumbnail [class*="overlay"],.search .post-thumbnail [class*="mask"],.search-results .tour-image::before,.search-results .tour-image::after,.search-results .tour-image .overlay,.search-results .tour-image [class*="overlay"],.search-results .tour-image [class*="mask"],.search-results .post-thumbnail::before,.search-results .post-thumbnail::after,.search-results .post-thumbnail .overlay,.search-results .post-thumbnail [class*="overlay"],.search-results .post-thumbnail [class*="mask"]{content:none!important;display:none!important;opacity:0!important;visibility:hidden!important;background:none!important;position:absolute!important;width:0!important;height:0!important;z-index:-9999!important}
            ';
            wp_add_inline_style('search-page', $search_ultra_critical_css);
        }
    }

    
    // Icon fix removed - not needed anymore
    // Slick slider - Load async/defer để không block render
    wp_enqueue_style('slick-css', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css', array(), '1.8.1', 'all');
    wp_enqueue_style('slick-theme-css', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css', array('slick-css'), '1.8.1', 'all');

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
      accessibility: false,
      prevArrow: '<button type="button" class="slick-prev" aria-label="Previous" title="Previous">\n         <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">\n           <path d="M15 18L9 12L15 6" stroke="#111827" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>\n         </svg>\n       </button>',
      nextArrow: '<button type="button" class="slick-next" aria-label="Next" title="Next">\n         <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">\n           <path d="M9 6L15 12L9 18" stroke="#111827" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>\n         </svg>\n       </button>',
      responsive: [
        { breakpoint: 1280, settings: { slidesToShow: 3 } },
        { breakpoint: 992,  settings: { slidesToShow: 2 } },
        { breakpoint: 576,  settings: { slidesToShow: 1 } }
      ]
    });
  });
});})(jQuery);
JS;
     wp_add_inline_script('slick-js', $news_slider_init);

    // ⚡ CONDITIONAL JQUERY LOADING - Chỉ load khi thực sự cần
    $needs_jquery = false;
    
    // jQuery cần cho:
    // 1. Front page (có slider)
    // 2. Mobile menu (tất cả trang)
    // 3. Search overlay
    // 4. Admin gallery
    // 5. Tất cả trang để mobile menu hoạt động
    if (is_front_page() || is_admin() || true) { // Load jQuery trên tất cả trang
        $needs_jquery = true;
    }
    
    // Allow filter để enable jQuery cho pages khác nếu cần
    $needs_jquery = apply_filters('dulichvietnhat_needs_jquery', $needs_jquery);
    
    if ($needs_jquery) {
        // Load jQuery in footer, defer để không block render
        wp_enqueue_script('jquery', '', array(), '', true);
    }
    
    // Header JS - Pure JavaScript (NO jQuery dependency)
    wp_enqueue_script('header-js', get_template_directory_uri() . '/assets/js/header.js', array(), _S_VERSION, true);
    
    // Modern Header Effects - Pure JavaScript (no jQuery)
    $modern_header_js = get_template_directory() . '/assets/js/modern-header.js';
    if (file_exists($modern_header_js)) {
        wp_enqueue_script('modern-header', get_template_directory_uri() . '/assets/js/modern-header.js', array(), _S_VERSION, true);
    }
    
    // Main JS - Conditional jQuery dependency
    $main_deps = $needs_jquery ? array('jquery') : array();
    wp_enqueue_script('dulichvietnhat-main-js', get_template_directory_uri() . '/assets/js/main.js', $main_deps, _S_VERSION, true);
    
    // Custom JS - Conditional jQuery dependency
    $custom_deps = $needs_jquery ? array('jquery') : array();
    wp_enqueue_script('dulichvietnhat-custom-js', get_template_directory_uri() . '/assets/js/custom.js', $custom_deps, _S_VERSION, true);
    
    // Bootstrap JS - Load for carousel auto-play and mobile menu
    $needs_bootstrap = false;
    
    // Check if current page needs Bootstrap JS
    // Load Bootstrap JS on all pages for mobile menu functionality
    if (is_front_page() || is_singular('tour') || is_page(array('dang-ky-tu-van', 'tai-khoan')) || is_search() || true) {
        $needs_bootstrap = true;
    }
    
    // Apply filter to allow other code to enable Bootstrap
    $needs_bootstrap = apply_filters('dulichvietnhat_needs_bootstrap_js', $needs_bootstrap);
    
    if ($needs_bootstrap) {
        // Bootstrap không cần jQuery (v5+) - Load for carousel functionality
        wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/assets/js/bootstrap.bundle.js', array(), _S_VERSION, true);
    }
    
    // Banner JS - Only on front page (needs jQuery for slider)
    if (is_front_page()) {
        wp_enqueue_script('banner-js', get_template_directory_uri() . '/assets/js/banner.js', $needs_jquery ? array('jquery') : array(), _S_VERSION, true);
    }

    wp_localize_script('dulichvietnhat-custom-js', 'dulichvietnhatSettings', array(
        'ajaxUrl' => admin_url('admin-ajax.php'),
        'homeUrl' => home_url(),
        'isMobile' => wp_is_mobile(),
    ));

    // CONDITIONAL: Professional Enhancements JS - Pure JS (no jQuery)
    $professional_js_path = get_stylesheet_directory() . '/assets/js/professional-enhancements.js';
    if (file_exists($professional_js_path)) {
        wp_enqueue_script('professional-enhancements', get_stylesheet_directory_uri() . '/assets/js/professional-enhancements.js', array(), filemtime($professional_js_path), true);
    }

    // CONDITIONAL: Search page JS - Pure JS (no jQuery)
    if (is_search()) {
        $search_page_js_path = get_stylesheet_directory() . '/assets/js/search-page.js';
        if (file_exists($search_page_js_path)) {
            wp_enqueue_script('search-page-js', get_stylesheet_directory_uri() . '/assets/js/search-page.js', array(), filemtime($search_page_js_path), true);
        }
    }

    // Mobile menu - Load on ALL pages for mobile menu functionality
    $mobile_menu_js_path = get_stylesheet_directory() . '/assets/js/mobile-menu-pro.js';
    if (file_exists($mobile_menu_js_path)) {
        wp_enqueue_script('mobile-menu-pro', get_stylesheet_directory_uri() . '/assets/js/mobile-menu-pro.js', array(), filemtime($mobile_menu_js_path), true);
    }
    
    // Search overlay - Pure JS (no jQuery needed)
    $search_overlay_js_path = get_stylesheet_directory() . '/assets/js/search-overlay-fix.js';
    if (file_exists($search_overlay_js_path)) {
        wp_enqueue_script('search-overlay-fix', get_stylesheet_directory_uri() . '/assets/js/search-overlay-fix.js', array(), filemtime($search_overlay_js_path), true);
    }

    $gallery_a11y_js_path = get_stylesheet_directory() . '/assets/js/gallery-accessibility.js';
    if (file_exists($gallery_a11y_js_path)) {
        wp_enqueue_script('gallery-accessibility', get_stylesheet_directory_uri() . '/assets/js/gallery-accessibility.js', array(), filemtime($gallery_a11y_js_path), true);
    }

    // CONDITIONAL: Slick slider fixes - Only if Slick is used (front page with news slider)
    if (is_front_page()) {
    $fix_slick_aria_path = get_stylesheet_directory() . '/assets/js/fix-slick-aria.js';
    if (file_exists($fix_slick_aria_path)) {
        wp_enqueue_script('fix-slick-aria', get_stylesheet_directory_uri() . '/assets/js/fix-slick-aria.js', array(), filemtime($fix_slick_aria_path), true);
        }
    }

    // Accessibility buttons - Always needed
    $a11y_buttons_path = get_stylesheet_directory() . '/assets/js/accessibility-buttons.js';
    if (file_exists($a11y_buttons_path)) {
        wp_enqueue_script('accessibility-buttons', get_stylesheet_directory_uri() . '/assets/js/accessibility-buttons.js', array(), filemtime($a11y_buttons_path), true);
    }

    // FORM ACCESSIBILITY - Load on ALL pages to ensure all forms have labels
    $form_a11y_path = get_stylesheet_directory() . '/assets/js/form-accessibility.js';
    if (file_exists($form_a11y_path)) {
        // Load with no dependencies and in footer
        wp_enqueue_script('form-accessibility', get_stylesheet_directory_uri() . '/assets/js/form-accessibility.js', array(), filemtime($form_a11y_path), true);
        
        // Add inline script to ensure it runs immediately
        $inline_fix = "
        (function(){
            function quickFix(){
                document.querySelectorAll('.jvcf-form input:not([type=\"hidden\"]):not([type=\"submit\"]), .jvcf-form textarea, .jvcf-form select').forEach(function(input){
                    if(!input.id){input.id='input-'+Math.random().toString(36).substr(2,9);}
                    if(!input.getAttribute('aria-label')&&!document.querySelector('label[for=\"'+input.id+'\"]')){
                        var label=input.placeholder||input.name||'Input field';
                        input.setAttribute('aria-label',label);
                    }
                });
            }
            if(document.readyState==='loading'){document.addEventListener('DOMContentLoaded',quickFix);}else{quickFix();}
            setTimeout(quickFix,500);setTimeout(quickFix,1000);setTimeout(quickFix,2000);
        })();
        ";
        wp_add_inline_script('form-accessibility', $inline_fix, 'before');
    }

    // CSS đã được enqueue ở trên trong enhancement_styles - skip duplicates

    // Only enqueue comment reply if needed
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }

    $main_path = get_stylesheet_directory() . '/main.css';
    if (file_exists($main_path)) {
        $main_version = filemtime($main_path);
        // main.css loads AFTER header-clean to prevent override
        $deps = array('dulichvietnhat-style','bootstrap-css');
        if (wp_style_is('header-clean', 'registered') || wp_style_is('header-clean', 'enqueued')) {
            $deps[] = 'header-clean';
        }
        wp_enqueue_style('dulichvietnhat-main', get_stylesheet_directory_uri() . '/main.css', $deps, $main_version);
        
        $overlay_fix_css = '.posts-grid .post-category,.post-card .post-category,.tour-card .post-category,.card .post-category,.category-tag,.post-badge,.image-badge{display:none!important}.post-thumbnail .overlay,.post-thumbnail::before,.post-thumbnail::after,.post-thumbnail .post-category,.post-image::before,.post-image::after,.tour-image::before,.tour-image::after,.destination-image::before,.destination-image::after,.entry-media::before,.entry-media::after{content:none!important;display:none!important;background:transparent!important;opacity:0!important}.post-thumbnail img,.post-image img,.tour-image img,.destination-image img,.entry-media img{filter:none!important;opacity:1!important}.custom-logo{max-height:48px;width:auto;height:auto}.site-header .logo-text{margin-left:10px;display:inline-block;vertical-align:middle}';
        wp_add_inline_style('dulichvietnhat-main', $overlay_fix_css);
    }

    // All CSS files have been restored for full functionality

    // DISABLED header-override.css - conflicts with inline header CSS
    // Using inline CSS in wp_head with priority 1 instead
    
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

// ⚡ DEFER jQuery để không block render
add_filter('script_loader_tag', function($tag, $handle, $src) {
    // Defer jQuery chỉ trên front-end (không phải admin)
    if ($handle === 'jquery' && !is_admin()) {
        // Thay đổi từ <script src='...'> thành <script defer src='...'>
        $tag = str_replace(' src', ' defer src', $tag);
    }
    return $tag;
}, 10, 3);

// DEFER CHỈ Slick CSS - Không defer layout CSS
add_filter('style_loader_tag', function($html, $handle, $href, $media) {
    // KHÔNG BAO GIỜ DEFER - Critical layout styles
    $never_defer = array(
        'dulichvietnhat-style',
        'bootstrap-css',
        'header-clean',           // NEW: Header clean CSS
        'comprehensive-layout-fix',
        'header-css',
        'dulichvietnhat-main'
    );
    
    if (in_array($handle, $never_defer)) {
        return $html; // Load normally
    }
    
    // CHỈ defer Slick slider CSS (không cần cho initial render)
    $defer_only = array(
        'slick-css',
        'slick-theme-css'
    );
    
    if (in_array($handle, $defer_only)) {
        // Async load - không block render
        return '<link rel="preload" as="style" href="' . esc_url($href) . '" onload="this.onload=null;this.rel=\'stylesheet\'" media="print"><noscript><link rel="stylesheet" href="' . esc_url($href) . '"></noscript>';
    }
    
    // Load tất cả CSS khác normally để tránh vỡ layout
    return $html;
}, 10, 4);

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
require get_template_directory() . '/inc/seo-optimizer.php';
require get_template_directory() . '/inc/accessibility-optimizer.php';
require get_template_directory() . '/inc/ultra-performance.php';
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

// DEBUG: Show which CSS files are loaded
add_action('wp_head', function() {
    if (current_user_can('administrator')) {
        echo '<!-- CSS Load Order Debug -->' . "\n";
        echo '<!-- header-clean.css: ' . (wp_style_is('header-clean', 'enqueued') ? 'LOADED' : 'NOT LOADED') . ' -->' . "\n";
        echo '<!-- main.css: ' . (wp_style_is('dulichvietnhat-main', 'enqueued') ? 'LOADED' : 'NOT LOADED') . ' -->' . "\n";
    }
}, 999);

// REMOVED - All critical CSS now in header.php directly (no duplicate)

function dulichvietnhat_strip_overlays_dom() {
    ?>
    <script>
    !function(){function e(){var e=[".post-thumbnail .overlay",".post-thumbnail .mask",".post-thumbnail .shade",".post-thumbnail .cover",".post-image .overlay",".post-image .mask",".post-image .shade",".post-image .cover",".tour-image .overlay",".destination-image .overlay",".entry-media .overlay",".post-thumbnail .post-category",".post-card .post-category",".tour-card .post-category",".card .post-category",".category-tag",".post-badge",".image-badge"];try{document.querySelectorAll(e.join(",")).forEach((function(e){e.style.display="none",e.removeAttribute("style"),e.remove()}))}catch(e){}document.querySelectorAll(".post-thumbnail, .post-image, .tour-image, .destination-image, .entry-media").forEach((function(e){Array.prototype.slice.call(e.children).forEach((function(e){if(e.tagName&&"img"===e.tagName.toLowerCase())return;var t=window.getComputedStyle(e),o="absolute"===t.position||"fixed"===t.position,n="0px"===t.top&&"0px"===t.left||"0px"===t.inset,a=t.backgroundColor&&"rgba(0, 0, 0, 0)"!==t.backgroundColor&&"transparent"!==t.backgroundColor;o&&n&&(e.style.display="none"),a&&(e.style.background="transparent",e.style.opacity="0")}))})}"loading"===document.readyState?document.addEventListener("DOMContentLoaded",e):e(),window.addEventListener("load",(function(){setTimeout(e,0),setTimeout(e,300)}))}();
    </script>
    <?php
}
add_action('wp_footer', 'dulichvietnhat_strip_overlays_dom', 9999);

// ⚡ Form accessibility fix - MINIFIED (saves 2.5KB)
add_action('wp_footer', function() {
    ?>
    <script>
    !function(){function e(){const e=document.querySelectorAll('input:not([type="hidden"]):not([type="submit"]):not([type="button"]), textarea, select');let t=0;e.forEach((function(e){if(e.getAttribute("aria-label")||e.getAttribute("aria-labelledby"))return;if(e.id&&document.querySelector('label[for="'+e.id+'"]'))return;e.id||(e.id="auto-id-"+Math.random().toString(36).substr(2,9));let n="";const a=e.name||"",i=e.type||"";if(a.includes("travel_date")||a.includes("date")||"date"===i)n="Ngày khởi hành";else if(a.includes("name")||a.includes("full_name"))n="Họ và tên";else if(a.includes("email"))n="Email";else if(a.includes("phone")||a.includes("tel")||"tel"===i)n="Số điện thoại";else if(a.includes("message")||"TEXTAREA"===e.tagName)n="Tin nhắn";else if(a.includes("subject"))n="Tiêu đề";else if(e.placeholder)n=e.placeholder;else if(a)n=a.replace(/_/g," ").replace(/\b\w/g,(function(e){return e.toUpperCase()}));else n="Thông tin";if(e.setAttribute("aria-label",n),(e.required||e.hasAttribute("required"))&&e.setAttribute("aria-required","true"),parent=e.parentElement){const a=parent.querySelector('label[for="'+e.id+'"]');if(!a){const a=document.createElement("label");if(a.setAttribute("for",e.id),a.textContent=n,a.style.display="block",a.style.marginBottom="6px",a.style.fontWeight="600",a.style.fontSize="14px",a.style.color="#374151",e.required){const e=document.createElement("span");e.textContent=" *",e.style.color="#ef4444",a.appendChild(e)}parent.insertBefore(a,e),t++}}})),t>0&&console.log("✓ Form Accessibility: Fixed "+t+" inputs")}if(e(),setTimeout(e,300),setTimeout(e,800),setTimeout(e,1500),setTimeout(e,3e3),"undefined"!=typeof MutationObserver){new MutationObserver((function(t){let n=!1;t.forEach((function(e){e.addedNodes.forEach((function(e){1===e.nodeType&&("INPUT"===e.tagName||"TEXTAREA"===e.tagName||"SELECT"===e.tagName||e.querySelector("input, textarea, select"))&&(n=!0)}))})),n&&setTimeout(e,100)})).observe(document.body,{childList:!0,subtree:!0})}}();
    </script>
    <?php
}, 9999);

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
        $(document).on('click','.dln-gallery-clear',function(){var $wrap=$(this).closest('.dln-gallery-wrapper');$wrap.find('.dln-gallery-items').empty();u($wrap);});});})(jQuery);
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
