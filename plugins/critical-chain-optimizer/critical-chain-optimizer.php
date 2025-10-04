<?php
/**
 * Plugin Name: Critical Chain Optimizer
 * Description: Optimizes critical request chains by deferring resources, reducing size, and adding preconnect hints.
 * Version: 1.0
 * Author: Grok Assistant
 */

// Prevent direct access
if (!defined('ABSPATH')) exit;

// Optimize enqueued scripts and styles
function cco_optimize_assets() {
    // Defer non-critical JS
    wp_script_add_data('jquery', 'strategy', 'defer');
    foreach (wp_scripts()->queue as $handle) {
        if ($handle !== 'jquery' && strpos($handle, 'critical') === false) {
            wp_script_add_data($handle, 'strategy', 'defer');
        }
    }

    // Defer and optimize CSS (e.g., all.min.css from cdnjs)
    foreach (wp_styles()->queue as $handle) {
        if ($handle === 'all-min-css' || strpos($handle, 'all.min.css') !== false) {
            wp_style_add_data($handle, 'strategy', 'defer');
            wp_style_add_data($handle, 'conditional', 'lt IE 9'); // Optional IE fallback
        }
    }

    // Add preconnect hints for key origins
    add_action('wp_head', 'cco_add_preconnect_hints', 1);
}
add_action('wp_enqueue_scripts', 'cco_optimize_assets');

// Add preconnect hints
function cco_add_preconnect_hints() {
    echo '<link rel="preconnect" href="https://cdnjs.cloudflare.com" crossorigin>';
    // Add up to 3 more origins if identified (e.g., your CDN or API)
    // Example: echo '<link rel="preconnect" href="https://yourdomain.com" crossorigin>';
}

// Delay non-critical resource loading
function cco_delay_non_critical_resources() {
    ob_start(function ($buffer) {
        // Delay loading of non-critical CSS/JS (e.g., analytics, third-party scripts)
        $buffer = preg_replace('/<link rel=["\']stylesheet["\'][^>]+href=["\']https:\/\/cdnjs\.cloudflare\.com\/[^>]+>/', '', $buffer); // Remove if deferred
        $buffer = str_replace('</body>', '<script>function loadDeferredResources(){var e=document.createElement("link");e.rel="stylesheet",e.href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css",document.head.appendChild(e)}window.addEventListener("load",loadDeferredResources);</script></body>', $buffer);
        return $buffer;
    });
}
add_action('template_redirect', 'cco_delay_non_critical_resources');

// Activation hook: Add notes to admin
register_activation_hook(__FILE__, function() {
    add_action('admin_notices', function() {
        echo '<div class="notice notice-info"><p>Critical Chain Optimizer activated. Ensure https://cdnjs.cloudflare.com is a key origin. Check LCP after 24h.</p></div>';
    });
});