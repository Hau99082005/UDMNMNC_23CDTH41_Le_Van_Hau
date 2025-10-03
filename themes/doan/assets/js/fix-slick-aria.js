/* ========================================
   FIX SLICK SLIDER ARIA ROLES
   Remove invalid role="tabpanel" from <article>
   ======================================== */

document.addEventListener('DOMContentLoaded', function() {
    // Wait for Slick to initialize
    setTimeout(function() {
        // Remove invalid ARIA roles from article elements
        const slickSlides = document.querySelectorAll('article.slick-slide[role="tabpanel"]');
        
        slickSlides.forEach(function(slide) {
            // Remove invalid role
            slide.removeAttribute('role');
            
            // Remove ARIA attributes added by Slick
            slide.removeAttribute('aria-describedby');
            
            // Keep only valid ARIA attributes
            slide.setAttribute('aria-hidden', slide.getAttribute('aria-hidden') || 'false');
        });
        
        console.log('Fixed ' + slickSlides.length + ' invalid ARIA roles from Slick slider');
    }, 1000);
    
    // Also fix on Slick init event
    if (window.jQuery) {
        jQuery('.news-grid.news-slider').on('init', function(event, slick) {
            jQuery('article.slick-slide[role="tabpanel"]').each(function() {
                jQuery(this).removeAttr('role aria-describedby');
            });
            console.log('Slick slider: Removed invalid ARIA roles on init');
        });
    }
});

// Continuous monitoring to remove invalid roles
setInterval(function() {
    const invalidRoles = document.querySelectorAll('article[role="tabpanel"]');
    if (invalidRoles.length > 0) {
        invalidRoles.forEach(function(el) {
            el.removeAttribute('role');
            el.removeAttribute('aria-describedby');
        });
    }
}, 2000);

