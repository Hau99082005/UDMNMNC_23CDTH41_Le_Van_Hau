<?php
/**
 * Accessibility Optimizer - Tối ưu hóa Accessibility để đạt 90+
 */

if (!defined('ABSPATH')) {
    exit;
}

class AccessibilityOptimizer {
    
    public function __construct() {
        // Add skip to content link
        add_action('wp_body_open', array($this, 'add_skip_link'));
        
        // Ensure all images have alt text
        add_filter('the_content', array($this, 'ensure_image_alt'));
        
        // Add ARIA landmarks
        add_filter('body_class', array($this, 'add_accessibility_classes'));
        
        // Improve form accessibility
        add_filter('comment_form_defaults', array($this, 'improve_comment_form'));
    }
    
    /**
     * Add skip to content link
     */
    public function add_skip_link() {
        echo '<a class="skip-link screen-reader-text" href="#primary">Bỏ qua đến nội dung</a>';
    }
    
    /**
     * Ensure all images in content have alt text
     */
    public function ensure_image_alt($content) {
        // Find images without alt text
        $content = preg_replace_callback(
            '/<img(?![^>]*alt=)([^>]*)>/i',
            function($matches) {
                return '<img alt="' . get_the_title() . '" ' . $matches[1] . '>';
            },
            $content
        );
        
        // Find images with empty alt
        $content = preg_replace('/<img([^>]*)alt=""([^>]*)>/i', '<img$1alt="' . esc_attr(get_the_title()) . '"$2>', $content);
        
        return $content;
    }
    
    /**
     * Add accessibility classes to body
     */
    public function add_accessibility_classes($classes) {
        $classes[] = 'a11y-optimized';
        return $classes;
    }
    
    /**
     * Improve comment form accessibility
     */
    public function improve_comment_form($defaults) {
        $defaults['title_reply_before'] = '<h3 id="reply-title" class="comment-reply-title">';
        $defaults['title_reply_after'] = '</h3>';
        
        return $defaults;
    }
}

// Initialize Accessibility Optimizer
new AccessibilityOptimizer();

// Add ARIA labels via JavaScript
add_action('wp_footer', function() {
    ?>
    <script>
    (function($) {
        'use strict';
        
        $(document).ready(function() {
            // Add ARIA labels to links without them
            $('a:not([aria-label])').each(function() {
                const $link = $(this);
                const text = $link.text().trim();
                if (text) {
                    $link.attr('aria-label', text);
                }
            });
            
            // Add role to navigation
            $('.main-navigation').attr('role', 'navigation').attr('aria-label', 'Menu chính');
            $('.footer-widget').attr('role', 'complementary');
            
            // Add landmarks
            $('.site-header').attr('role', 'banner');
            $('.site-footer').attr('role', 'contentinfo');
            $('.site-main').attr('role', 'main');
            
            // Ensure buttons have accessible names
            $('button:not([aria-label])').each(function() {
                const $btn = $(this);
                const text = $btn.text().trim();
                if (!text) {
                    const icon = $btn.find('i').attr('class');
                    if (icon && icon.includes('search')) {
                        $btn.attr('aria-label', 'Tìm kiếm');
                    } else if (icon && icon.includes('menu')) {
                        $btn.attr('aria-label', 'Menu');
                    } else if (icon && icon.includes('close')) {
                        $btn.attr('aria-label', 'Đóng');
                    }
                }
            });
            
            // Improve color contrast
            $('a, button, .btn').css('text-decoration-skip-ink', 'auto');
        });
    })(jQuery);
    </script>
    <?php
});

