<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salary Slip - MedLink Analytics</title>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wgt@400;500;600;700&family=JetBrains+Mono:wght@400;600&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary: #0066cc;
            --primary-dark: #004d99;
            --secondary: #00a86b;
            --accent: #ff6b35;
            --bg-main: #f8f9fc;
            --bg-card: #ffffff;
            --text-primary: #1a2332;
            --text-secondary: #5a6c84;
            --border: #e1e8ed;
            --shadow: rgba(26, 35, 50, 0.08);
            --shadow-lg: rgba(26, 35, 50, 0.12);
        }

        body {
            font-family: 'IBM Plex Sans', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 2rem;
            color: var(--text-primary);
            animation: gradientShift 15s ease infinite;
            background-size: 200% 200%;
        }

        @keyframes gradientShift {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }

        .container {
            max-width: 900px;
            margin: 0 auto;
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

        .controls {
            background: var(--bg-card);
            padding: 1.5rem;
            border-radius: 16px;
            margin-bottom: 2rem;
            box-shadow: 0 8px 32px var(--shadow-lg);
            border: 1px solid rgba(255, 255, 255, 0.6);
            backdrop-filter: blur(10px);
        }

        .controls h3 {
            color: var(--primary-dark);
            margin-bottom: 1rem;
            font-size: 1.1rem;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .controls h3::before {
            content: '⚙️';
            font-size: 1.2rem;
        }

        .employee-selector {
            margin-bottom: 1.5rem;
            padding: 1rem;
            background: var(--bg-main);
            border-radius: 8px;
            border: 1px solid var(--border);
        }

        .employee-selector label {
            display: block;
            font-weight: 600;
            color: var(--text-primary);
            margin-bottom: 0.5rem;
            font-size: 0.95rem;
        }

        .employee-selector select {
            width: 100%;
            padding: 0.75rem;
            border: 2px solid var(--border);
            border-radius: 6px;
            font-family: 'IBM Plex Sans', sans-serif;
            font-size: 1rem;
            font-weight: 500;
            color: var(--text-primary);
            background: white;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .employee-selector select:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(0, 102, 204, 0.1);
        }

        .btn-group {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .btn {
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: 8px;
            font-family: 'IBM Plex Sans', sans-serif;
            font-size: 0.95rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            color: white;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(0, 102, 204, 0.4);
        }

        .btn-secondary {
            background: var(--secondary);
            color: white;
        }

        .btn-secondary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(0, 168, 107, 0.4);
        }

        .btn-accent {
            background: var(--accent);
            color: white;
        }

        .btn-accent:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(255, 107, 53, 0.4);
        }

        .salary-slip {
            background: var(--bg-card);
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 20px 60px var(--shadow-lg);
            border: 1px solid var(--border);
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

        .slip-header {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            color: white;
            position: relative;
            overflow: hidden;
        }

        .slip-header::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -10%;
            width: 300px;
            height: 300px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            animation: float 6s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(180deg); }
        }

        .slip-header::after {
            content: '';
            position: absolute;
            bottom: -30%;
            left: -5%;
            width: 200px;
            height: 200px;
            background: rgba(255, 255, 255, 0.08);
            border-radius: 50%;
            animation: float 8s ease-in-out infinite reverse;
        }

        .company-info img,
        .slip-footer img {
            max-width: 100%;
        }

        .company-info {
            position: relative;
            z-index: 1;
        }

        .slip-title {
            text-align: center;
            padding: 1.5rem 2rem;
            background: var(--bg-main);
            border-bottom: 2px solid var(--border);
        }

        .slip-title h2 {
            font-size: 1.5rem;
            color: var(--primary-dark);
            font-weight: 700;
            margin-bottom: 0.75rem;
        }

        .date-info {
            display: flex;
            justify-content: center;
            gap: 2rem;
            margin-top: 0.75rem;
            flex-wrap: wrap;
        }

        .date-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 0.25rem;
        }

        .date-label {
            font-size: 0.8rem;
            color: var(--text-secondary);
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .date-value {
            font-size: 0.95rem;
            color: var(--text-primary);
            font-family: 'JetBrains Mono', monospace;
            font-weight: 600;
            padding: 0.4rem 0.8rem;
            background: white;
            border-radius: 4px;
            border: 1px solid var(--border);
        }

        /* Date selector specific styles */
        .date-select, .date-input {
            font-size: 0.95rem;
            color: var(--text-primary);
            font-family: 'JetBrains Mono', monospace;
            font-weight: 600;
            padding: 0.4rem 0.8rem;
            background: white;
            border-radius: 4px;
            border: 2px solid var(--border);
            cursor: pointer;
            transition: all 0.2s ease;
            min-width: 140px;
        }

        .date-select:focus, .date-input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(0, 102, 204, 0.1);
        }

        .date-select:hover, .date-input:hover {
            border-color: var(--primary-dark);
        }

        /* Date input calendar icon styling */
        .date-input::-webkit-calendar-picker-indicator {
            cursor: pointer;
            filter: invert(0.5);
        }

        .date-input::-webkit-calendar-picker-indicator:hover {
            filter: invert(0.3);
        }

        .slip-body {
            padding: 2rem;
        }

        .section {
            margin-bottom: 2rem;
        }

        .section-title {
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--primary-dark);
            margin-bottom: 1rem;
            padding-bottom: 0.5rem;
            border-bottom: 2px solid var(--primary);
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1rem;
        }

        .info-item {
            display: flex;
            flex-direction: column;
            gap: 0.25rem;
        }

        .info-label {
            font-size: 0.85rem;
            color: var(--text-secondary);
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .info-value {
            font-size: 1rem;
            color: var(--text-primary);
            font-weight: 600;
            padding: 0.5rem;
            background: var(--bg-main);
            border-radius: 6px;
            border: 1px solid var(--border);
            transition: all 0.2s ease;
            min-height: 40px;
            display: flex;
            align-items: center;
        }

        .info-value:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(0, 102, 204, 0.1);
        }

        .earnings-table, .deductions-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1rem;
        }

        .earnings-table th, .deductions-table th {
            background: var(--bg-main);
            padding: 0.75rem;
            text-align: left;
            font-weight: 600;
            color: var(--text-primary);
            border-bottom: 2px solid var(--border);
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .earnings-table td, .deductions-table td {
            padding: 0.75rem;
            border-bottom: 1px solid var(--border);
        }

        .earnings-table tbody tr:hover, .deductions-table tbody tr:hover {
            background: var(--bg-main);
            transition: background 0.2s ease;
        }

        .editable-cell {
            background: white;
            border: 1px solid var(--border);
            padding: 0.5rem;
            border-radius: 4px;
            font-family: 'JetBrains Mono', monospace;
            font-size: 0.95rem;
            transition: all 0.2s ease;
        }

        .editable-cell:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(0, 102, 204, 0.1);
        }

        .amount-cell {
            text-align: right;
            font-family: 'JetBrains Mono', monospace;
            font-weight: 600;
            color: var(--secondary);
        }

        .summary {
            background: linear-gradient(135deg, var(--bg-main) 0%, #e8eef5 100%);
            padding: 1.5rem;
            border-radius: 12px;
            margin-top: 2rem;
            border: 2px solid var(--border);
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            padding: 0.75rem 0;
            font-size: 1rem;
        }

        .summary-row.total {
            border-top: 3px solid var(--primary);
            margin-top: 0.75rem;
            padding-top: 1rem;
            font-size: 1.3rem;
            font-weight: 700;
            color: var(--primary-dark);
        }

        .summary-label {
            font-weight: 600;
            color: var(--text-primary);
        }

        .summary-value {
            font-family: 'JetBrains Mono', monospace;
            font-weight: 700;
            color: var(--secondary);
        }

        .summary-row.total .summary-value {
            color: var(--primary-dark);
            font-size: 1.5rem;
        }

        .slip-footer {
            background: var(--bg-main);
            padding: 2rem;
            border-top: 2px solid var(--border);
            text-align: center;
            color: var(--text-secondary);
            font-size: 0.85rem;
        }

        .slip-footer p {
            margin-bottom: 0.5rem;
        }

        .add-row-btn {
            margin-top: 0.75rem;
            padding: 0.5rem 1rem;
            background: var(--primary);
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-family: 'IBM Plex Sans', sans-serif;
            font-size: 0.85rem;
            font-weight: 600;
            transition: all 0.2s ease;
        }

        .add-row-btn:hover {
            background: var(--primary-dark);
            transform: translateY(-1px);
        }

        .delete-row-btn {
            background: var(--accent);
            color: white;
            border: none;
            padding: 0.4rem 0.75rem;
            border-radius: 4px;
            cursor: pointer;
            font-size: 0.75rem;
            font-weight: 600;
            transition: all 0.2s ease;
        }

        .delete-row-btn:hover {
            background: #ff4500;
            transform: scale(1.05);
        }

        .loading {
            text-align: center;
            padding: 1rem;
            color: var(--text-secondary);
            font-style: italic;
        }

        @media print {
            body {
                background: white;
                padding: 0;
            }
            .controls {
                display: none;
            }
            .salary-slip {
                box-shadow: none;
                border: 1px solid var(--border);
            }
            .delete-row-btn, .add-row-btn {
                display: none;
            }
            .slip-footer {
                page-break-inside: avoid;
            }
            /* Hide interactive date elements in print */
            .date-select, .date-input {
                border: none;
                background: transparent;
                appearance: none;
                -webkit-appearance: none;
                -moz-appearance: none;
            }
            @page {
                margin: 0.5cm;
            }
        }

        @media (max-width: 768px) {
            body {
                padding: 1rem;
            }
            .info-grid {
                grid-template-columns: 1fr;
            }
            .btn-group {
                flex-direction: column;
            }
            .btn {
                width: 100%;
                justify-content: center;
            }
            .date-info {
                gap: 1rem;
            }
            .date-select, .date-input {
                min-width: 120px;
                font-size: 0.85rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="controls">
            <h3>Controls</h3>
            
            <!-- Employee Selector -->
            <div class="employee-selector">
                <label for="employeeSelect">Select Employee ID:</label>
                <select id="employeeSelect" onchange="loadEmployeeData()">
                    <option value="">-- Select Employee --</option>
                    <option value="0001">0001 - Adnan Murad</option>
                    <option value="0002">0002 - Abid Murad</option>
                    <option value="0003">0003 - Sardar Ali</option>
                    <option value="0004">0004 - Kashif</option>
                    <option value="0005">0005 - Qasim Baig</option>
                    <option value="0006">0006 - Waqar</option>
                    <option value="0007">0007 - Azhar Ali</option>
                    <option value="0008">0008 - Zakir Ali</option>
                </select>
            </div>

            <div class="btn-group">
                <button class="btn btn-primary" onclick="toggleEdit()">
                    <span>📝</span> Toggle Edit Mode
                </button>
                <button class="btn btn-secondary" onclick="window.print()">
                    <span>🖨️</span> Print Slip
                </button>
                <button class="btn btn-accent" onclick="resetSlip()">
                    <span>🔄</span> Reset
                </button>
            </div>
        </div>

        <div class="salary-slip" id="salarySlip">
            <div class="slip-header">
                <div class="company-info">
                    <img src="../header-medlink.png" alt="MedLink Analytics">
                </div>
            </div>

            <div class="slip-title">
                <h2>SALARY SLIP</h2>
                <div class="date-info">
                    <div class="date-item">
                        <span class="date-label">Month</span>
                        <select class="date-value date-select" id="salaryMonth">
                            <option value="January">January</option>
                            <option value="February">February</option>
                            <option value="March">March</option>
                            <option value="April">April</option>
                            <option value="May">May</option>
                            <option value="June">June</option>
                            <option value="July">July</option>
                            <option value="August">August</option>
                            <option value="September">September</option>
                            <option value="October">October</option>
                            <option value="November">November</option>
                            <option value="December">December</option>
                        </select>
                    </div>
                    <div class="date-item">
                        <span class="date-label">Year</span>
                        <select class="date-value date-select" id="salaryYear">
                            <!-- Years will be populated by JavaScript -->
                        </select>
                    </div>
                    <div class="date-item">
                        <span class="date-label">Pay Date</span>
                        <input type="date" class="date-value date-input" id="payDate" value="2026-01-31">
                    </div>
                </div>
            </div>

            <div class="slip-body">
                <!-- Employee Information -->
                <div class="section">
                    <h3 class="section-title">
                        <span>👤</span> Employee Information
                    </h3>
                    <div class="info-grid">
                        <div class="info-item">
                            <label class="info-label">Employee ID</label>
                            <div class="info-value" id="empId">-</div>
                        </div>
                        <div class="info-item">
                            <label class="info-label">Employee Name</label>
                            <div class="info-value" id="empName">-</div>
                        </div>
                        <div class="info-item">
                            <label class="info-label">Designation</label>
                            <div class="info-value" id="designation">-</div>
                        </div>
                        <div class="info-item">
                            <label class="info-label">Department</label>
                            <div class="info-value" id="department">-</div>
                        </div>
                        <div class="info-item">
                            <label class="info-label">Date of Joining</label>
                            <div class="info-value" id="doj">-</div>
                        </div>
                        <div class="info-item">
                            <label class="info-label">Bank Account</label>
                            <div class="info-value" id="bankAccount">-</div>
                        </div>
                    </div>
                </div>

                <!-- Earnings -->
                <div class="section">
                    <h3 class="section-title">
                        <span>💰</span> Earnings
                    </h3>
                    <table class="earnings-table">
                        <thead>
                            <tr>
                                <th>Description</th>
                                <th style="text-align: right;">Amount ($)</th>
                                <th style="width: 80px; text-align: center;">Action</th>
                            </tr>
                        </thead>
                        <tbody id="earningsBody">
                            <tr>
                                <td colspan="3" class="loading">Select an employee to view earnings</td>
                            </tr>
                        </tbody>
                    </table>
                    <button class="add-row-btn" onclick="addEarningRow()">+ Add Earning</button>
                </div>

                <!-- Deductions -->
                <div class="section">
                    <h3 class="section-title">
                        <span>📉</span> Deductions
                    </h3>
                    <table class="deductions-table">
                        <thead>
                            <tr>
                                <th>Description</th>
                                <th style="text-align: right;">Amount ($)</th>
                                <th style="width: 80px; text-align: center;">Action</th>
                            </tr>
                        </thead>
                        <tbody id="deductionsBody">
                            <tr>
                                <td colspan="3" class="loading">Select an employee to view deductions</td>
                            </tr>
                        </tbody>
                    </table>
                    <button class="add-row-btn" onclick="addDeductionRow()">+ Add Deduction</button>
                </div>

                <!-- Summary -->
                <div class="summary">
                    <div class="summary-row">
                        <span class="summary-label">Total Earnings:</span>
                        <span class="summary-value" id="totalEarnings">$0.00</span>
                    </div>
                    <div class="summary-row">
                        <span class="summary-label">Total Deductions:</span>
                        <span class="summary-value" id="totalDeductions">$0.00</span>
                    </div>
                    <div class="summary-row total">
                        <span class="summary-label">Net Salary:</span>
                        <span class="summary-value" id="netSalary">$0.00</span>
                    </div>
                </div>
            </div>

            <div class="slip-footer">
                <img src="../header-medlink.png" alt="MedLink Analytics">
            </div>
        </div>
    </div>

    <script>
        let editMode = true;

        // Initialize year dropdown with years from 2026 onwards
        function initializeYearDropdown() {
            const yearSelect = document.getElementById('salaryYear');
            const currentYear = 2026;
            const numberOfYears = 50; // Show 50 years from 2026
            
            for (let i = 0; i < numberOfYears; i++) {
                const year = currentYear + i;
                const option = document.createElement('option');
                option.value = year;
                option.textContent = year;
                if (year === currentYear) {
                    option.selected = true;
                }
                yearSelect.appendChild(option);
            }
        }

        // Mock database - Replace this with actual database calls
        const employeeDatabase = {
            "0001": {
                name: "Adnan Murad",
                designation: "Chief Executive Officer",
                department: "Billing",
                doj: "11/07/2025",
                bankAccount: "+92 318 8187773",
                earnings: [
                    { description: "Basic Salary", amount: 50000 },
                    { description: "House Rent Allowance", amount: 00 },
                    { description: "Medical Allowance", amount: 00 },
                    { description: "Performance Bonus", amount: 00 }
                ],
                deductions: [
                    { description: "Tax Deduction", amount: 00 },
                    { description: "Insurance", amount: 00 },
                    { description: "Provident Fund", amount: 00 }
                ]
            },
            "0002": {
                name: "Abid Murad",
                designation: "Senior Credentialling Expert",
                department: "Credentialling",
                doj: "11/07/2025",
                bankAccount: "+92 316 1883266",
                earnings: [
                    { description: "Basic Salary", amount: 50000 },
                    { description: "House Rent Allowance", amount: 00 },
                    { description: "Medical Allowance", amount: 00 },
                    { description: "Performance Bonus", amount: 00 }
                ],
                deductions: [
                    { description: "Tax Deduction", amount: 00 },
                    { description: "Insurance", amount: 00 },
                    { description: "Provident Fund", amount: 00 }
                ]
            },
            "0003": {
                name: "Sardar Ali",
                designation: "-",
                department: "Medical Billing",
                doj: "12/08/2025",
                bankAccount: "6986529308714110343",
                earnings: [
                    { description: "Basic Salary", amount: 50000 },
                    { description: "House Rent Allowance", amount: 3000 },
                    { description: "Medical Allowance", amount: 00 },
                    { description: "Performance Bonus", amount: 00 },
                    { description: "Management Allowance", amount: 00 }
                ],
                deductions: [
                    { description: "Tax Deduction", amount: 00 },
                    { description: "Insurance", amount: 00 },
                    { description: "Provident Fund", amount: 00 }
                ]
            },
            "0004": {
                name: "Kashif Khan",
                designation: "-",
                department: "Medical Billing",
                doj: "11/10/2025",
                bankAccount: "31473910000031-30",
                earnings: [
                    { description: "Basic Salary", amount: 50000 },
                    { description: "House Rent Allowance", amount: 00 },
                    { description: "Medical Allowance", amount: 00 },
                    { description: "Performance Bonus", amount: 00 }
                ],
                deductions: [
                    { description: "Tax Deduction", amount: 00 },
                    { description: "Insurance", amount: 00 },
                    { description: "Provident Fund", amount: 00 }
                ]
            },
            "0005": {
                name: "Qasim Baig",
                designation: "-",
                department: "Medical Billing",
                doj: "11/10/2025",
                bankAccount: "21774181814279",
                earnings: [
                    { description: "Basic Salary", amount: 50000 },
                    { description: "House Rent Allowance", amount: 00 },
                    { description: "Medical Allowance", amount: 00 },
                    { description: "Performance Bonus", amount: 00 },
                    { description: "Management Allowance", amount: 00 }
                ],
                deductions: [
                    { description: "Tax Deduction", amount: 00 },
                    { description: "Insurance", amount: 00 },
                    { description: "Provident Fund", amount: 00 }
                ]
            },
            "0006": {
                name: "Waqar",
                designation: "-",
                department: "Medical Coding",
                doj: "12/22/2025",
                bankAccount: "217741816276-32",
                earnings: [
                    { description: "Basic Salary", amount: 50000 },
                    { description: "House Rent Allowance", amount: 00 },
                    { description: "Medical Allowance", amount: 00 }
                ],
                deductions: [
                    { description: "Tax Deduction", amount: 00 },
                    { description: "Insurance", amount: 00 },
                    { description: "Provident Fund", amount: 00 }
                ]
            },
            "0007": {
                name: "Azhar Ali",
                designation: "-",
                department: "Medical Billing",
                doj: "01/12/20236",
                bankAccount: "+923554214775",
                earnings: [
                    { description: "Basic Salary", amount: 50000 },
                    { description: "House Rent Allowance", amount: 00 },
                    { description: "Medical Allowance", amount: 00 },
                    { description: "Performance Bonus", amount: 00 }
                ],
                deductions: [
                    { description: "Tax Deduction", amount: 00 },
                    { description: "Insurance", amount: 00 },
                    { description: "Provident Fund", amount: 00 }
                ]
            },
            "0008": {
                name: "Zakir Ali",
                designation: "-",
                department: "Operations",
                doj: "09/11/2025",
                bankAccount: "03491899706",
                earnings: [
                    { description: "Basic Salary", amount: 50000 },
                    { description: "House Rent Allowance", amount: 00 },
                    { description: "Medical Allowance", amount: 00 },
                    { description: "Performance Bonus", amount: 00 }
                ],
                deductions: [
                    { description: "Tax Deduction", amount: 00 },
                    { description: "Insurance", amount: 00 },
                    { description: "Provident Fund", amount: 00 }
                ]
            }
        };

        // Function to load employee data from "database"
        function loadEmployeeData() {
            const empId = document.getElementById('employeeSelect').value;
            
            if (!empId) {
                clearSlip();
                return;
            }

            const employee = employeeDatabase[empId];
            
            if (!employee) {
                alert('Employee data not found!');
                return;
            }

            // Populate employee information
            document.getElementById('empId').textContent = empId;
            document.getElementById('empName').textContent = employee.name;
            document.getElementById('designation').textContent = employee.designation;
            document.getElementById('department').textContent = employee.department;
            document.getElementById('doj').textContent = employee.doj;
            document.getElementById('bankAccount').textContent = employee.bankAccount;

            // Populate earnings table
            const earningsBody = document.getElementById('earningsBody');
            earningsBody.innerHTML = '';
            employee.earnings.forEach(earning => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td><input type="text" class="editable-cell" value="${earning.description}" style="width: 100%;"></td>
                    <td class="amount-cell"><input type="number" class="editable-cell" value="${earning.amount}" style="width: 100%; text-align: right;" onchange="calculateTotal()"></td>
                    <td style="text-align: center;"><button class="delete-row-btn" onclick="deleteRow(this)">Delete</button></td>
                `;
                earningsBody.appendChild(row);
            });

            // Populate deductions table
            const deductionsBody = document.getElementById('deductionsBody');
            deductionsBody.innerHTML = '';
            employee.deductions.forEach(deduction => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td><input type="text" class="editable-cell" value="${deduction.description}" style="width: 100%;"></td>
                    <td class="amount-cell"><input type="number" class="editable-cell" value="${deduction.amount}" style="width: 100%; text-align: right;" onchange="calculateTotal()"></td>
                    <td style="text-align: center;"><button class="delete-row-btn" onclick="deleteRow(this)">Delete</button></td>
                `;
                deductionsBody.appendChild(row);
            });

            // Calculate totals
            calculateTotal();
        }

        function clearSlip() {
            document.getElementById('empId').textContent = '-';
            document.getElementById('empName').textContent = '-';
            document.getElementById('designation').textContent = '-';
            document.getElementById('department').textContent = '-';
            document.getElementById('doj').textContent = '-';
            document.getElementById('bankAccount').textContent = '-';

            document.getElementById('earningsBody').innerHTML = '<tr><td colspan="3" class="loading">Select an employee to view earnings</td></tr>';
            document.getElementById('deductionsBody').innerHTML = '<tr><td colspan="3" class="loading">Select an employee to view deductions</td></tr>';

            document.getElementById('totalEarnings').textContent = '$0.00';
            document.getElementById('totalDeductions').textContent = '$0.00';
            document.getElementById('netSalary').textContent = '$0.00';
        }

        function calculateTotal() {
            // Calculate total earnings
            const earningInputs = document.querySelectorAll('#earningsBody input[type="number"]');
            let totalEarnings = 0;
            earningInputs.forEach(input => {
                totalEarnings += parseFloat(input.value) || 0;
            });

            // Calculate total deductions
            const deductionInputs = document.querySelectorAll('#deductionsBody input[type="number"]');
            let totalDeductions = 0;
            deductionInputs.forEach(input => {
                totalDeductions += parseFloat(input.value) || 0;
            });

            // Calculate net salary
            const netSalary = totalEarnings - totalDeductions;

            // Update display
            document.getElementById('totalEarnings').textContent = `$${totalEarnings.toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ",")}`;
            document.getElementById('totalDeductions').textContent = `$${totalDeductions.toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ",")}`;
            document.getElementById('netSalary').textContent = `$${netSalary.toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ",")}`;
        }

        function addEarningRow() {
            const tbody = document.getElementById('earningsBody');
            
            // Remove loading message if present
            if (tbody.querySelector('.loading')) {
                tbody.innerHTML = '';
            }
            
            const newRow = document.createElement('tr');
            newRow.innerHTML = `
                <td><input type="text" class="editable-cell" value="New Earning" style="width: 100%;"></td>
                <td class="amount-cell"><input type="number" class="editable-cell" value="0" style="width: 100%; text-align: right;" onchange="calculateTotal()"></td>
                <td style="text-align: center;"><button class="delete-row-btn" onclick="deleteRow(this)">Delete</button></td>
            `;
            tbody.appendChild(newRow);
            calculateTotal();
        }

        function addDeductionRow() {
            const tbody = document.getElementById('deductionsBody');
            
            // Remove loading message if present
            if (tbody.querySelector('.loading')) {
                tbody.innerHTML = '';
            }
            
            const newRow = document.createElement('tr');
            newRow.innerHTML = `
                <td><input type="text" class="editable-cell" value="New Deduction" style="width: 100%;"></td>
                <td class="amount-cell"><input type="number" class="editable-cell" value="0" style="width: 100%; text-align: right;" onchange="calculateTotal()"></td>
                <td style="text-align: center;"><button class="delete-row-btn" onclick="deleteRow(this)">Delete</button></td>
            `;
            tbody.appendChild(newRow);
            calculateTotal();
        }

        function deleteRow(btn) {
            if (confirm('Are you sure you want to delete this row?')) {
                const row = btn.parentElement.parentElement;
                row.remove();
                calculateTotal();
            }
        }

        function toggleEdit() {
            editMode = !editMode;
            const editableElements = document.querySelectorAll('[contenteditable]');
            const inputs = document.querySelectorAll('.editable-cell');
            const deleteButtons = document.querySelectorAll('.delete-row-btn');
            const addButtons = document.querySelectorAll('.add-row-btn');
            const dateSelectors = document.querySelectorAll('.date-select, .date-input');

            editableElements.forEach(el => {
                el.contentEditable = editMode;
                el.style.cursor = editMode ? 'text' : 'default';
            });

            inputs.forEach(input => {
                input.disabled = !editMode;
                input.style.cursor = editMode ? 'text' : 'default';
            });

            deleteButtons.forEach(btn => {
                btn.style.display = editMode ? 'inline-block' : 'none';
            });

            addButtons.forEach(btn => {
                btn.style.display = editMode ? 'inline-block' : 'none';
            });

            dateSelectors.forEach(selector => {
                selector.disabled = !editMode;
            });

            alert(editMode ? 'Edit mode enabled' : 'Edit mode disabled');
        }

        function resetSlip() {
            if (confirm('Are you sure you want to reset the salary slip? All changes will be lost.')) {
                document.getElementById('employeeSelect').value = '';
                document.getElementById('salaryMonth').value = 'January';
                document.getElementById('salaryYear').value = '2026';
                document.getElementById('payDate').value = '2026-01-31';
                clearSlip();
            }
        }

        // Initial setup
        document.addEventListener('DOMContentLoaded', function() {
            initializeYearDropdown();
            clearSlip();
        });
    </script>
</body>
</html>