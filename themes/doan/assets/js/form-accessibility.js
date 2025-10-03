/* ========================================
   FORM ACCESSIBILITY - Auto-Add Labels
   Tự động thêm labels cho form inputs thiếu
   ======================================== */

document.addEventListener('DOMContentLoaded', function() {
    fixFormLabels();
    
    // Also monitor for dynamically added forms
    const observer = new MutationObserver(function(mutations) {
        mutations.forEach(function(mutation) {
            if (mutation.addedNodes.length > 0) {
                setTimeout(fixFormLabels, 100);
            }
        });
    });
    
    observer.observe(document.body, {
        childList: true,
        subtree: true
    });
});

function fixFormLabels() {
    let fixedCount = 0;
    
    // Tìm tất cả form inputs
    const inputs = document.querySelectorAll('input:not([type="hidden"]):not([type="submit"]):not([type="button"]), select, textarea');
    
    inputs.forEach(function(input) {
        // Kiểm tra xem input đã có label chưa
        const hasLabel = hasAssociatedLabel(input);
        const hasAriaLabel = input.hasAttribute('aria-label') || input.hasAttribute('aria-labelledby');
        
        if (!hasLabel && !hasAriaLabel) {
            // Tạo label text từ name hoặc placeholder
            const labelText = generateLabelText(input);
            
            // Kiểm tra xem có thể tạo label element không
            if (canCreateLabel(input)) {
                createLabel(input, labelText);
                fixedCount++;
            } else {
                // Nếu không thể tạo label, thêm aria-label
                input.setAttribute('aria-label', labelText);
                fixedCount++;
            }
        }
    });
    
    if (fixedCount > 0) {
        console.log('Form Accessibility: Fixed ' + fixedCount + ' inputs without labels');
    }
}

function hasAssociatedLabel(input) {
    // Kiểm tra xem input có id và có label[for="id"] không
    if (input.id) {
        const label = document.querySelector('label[for="' + input.id + '"]');
        if (label) return true;
    }
    
    // Kiểm tra xem input có nằm trong <label> không
    let parent = input.parentElement;
    while (parent) {
        if (parent.tagName === 'LABEL') return true;
        if (parent.tagName === 'FORM') break;
        parent = parent.parentElement;
    }
    
    return false;
}

function generateLabelText(input) {
    // Ưu tiên: placeholder > name > type
    if (input.placeholder) {
        return input.placeholder;
    }
    
    if (input.name) {
        // Convert name thành text dễ đọc
        // travel_date -> Travel date
        // contact_name -> Contact name
        return input.name
            .replace(/_/g, ' ')
            .replace(/-/g, ' ')
            .split(' ')
            .map(word => word.charAt(0).toUpperCase() + word.slice(1))
            .join(' ');
    }
    
    // Fallback theo type
    const typeLabels = {
        'text': 'Text input',
        'email': 'Email',
        'tel': 'Phone number',
        'date': 'Date',
        'number': 'Number',
        'url': 'URL',
        'search': 'Search',
        'password': 'Password'
    };
    
    return typeLabels[input.type] || 'Input field';
}

function canCreateLabel(input) {
    // Chỉ tạo label nếu input nằm trong một container phù hợp
    const parent = input.parentElement;
    if (!parent) return false;
    
    // Nếu parent là form-group, jvcf-row, field-wrapper, etc.
    const wrapperClasses = ['form-group', 'jvcf-row', 'field-wrapper', 'form-field', 'input-wrapper'];
    for (let i = 0; i < wrapperClasses.length; i++) {
        if (parent.classList.contains(wrapperClasses[i])) {
            return true;
        }
    }
    
    return false;
}

function createLabel(input, labelText) {
    // Tạo ID cho input nếu chưa có
    if (!input.id) {
        input.id = 'input-' + Math.random().toString(36).substr(2, 9);
    }
    
    // Tạo label element
    const label = document.createElement('label');
    label.setAttribute('for', input.id);
    label.textContent = labelText;
    label.style.display = 'block';
    label.style.marginBottom = '4px';
    label.style.fontWeight = '600';
    label.style.fontSize = '14px';
    label.style.color = '#374151';
    
    // Thêm required indicator nếu cần
    if (input.required) {
        const required = document.createElement('span');
        required.textContent = ' *';
        required.style.color = '#ef4444';
        label.appendChild(required);
    }
    
    // Insert label trước input
    input.parentElement.insertBefore(label, input);
}

// Fix specific forms - AGGRESSIVE APPROACH
function fixJVCFForm() {
    const jvcfInputs = document.querySelectorAll('.jvcf-form input, .jvcf-form textarea, .jvcf-form select');
    let fixedCount = 0;
    
    jvcfInputs.forEach(function(input) {
        // Skip hidden inputs and buttons
        if (input.type === 'hidden' || input.type === 'submit' || input.type === 'button') {
            return;
        }
        
        // Generate unique ID if missing
        if (!input.id) {
            const name = input.name || input.type;
            input.id = 'jvcf-' + name + '-' + Math.random().toString(36).substr(2, 9);
        }
        
        // Check if label exists
        const existingLabel = document.querySelector('label[for="' + input.id + '"]');
        const hasAriaLabel = input.hasAttribute('aria-label') || input.hasAttribute('aria-labelledby');
        
        if (!existingLabel && !hasAriaLabel) {
            // Determine label text
            let labelText = '';
            const name = input.name || '';
            
            if (name.includes('travel_date') || name === 'date') {
                labelText = 'Ngày khởi hành';
            } else if (name.includes('name') || name.includes('full_name')) {
                labelText = 'Họ và tên';
            } else if (name.includes('email')) {
                labelText = 'Email';
            } else if (name.includes('phone') || name.includes('tel')) {
                labelText = 'Số điện thoại';
            } else if (name.includes('message') || input.tagName === 'TEXTAREA') {
                labelText = 'Tin nhắn';
            } else if (input.placeholder) {
                labelText = input.placeholder;
            } else {
                labelText = generateLabelText(input);
            }
            
            // Add aria-label
            input.setAttribute('aria-label', labelText);
            
            // Create visible label element
            const label = document.createElement('label');
            label.setAttribute('for', input.id);
            label.textContent = labelText;
            label.style.display = 'block';
            label.style.marginBottom = '6px';
            label.style.fontWeight = '600';
            label.style.fontSize = '14px';
            label.style.color = '#374151';
            
            // Add required indicator
            if (input.required) {
                const required = document.createElement('span');
                required.textContent = ' *';
                required.style.color = '#ef4444';
                label.appendChild(required);
                input.setAttribute('aria-required', 'true');
            }
            
            // Insert label before input
            input.parentElement.insertBefore(label, input);
            
            fixedCount++;
        }
    });
    
    if (fixedCount > 0) {
        console.log('Form Accessibility: Fixed ' + fixedCount + ' JVCF form inputs');
    }
}

// Run specific fixes multiple times to ensure they work
setTimeout(fixJVCFForm, 500);
setTimeout(fixJVCFForm, 1000);
setTimeout(fixJVCFForm, 2000);

// Also run when DOM changes (for dynamic forms)
if (typeof MutationObserver !== 'undefined') {
    const observer = new MutationObserver(function(mutations) {
        let shouldFix = false;
        mutations.forEach(function(mutation) {
            if (mutation.addedNodes.length > 0) {
                mutation.addedNodes.forEach(function(node) {
                    if (node.nodeType === 1 && (node.classList.contains('jvcf-form') || node.querySelector('.jvcf-form'))) {
                        shouldFix = true;
                    }
                });
            }
        });
        if (shouldFix) {
            setTimeout(fixJVCFForm, 100);
        }
    });
    
    observer.observe(document.body, {
        childList: true,
        subtree: true
    });
}

