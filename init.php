<?php
// init.php - Fixed version
session_start();

// Include configuration first
require_once 'config.php';

// Set timezone
date_default_timezone_set('America/Denver'); // MST timezone

// Security headers
header("X-Frame-Options: SAMEORIGIN");
header("X-Content-Type-Options: nosniff");
header("X-XSS-Protection: 1; mode=block");
?>