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
        ?>
        <?php
    }
    ?>
    <section id="featured-posts" class="featured-posts section-padding">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">
                    <?php echo esc_html( get_theme_mod('featured_section_title', 'Bài Viết Nổi Bật') ); ?>
                </h2>
                <p>
                    <?php echo esc_html( get_theme_mod('featured_section_subtitle', 'Những bài viết về du lịch Nhật Bản được yêu thích nhất') ); ?>
                </p>
            </div>
            
            <div class="posts-grid">
                <?php
                $sticky_posts = get_option('sticky_posts');
                if ( ! empty($sticky_posts) ) {
                    $args = array(
                        'post_type'           => 'post',
                        'posts_per_page'      => 6,
                        'post__in'            => $sticky_posts,
                        'ignore_sticky_posts' => 1,
                    );
                } else {
                    $args = array(
                        'post_type'      => 'post',
                        'posts_per_page' => 6,
                        'post_status'    => 'publish',
                        'orderby'        => 'date',
                        'order'          => 'DESC',
                    );
                }
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
                <?php
                // Prefer sticky posts for this section; fallback to latest posts
                $sticky = get_option('sticky_posts');
                if (!empty($sticky)) {
                    $dest_args = array(
                        'post_type'           => 'post',
                        'posts_per_page'      => 4,
                        'post__in'            => $sticky,
                        'ignore_sticky_posts' => 1,
                    );
                } else {
                    $dest_args = array(
                        'post_type'      => 'post',
                        'posts_per_page' => 4,
                        'post_status'    => 'publish',
                        'orderby'        => 'date',
                        'order'          => 'DESC',
                    );
                }

                $destinations_query = new WP_Query($dest_args);

                if ($destinations_query->have_posts()) :
                    while ($destinations_query->have_posts()) : $destinations_query->the_post(); ?>
                        <div class="destination-card">
                            <div class="destination-image">
                                <?php if (has_post_thumbnail()) : ?>
                                    <a href="<?php the_permalink(); ?>" aria-label="<?php echo esc_attr(get_the_title()); ?>">
                                        <?php the_post_thumbnail('large'); ?>
                                    </a>
                                <?php else : ?>
                                    <a href="<?php the_permalink(); ?>" class="post-image-placeholder" aria-label="<?php echo esc_attr(get_the_title()); ?>">
                                        <div class="placeholder-content">
                                            <i class="fas fa-mountain"></i>
                                            <span><?php echo esc_html(get_bloginfo('name')); ?></span>
                                        </div>
                                    </a>
                                <?php endif; ?>

                                <!-- Floating badges/top controls -->
                                <div class="destination-topbar">
                                    <span class="destination-badge">
                                        <?php
                                        $cat = get_the_category();
                                        echo !empty($cat) ? esc_html($cat[0]->name) : 'Bài viết';
                                        ?>
                                    </span>
                                    <button class="destination-like" type="button" aria-label="Yêu thích">
                                        <i class="far fa-heart"></i>
                                    </button>
                                </div>

                                <!-- Date badge -->
                                <div class="destination-date">
                                    <i class="far fa-calendar-alt"></i>
                                    <span><?php echo get_the_date('d/m/Y'); ?></span>
                                </div>

                                <div class="destination-overlay">
                                    <div class="destination-info">
                                        <h3><?php the_title(); ?></h3>
                                        <p><?php echo wp_trim_words(get_the_excerpt(), 18, '...'); ?></p>
                                        <div class="destination-features">
                                            <span><i class="fas fa-eye"></i> <?php echo number_format_i18n(rand(120, 980)); ?> lượt xem</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="destination-content">
                                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                <div class="destination-meta">
                                    <span><i class="far fa-calendar-alt"></i><?php echo get_the_date('d/m/Y'); ?></span>
                                </div>
                                <p><?php echo wp_trim_words(get_the_excerpt(), 24, '...'); ?></p>
                                <a href="<?php the_permalink(); ?>" class="btn btn-outline">Xem bài viết</a>
                            </div>
                        </div>
                    <?php endwhile; wp_reset_postdata();
                else : ?>
                    <p>Chưa có bài viết nào.</p>
                <?php endif; ?>
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
    <section class="contact-form-section section-padding theme-minimal">
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
