<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
    <div class="top-bar">
        <div class="container">
            <div class="top-bar-content">
                <div class="contact-info">
                    <?php if ($phone = get_theme_mod('header_phone', '0123456798')) : ?>
                        <div class="contact-item"
                        >
                            <i class="fas fa-phone-alt"></i>
                            <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', $phone)); ?>">
                                <?php echo esc_html($phone); ?>
                            </a>
                        </div>
                    <?php endif; ?>
                    <?php if ($email = get_theme_mod('header_email', 'hau22082005@gmail.com')) : ?>
                        <div class="contact-item">
                            <i class="fas fa-envelope"></i>
                            <a href="mailto:<?php echo esc_attr($email); ?>">
                                <?php echo esc_html($email); ?>
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="top-bar-actions">
                    <button class="search-toggle" aria-label="Search">
                        <i class="fas fa-search"></i>
                    </button>
                    <?php $account_url = is_user_logged_in() ? admin_url('profile.php') : wp_login_url(); ?>
                    <a href="<?php echo esc_url($account_url); ?>" class="user-icon topbar-user" aria-label="Tài khoản">
                        <i class="fas fa-user"></i>
                    </a>
                    <?php if (function_exists('dln_lang_switcher')) { echo dln_lang_switcher(true); } ?>
                </div>
            </div>
        </div>
    </div>

    <header id="masthead" class="site-header">
        <div class="container">
            <div class="header-wrapper">
             
                <div class="site-branding">
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="logo-link" aria-label="<?php echo esc_attr(get_bloginfo('name')); ?>">
                        <?php if (function_exists('the_custom_logo') && has_custom_logo()) : ?>
                            <?php the_custom_logo(); ?>
                            <div class="logo-text">
                                <h1 class="site-title"><?php bloginfo('name'); ?></h1>
                                <p class="site-tagline"><?php bloginfo('description'); ?></p>
                            </div>
                        <?php else : ?>
                            <div class="logo-container">
                                <div class="vj-logo">
                                    <span class="v-letter">V</span>
                                    <span class="j-letter">J</span>
                                </div>
                                <div class="logo-text">
                                    <h1 class="site-title"><?php bloginfo('name'); ?></h1>
                                    <p class="site-tagline"><?php bloginfo('description'); ?></p>
                                </div>
                            </div>
                        <?php endif; ?>
                    </a>
                </div>

             
                <nav id="site-navigation" class="main-navigation">
                    <ul class="primary-menu">
                        <li><a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Trang chủ','doan'); ?></a></li>
                        <li><a href="<?php echo esc_url(home_url('/kham-pha-nhat-ban')); ?>"><?php esc_html_e('Khám phá Nhật Bản','doan'); ?></a></li>
                        <li class="has-dropdown">
                            <a href="<?php echo esc_url(home_url('/lich-khoi-hanh')); ?>">
                                <?php esc_html_e('Lịch khởi hành','doan'); ?>
                                <i class="fas fa-chevron-down dropdown-icon"></i>
                            </a>
                            <ul class="sub-menu">
                                <li><a href="<?php echo esc_url(home_url('/tour-nhat-ban-mua-thu-2025')); ?>"><?php esc_html_e('Tour Nhật Bản Mùa Thu 2025','doan'); ?></a></li>
                                <li><a href="<?php echo esc_url(home_url('/tour-7-ngay-6-dem')); ?>"><?php esc_html_e('Tour 7 ngày 6 đêm','doan'); ?></a></li>
                                <li><a href="<?php echo esc_url(home_url('/tour-6-ngay-5-dem')); ?>"><?php esc_html_e('Tour 6 ngày 5 đêm','doan'); ?></a></li>
                                <li><a href="<?php echo esc_url(home_url('/tour-5-ngay-4-dem')); ?>"><?php esc_html_e('Tour 5 ngày 4 đêm','doan'); ?></a></li>
                            </ul>
                        </li>
                        <li><a href="<?php echo esc_url(home_url('/hinh-anh-thuc-te')); ?>"><?php esc_html_e('Hình ảnh thực tế','doan'); ?></a></li>
                    </ul>
                </nav>

                <div class="header-actions">
                    <?php $account_url = is_user_logged_in() ? admin_url('profile.php') : wp_login_url(); ?>
                    <a href="<?php echo esc_url(home_url('/dang-ky-tu-van')); ?>" class="consultation-btn">
                        <?php esc_html_e('Đăng ký tư vấn','doan'); ?>
                    </a>
                    <button class="menu-toggle" aria-controls="mobile-menu" aria-expanded="false">
                        <span class="hamburger">
                            <span class="hamburger-line"></span>
                            <span class="hamburger-line"></span>
                            <span class="hamburger-line"></span>
                        </span>
                        <span class="screen-reader-text"><?php esc_html_e('Menu', 'doan'); ?></span>
                    </button>
                </div>
            </div>
        </div>
    </header>

  
    <div class="mobile-menu-overlay"></div>
    <div class="mobile-menu">
        <div class="mobile-menu-header">
            <div class="mobile-logo">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="logo-link" aria-label="<?php echo esc_attr(get_bloginfo('name')); ?>">
                    <?php if (function_exists('the_custom_logo') && has_custom_logo()) : ?>
                        <?php the_custom_logo(); ?>
                    <?php else : ?>
                        <span class="mobile-site-title"><?php bloginfo('name'); ?></span>
                    <?php endif; ?>
                </a>
            </div>
            <div class="mobile-actions">
                <button class="search-toggle" aria-label="Search"><i class="fas fa-search"></i></button>
                <button class="mobile-menu-close" aria-label="Close menu"><i class="fas fa-times"></i></button>
            </div>
        </div>
        <div class="mobile-menu-content">
            <ul class="mobile-menu-items">
                <li><a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Trang chủ','doan'); ?></a></li>
                <li><a href="<?php echo esc_url(home_url('/kham-pha-nhat-ban')); ?>"><?php esc_html_e('Khám phá Nhật Bản','doan'); ?></a></li>
                <li><a href="<?php echo esc_url(home_url('/lich-khoi-hanh')); ?>"><?php esc_html_e('Lịch khởi hành','doan'); ?></a></li>
                <li><a href="<?php echo esc_url(home_url('/hinh-anh-thuc-te')); ?>"><?php esc_html_e('Hình ảnh thực tế','doan'); ?></a></li>
                <li><a href="<?php echo esc_url(home_url('/dang-ky-tu-van')); ?>" class="mobile-consultation-btn"><?php esc_html_e('Đăng ký tư vấn','doan'); ?></a></li>
            </ul>
        </div>
    </div>


    <div class="search-overlay">
        <div class="search-overlay-content">
            <div class="search-header">
                <h3><?php esc_html_e('Search', 'doan'); ?></h3>
                <button class="search-close">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="search-form-wrapper">
                <?php get_search_form(); ?>
            </div>
        </div>
    </div>

    <?php if ( ! is_single() && ! is_search() && ! is_page('lich-khoi-hanh') ) : ?>
      
        <section id="image-slider" class="image-slider-section">
            <?php
            $slides = new WP_Query(array(
                'post_type'      => 'slider',
                'posts_per_page' => -1,
                'post_status'    => 'publish',
                'orderby'        => array('menu_order' => 'ASC', 'date' => 'DESC'),
            ));
            $slide_items = array();
            if ( $slides->have_posts() ) {
                while ( $slides->have_posts() ) { $slides->the_post();
                    $post_id = get_the_ID();
                    $title   = get_the_title();
                    $img_url = '';
                    $img_url = get_the_post_thumbnail_url($post_id, 'full');
                    if ( ! $img_url && function_exists('get_field') ) {
                        $acf_img = get_field('image', $post_id);
                        if (is_array($acf_img) && isset($acf_img['url'])) { $img_url = $acf_img['url']; }
                        elseif (is_string($acf_img)) { $img_url = $acf_img; }
                        if (! $img_url) {
                            $acf_img = get_field('slider_image', $post_id);
                            if (is_array($acf_img) && isset($acf_img['url'])) { $img_url = $acf_img['url']; }
                            elseif (is_string($acf_img)) { $img_url = $acf_img; }
                        }
                    }
                    if ( ! $img_url ) {
                        $meta_keys = array('image', 'slider_image', '_thumbnail_id');
                        foreach ($meta_keys as $k) {
                            $val = get_post_meta($post_id, $k, true);
                            if ($val) {
                                if (is_numeric($val)) { $img_url = wp_get_attachment_url(intval($val)); }
                                elseif (filter_var($val, FILTER_VALIDATE_URL)) { $img_url = $val; }
                            }
                            if ($img_url) break;
                        }
                    }
                    if ( ! $img_url ) {
                        $content = get_post_field('post_content', $post_id);
                        if ($content && preg_match('/<img[^>]+src=["\']([^"\']+)["\']/i', $content, $m)) {
                            $img_url = esc_url_raw($m[1]);
                        }
                    }

    
                    if ( ! $img_url ) {
                        $attachments = get_children(array(
                            'post_parent'    => $post_id,
                            'post_type'      => 'attachment',
                            'post_mime_type' => 'image',
                            'numberposts'    => 1,
                            'orderby'        => 'menu_order ID',
                            'order'          => 'ASC',
                        ));
                        if ($attachments) {
                            $att = array_shift($attachments);
                            $img_url = wp_get_attachment_url($att->ID);
                        }
                    }

                    if ($img_url) {
                        $slide_items[] = array(
                            'title' => $title,
                            'img'   => $img_url,
                        );
                    }
                }
                wp_reset_postdata();
            }

            if ( ! empty($slide_items) ) :
                $slide_count = count($slide_items);
            ?>
            <div id="homeCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <?php for ($i = 0; $i < $slide_count; $i++) : ?>
                        <button type="button" data-bs-target="#homeCarousel" data-bs-slide-to="<?php echo esc_attr($i); ?>" class="<?php echo $i === 0 ? 'active' : ''; ?>" aria-current="<?php echo $i === 0 ? 'true' : 'false'; ?>" aria-label="Slide <?php echo esc_attr($i + 1); ?>"></button>
                    <?php endfor; ?>
                </div>
                <div class="carousel-inner">
                    <?php foreach ($slide_items as $index => $item) : ?>
                        <div class="carousel-item <?php echo $index === 0 ? 'active' : ''; ?>">
                            <img src="<?php echo esc_url($item['img']); ?>" class="d-block w-100" alt="<?php echo esc_attr($item['title']); ?>">
                            <div class="carousel-caption d-none d-md-block">
                          
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#homeCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#homeCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            <?php else : ?>
                <div class="container"><p><?php esc_html_e('Chưa có slider nào được đăng hoặc thiếu ảnh.', 'doan'); ?></p></div>
            <?php endif; ?>
        </section>
    <?php endif; ?>

    <div id="content" class="site-content">
