<?php
// ============================================================
// Healthcare Resources - Header Include
// ============================================================

// Define base URL
$base_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'] . '/';

// Set default values if not defined
$page_title = $page_title ?? 'Healthcare Resources | MedLink Analytics';
$page_description = $page_description ?? 'Comprehensive healthcare resources including CPT codes, ICD-10 codes, and medical billing guides.';
$page_keywords = $page_keywords ?? 'healthcare resources, medical billing, CPT codes, ICD-10 codes';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($page_title); ?></title>
    <meta name="description" content="<?php echo htmlspecialchars($page_description); ?>">
    <meta name="keywords" content="<?php echo htmlspecialchars($page_keywords); ?>">
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1">
    <link rel="canonical" href="https://medlinkanalytics.com/healthcare-resources/">

    <!-- Open Graph -->
    <meta property="og:title" content="<?php echo htmlspecialchars($page_title); ?>">
    <meta property="og:description" content="<?php echo htmlspecialchars($page_description); ?>">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://medlinkanalytics.com/healthcare-resources/">
    <meta property="og:image" content="https://medlinkanalytics.com/assets/media/images/healthcare-resources-og.jpg">
    <meta property="og:site_name" content="MedLink Analytics">
    <meta property="og:locale" content="en_US">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@MedLinkAnalytics">
    <meta name="twitter:creator" content="@MedLinkAnalytics">
    <meta name="twitter:title" content="<?php echo htmlspecialchars($page_title); ?>">
    <meta name="twitter:description" content="<?php echo htmlspecialchars($page_description); ?>">
    <meta name="twitter:image" content="https://medlinkanalytics.com/assets/media/images/healthcare-resources-og.jpg">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="/favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="/favicon.svg" />
    <link rel="shortcut icon" href="/favicon.ico" />
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png" />
    <link rel="manifest" href="/site.webmanifest" />

    <!-- External CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo $base_url; ?>assets/css/style.css">
    <link rel="stylesheet" href="/healthcare-resources/assets/css/style.css">

    <!-- Company Schema -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Organization",
      "name": "MedLink Analytics LLC",
      "url": "https://medlinkanalytics.com",
      "logo": "https://medlinkanalytics.com/logo.png",
      "description": "Professional medical billing and healthcare analytics services designed to optimize revenue and reduce administrative burden.",
      "email": "contact@medlinkanalytics.com",
      "telephone": "+1-720-445-4634",
      "address": {
        "@type": "PostalAddress",
        "streetAddress": "1500 N Grant St STE 28340",
        "addressLocality": "Denver",
        "addressRegion": "CO",
        "postalCode": "80203",
        "addressCountry": "US"
      },
      "sameAs": [
        "https://www.linkedin.com/company/medlinkanalytics",
        "https://twitter.com/medlinkanalytics",
        "https://www.facebook.com/medlinkanalytics",
        "https://www.instagram.com/medlinkanalytics",
        "https://www.youtube.com/@medlinkanalytics",
        "https://wa.me/923165116612"
      ]
    }
    </script>

    <!-- Theme Toggle Script (Critical for initial load) -->
    <script>
        // Immediately check and apply theme preference
        (function() {
            try {
                const savedTheme = localStorage.getItem('healthcare-theme');
                const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
                const theme = savedTheme || (prefersDark ? 'dark' : 'light');
                document.documentElement.setAttribute('data-theme', theme);
                
                // Also set a class on body for canvas background
                document.body.classList.add('theme-' + theme);
            } catch(e) {
                document.documentElement.setAttribute('data-theme', 'dark');
                document.body.classList.add('theme-dark');
            }
        })();
    </script>

    <!-- Main JS -->
    <script src="<?php echo $base_url; ?>assets/js/script.js" defer></script>
    <script src="/healthcare-resources/assets/js/main.js" defer></script>
</head>
<body>
    <!-- Canvas for particle effect - Theme aware -->
    <canvas id="particleCanvas"></canvas>
    <div id="canvasOverlay"></div>

    <style>
        #canvasOverlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
            pointer-events: none;
            transition: background-color 0.5s ease;
        }
        
        /* Dark theme overlay */
        [data-theme="dark"] #canvasOverlay {
            background: rgba(0, 0, 0, 0.57);
        }
        
        /* Light theme overlay - lighter for white background */
        [data-theme="light"] #canvasOverlay {
            background: rgba(255, 255, 255, 0.85);
        }
        
        header {
            z-index: 1000;
        }
        
        section, .hero {
            position: relative;
            z-index: 10;
        }

        /* Canvas background colors based on theme */
        #particleCanvas {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 0;
        }

        [data-theme="dark"] #particleCanvas {
            background: #0a0a1a;
        }

        [data-theme="light"] #particleCanvas {
            background: #f5f7fa;
        }
    </style>

    <!-- ============================================================ -->
    <!-- Site Header - Matching Main Website Style -->
    <!-- ============================================================ -->
    <header>
        <nav>
            <a href="<?php echo $base_url; ?>">
                <img src="<?php echo $base_url; ?>assets/media/images/logo-light-medlink.png" alt="MedLink Analytics" class="logo-img">
            </a>
            
            <!-- Mobile Menu Button -->
            <button class="mobile-menu-btn" onclick="toggleMenu()" aria-label="Toggle navigation menu">
                <i class="fas fa-bars"></i>
            </button>

            <!-- Navigation Links -->
            <ul class="nav-links" id="navLinks">
                <li><a href="<?php echo $base_url; ?>" onclick="closeMenu()">Home</a></li>
                <li><a href="<?php echo $base_url; ?>services" onclick="closeMenu()">Services</a></li>
                <li><a href="<?php echo $base_url; ?>#why-us" onclick="closeMenu()">Why Us</a></li>
                <li><a href="<?php echo $base_url; ?>about" onclick="closeMenu()">About</a></li>
                <li><a href="<?php echo $base_url; ?>contact" onclick="closeMenu()">Contact</a></li>
                <li><a href="<?php echo $base_url; ?>blog" onclick="closeMenu()">Blog</a></li>
                <!-- Theme Switch -->
                <li class="theme-switch-nav">
                    <button class="theme-switch" id="themeSwitch" 
                            role="switch" 
                            aria-checked="false"
                            aria-label="Toggle dark/light theme"
                            onclick="toggleTheme()">
                        <span class="icon icon-sun">☀️</span>
                        <span class="icon icon-moon">🌙</span>
                    </button>
                </li>
            </ul>
        </nav>
    </header>

    <!-- ============================================================ -->
    <!-- Breadcrumb Navigation -->
    <!-- ============================================================ -->
    <nav class="breadcrumb-nav" aria-label="Breadcrumb">
        <div class="container">
            <ol>
                <li><a href="<?php echo $base_url; ?>">Home</a></li>
                <li><a href="<?php echo $base_url; ?>healthcare-resources/">Healthcare Resources</a></li>
                <?php if (isset($breadcrumb_current) && $breadcrumb_current): ?>
                <li aria-current="page"><?php echo htmlspecialchars($breadcrumb_current); ?></li>
                <?php else: ?>
                <li aria-current="page">Resources</li>
                <?php endif; ?>
            </ol>
        </div>
    </nav>

    <!-- ============================================================ -->
    <!-- Theme Toggle JavaScript -->
    <!-- ============================================================ -->
    <script>
        function toggleTheme() {
            const html = document.documentElement;
            const currentTheme = html.getAttribute('data-theme');
            const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
            
            html.setAttribute('data-theme', newTheme);
            localStorage.setItem('healthcare-theme', newTheme);
            
            // Update body class for canvas
            document.body.classList.remove('theme-dark', 'theme-light');
            document.body.classList.add('theme-' + newTheme);
            
            // Update aria-checked for accessibility
            const switchBtn = document.getElementById('themeSwitch');
            if (switchBtn) {
                switchBtn.setAttribute('aria-checked', newTheme === 'light' ? 'true' : 'false');
                switchBtn.classList.toggle('active', newTheme === 'light');
            }
        }

        // Update the switch UI on load
        document.addEventListener('DOMContentLoaded', function() {
            const html = document.documentElement;
            const currentTheme = html.getAttribute('data-theme');
            const switchBtn = document.getElementById('themeSwitch');
            
            if (switchBtn) {
                switchBtn.classList.toggle('active', currentTheme === 'light');
                switchBtn.setAttribute('aria-checked', currentTheme === 'light' ? 'true' : 'false');
            }
        });
    </script>