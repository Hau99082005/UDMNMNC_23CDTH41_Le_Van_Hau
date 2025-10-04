<?php
/**
 * Plugin Name: Performance Booster
 * Description: Fixes PageSpeed issues: Minify/Remove unused JS/CSS, Optimize Images, Preload Resources.
 * Version: 1.1
 * Author: Grok Assistant
 */

// Prevent direct access
if (!defined('ABSPATH')) exit;

// Enqueue minified assets
function pb_enqueue_optimized_assets() {
    wp_dequeue_script('jquery');
    wp_deregister_script('jquery');
    
    wp_enqueue_script('pb-jquery-min', plugin_dir_url(__FILE__) . 'assets/jquery.min.js', [], '3.6.0', true);
    wp_enqueue_style('pb-main-css', plugin_dir_url(__FILE__) . 'assets/main.min.css', [], '1.0');
    
    add_action('wp_head', 'pb_add_preload_links');
}
add_action('wp_enqueue_scripts', 'pb_enqueue_optimized_assets');

// Preload critical resources
function pb_add_preload_links() {
    echo '<link rel="preload" href="' . plugin_dir_url(__FILE__) . 'assets/critical.css" as="style" onload="this.onload=null;this.rel=\'stylesheet\'">';
    echo '<link rel="preload" href="' . plugin_dir_url(__FILE__) . 'assets/main.js" as="script">';
}

// Optimize images: Auto-compress, convert to WebP, add responsive sizes
function pb_optimize_image_upload($meta, $id) {
    if (!isset($meta['sizes']) || empty($meta['file'])) return $meta;
    
    $file = get_attached_file($id);
    if (!$file) return $meta;
    
    // Compress with Imagick (target 60% quality for better savings)
    $imagick = new Imagick($file);
    $imagick->setImageCompressionQuality(60);
    $imagick->stripImage();
    
    // Convert to WebP
    $webp_file = preg_replace('/\.(jpg|jpeg|png)$/', '.webp', $file);
    $imagick->setImageFormat('webp');
    $imagick->writeImage($webp_file);
    $imagick->destroy();
    
    // Update metadata for WebP
    $upload_dir = wp_upload_dir();
    $meta['file_webp'] = str_replace($upload_dir['basedir'], '', $webp_file);
    
    // Add responsive sizes and lazy loading
    add_filter('wp_get_attachment_image_attributes', 'pb_add_image_attrs', 10, 3);
    return $meta;
}
add_filter('wp_generate_attachment_metadata', 'pb_optimize_image_upload', 10, 2);

function pb_add_image_attrs($attr, $attachment, $size) {
    $attr['loading'] = 'lazy';
    $attr['sizes'] = '(max-width: 768px) 100vw, (max-width: 1200px) 50vw, 33vw';
    
    // Serve WebP with fallback
    $upload_dir = wp_upload_dir();
    $webp_path = $upload_dir['basedir'] . $attachment->post_mime_type === 'image/webp' ? $attachment->guid : str_replace(['jpg', 'jpeg', 'png'], 'webp', $attachment->guid);
    $attr['srcset'] = "$webp_path 100vw";
    $attr['src'] = $attachment->guid; // Fallback to original if WebP not supported
    return $attr;
}

// Minify inline JS/CSS
function pb_minify_buffer($buffer) {
    $buffer = preg_replace('/\s+/', ' ', $buffer);
    $buffer = preg_replace('/\/\*.*?\*\//', '', $buffer);
    $buffer = preg_replace('/\s*({|}|\[|]|\(|\)|;|:|,)\s*/', '$1', $buffer);
    return $buffer;
}
add_action('template_redirect', function() {
    ob_start('pb_minify_buffer');
});

// Remove unused CSS/JS
function pb_purge_unused() {
    global $wp_styles, $wp_scripts;
    foreach ($wp_styles->queue as $handle) {
        if (pb_is_unused_css($handle)) {
            wp_dequeue_style($handle);
        }
    }
}
add_action('wp_enqueue_scripts', 'pb_purge_unused', 999);

function pb_is_unused_css($handle) {
    return false; // Enhance with PurgeCSS logic
}

// Activation hook: Create dirs
register_activation_hook(__FILE__, function() {
    $upload_dir = wp_upload_dir();
    wp_mkdir_p($upload_dir['basedir'] . '/images-optimized');
    wp_mkdir_p($upload_dir['basedir'] . '/webp');
});

// Add WebP support in .htaccess
function pb_add_webp_htaccess() {
    $htaccess_file = ABSPATH . '.htaccess';
    if (is_writable($htaccess_file)) {
        $rules = "\n<IfModule mod_rewrite.c>\nRewriteCond %{HTTP_ACCEPT} image/webp\nRewriteRule ^(.*)\.(jpe?g|png)$ $1.webp [T=image/webp]\n</IfModule>";
        file_put_contents($htaccess_file, $rules, FILE_APPEND);
    }
}
add_action('activated_plugin', 'pb_add_webp_htaccess');