    </div><!-- #content -->

    <footer id="colophon" class="site-footer">
        <div class="footer-main">
            <div class="container">
                <div class="footer-widgets">
                    <!-- About Widget -->
                    <div class="footer-widget footer-about">
                        <?php if (is_active_sidebar('footer-1')) : ?>
                            <?php dynamic_sidebar('footer-1'); ?>
                        <?php else : ?>
                            <h3 class="widget-title"><?php bloginfo('name'); ?></h3>
                            <p><?php echo esc_html__('Chuyên tổ chức các tour du lịch Nhật Bản chất lượng cao với nhiều năm kinh nghiệm.', 'dulichvietnhat'); ?></p>
                            <div class="footer-social">
                                <?php 
                                $socials = array('facebook', 'instagram', 'youtube', 'tiktok');
                                foreach ($socials as $social) : 
                                    if ($url = get_theme_mod('social_' . $social)) : ?>
                                        <a href="<?php echo esc_url($url); ?>" target="_blank" rel="noopener noreferrer">
                                            <i class="fab fa-<?php echo esc_attr($social); ?>"></i>
                                        </a>
                                    <?php endif;
                                endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <!-- Quick Links -->
                    <div class="footer-widget">
                        <?php if (is_active_sidebar('footer-2')) : ?>
                            <?php dynamic_sidebar('footer-2'); ?>
                        <?php else : ?>
                            <h3 class="widget-title"><?php esc_html_e('Liên kết nhanh', 'dulichvietnhat'); ?></h3>
                            <?php
                            wp_nav_menu(array(
                                'theme_location' => 'footer-menu-1',
                                'menu_class'     => 'footer-menu',
                                'fallback_cb'    => false,
                                'depth'          => 1,
                            ));
                            ?>
                        <?php endif; ?>
                    </div>

                    <!-- Contact Info -->
                    <div class="footer-widget">
                        <?php if (is_active_sidebar('footer-3')) : ?>
                            <?php dynamic_sidebar('footer-3'); ?>
                        <?php else : ?>
                            <h3 class="widget-title"><?php esc_html_e('Liên hệ', 'dulichvietnhat'); ?></h3>
                            <ul class="contact-info">
                                <?php if ($address = get_theme_mod('contact_address')) : ?>
                                    <li><i class="fas fa-map-marker-alt"></i> <?php echo esc_html($address); ?></li>
                                <?php endif; ?>
                                <?php if ($phone = get_theme_mod('contact_phone')) : ?>
                                    <li><i class="fas fa-phone"></i> <?php echo esc_html($phone); ?></li>
                                <?php endif; ?>
                                <?php if ($email = get_theme_mod('contact_email')) : ?>
                                    <li><i class="fas fa-envelope"></i> <?php echo esc_html($email); ?></li>
                                <?php endif; ?>
                                <?php if ($hours = get_theme_mod('contact_hours')) : ?>
                                    <li><i class="far fa-clock"></i> <?php echo esc_html($hours); ?></li>
                                <?php endif; ?>
                            </ul>
                        <?php endif; ?>
                    </div>

                    <!-- Newsletter -->
                    <div class="footer-widget">
                        <?php if (is_active_sidebar('footer-4')) : ?>
                            <?php dynamic_sidebar('footer-4'); ?>
                        <?php else : ?>
                            <h3 class="widget-title"><?php esc_html_e('Đăng ký nhận tin', 'dulichvietnhat'); ?></h3>
                            <p><?php esc_html_e('Đăng ký để nhận thông tin khuyến mãi và tour mới nhất.', 'dulichvietnhat'); ?></p>
                            <?php echo do_shortcode('[mc4wp_form id="1"]'); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer Bottom -->
        <div class="footer-bottom">
            <div class="container">
                <div class="footer-bottom-inner">
                    <div class="copyright">
                        &copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. <?php esc_html_e('All rights reserved.', 'dulichvietnhat'); ?>
                    </div>
                    <div class="footer-menu">
                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'footer-menu-2',
                            'menu_class'     => 'footer-bottom-menu',
                            'fallback_cb'    => false,
                            'depth'          => 1,
                        ));
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
