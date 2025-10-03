<?php
/**
 * Performance Optimizer
 * Ultra-light theme optimization for maximum speed
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

class ThemePerformanceOptimizer {
    
    public function __construct() {
        add_action('init', array($this, 'init_optimizations'));
        add_action('wp_enqueue_scripts', array($this, 'optimize_assets'), 999);
        add_action('wp_head', array($this, 'add_performance_meta'), 1);
        add_action('wp_head', array($this, 'remove_noindex_meta'), 0);
        add_filter('style_loader_tag', array($this, 'optimize_css_loading'), 10, 4);
        add_filter('script_loader_tag', array($this, 'optimize_js_loading'), 10, 3);
    }
    
    /**
     * Initialize performance optimizations
     */
    public function init_optimizations() {
        // Remove unnecessary WordPress features
        remove_action('wp_head', 'wp_generator');
        remove_action('wp_head', 'wlwmanifest_link');
        remove_action('wp_head', 'rsd_link');
        remove_action('wp_head', 'wp_shortlink_wp_head');
        remove_action('wp_head', 'feed_links_extra', 3);
        
        // Disable emoji scripts
        remove_action('wp_head', 'print_emoji_detection_script', 7);
        remove_action('wp_print_styles', 'print_emoji_styles');
        remove_action('admin_print_scripts', 'print_emoji_detection_script');
        remove_action('admin_print_styles', 'print_emoji_styles');
        
        // Disable WordPress REST API for non-logged users
        add_filter('rest_authentication_errors', array($this, 'disable_rest_api'));
    }
    
    /**
     * Optimize asset loading
     */
    public function optimize_assets() {
        // Remove unnecessary scripts
        wp_dequeue_script('wp-embed');
        
        // Conditional loading
        if (!is_admin()) {
            // Remove WordPress bloat CSS (saves 114KB+)
            wp_dequeue_style('wp-block-library');
            wp_dequeue_style('wp-block-library-theme');
            wp_dequeue_style('wc-block-style');
            wp_dequeue_style('classic-theme-styles');
            wp_dequeue_style('global-styles');
            
            // Remove WordPress bloat JS
            wp_dequeue_script('wp-embed');
            wp_deregister_script('wp-embed');
        }
    }
    
    /**
     * Remove noindex meta tag - Allow search engines to index
     */
    public function remove_noindex_meta() {
        // FORCE REMOVE all noindex sources
        remove_action('wp_head', 'noindex', 1);
        remove_action('wp_head', 'wp_no_robots');
        remove_action('wp_head', 'wp_robots');
        
        // Override blog_public option
        add_filter('pre_option_blog_public', function() {
            return '1'; // Always public
        }, 999);
        
        // Force remove noindex from wp_robots
        add_filter('wp_robots', function($robots) {
            // Remove all blocking directives
            unset($robots['noindex']);
            unset($robots['nofollow']);
            unset($robots['noarchive']);
            unset($robots['nosnippet']);
            
            // Force indexing
            $robots = array(
                'index' => true,
                'follow' => true,
                'max-image-preview' => 'large',
                'max-snippet' => -1,
                'max-video-preview' => -1
            );
            
            return $robots;
        }, 9999);
        
        // Completely disable wp_robots meta tag output
        add_filter('wp_robots_no_robots', '__return_false', 9999);
        
        // Remove login/admin no-robots
        remove_action('login_head', 'wp_no_robots');
        remove_action('admin_head', 'wp_no_robots');
    }
    
    /**
     * Add performance meta tags
     */
    public function add_performance_meta() {
        echo '<meta name="viewport" content="width=device-width,initial-scale=1">';
        echo '<meta name="format-detection" content="telephone=no">';
        echo '<link rel="dns-prefetch" href="//fonts.googleapis.com">';
        echo '<link rel="dns-prefetch" href="//cdnjs.cloudflare.com">';
        echo '<link rel="preconnect" href="https://fonts.googleapis.com" crossorigin>';
        echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>';
        
        // Add SEO meta tags
        if (!function_exists('wp_seo_meta')) {
            echo '<meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">';
            
            // Add meta description
            $this->add_meta_description();
        }
    }
    
    /**
     * Add dynamic meta description for SEO
     */
    public function add_meta_description() {
        $description = '';
        
        if (is_front_page() || is_home()) {
            // Homepage description
            $description = get_bloginfo('description');
            if (empty($description)) {
                $description = 'Du lịch Việt Nhật - Chuyên tổ chức tour du lịch Nhật Bản chất lượng cao. Khám phá xứ sở Hoa Anh Đào với các tour 5N4Đ, 6N5Đ, 7N6Đ uy tín, giá tốt nhất.';
            }
        } elseif (is_singular()) {
            // Post/Page description
            if (has_excerpt()) {
                $description = get_the_excerpt();
            } else {
                $description = wp_trim_words(wp_strip_all_tags(get_the_content()), 30, '...');
            }
            
            // Add custom field description if available
            if (function_exists('get_field')) {
                $custom_desc = get_field('seo_description');
                if ($custom_desc) {
                    $description = $custom_desc;
                }
            }
        } elseif (is_category()) {
            // Category description
            $category = get_queried_object();
            $description = $category->description;
            if (empty($description)) {
                $description = 'Xem tất cả bài viết trong danh mục ' . $category->name . ' - Du lịch Việt Nhật.';
            }
        } elseif (is_tag()) {
            // Tag description
            $tag = get_queried_object();
            $description = $tag->description;
            if (empty($description)) {
                $description = 'Các bài viết về ' . $tag->name . ' - Du lịch Việt Nhật.';
            }
        } elseif (is_search()) {
            // Search results description
            $search_query = get_search_query();
            $description = sprintf('Kết quả tìm kiếm cho "%s" - Du lịch Việt Nhật. Tìm kiếm tour, bài viết và thông tin du lịch Nhật Bản.', $search_query);
        } elseif (is_archive()) {
            // Archive description
            $post_type = get_post_type();
            $post_type_obj = get_post_type_object($post_type);
            if ($post_type_obj) {
                $description = 'Xem tất cả ' . $post_type_obj->labels->name . ' - Du lịch Việt Nhật. Khám phá các tour du lịch Nhật Bản chất lượng.';
            }
        } elseif (is_404()) {
            $description = 'Trang không tìm thấy - Du lịch Việt Nhật. Vui lòng quay lại trang chủ hoặc tìm kiếm thông tin bạn cần.';
        }
        
        // Clean and trim description
        $description = wp_strip_all_tags($description);
        $description = str_replace(array("\n", "\r", "\t"), ' ', $description);
        $description = preg_replace('/\s+/', ' ', $description);
        $description = trim($description);
        
        // Limit to 160 characters for optimal SEO
        if (strlen($description) > 160) {
            $description = substr($description, 0, 157) . '...';
        }
        
        if (!empty($description)) {
            echo '<meta name="description" content="' . esc_attr($description) . '">';
            
            // Add Open Graph meta tags for social sharing
            echo '<meta property="og:description" content="' . esc_attr($description) . '">';
            echo '<meta name="twitter:description" content="' . esc_attr($description) . '">';
            
            // Add title meta tags
            $title = wp_get_document_title();
            echo '<meta property="og:title" content="' . esc_attr($title) . '">';
            echo '<meta name="twitter:title" content="' . esc_attr($title) . '">';
            echo '<meta property="og:type" content="website">';
            echo '<meta name="twitter:card" content="summary_large_image">';
            
            // Add URL
            echo '<meta property="og:url" content="' . esc_url(get_permalink()) . '">';
            
            // Add image if available
            if (is_singular() && has_post_thumbnail()) {
                $image = get_the_post_thumbnail_url(get_the_ID(), 'large');
                if ($image) {
                    echo '<meta property="og:image" content="' . esc_url($image) . '">';
                    echo '<meta name="twitter:image" content="' . esc_url($image) . '">';
                }
            }
        }
    }
    
    /**
     * Optimize CSS loading with preload
     */
    public function optimize_css_loading($html, $handle, $href, $media) {
        // Defer non-critical CSS
        $defer_handles = array(
            'bootstrap-css',
            'slider-enhancements',
            'responsive-enhancements',
            'premium-design',
            'professional-layout',
            'balanced-optimization',
            'slick-css',
            'slick-theme-css'
        );
        
        if (in_array($handle, $defer_handles)) {
            // Defer loading non-critical CSS
            $html = str_replace("media='all'", "media='print' onload=\"this.media='all'\"", $html);
            $html .= '<noscript><link rel="stylesheet" href="' . $href . '"></noscript>';
        }
        
        return $html;
    }
    
    /**
     * Optimize JS loading
     */
    public function optimize_js_loading($tag, $handle, $src) {
        // List of scripts that MUST NOT be deferred
        $no_defer = array('jquery', 'jquery-core', 'jquery-migrate');
        
        // Defer non-critical JavaScript
        if (!in_array($handle, $no_defer)) {
            // Add defer attribute
            if (strpos($tag, 'defer') === false) {
                $tag = str_replace(' src', ' defer src', $tag);
            }
        }
        
        return $tag;
    }
    
    /**
     * Disable REST API for non-logged users
     */
    public function disable_rest_api($access) {
        if (!is_user_logged_in()) {
            return new WP_Error('rest_cannot_access', 'REST API disabled for non-logged users.', array('status' => 403));
        }
        return $access;
    }
    
    /**
     * Get optimized image sizes
     */
    public static function get_optimized_image_sizes() {
        return array(
            'thumbnail' => array(150, 150, true),
            'medium' => array(300, 200, true),
            'medium_large' => array(768, 480, true),
            'large' => array(1024, 640, true),
        );
    }
    
    /**
     * Add lazy loading to images
     */
    public static function add_lazy_loading($content) {
        if (is_admin() || is_feed() || is_preview()) {
            return $content;
        }
        
        $content = preg_replace('/<img(.*?)src=/', '<img$1loading="lazy" src=', $content);
        return $content;
    }
}

// Initialize performance optimizer
new ThemePerformanceOptimizer();

/**
 * Add lazy loading to post content
 */
add_filter('the_content', array('ThemePerformanceOptimizer', 'add_lazy_loading'));

/**
 * Optimize image sizes
 */
add_action('after_setup_theme', function() {
    $sizes = ThemePerformanceOptimizer::get_optimized_image_sizes();
    foreach ($sizes as $name => $size) {
        add_image_size($name, $size[0], $size[1], $size[2]);
    }
});

/**
 * Remove unnecessary meta boxes
 */
add_action('admin_menu', function() {
    remove_meta_box('dashboard_quick_press', 'dashboard', 'side');
    remove_meta_box('dashboard_recent_drafts', 'dashboard', 'side');
    remove_meta_box('dashboard_primary', 'dashboard', 'side');
    remove_meta_box('dashboard_secondary', 'dashboard', 'side');
});

/**
 * Optimize database queries
 */
add_action('pre_get_posts', function($query) {
    if (!is_admin() && $query->is_main_query()) {
        // Optimize queries
        $query->set('no_found_rows', true);
        $query->set('update_post_meta_cache', false);
        $query->set('update_post_term_cache', false);
    }
});
