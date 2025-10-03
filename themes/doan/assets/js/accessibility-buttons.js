/* ========================================
   ACCESSIBILITY - Auto-Add ARIA Labels
   Tự động thêm aria-label cho buttons thiếu
   ======================================== */

document.addEventListener('DOMContentLoaded', function() {
    // Tìm tất cả buttons không có accessible name
    const buttons = document.querySelectorAll('button:not([aria-label]):not([aria-labelledby])');
    
    let fixedCount = 0;
    
    buttons.forEach(function(button) {
        // Bỏ qua nếu button đã có text content
        const hasText = button.textContent.trim().length > 0;
        const hasAriaHidden = button.querySelector('[aria-hidden="true"]');
        
        // Chỉ fix buttons chỉ có icon (no text, có aria-hidden)
        if (!hasText || hasAriaHidden) {
            // Kiểm tra class để xác định purpose
            if (button.classList.contains('search-close')) {
                if (!button.getAttribute('aria-label')) {
                    button.setAttribute('aria-label', 'Close search');
                    button.setAttribute('title', 'Close');
                    fixedCount++;
                }
            } else if (button.classList.contains('search-toggle')) {
                if (!button.getAttribute('aria-label')) {
                    button.setAttribute('aria-label', 'Open search');
                    button.setAttribute('title', 'Search');
                    fixedCount++;
                }
            } else if (button.classList.contains('mobile-menu-toggle')) {
                if (!button.getAttribute('aria-label')) {
                    button.setAttribute('aria-label', 'Open mobile menu');
                    button.setAttribute('title', 'Menu');
                    fixedCount++;
                }
            } else if (button.classList.contains('mobile-menu-close')) {
                if (!button.getAttribute('aria-label')) {
                    button.setAttribute('aria-label', 'Close mobile menu');
                    button.setAttribute('title', 'Close');
                    fixedCount++;
                }
            } else if (button.classList.contains('slick-prev')) {
                if (!button.getAttribute('aria-label')) {
                    button.setAttribute('aria-label', 'Previous slide');
                    fixedCount++;
                }
            } else if (button.classList.contains('slick-next')) {
                if (!button.getAttribute('aria-label')) {
                    button.setAttribute('aria-label', 'Next slide');
                    fixedCount++;
                }
            }
        }
    });
    
    if (fixedCount > 0) {
        console.log('Accessibility: Fixed ' + fixedCount + ' buttons without accessible names');
    }
    
    // Monitor for dynamically added buttons (like Slick slider)
    const observer = new MutationObserver(function(mutations) {
        mutations.forEach(function(mutation) {
            mutation.addedNodes.forEach(function(node) {
                if (node.nodeType === 1) { // Element node
                    const newButtons = node.querySelectorAll ? 
                        node.querySelectorAll('button:not([aria-label]):not([aria-labelledby])') : [];
                    
                    newButtons.forEach(function(btn) {
                        if (btn.classList.contains('slick-prev')) {
                            btn.setAttribute('aria-label', 'Previous slide');
                        } else if (btn.classList.contains('slick-next')) {
                            btn.setAttribute('aria-label', 'Next slide');
                        }
                    });
                }
            });
        });
    });
    
    observer.observe(document.body, {
        childList: true,
        subtree: true
    });
});

