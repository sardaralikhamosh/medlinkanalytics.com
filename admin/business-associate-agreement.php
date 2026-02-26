<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MedLink Analytics LLC - Business Associate Agreement (HIPAA)</title>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@400;700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary-color: #0066cc;
            --text-color: #000000;
            --border-color: #cccccc;
            --bg-color: #ffffff;
            --input-bg: #f9f9f9;
        }

        body {
            font-family: 'Open Sans', Arial, sans-serif;
            line-height: 1.6;
            color: var(--text-color);
            background: #f5f5f5;
            padding: 20px;
        }

        /* Print Button - Fixed at top */
        .print-controls {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            background: var(--primary-color);
            padding: 15px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            z-index: 1000;
            text-align: center;
        }

        .print-btn {
            background: white;
            color: var(--primary-color);
            border: none;
            padding: 12px 30px;
            font-size: 16px;
            font-weight: 600;
            border-radius: 5px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .print-btn:hover {
            background: #f0f0f0;
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(0,0,0,0.2);
        }

        /* Document Container */
        .document-container {
            max-width: 850px;
            margin: 80px auto 40px;
            background: var(--bg-color);
            padding: 60px 80px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
        }

        /* Header with Logo */
        .document-header {
            text-align: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 3px solid var(--primary-color);
        }

        .logo-container {
            margin-bottom: 20px;
        }

        .logo-container img {
            max-width: 250px;
            height: auto;
        }

        .company-info {
            font-size: 14px;
            color: #666;
        }

        /* Document Title */
        .document-title {
            text-align: center;
            font-family: 'Merriweather', serif;
            font-size: 24px;
            font-weight: 700;
            color: var(--primary-color);
            margin: 30px 0;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        /* Paragraphs */
        .doc-paragraph {
            margin-bottom: 20px;
            text-align: justify;
            font-size: 14px;
            line-height: 1.8;
        }

        /* Sections */
        .section-title {
            font-weight: 700;
            font-size: 16px;
            margin: 25px 0 15px 0;
            color: var(--text-color);
        }

        .subsection-item {
            margin: 10px 0 10px 30px;
            text-align: justify;
        }

        /* Editable Fields */
        .editable-field {
            display: inline-block;
            min-width: 200px;
            padding: 4px 8px;
            border: none;
            border-bottom: 2px solid var(--border-color);
            background: var(--input-bg);
            font-family: inherit;
            font-size: inherit;
            transition: all 0.3s ease;
        }

        .editable-field:focus {
            outline: none;
            border-bottom-color: var(--primary-color);
            background: #fff;
        }

        .editable-field.wide {
            min-width: 400px;
        }

        .editable-field.full-width {
            width: 100%;
            display: block;
            margin: 10px 0;
        }

        /* Date Picker */
        .date-field {
            min-width: 150px;
            padding: 4px 8px;
            border: none;
            border-bottom: 2px solid var(--border-color);
            background: var(--input-bg);
            font-family: inherit;
            font-size: inherit;
            cursor: pointer;
        }

        .date-field:focus {
            outline: none;
            border-bottom-color: var(--primary-color);
            background: #fff;
        }

        /* Signature Section */
        .signature-section {
            margin-top: 40px;
            page-break-inside: avoid;
        }

        .signature-block {
            margin: 30px 0;
            padding: 20px;
            border: 1px solid var(--border-color);
            border-radius: 5px;
            background: #fafafa;
        }

        .signature-title {
            font-weight: 700;
            font-size: 16px;
            margin-bottom: 20px;
            color: var(--primary-color);
        }

        .signature-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin: 15px 0;
        }

        .signature-field {
            display: flex;
            flex-direction: column;
        }

        .signature-label {
            font-weight: 600;
            font-size: 12px;
            margin-bottom: 5px;
            text-transform: uppercase;
            color: #666;
        }

        /* Signature Pad */
        .signature-pad-container {
            position: relative;
            margin: 10px 0;
        }

        .signature-canvas {
            border: 2px solid var(--border-color);
            cursor: crosshair;
            background: white;
            border-radius: 5px;
            width: 100%;
            height: 150px;
        }

        .signature-controls {
            margin-top: 10px;
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .signature-controls button,
        .signature-controls label {
            padding: 8px 16px;
            font-size: 14px;
            border-radius: 4px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .clear-btn {
            background: #dc3545;
            color: white;
            border: none;
        }

        .clear-btn:hover {
            background: #c82333;
        }

        .upload-label {
            background: var(--primary-color);
            color: white;
            border: none;
            display: inline-block;
        }

        .upload-label:hover {
            background: #0052a3;
        }

        .upload-input {
            display: none;
        }

        .signature-image {
            max-width: 100%;
            height: auto;
            border: 2px solid var(--border-color);
            border-radius: 5px;
            background: white;
            padding: 10px;
        }

        /* Print Styles */
        @media print {
            body {
                background: white;
                padding: 0;
            }

            .print-controls {
                display: none !important;
            }

            .signature-controls {
                display: none !important;
            }

            .document-container {
                margin: 0;
                box-shadow: none;
                padding: 40px;
                max-width: 100%;
            }

            .editable-field,
            .date-field {
                border-bottom: 1px solid #000;
                background: transparent;
                padding: 2px 0;
            }

            .signature-canvas {
                border: 1px solid #000;
            }

            .page-break {
                page-break-before: always;
            }

            @page {
                size: letter;
                margin: 0.5in;
            }
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .document-container {
                padding: 30px 20px;
                margin: 70px 10px 20px;
            }

            .signature-row {
                grid-template-columns: 1fr;
            }

            .editable-field.wide {
                min-width: 100%;
            }
        }

        /* Loading indicator */
        .loading {
            display: none;
            color: var(--primary-color);
            font-size: 14px;
            margin-top: 10px;
        }

        .loading.active {
            display: block;
        }
        center img {
            max-width: 100%;
        }
    </style>
</head>
<body>
    <!-- Print Button (Fixed at Top) -->
    <div class="print-controls">
        <button class="print-btn" onclick="window.print()">
            🖨️ Print Document
        </button>
    </div>

    <!-- Main Document Container -->
    <div class="document-container">
        <!-- Header with Logo -->
        <div class="document-header">
            <center>
            <img src="../header-medlinkanalytics.png" alt="MedLink Analytics Header">
            </center>
            <div class="company-info">
                "We handle the billing, you handle the healing"
            </div>
        </div>

        <!-- Document Title -->
        <h1 class="document-title">BUSINESS ASSOCIATE AGREEMENT (HIPAA)</h1>

        <!-- Agreement Opening -->
        <div class="doc-paragraph">
            This Privacy Agreement ("Credentialing Services Agreement"), is effective upon signing this Agreement and is entered into by and between: <br> 
            <input type="text" class="editable-field wide" id="coveredEntityName" placeholder="Covered Entity Name">
            ("Covered Entity")<br>and <strong>"MedLink Analytics LLC"</strong> (the "Business Associate").
        </div>

        <!-- Section I: Term -->
        <h2 class="section-title">I. Term.</h2>
        <div class="doc-paragraph">
            This Agreement shall remain in effect for the duration of this Agreement and shall apply to all of the Services and/or Supplies delivered by the Business Associate pursuant to this Agreement.
        </div>

        <!-- Section II: HIPAA Assurances -->
        <h2 class="section-title">II. HIPAA Assurances.</h2>
        <div class="doc-paragraph">
            In the event Business Associate creates, receives, maintains, or otherwise is exposed to personally identifiable or aggregate patient or other medical information defined as Protected Health Information ("PHI") in the Health Insurance Portability and Accountability Act of 1996 or its relevant regulations ("HIPAA") and otherwise meets the definition of Business Associate as defined in the HIPAA Privacy Standards (45 CFR Parts 160 and 164), Business Associate shall:
        </div>

        <div class="subsection-item">
            <strong>(a)</strong> Recognize that HITECH (the Health Information Technology for Economic and Clinical Health Act of 2009) and the regulations thereunder (including 45 C.F.R. Sections 164.308, 164.310, 164.312, and 164.316), apply to a business associate of a covered entity in the same manner that such sections apply to the covered entity;
        </div>

        <div class="subsection-item">
            <strong>(b)</strong> Not use or further disclose the PHI, except as permitted by law;
        </div>

        <div class="subsection-item">
            <strong>(c)</strong> Not use or further disclose the PHI in a manner that had the Covered Entity done so, would violate the requirements of HIPAA;
        </div>

        <div class="subsection-item">
            <strong>(d)</strong> Use appropriate safeguards (including implementing administrative, physical, and technical safeguards for electronic PHI) to protect the confidentiality, integrity, and availability of and to prevent the use or disclosure of the PHI other than as provided for by this Agreement;
        </div>

        <div class="subsection-item">
            <strong>(e)</strong> Comply with each applicable requirements of 45 C.F.R. Part 162 if the Business Associate conducts Standard Transactions for or on behalf of the Covered Entity;
        </div>

        <div class="subsection-item">
            <strong>(f)</strong> Report promptly to the Covered Entity any security incident or other use or disclosure of PHI not provided for by this Agreement of which Business Associate becomes aware;
        </div>

        <div class="subsection-item">
            <strong>(g)</strong> Ensure that any subcontractors or agents who receive or are exposed to PHI (whether in electronic or other format) are explained the Business Associate obligations under this paragraph and agree to the same restrictions and conditions;
        </div>

        <div class="subsection-item">
            <strong>(h)</strong> Make available PHI in accordance with the individual's rights as required under the HIPAA regulations;
        </div>

        <div class="subsection-item">
            <strong>(i)</strong> Account for PHI disclosures for up to the past six (6) years as requested by Covered Entity, which shall include: (i) dates of disclosure, (ii) names of the entities or persons who received PHI and their addresses, if known, (iii) a brief description of the PHI disclosed, and (iv) a brief statement of the purpose and basis for such disclosure;
        </div>

        <!-- Page Break for Print -->
        <div class="page-break"></div>

        <div class="subsection-item">
            <strong>(j)</strong> Make its internal practices, books, and records that relate to the use and disclosure of PHI available to the U.S. Secretary of Health and Human Services for purposes of determining Customer's compliance with HIPAA; and
        </div>

        <div class="subsection-item">
            <strong>(k)</strong> Incorporate any amendments or corrections to PHI when notified by Customer or enter into a Business Associate Agreement or other necessary Agreements to comply with HIPAA.
        </div>

        <!-- Section III: Termination -->
        <h2 class="section-title">III. Termination Upon Breach of Provisions.</h2>
        <div class="doc-paragraph">
            Notwithstanding any other provision of this Agreement, Covered Entity may immediately terminate this Agreement if it determines that Business Associate breaches any term in this Agreement. Alternatively, Covered Entity may give written notice to Business Associate in the event of a breach and give Business Associate five (5) business days to cure such breach. Covered Entity shall also have the option to immediately stop all further disclosures of PHI to Business Associate if Covered Entity reasonably determines that Business Associate has breached its obligations under this Agreement. In the event that termination of this Agreement and the Agreement is not feasible, Business Associate hereby acknowledges that the Covered Entity shall be required to report the breach to the Secretary of the U.S. Department of Health and Human Services, notwithstanding any other provision of this Agreement or Agreement to the contrary.
        </div>

        <!-- Section IV: Return or Destruction -->
        <h2 class="section-title">IV. Return or Destruction of Protected Health Information upon Termination.</h2>
        <div class="doc-paragraph">
            Upon the termination of this Agreement, unless otherwise directed by Covered Entity, Business Associate shall either return or destroy all PHI received from the Covered Entity or created or received by Business Associate on behalf of the Covered Entity in which Business Associate maintains in any form. Business Associate shall not retain any copies of such PHI. Notwithstanding the foregoing, in the event that Business Associate determines that returning or destroying the Protected Health Information is infeasible upon termination of this Agreement, Business Associate shall provide to Covered Entity notification of the condition that makes return or destruction infeasible. To the extent that it is not feasible for Business Associate to return or destroy such PHI, the terms and provisions of this Agreement shall survive such termination or expiration and such PHI shall be used or disclosed solely as permitted by law for so long as Business Associate maintains such Protected Health Information.
        </div>

        <!-- Section V: No Third-Party Beneficiaries -->
        <h2 class="section-title">V. No Third-Party Beneficiaries.</h2>
        <div class="doc-paragraph">
            The parties agree that the terms of this Agreement shall apply only to themselves and are not for the benefit of any third-party beneficiaries.
        </div>

        <!-- Section VI: De-Identified Data -->
        <h2 class="section-title">VI. De-Identified Data.</h2>
        <div class="doc-paragraph">
            Notwithstanding the provisions of this Agreement, Business Associate and its subcontractors may disclose non-personally identifiable information provided that the disclosed information does not include a key or other mechanism that would enable the information to be identified.
        </div>

        <!-- Section VII: Amendment -->
        <h2 class="section-title">VII. Amendment.</h2>
        <div class="doc-paragraph">
            Business Associate and Covered Entity agree to amend this Agreement to the extent necessary to allow either party to comply with the Privacy Standards, the Standards for Electronic Transactions, the Security Standards, or other relevant state or federal laws or regulations created or amended to protect the privacy of patient information. All such amendments shall be made in a writing signed by both parties.
        </div>

        <!-- Section VIII: Interpretation -->
        <h2 class="section-title">VIII. Interpretation.</h2>
        <div class="doc-paragraph">
            Any ambiguity in this Agreement shall be resolved in favor of a meaning that permits Covered Entity to comply with the then most current version of HIPAA and the HIPAA privacy regulations.
        </div>

        <!-- Section IX: Definitions -->
        <h2 class="section-title">IX. Definitions.</h2>
        <div class="doc-paragraph">
            Capitalized terms used in this Agreement shall have the meanings assigned to them as outlined in HIPAA and its related regulations.
        </div>

        <!-- Section X: Survival -->
        <h2 class="section-title">X. Survival.</h2>
        <div class="doc-paragraph">
            The obligations imposed by this Agreement shall survive any expiration or termination of this Agreement.
        </div>

        <!-- Signature Section -->
        <div class="signature-section">
            <!-- Covered Entity Signature Block -->
            <div class="signature-block">
                <div class="signature-title">COVERED ENTITY</div>
                
                <div class="signature-field" style="margin-bottom: 20px;">
                    <label class="signature-label">Entity Name:</label>
                    <input type="text" class="editable-field full-width" id="coveredEntityNameSig" placeholder="Enter Covered Entity Name">
                </div>

                <div class="signature-row">
                    <div class="signature-field">
                        <label class="signature-label">Signature:</label>
                        <div class="signature-pad-container">
                            <canvas class="signature-canvas" id="coveredSignatureCanvas" width="350" height="150"></canvas>
                            <div class="signature-controls">
                                <button class="clear-btn" onclick="clearSignature('coveredSignatureCanvas')">Clear</button>
                                <label class="upload-label">
                                    Upload Signature
                                    <input type="file" class="upload-input" accept="image/*" onchange="uploadSignature(event, 'coveredSignatureCanvas')">
                                </label>
                            </div>
                            <div class="loading" id="coveredLoading">Uploading...</div>
                        </div>
                    </div>
                    
                    <div class="signature-field">
                        <label class="signature-label">Date:</label>
                        <input type="date" class="date-field" id="coveredDate" value="">
                    </div>
                </div>

                <div class="signature-row">
                    <div class="signature-field">
                        <label class="signature-label">Print Name:</label>
                        <input type="text" class="editable-field full-width" id="coveredPrintName" placeholder="Enter Name">
                    </div>
                    
                    <div class="signature-field">
                        <label class="signature-label">Title:</label>
                        <input type="text" class="editable-field full-width" id="coveredTitle" placeholder="Enter Title">
                    </div>
                </div>
            </div>

            <!-- Business Associate Signature Block -->
            <div class="signature-block">
                <div class="signature-title">BUSINESS ASSOCIATE (MedLink Analytics LLC)</div>
                
                <div class="signature-row">
                    <div class="signature-field">
                        <label class="signature-label">Signature:</label>
                        <div class="signature-pad-container">
                            <div class="signature-controls">
                                <div class="signature-field">
                        <label class="signature-label">Signature:</label>
                        <div class="signature-pad-container">
                            <img src="ceo-signature.png">
                        </div>
                    </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="signature-field">
                        <label class="signature-label">Date:</label>
                        <input type="date" class="date-field" id="businessDate" value="2026-02-16">
                    </div>
                </div>

                <div class="signature-row">
                    <div class="signature-field">
                        <label class="signature-label">Print Name:</label>
                        <input type="text" class="editable-field full-width" id="businessPrintName" value="ADNAN MURAD">
                    </div>
                    
                    <div class="signature-field">
                        <label class="signature-label">Title:</label>
                        <input type="text" class="editable-field full-width" id="businessTitle" value="Founder and CEO">
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div style="text-align: center; margin-top: 40px; font-size: 12px; color: #666;">
             <center>
                    <img src="../footer-medlink.png">
            </center>
        </div>
    </div>

    <!-- JavaScript for Signature Pad Functionality -->
    <script>
        // Initialize signature pads
        const canvases = {
            coveredSignatureCanvas: null,
            businessSignatureCanvas: null
        };

        // Set today's date
        document.addEventListener('DOMContentLoaded', function() {
            const today = new Date().toISOString().split('T')[0];
            
            // Initialize both signature canvases
            initSignaturePad('coveredSignatureCanvas');
            initSignaturePad('businessSignatureCanvas');
            
            // Sync entity name fields
            document.getElementById('coveredEntityName').addEventListener('input', function() {
                document.getElementById('coveredEntityNameSig').value = this.value;
            });
            
            document.getElementById('coveredEntityNameSig').addEventListener('input', function() {
                document.getElementById('coveredEntityName').value = this.value;
            });
        });

        function initSignaturePad(canvasId) {
            const canvas = document.getElementById(canvasId);
            const ctx = canvas.getContext('2d');
            let isDrawing = false;
            let lastX = 0;
            let lastY = 0;

            // Set white background
            ctx.fillStyle = 'white';
            ctx.fillRect(0, 0, canvas.width, canvas.height);
            
            // Set drawing style
            ctx.strokeStyle = '#000';
            ctx.lineWidth = 2;
            ctx.lineCap = 'round';
            ctx.lineJoin = 'round';

            // Mouse events
            canvas.addEventListener('mousedown', startDrawing);
            canvas.addEventListener('mousemove', draw);
            canvas.addEventListener('mouseup', stopDrawing);
            canvas.addEventListener('mouseout', stopDrawing);

            // Touch events for mobile
            canvas.addEventListener('touchstart', handleTouchStart);
            canvas.addEventListener('touchmove', handleTouchMove);
            canvas.addEventListener('touchend', stopDrawing);

            function startDrawing(e) {
                isDrawing = true;
                const rect = canvas.getBoundingClientRect();
                lastX = e.clientX - rect.left;
                lastY = e.clientY - rect.top;
            }

            function draw(e) {
                if (!isDrawing) return;
                
                const rect = canvas.getBoundingClientRect();
                const currentX = e.clientX - rect.left;
                const currentY = e.clientY - rect.top;

                ctx.beginPath();
                ctx.moveTo(lastX, lastY);
                ctx.lineTo(currentX, currentY);
                ctx.stroke();

                lastX = currentX;
                lastY = currentY;
            }

            function stopDrawing() {
                isDrawing = false;
            }

            function handleTouchStart(e) {
                e.preventDefault();
                const touch = e.touches[0];
                const rect = canvas.getBoundingClientRect();
                isDrawing = true;
                lastX = touch.clientX - rect.left;
                lastY = touch.clientY - rect.top;
            }

            function handleTouchMove(e) {
                e.preventDefault();
                if (!isDrawing) return;
                
                const touch = e.touches[0];
                const rect = canvas.getBoundingClientRect();
                const currentX = touch.clientX - rect.left;
                const currentY = touch.clientY - rect.top;

                ctx.beginPath();
                ctx.moveTo(lastX, lastY);
                ctx.lineTo(currentX, currentY);
                ctx.stroke();

                lastX = currentX;
                lastY = currentY;
            }

            canvases[canvasId] = { canvas, ctx };
        }

        function clearSignature(canvasId) {
            const { canvas, ctx } = canvases[canvasId];
            ctx.fillStyle = 'white';
            ctx.fillRect(0, 0, canvas.width, canvas.height);
        }

        function uploadSignature(event, canvasId) {
            const file = event.target.files[0];
            if (!file) return;

            const loadingId = canvasId === 'coveredSignatureCanvas' ? 'coveredLoading' : 'businessLoading';
            const loadingEl = document.getElementById(loadingId);
            loadingEl.classList.add('active');

            const reader = new FileReader();
            reader.onload = function(e) {
                const img = new Image();
                img.onload = function() {
                    const { canvas, ctx } = canvases[canvasId];
                    
                    // Clear canvas
                    ctx.fillStyle = 'white';
                    ctx.fillRect(0, 0, canvas.width, canvas.height);
                    
                    // Calculate scaling to fit canvas while maintaining aspect ratio
                    const scale = Math.min(
                        canvas.width / img.width,
                        canvas.height / img.height
                    );
                    
                    const x = (canvas.width - img.width * scale) / 2;
                    const y = (canvas.height - img.height * scale) / 2;
                    
                    // Draw image
                    ctx.drawImage(img, x, y, img.width * scale, img.height * scale);
                    
                    loadingEl.classList.remove('active');
                };
                img.src = e.target.result;
            };
            reader.readAsDataURL(file);
        }

        // Auto-save functionality
        function autoSave() {
            const formData = {
                coveredEntityName: document.getElementById('coveredEntityName').value,
                coveredPrintName: document.getElementById('coveredPrintName').value,
                coveredTitle: document.getElementById('coveredTitle').value,
                coveredDate: document.getElementById('coveredDate').value
            };
            
            localStorage.setItem('hipaaAgreement', JSON.stringify(formData));
        }

        // Load saved data on page load
        window.addEventListener('load', function() {
            const savedData = localStorage.getItem('hipaaAgreement');
            if (savedData) {
                const formData = JSON.parse(savedData);
                Object.keys(formData).forEach(key => {
                    const element = document.getElementById(key);
                    if (element) element.value = formData[key];
                });
                
                // Sync entity name
                if (formData.coveredEntityName) {
                    document.getElementById('coveredEntityNameSig').value = formData.coveredEntityName;
                }
            }
        });

        // Save data on input change
        document.querySelectorAll('input').forEach(input => {
            input.addEventListener('change', autoSave);
        });
    </script>
</body>
</html>