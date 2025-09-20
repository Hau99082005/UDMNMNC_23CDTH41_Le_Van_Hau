<?php
if (!defined('ABSPATH')) exit;

class JV_Contact_Form {
    private static $instance = null;
    private $table_name;

    public static function instance() {
        if (self::$instance === null) self::$instance = new self();
        return self::$instance;
    }

    private function __construct() {
        global $wpdb;
        $this->table_name = $wpdb->prefix . 'jvcf_submissions';

        add_shortcode('jv_contact_form', [$this, 'render_shortcode']);

        add_action('wp_ajax_jvcf_submit', [$this, 'handle_submit']);
        add_action('wp_ajax_nopriv_jvcf_submit', [$this, 'handle_submit']);

        add_filter('plugin_action_links_' . plugin_basename(JVCF_PATH . 'jv-contact-form.php'), [$this, 'settings_link']);
    }

    public static function activate() {
        global $wpdb;
        $table = $wpdb->prefix . 'jvcf_submissions';
        $charset_collate = $wpdb->get_charset_collate();

        $sql = "CREATE TABLE IF NOT EXISTS $table (
            id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
            full_name VARCHAR(191) NOT NULL,
            phone VARCHAR(50) NOT NULL,
            email VARCHAR(191) NOT NULL,
            interest VARCHAR(191) NULL,
            message TEXT NULL,
            ip VARCHAR(100) NULL,
            created_at DATETIME NOT NULL,
            PRIMARY KEY (id),
            KEY email (email),
            KEY created_at (created_at)
        ) $charset_collate;";

        require_once ABSPATH . 'wp-admin/includes/upgrade.php';
        dbDelta($sql);

        if (!get_option('jvcf_settings')) {
            add_option('jvcf_settings', [
                'hotline' => '0123456789',
                'info_email' => 'hau@gmail.com',
                'address' => '73 Phan Đình Phùng - Vĩnh Ninh - TP Huế',
                'notify_to' => get_option('admin_email'),
                'tour_options' => "Chọn tour,Tokyo,Kyoto,Osaka,Hokkaido"
            ]);
        }
    }

    public function settings_link($links) {
        $url = admin_url('options-general.php?page=jvcf-settings');
        $links[] = '<a href="' . esc_url($url) . '">Settings</a>';
        $links[] = '<a href="' . esc_url(admin_url('admin.php?page=jvcf-submissions')) . '">Submissions</a>';
        return $links;
    }

    public function render_shortcode($atts) {
        wp_enqueue_style('jvcf-form', JVCF_URL . 'assets/css/form.css', [], JVCF_VERSION);
        wp_enqueue_script('jvcf-form', JVCF_URL . 'assets/js/form.js', ['jquery'], JVCF_VERSION, true);
        wp_localize_script('jvcf-form', 'JVCF', [
            'ajax_url' => admin_url('admin-ajax.php'),
            'nonce'    => wp_create_nonce('jvcf_nonce'),
            'messages' => [
                'required' => 'Vui lòng điền đầy đủ các trường bắt buộc.',
                'invalid_email' => 'Email không hợp lệ.',
                'success' => 'Gửi yêu cầu thành công! Chúng tôi sẽ liên hệ sớm.',
                'error' => 'Có lỗi xảy ra. Vui lòng thử lại.'
            ]
        ]);

        $s = get_option('jvcf_settings', []);
        $hotline = isset($s['hotline']) ? $s['hotline'] : '';
        $info_email = isset($s['info_email']) ? $s['info_email'] : '';
        $address = isset($s['address']) ? $s['address'] : '';
        $options = isset($s['tour_options']) ? explode(',', $s['tour_options']) : ['Chọn tour'];

        ob_start();
        ?>
        <section class="jvcf-wrap">
            <div class="jvcf-inner">
                <div class="jvcf-left">
                    <h2 class="jvcf-title">Liên Hệ Tư Vấn</h2>
                    <p class="jvcf-desc">Điền thông tin để nhận tư vấn miễn phí về tour du lịch Nhật Bản</p>

                    <div class="jvcf-info-grid">
                        <div class="jvcf-info-item">
                            <div class="jvcf-info-label">Hotline</div>
                            <div class="jvcf-info-value"><?php echo esc_html($hotline); ?></div>
                        </div>
                        <div class="jvcf-info-item">
                            <div class="jvcf-info-label">Email</div>
                            <div class="jvcf-info-value"><?php echo esc_html($info_email); ?></div>
                        </div>
                        <div class="jvcf-info-item full">
                            <div class="jvcf-info-label">Địa chỉ</div>
                            <div class="jvcf-info-value"><?php echo esc_html($address); ?></div>
                        </div>
                    </div>
                </div>

                <div class="jvcf-right">
                    <form class="jvcf-form" id="jvcf-form" novalidate>
                        <input type="hidden" name="action" value="jvcf_submit">
                        <input type="hidden" name="nonce" value="<?php echo esc_attr(wp_create_nonce('jvcf_nonce')); ?>">

                        <div class="jvcf-field">
                            <label>Họ và tên <span>*</span></label>
                            <input type="text" name="full_name" placeholder="Nhập họ và tên">
                        </div>
                        <div class="jvcf-field">
                            <label>Số điện thoại <span>*</span></label>
                            <input type="tel" name="phone" placeholder="Nhập số điện thoại">
                        </div>
                        <div class="jvcf-field">
                            <label>Email <span>*</span></label>
                            <input type="email" name="email" placeholder="Nhập email">
                        </div>
                        <div class="jvcf-field">
                            <label>Tour quan tâm</label>
                            <select name="interest">
                                <?php foreach ($options as $i => $opt): ?>
                                    <option value="<?php echo esc_attr(trim($opt)); ?>" <?php selected($i, 0); ?>>
                                        <?php echo esc_html(trim($opt)); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="jvcf-field">
                            <label>Tin nhắn</label>
                            <textarea name="message" rows="4" placeholder="Mô tả chi tiết về nhu cầu du lịch của bạn..."></textarea>
                        </div>

                        <div class="jvcf-actions">
                            <button type="submit" class="jvcf-btn">
                                <span>Gửi yêu cầu tư vấn</span>
                            </button>
                        </div>

                        <div class="jvcf-alert" id="jvcf-alert" style="display:none;"></div>
                    </form>
                </div>
            </div>
        </section>
        <?php
        return ob_get_clean();
    }

    public function handle_submit() {
        if (!isset($_POST["nonce"]) || !wp_verify_nonce($_POST["nonce"], "jvcf_nonce")) {
            wp_send_json_error(["message" => "Invalid nonce"]);
        }

        $full_name = sanitize_text_field($_POST['full_name'] ?? '');
        $phone     = sanitize_text_field($_POST['phone'] ?? '');
        $email     = sanitize_email($_POST['email'] ?? '');
        $interest  = sanitize_text_field($_POST['interest'] ?? '');
        $message   = wp_kses_post($_POST['message'] ?? '');

        if (empty($full_name) || empty($phone) || empty($email) || !is_email($email)) {
            wp_send_json_error(['message' => 'Vui lòng nhập đầy đủ thông tin hợp lệ.']);
        }

        global $wpdb;
        // Ensure table exists (in case activation hook did not run)
        $table = $this->table_name;
        $maybe_table = $wpdb->get_var($wpdb->prepare("SHOW TABLES LIKE %s", $table));
        if ($maybe_table !== $table) {
            // Attempt to (re)create the table
            self::activate();
        }

        $inserted = $wpdb->insert(
            $this->table_name,
            [
                'full_name'  => $full_name,
                'phone'      => $phone,
                'email'      => $email,
                'interest'   => $interest,
                'message'    => $message,
                'ip'         => $_SERVER['REMOTE_ADDR'] ?? '',
                'created_at' => current_time('mysql')
            ],
            ['%s','%s','%s','%s','%s','%s','%s']
        );

        if (!$inserted) {
            $db_err = $wpdb->last_error ? (' Chi tiết: ' . $wpdb->last_error) : '';
            wp_send_json_error(['message' => 'Không thể lưu dữ liệu. Vui lòng thử lại.' . $db_err]);
        }

        $s = get_option('jvcf_settings', []);
        $to = !empty($s['notify_to']) ? $s['notify_to'] : get_option('admin_email');

        $subject = sprintf('[Liên hệ] %s - %s', $full_name, $phone);
        $headers = ['Content-Type: text/html; charset=UTF-8'];
        $body = wpautop(sprintf(
            "Họ & tên: %s\nSĐT: %s\nEmail: %s\nTour quan tâm: %s\n\nTin nhắn:\n%s\n\nThời gian: %s",
            esc_html($full_name),
            esc_html($phone),
            esc_html($email),
            esc_html($interest),
            esc_html($message),
            esc_html(current_time('mysql'))
        ));

        // Send email but do not fail the request if mailing fails
        wp_mail($to, $subject, $body, $headers);

        wp_send_json_success(['message' => 'Gửi yêu cầu thành công!']);
    }
}
