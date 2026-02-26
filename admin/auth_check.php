<?php
/**
 * MedLink Analytics - HTTP Basic Auth Session Handler
 * This version works WITH .htaccess HTTP Basic Auth
 * No separate login page needed
 */

session_start();

// Since HTTP Basic Auth is already protecting the directory,
// we just need to track the session for timeout purposes

// Configuration
define('SESSION_TIMEOUT', 1800); // 30 minutes

// Initialize session if this is a new access
if (!isset($_SESSION['auth_initialized'])) {
    $_SESSION['auth_initialized'] = true;
    $_SESSION['last_activity'] = time();
    
    // Get username from HTTP Basic Auth
    if (isset($_SERVER['PHP_AUTH_USER'])) {
        $_SESSION['admin_username'] = $_SERVER['PHP_AUTH_USER'];
    } else {
        $_SESSION['admin_username'] = 'admin';
    }
}

// Check session timeout
if (isset($_SESSION['last_activity'])) {
    $inactive_time = time() - $_SESSION['last_activity'];
    
    if ($inactive_time > SESSION_TIMEOUT) {
        // Session has expired - clear session and force re-authentication
        session_unset();
        session_destroy();
        
        // Since we're using HTTP Basic Auth, we need to force browser to re-authenticate
        header('HTTP/1.1 401 Unauthorized');
        echo '<html><body><h1>Session Expired</h1>';
        echo '<p>Your session has expired due to inactivity.</p>';
        echo '<p><a href="' . $_SERVER['PHP_SELF'] . '">Click here to login again</a></p>';
        echo '</body></html>';
        exit;
    }
}

// Update last activity time
$_SESSION['last_activity'] = time();

// Regenerate session ID periodically (every 10 minutes) for security
if (!isset($_SESSION['session_created'])) {
    $_SESSION['session_created'] = time();
} else if (time() - $_SESSION['session_created'] > 600) {
    session_regenerate_id(true);
    $_SESSION['session_created'] = time();
}

// Function to get logged in username
function getLoggedInUser() {
    if (isset($_SESSION['admin_username'])) {
        return $_SESSION['admin_username'];
    }
    return 'Unknown User';
}

// Function to get idle time
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
    session_unset();
    session_destroy();
    
    // For HTTP Basic Auth, we need to send 401 to force re-authentication
    header('HTTP/1.1 401 Unauthorized');
    header('WWW-Authenticate: Basic realm="MedLink Analytics Admin Area"');
    echo '<html><body><h1>Logged Out</h1>';
    echo '<p>You have been successfully logged out.</p>';
    echo '<p><a href="/admin/">Click here to login again</a></p>';
    echo '</body></html>';
    exit;
}
?>
