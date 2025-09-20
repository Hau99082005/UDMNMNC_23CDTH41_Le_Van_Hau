<?php
// Giữ lại bảng để không mất dữ liệu khi gỡ plugin.
// Nếu muốn xóa bảng, bỏ comment các dòng dưới.
/*
if (!defined('WP_UNINSTALL_PLUGIN')) exit;
global $wpdb;
$wpdb->query("DROP TABLE IF EXISTS {$wpdb->prefix}jvcf_submissions");
delete_option('jvcf_settings');
*/
