<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MedLink Analytics LLC - Company Profile</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary: #667eea;
            --secondary: #764ba2;
            --dark: #1a1f36;
            --text: #2d3748;
            --text-light: #4a5568;
            --border: #e2e8f0;
            --bg: #ffffff;
            --bg-light: #f7fafc;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 20px;
            line-height: 1.6;
        }

        .controls {
            max-width: 1200px;
            margin: 0 auto 20px;
            display: flex;
            gap: 15px;
            justify-content: flex-end;
        }

        .btn {
            padding: 12px 25px;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            font-size: 14px;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .btn-edit {
            background: white;
            color: var(--primary);
        }

        .btn-edit:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        }

        .btn-pdf {
            background: #ef4444;
            color: white;
        }

        .btn-pdf:hover {
            background: #dc2626;
            transform: translateY(-2px);
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            background: white;
            border-radius: 12px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.2);
            overflow: hidden;
        }

        /* Header Section */
        .header {
            background: linear-gradient(135deg, #1a1f36 0%, #2d3748 100%);
            color: white;
            padding: 50px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120"><path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z" opacity=".1" fill="white"/></svg>') no-repeat;
            background-size: cover;
            opacity: 0.1;
        }

        .logo-section {
            margin-bottom: 20px;
        }

        .company-logo {
            font-size: 60px;
            margin-bottom: 15px;
        }

        .company-name {
            font-size: 42px;
            font-weight: 800;
            margin-bottom: 10px;
            letter-spacing: -0.5px;
        }

        .tagline {
            font-size: 18px;
            opacity: 0.9;
            font-weight: 300;
        }

        /* Content */
        .content {
            padding: 50px;
        }

        .section {
            margin-bottom: 50px;
            padding-bottom: 40px;
            border-bottom: 2px solid var(--border);
        }

        .section:last-child {
            border-bottom: none;
            margin-bottom: 0;
            padding-bottom: 0;
        }

        .section-title {
            font-size: 28px;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 25px;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .section-icon {
            font-size: 32px;
        }

        .editable {
            border: 2px dashed transparent;
            padding: 8px;
            border-radius: 6px;
            transition: all 0.3s;
            min-height: 30px;
        }

        .edit-mode .editable {
            border-color: #fbbf24;
            background: #fef3c7;
        }

        .editable:focus {
            outline: none;
            border-color: var(--primary);
            background: #f0f4ff;
        }

        /* Company Overview */
        .overview-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 25px;
            margin-bottom: 30px;
        }

        .info-card {
            background: var(--bg-light);
            padding: 20px;
            border-radius: 10px;
            border-left: 4px solid var(--primary);
        }

        .info-label {
            font-size: 12px;
            font-weight: 600;
            color: var(--text-light);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 8px;
        }

        .info-value {
            font-size: 16px;
            font-weight: 600;
            color: var(--text);
        }

        /* About Section */
        .about-text {
            font-size: 16px;
            color: var(--text);
            line-height: 1.8;
            margin-bottom: 20px;
        }

        /* Mission & Vision */
        .mission-vision-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
        }

        .mv-card {
            background: linear-gradient(135deg, #f0f4ff 0%, #e6f0ff 100%);
            padding: 30px;
            border-radius: 12px;
            border: 2px solid #bfdbfe;
        }

        .mv-card h3 {
            font-size: 22px;
            color: var(--primary);
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .mv-card p {
            color: var(--text);
            line-height: 1.7;
        }

        /* Services Section */
        .service-category {
            margin-bottom: 35px;
            background: var(--bg-light);
            padding: 25px;
            border-radius: 10px;
            border-left: 5px solid var(--primary);
        }

        .service-category:last-child {
            margin-bottom: 0;
        }

        .service-name {
            font-size: 22px;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .service-list {
            list-style: none;
            padding: 0;
        }

        .service-item {
            padding: 12px 0;
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: flex-start;
            gap: 12px;
        }

        .service-item:last-child {
            border-bottom: none;
        }

        .service-bullet {
            color: var(--primary);
            font-size: 20px;
            flex-shrink: 0;
        }

        .service-content h4 {
            font-size: 16px;
            font-weight: 700;
            color: var(--text);
            margin-bottom: 5px;
        }

        .service-content p {
            font-size: 14px;
            color: var(--text-light);
            line-height: 1.6;
        }

        /* Contact Section */
        .contact-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 25px;
        }

        .contact-card {
            background: var(--bg-light);
            padding: 25px;
            border-radius: 10px;
            text-align: center;
            transition: all 0.3s;
        }

        .contact-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
        }

        .contact-icon {
            font-size: 40px;
            margin-bottom: 15px;
        }

        .contact-label {
            font-size: 14px;
            font-weight: 600;
            color: var(--text-light);
            text-transform: uppercase;
            margin-bottom: 10px;
        }

        .contact-value {
            font-size: 15px;
            color: var(--text);
            word-break: break-word;
        }

        .contact-value a {
            color: var(--primary);
            text-decoration: none;
        }

        .contact-value a:hover {
            text-decoration: underline;
        }

        /* Footer */
        .footer {
            background: var(--dark);
            color: white;
            padding: 30px 50px;
            text-align: center;
        }

        .footer p {
            margin: 5px 0;
            opacity: 0.9;
        }

        .social-links {
            margin-top: 20px;
            display: flex;
            justify-content: center;
            gap: 20px;
        }

        .social-link {
            color: white;
            font-size: 24px;
            transition: all 0.3s;
        }

        .social-link:hover {
            transform: scale(1.2);
            color: var(--primary);
        }

        center img{
            max-width: 100% !important;
        }

        @media (max-width: 768px) {
            .content {
                padding: 30px 20px;
            }

            .header {
                padding: 30px 20px;
            }

            .company-name {
                font-size: 32px;
            }

            .section-title {
                font-size: 24px;
            }
        }

        /* Print Styles - Optimized for PDF */
        @media print {
            body {
                background: white;
                padding: 0;
                line-height: 1.4;
            }

            .controls {
                display: none !important;
            }

            .container {
                box-shadow: none;
                border-radius: 0;
                max-width: 100%;
            }

            .header {
                padding: 20px 25px !important;
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }

            .company-name {
                font-size: 30px !important;
                margin-bottom: 5px !important;
            }

            .tagline {
                font-size: 13px !important;
            }

            .content {
                padding: 20px 25px !important;
            }

            .section {
                margin-bottom: 20px !important;
                padding-bottom: 15px !important;
                page-break-inside: avoid;
            }

            .section-title {
                font-size: 18px !important;
                margin-bottom: 10px !important;
            }

            .section-icon {
                font-size: 20px !important;
            }

            /* Company Overview - Compact Grid */
            .overview-grid {
                gap: 10px !important;
                margin-bottom: 12px !important;
            }

            .info-card {
                padding: 8px 10px !important;
                border-left-width: 3px !important;
            }

            .info-label {
                font-size: 8px !important;
                margin-bottom: 3px !important;
            }

            .info-value {
                font-size: 12px !important;
            }

            /* About Text */
            .about-text {
                font-size: 12px !important;
                line-height: 1.5 !important;
                margin-bottom: 10px !important;
            }

            /* Mission & Vision */
            .mission-vision-grid {
                gap: 12px !important;
            }

            .mv-card {
                padding: 12px 15px !important;
                border-width: 1px !important;
            }

            .mv-card h3 {
                font-size: 15px !important;
                margin-bottom: 6px !important;
            }

            .mv-card p {
                font-size: 11px !important;
                line-height: 1.5 !important;
            }

            /* Services - More Compact */
            .service-category {
                margin-bottom: 15px !important;
                padding: 10px 12px !important;
                border-left-width: 3px !important;
                page-break-inside: avoid;
            }

            .service-name {
                font-size: 15px !important;
                margin-bottom: 6px !important;
            }

            .service-item {
                padding: 4px 0 !important;
                gap: 6px !important;
            }

            .service-bullet {
                font-size: 12px !important;
            }

            .service-content h4 {
                font-size: 12px !important;
                margin-bottom: 2px !important;
            }

            .service-content p {
                font-size: 10px !important;
                line-height: 1.4 !important;
            }

            /* Contact Grid */
            .contact-grid {
                gap: 10px !important;
            }

            .contact-card {
                padding: 10px 12px !important;
            }

            .contact-icon {
                font-size: 24px !important;
                margin-bottom: 6px !important;
            }

            .contact-label {
                font-size: 9px !important;
                margin-bottom: 4px !important;
            }

            .contact-value {
                font-size: 11px !important;
            }

            /* Footer */
            .footer {
                padding: 12px 25px !important;
            }

            .footer p {
                font-size: 10px !important;
                margin: 2px 0 !important;
            }

            .social-links {
                margin-top: 8px !important;
                gap: 10px !important;
            }

            .social-link {
                font-size: 10px !important;
            }

            .editable {
                border: none !important;
                background: transparent !important;
                padding: 0 !important;
            }

            /* Images */
            center img {
                max-width: 100% !important;
                height: auto !important;
            }

            /* Prevent orphans and widows */
            p, h4 {
                orphans: 3;
                widows: 3;
            }

            /* Keep related items together */
            .service-item,
            .contact-card,
            .info-card {
                page-break-inside: avoid;
            }
        }
    </style>
</head>
<body>
    <!-- Controls -->
    <div class="controls">
        <button class="btn btn-edit" onclick="toggleEditMode()">
            <span id="editIcon"></span>
            <span id="editText">Enable Edit Mode</span>
        </button>
        <button class="btn btn-pdf" onclick="downloadPDF()">
            Download PDF
        </button>
    </div>

    <!-- Main Container -->
    <div class="container" id="profileContent">
        <center>
            <img src="../header-medlinkanalytics.png">
        </center>
        <!-- Header -->
        <div class="header">
            <div class="logo-section">
                <h1 class="company-name editable" contenteditable="false">MedLink Analytics LLC</h1>
                <p class="tagline editable" contenteditable="false">Smarter Analytics. Stronger Revenue.</p>
            </div>
        </div>

        <!-- Content -->
        <div class="content">
            <!-- Company Overview -->
            <div class="section">
                <h2 class="section-title">
                    <span class="section-icon"></span>
                    Company Overview
                </h2>
                <div class="overview-grid">
                    <div class="info-card">
                        <div class="info-label">Company Name</div>
                        <div class="info-value editable" contenteditable="false">MedLink Analytics LLC</div>
                    </div>
                    <div class="info-card">
                        <div class="info-label">Industry</div>
                        <div class="info-value editable" contenteditable="false">Healthcare Analytics & Medical Billing</div>
                    </div>
                    <div class="info-card">
                        <div class="info-label">Founded</div>
                        <div class="info-value editable" contenteditable="false">2024</div>
                    </div>
                    <div class="info-card">
                        <div class="info-label">Headquarters</div>
                        <div class="info-value editable" contenteditable="false">Denver, Colorado</div>
                    </div>
                    <div class="info-card">
                        <div class="info-label">Service Area</div>
                        <div class="info-value editable" contenteditable="false">United States</div>
                    </div>
                    <div class="info-card">
                        <div class="info-label">Website</div>
                        <div class="info-value"><a href="https://medlinkanalytics.com" target="_blank">medlinkanalytics.com</a></div>
                    </div>
                    <div class="info-card">
                        <div class="info-label">LinkedIn</div>
                        <div class="info-value"><a href="https://www.linkedin.com/company/medlinkanalytics" target="_blank">company/medlinkanalytics</a></div>
                    </div>
                    <div class="info-card">
                        <div class="info-label">Registered as</div>
                        <div class="info-value editable" contenteditable="false">Limited Liability Company (LLC)</div>
                    </div>
                </div>
            </div>

            <!-- About Us -->
            <div class="section">
                <h2 class="section-title">
                    <span class="section-icon"></span>
                    About Us
                </h2>
                <p class="about-text editable" contenteditable="false">
                    MedLink Analytics LLC is a premier healthcare solutions provider specializing in comprehensive medical billing services, credentialing, virtual assistant services, and digital marketing solutions. We empower healthcare providers to optimize their revenue cycle management, streamline administrative processes, and enhance their digital presence.
                </p>
                <p class="about-text editable" contenteditable="false">
                    With a team of experienced professionals and cutting-edge technology, we deliver customized solutions that meet the unique needs of each healthcare practice. Our commitment to excellence, accuracy, and compliance ensures that our clients can focus on what matters most – providing exceptional patient care.
                </p>
            </div>

            <!-- Mission & Vision -->
            <div class="section">
                <h2 class="section-title">
                    <span class="section-icon"></span>
                    Mission & Vision
                </h2>
                <div class="mission-vision-grid">
                    <div class="mv-card">
                        <h3>Our Mission</h3>
                        <p class="editable" contenteditable="false">
                            To provide healthcare providers with comprehensive, reliable, and innovative solutions that maximize revenue, ensure compliance, and enhance operational efficiency. We are dedicated to delivering exceptional service that allows our clients to focus on patient care while we handle the complexities of medical billing, credentialing, and administrative support.
                        </p>
                    </div>
                    <div class="mv-card">
                        <h3>Our Vision</h3>
                        <p class="editable" contenteditable="false">
                            To be the most trusted partner for healthcare providers nationwide, recognized for our expertise in revenue cycle management, digital solutions, and unwavering commitment to client success. We envision a healthcare landscape where administrative burdens are minimized, allowing providers to deliver optimal patient care and achieve sustainable growth.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Services -->
            <div class="section">
                <h2 class="section-title">
                    <span class="section-icon"></span>
                    Our Services
                </h2>

                <!-- Medical Billing Services -->
                <div class="service-category">
                    <h3 class="service-name">Medical Billing Services</h3>
                    <ul class="service-list">
                        <li class="service-item">
                            <span class="service-bullet">✓</span>
                            <div class="service-content">
                                <h4 class="editable" contenteditable="false">Eligibility and Benefits Verification</h4>
                                <p class="editable" contenteditable="false">Daily review and confirmation of patient eligibility and benefits before appointments, with updates provided through shared live Google sheets.</p>
                            </div>
                        </li>
                        <li class="service-item">
                            <span class="service-bullet">✓</span>
                            <div class="service-content">
                                <h4 class="editable" contenteditable="false">Professional Coding Expertise</h4>
                                <p class="editable" contenteditable="false">Experienced coders translate medical procedures and diagnoses into standardized ICD-10 and CPT codes for accurate reimbursement.</p>
                            </div>
                        </li>
                        <li class="service-item">
                            <span class="service-bullet">✓</span>
                            <div class="service-content">
                                <h4 class="editable" contenteditable="false">Claims Scrubbing & Submission</h4>
                                <p class="editable" contenteditable="false">Thorough pre-submission checks to identify errors and electronic claims submission for faster processing.</p>
                            </div>
                        </li>
                        <li class="service-item">
                            <span class="service-bullet">✓</span>
                            <div class="service-content">
                                <h4 class="editable" contenteditable="false">Claims Follow-Up</h4>
                                <p class="editable" contenteditable="false">Dedicated team monitors claim status on the 3rd and 5th days following submission.</p>
                            </div>
                        </li>
                        <li class="service-item">
                            <span class="service-bullet">✓</span>
                            <div class="service-content">
                                <h4 class="editable" contenteditable="false">Denial Management</h4>
                                <p class="editable" contenteditable="false">Rapid identification and resolution of denied or rejected claims for prompt resubmission.</p>
                            </div>
                        </li>
                        <li class="service-item">
                            <span class="service-bullet">✓</span>
                            <div class="service-content">
                                <h4 class="editable" contenteditable="false">Payment Posting</h4>
                                <p class="editable" contenteditable="false">We will do manual payment posting including EOB & ERA Posting, adjecement, Patient payment posting, contractual adjecement, self pay payment.</p>
                            </div>
                        </li>
                        <li class="service-item">
                            <span class="service-bullet">✓</span>
                            <div class="service-content">
                                <h4 class="editable" contenteditable="false">Reporting & Analytics</h4>
                                <p class="editable" contenteditable="false">Bi-weekly meetings with regular reports on financial performance and revenue trends.</p>
                            </div>
                        </li>
                        <li class="service-item">
                            <span class="service-bullet">✓</span>
                            <div class="service-content">
                                <h4 class="editable" contenteditable="false">Patient Billing & Collections</h4>
                                <p class="editable" contenteditable="false">Clear, understandable patient bills and professional collections management.</p>
                            </div>
                        </li>
                    </ul>
                </div>

                <!-- Credentialing Services -->
                <div class="service-category">
                    <h3 class="service-name">Credentialing Services</h3>
                    <ul class="service-list">
                        <li class="service-item">
                            <span class="service-bullet">✓</span>
                            <div class="service-content">
                                <h4 class="editable" contenteditable="false">Provider Enrollment & Credentialing</h4>
                                <p class="editable" contenteditable="false">Complete enrollment process with insurance companies and compliance with all credentialing requirements.</p>
                            </div>
                        </li>
                        <li class="service-item">
                            <span class="service-bullet">✓</span>
                            <div class="service-content">
                                <h4 class="editable" contenteditable="false">Re-credentialing Services</h4>
                                <p class="editable" contenteditable="false">Ongoing maintenance to ensure compliance and avoid payment delays.</p>
                            </div>
                        </li>
                        <li class="service-item">
                            <span class="service-bullet">✓</span>
                            <div class="service-content">
                                <h4 class="editable" contenteditable="false">Contract Review & Negotiation</h4>
                                <p class="editable" contenteditable="false">Expert review and negotiation of insurance contracts for optimal reimbursement rates.</p>
                            </div>
                        </li>
                        <li class="service-item">
                            <span class="service-bullet">✓</span>
                            <div class="service-content">
                                <h4 class="editable" contenteditable="false">CAQH & License Maintenance</h4>
                                <p class="editable" contenteditable="false">Ongoing maintenance of CAQH profiles, licenses, certifications, and accreditations.</p>
                            </div>
                        </li>
                        <li class="service-item">
                            <span class="service-bullet">✓</span>
                            <div class="service-content">
                                <h4 class="editable" contenteditable="false">Payer Enrollment</h4>
                                <p class="editable" contenteditable="false">Assistance with enrolling in new payer sources to expand patient base and revenue.</p>
                            </div>
                        </li>
                    </ul>
                </div>

                <!-- State Licensing Services -->
                <div class="service-category">
                    <h3 class="service-name">State Licensing Services</h3>
                    <ul class="service-list">
                        <li class="service-item">
                            <span class="service-bullet">✓</span>
                            <div class="service-content">
                                <h4 class="editable" contenteditable="false">Expert Guidance</h4>
                                <p class="editable" contenteditable="false">Specialized knowledge of state licensing policies, procedures, and regulatory changes across all states.</p>
                            </div>
                        </li>
                        <li class="service-item">
                            <span class="service-bullet">✓</span>
                            <div class="service-content">
                                <h4 class="editable" contenteditable="false">Streamlined Process Management</h4>
                                <p class="editable" contenteditable="false">Complete handling of applications, paperwork, and communications with licensing boards.</p>
                            </div>
                        </li>
                        <li class="service-item">
                            <span class="service-bullet">✓</span>
                            <div class="service-content">
                                <h4 class="editable" contenteditable="false">Compliance Assurance</h4>
                                <p class="editable" contenteditable="false">Meticulous attention to requirements including education verification, background checks, and examinations.</p>
                            </div>
                        </li>
                        <li class="service-item">
                            <span class="service-bullet">✓</span>
                            <div class="service-content">
                                <h4 class="editable" contenteditable="false">Ongoing Support</h4>
                                <p class="editable" contenteditable="false">Continuous assistance with renewals, inquiries, and regulatory updates throughout the licensing cycle.</p>
                            </div>
                        </li>
                    </ul>
                </div>

                <!-- Virtual Assistant Services -->
                <div class="service-category">
                    <h3 class="service-name">Virtual Assistant Services</h3>
                    <ul class="service-list">
                        <li class="service-item">
                            <span class="service-bullet">✓</span>
                            <div class="service-content">
                                <h4 class="editable" contenteditable="false">Prior Authorization Management</h4>
                                <p class="editable" contenteditable="false">Handling medication and evaluation prior authorizations efficiently.</p>
                            </div>
                        </li>
                        <li class="service-item">
                            <span class="service-bullet">✓</span>
                            <div class="service-content">
                                <h4 class="editable" contenteditable="false">Verification of Benefits (VOB)</h4>
                                <p class="editable" contenteditable="false">Pre-appointment insurance verification and CPT code confirmation.</p>
                            </div>
                        </li>
                        <li class="service-item">
                            <span class="service-bullet">✓</span>
                            <div class="service-content">
                                <h4 class="editable" contenteditable="false">Call Management & Scheduling</h4>
                                <p class="editable" contenteditable="false">Professional handling of patient calls, appointment scheduling, and 24-hour confirmations.</p>
                            </div>
                        </li>
                        <li class="service-item">
                            <span class="service-bullet">✓</span>
                            <div class="service-content">
                                <h4 class="editable" contenteditable="false">EMR Transition & Management</h4>
                                <p class="editable" contenteditable="false">Data migration between EMR systems and ongoing EMR support.</p>
                            </div>
                        </li>
                        <li class="service-item">
                            <span class="service-bullet">✓</span>
                            <div class="service-content">
                                <h4 class="editable" contenteditable="false">Additional Support Services</h4>
                                <p class="editable" contenteditable="false">Pharmacy calls, fax management, patient registration, medication reminders, lab follow-ups, and patient statements.</p>
                            </div>
                        </li>
                    </ul>
                </div>

                <!-- Virtual Scribe Services -->
                <div class="service-category">
                    <h3 class="service-name">Virtual Scribe Services</h3>
                    <ul class="service-list">
                        <li class="service-item">
                            <span class="service-bullet">✓</span>
                            <div class="service-content">
                                <h4 class="editable" contenteditable="false">Real-Time Documentation</h4>
                                <p class="editable" contenteditable="false">Accurate, real-time documentation in EMR systems during patient encounters.</p>
                            </div>
                        </li>
                        <li class="service-item">
                            <span class="service-bullet">✓</span>
                            <div class="service-content">
                                <h4 class="editable" contenteditable="false">HIPAA-Compliant Record Management</h4>
                                <p class="editable" contenteditable="false">Complete, accurate, and compliant medical record organization and updates.</p>
                            </div>
                        </li>
                        <li class="service-item">
                            <span class="service-bullet">✓</span>
                            <div class="service-content">
                                <h4 class="editable" contenteditable="false">Order Management & Coding</h4>
                                <p class="editable" contenteditable="false">Accurate entry of diagnostic orders, medications, and application of ICD-10/CPT codes.</p>
                            </div>
                        </li>
                    </ul>
                </div>

                <!-- Audit Services -->
                <div class="service-category">
                    <h3 class="service-name">Billing & Coding Audit (Free Practice Analysis)</h3>
                    <ul class="service-list">
                        <li class="service-item">
                            <span class="service-bullet">✓</span>
                            <div class="service-content">
                                <h4 class="editable" contenteditable="false">Comprehensive Process Evaluation</h4>
                                <p class="editable" contenteditable="false">Analysis of billing processes from patient registration to claims submission.</p>
                            </div>
                        </li>
                        <li class="service-item">
                            <span class="service-bullet">✓</span>
                            <div class="service-content">
                                <h4 class="editable" contenteditable="false">Coding Accuracy Assessment</h4>
                                <p class="editable" contenteditable="false">Verification of ICD-10, CPT, and HCPCS standards compliance and modifier usage.</p>
                            </div>
                        </li>
                        <li class="service-item">
                            <span class="service-bullet">✓</span>
                            <div class="service-content">
                                <h4 class="editable" contenteditable="false">Revenue Cycle Analysis</h4>
                                <p class="editable" contenteditable="false">Examination of A/R aging, denied claims trends, and cash flow optimization opportunities.</p>
                            </div>
                        </li>
                    </ul>
                </div>

                <!-- Digital Services -->
                <div class="service-category">
                    <h3 class="service-name">Web Design & Digital Marketing</h3>
                    <ul class="service-list">
                        <li class="service-item">
                            <span class="service-bullet">✓</span>
                            <div class="service-content">
                                <h4 class="editable" contenteditable="false">WordPress Website Development</h4>
                                <p class="editable" contenteditable="false">Custom, responsive websites optimized for mobile and desktop.</p>
                            </div>
                        </li>
                        <li class="service-item">
                            <span class="service-bullet">✓</span>
                            <div class="service-content">
                                <h4 class="editable" contenteditable="false">Search Engine Optimization (SEO)</h4>
                                <p class="editable" contenteditable="false">Comprehensive SEO strategies including local business optimization.</p>
                            </div>
                        </li>
                        <li class="service-item">
                            <span class="service-bullet">✓</span>
                            <div class="service-content">
                                <h4 class="editable" contenteditable="false">Digital Marketing Solutions</h4>
                                <p class="editable" contenteditable="false">Social media management, content writing, graphic design, video animation, and UI/UX design.</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Contact Information -->
            <div class="section">
                <h2 class="section-title">
                    <span class="section-icon"></span>
                    Contact Information
                </h2>
                <div class="contact-grid">
                    <div class="contact-card">
                        <div class="contact-icon">📱</div>
                        <div class="contact-label">Phone</div>
                        <div class="contact-value editable" contenteditable="false">
                            <a href="tel:+17204454634">+1 720-445-4634</a>
                        </div>
                    </div>
                    <div class="contact-card">
                        <div class="contact-icon">✉️</div>
                        <div class="contact-label">Email</div>
                        <div class="contact-value editable" contenteditable="false">
                            <a href="mailto:contact@medlinkanalytics.com">contact@medlinkanalytics.com</a>
                        </div>
                    </div>
                    <div class="contact-card">
                        <div class="contact-icon">🏢</div>
                        <div class="contact-label">Office Address</div>
                        <div class="contact-value editable" contenteditable="false">
                            MedLink Analytics<br>
                            1500 N Grant St STE 28340<br>
                            Denver, Colorado CO 80203<br>
                            United States
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p><strong>MedLink Analytics LLC</strong></p>
            <p>Smarter Analytics. Stronger Revenue.</p>
            <div class="social-links">
                <a href="https://www.linkedin.com/company/medlinkanalytics" target="_blank" class="social-link" title="LinkedIn">
                    LinkedIn
                </a>
                <a href="https://medlinkanalytics.com" target="_blank" class="social-link" title="Website">
                    Website
                </a>
            </div>
        </div>
        <center>
            <img src="../footer-medlink.png">
             <p style="margin-top: 20px; font-size: 13px;">
                © 2026 MedLink Analytics LLC. All rights reserved.
            </p>
        </center>
    </div>

    <script>
        let editMode = false;

        function toggleEditMode() {
            editMode = !editMode;
            const editables = document.querySelectorAll('.editable');
            const container = document.querySelector('.container');
            const editText = document.getElementById('editText');
            const editIcon = document.getElementById('editIcon');

            if (editMode) {
                container.classList.add('edit-mode');
                editables.forEach(el => el.setAttribute('contenteditable', 'true'));
                editText.textContent = 'Disable Edit Mode';
                editIcon.textContent = '🔒';
            } else {
                container.classList.remove('edit-mode');
                editables.forEach(el => el.setAttribute('contenteditable', 'false'));
                editText.textContent = 'Enable Edit Mode';
                editIcon.textContent = '✏️';
            }
        }

        function downloadPDF() {
            // Disable edit mode before PDF generation
            if (editMode) {
                toggleEditMode();
            }

            const element = document.getElementById('profileContent');
            
            // PDF generation options - optimized for compact layout
            const opt = {
                margin: [0.25, 0.35, 0.25, 0.35], // Reduced margins: top, right, bottom, left
                filename: 'MedLink-Analytics-Company-Profile.pdf',
                image: { 
                    type: 'jpeg', 
                    quality: 0.95 
                },
                html2canvas: { 
                    scale: 2,
                    useCORS: true,
                    logging: false,
                    letterRendering: true,
                    scrollY: 0,
                    scrollX: 0,
                    backgroundColor: '#ffffff'
                },
                jsPDF: { 
                    unit: 'in', 
                    format: 'a4', 
                    orientation: 'portrait',
                    compress: true
                },
                pagebreak: { 
                    mode: ['avoid-all', 'css', 'legacy'],
                    before: '.section',
                    avoid: ['.service-category', '.info-card', '.contact-card', '.mv-card']
                }
            };
            
            // Generate PDF with loading indicator
            const btn = event.target;
            const originalText = btn.innerHTML;
            btn.innerHTML = '⏳ Generating PDF...';
            btn.disabled = true;
            
            html2pdf().set(opt).from(element).save().then(() => {
                console.log('PDF generated successfully');
                btn.innerHTML = originalText;
                btn.disabled = false;
            }).catch(err => {
                console.error('Error generating PDF:', err);
                alert('Error generating PDF. Please try again.');
                btn.innerHTML = originalText;
                btn.disabled = false;
            });
        }

        // Auto-save to localStorage
        const editables = document.querySelectorAll('.editable');
        editables.forEach((el, index) => {
            // Load saved content
            const saved = localStorage.getItem(`profile-content-${index}`);
            if (saved) {
                el.innerHTML = saved;
            }

            // Save on change
            el.addEventListener('blur', function() {
                localStorage.setItem(`profile-content-${index}`, this.innerHTML);
            });
        });

        // Keyboard shortcut for edit mode (Ctrl/Cmd + E)
        document.addEventListener('keydown', function(e) {
            if ((e.ctrlKey || e.metaKey) && e.key === 'e') {
                e.preventDefault();
                toggleEditMode();
            }
        });
    </script>
</body>
</html>