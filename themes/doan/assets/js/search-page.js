/* ========================================
   SEARCH PAGE ENHANCEMENTS
   ======================================== */

(function($) {
    'use strict';
    
    const SearchPageEnhancer = {
        
        init: function() {
            this.removeImageBlur();
            this.enhanceAnimations();
            this.addSearchEnhancements();
            this.improveAccessibility();
        },
        
        // Force remove any blur on images - AGGRESSIVE APPROACH
        removeImageBlur: function() {
            // Remove with jQuery
            $('.tour-image, .tour-image img, .post-thumbnail, .post-thumbnail img, .tour-card img').each(function() {
                $(this).css({
                    'filter': 'none !important',
                    'backdrop-filter': 'none !important',
                    '-webkit-filter': 'none !important',
                    '-webkit-backdrop-filter': 'none !important',
                    'opacity': '1 !important',
                    'visibility': 'visible !important'
                });
                
                // Remove inline styles that might cause blur
                this.style.removeProperty('filter');
                this.style.removeProperty('backdrop-filter');
                this.style.removeProperty('-webkit-filter');
                this.style.removeProperty('-webkit-backdrop-filter');
                
                // Set with highest priority
                this.style.setProperty('filter', 'none', 'important');
                this.style.setProperty('opacity', '1', 'important');
                this.style.setProperty('visibility', 'visible', 'important');
            });
            
            // Remove all overlays and pseudo elements
            $('.tour-image .overlay, .tour-image::before, .tour-image::after').remove();
            
            // Remove any elements that might overlay images
            $('.tour-image').find('[class*="overlay"], [class*="blur"]').remove();
        },
        
        // Enhance card animations
        enhanceAnimations: function() {
            const cards = $('.tour-card');
            
            // Intersection Observer for lazy animation
            if ('IntersectionObserver' in window) {
                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            entry.target.style.opacity = '1';
                            entry.target.style.transform = 'translateY(0)';
                            observer.unobserve(entry.target);
                        }
                    });
                }, {
                    threshold: 0.1,
                    rootMargin: '50px'
                });
                
                cards.each(function() {
                    observer.observe(this);
                });
            }
            
            // Hover effects
            cards.on('mouseenter', function() {
                $(this).find('.tour-image img').css('transform', 'scale(1.05)');
            }).on('mouseleave', function() {
                $(this).find('.tour-image img').css('transform', 'scale(1)');
            });
        },
        
        // Add search enhancements
        addSearchEnhancements: function() {
            // Highlight search terms
            this.highlightSearchTerms();
            
            // Add loading state on button click
            $('.tour-footer .btn').on('click', function() {
                const $btn = $(this);
                const originalText = $btn.html();
                
                $btn.html('<i class="fas fa-spinner fa-spin"></i> Đang tải...');
                $btn.css('pointer-events', 'none');
                
                // Reset after navigation (if it fails)
                setTimeout(function() {
                    $btn.html(originalText);
                    $btn.css('pointer-events', 'auto');
                }, 3000);
            });
        },
        
        // Highlight search terms
        highlightSearchTerms: function() {
            const urlParams = new URLSearchParams(window.location.search);
            const searchTerm = urlParams.get('s');
            
            if (searchTerm && searchTerm.length > 0) {
                // Update page title with search count
                const resultCount = $('.tour-card').length;
                if (resultCount > 0) {
                    $('.section-title p').text(`Tìm thấy ${resultCount} kết quả phù hợp`);
                }
            }
        },
        
        // Improve accessibility
        improveAccessibility: function() {
            // Add aria labels
            $('.tour-image').each(function() {
                const title = $(this).closest('.tour-card').find('.tour-title').text().trim();
                if (title) {
                    $(this).attr('aria-label', `Xem chi tiết: ${title}`);
                }
            });
            
            // Add keyboard navigation
            $('.tour-card').attr('tabindex', '0').on('keypress', function(e) {
                if (e.which === 13 || e.which === 32) { // Enter or Space
                    e.preventDefault();
                    $(this).find('.tour-footer .btn').first()[0].click();
                }
            });
            
            // Focus styles
            $('.tour-card').on('focus', function() {
                $(this).css('outline', '2px solid var(--primary, #ef4444)');
            }).on('blur', function() {
                $(this).css('outline', 'none');
            });
        },
        
        // Scroll to results
        scrollToResults: function() {
            if ($('.tour-grid').length) {
                $('html, body').animate({
                    scrollTop: $('.section-title').offset().top - 100
                }, 600);
            }
        }
    };
    
    // Initialize when DOM is ready
    $(document).ready(function() {
        // Only run on search pages
        if ($('body').hasClass('search') || $('body').hasClass('search-results')) {
            SearchPageEnhancer.init();
        }
    });
    
    // Also run on window load to ensure all images are processed
    $(window).on('load', function() {
        if ($('body').hasClass('search') || $('body').hasClass('search-results')) {
            SearchPageEnhancer.removeImageBlur();
            
            // Keep checking and removing blur every 100ms for the first 2 seconds
            let attempts = 0;
            const checkInterval = setInterval(function() {
                SearchPageEnhancer.removeImageBlur();
                attempts++;
                if (attempts >= 20) {
                    clearInterval(checkInterval);
                }
            }, 100);
        }
    });
    
})(jQuery);
