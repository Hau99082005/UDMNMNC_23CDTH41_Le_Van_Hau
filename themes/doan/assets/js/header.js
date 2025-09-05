jQuery(document).ready(function($) {
    'use strict';

    // Mobile Menu Toggle
    $('.mobile-menu-toggle').on('click', function() {
        $(this).toggleClass('active');
        $('body').toggleClass('mobile-menu-open');
        $('.mobile-menu-container').toggleClass('active');
    });

    // Close mobile menu when clicking close button
    $('.mobile-menu-close').on('click', function() {
        $('.mobile-menu-toggle').removeClass('active');
        $('body').removeClass('mobile-menu-open');
        $('.mobile-menu-container').removeClass('active');
    });

    // Mobile menu dropdown toggle
    $('.mobile-menu .menu-item-has-children > a').on('click', function(e) {
        if ($(window).width() <= 991) {
            e.preventDefault();
            $(this).parent().toggleClass('active').siblings().removeClass('active');
            $(this).next('.sub-menu').slideToggle(300);
            $(this).parent().siblings().find('.sub-menu').slideUp(300);
        }
    });

    // Search Toggle
    $('.search-toggle').on('click', function(e) {
        e.preventDefault();
        $('.search-overlay').addClass('active');
        $('body').addClass('search-open');
        $('.search-overlay .search-field').focus();
    });

    // Close search overlay
    $('.search-close, .search-overlay').on('click', function(e) {
        if ($(e.target).hasClass('search-overlay') || $(e.target).hasClass('search-close')) {
            $('.search-overlay').removeClass('active');
            $('body').removeClass('search-open');
        }
    });

    // Prevent closing when clicking inside search form
    $('.search-overlay-content').on('click', function(e) {
        e.stopPropagation();
    });

    // Close mobile menu when clicking outside
    $(document).on('click', function(e) {
        if (!$(e.target).closest('.mobile-menu-container, .mobile-menu-toggle').length) {
            $('.mobile-menu-toggle').removeClass('active');
            $('body').removeClass('mobile-menu-open');
            $('.mobile-menu-container').removeClass('active');
        }
    });

    // Sticky Header
    var header = $('.site-header');
    var headerHeight = header.outerHeight();
    var lastScroll = 0;

    $(window).on('scroll', function() {
        var scroll = $(window).scrollTop();
        
        if (scroll > 200) {
            header.addClass('sticky');
            $('body').css('padding-top', headerHeight + 'px');
        } else {
            header.removeClass('sticky');
            $('body').css('padding-top', 0);
        }
        
        // Hide header on scroll down, show on scroll up
        if (scroll > lastScroll && scroll > 200) {
            header.addClass('hide');
        } else {
            header.removeClass('hide');
        }
        
        lastScroll = scroll;
    });

    // Smooth scroll for anchor links
    $('a[href*="#"]:not([href="#"])').on('click', function() {
        if (location.pathname.replace(/^\//, '') === this.pathname.replace(/^\//, '') && 
            location.hostname === this.hostname) {
            
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            
            if (target.length) {
                $('html, body').animate({
                    scrollTop: target.offset().top - 100
                }, 1000);
                
                // Close mobile menu if open
                $('.mobile-menu-toggle').removeClass('active');
                $('body').removeClass('mobile-menu-open');
                $('.mobile-menu-container').removeClass('active');
                
                return false;
            }
        }
    });

    // Handle window resize
    $(window).on('resize', function() {
        // Reset mobile menu on resize
        if ($(window).width() > 991) {
            $('.mobile-menu .sub-menu').removeAttr('style');
            $('.mobile-menu .menu-item-has-children').removeClass('active');
        }
    });

    // Initialize tooltips
    $('[data-toggle="tooltip"]').tooltip();
});
