<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css"/>
    
    <?php wp_head(); ?>
    <!-- Font Awesome is loaded in functions.php -->
    <!-- Google Fonts -->
    <script src="assets/js/bootstrap.bundle.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
    <!-- Top Bar -->
    <div class="top-bar">
        <div class="container">
            <div class="top-bar-content">
                <div class="contact-info">
                    <?php if ($phone = get_theme_mod('header_phone', '0123456798')) : ?>
                        <div class="contact-item">
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
                    <div class="language-selector">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/vietnam-flag.png" alt="Vietnam" class="flag-icon">
                        <span>VI</span>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Header -->
    <header id="masthead" class="site-header">
        <div class="container">
            <div class="header-wrapper">
                <!-- Logo -->
                <div class="site-branding">
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="logo-link">
                        <div class="logo-container">
                            <div class="vj-logo">
                                <span class="v-letter">V</span>
                                <span class="j-letter">J</span>
                            </div>
                            <div class="logo-text">
                                <h1 class="site-title">VJLINK</h1>
                                <p class="site-tagline">FOR A BETTER LIFE</p>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Desktop Navigation -->
                <nav id="site-navigation" class="main-navigation">
                    <ul class="primary-menu">
                        <li><a href="<?php echo esc_url(home_url('/')); ?>">TRANG CHỦ</a></li>
                        <li><a href="<?php echo esc_url(home_url('/kham-pha-nhat-ban')); ?>">KHÁM PHÁ NHẬT BẢN</a></li>
                        <li class="has-dropdown">
                            <a href="<?php echo esc_url(home_url('/lich-khoi-hanh')); ?>">
                                LỊCH KHỞI HÀNH
                                <i class="fas fa-chevron-down dropdown-icon"></i>
                            </a>
                            <ul class="sub-menu">
                                <li><a href="<?php echo esc_url(home_url('/tour-nhat-ban-mua-thu-2025')); ?>">Tour Nhật Bản Mùa Thu 2025</a></li>
                                <li><a href="<?php echo esc_url(home_url('/tour-7-ngay-6-dem')); ?>">Tour 7 ngày 6 đêm</a></li>
                                <li><a href="<?php echo esc_url(home_url('/tour-6-ngay-5-dem')); ?>">Tour 6 Ngày 5 đêm</a></li>
                                <li><a href="<?php echo esc_url(home_url('/tour-5-ngay-4-dem')); ?>">Tour 5 ngày 4 đêm</a></li>
                            </ul>
                        </li>
                        <li><a href="<?php echo esc_url(home_url('/hinh-anh-thuc-te')); ?>">HÌNH ẢNH THỰC TẾ</a></li>
                    </ul>
                </nav>

                <!-- Header Actions -->
                <div class="header-actions">
                    <a href="<?php echo esc_url(home_url('/dang-ky-tu-van')); ?>" class="consultation-btn">
                        ĐĂNG KÝ TƯ VẤN
                    </a>
                    <button class="menu-toggle" aria-controls="mobile-menu" aria-expanded="false">
                        <span class="hamburger">
                            <span class="hamburger-line"></span>
                            <span class="hamburger-line"></span>
                            <span class="hamburger-line"></span>
                        </span>
                        <span class="screen-reader-text"><?php esc_html_e('Menu', 'dulichvietnhat'); ?></span>
                    </button>
                </div>
            </div>
        </div>
    </header>

    <!-- Mobile Menu -->
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
                <li><a href="<?php echo esc_url(home_url('/')); ?>">TRANG CHỦ</a></li>
                <li><a href="<?php echo esc_url(home_url('/kham-pha-nhat-ban')); ?>">KHÁM PHÁ NHẬT BẢN</a></li>
                <li><a href="<?php echo esc_url(home_url('/lich-khoi-hanh')); ?>">LỊCH KHỞI HÀNH</a></li>
                <li><a href="<?php echo esc_url(home_url('/hinh-anh-thuc-te')); ?>">HÌNH ẢNH THỰC TẾ</a></li>
                <li><a href="<?php echo esc_url(home_url('/dang-ky-tu-van')); ?>" class="mobile-consultation-btn">ĐĂNG KÝ TƯ VẤN</a></li>
            </ul>
        </div>
    </div>

    <!-- Search Overlay -->
    <div class="search-overlay">
        <div class="search-overlay-content">
            <div class="search-header">
                <h3><?php esc_html_e('Search', 'dulichvietnhat'); ?></h3>
                <button class="search-close">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="search-form-wrapper">
                <?php get_search_form(); ?>
            </div>
        </div>
    </div>

    <!-- VJLINK Image Slider -->
    <section id="image-slider" class="image-slider-section">
        <div class="slider-container">
            <div class="slider-wrapper">
                <div class="slide active">
                    <div class="slide-image">
                        <img src="<?php echo do_shortcode('[metaslider id="58"]') ?>" alt="Banner 1">
                    </div>
                </div>
                <div class="slide">
                    <div class="slide-image">
                        <img src="<?php echo do_shortcode('[metaslider id="60"]') ?>" alt="Banner 2">
                    </div>
                </div>
                <div class="slide">
                    <div class="slide-image">
                        <img src="<?php echo do_shortcode('[metaslider id="63"]') ?>" alt="Banner 3">
                    </div>
                </div>
            </div>
            
            <!-- Navigation Arrows -->
            <button class="slider-nav prev" onclick="changeSlide(-1)">
                <i class="fas fa-chevron-left"></i>
            </button>
            <button class="slider-nav next" onclick="changeSlide(1)">
                <i class="fas fa-chevron-right"></i>
            </button>
            
            <!-- Dots Indicator -->
            <div class="slider-dots">
                <span class="dot active" onclick="currentSlide(1)"></span>
                <span class="dot" onclick="currentSlide(2)"></span>
                <span class="dot" onclick="currentSlide(3)"></span>
            </div>
        </div>
    </section>

    <div id="content" class="site-content">

