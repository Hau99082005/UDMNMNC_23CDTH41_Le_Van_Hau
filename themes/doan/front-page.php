<?php
/**
 * The main template file for the front page
 */

get_header(); ?>

<main id="primary" class="site-main">
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="hero-content">
            <h1>Khám phá những chuyến đi tuyệt vời</h1>
            <p>Trải nghiệm du lịch độc đáo với dịch vụ chuyên nghiệp</p>
            <a href="#featured-tours" class="btn btn-primary">Khám phá ngay</a>
        </div>
    </section>

    <!-- Featured Tours -->
    <section id="featured-tours" class="featured-tours section-padding">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Tour Nổi Bật</h2>
                <p>Những chuyến đi được yêu thích nhất</p>
            </div>
            
            <div class="tours-grid">
                <?php
                $args = array(
                    'post_type' => 'tour',
                    'posts_per_page' => 6,
                    'meta_key' => 'featured_tour',
                    'meta_value' => '1'
                );
                $featured_tours = new WP_Query($args);

                if ($featured_tours->have_posts()) :
                    while ($featured_tours->have_posts()) : $featured_tours->the_post();
                        get_template_part('template-parts/content', 'tour');
                    endwhile;
                    wp_reset_postdata();
                else :
                    echo '<p>Không có tour nào được tìm thấy.</p>';
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
                $destinations = get_terms(array(
                    'taxonomy' => 'destination',
                    'hide_empty' => true,
                    'number' => 4
                ));

                if (!empty($destinations) && !is_wp_error($destinations)) :
                    foreach ($destinations as $destination) :
                        $term_id = $destination->term_id;
                        $image_id = get_term_meta($term_id, 'destination_image', true);
                        $image_url = wp_get_attachment_image_url($image_id, 'large');
                        ?>
                        <div class="destination-card">
                            <?php if ($image_url) : ?>
                                <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($destination->name); ?>">
                            <?php endif; ?>
                            <div class="destination-content">
                                <h3><?php echo esc_html($destination->name); ?></h3>
                                <a href="<?php echo esc_url(get_term_link($destination)); ?>" class="btn btn-outline">Xem tour</a>
                            </div>
                        </div>
                        <?php
                    endforeach;
                endif;
                ?>
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
</main>

<?php get_footer(); ?>
