<?php
/**
 * Plugin Name: JV Contact Form
 * Description: Form liên hệ tư vấn (shortcode: [jv_contact_form]) với lưu CSDL, gửi email, trang quản trị và cài đặt.
 * Version: 1.0.0
 * Author: You
 * Text Domain: jv-contact-form
 */

if (!defined('ABSPATH')) exit;

// Activation hardening: swallow any unintended output (e.g., BOM) during activation to prevent
// "headers already sent" and similar issues. This is safe and only affects the activation request.
if (is_admin() && isset($_GET['activate'])) {
    // Start buffering as early as possible
    if (!ob_get_level()) {
        ob_start();
    }
    // Ensure buffer is cleaned at shutdown of the activation request
    add_action('shutdown', function() {
        if (ob_get_level()) {
            @ob_end_clean();
        }
    }, 0);
}

define('JVCF_VERSION', '1.0.0');
define('JVCF_PATH', plugin_dir_path(__FILE__));
define('JVCF_URL', plugin_dir_url(__FILE__));

require_once JVCF_PATH . 'includes/class-jv-contact-form.php';
require_once JVCF_PATH . 'includes/admin-page.php';

register_activation_hook(__FILE__, ['JV_Contact_Form', 'activate']);
register_uninstall_hook(__FILE__, 'jvcf_uninstall_plugin');

function jvcf_uninstall_plugin() {
    // Xóa option nhưng giữ bảng để không mất dữ liệu
    delete_option('jvcf_settings');
}

add_action('plugins_loaded', function() {
    JV_Contact_Form::instance();
});
// No closing PHP tag to prevent accidental output
