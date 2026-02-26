<?php
/**
 * Employee Registration Form
 * MedLink Analytics LLC
 * File: employee-registration-form.php
 * Location: /admin/employee-registration-form.php
 */

// Start session and check authentication (you should implement proper authentication)
session_start();

// Database connection (Update these credentials with your actual database credentials)
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "medlink_analytics_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize variables
$success_message = "";
$error_message = "";
$form_data = [];

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate input
    $form_data = array_map('trim', $_POST);
    $form_data = array_map('htmlspecialchars', $form_data);
    
    // Required fields validation
    $required_fields = [
        'employee_id', 'first_name', 'last_name', 'email', 
        'phone', 'department', 'position', 'hire_date'
    ];
    
    $missing_fields = [];
    foreach ($required_fields as $field) {
        if (empty($form_data[$field])) {
            $missing_fields[] = $field;
        }
    }
    
    if (!empty($missing_fields)) {
        $error_message = "Please fill in all required fields: " . implode(", ", $missing_fields);
    } elseif (!filter_var($form_data['email'], FILTER_VALIDATE_EMAIL)) {
        $error_message = "Please enter a valid email address";
    } else {
        // Prepare SQL statement
        $sql = "INSERT INTO employees (
            employee_id, first_name, last_name, middle_name, email, 
            phone, alternate_phone, date_of_birth, gender, 
            marital_status, ssn, address, city, state, 
            zip_code, emergency_contact_name, emergency_contact_phone, 
            emergency_contact_relationship, department, position, 
            employment_type, hire_date, salary, bank_name, 
            account_number, routing_number, medical_license_number, 
            license_expiry, specializations, education, 
            previous_employer, work_experience, skills, 
            created_at
        ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())";
        
        $stmt = $conn->prepare($sql);
        
        if ($stmt) {
            // Bind parameters
            $stmt->bind_param(
                "sssssssssssssssssssssssssssssssss",
                $form_data['employee_id'],
                $form_data['first_name'],
                $form_data['last_name'],
                $form_data['middle_name'],
                $form_data['email'],
                $form_data['phone'],
                $form_data['alternate_phone'],
                $form_data['date_of_birth'],
                $form_data['gender'],
                $form_data['marital_status'],
                $form_data['ssn'],
                $form_data['address'],
                $form_data['city'],
                $form_data['state'],
                $form_data['zip_code'],
                $form_data['emergency_contact_name'],
                $form_data['emergency_contact_phone'],
                $form_data['emergency_contact_relationship'],
                $form_data['department'],
                $form_data['position'],
                $form_data['employment_type'],
                $form_data['hire_date'],
                $form_data['salary'],
                $form_data['bank_name'],
                $form_data['account_number'],
                $form_data['routing_number'],
                $form_data['medical_license_number'],
                $form_data['license_expiry'],
                $form_data['specializations'],
                $form_data['education'],
                $form_data['previous_employer'],
                $form_data['work_experience'],
                $form_data['skills']
            );
            
            if ($stmt->execute()) {
                $success_message = "Employee registration completed successfully!";
                // Clear form data after successful submission
                $form_data = [];
            } else {
                $error_message = "Error saving employee data: " . $stmt->error;
            }
            
            $stmt->close();
        } else {
            $error_message = "Database error: " . $conn->error;
        }
    }
}

// Close connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Registration - MedLink Analytics LLC</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f5f7fa;
            padding: 20px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            background: white;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .header {
            background: linear-gradient(135deg, #2c3e50, #4a6491);
            color: white;
            padding: 30px;
            text-align: center;
        }

        .header h1 {
            font-size: 2.5rem;
            margin-bottom: 10px;
        }

        .header .subtitle {
            font-size: 1.1rem;
            opacity: 0.9;
        }

        .company-logo {
            height: 60px;
            margin-bottom: 20px;
        }

        .alert {
            padding: 15px;
            margin: 20px;
            border-radius: 5px;
            font-weight: 500;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .alert-error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        .registration-form {
            padding: 30px;
        }

        .form-section {
            margin-bottom: 40px;
            padding-bottom: 20px;
            border-bottom: 2px solid #eaeaea;
        }

        .section-title {
            color: #2c3e50;
            font-size: 1.5rem;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #3498db;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #2c3e50;
        }

        .form-group label.required::after {
            content: " *";
            color: #e74c3c;
        }

        .form-control {
            width: 100%;
            padding: 12px;
            border: 2px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            transition: border-color 0.3s ease;
        }

        .form-control:focus {
            outline: none;
            border-color: #3498db;
            box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.2);
        }

        select.form-control {
            appearance: none;
            background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%23333' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right 12px center;
            background-size: 16px;
            padding-right: 40px;
        }

        textarea.form-control {
            min-height: 120px;
            resize: vertical;
        }

        .form-actions {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 40px;
            padding-top: 20px;
            border-top: 2px solid #eaeaea;
        }

        .btn {
            padding: 14px 28px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-submit {
            background: linear-gradient(135deg, #3498db, #2980b9);
            color: white;
        }

        .btn-submit:hover {
            background: linear-gradient(135deg, #2980b9, #1c5a7a);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(52, 152, 219, 0.3);
        }

        .btn-reset {
            background: #95a5a6;
            color: white;
        }

        .btn-reset:hover {
            background: #7f8c8d;
        }

        .footer {
            background: #2c3e50;
            color: white;
            padding: 20px;
            text-align: center;
            font-size: 0.9rem;
            margin-top: 40px;
        }

        .form-note {
            font-size: 0.9rem;
            color: #7f8c8d;
            margin-top: 5px;
        }

        @media (max-width: 768px) {
            .form-grid {
                grid-template-columns: 1fr;
            }
            
            .header h1 {
                font-size: 2rem;
            }
            
            .registration-form {
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>MedLink Analytics LLC</h1>
            <div class="subtitle">Employee Registration Form</div>
            <div class="form-note">Please complete all required fields marked with *</div>
        </div>

        <?php if ($success_message): ?>
            <div class="alert alert-success">
                <?php echo $success_message; ?>
            </div>
        <?php endif; ?>

        <?php if ($error_message): ?>
            <div class="alert alert-error">
                <?php echo $error_message; ?>
            </div>
        <?php endif; ?>

        <form method="POST" action="" class="registration-form" id="employeeRegistrationForm">
            <!-- Personal Information Section -->
            <div class="form-section">
                <h2 class="section-title">Personal Information</h2>
                <div class="form-grid">
                    <div class="form-group">
                        <label for="employee_id" class="required">Employee ID</label>
                        <input type="text" id="employee_id" name="employee_id" class="form-control" 
                               value="<?php echo isset($form_data['employee_id']) ? $form_data['employee_id'] : ''; ?>" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="first_name" class="required">First Name</label>
                        <input type="text" id="first_name" name="first_name" class="form-control" 
                               value="<?php echo isset($form_data['first_name']) ? $form_data['first_name'] : ''; ?>" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="last_name" class="required">Last Name</label>
                        <input type="text" id="last_name" name="last_name" class="form-control" 
                               value="<?php echo isset($form_data['last_name']) ? $form_data['last_name'] : ''; ?>" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="middle_name">Middle Name</label>
                        <input type="text" id="middle_name" name="middle_name" class="form-control" 
                               value="<?php echo isset($form_data['middle_name']) ? $form_data['middle_name'] : ''; ?>">
                    </div>
                    
                    <div class="form-group">
                        <label for="date_of_birth">Date of Birth</label>
                        <input type="date" id="date_of_birth" name="date_of_birth" class="form-control" 
                               value="<?php echo isset($form_data['date_of_birth']) ? $form_data['date_of_birth'] : ''; ?>">
                    </div>
                    
                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <select id="gender" name="gender" class="form-control">
                            <option value="">Select Gender</option>
                            <option value="Male" <?php echo (isset($form_data['gender']) && $form_data['gender'] == 'Male') ? 'selected' : ''; ?>>Male</option>
                            <option value="Female" <?php echo (isset($form_data['gender']) && $form_data['gender'] == 'Female') ? 'selected' : ''; ?>>Female</option>
                            <option value="Other" <?php echo (isset($form_data['gender']) && $form_data['gender'] == 'Other') ? 'selected' : ''; ?>>Other</option>
                            <option value="Prefer not to say" <?php echo (isset($form_data['gender']) && $form_data['gender'] == 'Prefer not to say') ? 'selected' : ''; ?>>Prefer not to say</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="marital_status">Marital Status</label>
                        <select id="marital_status" name="marital_status" class="form-control">
                            <option value="">Select Status</option>
                            <option value="Single" <?php echo (isset($form_data['marital_status']) && $form_data['marital_status'] == 'Single') ? 'selected' : ''; ?>>Single</option>
                            <option value="Married" <?php echo (isset($form_data['marital_status']) && $form_data['marital_status'] == 'Married') ? 'selected' : ''; ?>>Married</option>
                            <option value="Divorced" <?php echo (isset($form_data['marital_status']) && $form_data['marital_status'] == 'Divorced') ? 'selected' : ''; ?>>Divorced</option>
                            <option value="Widowed" <?php echo (isset($form_data['marital_status']) && $form_data['marital_status'] == 'Widowed') ? 'selected' : ''; ?>>Widowed</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="ssn">Social Security Number</label>
                        <input type="text" id="ssn" name="ssn" class="form-control" 
                               value="<?php echo isset($form_data['ssn']) ? $form_data['ssn'] : ''; ?>">
                        <div class="form-note">Format: XXX-XX-XXXX</div>
                    </div>
                </div>
            </div>

            <!-- Contact Information Section -->
            <div class="form-section">
                <h2 class="section-title">Contact Information</h2>
                <div class="form-grid">
                    <div class="form-group">
                        <label for="email" class="required">Email Address</label>
                        <input type="email" id="email" name="email" class="form-control" 
                               value="<?php echo isset($form_data['email']) ? $form_data['email'] : ''; ?>" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="phone" class="required">Phone Number</label>
                        <input type="tel" id="phone" name="phone" class="form-control" 
                               value="<?php echo isset($form_data['phone']) ? $form_data['phone'] : ''; ?>" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="alternate_phone">Alternate Phone</label>
                        <input type="tel" id="alternate_phone" name="alternate_phone" class="form-control" 
                               value="<?php echo isset($form_data['alternate_phone']) ? $form_data['alternate_phone'] : ''; ?>">
                    </div>
                    
                    <div class="form-group">
                        <label for="address">Address</label>
                        <textarea id="address" name="address" class="form-control"><?php echo isset($form_data['address']) ? $form_data['address'] : ''; ?></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label for="city">City</label>
                        <input type="text" id="city" name="city" class="form-control" 
                               value="<?php echo isset($form_data['city']) ? $form_data['city'] : ''; ?>">
                    </div>
                    
                    <div class="form-group">
                        <label for="state">State</label>
                        <input type="text" id="state" name="state" class="form-control" 
                               value="<?php echo isset($form_data['state']) ? $form_data['state'] : ''; ?>">
                    </div>
                    
                    <div class="form-group">
                        <label for="zip_code">ZIP Code</label>
                        <input type="text" id="zip_code" name="zip_code" class="form-control" 
                               value="<?php echo isset($form_data['zip_code']) ? $form_data['zip_code'] : ''; ?>">
                    </div>
                </div>
            </div>

            <!-- Emergency Contact Section -->
            <div class="form-section">
                <h2 class="section-title">Emergency Contact</h2>
                <div class="form-grid">
                    <div class="form-group">
                        <label for="emergency_contact_name">Contact Name</label>
                        <input type="text" id="emergency_contact_name" name="emergency_contact_name" class="form-control" 
                               value="<?php echo isset($form_data['emergency_contact_name']) ? $form_data['emergency_contact_name'] : ''; ?>">
                    </div>
                    
                    <div class="form-group">
                        <label for="emergency_contact_phone">Contact Phone</label>
                        <input type="tel" id="emergency_contact_phone" name="emergency_contact_phone" class="form-control" 
                               value="<?php echo isset($form_data['emergency_contact_phone']) ? $form_data['emergency_contact_phone'] : ''; ?>">
                    </div>
                    
                    <div class="form-group">
                        <label for="emergency_contact_relationship">Relationship</label>
                        <input type="text" id="emergency_contact_relationship" name="emergency_contact_relationship" class="form-control" 
                               value="<?php echo isset($form_data['emergency_contact_relationship']) ? $form_data['emergency_contact_relationship'] : ''; ?>">
                    </div>
                </div>
            </div>

            <!-- Employment Information Section -->
            <div class="form-section">
                <h2 class="section-title">Employment Information</h2>
                <div class="form-grid">
                    <div class="form-group">
                        <label for="department" class="required">Department</label>
                        <select id="department" name="department" class="form-control" required>
                            <option value="">Select Department</option>
                            <option value="Analytics" <?php echo (isset($form_data['department']) && $form_data['department'] == 'Analytics') ? 'selected' : ''; ?>>Analytics</option>
                            <option value="IT" <?php echo (isset($form_data['department']) && $form_data['department'] == 'IT') ? 'selected' : ''; ?>>IT</option>
                            <option value="HR" <?php echo (isset($form_data['department']) && $form_data['department'] == 'HR') ? 'selected' : ''; ?>>HR</option>
                            <option value="Finance" <?php echo (isset($form_data['department']) && $form_data['department'] == 'Finance') ? 'selected' : ''; ?>>Finance</option>
                            <option value="Operations" <?php echo (isset($form_data['department']) && $form_data['department'] == 'Operations') ? 'selected' : ''; ?>>Operations</option>
                            <option value="Sales" <?php echo (isset($form_data['department']) && $form_data['department'] == 'Sales') ? 'selected' : ''; ?>>Sales</option>
                            <option value="Marketing" <?php echo (isset($form_data['department']) && $form_data['department'] == 'Marketing') ? 'selected' : ''; ?>>Marketing</option>
                            <option value="Research" <?php echo (isset($form_data['department']) && $form_data['department'] == 'Research') ? 'selected' : ''; ?>>Research</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="position" class="required">Position/Title</label>
                        <input type="text" id="position" name="position" class="form-control" 
                               value="<?php echo isset($form_data['position']) ? $form_data['position'] : ''; ?>" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="employment_type">Employment Type</label>
                        <select id="employment_type" name="employment_type" class="form-control">
                            <option value="">Select Type</option>
                            <option value="Full-Time" <?php echo (isset($form_data['employment_type']) && $form_data['employment_type'] == 'Full-Time') ? 'selected' : ''; ?>>Full-Time</option>
                            <option value="Part-Time" <?php echo (isset($form_data['employment_type']) && $form_data['employment_type'] == 'Part-Time') ? 'selected' : ''; ?>>Part-Time</option>
                            <option value="Contract" <?php echo (isset($form_data['employment_type']) && $form_data['employment_type'] == 'Contract') ? 'selected' : ''; ?>>Contract</option>
                            <option value="Intern" <?php echo (isset($form_data['employment_type']) && $form_data['employment_type'] == 'Intern') ? 'selected' : ''; ?>>Intern</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="hire_date" class="required">Hire Date</label>
                        <input type="date" id="hire_date" name="hire_date" class="form-control" 
                               value="<?php echo isset($form_data['hire_date']) ? $form_data['hire_date'] : date('Y-m-d'); ?>" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="salary">Salary</label>
                        <input type="text" id="salary" name="salary" class="form-control" 
                               value="<?php echo isset($form_data['salary']) ? $form_data['salary'] : ''; ?>">
                        <div class="form-note">Annual salary in USD</div>
                    </div>
                </div>
            </div>

            <!-- Banking Information Section -->
            <div class="form-section">
                <h2 class="section-title">Banking Information (for Payroll)</h2>
                <div class="form-grid">
                    <div class="form-group">
                        <label for="bank_name">Bank Name</label>
                        <input type="text" id="bank_name" name="bank_name" class="form-control" 
                               value="<?php echo isset($form_data['bank_name']) ? $form_data['bank_name'] : ''; ?>">
                    </div>
                    
                    <div class="form-group">
                        <label for="account_number">Account Number</label>
                        <input type="text" id="account_number" name="account_number" class="form-control" 
                               value="<?php echo isset($form_data['account_number']) ? $form_data['account_number'] : ''; ?>">
                    </div>
                    
                    <div class="form-group">
                        <label for="routing_number">Routing Number</label>
                        <input type="text" id="routing_number" name="routing_number" class="form-control" 
                               value="<?php echo isset($form_data['routing_number']) ? $form_data['routing_number'] : ''; ?>">
                    </div>
                </div>
            </div>

            <!-- Medical Credentials Section -->
            <div class="form-section">
                <h2 class="section-title">Medical Credentials (if applicable)</h2>
                <div class="form-grid">
                    <div class="form-group">
                        <label for="medical_license_number">Medical License Number</label>
                        <input type="text" id="medical_license_number" name="medical_license_number" class="form-control" 
                               value="<?php echo isset($form_data['medical_license_number']) ? $form_data['medical_license_number'] : ''; ?>">
                    </div>
                    
                    <div class="form-group">
                        <label for="license_expiry">License Expiry Date</label>
                        <input type="date" id="license_expiry" name="license_expiry" class="form-control" 
                               value="<?php echo isset($form_data['license_expiry']) ? $form_data['license_expiry'] : ''; ?>">
                    </div>
                    
                    <div class="form-group">
                        <label for="specializations">Specializations</label>
                        <input type="text" id="specializations" name="specializations" class="form-control" 
                               value="<?php echo isset($form_data['specializations']) ? $form_data['specializations'] : ''; ?>">
                        <div class="form-note">Separate multiple specializations with commas</div>
                    </div>
                </div>
            </div>

            <!-- Education & Experience Section -->
            <div class="form-section">
                <h2 class="section-title">Education & Professional Experience</h2>
                <div class="form-grid">
                    <div class="form-group">
                        <label for="education">Education</label>
                        <textarea id="education" name="education" class="form-control" 
                                  placeholder="Degrees, Institutions, Years"><?php echo isset($form_data['education']) ? $form_data['education'] : ''; ?></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label for="previous_employer">Previous Employer</label>
                        <input type="text" id="previous_employer" name="previous_employer" class="form-control" 
                               value="<?php echo isset($form_data['previous_employer']) ? $form_data['previous_employer'] : ''; ?>">
                    </div>
                    
                    <div class="form-group">
                        <label for="work_experience">Work Experience (Years)</label>
                        <input type="number" id="work_experience" name="work_experience" class="form-control" min="0" max="50" 
                               value="<?php echo isset($form_data['work_experience']) ? $form_data['work_experience'] : ''; ?>">
                    </div>
                    
                    <div class="form-group">
                        <label for="skills">Skills & Certifications</label>
                        <textarea id="skills" name="skills" class="form-control" 
                                  placeholder="List relevant skills and certifications"><?php echo isset($form_data['skills']) ? $form_data['skills'] : ''; ?></textarea>
                    </div>
                </div>
            </div>

            <!-- Form Actions -->
            <div class="form-actions">
                <button type="submit" class="btn btn-submit">Register Employee</button>
                <button type="reset" class="btn btn-reset">Clear Form</button>
            </div>
        </form>

        <div class="footer">
            <p>&copy; <?php echo date('Y'); ?> MedLink Analytics LLC. All rights reserved.</p>
            <p>This information will be kept confidential and used for official company records only.</p>
        </div>
    </div>

    <script>
        // Form validation
        document.getElementById('employeeRegistrationForm').addEventListener('submit', function(e) {
            let isValid = true;
            const requiredFields = this.querySelectorAll('[required]');
            
            requiredFields.forEach(field => {
                if (!field.value.trim()) {
                    isValid = false;
                    field.style.borderColor = '#e74c3c';
                } else {
                    field.style.borderColor = '#ddd';
                }
            });
            
            // Email validation
            const emailField = document.getElementById('email');
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (emailField.value && !emailRegex.test(emailField.value)) {
                isValid = false;
                emailField.style.borderColor = '#e74c3c';
                alert('Please enter a valid email address');
            }
            
            if (!isValid) {
                e.preventDefault();
                alert('Please fill in all required fields correctly.');
            }
        });

        // Clear form validation styles on input
        document.querySelectorAll('.form-control').forEach(input => {
            input.addEventListener('input', function() {
                this.style.borderColor = '#ddd';
            });
        });

        // Generate employee ID if not provided (example functionality)
        document.getElementById('employee_id').addEventListener('focus', function() {
            if (!this.value) {
                const timestamp = new Date().getTime().toString().slice(-6);
                const randomNum = Math.floor(Math.random() * 1000).toString().padStart(3, '0');
                this.value = 'MLA-' + timestamp + randomNum;
            }
        });
    </script>
</body>
</html>