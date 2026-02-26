<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company Profile - MedLink Analytics LLC</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --navy: #0a1f3c;
            --teal: #0e7490;
            --teal-light: #e0f2fe;
            --text-dark: #1e293b;
            --text-muted: #475569;
            --light-bg: #f8fafc;
            --white: #ffffff;
            --border-color: #c8d6e5;
        }

        html, body {
            height: 100%;
            overflow: hidden;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', 'Helvetica Neue', Arial, sans-serif;
            background: linear-gradient(135deg, var(--navy) 0%, #0d2847 100%);
            color: var(--text-dark);
        }

        .container {
            display: flex;
            height: 100vh;
            overflow: hidden;
        }

        /* SIDEBAR */
        .sidebar {
            width: 320px;
            background: var(--white);
            border-right: 1px solid var(--border-color);
            display: flex;
            flex-direction: column;
            overflow-y: auto;
            box-shadow: 2px 0 12px rgba(0, 0, 0, 0.08);
            animation: slideInLeft 0.4s ease-out;
        }

        @keyframes slideInLeft {
            from {
                transform: translateX(-320px);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        .sidebar-header {
            padding: 32px 24px;
            border-bottom: 2px solid var(--teal);
            background: linear-gradient(135deg, var(--teal-light) 0%, rgba(14, 116, 144, 0.05) 100%);
        }

        .logo {
            font-size: 22px;
            font-weight: 700;
            color: var(--navy);
            margin-bottom: 8px;
            letter-spacing: -0.5px;
        }

        .logo-subtitle {
            font-size: 12px;
            color: var(--teal);
            font-weight: 600;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .sidebar-content {
            padding: 32px 24px;
            flex: 1;
        }

        .info-section {
            margin-bottom: 32px;
        }

        .info-label {
            font-size: 11px;
            font-weight: 700;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 12px;
            display: block;
        }

        .info-value {
            font-size: 14px;
            color: var(--text-dark);
            line-height: 1.6;
            font-weight: 500;
        }

        .info-value a {
            color: var(--teal);
            text-decoration: none;
            transition: color 0.3s ease;
            font-weight: 600;
        }

        .info-value a:hover {
            color: var(--navy);
            text-decoration: underline;
        }

        .divider {
            height: 1px;
            background: var(--border-color);
            margin: 32px 0;
        }

        .cta-section {
            padding-top: 32px;
            border-top: 2px solid var(--border-color);
        }

        .btn-primary {
            display: inline-block;
            width: 100%;
            padding: 14px 20px;
            background: linear-gradient(135deg, var(--teal) 0%, #0a5f73 100%);
            color: var(--white);
            text-decoration: none;
            border-radius: 6px;
            font-weight: 700;
            font-size: 14px;
            text-align: center;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            letter-spacing: 0.5px;
            box-shadow: 0 4px 12px rgba(14, 116, 144, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(14, 116, 144, 0.4);
        }

        .btn-primary:active {
            transform: translateY(0);
        }

        .sidebar-footer {
            padding: 24px;
            border-top: 1px solid var(--border-color);
            background: var(--light-bg);
        }

        .footer-text {
            font-size: 12px;
            color: var(--text-muted);
            line-height: 1.6;
            text-align: center;
        }

        /* MAIN CONTENT */
        .main-content {
            flex: 1;
            display: flex;
            flex-direction: column;
            background: var(--light-bg);
            overflow: hidden;
        }

        .toolbar {
            background: var(--white);
            border-bottom: 1px solid var(--border-color);
            padding: 16px 32px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
        }

        .toolbar-title {
            font-size: 16px;
            font-weight: 600;
            color: var(--navy);
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .toolbar-title::before {
            content: '';
            display: inline-block;
            width: 4px;
            height: 24px;
            background: var(--teal);
            border-radius: 2px;
        }

        .toolbar-actions {
            display: flex;
            gap: 12px;
        }

        .btn-icon {
            padding: 8px 16px;
            background: var(--light-bg);
            border: 1px solid var(--border-color);
            border-radius: 4px;
            cursor: pointer;
            font-size: 13px;
            font-weight: 600;
            color: var(--text-dark);
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .btn-icon:hover {
            background: var(--teal);
            color: var(--white);
            border-color: var(--teal);
        }

        .pdf-viewer {
            flex: 1;
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 0;
            background: #e8eef5;
        }

        .pdf-container {
            background: var(--white);
            border-radius: 0;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.12);
            width: 100%;
            height: 100%;
            animation: fadeIn 0.5s ease-out;
            display: flex;
            overflow: hidden;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .pdf-container iframe {
            width: 100%;
            height: 100%;
            border: none;
            display: block;
            border-radius: 0;
        }

        .loading {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100%;
            color: var(--text-muted);
        }

        .spinner {
            width: 48px;
            height: 48px;
            border: 4px solid var(--border-color);
            border-top-color: var(--teal);
            border-radius: 50%;
            animation: spin 1s linear infinite;
            margin-bottom: 16px;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        .loading-text {
            font-size: 14px;
            font-weight: 500;
        }

        /* RESPONSIVE */
        @media (max-width: 1024px) {
            .sidebar {
                width: 280px;
            }

            .sidebar-header {
                padding: 24px 20px;
            }

            .sidebar-content {
                padding: 24px 20px;
            }

            .toolbar {
                padding: 14px 24px;
            }
        }

        @media (max-width: 768px) {
            .container {
                flex-direction: column;
            }

            .sidebar {
                width: 100%;
                border-right: none;
                border-bottom: 1px solid var(--border-color);
                max-height: 40%;
                overflow-y: auto;
            }

            .main-content {
                flex: 1;
            }

            .sidebar-header {
                padding: 20px 24px;
            }

            .sidebar-content {
                padding: 20px 24px;
            }

            .info-section {
                margin-bottom: 20px;
            }

            .toolbar {
                padding: 12px 16px;
                flex-direction: column;
                gap: 12px;
                align-items: flex-start;
            }

            .toolbar-actions {
                width: 100%;
            }

            .btn-icon {
                flex: 1;
                justify-content: center;
            }

            .pdf-viewer {
                padding: 0;
            }
        }

        @media (max-width: 480px) {
            .sidebar {
                max-height: 35%;
            }

            .sidebar-header {
                padding: 16px 20px;
            }

            .info-section {
                margin-bottom: 16px;
            }

            .info-label {
                font-size: 10px;
            }

            .info-value {
                font-size: 13px;
            }

            .logo {
                font-size: 18px;
            }

            .logo-subtitle {
                font-size: 10px;
            }
        }

        /* PRINT STYLES */
        @media print {
            .sidebar,
            .toolbar {
                display: none;
            }

            .main-content {
                background: var(--white);
            }

            .pdf-viewer {
                padding: 0;
                background: var(--white);
            }

            .pdf-container {
                box-shadow: none;
                border-radius: 0;
                max-width: 100%;
            }
        }

        /* SCROLLBAR STYLING */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }

        ::-webkit-scrollbar-track {
            background: var(--light-bg);
        }

        ::-webkit-scrollbar-thumb {
            background: var(--border-color);
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: var(--teal);
        }

        /* FOCUS STATES */
        a:focus-visible,
        button:focus-visible {
            outline: 2px solid var(--teal);
            outline-offset: 2px;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- SIDEBAR -->
        <aside class="sidebar">
            <div class="sidebar-header">
                <div class="logo">MedLink Analytics</div>
                <div class="logo-subtitle">Company Profile</div>
            </div>

            <div class="sidebar-content">
                <div class="info-section">
                    <label class="info-label">Headquarters</label>
                    <div class="info-value">Denver, Colorado</div>
                </div>

                <div class="info-section">
                    <label class="info-label">Service Area</label>
                    <div class="info-value">United States (Nationwide)</div>
                </div>

                <div class="info-section">
                    <label class="info-label">Industry</label>
                    <div class="info-value">Healthcare Analytics & Revenue Cycle Management</div>
                </div>

                <div class="divider"></div>

                <div class="info-section">
                    <label class="info-label">Phone</label>
                    <div class="info-value">
                        <a href="tel:+17204454634">+1 (720) 445-4634</a>
                    </div>
                </div>

                <div class="info-section">
                    <label class="info-label">Email</label>
                    <div class="info-value">
                        <a href="mailto:contact@medlinkanalytics.com">contact@medlinkanalytics.com</a>
                    </div>
                </div>

                <div class="info-section">
                    <label class="info-label">Website</label>
                    <div class="info-value">
                        <a href="https://medlinkanalytics.com" target="_blank">medlinkanalytics.com</a>
                    </div>
                </div>

                <div class="info-section">
                    <label class="info-label">LinkedIn</label>
                    <div class="info-value">
                        <a href="https://www.linkedin.com/company/medlinkanalytics" target="_blank">linkedin.com/company/medlinkanalytics</a>
                    </div>
                </div>
            </div>

            <div class="sidebar-footer">
                <div class="cta-section">
                    <a href="https://calendar.app.google/UHPeMzR9zJkwZ8Mv8" class="btn-primary" target="_blank">
                        Schedule Consultation
                    </a>
                </div>
                <div class="divider"></div>
                <p class="footer-text">
                    © 2026 MedLink Analytics LLC<br>
                    All Rights Reserved
                </p>
            </div>
        </aside>

        <!-- MAIN CONTENT -->
        <main class="main-content">
            <div class="toolbar">
                <div class="toolbar-title">Company Profile Document</div>
                <div class="toolbar-actions">
                    <button class="btn-icon" onclick="downloadPDF()" title="Download PDF">
                        ⬇ Download
                    </button>
                    <button class="btn-icon" onclick="openFullscreen()" title="Fullscreen">
                        ⛶ Fullscreen
                    </button>
                </div>
            </div>

            <div class="pdf-viewer">
                <div class="pdf-container" id="pdfContainer">
                    <iframe 
                        id="pdfFrame"
                        src="Company_Profile.pdf"
                        title="MedLink Analytics Company Profile"
                        onload="onPDFLoaded()"
                        onerror="onPDFError()">
                    </iframe>
                </div>
            </div>
        </main>
    </div>

    <script>
        function downloadPDF() {
            const link = document.createElement('a');
            link.href = 'Company_Profile.pdf';
            link.download = 'Company_Profile.pdf';
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        }

        function openFullscreen() {
            const container = document.getElementById('pdfContainer');
            if (!document.fullscreenElement) {
                container.requestFullscreen().catch(err => {
                    console.log(`Error attempting to enable fullscreen: ${err.message}`);
                });
            } else {
                document.exitFullscreen();
            }
        }

        function onPDFLoaded() {
            console.log('PDF loaded successfully');
        }

        function onPDFError() {
            const container = document.getElementById('pdfContainer');
            container.innerHTML = `
                <div class="loading">
                    <div style="text-align: center;">
                        <div style="font-size: 48px; margin-bottom: 16px;">⚠️</div>
                        <div style="font-size: 16px; font-weight: 600; margin-bottom: 8px;">Unable to Load PDF</div>
                        <p style="color: var(--text-muted); margin-bottom: 24px; max-width: 300px;">
                            There was an issue loading the PDF. Please try downloading it directly or contact us.
                        </p>
                        <a href="Company_Profile.pdf" 
                           style="display: inline-block; padding: 12px 24px; background: var(--teal); color: white; text-decoration: none; border-radius: 6px; font-weight: 600;">
                            Download PDF
                        </a>
                    </div>
                </div>
            `;
        }

        // Keyboard shortcuts
        document.addEventListener('keydown', (e) => {
            if (e.ctrlKey || e.metaKey) {
                if (e.key === 's') {
                    e.preventDefault();
                    downloadPDF();
                }
            }
            if (e.key === 'Escape' && document.fullscreenElement) {
                document.exitFullscreen();
            }
        });

        // Analytics (optional - uncomment if you have Google Analytics)
        // window.addEventListener('load', () => {
        //     if (typeof gtag !== 'undefined') {
        //         gtag('event', 'page_view', {
        //             'page_title': 'Company Profile',
        //             'page_path': '/admin/company_profile'
        //         });
        //     }
        // });
    </script>
</body>
</html>