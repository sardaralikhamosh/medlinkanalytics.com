// assets/js/script.js - Working version
document.addEventListener('DOMContentLoaded', function() {
    // Find all contact forms
    const contactForms = document.querySelectorAll('form[id*="contact"], form[id*="Contact"], form[action*="contact"]');
    
    contactForms.forEach(form => {
        // Remove any existing onsubmit
        form.onsubmit = null;
        
        // Add submit event listener
        form.addEventListener('submit', async function(event) {
            event.preventDefault();
            
            // Get form elements
            const submitBtn = form.querySelector('button[type="submit"]');
            const originalText = submitBtn ? submitBtn.innerHTML : '';
            const loading = form.querySelector('.loading') || createLoadingElement(form);
            
            // Show loading state
            if (submitBtn) {
                submitBtn.disabled = true;
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Sending...';
            }
            if (loading) {
                loading.style.display = 'block';
            }
            
            try {
                // Prepare form data
                const formData = new FormData(form);
                
                // Add source
                const isHomepage = window.location.pathname === '/' || 
                                 window.location.pathname.includes('index');
                formData.append('source', isHomepage ? 'homepage' : 'contact_page');
                
                // Send request
                const response = await fetch('submit_contact.php', {
                    method: 'POST',
                    body: formData
                });
                
                const result = await response.json();
                
                // Reset button
                if (submitBtn) {
                    submitBtn.disabled = false;
                    submitBtn.innerHTML = originalText;
                }
                if (loading) {
                    loading.style.display = 'none';
                }
                
                // Show message
                showMessage(form, result.success, result.message);
                
                // Clear form on success
                if (result.success) {
                    form.reset();
                }
                
            } catch (error) {
                console.error('Form submission error:', error);
                
                // Reset button
                if (submitBtn) {
                    submitBtn.disabled = false;
                    submitBtn.innerHTML = originalText;
                }
                if (loading) {
                    loading.style.display = 'none';
                }
                
                // Show error
                showMessage(form, false, 'An error occurred. Please try again.');
            }
        });
    });
    
    // Helper functions
    function createLoadingElement(form) {
        const loading = document.createElement('div');
        loading.className = 'loading';
        loading.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Sending your message...';
        loading.style.display = 'none';
        loading.style.textAlign = 'center';
        loading.style.padding = '10px';
        loading.style.margin = '10px 0';
        loading.style.color = '#666';
        
        // Insert before submit button
        const submitBtn = form.querySelector('button[type="submit"]');
        if (submitBtn) {
            form.insertBefore(loading, submitBtn);
        } else {
            form.appendChild(loading);
        }
        
        return loading;
    }
    
    function showMessage(form, isSuccess, message) {
        // Remove existing message
        const existingMsg = form.querySelector('.form-message');
        if (existingMsg) {
            existingMsg.remove();
        }
        
        // Create message element
        const messageDiv = document.createElement('div');
        messageDiv.className = `form-message ${isSuccess ? 'success' : 'error'}`;
        messageDiv.innerHTML = message;
        messageDiv.style.padding = '15px';
        messageDiv.style.margin = '15px 0';
        messageDiv.style.borderRadius = '5px';
        messageDiv.style.textAlign = 'center';
        
        if (isSuccess) {
            messageDiv.style.backgroundColor = '#d4edda';
            messageDiv.style.color = '#155724';
            messageDiv.style.border = '1px solid #c3e6cb';
        } else {
            messageDiv.style.backgroundColor = '#f8d7da';
            messageDiv.style.color = '#721c24';
            messageDiv.style.border = '1px solid #f5c6cb';
        }
        
        // Insert at top of form
        form.insertBefore(messageDiv, form.firstChild);
        
        // Auto-remove after 10 seconds for success messages
        if (isSuccess) {
            setTimeout(() => {
                if (messageDiv.parentNode) {
                    messageDiv.style.opacity = '0';
                    messageDiv.style.transition = 'opacity 0.5s';
                    setTimeout(() => {
                        if (messageDiv.parentNode) {
                            messageDiv.remove();
                        }
                    }, 500);
                }
            }, 10000);
        }
        
        // Scroll to message
        messageDiv.scrollIntoView({ behavior: 'smooth', block: 'center' });
    }
});