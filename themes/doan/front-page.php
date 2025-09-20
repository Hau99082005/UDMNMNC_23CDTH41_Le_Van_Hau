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
    <section class="cta-section">
        <div class="container">
            <div class="cta-content">
                <h2>Bạn đã sẵn sàng cho chuyến đi tiếp theo?</h2>
                <p>Liên hệ ngay với chúng tôi để được tư vấn tour phù hợp nhất</p>
                <a href="<?php echo esc_url(home_url('/lien-he')); ?>" class="btn btn-primary">Liên hệ ngay</a>
            </div>
        </div>
    </section>
    <section class="contact-form-section section-padding theme-minimal">
        <div class="container">
            <?php
            if ( function_exists('do_shortcode') && shortcode_exists('jv_contact_form') ) {
                echo do_shortcode('[jv_contact_form]');
            } else {
                echo '<p>Vui lòng kích hoạt plugin <strong>JV Contact Form</strong> để hiển thị form liên hệ.</p>';
            }
            ?>
        </div>
    </section>
</main>

<?php get_footer(); ?>
