    </div><!-- #content -->

<footer id="colophon" class="site-footer">
    <div class="footer-main">
        <div class="container">
            <div class="footer-widgets">
                <!-- Contact Information -->
                <div class="footer-widget">
                    <h3 class="widget-title"><?php esc_html_e('Thông tin liên hệ', 'dulichvietnhat'); ?></h3>
                    <div class="contact-details">
                        <p class="address"><?php echo esc_html(get_theme_mod('contact_address', '73 phan đình phùng - phường vĩnh ninh - TP Huế')); ?></p>
                        <p class="hotline"><?php esc_html_e('Hotline:', 'dulichvietnhat'); ?> <a href="tel:0367722389">0367722389</a></p>
                        <p class="email"><?php esc_html_e('Email:', 'dulichvietnhat'); ?> <a href="mailto:info@dulichvietnhat.vn">hau99082005@gmail.com</a></p>
                        <div class="office-branch">
                            <p class="office-title"><?php esc_html_e('Văn phòng Vũng Tàu', 'dulichvietnhat'); ?></p>
                            <p class="office-address"><?php echo esc_html(get_theme_mod('office_vungtau', '70 Nguyễn Huệ')); ?></p>
                        </div>
                    </div>
                </div>

                <!-- Company Info -->
                <div class="footer-widget">
                    <h3 class="widget-title"><?php esc_html_e('Du lịch Việt Nhật', 'dulichvietnhat'); ?></h3>
                    <ul class="company-links">
                        <li><a href="<?php echo esc_url(home_url('/gioi-thieu')); ?>"><?php esc_html_e('Giới thiệu Công ty', 'dulichvietnhat'); ?></a></li>
                        <li><a href="<?php echo esc_url(home_url('/faq')); ?>"><?php esc_html_e('Câu hỏi thường gặp', 'dulichvietnhat'); ?></a></li>
                        <li><a href="<?php echo esc_url(home_url('/tuyen-dung')); ?>"><?php esc_html_e('Tuyển dụng', 'dulichvietnhat'); ?></a></li>
                        <li><a href="<?php echo esc_url(home_url('/chinh-sach-bao-mat')); ?>"><?php esc_html_e('Chính sách bảo mật', 'dulichvietnhat'); ?></a></li>
                        <li><a href="<?php echo esc_url(home_url('/quyen-rieng-tu')); ?>"><?php esc_html_e('Quyền riêng tư', 'dulichvietnhat'); ?></a></li>
                        <li><a href="<?php echo esc_url(home_url('/chinh-sach-hoan-huy')); ?>"><?php esc_html_e('Chính sách hoàn/hủy', 'dulichvietnhat'); ?></a></li>
                    </ul>
                </div>

                <!-- Contact Services -->
                <div class="footer-widget">
                    <h3 class="widget-title"><?php esc_html_e('Liên hệ', 'dulichvietnhat'); ?></h3>
                    <ul class="contact-services">
                        <li><a href="<?php echo esc_url(home_url('/dai-ly')); ?>"><?php esc_html_e('Đại lý', 'dulichvietnhat'); ?></a></li>
                        <li><a href="<?php echo esc_url(home_url('/faq')); ?>"><?php esc_html_e('FAQ', 'dulichvietnhat'); ?></a></li>
                        <li><a href="<?php echo esc_url(home_url('/tour-rieng')); ?>"><?php esc_html_e('Làm tour riêng', 'dulichvietnhat'); ?></a></li>
                    </ul>
                </div>

                <!-- Social Media -->
                <div class="footer-widget">
                    <?php echo do_shortcode('[jv_social_icons title="Social"]'); ?>
                </div>

            </div>
        </div>
    </div>

    <!-- Footer Bottom -->
    <div class="footer-bottom">
        <div class="container">
            <div class="footer-bottom-inner">
                <div class="copyright">
                    <?php esc_html_e('Copyright Du Lịch Việt Nhật', 'dulichvietnhat'); ?>
                </div>
                <div class="payment-methods">
                    <div class="payment-icons">
                        <i class="fab fa-cc-visa"></i>
                        <i class="fab fa-cc-mastercard"></i>
                        <i class="fab fa-cc-discover"></i>
                        <i class="fab fa-cc-paypal"></i>
                        <i class="fab fa-cc-jcb"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Back to top button -->
    <a href="#" id="back-to-top" class="back-to-top" aria-label="<?php esc_attr_e('Lên đầu trang', 'dulichvietnhat'); ?>">
        <i class="fas fa-arrow-up"></i>
    </a>
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
