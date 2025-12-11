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
   
</head>
<body>
    <canvas id="particleCanvas"></canvas>

<header>
        <nav>
            <a href="#home">
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