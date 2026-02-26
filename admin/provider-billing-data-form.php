<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Provider Data Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 900px;
            margin: 20px auto;
            padding: 20px;
            background: #f5f5f5;
        }
        .form-container {
            background: white;
            padding: 30px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .intro-text {
            font-size: 13px;
            line-height: 1.6;
            margin-bottom: 25px;
            color: #333;
        }
        .section-title {
            font-weight: bold;
            margin-top: 25px;
            margin-bottom: 15px;
            font-size: 15px;
        }
        .field-group {
            margin-bottom: 15px;
        }
        .field-group label {
            display: block;
            font-size: 13px;
            margin-bottom: 3px;
        }
        .field-group input[type="text"] {
            width: 100%;
            padding: 6px;
            border: none;
            border-bottom: 1px solid #333;
            font-size: 13px;
            box-sizing: border-box;
            background: transparent;
        }
        .field-group input[type="text"]:focus {
            outline: none;
            border-bottom: 2px solid #0066cc;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
            margin-bottom: 25px;
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
        <div class="intro-text">
            In the following section, we will require the following information to complete the onboarding process.
            Our billing team will be responsible for on-time and accurate billing, working on any denials,
            performing audits, and qualifying patients.
        </div>

        <div class="field-group">
            <label>Clearinghouse / Billing *</label>
            <input type="text">
        </div>

        <div class="field-group">
            <label>Billing Platform (PM and EHR) *</label>
            <input type="text">
        </div>

        <div class="section-title">Basic Information</div>

        <div class="field-group">
            <label>Tax ID</label>
            <input type="text">
        </div>

        <div class="field-group">
            <label>Group NPI *</label>
            <input type="text">
        </div>

        <div class="field-group">
            <label>Billing Address*</label>
            <input type="text">
        </div>

        <div class="field-group">
            <label>Services Address*</label>
            <input type="text">
        </div>

        <div class="field-group">
            <label>Remit/ Pay to Address:</label>
            <input type="text">
        </div>

        <div class="field-group">
            <label>Medicare PTAN(s)</label>
            <input type="text">
        </div>

        <div class="field-group">
            <label>Numbers of Providers</label>
            <input type="text">
        </div>

        <div class="section-title">Credentialing Status</div>

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
                <tr><td>15</td><td><input type="text"></td><td><input type="text"></td><td><input type="text"></td><td><input type="text"></td></tr>
                <tr><td>16</td><td><input type="text"></td><td><input type="text"></td><td><input type="text"></td><td><input type="text"></td></tr>
                <tr><td>17</td><td><input type="text"></td><td><input type="text"></td><td><input type="text"></td><td><input type="text"></td></tr>
                <tr><td>18</td><td><input type="text"></td><td><input type="text"></td><td><input type="text"></td><td><input type="text"></td></tr>
                <tr><td>19</td><td><input type="text"></td><td><input type="text"></td><td><input type="text"></td><td><input type="text"></td></tr>
                <tr><td>20</td><td><input type="text"></td><td><input type="text"></td><td><input type="text"></td><td><input type="text"></td></tr>
                <tr><td>21</td><td><input type="text"></td><td><input type="text"></td><td><input type="text"></td><td><input type="text"></td></tr>
                <tr><td>22</td><td><input type="text"></td><td><input type="text"></td><td><input type="text"></td><td><input type="text"></td></tr>
                <tr><td>23</td><td><input type="text"></td><td><input type="text"></td><td><input type="text"></td><td><input type="text"></td></tr>
                <tr><td>24</td><td><input type="text"></td><td><input type="text"></td><td><input type="text"></td><td><input type="text"></td></tr>
                <tr><td>25</td><td><input type="text"></td><td><input type="text"></td><td><input type="text"></td><td><input type="text"></td></tr>
                <tr><td>26</td><td><input type="text"></td><td><input type="text"></td><td><input type="text"></td><td><input type="text"></td></tr>
                <tr><td>27</td><td><input type="text"></td><td><input type="text"></td><td><input type="text"></td><td><input type="text"></td></tr>
                <tr><td>28</td><td><input type="text"></td><td><input type="text"></td><td><input type="text"></td><td><input type="text"></td></tr>
            </tbody>
        </table>

        <div class="section-title">Individual Provider Information</div>

        <table>
            <thead>
                <tr>
                    <th>Sr. no</th>
                    <th>Name</th>
                    <th>Specialty</th>
                    <th>Individual NPI</th>
                    <th>SSN</th>
                </tr>
            </thead>
            <tbody>
                <tr><td>1</td><td><input type="text"></td><td><input type="text"></td><td><input type="text"></td><td><input type="text"></td></tr>
                <tr><td>2</td><td><input type="text"></td><td><input type="text"></td><td><input type="text"></td><td><input type="text"></td></tr>
                <tr><td>3</td><td><input type="text"></td><td><input type="text"></td><td><input type="text"></td><td><input type="text"></td></tr>
                <tr><td>4</td><td><input type="text"></td><td><input type="text"></td><td><input type="text"></td><td><input type="text"></td></tr>
                <tr><td>5</td><td><input type="text"></td><td><input type="text"></td><td><input type="text"></td><td><input type="text"></td></tr>
                <tr><td>6</td><td><input type="text"></td><td><input type="text"></td><td><input type="text"></td><td><input type="text"></td></tr>
            </tbody>
        </table>

        <div class="section-title">Access to Billing Software</div>

        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Password</th>
                </tr>
            </thead>
            <tbody>
                <tr><td>Clearinghouse/Billing Access</td><td><input type="text"></td><td><input type="text"></td></tr>
                <tr><td>PM Access</td><td><input type="text"></td><td><input type="text"></td></tr>
                <tr><td>EHR Access</td><td><input type="text"></td><td><input type="text"></td></tr>
            </tbody>
        </table>
        <center>
        <img src="../footer-medlink.png">
    </center>

        <button class="print-btn" onclick="window.print()">Print Form</button>
    </div>
     
</body>
</html>