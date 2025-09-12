<?php
/**
 * Template part for displaying featured tours
 */

// Query for featured tours
$featured_tours = new WP_Query(array(
    'post_type'      => 'post',
    'posts_per_page' => 6, // Show 6 featured tours
    'meta_key'       => 'featured_tour',
    'meta_value'     => '1',
));

if ($featured_tours->have_posts()) : ?>
    <section class="featured-tours">
        <div class="container">
            <h2 class="section-title">Tour Nổi Bật</h2>
            <div class="tours-grid">
                <?php while ($featured_tours->have_posts()) : $featured_tours->the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class('tour-card'); ?>>
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="tour-thumbnail">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('large', ['class' => 'tour-image']); ?>
                                </a>
                                <div class="tour-price">
                                    <?php echo get_field('price') ? get_field('price') : 'Liên hệ'; ?>
                                </div>
                            </div>
                        <?php endif; ?>

                        <div class="tour-content">
                            <header class="entry-header">
                                <?php the_title(sprintf('<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h3>'); ?>
                                
                                <?php if (get_field('duration')) : ?>
                                    <div class="tour-duration">
                                        <i class="far fa-clock"></i> <?php echo get_field('duration'); ?>
                                    </div>
                                <?php endif; ?>
                            </header>

                            <div class="entry-content">
                                <?php the_excerpt(); ?>
                            </div>

                            <div class="tour-meta">
                                <a href="<?php the_permalink(); ?>" class="read-more">
                                    <?php _e('Xem chi tiết', 'doan'); ?> <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </article>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            </div>
            
            <div class="view-all-tours">
                <a href="<?php echo esc_url(get_post_type_archive_link('post')); ?>" class="btn btn-primary">
                    <?php _e('Xem tất cả tour', 'doan'); ?>
                </a>
            </div>
        </div>
    </section>
<?php endif; ?>
