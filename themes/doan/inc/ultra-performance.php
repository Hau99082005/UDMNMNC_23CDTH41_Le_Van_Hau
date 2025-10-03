<?php
/**
 * Ultra Performance Optimizer - Đạt 90+ Performance Score
 */

if (!defined('ABSPATH')) {
    exit;
}

class UltraPerformanceOptimizer {
    
    public function __construct() {
        // Remove ALL unnecessary CSS/JS
        add_action('wp_enqueue_scripts', array($this, 'remove_bloat'), 1);
        
        // Defer all CSS
        add_filter('style_loader_tag', array($this, 'defer_css'), 999, 4);
        
        // Defer all non-critical JS
        add_filter('script_loader_tag', array($this, 'defer_js'), 999, 3);
        
        // Optimize fonts
        add_action('wp_head', array($this, 'optimize_fonts'), 0);
        
        // Remove query strings
        add_filter('script_loader_src', array($this, 'remove_query_strings'), 15, 1);
        add_filter('style_loader_src', array($this, 'remove_query_strings'), 15, 1);
    }
    
    /**
     * Remove WordPress bloat
     */
    public function remove_bloat() {
        // Remove ALL WordPress default CSS
        wp_dequeue_style('wp-block-library');
        wp_dequeue_style('wp-block-library-theme');
        wp_dequeue_style('wc-blocks-style');
        wp_dequeue_style('classic-theme-styles');
        wp_dequeue_style('global-styles');
        
        // Remove WordPress default JS
        wp_deregister_script('wp-embed');
        wp_dequeue_script('wp-embed');
        
        // Remove jQuery Migrate (saves 14KB)
        wp_deregister_script('jquery-migrate');
        
        // Remove emoji scripts (saves bandwidth)
        remove_action('wp_head', 'print_emoji_detection_script', 7);
        remove_action('wp_print_styles', 'print_emoji_styles');
    }
    
    /**
     * Defer non-critical CSS
     */
    public function defer_css($html, $handle, $href, $media) {
        // Critical CSS handles - load immediately
        $critical = array('dulichvietnhat-style', 'force-clear-blur');
        
        if (!in_array($handle, $critical)) {
            // Defer loading
            $html = str_replace("rel='stylesheet'", "rel='preload' as='style' onload=\"this.onload=null;this.rel='stylesheet'\"", $html);
            $html = str_replace('media=\'all\'', 'media=\'all\'', $html);
            $html .= '<noscript><link rel="stylesheet" href="' . $href . '"></noscript>';
        }
        
        return $html;
    }
    
    /**
     * Defer non-critical JavaScript
     */
    public function defer_js($tag, $handle, $src) {
        // Don't defer jQuery
        if ($handle === 'jquery' || $handle === 'jquery-core') {
            return $tag;
        }
        
        // Add defer to all other scripts
        if (strpos($tag, 'defer') === false && strpos($tag, 'async') === false) {
            $tag = str_replace(' src', ' defer src', $tag);
        }
        
        return $tag;
    }
    
    /**
     * Optimize font loading
     */
    public function optimize_fonts() {
        // Preload Inter font
        echo '<link rel="preload" href="https://fonts.gstatic.com/s/inter/v12/UcCO3FwrK3iLTeHuS_fvQtMwCp50KnMw2boKoduKmMEVuLyfAZ9hiA.woff2" as="font" type="font/woff2" crossorigin>';
        
        // Use font-display: swap
        echo '<style>@font-face{font-family:Inter;font-display:swap;src:url(https://fonts.gstatic.com/s/inter/v12/UcCO3FwrK3iLTeHuS_fvQtMwCp50KnMw2boKoduKmMEVuLyfAZ9hiA.woff2) format("woff2")}</style>';
    }
    
    /**
     * Remove query strings from static resources
     */
    public function remove_query_strings($src) {
        if (strpos($src, 'ver=')) {
            $src = remove_query_arg('ver', $src);
        }
        return $src;
    }
}

// Initialize Ultra Performance
new UltraPerformanceOptimizer();

/**
 * Enable Gzip compression
 */
add_action('init', function() {
    if (!is_admin() && !headers_sent()) {
        if (extension_loaded('zlib') && !ini_get('zlib.output_compression')) {
            if (ob_get_level() == 0) {
                ob_start('ob_gzhandler');
            }
        }
    }
});

/**
 * Add cache headers
 */
add_action('send_headers', function() {
    if (!is_admin()) {
        header('Cache-Control: public, max-age=31536000');
        header('Expires: ' . gmdate('D, d M Y H:i:s', time() + 31536000) . ' GMT');
    }
});

