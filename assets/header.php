<?php
// Define base URL
$base_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'] . '/';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MedLink Analytics - Professional Medical Billing Services</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $base_url; ?>assets/css/style.css">
    <meta name="p:domain_verify" content="491f4fd6c5d21e0bf61b0fc769f344c1"/>
    <!--below is for favicon icons-->
        <link rel="icon" type="image/png" href="/favicon-96x96.png" sizes="96x96" />
        <link rel="icon" type="image/svg+xml" href="/favicon.svg" />
        <link rel="shortcut icon" href="/favicon.ico" />
        <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png" />
        <link rel="manifest" href="/site.webmanifest" />
    <!--favicon ends -->
    <!--company informations for indexing-->
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

    <!--company info ends-->
   <!-- In header.php -->
    <script src="<?php echo $base_url; ?>assets/js/script.js" defer></script>
     <!-- Only include on contact and home pages -->
    <?php 
    $current_page = basename($_SERVER['PHP_SELF']);
    $is_form_page = in_array($current_page, ['contact/index.php', 'index.php', 'home.php']);
    
    if ($is_form_page): ?>
    <script>
        // Global configuration
        const SITE_CONFIG = {
            baseUrl: '<?php echo $base_url; ?>',
            isContactPage: <?php echo ($current_page === 'contact.php') ? 'true' : 'false'; ?>
        };
    </script>
    <?php endif; ?>
</head>
<body>
    <canvas id="particleCanvas"></canvas>
    <div id="canvasOverlay"></div> <!-- Add this line -->

<style>
    #canvasOverlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.57); /* Adjust opacity as needed */
        z-index: 1;
        pointer-events: none;
    }
    
    /* Update z-indexes to ensure content stays above overlay */
    header {
        z-index: 1000;
    }
    
    section, .hero {
        position: relative;
        z-index: 10;
    }
</style>

<header>
        <nav>
            <a href="<?php echo $base_url; ?>">
                <img src="<?php echo $base_url; ?>assets/media/images/logo-light-medlink.png" alt="MedLink Analytics" class="logo-img">
            </a>
            <button class="mobile-menu-btn" onclick="toggleMenu()">
                <i class="fas fa-bars"></i>
            </button>
            <ul class="nav-links" id="navLinks">
                <li><a href="<?php echo $base_url; ?>" onclick="closeMenu()">Home</a></li>
                <li><a href="<?php echo $base_url; ?>#services" onclick="closeMenu()">Services</a></li>
                <li><a href="<?php echo $base_url; ?>#why-us" onclick="closeMenu()">Why Us</a></li>
                <li><a href="<?php echo $base_url; ?>#about" onclick="closeMenu()">About</a></li>
                <li><a href="<?php echo $base_url; ?>#contact" onclick="closeMenu()">Contact</a></li>
            </ul>
        </nav>
    </header>