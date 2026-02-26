<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MedLink Analytics LLC - Credentialing Services Agreement</title>
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

        .subsection-title {
            font-weight: 600;
            font-size: 14px;
            margin: 15px 0 10px 0;
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
            min-width: 300px;
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

        /* Table Styling */
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 15px 0;
        }

        table th {
            background: #e8f4ff;
            padding: 12px;
            text-align: left;
            font-weight: 600;
            border: 1px solid var(--border-color);
            color: var(--primary-color);
        }

        table td {
            padding: 12px;
            border: 1px solid var(--border-color);
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
            🖨 Print Document
        </button>
    </div>

    <!-- Main Document Container -->
    <div class="document-container">
        <!-- Header with Logo -->
        <div class="document-header">
            <center>
            <img src="../header-medlinkanalytics.png" alt="MedLink Analytics Header">
            </center>
        </div>

        <!-- Document Title -->
        <h1 class="document-title">Credentialing & Licensing SERVICES AGREEMENT</h1>

        <!-- Agreement Opening -->
        <div class="doc-paragraph">
            This service agreement ("Credentialing & Licensing") is made and entered into as of 
            <input type="date" class="date-field" id="agreementDate" value="2026-02-17">, between 
            <strong>MedLink Analytics LLC</strong> having its principal office at 
            1500 N Grant St STE 28340, Denver, Colorado 80203 and 
            <input type="text" class="editable-field wide" id="businessName1" placeholder="your business name"> 
            having its principal office at 
            <input type="text" class="editable-field wide" id="businessAddress" placeholder="address">.
        </div>

        <div class="doc-paragraph">
            <strong>WHEREAS,</strong> MedLink Analytics LLC is a medical billing services company that provides computerized claims, billing, coding, credentialing, and collection services to healthcare providers; and
        </div>

        <div class="doc-paragraph">
            <strong>WHEREAS,</strong> Client wishes to retain MedLink Analytics LLC to provide credentialing services for pursuant to the terms and conditions of this Agreement.
        </div>

        <div class="doc-paragraph">
            <strong>NOW, THEREFORE,</strong> in consideration of the foregoing promises and mutual covenants set forth herein, the parties agree as follows:
        </div>

        <!-- Section 1: Services -->
        <h2 class="section-title">1. SERVICES:</h2>
        
        <h3 class="subsection-title">1.1. Credentialing Services:</h3>
        <div class="doc-paragraph">
            MedLink Analytics LLC shall provide the following Credentialing Services to 
            <input type="text" class="editable-field wide" id="businessName2" placeholder="your business name"> 
            if the Client requires these services:
        </div>

        <div class="subsection-item">
            <strong>i</strong> Submit and verify receipt of the credentialing applications to designated health plans;
        </div>
        <div class="subsection-item">
            <strong>ii</strong> Follow up on the application with designated health plans;
        </div>
        <div class="subsection-item">
            <strong>iii</strong> Document receipt of the requested information by the designated health plan;
        </div>
        <div class="subsection-item">
            <strong>iv</strong> Conduct follow-up activities, document acceptance or rejection information from the health plan;
        </div>
        <div class="subsection-item">
            <strong>v</strong> Create or modify the Client's CAQH database, NPI Registry, or apply for Telehealth licensure under the Interstate Medical Licensure Compact (IMLC).
        </div>

        <!-- Section 2: Client Responsibilities -->
        <h2 class="section-title">2. CLIENT RESPONSIBILITIES:</h2>
        
        <h3 class="subsection-title">2.1. Reasonable Assistance:</h3>
        <div class="doc-paragraph">
            The client agrees to provide 
            <input type="text" class="editable-field wide" id="businessName3" placeholder="your business name"> 
            with all necessary documentation, information, and assistance to enable MedLink Analytics LLC to provide such Services. The client shall be responsible for ensuring the accuracy and completeness of all paperwork associated with credentialing and for ensuring the necessity and appropriateness of the Services which will be rendered by client. The client also agrees to promptly provide Medlink Analytics LLC the copies of all Explanation of any malpractice action taken against them. The client also agrees to promptly provide COMPANY NAME with all the correspondence received by insurance companies related to credentialing.
        </div>

        <h3 class="subsection-title">2.2. Systems Access:</h3>
        <div class="doc-paragraph">
            The client hereby grants to MedLink Analytics LLC the right to access and use CAQH and PECOS. All information and data provided by the Client to MedLink Analytics LLC shall be kept confidential and shall only be disclosed to parties necessary to successfully process and submit credentialing application on behalf of the Client.
        </div>

        <h3 class="subsection-title">2.3. Client Acknowledgement:</h3>
        <div class="doc-paragraph">
            The client acknowledges and agrees that the ultimate responsibility for providing all the information access and copies of the documents to facilitate the credentialing process. The client shall be responsible for maintaining all original source documents.
        </div>

        <!-- Section 3: Fees -->
        <h2 class="section-title">3. FEES:</h2>
        
        <h3 class="subsection-title">3.1. Credentialing Services Fee:</h3>
        <div class="doc-paragraph">
            MedLink Analytics LLC will charge the client for Credentialing cost based on the below rates if the Client requires these services:
        </div>
        <table>
            <thead>
                <tr>
                    <th>Services</th>
                    <th>No of Insurances</th>
                    <th>Fee</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Credentialing per payer per provider</td>
                    <td><input type="text" class="editable-field wide" id="businessName3" placeholder="enter number of payers(optional)"> </td>
                    <td>$80 per application</td>--
                </tr>
            </tbody>
        </table>

        <h3 class="subsection-title">3.2. Terms of Payment:</h3>
        <div class="doc-paragraph">
            MedLink Analytics LLC will issue an invoice to the client upon the successful submission of the applications to the insurance company. The invoice will summarize the cost based on the mutual understanding between both parties. Payments are due within seven (7) days of receipt of the invoice. The client agrees to pay MedLink Analytics LLC via bank ACH auto-pay or online wire.
        </div>

        <!-- Section 4: Confidentiality and HIPAA -->
        <h2 class="section-title">4. CONFIDENTIALITY AND HIPAA:</h2>
        
        <h3 class="subsection-title">4.1. Business Associate Agreement:</h3>
        <div class="doc-paragraph">
            MedLink Analytics LLC and Client will abide by the covenants and provisions of the "Business Associates Agreement", which is incorporated herein by reference.
        </div>

        <!-- Section 5: Termination -->
        <h2 class="section-title">5. TERMINATION:</h2>
        
        <h3 class="subsection-title">5.1. Termination:</h3>
        <div class="doc-paragraph">
            The agreement will terminate upon successful credentialing and payment of the invoice. If the client wishes to add new payors or additional providers to the practice/group, the agreement will automatically renew until credentialing is completed and the invoice is paid.
        </div>

        <!-- Page Break for Print -->
        <div class="page-break"></div>

        <!-- Section 6: Limitations of Warranty and Liability -->
        <h2 class="section-title">6. LIMITATIONS OF WARRANTY AND LIABILITY:</h2>
        
        <h3 class="subsection-title">6.1. Limited Warranty:</h3>
        <div class="doc-paragraph">
            Other than the foregoing limited warranty, all Services are provided "as is", without any warranty whatsoever, whether express or implied, including but not limited to the warranties of merchantability and fitness for a particular purpose.
        </div>

        <h3 class="subsection-title">6.2. Limitation of Liability:</h3>
        
        <div class="doc-paragraph">
            <strong>6.2.1.</strong> The client hereby agrees to indemnify and hold MedLink Analytics LLC and its owners, directors, employees, and contractors harmless from and against all liability, causes of action, damages, fines, assessments, penalties, costs (including reasonable attorney fees) and responsibility of any kind arising from the performance or non-performance of this agreement or any acts or omissions associated.
        </div>

        <div class="doc-paragraph">
            <strong>6.2.2.</strong> To the maximum extent permitted by applicable law, in no event shall either party be liable for special, indirect, incidental, punitive, or consequential damages, whether arising under contract, warranty, or tort (including negligence or strict liability) or any other theory of liability.
        </div>

        <div class="doc-paragraph">
            <strong>6.2.3.</strong> The submission of false, fraudulent, or misleading data, information, or statements to the government and/or commercial third-party payors in connection with health insurance coding, billing and claims submission is a crime and can subject the violator to imprisonment and fines.
        </div>

        <div class="doc-paragraph">
            <strong>6.2.4.</strong> Anything to the contrary contained in this Agreement, neither party shall be liable to the other for any third-party claims even if a party has been apprised of the likelihood of such damages.
        </div>

        <div class="doc-paragraph">
            <strong>6.2.5.</strong> The parties will not incur liability to each other for failing to perform any obligation under this Agreement if such failure results from a force majeure event or any force beyond their reasonable control.
        </div>

        <!-- Section 7: General -->
        <h2 class="section-title">7. GENERAL:</h2>
        
        <h3 class="subsection-title">7.1. Choice of Law and Jurisdiction:</h3>
        <div class="doc-paragraph">
            This agreement is governed by the laws of United States, without regard to its conflict of law provisions.
        </div>

        <h3 class="subsection-title">7.2. Entire Agreement:</h3>
        <div class="doc-paragraph">
            This Agreement constitutes the entire agreement and understanding between the parties concerning the subject matter of this Agreement and supersedes all prior agreements or understandings.
        </div>

        <h3 class="subsection-title">7.3. Notices:</h3>
        <div class="doc-paragraph">
            All communications or notices permitted or required to be given or served under this Agreement shall be in writing via email or postal mailed to the addresses set forth on the first page of this Agreement.
        </div>

        <h3 class="subsection-title">7.4. Counterparts:</h3>
        <div class="doc-paragraph">
            This Agreement may be executed in one or more counterparts, each of which shall constitute all of which shall constitute the same document. Facsimile signatures on any such counterpart shall be binding as originals.
        </div>

        <!-- Signature Section -->
        <div class="signature-section">
            <div class="doc-paragraph" style="font-weight: 600; text-align: center; margin: 30px 0;">
                IN WITNESS WHEREOF, the parties hereto have caused this Agreement to be executed by their respective duly authorized representative as of the Effective Date.
            </div>

            <!-- Covered Entity Signature Block -->
            <div class="signature-block">
                <div class="signature-title">COVERED ENTITY</div>
                
                <div class="signature-field" style="margin-bottom: 20px;">
                    <label class="signature-label">Business Name:</label>
                    <input type="text" class="editable-field full-width" id="businessName4" placeholder="your business name">
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
                        <input type="text" class="editable-field full-width" id="coveredPrintName" placeholder="your name">
                    </div>
                    
                    <div class="signature-field">
                        <label class="signature-label">Title:</label>
                        <input type="text" class="editable-field full-width" id="coveredTitle" placeholder="Title">
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
                        <input type="date" class="date-field" id="businessDate" value="2026-02-17">
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

        // Set today's date and sync business name fields
        document.addEventListener('DOMContentLoaded', function() {
            const today = new Date().toISOString().split('T')[0];
            
            // Initialize both signature canvases
            initSignaturePad('coveredSignatureCanvas');
            initSignaturePad('businessSignatureCanvas');
            
            // Sync all business name fields
            const businessNameFields = ['businessName1', 'businessName2', 'businessName3', 'businessName4'];
            
            businessNameFields.forEach(fieldId => {
                document.getElementById(fieldId).addEventListener('input', function() {
                    const value = this.value;
                    businessNameFields.forEach(id => {
                        if (id !== fieldId) {
                            document.getElementById(id).value = value;
                        }
                    });
                });
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
                agreementDate: document.getElementById('agreementDate').value,
                businessName: document.getElementById('businessName1').value,
                businessAddress: document.getElementById('businessAddress').value,
                coveredPrintName: document.getElementById('coveredPrintName').value,
                coveredTitle: document.getElementById('coveredTitle').value,
                coveredDate: document.getElementById('coveredDate').value
            };
            
            localStorage.setItem('credentialingAgreement', JSON.stringify(formData));
        }

        // Load saved data on page load
        window.addEventListener('load', function() {
            const savedData = localStorage.getItem('credentialingAgreement');
            if (savedData) {
                const formData = JSON.parse(savedData);
                
                if (formData.agreementDate) document.getElementById('agreementDate').value = formData.agreementDate;
                if (formData.businessAddress) document.getElementById('businessAddress').value = formData.businessAddress;
                if (formData.coveredPrintName) document.getElementById('coveredPrintName').value = formData.coveredPrintName;
                if (formData.coveredTitle) document.getElementById('coveredTitle').value = formData.coveredTitle;
                if (formData.coveredDate) document.getElementById('coveredDate').value = formData.coveredDate;
                
                // Sync business name to all fields
                if (formData.businessName) {
                    ['businessName1', 'businessName2', 'businessName3', 'businessName4'].forEach(id => {
                        document.getElementById(id).value = formData.businessName;
                    });
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