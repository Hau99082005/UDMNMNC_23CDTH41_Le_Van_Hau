/**
 * Professional UI Enhancements
 * Du Lịch Việt Nhật Theme
 */

(function($) {
    'use strict';

    // Wait for DOM to be ready
    $(document).ready(function() {
        initScrollEffects();
        initAnimations();
        initSmoothScroll();
        initHeaderScroll();
        initLazyLoad();
        initCardHoverEffects();
    });

    /**
     * Initialize scroll-based effects
     */
    function initScrollEffects() {
        const elements = document.querySelectorAll('.post-card, .tour-card, .news-card, .destination-card');
        
        if ('IntersectionObserver' in window) {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach((entry, index) => {
                    if (entry.isIntersecting) {
                        setTimeout(() => {
                            entry.target.classList.add('animate-fade-in-up');
                        }, index * 100);
                        observer.unobserve(entry.target);
                    }
                });
            }, {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            });

            elements.forEach(element => {
                observer.observe(element);
            });
        }
    }

    /**
     * Initialize animations
     */
    function initAnimations() {
        // Add stagger animation to grid items
        const gridItems = document.querySelectorAll('.posts-grid > *, .tours-grid > *, .news-grid > *');
        gridItems.forEach((item, index) => {
            item.style.animationDelay = `${index * 0.1}s`;
        });

        // Animate section titles
        const sectionTitles = document.querySelectorAll('.section-title');
        if ('IntersectionObserver' in window) {
            const titleObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animate-fade-in');
                        titleObserver.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.5 });

            sectionTitles.forEach(title => {
                titleObserver.observe(title);
            });
        }
    }

    /**
     * Smooth scroll for anchor links
     */
    function initSmoothScroll() {
        $('a[href*="#"]:not([href="#"])').on('click', function(e) {
            if (location.pathname.replace(/^\//, '') === this.pathname.replace(/^\//, '') && 
                location.hostname === this.hostname) {
                
                const target = $(this.hash);
                if (target.length) {
                    e.preventDefault();
                    
                    $('html, body').animate({
                        scrollTop: target.offset().top - 80
                    }, {
                        duration: 600,
                        easing: 'swing'
                    });
                    
                    // Update URL without scrolling
                    if (history.pushState) {
                        history.pushState(null, null, this.hash);
                    }
                }
            }
        });
    }

    /**
     * Header scroll effects
     */
    function initHeaderScroll() {
        const header = $('.site-header');
        let lastScroll = 0;

        $(window).on('scroll', function() {
            const currentScroll = $(this).scrollTop();

            // Add shadow on scroll
            if (currentScroll > 10) {
                header.addClass('scrolled');
            } else {
                header.removeClass('scrolled');
            }

            // Hide header on scroll down, show on scroll up (optional)
            if (currentScroll > lastScroll && currentScroll > 100) {
                header.css('transform', 'translateY(-100%)');
            } else {
                header.css('transform', 'translateY(0)');
            }

            lastScroll = currentScroll;
        });
    }

    /**
     * Enhanced lazy loading with fade-in effect
     */
    function initLazyLoad() {
        if ('loading' in HTMLImageElement.prototype) {
            const images = document.querySelectorAll('img[loading="lazy"]');
            images.forEach(img => {
                img.addEventListener('load', function() {
                    this.classList.add('loaded');
                });
            });
        }
    }

    /**
     * Card hover effects
     */
    function initCardHoverEffects() {
        $('.post-card, .tour-card, .news-card, .destination-card').each(function() {
            const $card = $(this);
            
            $card.on('mouseenter', function(e) {
                const xAxis = (e.pageX - $card.offset().left - $card.width() / 2) / 25;
                const yAxis = (e.pageY - $card.offset().top - $card.height() / 2) / 25;
                
                // Subtle 3D tilt effect
                $card.css('transform', `perspective(1000px) rotateY(${xAxis}deg) rotateX(${-yAxis}deg) translateY(-8px)`);
            });
            
            $card.on('mouseleave', function() {
                $card.css('transform', 'perspective(1000px) rotateY(0) rotateX(0) translateY(0)');
            });
            
            $card.on('mousemove', function(e) {
                const xAxis = (e.pageX - $card.offset().left - $card.width() / 2) / 25;
                const yAxis = (e.pageY - $card.offset().top - $card.height() / 2) / 25;
                
                $card.css('transform', `perspective(1000px) rotateY(${xAxis}deg) rotateX(${-yAxis}deg) translateY(-8px)`);
            });
        });
    }

    /**
     * Parallax effect for images
     */
    function initParallax() {
        const parallaxElements = document.querySelectorAll('.parallax-element');
        
        if (parallaxElements.length > 0) {
            window.addEventListener('scroll', function() {
                const scrolled = window.pageYOffset;
                
                parallaxElements.forEach(element => {
                    const speed = element.dataset.speed || 0.5;
                    const yPos = -(scrolled * speed);
                    element.style.transform = `translateY(${yPos}px)`;
                });
            });
        }
    }

    /**
     * Counter animation for numbers
     */
    function animateCounters() {
        const counters = document.querySelectorAll('.counter');
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const counter = entry.target;
                    const target = parseInt(counter.getAttribute('data-target'));
                    const duration = 2000;
                    const increment = target / (duration / 16);
                    let current = 0;

                    const timer = setInterval(() => {
                        current += increment;
                        if (current >= target) {
                            counter.textContent = target;
                            clearInterval(timer);
                        } else {
                            counter.textContent = Math.floor(current);
                        }
                    }, 16);

                    observer.unobserve(counter);
                }
            });
        }, { threshold: 0.5 });

        counters.forEach(counter => observer.observe(counter));
    }

    /**
     * Form validation enhancement
     */
    function enhanceFormValidation() {
        const forms = document.querySelectorAll('form');
        
        forms.forEach(form => {
            const inputs = form.querySelectorAll('input, textarea, select');
            
            inputs.forEach(input => {
                // Add floating label effect
                input.addEventListener('focus', function() {
                    this.parentElement.classList.add('focused');
                });
                
                input.addEventListener('blur', function() {
                    if (!this.value) {
                        this.parentElement.classList.remove('focused');
                    }
                });
                
                // Validate on blur
                input.addEventListener('blur', function() {
                    validateField(this);
                });
            });
        });
    }

    function validateField(field) {
        const value = field.value.trim();
        const type = field.type;
        let isValid = true;
        let message = '';

        if (field.hasAttribute('required') && !value) {
            isValid = false;
            message = 'Trường này là bắt buộc';
        } else if (type === 'email' && value) {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(value)) {
                isValid = false;
                message = 'Email không hợp lệ';
            }
        } else if (type === 'tel' && value) {
            const phoneRegex = /^[0-9]{10,11}$/;
            if (!phoneRegex.test(value.replace(/\s/g, ''))) {
                isValid = false;
                message = 'Số điện thoại không hợp lệ';
            }
        }

        const formGroup = field.closest('.form-group');
        if (formGroup) {
            const errorElement = formGroup.querySelector('.error-message');
            
            if (!isValid) {
                field.classList.add('error');
                if (!errorElement) {
                    const error = document.createElement('span');
                    error.className = 'error-message';
                    error.textContent = message;
                    formGroup.appendChild(error);
                }
            } else {
                field.classList.remove('error');
                if (errorElement) {
                    errorElement.remove();
                }
            }
        }
    }

    /**
     * Back to top button - Enhanced
     */
    function initBackToTop() {
        const $backToTop = $('.back-to-top');
        
        if ($backToTop.length) {
            $(window).on('scroll', function() {
                if ($(this).scrollTop() > 400) {
                    $backToTop.addClass('visible');
                } else {
                    $backToTop.removeClass('visible');
                }
            });
            
            $backToTop.on('click', function(e) {
                e.preventDefault();
                $('html, body').animate({
                    scrollTop: 0
                }, {
                    duration: 800,
                    easing: 'swing'
                });
                return false;
            });
        }
    }

    /**
     * Remove all loading screens
     */
    function removeLoadingScreens() {
        $('.preloader, .loader, .loading-screen, .banner-loading').remove();
        $('body').removeClass('loading preload page-loading');
        $('body').css({'opacity': '1', 'visibility': 'visible'});
    }

    // Initialize immediately - no loading
    removeLoadingScreens();
    
    // Initialize on load
    $(window).on('load', function() {
        initParallax();
        animateCounters();
        enhanceFormValidation();
        initBackToTop();
        removeLoadingScreens(); // Double check
    });

})(jQuery);

