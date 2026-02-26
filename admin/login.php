<?php
/**
 * MedLink Analytics - Admin Login Page
 * Secure authentication for admin area
 */

session_start();

// Configuration
define('ADMIN_USERNAME', 'admin');
define('ADMIN_PASSWORD', password_hash('MedLink@2026!Secure', PASSWORD_BCRYPT));
define('ADMIN_USERNAME', 'admin');
define('ADMIN_PASSWORD', password_hash('Yasin14@555admin', PASSWORD_BCRYPT));

// Check if user is already logged in
if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
    // Check session timeout
    if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > SESSION_TIMEOUT)) {
        session_unset();
        session_destroy();
        header('Location: login.php?timeout=1');
        exit;
    }
    $_SESSION['last_activity'] = time();
    header('Location: index.php');
    exit;
}

// Handle login
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    
    // Simple brute force protection
    if (!isset($_SESSION['login_attempts'])) {
        $_SESSION['login_attempts'] = 0;
        $_SESSION['last_attempt_time'] = time();
    }
    
    // Reset attempts after 15 minutes
    if (time() - $_SESSION['last_attempt_time'] > 900) {
        $_SESSION['login_attempts'] = 0;
    }
    
    // Check if too many attempts
    if ($_SESSION['login_attempts'] >= 5) {
        $wait_time = 900 - (time() - $_SESSION['last_attempt_time']);
        if ($wait_time > 0) {
            $error = "Too many login attempts. Please wait " . ceil($wait_time / 60) . " minutes.";
        } else {
            $_SESSION['login_attempts'] = 0;
        }
    }
    
    if (empty($error)) {
        // Verify credentials
        if ($username === ADMIN_USERNAME && password_verify($password, ADMIN_PASSWORD)) {
            $_SESSION['admin_logged_in'] = true;
            $_SESSION['admin_username'] = $username;
            $_SESSION['last_activity'] = time();
            $_SESSION['login_attempts'] = 0;
            
            // Log successful login
            error_log("Admin login successful: " . $username . " at " . date('Y-m-d H:i:s'));
            
            header('Location: index.php');
            exit;
        } else {
            $_SESSION['login_attempts']++;
            $_SESSION['last_attempt_time'] = time();
            $error = "Invalid username or password.";
            
            // Log failed login attempt
            error_log("Failed admin login attempt: " . $username . " at " . date('Y-m-d H:i:s'));
        }
    }
}

$timeout_message = isset($_GET['timeout']) ? 'Your session has expired. Please login again.' : '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <title>Admin Login - MedLink Analytics</title>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'IBM Plex Sans', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
        }

        .login-container {
            background: white;
            border-radius: 16px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            max-width: 450px;
            width: 100%;
            overflow: hidden;
            animation: slideUp 0.6s ease-out;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .login-header {
            background: linear-gradient(135deg, #0066cc 0%, #004d99 100%);
            color: white;
            padding: 2rem;
            text-align: center;
        }

        .login-header h1 {
            font-size: 1.75rem;
            margin-bottom: 0.5rem;
        }

        .login-header p {
            font-size: 0.95rem;
            opacity: 0.9;
        }

        .login-body {
            padding: 2rem;
        }

        .alert {
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 1.5rem;
            font-size: 0.9rem;
        }

        .alert-error {
            background: #fee;
            border: 1px solid #fcc;
            color: #c33;
        }

        .alert-warning {
            background: #ffeaa7;
            border: 1px solid #fdcb6e;
            color: #d63031;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: #333;
            font-size: 0.95rem;
        }

        .form-group input {
            width: 100%;
            padding: 0.875rem;
            border: 2px solid #e1e8ed;
            border-radius: 8px;
            font-family: 'IBM Plex Sans', sans-serif;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .form-group input:focus {
            outline: none;
            border-color: #0066cc;
            box-shadow: 0 0 0 3px rgba(0, 102, 204, 0.1);
        }

        .btn-login {
            width: 100%;
            padding: 1rem;
            background: linear-gradient(135deg, #0066cc 0%, #004d99 100%);
            color: white;
            border: none;
            border-radius: 8px;
            font-family: 'IBM Plex Sans', sans-serif;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(0, 102, 204, 0.4);
        }

        .btn-login:active {
            transform: translateY(0);
        }

        .login-footer {
            text-align: center;
            padding: 1.5rem 2rem;
            background: #f8f9fc;
            border-top: 1px solid #e1e8ed;
            font-size: 0.85rem;
            color: #666;
        }

        .security-notice {
            margin-top: 1rem;
            padding: 0.75rem;
            background: #e8f4f8;
            border-left: 3px solid #0066cc;
            border-radius: 4px;
            font-size: 0.85rem;
            color: #004d99;
        }

        .lock-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-header">
            <div class="lock-icon">🔐</div>
            <h1>MedLink Analytics</h1>
            <p>Secure Admin Access</p>
        </div>

        <div class="login-body">
            <?php if ($timeout_message): ?>
                <div class="alert alert-warning">
                    ⚠️ <?php echo htmlspecialchars($timeout_message); ?>
                </div>
            <?php endif; ?>

            <?php if ($error): ?>
                <div class="alert alert-error">
                    ❌ <?php echo htmlspecialchars($error); ?>
                    <?php if (isset($_SESSION['login_attempts']) && $_SESSION['login_attempts'] > 0): ?>
                        <br><small>Attempts: <?php echo $_SESSION['login_attempts']; ?>/5</small>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <form method="POST" action="">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input 
                        type="text" 
                        id="username" 
                        name="username" 
                        required 
                        autocomplete="username"
                        value="<?php echo htmlspecialchars($_POST['username'] ?? ''); ?>"
                    >
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input 
                        type="password" 
                        id="password" 
                        name="password" 
                        required 
                        autocomplete="current-password"
                    >
                </div>

                <button type="submit" class="btn-login">
                    🔓 Login to Admin Panel
                </button>
            </form>

            <div class="security-notice">
                <strong>🛡️ Security Notice:</strong> This area is restricted to authorized personnel only. 
                All access attempts are logged and monitored.
            </div>
        </div>

        <div class="login-footer">
            © 2026 MedLink Analytics. All rights reserved.<br>
            <small>Protected by SSL encryption</small>
        </div>
    </div>

    <script>
        // Clear password field on page load for security
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('password').value = '';
        });

        // Auto-focus on username field
        document.getElementById('username').focus();
    </script>
</body>
</html>
