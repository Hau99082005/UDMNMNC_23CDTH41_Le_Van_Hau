/* ========================================
   BALANCED OPTIMIZATION JAVASCRIPT
   Tối ưu hóa hiệu suất mà không làm mất tính năng
   ======================================== */

(function($) {
    'use strict';
    
    const BalancedOptimizer = {
        
        // Initialize optimizations
        init: function() {
            this.removeLoadingElements();
            this.optimizeImageLoading();
            this.optimizeScrollPerformance();
            this.optimizeAnimations();
            this.addPerformanceMonitoring();
            this.markContentAsLoaded();
        },
        
        // Remove loading elements without affecting layout
        removeLoadingElements: function() {
            $('.preloader, .loader, .loading, .loading-screen, .banner-loading').remove();
            $('body').removeClass('loading preload is-loading');
            
            // Ensure content is visible
            $('body, .site-content, .site-main').css({
                'opacity': '1',
                'visibility': 'visible'
            });
        },
        
        // Optimize image loading
        optimizeImageLoading: function() {
            // Add lazy loading to images that don't have it
            $('img:not([loading])').attr('loading', 'lazy');
            
            // Preload critical images
            this.preloadCriticalImages();
            
            // Optimize image sizes
            this.optimizeImageSizes();
        },
        
        // Preload critical images
        preloadCriticalImages: function() {
            const criticalImages = [
                '.hero-section img',
                '.site-header .custom-logo',
                '.post-thumbnail img:first',
                '.tour-thumbnail img:first'
            ];
            
            criticalImages.forEach(selector => {
                const img = $(selector).first();
                if (img.length && img.attr('src')) {
                    const preloadImg = new Image();
                    preloadImg.src = img.attr('src');
                }
            });
        },
        
        // Optimize image sizes
        optimizeImageSizes: function() {
            // Add responsive image sizes
            $('img').each(function() {
                const img = $(this);
                if (!img.attr('sizes')) {
                    img.attr('sizes', '(max-width: 768px) 100vw, (max-width: 1200px) 50vw, 33vw');
                }
            });
        },
        
        // Optimize scroll performance
        optimizeScrollPerformance: function() {
            let scrollTimeout;
            
            $(window).on('scroll', function() {
                // Debounce scroll events
                if (scrollTimeout) {
                    clearTimeout(scrollTimeout);
                }
                
                scrollTimeout = setTimeout(function() {
                    // Only run scroll-dependent code here
                    BalancedOptimizer.handleScrollEffects();
                }, 16); // ~60fps
            });
        },
        
        // Handle scroll effects efficiently
        handleScrollEffects: function() {
            const scrollTop = $(window).scrollTop();
            
            // Header effects
            if (scrollTop > 100) {
                $('.site-header').addClass('scrolled');
            } else {
                $('.site-header').removeClass('scrolled');
            }
            
            // Back to top button
            if (scrollTop > 300) {
                $('.back-to-top').fadeIn();
            } else {
                $('.back-to-top').fadeOut();
            }
        },
        
        // Optimize animations
        optimizeAnimations: function() {
            // Reduce motion for users who prefer it
            if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
                $('*').css({
                    'animation-duration': '0.01ms',
                    'transition-duration': '0.01ms'
                });
            }
            
            // Optimize card animations
            $('.post-card, .tour-card').each(function() {
                const card = $(this);
                
                card.on('mouseenter', function() {
                    if (!window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
                        $(this).addClass('hovered');
                    }
                }).on('mouseleave', function() {
                    $(this).removeClass('hovered');
                });
            });
        },
        
        // Add performance monitoring
        addPerformanceMonitoring: function() {
            if (window.location.hostname === 'localhost' || window.location.hostname.includes('dev')) {
                this.showPerformanceIndicator();
            }
        },
        
        // Show performance indicator in development
        showPerformanceIndicator: function() {
            $('body').addClass('dev-mode');
            
            const indicator = $('<div class="performance-indicator">Optimized</div>');
            $('body').append(indicator);
            
            // Show load time
            window.addEventListener('load', function() {
                const loadTime = performance.now();
                indicator.text(`Loaded: ${Math.round(loadTime)}ms`);
            });
        },
        
        // Mark content as loaded
        markContentAsLoaded: function() {
            // Mark non-critical content as ready to show
            $(window).on('load', function() {
                $('body').addClass('loaded');
                
                // Show non-critical elements
                $('.non-critical').fadeIn();
            });
        }
    };
    
    // Initialize when DOM is ready
    $(document).ready(function() {
        BalancedOptimizer.init();
    });
    
    // Add CSS for scrolled header
    $('<style>')
        .prop('type', 'text/css')
        .html(`
            .site-header.scrolled {
                box-shadow: 0 4px 20px rgba(0,0,0,0.1);
                backdrop-filter: blur(10px);
            }
            .post-card.hovered,
            .tour-card.hovered {
                transform: translateY(-4px);
            }
            .back-to-top {
                position: fixed;
                bottom: 20px;
                right: 20px;
                width: 50px;
                height: 50px;
                background: var(--primary, #ef4444);
                color: white;
                border: none;
                border-radius: 50%;
                cursor: pointer;
                display: none;
                z-index: 1000;
                transition: all 0.3s ease;
            }
            .back-to-top:hover {
                background: #dc2626;
                transform: translateY(-2px);
            }
        `)
        .appendTo('head');
    
})(jQuery);
