/* ========================================
   PROFESSIONAL MOBILE MENU JAVASCRIPT
   Simple and Guaranteed to Work
   ======================================== */

// Pure JavaScript - NO jQuery dependency
document.addEventListener('DOMContentLoaded', function() {
    console.log('Mobile Menu: Initializing...');
    
    // Support both old and new Bootstrap navbar structure
    const menuToggle = document.querySelector('.menu-toggle') || document.querySelector('.navbar-toggler');
    const mobileMenu = document.querySelector('.mobile-menu') || document.querySelector('.navbar-collapse');
    const mobileMenuClose = document.querySelector('.mobile-menu-close');
    const overlay = document.querySelector('.mobile-menu-overlay');
    
    // Function to open menu
    function openMenu() {
        console.log('Opening menu...');
        
        if (mobileMenu) {
            // Check if it's Bootstrap navbar-collapse
            if (mobileMenu.classList.contains('navbar-collapse')) {
                mobileMenu.classList.add('show');
                mobileMenu.style.setProperty('display', 'block', 'important');
            } else {
                // Old mobile menu structure
                mobileMenu.classList.add('active');
                mobileMenu.style.setProperty('transform', 'translateX(0)', 'important');
                mobileMenu.style.setProperty('opacity', '1', 'important');
                mobileMenu.style.setProperty('visibility', 'visible', 'important');
                mobileMenu.style.setProperty('display', 'block', 'important');
            }
        }
        
        if (overlay) {
            overlay.classList.add('active');
            overlay.style.setProperty('display', 'block', 'important');
            overlay.style.setProperty('opacity', '1', 'important');
        }
        
        if (menuToggle) {
            menuToggle.classList.add('active');
            // Set aria-expanded for Bootstrap
            menuToggle.setAttribute('aria-expanded', 'true');
        }
        
        document.body.classList.add('mobile-menu-open');
        document.body.style.overflow = 'hidden';
        
        console.log('✅ Menu opened successfully');
    }
    
    // Function to close menu
    function closeMenu() {
        console.log('Closing menu...');
        
        if (mobileMenu) {
            // Check if it's Bootstrap navbar-collapse
            if (mobileMenu.classList.contains('navbar-collapse')) {
                mobileMenu.classList.remove('show');
                mobileMenu.style.setProperty('display', 'none', 'important');
            } else {
                // Old mobile menu structure
                mobileMenu.classList.remove('active');
            }
        }
        
        if (overlay) overlay.classList.remove('active');
        if (menuToggle) {
            menuToggle.classList.remove('active');
            // Set aria-expanded for Bootstrap
            menuToggle.setAttribute('aria-expanded', 'false');
        }
        
        document.body.classList.remove('mobile-menu-open');
        document.body.style.overflow = '';
        console.log('✅ Menu closed successfully');
    }
    
    // Hamburger button click
    if (menuToggle) {
        menuToggle.addEventListener('click', function(e) {
            e.preventDefault();
            console.log('Hamburger clicked');
            
            // Check if it's Bootstrap navbar-collapse
            const isActive = mobileMenu && (
                mobileMenu.classList.contains('active') || 
                mobileMenu.classList.contains('show')
            );
            
            if (isActive) {
                closeMenu();
            } else {
                openMenu();
            }
        });
        console.log('Menu toggle button found and initialized');
    } else {
        console.error('Menu toggle button NOT found');
    }
    
    // Close button click (X)
    if (mobileMenuClose) {
        mobileMenuClose.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            console.log('Close button (X) clicked');
            closeMenu();
        });
        console.log('✅ Close button found and initialized');
    } else {
        console.log('ℹ️ Close button not found (probably not on this page)');
    }
    
    // Overlay click
    if (overlay) {
        overlay.addEventListener('click', function(e) {
            console.log('Overlay clicked');
            closeMenu();
        });
    }
    
    // ESC key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' || e.keyCode === 27) {
            if (mobileMenu && mobileMenu.classList.contains('active')) {
                console.log('ESC pressed');
                closeMenu();
            }
        }
    });
    
    // Sub-menu toggles
    const subToggles = document.querySelectorAll('.mobile-sub-toggle');
    subToggles.forEach(function(toggle) {
        toggle.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            
            const subMenu = this.nextElementSibling;
            const isExpanded = this.getAttribute('aria-expanded') === 'true';
            
            if (isExpanded) {
                subMenu.style.display = 'none';
                this.setAttribute('aria-expanded', 'false');
            } else {
                subMenu.style.display = 'block';
                this.setAttribute('aria-expanded', 'true');
            }
        });
    });
    
    console.log('Mobile Menu: Fully initialized');
});

// jQuery backup (if available)
(function($) {
    'use strict';
    
    const MobileMenuPro = {
        
        init: function() {
            this.setupMenuToggle();
            this.setupSubMenuToggle();
            this.setupOverlayClose();
            this.setupKeyboardNav();
            this.preventBodyScroll();
        },
        
        // Toggle mobile menu
        setupMenuToggle: function() {
            const self = this;
            
            // Open menu button (hamburger)
            $(document).on('click', '.menu-toggle', function(e) {
                e.preventDefault();
                e.stopPropagation();
                
                const isActive = $('.mobile-menu').hasClass('active');
                
                if (isActive) {
                    self.closeMenu();
                } else {
                    self.openMenu();
                }
            });
            
            // Close button (X)
            $(document).on('click', '.mobile-menu-close', function(e) {
                e.preventDefault();
                e.stopPropagation();
                self.closeMenu();
            });
        },
        
        // Open menu
        openMenu: function() {
            $('.mobile-menu').addClass('active');
            $('.mobile-menu-overlay').addClass('active');
            $('.menu-toggle').addClass('active');
            $('body').addClass('mobile-menu-open');
            
            // Update ARIA
            $('.menu-toggle').attr('aria-expanded', 'true');
            
            // Trap focus
            $('.mobile-menu a:first').focus();
        },
        
        // Close menu
        closeMenu: function() {
            $('.mobile-menu').removeClass('active');
            $('.mobile-menu-overlay').removeClass('active');
            $('.menu-toggle').removeClass('active');
            $('body').removeClass('mobile-menu-open');
            
            // Update ARIA
            $('.menu-toggle').attr('aria-expanded', 'false');
            
            // Close all sub-menus
            $('.mobile-sub-menu').removeClass('active').slideUp(300);
            $('.mobile-sub-toggle').attr('aria-expanded', 'false');
        },
        
        // Sub-menu toggle
        setupSubMenuToggle: function() {
            $(document).on('click', '.mobile-sub-toggle', function(e) {
                e.preventDefault();
                e.stopPropagation();
                
                const $toggle = $(this);
                const $subMenu = $toggle.siblings('.mobile-sub-menu');
                const isExpanded = $toggle.attr('aria-expanded') === 'true';
                
                // Close other sub-menus
                $('.mobile-sub-menu').not($subMenu).removeClass('active').slideUp(300);
                $('.mobile-sub-toggle').not($toggle).attr('aria-expanded', 'false');
                
                // Toggle current sub-menu
                if (isExpanded) {
                    $subMenu.removeClass('active').slideUp(300);
                    $toggle.attr('aria-expanded', 'false');
                } else {
                    $subMenu.addClass('active').slideDown(300);
                    $toggle.attr('aria-expanded', 'true');
                }
            });
        },
        
        // Close menu when clicking overlay
        setupOverlayClose: function() {
            const self = this;
            
            $(document).on('click', '.mobile-menu-overlay', function(e) {
                e.preventDefault();
                self.closeMenu();
            });
        },
        
        // Keyboard navigation
        setupKeyboardNav: function() {
            const self = this;
            
            // Close menu with Escape key
            $(document).on('keydown', function(e) {
                if (e.key === 'Escape' || e.keyCode === 27) {
                    if ($('.mobile-menu').hasClass('active')) {
                        self.closeMenu();
                    }
                }
            });
            
            // Trap focus within menu
            $('.mobile-menu').on('keydown', function(e) {
                if (e.key === 'Tab' || e.keyCode === 9) {
                    const $focusable = $(this).find('a, button').filter(':visible');
                    const $first = $focusable.first();
                    const $last = $focusable.last();
                    
                    if (e.shiftKey) {
                        // Shift + Tab
                        if ($(document.activeElement).is($first)) {
                            e.preventDefault();
                            $last.focus();
                        }
                    } else {
                        // Tab
                        if ($(document.activeElement).is($last)) {
                            e.preventDefault();
                            $first.focus();
                        }
                    }
                }
            });
        },
        
        // Prevent body scroll when menu open
        preventBodyScroll: function() {
            let scrollPosition = 0;
            
            $('.menu-toggle').on('click', function() {
                if ($('body').hasClass('mobile-menu-open')) {
                    // Store scroll position
                    scrollPosition = window.pageYOffset;
                    $('body').css({
                        'position': 'fixed',
                        'top': -scrollPosition + 'px',
                        'width': '100%'
                    });
                } else {
                    // Restore scroll position
                    $('body').css({
                        'position': '',
                        'top': '',
                        'width': ''
                    });
                    window.scrollTo(0, scrollPosition);
                }
            });
        },
        
        // Highlight active menu item
        highlightActiveItem: function() {
            const currentUrl = window.location.href;
            
            $('.mobile-menu-items a').each(function() {
                if (this.href === currentUrl) {
                    $(this).addClass('active');
                }
            });
        }
    };
    
    // Initialize when DOM is ready
    $(document).ready(function() {
        MobileMenuPro.init();
        MobileMenuPro.highlightActiveItem();
    });
    
    // Close menu on window resize to desktop
    $(window).on('resize', function() {
        if ($(window).width() >= 992) {
            MobileMenuPro.closeMenu();
        }
    });
    
    // Debug: Log when script loaded
    console.log('Mobile Menu Pro: Loaded and ready');
    
    // Manual close button backup
    window.closeMobileMenu = function() {
        MobileMenuPro.closeMenu();
    };
    
})(jQuery);

// Vanilla JS backup for close button - FORCE CLOSE
document.addEventListener('DOMContentLoaded', function() {
    const closeBtn = document.querySelector('.mobile-menu-close');
    if (closeBtn) {
        closeBtn.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            e.stopImmediatePropagation();
            
            console.log('🔴 FORCE CLOSING MOBILE MENU');
            
            const menu = document.querySelector('.mobile-menu');
            const overlay = document.querySelector('.mobile-menu-overlay');
            const toggle = document.querySelector('.menu-toggle');
            
            if (menu) {
                menu.classList.remove('active');
                menu.style.setProperty('transform', 'translateX(-100%)', 'important');
                menu.style.setProperty('opacity', '0', 'important');
            }
            if (overlay) overlay.classList.remove('active');
            if (toggle) toggle.classList.remove('active');
            
            document.body.classList.remove('mobile-menu-open');
            document.body.style.overflow = '';
            
            console.log('✅ Mobile menu forcefully closed');
            
            return false;
        }, true); // Capture phase
    }
    
    // Hamburger toggle backup
    const menuToggle = document.querySelector('.menu-toggle');
    if (menuToggle) {
        menuToggle.addEventListener('click', function(e) {
            e.preventDefault();
            const menu = document.querySelector('.mobile-menu');
            const overlay = document.querySelector('.mobile-menu-overlay');
            const isActive = menu.classList.contains('active');
            
            if (isActive) {
                menu.classList.remove('active');
                overlay.classList.remove('active');
                this.classList.remove('active');
                document.body.classList.remove('mobile-menu-open');
            } else {
                menu.classList.add('active');
                overlay.classList.add('active');
                this.classList.add('active');
                document.body.classList.add('mobile-menu-open');
            }
        });
    }
});
