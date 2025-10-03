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
        wp_dequeue_script('comment-reply');
        
        // Conditional loading
        if (!is_admin()) {
            wp_dequeue_style('wp-block-library');
            wp_dequeue_style('wp-block-library-theme');
            wp_dequeue_style('wc-block-style');
        }
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
    }
    
    /**
     * Optimize CSS loading with preload
     */
    public function optimize_css_loading($html, $handle, $href, $media) {
        // Preload critical CSS
        if (in_array($handle, array('dulichvietnhat-style', 'performance-optimized'))) {
            $html = str_replace("rel='stylesheet'", "rel='preload' as='style' onload=\"this.onload=null;this.rel='stylesheet'\"", $html);
            $html .= '<noscript><link rel="stylesheet" href="' . $href . '"></noscript>';
        }
        
        return $html;
    }
    
    /**
     * Optimize JS loading
     */
    public function optimize_js_loading($tag, $handle, $src) {
        // Defer non-critical JavaScript
        if (!in_array($handle, array('jquery'))) {
            $tag = str_replace(' src', ' defer src', $tag);
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
