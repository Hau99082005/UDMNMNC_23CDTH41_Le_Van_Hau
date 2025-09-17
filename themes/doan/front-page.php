<?php
/**
 * The main template file for the front page
 */

get_header(); ?>

<main id="primary" class="site-main">
    <!-- Modern Hero Banner - Realistic and Beautiful -->
    <?php
    $banner_type = get_theme_mod('banner_type', 'gradient');
    
    if ($banner_type === 'image') {
        get_template_part('template-parts/banner-image');
    } elseif ($banner_type === 'video') {
        get_template_part('template-parts/banner-video');
    } else {
        // VJLINK Style Hero Section
        ?>
        <?php
    }
    ?>

    <!-- Featured Posts -->
    <section id="featured-posts" class="featured-posts section-padding">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Bài Viết Nổi Bật</h2>
                <p>Những bài viết về du lịch Nhật Bản được yêu thích nhất</p>
            </div>
            
            <div class="posts-grid">
                <?php
                $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => 6,
                    'post_status' => 'publish',
                    'orderby' => 'date',
                    'order' => 'DESC'
                );
                $featured_posts = new WP_Query($args);

                if ($featured_posts->have_posts()) :
                    while ($featured_posts->have_posts()) : $featured_posts->the_post();
                        ?>
                        <article class="post-card">
                            <div class="post-thumbnail">
                                <?php if (has_post_thumbnail()) : ?>
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail('large', array('class' => 'post-image')); ?>
                                    </a>
                                <?php else : ?>
                                    <a href="<?php the_permalink(); ?>" class="post-image-placeholder">
                                        <div class="placeholder-content">
                                            <i class="fas fa-mountain"></i>
                                            <span>Du lịch Nhật Bản</span>
                                        </div>
                                    </a>
                                <?php endif; ?>
                                <div class="post-category">
                                    <?php
                                    $categories = get_the_category();
                                    if (!empty($categories) && $categories[0]->name !== 'Uncategorized') {
                                        echo '<span class="category-tag">' . esc_html($categories[0]->name) . '</span>';
                                    } else {
                                        echo '<span class="category-tag">Du lịch</span>';
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="post-content">
                                <h3 class="post-title">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h3>
                                <div class="post-excerpt">
                                    <?php echo wp_trim_words(get_the_excerpt(), 20, '...'); ?>
                                </div>
                                <div class="post-meta">
                                    <span class="post-date">
                                        <i class="fas fa-calendar-alt"></i>
                                        <?php echo get_the_date('d/m/Y'); ?>
                                    </span>
                                    <span class="post-views">
                                        <i class="fas fa-eye"></i>
                                        <?php echo rand(50, 500); ?> lượt xem
                                    </span>
                                </div>
                                <a href="<?php the_permalink(); ?>" class="read-more-btn">
                                    Đọc thêm <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </article>
                        <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                    echo '<p>Không có bài viết nào được tìm thấy.</p>';
                endif;
                ?>
            </div>
        </div>
    </section>

    <!-- Destinations -->
    <section class="destinations section-padding">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Điểm Đến Hấp Dẫn</h2>
                <p>Khám phá những điểm đến nổi tiếng</p>
            </div>
            
            <div class="destinations-grid">
                <!-- Tokyo -->
                <div class="destination-card">
                    <div class="destination-image">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/tokyo-destination.jpg" 
                             alt="Tokyo - Thủ đô Nhật Bản">
                        <div class="destination-overlay">
                            <div class="destination-info">
                                <h3>Tokyo</h3>
                                <p>Thủ đô hiện đại với văn hóa truyền thống</p>
                                <div class="destination-features">
                                    <span><i class="fas fa-map-marker-alt"></i> Thủ đô</span>
                                    <span><i class="fas fa-users"></i> 37 triệu dân</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="destination-content">
                        <h3>Tokyo</h3>
                        <p>Khám phá thủ đô sôi động với những tòa nhà chọc trời, đền thờ cổ kính và ẩm thực tuyệt vời.</p>
                        <a href="#" class="btn btn-outline">Xem tour Tokyo</a>
                    </div>
                </div>

                <!-- Kyoto -->
                <div class="destination-card">
                    <div class="destination-image">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/kyoto-destination.jpg" 
                             alt="Kyoto - Cố đô Nhật Bản">
                        <div class="destination-overlay">
                            <div class="destination-info">
                                <h3>Kyoto</h3>
                                <p>Cố đô với hơn 1000 năm lịch sử</p>
                                <div class="destination-features">
                                    <span><i class="fas fa-temple"></i> 2000 đền thờ</span>
                                    <span><i class="fas fa-leaf"></i> Mùa thu đẹp</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="destination-content">
                        <h3>Kyoto</h3>
                        <p>Trải nghiệm văn hóa truyền thống với những ngôi đền cổ, vườn Nhật và geisha.</p>
                        <a href="#" class="btn btn-outline">Xem tour Kyoto</a>
                    </div>
                </div>

                <!-- Osaka -->
                <div class="destination-card">
                    <div class="destination-image">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/osaka-destination.jpg" 
                             alt="Osaka - Thành phố ẩm thực">
                        <div class="destination-overlay">
                            <div class="destination-info">
                                <h3>Osaka</h3>
                                <p>Thành phố ẩm thực và giải trí</p>
                                <div class="destination-features">
                                    <span><i class="fas fa-utensils"></i> Ẩm thực</span>
                                    <span><i class="fas fa-smile"></i> Vui vẻ</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="destination-content">
                        <h3>Osaka</h3>
                        <p>Thưởng thức ẩm thực đường phố tuyệt vời và khám phá lâu đài Osaka cổ kính.</p>
                        <a href="#" class="btn btn-outline">Xem tour Osaka</a>
                    </div>
                </div>

                <!-- Mount Fuji -->
                <div class="destination-card">
                    <div class="destination-image">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/fuji-destination.jpg" 
                             alt="Núi Phú Sĩ - Biểu tượng Nhật Bản">
                        <div class="destination-overlay">
                            <div class="destination-info">
                                <h3>Núi Phú Sĩ</h3>
                                <p>Biểu tượng thiêng liêng của Nhật Bản</p>
                                <div class="destination-features">
                                    <span><i class="fas fa-mountain"></i> 3776m</span>
                                    <span><i class="fas fa-camera"></i> Chụp ảnh</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="destination-content">
                        <h3>Núi Phú Sĩ</h3>
                        <p>Chiêm ngưỡng ngọn núi thiêng liêng và tham quan hồ Kawaguchi tuyệt đẹp.</p>
                        <a href="#" class="btn btn-outline">Xem tour Phú Sĩ</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Choose Us -->
    <section class="why-choose-us section-padding">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Tại sao chọn chúng tôi?</h2>
            </div>
            
            <div class="features-grid">
                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h3>Đảm bảo chất lượng</h3>
                    <p>Dịch vụ chất lượng cao với giá cả hợp lý</p>
                </div>
                
                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="fas fa-headset"></i>
                    </div>
                    <h3>Hỗ trợ 24/7</h3>
                    <p>Đội ngũ tư vấn nhiệt tình, chuyên nghiệp</p>
                </div>
                
                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="fas fa-map-marked-alt"></i>
                    </div>
                    <h3>Đa dạng điểm đến</h3>
                    <p>Nhiều lựa chọn tour phù hợp với mọi nhu cầu</p>
                </div>
                
                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="fas fa-hand-holding-usd"></i>
                    </div>
                    <h3>Giá cả cạnh tranh</h3>
                    <p>Nhiều ưu đãi và khuyến mãi hấp dẫn</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="testimonials section-padding">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Khách hàng nói gì về chúng tôi</h2>
            </div>
            
            <div class="testimonials-slider">
                <?php
                $testimonials = get_posts(array(
                    'post_type' => 'testimonial',
                    'posts_per_page' => 3
                ));

                if ($testimonials) :
                    foreach ($testimonials as $testimonial) :
                        $name = get_the_title($testimonial->ID);
                        $content = $testimonial->post_content;
                        $position = get_post_meta($testimonial->ID, 'position', true);
                        $rating = get_post_meta($testimonial->ID, 'rating', true);
                        ?>
                        <div class="testimonial-item">
                            <div class="testimonial-content">
                                <?php echo wpautop($content); ?>
                            </div>
                            <div class="testimonial-author">
                                <h4><?php echo esc_html($name); ?></h4>
                                <?php if ($position) : ?>
                                    <span class="position"><?php echo esc_html($position); ?></span>
                                <?php endif; ?>
                                <?php if ($rating) : ?>
                                    <div class="rating">
                                        <?php for ($i = 1; $i <= 5; $i++) : ?>
                                            <i class="fas fa-star<?php echo $i <= $rating ? ' active' : ''; ?>"></i>
                                        <?php endfor; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php
                    endforeach;
                endif;
                ?>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="cta-section">
        <div class="container">
            <div class="cta-content">
                <h2>Bạn đã sẵn sàng cho chuyến đi tiếp theo?</h2>
                <p>Liên hệ ngay với chúng tôi để được tư vấn tour phù hợp nhất</p>
                <a href="<?php echo esc_url(home_url('/lien-he')); ?>" class="btn btn-primary">Liên hệ ngay</a>
            </div>
        </div>
    </section>

    <!-- Contact Form Section -->
    <section class="contact-form-section section-padding">
        <div class="container">
            <div class="contact-form-wrapper">
                <div class="contact-form-content">
                    <div class="section-header">
                        <h2 class="section-title">Liên Hệ Tư Vấn</h2>
                        <p>Điền thông tin để nhận tư vấn miễn phí về tour du lịch Nhật Bản</p>
                    </div>
                    
                    <div class="contact-info">
                        <div class="contact-item">
                            <div class="contact-icon">
                                <i class="fas fa-phone"></i>
                            </div>
                            <div class="contact-details">
                                <h4>Hotline</h4>
                                <p>0267732290</p>
                            </div>
                        </div>
                        
                        <div class="contact-item">
                            <div class="contact-icon">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div class="contact-details">
                                <h4>Email</h4>
                                <p>info@vjlink.com</p>
                            </div>
                        </div>
                        
                        <div class="contact-item">
                            <div class="contact-icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="contact-details">
                                <h4>Địa chỉ</h4>
                                <p>73 Phan Đình Phùng - Phường Vĩnh Ninh - TP Huế</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="contact-form-container">
                    <?php
                    // Check if Contact Form 7 is active
                    if (function_exists('wpcf7_contact_form')) {
                        // Try to get Contact Form 7 form
                        $contact_form = get_posts(array(
                            'post_type' => 'wpcf7_contact_form',
                            'posts_per_page' => 1,
                            'post_status' => 'publish'
                        ));
                        
                        if (!empty($contact_form)) {
                            echo do_shortcode('[contact-form-7 id="' . $contact_form[0]->ID . '"]');
                        } else {
                            // Fallback custom form
                            ?>
                            <form class="custom-contact-form" method="post" action="">
                                <?php wp_nonce_field('contact_form_action', 'contact_form_nonce'); ?>
                                
                                <div class="form-row">
                                    <div class="form-group">
                                        <label for="contact_name">Họ và tên *</label>
                                        <input type="text" id="contact_name" name="contact_name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="contact_phone">Số điện thoại *</label>
                                        <input type="tel" id="contact_phone" name="contact_phone" required>
                                    </div>
                                </div>
                                
                                <div class="form-row">
                                    <div class="form-group">
                                        <label for="contact_email">Email *</label>
                                        <input type="email" id="contact_email" name="contact_email" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="contact_tour">Tour quan tâm</label>
                                        <select id="contact_tour" name="contact_tour">
                                            <option value="">Chọn tour</option>
                                            <option value="tokyo">Tour Tokyo</option>
                                            <option value="kyoto">Tour Kyoto</option>
                                            <option value="osaka">Tour Osaka</option>
                                            <option value="fuji">Tour Núi Phú Sĩ</option>
                                            <option value="combo">Tour Combo</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="contact_message">Tin nhắn</label>
                                    <textarea id="contact_message" name="contact_message" rows="5" placeholder="Mô tả chi tiết về nhu cầu du lịch của bạn..."></textarea>
                                </div>
                                
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-full">
                                        <i class="fas fa-paper-plane"></i>
                                        Gửi yêu cầu tư vấn
                                    </button>
                                </div>
                            </form>
                            <?php
                        }
                    } else {
                        // Custom form if Contact Form 7 is not available
                        ?>
                        <form class="custom-contact-form" method="post" action="">
                            <?php wp_nonce_field('contact_form_action', 'contact_form_nonce'); ?>
                            
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="contact_name">Họ và tên *</label>
                                    <input type="text" id="contact_name" name="contact_name" required>
                                </div>
                                <div class="form-group">
                                    <label for="contact_phone">Số điện thoại *</label>
                                    <input type="tel" id="contact_phone" name="contact_phone" required>
                                </div>
                            </div>
                            
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="contact_email">Email *</label>
                                    <input type="email" id="contact_email" name="contact_email" required>
                                </div>
                                <div class="form-group">
                                    <label for="contact_tour">Tour quan tâm</label>
                                    <select id="contact_tour" name="contact_tour">
                                        <option value="">Chọn tour</option>
                                        <option value="tokyo">Tour Tokyo</option>
                                        <option value="kyoto">Tour Kyoto</option>
                                        <option value="osaka">Tour Osaka</option>
                                        <option value="fuji">Tour Núi Phú Sĩ</option>
                                        <option value="combo">Tour Combo</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="contact_message">Tin nhắn</label>
                                <textarea id="contact_message" name="contact_message" rows="5" placeholder="Mô tả chi tiết về nhu cầu du lịch của bạn..."></textarea>
                            </div>
                            
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-full">
                                    <i class="fas fa-paper-plane"></i>
                                    Gửi yêu cầu tư vấn
                                </button>
                            </div>
                        </form>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
