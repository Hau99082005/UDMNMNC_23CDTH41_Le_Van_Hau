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
                    <h3 class="widget-title"><?php esc_html_e('Social', 'dulichvietnhat'); ?></h3>
                    <div class="social-icons">
                        <a class="facebook" href="<?php echo esc_url(get_theme_mod('social_facebook', 'https://facebook.com')); ?>" target="_blank" rel="noopener noreferrer" aria-label="Facebook">
                            <i class="fab fa-facebook-f" aria-hidden="true"></i>
                        </a>
                        <a class="instagram" href="<?php echo esc_url(get_theme_mod('social_instagram', 'https://instagram.com')); ?>" target="_blank" rel="noopener noreferrer" aria-label="Instagram">
                            <i class="fab fa-instagram" aria-hidden="true"></i>
                        </a>
                        <a class="youtube" href="<?php echo esc_url(get_theme_mod('social_youtube', 'https://youtube.com')); ?>" target="_blank" rel="noopener noreferrer" aria-label="YouTube">
                            <i class="fab fa-youtube" aria-hidden="true"></i>
                        </a>
                        <a class="zalo" href="<?php echo esc_url(get_theme_mod('social_zalo', 'https://zalo.me')); ?>" target="_blank" rel="noopener noreferrer" aria-label="Zalo">
                            <i class="fas fa-comments" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>

  
    <a href="#" id="back-to-top" class="back-to-top" aria-label="<?php esc_attr_e('Lên đầu trang', 'dulichvietnhat'); ?>">
        <i class="fas fa-arrow-up"></i>
    </a>
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

<!-- Back to Top Script - MINIFIED -->
<script>
!function(){const e=document.getElementById("back-to-top");e&&(window.addEventListener("scroll",(function(){window.pageYOffset>300?e.classList.add("show"):e.classList.remove("show")})),e.addEventListener("click",(function(e){e.preventDefault(),window.scrollTo({top:0,behavior:"smooth"})})))}();
</script>

<!-- Bootstrap Carousel Auto-Play Enhancement -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const carousel = document.getElementById('homeCarousel');
    if (carousel) {
        // Initialize Bootstrap carousel with auto-play
        const bsCarousel = new bootstrap.Carousel(carousel, {
            interval: 4000,        // 4 seconds between slides
            wrap: true,           // Loop back to first slide
            pause: 'hover',       // Pause on hover
            keyboard: true,       // Enable keyboard navigation
            ride: 'carousel'      // Auto-start
        });
        
        // Add smooth fade transition
        carousel.classList.add('carousel-fade');
        
        // Enhanced hover effects
        carousel.addEventListener('mouseenter', function() {
            this.style.transform = 'scale(1.01)';
            this.style.transition = 'transform 0.3s ease';
        });
        
        carousel.addEventListener('mouseleave', function() {
            this.style.transform = 'scale(1)';
        });
        
        // Add loading animation for images
        const images = carousel.querySelectorAll('.carousel-item img');
        images.forEach(function(img, index) {
            img.addEventListener('load', function() {
                this.style.opacity = '1';
                this.style.transition = 'opacity 0.5s ease';
            });
            
            // Set initial opacity
            img.style.opacity = index === 0 ? '1' : '0';
        });
    }
});
</script>

</body>
</html>
