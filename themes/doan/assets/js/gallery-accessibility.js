/* ========================================
   GALLERY ACCESSIBILITY - ARIA Compliant
   ======================================== */

document.addEventListener('DOMContentLoaded', function() {
    const galleryTabs = document.querySelectorAll('.gallery-tab');
    const galleryPanels = document.querySelectorAll('.gallery-panel');
    
    console.log('🎨 Gallery Tabs: Found', galleryTabs.length, 'tabs and', galleryPanels.length, 'panels');
    
    if (galleryTabs.length === 0) {
        // No gallery tabs on this page - skip silently
        return;
    }
    
    // FORCE attach click handlers - Multiple methods
    galleryTabs.forEach(function(tab, index) {
        console.log('🔘 Attaching handlers to Tab ' + index + ':', tab.textContent.trim(), 'Target:', tab.getAttribute('data-target'));
        
        // Force enable pointer events
        tab.style.pointerEvents = 'auto';
        tab.style.cursor = 'pointer';
        tab.style.position = 'relative';
        tab.style.zIndex = '10';
        
        // Method 1: addEventListener with capture
        tab.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            console.log('👆 [addEventListener] Tab clicked:', this.textContent.trim());
            activateTab(this);
        }, true); // Use capture phase
        
        // Method 2: onclick (highest priority)
        tab.onclick = function(e) {
            e.preventDefault();
            console.log('👆 [onclick] Tab clicked:', this.textContent.trim());
            activateTab(this);
            return false;
        };
        
        console.log('✅ Handlers attached to Tab ' + index);
        
        // Keyboard navigation
        tab.addEventListener('keydown', function(e) {
            let newIndex;
            
            if (e.key === 'ArrowRight' || e.keyCode === 39) {
                e.preventDefault();
                newIndex = index + 1;
                if (newIndex >= galleryTabs.length) newIndex = 0;
                galleryTabs[newIndex].focus();
            } else if (e.key === 'ArrowLeft' || e.keyCode === 37) {
                e.preventDefault();
                newIndex = index - 1;
                if (newIndex < 0) newIndex = galleryTabs.length - 1;
                galleryTabs[newIndex].focus();
            } else if (e.key === 'Home' || e.keyCode === 36) {
                e.preventDefault();
                galleryTabs[0].focus();
            } else if (e.key === 'End' || e.keyCode === 35) {
                e.preventDefault();
                galleryTabs[galleryTabs.length - 1].focus();
            } else if (e.key === 'Enter' || e.key === ' ' || e.keyCode === 13 || e.keyCode === 32) {
                e.preventDefault();
                activateTab(this);
            }
        });
    });
    
    function activateTab(clickedTab) {
        const targetId = clickedTab.getAttribute('data-target');
        
        console.log('🔄 Activating tab:', clickedTab.textContent.trim(), 'Target:', targetId);
        console.log('Current active tab:', document.querySelector('.gallery-tab.active')?.textContent.trim());
        
        // FORCE remove active from ALL tabs first
        galleryTabs.forEach(function(tab) {
            tab.classList.remove('active');
            tab.setAttribute('aria-selected', 'false');
            tab.setAttribute('tabindex', '-1');
        });
        
        // Activate clicked tab
        clickedTab.classList.add('active');
        clickedTab.setAttribute('aria-selected', 'true');
        clickedTab.setAttribute('tabindex', '0');
        
        console.log('Hiding all panels...');
        
        // FORCE hide ALL panels - Clear everything first
        galleryPanels.forEach(function(panel) {
            // Remove active class first
            panel.classList.remove('active');
            panel.setAttribute('aria-hidden', 'true');
            
            // Force hide with important - Simplified approach
            panel.style.display = 'none';
            
            console.log('Hidden panel:', panel.id);
        });
        
        console.log('Showing target panel:', targetId);
        
        // Show target panel - FORCE show
        const targetPanel = document.getElementById(targetId);
        if (targetPanel) {
            // Add active class
            targetPanel.classList.add('active');
            targetPanel.setAttribute('aria-hidden', 'false');
            
            // Force show with important - Simplified approach
            targetPanel.style.display = 'block';
            
            console.log('✅ Panel activated:', targetId);
            console.log('✅ Tab switch complete!');
        } else {
            console.error('❌ Target panel not found:', targetId);
            console.log('Available panels:', Array.from(galleryPanels).map(p => p.id));
        }
    }
    
    console.log('✅ Gallery Accessibility: Initialized with', galleryTabs.length, 'tabs');
});

