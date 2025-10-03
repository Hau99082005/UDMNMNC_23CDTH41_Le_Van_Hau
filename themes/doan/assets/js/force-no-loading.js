/**
 * FORCE NO LOADING - Remove all loading screens immediately
 * Ensures instant page visibility for better performance
 */

(function() {
    'use strict';
    
    // Run IMMEDIATELY - even before DOM ready
    forceRemoveLoading();
    
    // Run on DOM ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', forceRemoveLoading);
    } else {
        forceRemoveLoading();
    }
    
    // Run on page fully loaded
    window.addEventListener('load', function() {
        forceRemoveLoading();
        document.documentElement.classList.add('loaded');
    });
    
    // Force remove loading function
    function forceRemoveLoading() {
        // Remove all loading elements
        const loadingSelectors = [
            '.preloader',
            '.loader',
            '.loading',
            '.loading-screen',
            '.loading-overlay',
            '.loading-spinner',
            '.banner-loading',
            '.page-loader',
            '.site-loader',
            '.spinner',
            '.spinner-border',
            '.spinner-grow',
            '[class*="loading"]',
            '[class*="preload"]',
            '[class*="spinner"]',
            '[class*="loader"]',
            '[id*="loading"]',
            '[id*="preload"]'
        ];
        
        loadingSelectors.forEach(function(selector) {
            try {
                const elements = document.querySelectorAll(selector);
                elements.forEach(function(el) {
                    if (el && el.parentNode) {
                        el.remove();
                    }
                });
            } catch(e) {
                // Ignore errors
            }
        });
        
        // Remove loading classes from body/html
        const loadingClasses = ['loading', 'preload', 'is-loading', 'page-loading'];
        loadingClasses.forEach(function(cls) {
            document.body.classList.remove(cls);
            document.documentElement.classList.remove(cls);
        });
        
        // Force all elements to be visible
        document.body.style.opacity = '1';
        document.body.style.visibility = 'visible';
        document.documentElement.style.opacity = '1';
        document.documentElement.style.visibility = 'visible';
        
        // Remove overflow hidden
        document.body.style.overflow = '';
        document.documentElement.style.overflow = '';
    }
    
    // Keep checking and removing for first 2 seconds
    let attempts = 0;
    const checkInterval = setInterval(function() {
        forceRemoveLoading();
        attempts++;
        if (attempts >= 20) { // 20 * 100ms = 2 seconds
            clearInterval(checkInterval);
        }
    }, 100);
    
    // Also monitor for dynamically added loading elements
    if (typeof MutationObserver !== 'undefined') {
        const observer = new MutationObserver(function(mutations) {
            mutations.forEach(function(mutation) {
                mutation.addedNodes.forEach(function(node) {
                    if (node.nodeType === 1) { // Element node
                        // Check if it's a loading element
                        const className = node.className || '';
                        const id = node.id || '';
                        if (
                            className.includes('loading') ||
                            className.includes('preload') ||
                            className.includes('spinner') ||
                            className.includes('loader') ||
                            id.includes('loading') ||
                            id.includes('preload')
                        ) {
                            node.remove();
                        }
                    }
                });
            });
        });
        
        observer.observe(document.body, {
            childList: true,
            subtree: true
        });
        
        // Stop observing after 5 seconds
        setTimeout(function() {
            observer.disconnect();
        }, 5000);
    }
    
})();

