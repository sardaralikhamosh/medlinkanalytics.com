// ============================================================
// Medical Billing Sub-Pages - Global JavaScript
// ============================================================

(function() {
    'use strict';

    // ---------- Smooth Scroll for Anchor Links ----------
    document.addEventListener('DOMContentLoaded', function() {
        const anchorLinks = document.querySelectorAll('a[href^="#"]');
        anchorLinks.forEach(function(anchor) {
            anchor.addEventListener('click', function(e) {
                const targetId = this.getAttribute('href');
                if (targetId && targetId !== '#') {
                    const target = document.querySelector(targetId);
                    if (target) {
                        e.preventDefault();
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                }
            });
        });
    });

    // ---------- FAQ Accordion Enhancement ----------
    document.addEventListener('DOMContentLoaded', function() {
        const faqItems = document.querySelectorAll('.faq-item');
        faqItems.forEach(function(item) {
            item.addEventListener('toggle', function() {
                if (this.open) {
                    // Smooth scroll to the opened FAQ item
                    setTimeout(function() {
                        this.scrollIntoView({
                            behavior: 'smooth',
                            block: 'nearest'
                        });
                    }.bind(this), 100);
                }
            });
        });
    });

    // ---------- Console Info ----------
    console.log('📋 Medical Billing page loaded successfully!');

})();