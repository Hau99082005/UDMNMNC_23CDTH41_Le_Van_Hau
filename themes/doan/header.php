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
                <div class="logo-container">
                    <div class="vj-logo">
                        <span class="v-letter">V</span>
                        <span class="j-letter">J</span>
                    </div>
                    <div class="logo-text">
                        <h2 class="site-title">VJLINK</h2>
                        <p class="site-tagline">FOR A BETTER LIFE</p>
                    </div>
                </div>
            </div>
            <button class="mobile-menu-close">
                <i class="fas fa-times"></i>
            </button>
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
            <div class="slider-container">
                <div class="slider-wrapper">
                    <div class="slide active">
                        <div class="slide-image">
                            <?php echo do_shortcode('[metaslider id="58"]') ?>
                        </div>
                    </div>
                    <div class="slide">
                        <div class="slide-image">
                            <?php echo do_shortcode('[metaslider id="73"]') ?>
                        </div>
                    </div>
                    <div class="slide">
                        <div class="slide-image">
                            <?php echo do_shortcode('[metaslider id="79"]') ?>
                        </div>
                    </div>
                </div>
                
             
                <button class="slider-nav prev" onclick="changeSlide(-1)">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <button class="slider-nav next" onclick="changeSlide(1)">
                    <i class="fas fa-chevron-right"></i>
                </button>
                
             
                <div class="slider-dots">
                    <span class="dot active" onclick="currentSlide(1)"></span>
                    <span class="dot" onclick="currentSlide(2)"></span>
                    <span class="dot" onclick="currentSlide(3)"></span>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <div id="content" class="site-content">
