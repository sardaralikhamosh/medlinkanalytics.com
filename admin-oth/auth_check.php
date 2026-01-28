<?php
/**
 * MedLink Analytics - Authentication Check
 * Include this file at the top of every admin page to ensure user is logged in
 * 
 * Usage: require_once 'auth_check.php';
 */

session_start();

// Configuration
define('SESSION_TIMEOUT', 1800); // 30 minutes
define('LOGIN_PAGE', 'login.php');

// Check if user is logged in
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    // User is not logged in, redirect to login page
    header('Location: ' . LOGIN_PAGE);
    exit;
}

// Check session timeout
if (isset($_SESSION['last_activity'])) {
    $inactive_time = time() - $_SESSION['last_activity'];
    
    if ($inactive_time > SESSION_TIMEOUT) {
        // Session has expired
        session_unset();
        session_destroy();
        header('Location: ' . LOGIN_PAGE . '?timeout=1');
        exit;
    }
}

// Update last activity time
$_SESSION['last_activity'] = time();

// Security: Regenerate session ID periodically (every 10 minutes)
if (!isset($_SESSION['session_created'])) {
    $_SESSION['session_created'] = time();
} else if (time() - $_SESSION['session_created'] > 600) {
    // Regenerate session ID
    session_regenerate_id(true);
    $_SESSION['session_created'] = time();
}

// Function to logout user
function logout() {
    session_unset();
    session_destroy();
    header('Location: ' . LOGIN_PAGE);
    exit;
}

// Function to get logged in username
function getLoggedInUser() {
    return $_SESSION['admin_username'] ?? 'Unknown';
}

// Function to check if user has been idle
function getIdleTime() {
    if (isset($_SESSION['last_activity'])) {
        return time() - $_SESSION['last_activity'];
    }
    return 0;
}

// Function to get remaining session time
function getRemainingSessionTime() {
    $idle_time = getIdleTime();
    $remaining = SESSION_TIMEOUT - $idle_time;
    return max(0, $remaining);
}

// Handle logout request
if (isset($_GET['logout'])) {
    logout();
}
?>
