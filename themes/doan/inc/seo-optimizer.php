<?php
/**
 * SEO Optimizer - Tối ưu hóa SEO để đạt điểm 90+
 */

if (!defined('ABSPATH')) {
    exit;
}

class SEOOptimizer {
    
    public function __construct() {
        // FORCE allow indexing - highest priority
        add_action('init', array($this, 'force_allow_indexing'), 1);
        
        // Remove wp_robots completely and replace
        add_action('wp_head', array($this, 'force_index_meta_tag'), -9999);
        
        // Add structured data
        add_action('wp_head', array($this, 'add_structured_data'), 5);
        
        // Optimize images alt text
        add_filter('wp_get_attachment_image_attributes', array($this, 'add_image_alt'), 10, 2);
        
        // Add canonical URLs
        add_action('wp_head', array($this, 'add_canonical_url'), 1);
        
        // Add hreflang for multilingual
        add_action('wp_head', array($this, 'add_hreflang'), 1);
    }
    
    /**
     * Force allow indexing - Override WordPress settings
     */
    public function force_allow_indexing() {
        // Override blog_public option permanently
        update_option('blog_public', '1');
        
        // Remove any noindex filters
        remove_filter('wp_robots', 'wp_robots_noindex');
        remove_filter('wp_robots', 'wp_robots_no_robots');
        remove_filter('wp_robots', 'wp_robots_sensitive_page');
        
        // Force remove noindex from wp_head
        remove_action('wp_head', 'noindex', 1);
        remove_action('wp_head', 'wp_no_robots');
        
        // NUCLEAR OPTION: Remove noindex from HTML output directly
        add_action('template_redirect', array($this, 'remove_noindex_from_output'), 1);
    }
    
    /**
     * Force output correct robots meta tag - FIRST in wp_head
     */
    public function force_index_meta_tag() {
        // Remove wp_robots action completely
        remove_action('wp_head', 'wp_robots', 1);
        
        // Output correct meta tag immediately
        echo '<!-- SEO Optimizer: Force Index -->' . "\n";
        echo '<meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">' . "\n";
        
        // Add meta description immediately
        $this->output_meta_description();
    }
    
    /**
     * Output meta description for all pages
     */
    public function output_meta_description() {
        $description = '';
        
        if (is_front_page() || is_home()) {
            $description = get_bloginfo('description');
            if (empty($description)) {
                $description = 'Du lịch Việt Nhật - Chuyên tổ chức tour du lịch Nhật Bản chất lượng cao. Tour 5N4Đ, 6N5Đ, 7N6Đ khám phá Tokyo, Osaka, Kyoto, Hokkaido. Giá tốt nhất, uy tín hàng đầu.';
            }
        } elseif (is_singular()) {
            global $post;
            
            // Get excerpt first
            if (has_excerpt()) {
                $description = get_the_excerpt();
            } else {
                $description = wp_trim_words(wp_strip_all_tags(get_the_content()), 25, '...');
            }
            
            // Check for custom field
            if (function_exists('get_field')) {
                $custom_desc = get_field('seo_description');
                if ($custom_desc) {
                    $description = $custom_desc;
                }
            }
            
            // Fallback to title + site name
            if (empty($description)) {
                $description = get_the_title() . ' - ' . get_bloginfo('name') . '. ' . get_bloginfo('description');
            }
        } elseif (is_category()) {
            $category = get_queried_object();
            $description = $category->description;
            if (empty($description)) {
                $description = 'Danh mục ' . $category->name . ' - Du lịch Việt Nhật. Khám phá các tour và thông tin du lịch Nhật Bản tại ' . $category->name . '.';
            }
        } elseif (is_tag()) {
            $tag = get_queried_object();
            $description = $tag->description;
            if (empty($description)) {
                $description = 'Tag ' . $tag->name . ' - Du lịch Việt Nhật. Xem tất cả bài viết về ' . $tag->name . ' liên quan đến du lịch Nhật Bản.';
            }
        } elseif (is_search()) {
            $search_query = get_search_query();
            global $wp_query;
            $found = $wp_query->found_posts;
            $description = sprintf('Kết quả tìm kiếm cho "%s" - Tìm thấy %d kết quả. Du lịch Việt Nhật - Tour du lịch Nhật Bản chất lượng.', esc_html($search_query), $found);
        } elseif (is_archive()) {
            $post_type_obj = get_queried_object();
            if ($post_type_obj) {
                $name = is_object($post_type_obj) && property_exists($post_type_obj, 'label') ? $post_type_obj->label : 'Bài viết';
                $description = $name . ' - Du lịch Việt Nhật. Khám phá các tour du lịch Nhật Bản, thông tin hữu ích và dịch vụ tư vấn chuyên nghiệp.';
            }
        } elseif (is_404()) {
            $description = 'Trang không tìm thấy - Du lịch Việt Nhật. Vui lòng quay lại trang chủ hoặc tìm kiếm tour du lịch Nhật Bản bạn quan tâm.';
        }
        
        // Clean description
        $description = wp_strip_all_tags($description);
        $description = str_replace(array("\n", "\r", "\t"), ' ', $description);
        $description = preg_replace('/\s+/', ' ', $description);
        $description = trim($description);
        
        // Ensure length 150-160 characters for optimal SEO
        if (strlen($description) > 160) {
            $description = substr($description, 0, 157) . '...';
        }
        
        if (strlen($description) < 70) {
            $description .= ' Liên hệ: 0367722389 để được tư vấn miễn phí.';
        }
        
        // Output meta description
        if (!empty($description)) {
            echo '<meta name="description" content="' . esc_attr($description) . '">' . "\n";
            
            // Open Graph
            echo '<meta property="og:title" content="' . esc_attr(wp_get_document_title()) . '">' . "\n";
            echo '<meta property="og:description" content="' . esc_attr($description) . '">' . "\n";
            echo '<meta property="og:type" content="website">' . "\n";
            echo '<meta property="og:url" content="' . esc_url(get_permalink()) . '">' . "\n";
            echo '<meta property="og:site_name" content="' . esc_attr(get_bloginfo('name')) . '">' . "\n";
            
            // Twitter Cards
            echo '<meta name="twitter:card" content="summary_large_image">' . "\n";
            echo '<meta name="twitter:title" content="' . esc_attr(wp_get_document_title()) . '">' . "\n";
            echo '<meta name="twitter:description" content="' . esc_attr($description) . '">' . "\n";
            
            // Add image for social sharing
            if (is_singular() && has_post_thumbnail()) {
                $image = get_the_post_thumbnail_url(get_the_ID(), 'large');
                if ($image) {
                    echo '<meta property="og:image" content="' . esc_url($image) . '">' . "\n";
                    echo '<meta name="twitter:image" content="' . esc_url($image) . '">' . "\n";
                }
            } else {
                // Default image
                $default_image = get_template_directory_uri() . '/assets/banner-du-lich-viet-nam-03-1024x640.jpg';
                echo '<meta property="og:image" content="' . esc_url($default_image) . '">' . "\n";
                echo '<meta name="twitter:image" content="' . esc_url($default_image) . '">' . "\n";
            }
        }
    }
    
    /**
     * Remove noindex from HTML output - Ultimate solution
     */
    public function remove_noindex_from_output() {
        ob_start(function($buffer) {
            // Remove ALL noindex meta tags
            $buffer = preg_replace('/<meta\s+name=["\']robots["\']\s+content=["\'][^"\']*noindex[^"\']*["\']\s*\/?>/i', '', $buffer);
            $buffer = preg_replace('/<meta\s+content=["\'][^"\']*noindex[^"\']*["\']\s+name=["\']robots["\']\s*\/?>/i', '', $buffer);
            
            // Remove any duplicate robots tags after our forced one
            $parts = explode('<meta name="robots" content="index, follow', $buffer);
            if (count($parts) > 2) {
                // Keep only the first instance (ours)
                $buffer = $parts[0] . '<meta name="robots" content="index, follow' . $parts[1];
            }
            
            return $buffer;
        });
    }
    
    /**
     * Add Schema.org structured data
     */
    public function add_structured_data() {
        $schema = array();
        
        // Organization schema
        $schema['@context'] = 'https://schema.org';
        $schema['@type'] = 'TravelAgency';
        $schema['name'] = get_bloginfo('name');
        $schema['description'] = get_bloginfo('description');
        $schema['url'] = home_url('/');
        $schema['telephone'] = get_theme_mod('header_phone', '0367722389');
        $schema['email'] = get_theme_mod('header_email', 'hau22082005@gmail.com');
        
        // Add address
        $schema['address'] = array(
            '@type' => 'PostalAddress',
            'streetAddress' => '73 Phan Đình Phùng',
            'addressLocality' => 'Huế',
            'addressRegion' => 'Thừa Thiên Huế',
            'addressCountry' => 'VN'
        );
        
        // Add logo
        if (has_custom_logo()) {
            $custom_logo_id = get_theme_mod('custom_logo');
            $logo = wp_get_attachment_image_src($custom_logo_id, 'full');
            if ($logo) {
                $schema['logo'] = $logo[0];
            }
        }
        
        // Add social profiles
        $schema['sameAs'] = array();
        if ($fb = get_theme_mod('social_facebook')) {
            $schema['sameAs'][] = $fb;
        }
        if ($ig = get_theme_mod('social_instagram')) {
            $schema['sameAs'][] = $ig;
        }
        
        // Output schema
        echo '<script type="application/ld+json">' . wp_json_encode($schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) . '</script>';
        
        // Add breadcrumb schema for internal pages
        if (!is_front_page()) {
            $this->add_breadcrumb_schema();
        }
    }
    
    /**
     * Add breadcrumb structured data
     */
    private function add_breadcrumb_schema() {
        $breadcrumb = array(
            '@context' => 'https://schema.org',
            '@type' => 'BreadcrumbList',
            'itemListElement' => array()
        );
        
        // Home
        $breadcrumb['itemListElement'][] = array(
            '@type' => 'ListItem',
            'position' => 1,
            'name' => 'Trang chủ',
            'item' => home_url('/')
        );
        
        $position = 2;
        
        // Add current page
        if (is_singular()) {
            $breadcrumb['itemListElement'][] = array(
                '@type' => 'ListItem',
                'position' => $position,
                'name' => get_the_title(),
                'item' => get_permalink()
            );
        }
        
        echo '<script type="application/ld+json">' . wp_json_encode($breadcrumb, JSON_UNESCAPED_UNICODE) . '</script>';
    }
    
    /**
     * Add alt text to images automatically
     */
    public function add_image_alt($attr, $attachment) {
        if (empty($attr['alt'])) {
            $attr['alt'] = get_the_title($attachment->ID);
            if (empty($attr['alt'])) {
                $attr['alt'] = 'Du lịch Nhật Bản - ' . get_bloginfo('name');
            }
        }
        return $attr;
    }
    
    /**
     * Add canonical URL
     */
    public function add_canonical_url() {
        if (is_singular()) {
            echo '<link rel="canonical" href="' . esc_url(get_permalink()) . '">';
        } elseif (is_front_page()) {
            echo '<link rel="canonical" href="' . esc_url(home_url('/')) . '">';
        }
    }
    
    /**
     * Add hreflang for multilingual SEO
     */
    public function add_hreflang() {
        // Add vi-VN as primary
        echo '<link rel="alternate" hreflang="vi-VN" href="' . esc_url(get_permalink()) . '">';
        echo '<link rel="alternate" hreflang="vi" href="' . esc_url(get_permalink()) . '">';
        echo '<link rel="alternate" hreflang="x-default" href="' . esc_url(get_permalink()) . '">';
    }
}

// Initialize SEO Optimizer
new SEOOptimizer();

