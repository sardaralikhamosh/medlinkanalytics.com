<?php
/**
 * Protected Salary Slip Page - Example
 * This shows how to protect your salary-slip.php file
 */

// IMPORTANT: Add this line at the very top of your file
require_once 'auth_check.php';

// Now your page is protected!
// Only logged-in users can access this page

// Optional: Get logged-in user info
$logged_in_user = getLoggedInUser();
$remaining_time = getRemainingSessionTime();
$remaining_minutes = floor($remaining_time / 60);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <title>Salary Slip - Protected - MedLink Analytics</title>
    <style>
        .admin-bar {
            background: #004d99;
            color: white;
            padding: 0.75rem 1.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-family: Arial, sans-serif;
            font-size: 0.9rem;
        }
        .admin-bar a {
            color: white;
            text-decoration: none;
            padding: 0.5rem 1rem;
            background: rgba(255,255,255,0.2);
            border-radius: 4px;
            transition: all 0.3s;
        }
        .admin-bar a:hover {
            background: rgba(255,255,255,0.3);
        }
        .session-info {
            font-size: 0.85rem;
            opacity: 0.9;
        }
    </style>
</head>
<body>
    <!-- Admin Bar (shows user is logged in) -->
    <div class="admin-bar">
        <div>
            <strong>🔐 Protected Area</strong> | 
            Logged in as: <strong><?php echo htmlspecialchars($logged_in_user); ?></strong>
        </div>
        <div class="session-info">
            Session expires in: <?php echo $remaining_minutes; ?> minutes | 
            <a href="?logout=1">Logout</a>
        </div>
    </div>

    <!-- Your existing salary slip content goes here -->
    <!-- Copy your entire salary slip HTML below this line -->
    
    <div style="padding: 2rem; text-align: center;">
        <h1>🎉 Access Granted!</h1>
        <p>This page is now protected. Only authenticated users can view this content.</p>
        <br>
        <p><strong>Insert your salary slip HTML/content here</strong></p>
    </div>

</body>
</html>
