<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MedLink Analytics LLC - Employee Appointment Letter</title>
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

        .document-container {
            max-width: 850px;
            margin: 80px auto 40px;
            background: var(--bg-color);
            padding: 60px 80px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
        }

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
            line-height: 1.4;
        }

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

        .letter-meta {
            text-align: right;
            margin-bottom: 30px;
            font-size: 14px;
        }

        .recipient-info {
            margin-bottom: 30px;
            font-size: 14px;
            line-height: 1.8;
        }

        .doc-paragraph {
            margin-bottom: 20px;
            text-align: justify;
            font-size: 14px;
            line-height: 1.8;
        }

        .subject-line {
            font-weight: 700;
            margin: 25px 0;
            text-decoration: underline;
        }

        .section-title {
            font-weight: 700;
            font-size: 15px;
            margin: 20px 0 10px 0;
        }

        .list-item {
            margin: 10px 0 10px 20px;
        }

        .editable-field {
            display: inline-block;
            min-width: 150px;
            padding: 4px 8px;
            border: none;
            border-bottom: 2px solid var(--border-color);
            background: var(--input-bg);
            font-family: inherit;
            font-size: inherit;
        }

        .editable-field:focus {
            outline: none;
            border-bottom-color: var(--primary-color);
            background: #fff;
        }

        .editable-field.medium {
            min-width: 200px;
        }

        .editable-field.wide {
            min-width: 300px;
        }

        .editable-field.full-width {
            width: 100%;
            display: block;
            margin: 5px 0;
        }

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

        .signature-section {
            margin-top: 50px;
        }

        .signature-pad-container {
            position: relative;
            margin: 15px 0;
            max-width: 400px;
        }

        .signature-canvas {
            border: 2px solid var(--border-color);
            cursor: crosshair;
            background: white;
            border-radius: 5px;
            width: 100%;
            height: 120px;
        }

        .signature-controls {
            margin-top: 10px;
            display: flex;
            gap: 10px;
        }

        .clear-btn {
            background: #dc3545;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 4px;
            cursor: pointer;
        }

        .upload-label {
            background: var(--primary-color);
            color: white;
            padding: 8px 16px;
            border-radius: 4px;
            cursor: pointer;
        }

        .upload-input {
            display: none;
        }

        @media print {
            body {
                background: white;
                padding: 0;
            }

            .print-controls, .signature-controls {
                display: none !important;
            }

            .document-container {
                margin: 0;
                box-shadow: none;
                padding: 40px;
            }

            .editable-field, .date-field {
                border-bottom: 1px solid #000;
                background: transparent;
            }

            @page {
                size: letter;
                margin: 0.5in;
            }
        }

        @media (max-width: 768px) {
            .document-container {
                padding: 30px 20px;
                margin: 70px 10px 20px;
            }
        }
        center img{
                max-width: 100% !important;
            }
    </style>
</head>
<body>
    <div class="print-controls">
        <button class="print-btn" onclick="window.print()">🖨️ Print Document</button>
    </div>

    <div class="document-container">
        <div class="document-header">
            <div class="document-header">
            <center style="max-width: 100% !important;">
            <img src="../header-medlinkanalytics.png" alt="MedLink Analytics Header">
            </center>
        </div>
            <div class="company-info">
                <strong>MedLink Analytics LLC</strong><br>
                1500 N Grant St STE 28340, Denver, Colorado 80203<br>
                contact@medlinkanalytics.com | +1 719-204-5597
            </div>
        </div>

        <h1 class="document-title">Employee Appointment Letter</h1>

        <div class="letter-meta">
            <div><strong>Date:</strong> <input type="date" class="date-field" id="letterDate"></div>
            <div><strong>Ref:</strong> <input type="text" class="editable-field" id="refNumber" placeholder="ML/HR/2026/001"></div>
        </div>

        <div class="recipient-info">
            <strong>To,</strong><br>
            <input type="text" class="editable-field wide" id="employeeName" placeholder="Employee Full Name"><br>
            <input type="text" class="editable-field full-width" id="employeeAddress1" placeholder="Address Line 1"><br>
            <input type="text" class="editable-field full-width" id="employeeAddress2" placeholder="Address Line 2"><br>
            <input type="text" class="editable-field medium" id="employeeCity" placeholder="City">, 
            <input type="text" class="editable-field" id="employeeState" placeholder="State"> 
            <input type="text" class="editable-field" id="employeeZip" placeholder="ZIP">
        </div>

        <div class="subject-line">Subject: Letter of Appointment</div>

        <div class="doc-paragraph">
            Dear <input type="text" class="editable-field medium" id="employeeFirstName" placeholder="First Name">,
        </div>

        <div class="doc-paragraph">
            We are pleased to offer you employment with <strong>MedLink Analytics LLC</strong> in the position of 
            <input type="text" class="editable-field wide" id="position" placeholder="Position Title">. 
            We believe that your skills, experience, and enthusiasm will be a valuable addition to our team.
        </div>

        <div class="section-title">1. Position and Duties:</div>
        <div class="doc-paragraph">
            Your position will be <input type="text" class="editable-field wide" id="positionTitle" placeholder="Position">, 
            reporting to <input type="text" class="editable-field medium" id="reportingTo" placeholder="Manager">. 
            Your responsibilities will include <input type="text" class="editable-field full-width" id="responsibilities" placeholder="Key responsibilities">.
        </div>

        <div class="section-title">2. Start Date:</div>
        <div class="doc-paragraph">
            Your employment will commence on <input type="date" class="date-field" id="startDate">. 
            Please report at <input type="text" class="editable-field" id="reportTime" placeholder="9:00 AM">.
        </div>

        <div class="section-title">3. Compensation:</div>
        <div class="doc-paragraph">
            Your starting salary will be <strong>$<input type="text" class="editable-field" id="salary" placeholder="50,000"></strong> 
            per <input type="text" class="editable-field" id="salaryPeriod" placeholder="annum">, 
            payable according to company payroll practices, subject to applicable tax deductions.
        </div>

        <div class="section-title">4. Benefits:</div>
        <div class="doc-paragraph">As an employee, you will be entitled to:</div>
        <div class="list-item">• Health insurance coverage (medical, dental, vision)</div>
        <div class="list-item">• Paid time off (PTO) per company policy</div>
        <div class="list-item">• Professional development opportunities</div>
        <div class="list-item">• Other benefits as outlined in employee handbook</div>

        <div class="section-title">5. Working Hours:</div>
        <div class="doc-paragraph">
            Normal working hours: <input type="text" class="editable-field" id="workHours" placeholder="40"> hours/week, 
            <input type="text" class="editable-field" id="workStartTime" placeholder="9:00 AM"> to 
            <input type="text" class="editable-field" id="workEndTime" placeholder="5:00 PM">, Monday-Friday.
        </div>

        <div class="section-title">6. Probation Period:</div>
        <div class="doc-paragraph">
            Employment subject to <input type="text" class="editable-field" id="probationPeriod" placeholder="90"> days probation. 
            Either party may terminate with <input type="text" class="editable-field" id="probationNotice" placeholder="one week's"> notice.
        </div>

        <div class="section-title">7. Employment Type:</div>
        <div class="doc-paragraph">
            This is a <input type="text" class="editable-field" id="employmentType" placeholder="full-time"> at-will position.
        </div>

        <div class="section-title">8. Confidentiality:</div>
        <div class="doc-paragraph">
            You agree to maintain confidentiality of proprietary information during and after employment.
        </div>

        <div class="section-title">9. Code of Conduct:</div>
        <div class="doc-paragraph">
            You must comply with all company policies and standards of conduct.
        </div>

        <div class="section-title">10. Acceptance:</div>
        <div class="doc-paragraph">
            Please confirm acceptance by <input type="date" class="date-field" id="acceptanceDeadline">.
        </div>

        <div style="margin-top: 30px;">
            <div class="doc-paragraph">
                We are excited to welcome you to MedLink Analytics LLC. Congratulations on your appointment!
            </div>
            <div class="doc-paragraph">Sincerely,</div>
        </div>

        <div class="signature-section">
             <img src="ceo-signature.png">
            <div style="margin-top: 15px;">
                <div style="font-weight: 600;"><input type="text" class="editable-field medium" id="ceoName" value="Adnan Murad"></div>
                <div style="color: #666;"><input type="text" class="editable-field medium" id="ceoTitle" value="Founder and CEO"></div>
                <div style="color: #666;">MedLink Analytics LLC</div>
            </div>
        </div>

        <div style="margin-top: 50px; padding-top: 30px; border-top: 2px solid #e0e0e0;">
            <div style="font-weight: 600; margin-bottom: 20px;">EMPLOYEE ACKNOWLEDGMENT</div>
            <div class="doc-paragraph">
                I, <input type="text" class="editable-field medium" id="ackName" placeholder="Employee Name">, 
                accept the position of <input type="text" class="editable-field medium" id="ackPosition" placeholder="Position"> 
                and agree to comply with company policies.
            </div>
            <div style="margin-top: 30px;">
                <div style="display: inline-block; margin-right: 50px;">
                    <div style="border-bottom: 2px solid #000; min-width: 250px; padding: 5px;">
                        <input type="text" class="editable-field" placeholder="Employee Name" style="border: none; background: transparent;">
                    </div>
                    <div style="font-size: 13px; margin-top: 5px;">Employee Signature</div>
                </div>
                <div style="display: inline-block;">
                    <div style="border-bottom: 2px solid #000; min-width: 150px; padding: 5px;">
                        <input type="date" class="date-field" style="border: none; background: transparent;">
                    </div>
                    <div style="font-size: 13px; margin-top: 5px;">Date</div>
                </div>
            </div>
        </div>
        <center>
                    <img src="../footer-medlink.png">
            </center>
    </div>

    <script>
        let canvas, ctx, isDrawing = false, lastX = 0, lastY = 0;

        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('letterDate').value = new Date().toISOString().split('T')[0];
            initSignature();
            
            document.getElementById('employeeName').addEventListener('input', function() {
                document.getElementById('ackName').value = this.value;
            });
            
            document.getElementById('position').addEventListener('input', function() {
                document.getElementById('positionTitle').value = this.value;
                document.getElementById('ackPosition').value = this.value;
            });
        });

        function initSignature() {
            canvas = document.getElementById('ceoSignatureCanvas');
            ctx = canvas.getContext('2d');
            ctx.fillStyle = 'white';
            ctx.fillRect(0, 0, canvas.width, canvas.height);
            ctx.strokeStyle = '#000';
            ctx.lineWidth = 2;
            ctx.lineCap = 'round';

            canvas.addEventListener('mousedown', start);
            canvas.addEventListener('mousemove', draw);
            canvas.addEventListener('mouseup', stop);
            canvas.addEventListener('mouseout', stop);
        }

        function start(e) {
            isDrawing = true;
            const rect = canvas.getBoundingClientRect();
            lastX = e.clientX - rect.left;
            lastY = e.clientY - rect.top;
        }

        function draw(e) {
            if (!isDrawing) return;
            const rect = canvas.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;
            ctx.beginPath();
            ctx.moveTo(lastX, lastY);
            ctx.lineTo(x, y);
            ctx.stroke();
            lastX = x;
            lastY = y;
        }

        function stop() {
            isDrawing = false;
        }

        function clearSignature() {
            ctx.fillStyle = 'white';
            ctx.fillRect(0, 0, canvas.width, canvas.height);
        }

        function uploadSignature(event) {
            const file = event.target.files[0];
            if (!file) return;
            const reader = new FileReader();
            reader.onload = function(e) {
                const img = new Image();
                img.onload = function() {
                    ctx.fillStyle = 'white';
                    ctx.fillRect(0, 0, canvas.width, canvas.height);
                    const scale = Math.min(canvas.width / img.width, canvas.height / img.height);
                    const x = (canvas.width - img.width * scale) / 2;
                    const y = (canvas.height - img.height * scale) / 2;
                    ctx.drawImage(img, x, y, img.width * scale, img.height * scale);
                };
                img.src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    </script>
</body>
</html>