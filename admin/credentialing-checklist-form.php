<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Credentialing & Recredentialing Checklist</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 850px;
            margin: 20px auto;
            padding: 20px;
            background: #f5f5f5;
        }
        .form-container {
            background: white;
            padding: 30px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        h1 {
            text-align: center;
            font-size: 18px;
            margin-bottom: 10px;
        }
        .subtitle {
            display: flex;
            justify-content: space-around;
            margin-bottom: 20px;
            font-size: 12px;
        }
        .checkbox-group {
            margin: 20px 0;
        }
        .checkbox-group h3 {
            font-size: 14px;
            margin-bottom: 10px;
        }
        .checkbox-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
            margin-bottom: 5px;
        }
        .checkbox-item {
            display: flex;
            align-items: center;
            gap: 8px;
        }
        input[type="checkbox"] {
            width: 16px;
            height: 16px;
        }
        .section-title {
            font-weight: bold;
            margin-top: 25px;
            margin-bottom: 15px;
            font-size: 14px;
        }
        .field-group {
            margin-bottom: 12px;
        }
        .field-group label {
            display: block;
            font-size: 12px;
            margin-bottom: 3px;
        }
        .field-group input[type="text"] {
            width: 100%;
            padding: 6px;
            border: none;
            border-bottom: 1px solid #333;
            font-size: 12px;
            box-sizing: border-box;
            background: transparent;
        }
        .field-group input[type="text"]:focus {
            outline: none;
            border-bottom: 2px solid #0066cc;
        }
        .two-column {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }
        .required-docs {
            margin-top: 20px;
        }
        .required-docs ul {
            list-style: none;
            padding-left: 0;
            font-size: 12px;
        }
        .required-docs li {
            margin-bottom: 8px;
            padding-left: 20px;
            position: relative;
        }
        .required-docs li:before {
            content: "•";
            position: absolute;
            left: 5px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
            font-size: 12px;
        }
        th {
            background: #f0f0f0;
            padding: 8px;
            text-align: left;
            border: 1px solid #ccc;
            font-weight: bold;
        }
        td {
            padding: 6px;
            border: 1px solid #ccc;
        }
        td input {
            width: 100%;
            border: none;
            padding: 4px;
            font-size: 12px;
            background: transparent;
        }
        td input:focus {
            outline: 1px solid #0066cc;
            background: #f9f9f9;
        }
        .print-btn {
            background: #0066cc;
            color: white;
            border: none;
            padding: 10px 20px;
            margin-top: 20px;
            cursor: pointer;
            font-size: 14px;
            border-radius: 4px;
        }
        .print-btn:hover {
            background: #0052a3;
        }
        @media print {
            body {
                background: white;
            }
            .form-container {
                box-shadow: none;
            }
            .print-btn {
                display: none;
            }
        }
       .body center img {
    max-width: 100%;
}
    </style>
</head>
<body class="body">
    <center>
        <img src="../header-medlinkanalytics.png">
    </center>
    <div class="form-container">
        <h1>CREDENTIALING & RECREDENTIALING CHECKLIST</h1>
        <div class="subtitle">
            <span>Initial Credentialing</span>
            <span>Demographic Updates</span>
            <span>Re Credentialing</span>
            <span>Medical Licensure</span>
        </div>

        <div class="checkbox-group">
            <h3>PROVIDER TYPE (Choose Below)</h3>
            <div class="checkbox-row">
                <div class="checkbox-item">
                    <input type="checkbox" id="physician">
                    <label for="physician">Physician</label>
                </div>
                <div class="checkbox-item">
                    <input type="checkbox" id="dentist">
                    <label for="dentist">Dentist</label>
                </div>
            </div>
            <div class="checkbox-row">
                <div class="checkbox-item">
                    <input type="checkbox" id="therapist">
                    <label for="therapist">Therapist (PT, OT, ST)</label>
                </div>
                <div class="checkbox-item">
                    <input type="checkbox" id="nurse">
                    <label for="nurse">Nurse Practitioner</label>
                </div>
            </div>
            <div class="checkbox-row">
                <div class="checkbox-item">
                    <input type="checkbox" id="behavioral">
                    <label for="behavioral">Behavioral Health Provider</label>
                </div>
                <div class="checkbox-item">
                    <input type="checkbox" id="ancillary">
                    <label for="ancillary">Ancillary Facility (DME, Home Health, etc.)</label>
                </div>
            </div>
            <div class="checkbox-row">
                <div class="checkbox-item">
                    <input type="checkbox" id="other">
                    <label for="other">Other</label>
                </div>
            </div>
        </div>

        <div class="section-title">Provider INFORMATION</div>
        
        <div class="field-group">
            <label>Provider Name:</label>
            <input type="text">
        </div>
        
        <div class="field-group">
            <label>Individual NPI:</label>
            <input type="text">
        </div>
        
        <div class="field-group">
            <label>Provider Cell:</label>
            <input type="text">
        </div>
        
        <div class="field-group">
            <label>Provider Email Address:</label>
            <input type="text">
        </div>

        <div class="section-title">BUSINESS INFORMATION</div>
        
        <div class="field-group">
            <label>Practice Name:</label>
            <input type="text">
        </div>
        
        <div class="field-group">
            <label>Practice NPI:</label>
            <input type="text">
        </div>
        
        <div class="field-group">
            <label>Practice EIN:</label>
            <input type="text">
        </div>
        
        <div class="field-group">
            <label>Service Location Address:</label>
            <input type="text">
        </div>
        
        <div class="field-group">
            <input type="text">
        </div>
        
        <div class="field-group">
            <label>Mailing Address:</label>
            <input type="text">
        </div>
        
        <div class="field-group">
            <label>Billing Address:</label>
            <input type="text">
        </div>
        
        <div class="field-group">
            <input type="text">
        </div>
        
        <div class="field-group">
            <label>Practice Phone #</label>
            <input type="text">
        </div>
        
        <div class="field-group">
            <label>Practice Fax #</label>
            <input type="text">
        </div>

        <div class="section-title">REQUIRED DOCUMENTS Provider INFORMATION</div>
        
        <div class="two-column">
            <div class="field-group">
                <label>CAQH Proview Username:</label>
                <input type="text">
            </div>
            <div class="field-group">
                <label>CAQH Password:</label>
                <input type="text">
            </div>
        </div>
        
        <div class="two-column">
            <div class="field-group">
                <label>NPPES/PECOS Username:</label>
                <input type="text">
            </div>
            <div class="field-group">
                <label>NPPES/PECOS Password:</label>
                <input type="text">
            </div>
        </div>

        <div class="required-docs">
            <ul>
                <li>IRS Letter (It could be your SS-4, CP 575 or 147C)</li>
                <li>Professional State License or Business License</li>
                <li>Degree/Diploma</li>
                <li>Voided Check or Bank Letter (Must contain Exact Name as it is on IRS Letter)</li>
                <li>Professional Liability Insurance Certificate (Malpractice COI)</li>
                <li>Provider Resume in MM/YYYY format</li>
                <li>Board Certification (if applicable)</li>
                <li>DEA Certification (if applicable)</li>
                <li>Scanned Signature – on Blank paper (for the documentation purpose).</li>
            </ul>
        </div>

        <div class="section-title">Credentialing Status</div>
        <div class="section-title">INSURANCE LIST</div>

        <table>
            <thead>
                <tr>
                    <th>Sr. no</th>
                    <th>Insurance</th>
                    <th>Status</th>
                    <th>Provider ID</th>
                    <th>Effective Date</th>
                </tr>
            </thead>
            <tbody>
                <tr><td>1</td><td><input type="text"></td><td><input type="text"></td><td><input type="text"></td><td><input type="text"></td></tr>
                <tr><td>2</td><td><input type="text"></td><td><input type="text"></td><td><input type="text"></td><td><input type="text"></td></tr>
                <tr><td>3</td><td><input type="text"></td><td><input type="text"></td><td><input type="text"></td><td><input type="text"></td></tr>
                <tr><td>4</td><td><input type="text"></td><td><input type="text"></td><td><input type="text"></td><td><input type="text"></td></tr>
                <tr><td>5</td><td><input type="text"></td><td><input type="text"></td><td><input type="text"></td><td><input type="text"></td></tr>
                <tr><td>6</td><td><input type="text"></td><td><input type="text"></td><td><input type="text"></td><td><input type="text"></td></tr>
                <tr><td>7</td><td><input type="text"></td><td><input type="text"></td><td><input type="text"></td><td><input type="text"></td></tr>
                <tr><td>8</td><td><input type="text"></td><td><input type="text"></td><td><input type="text"></td><td><input type="text"></td></tr>
                <tr><td>9</td><td><input type="text"></td><td><input type="text"></td><td><input type="text"></td><td><input type="text"></td></tr>
                <tr><td>10</td><td><input type="text"></td><td><input type="text"></td><td><input type="text"></td><td><input type="text"></td></tr>
                <tr><td>11</td><td><input type="text"></td><td><input type="text"></td><td><input type="text"></td><td><input type="text"></td></tr>
                <tr><td>12</td><td><input type="text"></td><td><input type="text"></td><td><input type="text"></td><td><input type="text"></td></tr>
                <tr><td>13</td><td><input type="text"></td><td><input type="text"></td><td><input type="text"></td><td><input type="text"></td></tr>
                <tr><td>14</td><td><input type="text"></td><td><input type="text"></td><td><input type="text"></td><td><input type="text"></td></tr>
            </tbody>
        </table>
<center>
        <img src="../footer-medlink.png">
    </center>
        <button class="print-btn" onclick="window.print()">Print Form</button>
    </div>
</body>
</html>