<?php
get_header();
?>

<main id="primary" class="site-main">
    <header class="page-header">
        <div class="container">
            <?php
            the_archive_title('<h1 class="page-title">', '</h1>');
            the_archive_description('<div class="archive-description">', '</div>');
            ?>
        </div>
    </header>

    <div class="container">
        <div class="tour-archive-content">
            <aside class="tour-sidebar">
                <!-- Search Form -->
                <div class="widget tour-search-widget">
                    <h3 class="widget-title">Tìm kiếm tour</h3>
                    <form role="search" method="get" class="tour-search-form" action="<?php echo esc_url(home_url('/')); ?>">
                        <input type="hidden" name="post_type" value="tour" />
                        <div class="form-group">
                            <input type="text" class="search-field" placeholder="Tìm kiếm tour..." value="<?php echo get_search_query(); ?>" name="s" />
                            <button type="submit"><i class="fas fa-search"></i></button>
                        </div>
                    </form>
                </div>

                <!-- Destinations Filter -->
                <div class="widget">
                    <h3 class="widget-title">Điểm đến</h3>
                    <ul class="destination-filter">
                        <?php
                        $destinations = get_terms(array(
                            'taxonomy' => 'destination',
                            'hide_empty' => true,
                        ));

                        if (!empty($destinations) && !is_wp_error($destinations)) :
                            foreach ($destinations as $destination) :
                                $active = (isset($_GET['destination']) && $_GET['destination'] === $destination->slug) ? 'active' : '';
                                echo '<li class="' . $active . '"><a href="' . esc_url(add_query_arg('destination', $destination->slug)) . '">' . esc_html($destination->name) . ' <span>(' . $destination->count . ')</span></a></li>';
                            endforeach;
                        endif;
                        ?>
                    </ul>
                </div>

                <!-- Tour Types Filter -->
                <div class="widget">
                    <h3 class="widget-title">Loại tour</h3>
                    <ul class="tour-type-filter">
                        <?php
                        $tour_types = get_terms(array(
                            'taxonomy' => 'tour_type',
                            'hide_empty' => true,
                        ));

                        if (!empty($tour_types) && !is_wp_error($tour_types)) :
                            foreach ($tour_types as $type) :
                                $active = (isset($_GET['tour_type']) && $_GET['tour_type'] === $type->slug) ? 'active' : '';
                                echo '<li class="' . $active . '"><a href="' . esc_url(add_query_arg('tour_type', $type->slug)) . '">' . esc_html($type->name) . ' <span>(' . $type->count . ')</span></a></li>';
                            endforeach;
                        endif;
                        ?>
                    </ul>
                </div>

                <!-- Price Range Filter -->
                <div class="widget price-filter-widget">
                    <h3 class="widget-title">Khoảng giá</h3>
                    <form method="get" action="<?php echo esc_url(home_url('/')); ?>">
                        <input type="hidden" name="post_type" value="tour" />
                        <div class="price-range-slider">
                            <div class="price-range"></div>
                            <div class="price-inputs">
                                <input type="text" id="min_price" name="min_price" value="<?php echo isset($_GET['min_price']) ? esc_attr($_GET['min_price']) : '0'; ?>" readonly>
                                <span>-</span>
                                <input type="text" id="max_price" name="max_price" value="<?php echo isset($_GET['max_price']) ? esc_attr($_GET['max_price']) : '10000000'; ?>" readonly>
                                <span>VNĐ</span>
                            </div>
                        </div>
                        <button type="submit" class="btn-filter">Lọc</button>
                    </form>
                </div>

                <!-- Featured Tours -->
                <div class="widget featured-tours-widget">
                    <h3 class="widget-title">Tour nổi bật</h3>
                    <div class="featured-tours-list">
                        <?php
                        $featured_args = array(
                            'post_type' => 'tour',
                            'posts_per_page' => 3,
                            'meta_key' => 'featured_tour',
                            'meta_value' => '1',
                        );
                        $featured_tours = new WP_Query($featured_args);

                        if ($featured_tours->have_posts()) :
                            while ($featured_tours->have_posts()) : $featured_tours->the_post();
                                ?>
                                <div class="featured-tour-item">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <a href="<?php the_permalink(); ?>" class="featured-tour-thumbnail">
                                            <?php the_post_thumbnail('thumbnail'); ?>
                                        </a>
                                    <?php endif; ?>
                                    <div class="featured-tour-content">
                                        <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                        <?php if ($price = get_field('price')) : ?>
                                            <span class="price"><?php echo esc_html($price); ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <?php
                            endwhile;
                            wp_reset_postdata();
                        endif;
                        ?>
                    </div>
                </div>
            </aside>

            <div class="tour-main-content">
                <!-- Tour Sorting -->
                <div class="tour-sorting">
                    <div class="sorting-left">
                        <span class="result-count">
                            <?php
                            global $wp_query;
                            $found_posts = $wp_query->found_posts;
                            printf(
                                _n('Hiển thị %d kết quả', 'Hiển thị %d kết quả', $found_posts, 'dulichvietnhat'),
                                $found_posts
                            );
                            ?>
                        </span>
                    </div>
                    <div class="sorting-right">
                        <form class="tour-ordering" method="get">
                            <input type="hidden" name="post_type" value="tour" />
                            <select name="orderby" class="orderby" aria-label="Sắp xếp">
                                <option value="menu_order" <?php selected(isset($_GET['orderby']) ? $_GET['orderby'] : '', 'menu_order'); ?>>Mặc định</option>
                                <option value="price_asc" <?php selected(isset($_GET['orderby']) ? $_GET['orderby'] : '', 'price_asc'); ?>>Giá: Thấp đến cao</option>
                                <option value="price_desc" <?php selected(isset($_GET['orderby']) ? $_GET['orderby'] : '', 'price_desc'); ?>>Giá: Cao đến thấp</option>
                                <option value="date" <?php selected(isset($_GET['orderby']) ? $_GET['orderby'] : '', 'date'); ?>>Mới nhất</option>
                                <option value="popularity" <?php selected(isset($_GET['orderby']) ? $_GET['orderby'] : '', 'popularity'); ?>>Phổ biến nhất</option>
                                <option value="rating" <?php selected(isset($_GET['orderby']) ? $_GET['orderby'] : '', 'rating'); ?>>Đánh giá cao nhất</option>
                            </select>
                            <input type="hidden" name="paged" value="1" />
                            <?php
                            // Keep query string vars intact
                            foreach ($_GET as $key => $val) {
                                if ('orderby' === $key || 'submit' === $key) {
                                    continue;
                                }
                                if (is_array($val)) {
                                    foreach ($val as $inner_val) {
                                        echo '<input type="hidden" name="' . esc_attr($key) . '[]" value="' . esc_attr($inner_val) . '" />';
                                    }
                                } else {
                                    echo '<input type="hidden" name="' . esc_attr($key) . '" value="' . esc_attr($val) . '" />';
                                }
                            }
                            ?>
                        </form>
                    </div>
                </div>

                <!-- Tours Grid -->
                <div class="tours-grid">
                    <?php
                    if (have_posts()) :
                        while (have_posts()) : the_post();
                            get_template_part('template-parts/content', 'tour');
                        endwhile;
                    else :
                        echo '<p class="no-tours-found">' . esc_html__('Không tìm thấy tour nào phù hợp.', 'dulichvietnhat') . '</p>';
                    endif;
                    ?>
                </div>

                <!-- Pagination -->
                <div class="pagination">
                    <?php
                    echo paginate_links(array(
                        'type' => 'list',
                        'prev_text' => '<i class="fas fa-chevron-left"></i>',
                        'next_text' => '<i class="fas fa-chevron-right"></i>',
                    ));
                    ?>
                </div>
            </div>
        </div>
    </div>
</main>

<?php
get_footer();
?>
