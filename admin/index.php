<?php
/**
 * MedLink Analytics - Admin Dashboard
 * Main admin panel with navigation to all tools and resources
 */

// Include authentication check
require_once 'auth_check.php';

// Get user info
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
    <title>Admin Dashboard - MedLink Analytics</title>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=Fira+Code:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary: #0066ff;
            --primary-dark: #0052cc;
            --primary-light: #3385ff;
            --secondary: #00d4aa;
            --accent: #ff6b6b;
            --warning: #ffa500;
            --success: #00d4aa;
            --bg-dark: #0a0e1a;
            --bg-medium: #131729;
            --bg-light: #1a1f35;
            --bg-card: #1e2337;
            --text-primary: #ffffff;
            --text-secondary: #a8b3cf;
            --border: #2a3247;
            --shadow: rgba(0, 102, 255, 0.1);
        }

        body {
            font-family: 'Outfit', sans-serif;
            background: var(--bg-dark);
            color: var(--text-primary);
            min-height: 100vh;
            line-height: 1.6;
            overflow-x: hidden;
        }

        /* Animated background */
        .bg-animation {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 0;
            overflow: hidden;
            pointer-events: none;
        }

        .bg-animation::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -20%;
            width: 800px;
            height: 800px;
            background: radial-gradient(circle, rgba(0, 102, 255, 0.15) 0%, transparent 70%);
            border-radius: 50%;
            animation: float 20s ease-in-out infinite;
        }

        .bg-animation::after {
            content: '';
            position: absolute;
            bottom: -30%;
            left: -10%;
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, rgba(0, 212, 170, 0.1) 0%, transparent 70%);
            border-radius: 50%;
            animation: float 15s ease-in-out infinite reverse;
        }

        @keyframes float {
            0%, 100% { transform: translate(0, 0) rotate(0deg); }
            33% { transform: translate(30px, -30px) rotate(120deg); }
            66% { transform: translate(-20px, 20px) rotate(240deg); }
        }

        /* Grid overlay */
        .grid-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: 
                linear-gradient(rgba(42, 50, 71, 0.3) 1px, transparent 1px),
                linear-gradient(90deg, rgba(42, 50, 71, 0.3) 1px, transparent 1px);
            background-size: 50px 50px;
            z-index: 0;
            pointer-events: none;
            opacity: 0.5;
        }

        /* Container */
        .container {
            position: relative;
            z-index: 1;
            max-width: 1400px;
            margin: 0 auto;
            padding: 2rem;
        }

        /* Header */
        .header {
            background: var(--bg-card);
            border: 1px solid var(--border);
            border-radius: 20px;
            padding: 1.5rem 2rem;
            margin-bottom: 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            backdrop-filter: blur(10px);
            animation: slideDown 0.6s ease-out;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3);
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .header-left {
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }

        .logo {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            font-weight: 800;
            color: white;
            box-shadow: 0 5px 15px rgba(0, 102, 255, 0.3);
        }

        .header-title h1 {
            font-size: 1.5rem;
            font-weight: 700;
            background: linear-gradient(135deg, var(--primary-light), var(--secondary));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .header-title p {
            font-size: 0.9rem;
            color: var(--text-secondary);
            margin-top: 0.25rem;
        }

        .header-right {
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }

        .user-info {
            text-align: right;
        }

        .user-name {
            font-weight: 600;
            color: var(--text-primary);
            display: flex;
            align-items: center;
            gap: 0.5rem;
            justify-content: flex-end;
        }

        .user-badge {
            display: inline-block;
            padding: 0.25rem 0.75rem;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
        }

        .session-time {
            font-size: 0.85rem;
            color: var(--text-secondary);
            font-family: 'Fira Code', monospace;
            margin-top: 0.25rem;
        }

        .logout-btn {
            padding: 0.75rem 1.5rem;
            background: rgba(255, 107, 107, 0.1);
            border: 1px solid rgba(255, 107, 107, 0.3);
            color: var(--accent);
            border-radius: 10px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .logout-btn:hover {
            background: var(--accent);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 5px 20px rgba(255, 107, 107, 0.3);
        }

        /* Welcome Section */
        .welcome {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            border-radius: 20px;
            padding: 3rem;
            margin-bottom: 2rem;
            position: relative;
            overflow: hidden;
            animation: fadeIn 0.8s ease-out 0.2s both;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: scale(0.95);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        .welcome::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -10%;
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
            border-radius: 50%;
        }

        .welcome-content {
            position: relative;
            z-index: 1;
        }

        .welcome h2 {
            font-size: 2.5rem;
            font-weight: 800;
            margin-bottom: 0.5rem;
            letter-spacing: -0.5px;
        }

        .welcome p {
            font-size: 1.1rem;
            opacity: 0.9;
            margin-bottom: 2rem;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1.5rem;
        }

        .stat-card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 12px;
            padding: 1.5rem;
            transition: all 0.3s ease;
        }

        .stat-card:hover {
            background: rgba(255, 255, 255, 0.15);
            transform: translateY(-3px);
        }

        .stat-label {
            font-size: 0.85rem;
            opacity: 0.8;
            margin-bottom: 0.5rem;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .stat-value {
            font-size: 2rem;
            font-weight: 700;
            font-family: 'Fira Code', monospace;
        }

        /* Quick Links Section */
        .section-title {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            color: var(--text-primary);
            animation: slideRight 0.6s ease-out 0.4s both;
        }

        @keyframes slideRight {
            from {
                opacity: 0;
                transform: translateX(-30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .section-title::before {
            content: '';
            width: 4px;
            height: 30px;
            background: linear-gradient(to bottom, var(--primary), var(--secondary));
            border-radius: 2px;
        }

        /* Cards Grid */
        .cards-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .card {
            background: var(--bg-card);
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 2rem;
            position: relative;
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            cursor: pointer;
            text-decoration: none;
            display: block;
            animation: scaleIn 0.5s ease-out both;
        }

        .card:nth-child(1) { animation-delay: 0.5s; }
        .card:nth-child(2) { animation-delay: 0.6s; }
        .card:nth-child(3) { animation-delay: 0.7s; }
        .card:nth-child(4) { animation-delay: 0.8s; }
        .card:nth-child(5) { animation-delay: 0.9s; }
        .card:nth-child(6) { animation-delay: 1s; }

        @keyframes scaleIn {
            from {
                opacity: 0;
                transform: scale(0.9);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        .card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            opacity: 0;
            transition: opacity 0.4s ease;
        }

        .card:hover::before {
            opacity: 0.05;
        }

        .card:hover {
            transform: translateY(-8px);
            border-color: var(--primary);
            box-shadow: 0 20px 60px rgba(0, 102, 255, 0.2);
        }

        .card-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, var(--primary), var(--primary-light));
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.8rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 5px 20px rgba(0, 102, 255, 0.3);
            transition: all 0.4s ease;
        }

        .card:hover .card-icon {
            transform: scale(1.1) rotate(5deg);
            box-shadow: 0 10px 30px rgba(0, 102, 255, 0.5);
        }

        .card-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 0.75rem;
            position: relative;
            z-index: 1;
        }

        .card-description {
            font-size: 0.95rem;
            color: var(--text-secondary);
            line-height: 1.6;
            margin-bottom: 1rem;
            position: relative;
            z-index: 1;
        }

        .card-link {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--primary-light);
            font-weight: 600;
            font-size: 0.9rem;
            transition: all 0.3s ease;
            position: relative;
            z-index: 1;
        }

        .card:hover .card-link {
            gap: 0.75rem;
            color: var(--secondary);
        }

        .card-badge {
            position: absolute;
            top: 1rem;
            right: 1rem;
            padding: 0.4rem 0.8rem;
            background: rgba(0, 212, 170, 0.15);
            border: 1px solid rgba(0, 212, 170, 0.3);
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
            color: var(--secondary);
            z-index: 1;
        }

        /* Specific card colors */
        .card.salary .card-icon {
            background: linear-gradient(135deg, #00d4aa, #00b894);
        }

        .card.credentialing .card-icon {
            background: linear-gradient(135deg, #6c5ce7, #a29bfe);
        }

        .card.billing .card-icon {
            background: linear-gradient(135deg, #fd79a8, #fdcb6e);
        }

        .card.reports .card-icon {
            background: linear-gradient(135deg, #00b894, #00cec9);
        }

        .card.settings .card-icon {
            background: linear-gradient(135deg, #636e72, #b2bec3);
        }

        .card.help .card-icon {
            background: linear-gradient(135deg, #0984e3, #74b9ff);
        }

        /* Footer */
        .footer {
            text-align: center;
            padding: 2rem;
            color: var(--text-secondary);
            font-size: 0.9rem;
            border-top: 1px solid var(--border);
            margin-top: 3rem;
        }

        .footer p {
            margin-bottom: 0.5rem;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .container {
                padding: 1rem;
            }

            .header {
                flex-direction: column;
                gap: 1rem;
                text-align: center;
            }

            .header-left,
            .header-right {
                flex-direction: column;
                width: 100%;
            }

            .user-info {
                text-align: center;
            }

            .user-name {
                justify-content: center;
            }

            .welcome {
                padding: 2rem;
            }

            .welcome h2 {
                font-size: 2rem;
            }

            .cards-grid {
                grid-template-columns: 1fr;
            }
        }

        /* Loading Animation */
        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.5; }
        }

        /* Scroll Animation */
        .scroll-hint {
            position: fixed;
            bottom: 2rem;
            right: 2rem;
            width: 50px;
            height: 50px;
            background: var(--bg-card);
            border: 1px solid var(--border);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            animation: bounce 2s ease-in-out infinite;
            cursor: pointer;
            transition: all 0.3s ease;
            z-index: 100;
        }

        .scroll-hint:hover {
            background: var(--primary);
            transform: scale(1.1);
        }

        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }
    </style>
</head>
<body>
    <div class="bg-animation"></div>
    <div class="grid-overlay"></div>

    <div class="container">
        <!-- Header -->
        <header class="header">
            <div class="header-left">
                <div class="logo">ML</div>
                <div class="header-title">
                    <h1>MedLink Analytics</h1>
                    <p>Admin Control Panel</p>
                </div>
            </div>
            <div class="header-right">
                <div class="user-info">
                    <div class="user-name">
                        <span>👤 <?php echo htmlspecialchars($logged_in_user); ?></span>
                        <span class="user-badge">Admin</span>
                    </div>
                    <div class="session-time">
                        ⏱️ Session: <?php echo $remaining_minutes; ?> min remaining
                    </div>
                </div>
                <a href="?logout=1" class="logout-btn">
                    <span>🚪</span>
                    <span>Logout</span>
                </a>
            </div>
        </header>

        <!-- Welcome Section -->
        <section class="welcome">
            <div class="welcome-content">
                <h2>Welcome Back! 👋</h2>
                <p>Manage your medical billing operations, salary slips, and credentialing from one central dashboard.</p>
                
                <div class="stats-grid">
                    <div class="stat-card">
                        <div class="stat-label">Active Tools</div>
                        <div class="stat-value">6</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-label">Quick Access</div>
                        <div class="stat-value">24/7</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-label">Secure Login</div>
                        <div class="stat-value">✓</div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Quick Links Section -->
        <h2 class="section-title">📊 Quick Access Tools</h2>
        
        <div class="cards-grid">
            <!-- Salary Slip Card -->
            <a href="salary-slip" class="card salary">
                <span class="card-badge">Popular</span>
                <div class="card-icon">💰</div>
                <h3 class="card-title">Salary Slip Generator</h3>
                <p class="card-description">
                    Create and manage professional salary slips with dynamic employee data and automatic calculations.
                </p>
                <span class="card-link">
                    Open Tool
                    <span>→</span>
                </span>
            </a>

            <!-- Credentialing Checklist -->
            <a href="credentialing-checklist-form" class="card credentialing">
                <span class="card-badge">Essential</span>
                <div class="card-icon">📋</div>
                <h3 class="card-title">Credentialing Checklist</h3>
                <p class="card-description">
                    Complete credentialing verification checklist for healthcare providers and facilities.
                </p>
                <span class="card-link">
                    Open Form
                    <span>→</span>
                </span>
            </a>

            <!-- Provider Billing Data -->
            <a href="provider-billing-data-form" class="card billing">
                <span class="card-badge">Data Entry</span>
                <div class="card-icon">📊</div>
                <h3 class="card-title">Provider Billing Data</h3>
                <p class="card-description">
                    Manage provider billing information, rates, and payment data for accurate processing.
                </p>
                <span class="card-link">
                    Enter Data
                    <span>→</span>
                </span>
            </a>

            <!-- Reports & Analytics -->
            <a href="reports" class="card reports">
                <div class="card-icon">📈</div>
                <h3 class="card-title">Reports & Analytics</h3>
                <p class="card-description">
                    View comprehensive reports, analytics, and insights on billing performance.
                </p>
                <span class="card-link">
                    View Reports
                    <span>→</span>
                </span>
            </a>

            <!-- Settings -->
            <a href="settings" class="card settings">
                <div class="card-icon">⚙️</div>
                <h3 class="card-title">Settings & Configuration</h3>
                <p class="card-description">
                    Configure system settings, user permissions, and customize dashboard preferences.
                </p>
                <span class="card-link">
                    Manage Settings
                    <span>→</span>
                </span>
            </a>

            <!-- Help & Support -->
            <a href="help" class="card help">
                <div class="card-icon">💡</div>
                <h3 class="card-title">Help & Support</h3>
                <p class="card-description">
                    Access documentation, tutorials, and get support for any questions or issues.
                </p>
                <span class="card-link">
                    Get Help
                    <span>→</span>
                </span>
            </a>
        </div>

        <!-- Footer -->
        <footer class="footer">
            <p><strong>MedLink Analytics</strong> - Professional Medical Billing Solutions</p>
            <p>© <?php echo date('Y'); ?> MedLink Analytics. All rights reserved. | Protected Area</p>
        </footer>
    </div>

    <!-- Scroll to Top Button -->
    <div class="scroll-hint" onclick="window.scrollTo({top: 0, behavior: 'smooth'})" title="Scroll to top">
        ↑
    </div>

    <script>
        // Auto-hide scroll hint when at top
        window.addEventListener('scroll', function() {
            const scrollHint = document.querySelector('.scroll-hint');
            if (window.scrollY < 100) {
                scrollHint.style.opacity = '0';
                scrollHint.style.pointerEvents = 'none';
            } else {
                scrollHint.style.opacity = '1';
                scrollHint.style.pointerEvents = 'auto';
            }
        });

        // Session timeout warning
        const remainingMinutes = <?php echo $remaining_minutes; ?>;
        if (remainingMinutes <= 5) {
            console.warn('Session expiring soon! ' + remainingMinutes + ' minutes remaining.');
        }

        // Add subtle parallax effect
        document.addEventListener('mousemove', function(e) {
            const cards = document.querySelectorAll('.card');
            const mouseX = e.clientX / window.innerWidth;
            const mouseY = e.clientY / window.innerHeight;
            
            cards.forEach((card, index) => {
                const speed = (index + 1) * 0.5;
                const x = (mouseX - 0.5) * speed;
                const y = (mouseY - 0.5) * speed;
                card.style.transform = `translate(${x}px, ${y}px)`;
            });
        });
    </script>
</body>
</html>