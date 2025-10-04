<?php
/**
 * EMERGENCY CACHE CLEAR SCRIPT
 * Run this to clear ALL WordPress caches
 */

// Load WordPress
require_once('../../../wp-load.php');

if (!current_user_can('manage_options')) {
    die('Access denied');
}

echo "<h1>🔥 CLEARING ALL CACHES...</h1>";

// 1. Clear WordPress object cache
if (function_exists('wp_cache_flush')) {
    wp_cache_flush();
    echo "<p>✅ WordPress object cache cleared</p>";
}

// 2. Clear transients
global $wpdb;
$wpdb->query("DELETE FROM {$wpdb->options} WHERE option_name LIKE '_transient_%'");
echo "<p>✅ All transients deleted</p>";

// 3. Clear theme mod cache
remove_theme_mods();
echo "<p>✅ Theme mods cleared</p>";

// 4. Clear rewrite rules
flush_rewrite_rules();
echo "<p>✅ Rewrite rules flushed</p>";

// 5. Update version to force asset reload
update_option('_theme_cache_version', time() . rand(1000, 9999));
echo "<p>✅ Theme cache version updated</p>";

// 6. Clear opcode cache if available
if (function_exists('opcache_reset')) {
    opcache_reset();
    echo "<p>✅ OPcache cleared</p>";
}

echo "<hr>";
echo "<h2>✅ ALL CACHES CLEARED!</h2>";
echo "<p><strong>Now:</strong></p>";
echo "<ol>";
echo "<li>Close ALL browser tabs</li>";
echo "<li>Clear browser cache: Ctrl + Shift + Delete</li>";
echo "<li>Open new Incognito window: Ctrl + Shift + N</li>";
echo "<li>Go to: <a href='http://localhost/wordpress/' target='_blank'>http://localhost/wordpress/</a></li>";
echo "</ol>";
echo "<hr>";
echo "<p style='color:green;font-weight:bold;'>Payment icons should now display correctly!</p>";
?>

