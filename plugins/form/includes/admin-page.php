<?php
if (!defined('ABSPATH')) exit;

add_action('admin_menu', function() {
    add_menu_page(
        'JV Contact',
        'JV Contact',
        'manage_options',
        'jvcf-submissions',
        'jvcf_render_submissions_page',
        'dashicons-email',
        26
    );

    add_submenu_page(
        'options-general.php',
        'JV Contact Settings',
        'JV Contact',
        'manage_options',
        'jvcf-settings',
        'jvcf_render_settings_page'
    );
});

function jvcf_get_settings() {
    return get_option('jvcf_settings', []);
}

function jvcf_render_settings_page() {
    if (!current_user_can('manage_options')) return;

    if (isset($_POST['jvcf_save'])) {
        check_admin_referer('jvcf_settings');
        $data = [
            'hotline'      => sanitize_text_field($_POST['hotline'] ?? ''),
            'info_email'   => sanitize_email($_POST['info_email'] ?? ''),
            'address'      => sanitize_text_field($_POST['address'] ?? ''),
            'notify_to'    => sanitize_email($_POST['notify_to'] ?? ''),
            'tour_options' => sanitize_text_field($_POST['tour_options'] ?? '')
        ];
        update_option('jvcf_settings', $data);
        echo '<div class="updated"><p>Đã lưu cài đặt.</p></div>';
    }

    $s = jvcf_get_settings();
    ?>
    <div class="wrap">
        <h1>JV Contact - Cài đặt</h1>
        <form method="post">
            <?php wp_nonce_field('jvcf_settings'); ?>
            <table class="form-table">
                <tr>
                    <th scope="row">Hotline hiển thị</th>
                    <td><input type="text" name="hotline" class="regular-text" value="<?php echo esc_attr($s['hotline'] ?? ''); ?>"></td>
                </tr>
                <tr>
                    <th scope="row">Email hiển thị</th>
                    <td><input type="email" name="info_email" class="regular-text" value="<?php echo esc_attr($s['info_email'] ?? ''); ?>"></td>
                </tr>
                <tr>
                    <th scope="row">Địa chỉ hiển thị</th>
                    <td><input type="text" name="address" class="regular-text" value="<?php echo esc_attr($s['address'] ?? ''); ?>"></td>
                </tr>
                <tr>
                    <th scope="row">Email nhận thông báo</th>
                    <td><input type="email" name="notify_to" class="regular-text" value="<?php echo esc_attr($s['notify_to'] ?? get_option('admin_email')); ?>"></td>
                </tr>
                <tr>
                    <th scope="row">Danh mục Tour (phân tách bằng dấu phẩy)</th>
                    <td><input type="text" name="tour_options" class="regular-text" value="<?php echo esc_attr($s['tour_options'] ?? 'Chọn tour'); ?>">
                    <p class="description">Ví dụ: Chọn tour,Tokyo,Kyoto,Osaka,Hokkaido</p></td>
                </tr>
            </table>
            <p class="submit">
                <button class="button button-primary" name="jvcf_save" value="1">Lưu</button>
            </p>
        </form>
    </div>
    <?php
}

function jvcf_render_submissions_page() {
    if (!current_user_can('manage_options')) return;
    global $wpdb;
    $table = $wpdb->prefix . 'jvcf_submissions';

    if (isset($_GET['export']) && $_GET['export'] == 'csv' && check_admin_referer('jvcf_export')) {
        $rows = $wpdb->get_results("SELECT * FROM $table ORDER BY created_at DESC", ARRAY_A);
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=jvcf_submissions.csv');
        $out = fopen('php://output', 'w');
        fputcsv($out, ['ID','Full Name','Phone','Email','Interest','Message','IP','Created At']);
        foreach ($rows as $r) {
            fputcsv($out, [$r['id'],$r['full_name'],$r['phone'],$r['email'],$r['interest'],$r['message'],$r['ip'],$r['created_at']]);
        }
        fclose($out);
        exit;
    }

    $q = isset($_GET['s']) ? sanitize_text_field($_GET['s']) : '';
    $where = '';
    if ($q) {
        $like = '%' . $wpdb->esc_like($q) . '%';
        $where = $wpdb->prepare("WHERE full_name LIKE %s OR phone LIKE %s OR email LIKE %s", $like, $like, $like);
    }

    $items = $wpdb->get_results("SELECT * FROM $table $where ORDER BY created_at DESC LIMIT 200", ARRAY_A);
    ?>
    <div class="wrap">
        <h1 class="wp-heading-inline">JV Contact - Submissions</h1>
        <a href="<?php echo wp_nonce_url(admin_url('admin.php?page=jvcf-submissions&export=csv'), 'jvcf_export'); ?>" class="page-title-action">Export CSV</a>
        <hr class="wp-header-end">

        <form method="get" style="margin:12px 0;">
            <input type="hidden" name="page" value="jvcf-submissions">
            <input type="search" name="s" value="<?php echo esc_attr($q); ?>" placeholder="Tìm theo tên/điện thoại/email">
            <button class="button">Tìm</button>
        </form>

        <table class="widefat fixed striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Họ & tên</th>
                    <th>SĐT</th>
                    <th>Email</th>
                    <th>Tour quan tâm</th>
                    <th>Tin nhắn</th>
                    <th>IP</th>
                    <th>Thời gian</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($items)): ?>
                    <tr><td colspan="8">Chưa có dữ liệu.</td></tr>
                <?php else: foreach ($items as $r): ?>
                    <tr>
                        <td><?php echo esc_html($r['id']); ?></td>
                        <td><?php echo esc_html($r['full_name']); ?></td>
                        <td><?php echo esc_html($r['phone']); ?></td>
                        <td><?php echo esc_html($r['email']); ?></td>
                        <td><?php echo esc_html($r['interest']); ?></td>
                        <td><?php echo esc_html($r['message']); ?></td>
                        <td><?php echo esc_html($r['ip']); ?></td>
                        <td><?php echo esc_html($r['created_at']); ?></td>
                    </tr>
                <?php endforeach; endif; ?>
            </tbody>
        </table>
    </div>
    <?php
}
