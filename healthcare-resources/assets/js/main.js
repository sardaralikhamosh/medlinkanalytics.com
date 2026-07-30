// ============================================================
// Healthcare Resources - Main JavaScript
// ============================================================

(function() {
    'use strict';

    // ---------- Theme Management ----------
    const themeSwitch = document.getElementById('themeSwitch');
    const html = document.documentElement;

    // Function to set theme
    function setTheme(theme) {
        html.setAttribute('data-theme', theme);
        localStorage.setItem('healthcare-theme', theme);
        
        if (themeSwitch) {
            themeSwitch.classList.toggle('active', theme === 'light');
            themeSwitch.setAttribute('aria-checked', theme === 'light');
        }
    }

    // Initialize theme from localStorage or system preference
    function initTheme() {
        const savedTheme = localStorage.getItem('healthcare-theme');
        const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
        const theme = savedTheme || (prefersDark ? 'dark' : 'light');
        setTheme(theme);
    }

    // Toggle theme function (global for onclick)
    window.toggleTheme = function() {
        const currentTheme = html.getAttribute('data-theme');
        const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
        setTheme(newTheme);
    };

    // Initialize on load
    initTheme();

    // ---------- FAQ Accordion ----------
    // Ensure FAQ items work properly with the details/summary pattern
    document.querySelectorAll('.faq-item').forEach(function(item) {
        item.addEventListener('toggle', function() {
            // Smooth scroll to the opened FAQ item
            if (this.open) {
                setTimeout(function() {
                    this.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
                }.bind(this), 100);
            }
        });
    });

    // ---------- Keyboard Navigation ----------
    // Allow Enter/Space keys to trigger theme toggle
    if (themeSwitch) {
        themeSwitch.addEventListener('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                window.toggleTheme();
            }
        });
    }

    // ---------- Console Info ----------
    console.log('📚 Healthcare Resources loaded successfully!');
    console.log('🌓 Theme: ' + html.getAttribute('data-theme'));

})();