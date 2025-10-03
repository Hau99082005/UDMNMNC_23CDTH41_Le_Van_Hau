/* ========================================
   SEARCH OVERLAY FIX - Pure JavaScript
   ======================================== */

document.addEventListener('DOMContentLoaded', function() {
    console.log('🔍 Search Overlay: Initializing...');
    
    const searchToggles = document.querySelectorAll('.search-toggle');
    const searchOverlay = document.querySelector('.search-overlay');
    const searchClose = document.querySelector('.search-close');
    const searchField = document.querySelector('.search-overlay .search-field');
    
    console.log('Found elements:', {
        toggles: searchToggles.length,
        overlay: !!searchOverlay,
        close: !!searchClose,
        field: !!searchField
    });
    
    // Function to open search
    function openSearch() {
        console.log('Opening search overlay');
        if (searchOverlay) {
            // Add active class first
            searchOverlay.classList.add('active');
            
            // Force show with inline styles
            searchOverlay.style.setProperty('display', 'flex', 'important');
            searchOverlay.style.setProperty('opacity', '1', 'important');
            searchOverlay.style.setProperty('visibility', 'visible', 'important');
            searchOverlay.style.setProperty('z-index', '10000', 'important');
            
            document.body.classList.add('search-overlay-open');
            document.body.style.overflow = 'hidden';
            
            // Force show ALL content inside
            const content = searchOverlay.querySelector('.search-overlay-content');
            const header = searchOverlay.querySelector('.search-header');
            const formWrapper = searchOverlay.querySelector('.search-form-wrapper');
            const form = searchOverlay.querySelector('.search-form');
            const field = searchOverlay.querySelector('.search-field');
            
            if (content) {
                content.style.setProperty('display', 'block', 'important');
                content.style.setProperty('visibility', 'visible', 'important');
                content.style.setProperty('opacity', '1', 'important');
                content.style.setProperty('background', '#ffffff', 'important');
            }
            
            if (header) {
                header.style.setProperty('display', 'flex', 'important');
                header.style.setProperty('visibility', 'visible', 'important');
            }
            
            if (formWrapper) {
                formWrapper.style.setProperty('display', 'block', 'important');
                formWrapper.style.setProperty('visibility', 'visible', 'important');
            }
            
            if (form) {
                form.style.setProperty('display', 'block', 'important');
                form.style.setProperty('visibility', 'visible', 'important');
            }
            
            if (field) {
                field.style.setProperty('display', 'block', 'important');
                field.style.setProperty('visibility', 'visible', 'important');
            }
            
            // Focus on search field
            setTimeout(function() {
                const searchField = searchOverlay.querySelector('.search-field');
                if (searchField) {
                    searchField.focus();
                    console.log('✓ Search overlay opened and focused');
                } else {
                    console.error('✗ Search field not found!');
                }
            }, 350);
        } else {
            console.error('✗ Search overlay element not found in DOM!');
        }
    }
    
    // Function to close search
    function closeSearch() {
        console.log('Closing search overlay');
        if (searchOverlay) {
            searchOverlay.classList.remove('active');
            searchOverlay.style.setProperty('opacity', '0', 'important');
            searchOverlay.style.setProperty('visibility', 'hidden', 'important');
            document.body.classList.remove('search-overlay-open');
            document.body.style.overflow = '';
            
            setTimeout(function() {
                searchOverlay.style.setProperty('display', 'none', 'important');
            }, 350);
        }
    }
    
    // Open search when clicking any search toggle button
    searchToggles.forEach(function(toggle) {
        toggle.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            console.log('Search toggle clicked');
            openSearch();
        });
    });
    
    // Close search button
    if (searchClose) {
        searchClose.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            console.log('Search close clicked');
            closeSearch();
        });
    }
    
    // Close when clicking overlay background
    if (searchOverlay) {
        searchOverlay.addEventListener('click', function(e) {
            if (e.target === searchOverlay) {
                console.log('Overlay clicked');
                closeSearch();
            }
        });
    }
    
    // Close with ESC key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' || e.keyCode === 27) {
            if (searchOverlay && searchOverlay.classList.contains('active')) {
                console.log('ESC pressed - closing search');
                closeSearch();
            }
        }
    });
    
    console.log('Search Overlay: Initialized');
});

// Prevent body scroll when search is open
document.addEventListener('DOMContentLoaded', function() {
    const searchOverlay = document.querySelector('.search-overlay');
    
    if (searchOverlay) {
        const observer = new MutationObserver(function(mutations) {
            mutations.forEach(function(mutation) {
                if (mutation.attributeName === 'class') {
                    if (searchOverlay.classList.contains('active')) {
                        document.body.style.overflow = 'hidden';
                    } else {
                        document.body.style.overflow = '';
                    }
                }
            });
        });
        
        observer.observe(searchOverlay, {
            attributes: true,
            attributeFilter: ['class']
        });
    }
});

