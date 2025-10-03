<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta name="description" content="Khám phá Nhật Bản cùng chúng tôi: tour du lịch, văn hóa, ẩm thực và trải nghiệm độc đáo. Đặt tour Nhật Bản giá tốt, lịch trình phong phú.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    
    <!-- Preconnect to external domains for faster resource loading -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://cdnjs.cloudflare.com" crossorigin>
    <link rel="dns-prefetch" href="https://cdnjs.cloudflare.com">
    
    <!-- Load fonts ASYNC with font-display swap for better performance -->
    <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" onload="this.onload=null;this.rel='stylesheet'" media="print">
    <noscript><link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet"></noscript>
    
    <!-- FontAwesome CSS - Load ngay trong HEAD -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" crossorigin="anonymous">
    
    <!-- Preload critical FontAwesome fonts -->
    <link rel="preload" as="font" type="font/woff2" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/webfonts/fa-solid-900.woff2" crossorigin="anonymous">
    <link rel="preload" as="font" type="font/woff2" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/webfonts/fa-brands-400.woff2" crossorigin="anonymous">
    
    <?php wp_head(); ?>
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
                    <button type="button" class="search-toggle" aria-label="Search" onclick="(function(e){e.preventDefault();e.stopPropagation();var o=document.getElementById('search-overlay');if(o){o.style.display='flex';o.style.opacity='1';o.style.visibility='visible';o.classList.add('active');setTimeout(function(){var f=o.querySelector('.search-field, input[type=search]');if(f)f.focus();},150);}return false;})(event)">
                        <i class="fas fa-search"></i>
                    </button>
                    <?php 
                        $acc_page = get_page_by_path('tai-khoan');
                        $account_url = $acc_page ? get_permalink($acc_page) : ( is_user_logged_in() ? admin_url('profile.php') : wp_login_url() );
                    ?>
                    <?php if ( is_user_logged_in() ) : ?>
                        <div class="user-menu">
                            <button class="user-icon topbar-user user-menu-toggle" aria-label="Tài khoản" aria-expanded="false" data-account-url="<?php echo esc_attr($account_url); ?>">
                                <i class="fas fa-user"></i>
                            </button>
                            <ul class="user-menu-dropdown" role="menu" aria-label="User menu">
                                <li role="none"><a role="menuitem" href="<?php echo esc_url($account_url); ?>"><?php esc_html_e('Tài khoản của tôi','doan'); ?></a></li>
                                <?php if ( current_user_can('edit_posts') ) : ?>
                                    <li role="none"><a role="menuitem" href="<?php echo esc_url( admin_url() ); ?>"><?php esc_html_e('Bảng điều khiển','doan'); ?></a></li>
                                <?php endif; ?>
                                <li role="none"><a role="menuitem" href="<?php echo esc_url( wp_logout_url( home_url('/') ) ); ?>"><?php esc_html_e('Đăng xuất','doan'); ?></a></li>
                            </ul>
                        </div>
                    <?php else : ?>
                        <a href="<?php echo esc_url($account_url); ?>" class="user-icon topbar-user" aria-label="Tài khoản">
                            <i class="fas fa-user"></i>
                        </a>
                    <?php endif; ?>
                    <?php 
                        if (function_exists('pll_the_languages') && function_exists('dln_poly_switcher')) {
                            echo dln_poly_switcher(true);
                        } elseif (function_exists('dln_lang_switcher')) {
                            echo dln_lang_switcher(true);
                        }
                    ?>
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
                    
                    <?php if ( is_user_logged_in() ) : ?>
                        <div class="user-menu header-user">
                            <button class="user-icon topbar-user user-menu-toggle" aria-label="Tài khoản" aria-expanded="false" data-account-url="<?php echo esc_attr($account_url); ?>">
                                <i class="fas fa-user"></i>
                            </button>
                            <ul class="user-menu-dropdown" role="menu" aria-label="User menu">
                                <li role="none"><a role="menuitem" href="<?php echo esc_url($account_url); ?>"><?php esc_html_e('Tài khoản của tôi','doan'); ?></a></li>
                                <?php if ( current_user_can('edit_posts') ) : ?>
                                    <li role="none"><a role="menuitem" href="<?php echo esc_url( admin_url() ); ?>"><?php esc_html_e('Bảng điều khiển','doan'); ?></a></li>
                                <?php endif; ?>
                                <li role="none"><a role="menuitem" href="<?php echo esc_url( wp_logout_url( home_url('/') ) ); ?>"><?php esc_html_e('Đăng xuất','doan'); ?></a></li>
                            </ul>
                        </div>
                    <?php else : ?>
                        <a href="<?php echo esc_url($account_url); ?>" class="user-icon topbar-user header-user" aria-label="Tài khoản">
                            <i class="fas fa-user"></i>
                        </a>
                    <?php endif; ?>

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
                <button type="button" class="search-toggle" aria-label="Search" onclick="(function(e){e.preventDefault();e.stopPropagation();var o=document.getElementById('search-overlay');if(o){o.style.display='flex';o.style.opacity='1';o.style.visibility='visible';o.classList.add('active');}return false;})(event)"><i class="fas fa-search"></i></button>
                <button class="mobile-menu-close" aria-label="Close menu"><i class="fas fa-times"></i></button>
            </div>
        </div>
        <div class="mobile-menu-content">
            <ul class="mobile-menu-items">
                <li><a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Trang chủ','doan'); ?></a></li>
                <li><a href="<?php echo esc_url(home_url('/kham-pha-nhat-ban')); ?>"><?php esc_html_e('Khám phá Nhật Bản','doan'); ?></a></li>
                <li class="has-sub">
                    <a href="<?php echo esc_url(home_url('/lich-khoi-hanh')); ?>"><?php esc_html_e('Lịch khởi hành','doan'); ?></a>
                    <button class="mobile-sub-toggle" aria-label="Mở danh mục" aria-expanded="false"><i class="fas fa-chevron-down"></i></button>
                    <ul class="mobile-sub-menu">
                        <li><a href="<?php echo esc_url(home_url('/tour-nhat-ban-mua-thu-2025')); ?>"><?php esc_html_e('Tour Nhật Bản Mùa Thu 2025','doan'); ?></a></li>
                        <li><a href="<?php echo esc_url(home_url('/tour-7-ngay-6-dem')); ?>"><?php esc_html_e('Tour 7 ngày 6 đêm','doan'); ?></a></li>
                        <li><a href="<?php echo esc_url(home_url('/tour-6-ngay-5-dem')); ?>"><?php esc_html_e('Tour 6 ngày 5 đêm','doan'); ?></a></li>
                        <li><a href="<?php echo esc_url(home_url('/tour-5-ngay-4-dem')); ?>"><?php esc_html_e('Tour 5 ngày 4 đêm','doan'); ?></a></li>
                    </ul>
                </li>
                <li><a href="<?php echo esc_url(home_url('/hinh-anh-thuc-te')); ?>"><?php esc_html_e('Hình ảnh thực tế','doan'); ?></a></li>
                <li><a href="<?php echo esc_url(home_url('/dang-ky-tu-van')); ?>" class="mobile-consultation-btn"><?php esc_html_e('Đăng ký tư vấn','doan'); ?></a></li>
            </ul>
        </div>
    </div>


    <div id="search-overlay" class="search-overlay" role="dialog" aria-modal="true" aria-labelledby="search-heading" style="display:none;position:fixed;top:0;left:0;width:100vw;height:100vh;z-index:999999;background:rgba(0,0,0,0.85);align-items:center;justify-content:center;opacity:0;visibility:hidden;transition:opacity 0.3s ease;">
        <div class="search-overlay-content" style="display:block;background:#ffffff;border-radius:20px;width:90%;max-width:600px;padding:0;box-shadow:0 20px 60px rgba(0,0,0,0.3);position:relative;">
            <div class="search-header" style="display:flex;justify-content:space-between;align-items:center;padding:24px 28px;border-bottom:1px solid #f3f4f6;background:#ffffff;">
                <h3 id="search-heading" style="font-size:24px;font-weight:700;color:#1f2937;margin:0;display:block;"><?php esc_html_e('Tìm kiếm', 'doan'); ?></h3>
                <button type="button" class="search-close" aria-label="<?php esc_attr_e('Close search', 'doan'); ?>" title="<?php esc_attr_e('Close', 'doan'); ?>" style="width:44px;height:44px;display:flex;align-items:center;justify-content:center;background:#f3f4f6;border:none;border-radius:10px;color:#6b7280;cursor:pointer;font-size:20px;" onclick="var o=document.getElementById('search-overlay');o.style.display='none';o.style.opacity='0';o.style.visibility='hidden';o.classList.remove('active');">
                    <i class="fas fa-times" aria-hidden="true" style="font-size:20px;"></i>
                </button>
            </div>
            <div class="search-form-wrapper" style="padding:28px;display:block;background:#ffffff;">
                <?php get_search_form(); ?>
            </div>
        </div>
    </div>

    <?php if ( ! is_single() && ! is_search() && ! is_page('lich-khoi-hanh') && ! is_page('dang-ky-tu-van') 
    && ! is_page('hinh-anh-thuc-te')
    && ! is_page('kham-pha-nhat-ban')
    && ! is_page('tour-nhat-ban-mua-thu-2025')
    && ! is_page('tour-7-ngay-6-dem')
    && ! is_page('tour-6-ngay-5-dem')
    && ! is_page('tour-5-ngay-4-dem')
    && ! is_page_template('page-dang-ky-tu-van.php')  
    && ! is_page_template('page-tai-khoan.php') 
    && ! is_page('tai-khoan') 
     ) : ?>
      
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
