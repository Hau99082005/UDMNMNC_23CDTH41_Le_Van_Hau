<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
    <!-- Top Bar -->
    <div class="top-bar">
        <div class="container">
            <div class="top-bar-inner">
                <div class="top-bar-left">
                    <?php if ($phone = get_theme_mod('header_phone', '+84 123 456 789')) : ?>
                        <div class="top-bar-item">
                            <i class="fas fa-phone-alt"></i>
                            <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', $phone)); ?>">
                                <?php echo esc_html($phone); ?>
                            </a>
                        </div>
                    <?php endif; ?>
                    <?php if ($email = get_theme_mod('header_email', 'info@dulichvietnhat.vn')) : ?>
                        <div class="top-bar-item">
                            <i class="far fa-envelope"></i>
                            <a href="mailto:<?php echo esc_attr($email); ?>">
                                <?php echo esc_html($email); ?>
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="top-bar-right">
                    <div class="social-links">
                        <?php 
                        $socials = array(
                            'facebook' => 'facebook-f',
                            'twitter' => 'twitter',
                            'instagram' => 'instagram',
                            'youtube' => 'youtube',
                            'tiktok' => 'tiktok'
                        );
                        foreach ($socials as $key => $icon) : 
                            if ($url = get_theme_mod('social_' . $key)) : ?>
                                <a href="<?php echo esc_url($url); ?>" target="_blank" rel="noopener noreferrer" aria-label="<?php echo esc_attr(ucfirst($key)); ?>">
                                    <i class="fab fa-<?php echo esc_attr($icon); ?>"></i>
                                </a>
                            <?php endif;
                        endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Header -->
    <header id="masthead" class="site-header">
        <div class="container">
            <div class="header-inner">
                <div class="site-branding">
                    <?php
                    if (has_custom_logo()) {
                        echo '<div class="site-logo">';
                        the_custom_logo();
                        echo '</div>';
                    } else {
                        echo '<h1 class="site-title"><a href="' . esc_url(home_url('/')) . '" rel="home">' . get_bloginfo('name') . '</a></h1>';
                    }
                    ?>
                </div>

                <div class="header-right">
                    <nav id="site-navigation" class="main-navigation">
                        <?php
                        wp_nav_menu(
                            array(
                                'theme_location' => 'primary',
                                'menu_id'        => 'primary-menu',
                                'container'      => false,
                                'menu_class'     => 'primary-menu',
                                'fallback_cb'    => 'dulichvietnhat_primary_menu_fallback',
                            )
                        );
                        ?>
                    </nav>

                    <div class="header-actions">
                        <div class="search-box">
                            <button class="search-toggle" aria-label="<?php esc_attr_e('Toggle search', 'dulichvietnhat'); ?>">
                                <i class="fas fa-search"></i>
                            </button>
                            <div class="search-form-container">
                                <?php get_search_form(); ?>
                            </div>
                        </div>
                        <?php if (class_exists('WooCommerce')) : ?>
                            <div class="header-cart">
                                <a href="<?php echo esc_url(wc_get_cart_url()); ?>" class="cart-contents" title="<?php esc_attr_e('View your shopping cart', 'dulichvietnhat'); ?>">
                                    <i class="fas fa-shopping-cart"></i>
                                    <span class="cart-count"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
                                </a>
                            </div>
                        <?php endif; ?>
                        <a href="<?php echo esc_url(get_theme_mod('header_cta_url', '#')); ?>" class="btn btn-primary btn-booking">
                            <?php echo esc_html(get_theme_mod('header_cta_text', 'Đặt Tour Ngay')); ?>
                        </a>
                        <button class="mobile-menu-toggle" aria-label="<?php esc_attr_e('Menu', 'dulichvietnhat'); ?>" aria-expanded="false">
                            <span></span>
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </header><!-- #masthead -->

    <!-- Mobile Menu -->
    <div class="mobile-menu-container">
        <div class="mobile-menu-header">
            <div class="mobile-menu-logo">
                <?php
                if (has_custom_logo()) {
                    the_custom_logo();
                } else {
                    echo '<a href="' . esc_url(home_url('/')) . '" rel="home">' . get_bloginfo('name') . '</a>';
                }
                ?>
            </div>
            <button class="mobile-menu-close">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <nav class="mobile-menu">
            <?php
            wp_nav_menu(
                array(
                    'theme_location' => 'primary',
                    'menu_id'        => 'mobile-primary-menu',
                    'container'      => false,
                    'menu_class'     => 'mobile-menu-list',
                    'fallback_cb'    => 'dulichvietnhat_primary_menu_fallback',
                )
            );
            ?>
        </nav>
    </div>

    <!-- Search Overlay -->
    <div class="search-overlay">
        <div class="search-overlay-content">
            <button class="search-close">
                <i class="fas fa-times"></i>
            </button>
            <div class="container">
                <?php get_search_form(); ?>
                <div class="search-suggestions">
                    <h4><?php esc_html_e('Tìm kiếm phổ biến:', 'dulichvietnhat'); ?></h4>
                    <div class="suggestion-tags">
                        <a href="#"><?php esc_html_e('Tour Nhật Bản', 'dulichvietnhat'); ?></a>
                        <a href="#"><?php esc_html_e('Du lịch Hokkaido', 'dulichvietnhat'); ?></a>
                        <a href="#"><?php esc_html_e('Mùa hoa anh đào', 'dulichvietnhat'); ?></a>
                        <a href="#"><?php esc_html_e('Tour tiết kiệm', 'dulichvietnhat'); ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="content" class="site-content">
