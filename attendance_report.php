<?php
require_once 'config.php';

// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Initialize variables
$message = '';
$employee_id = '';
$employee_name = '';
$employee_details = null;
$attendance_status = '';

// Process form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $employee_id = trim($_POST['employee_id'] ?? '');
    $employee_name = trim($_POST['employee_name'] ?? '');
    $action = $_POST['action'] ?? '';
    
    if (empty($employee_id) || empty($employee_name)) {
        $message = '<div class="alert alert-danger">Employee ID and Name are required!</div>';
    } else {
        if ($action === 'checkin') {
            $result = processCheckIn($employee_id, $employee_name);
            $message = '<div class="alert alert-' . ($result['success'] ? 'success' : 'danger') . '">' 
                      . $result['message'] . '</div>';
            
            if ($result['success']) {
                $_SESSION['last_checkin'] = [
                    'employee_id' => $employee_id,
                    'time' => $result['data']['checkin_time']
                ];
            }
            
        } elseif ($action === 'checkout') {
            $result = processCheckOut($employee_id);
            $message = '<div class="alert alert-' . ($result['success'] ? 'success' : 'danger') . '">' 
                      . $result['message'] . '</div>';
            
            if ($result['success']) {
                $_SESSION['last_checkout'] = [
                    'employee_id' => $employee_id,
                    'time' => $result['data']['checkout_time']
                ];
            }
        }
    }
}

// Get employee details if ID is provided
if (!empty($employee_id)) {
    $employee_details = getEmployeeDetails($employee_id);
    if ($employee_details) {
        $employee_name = $employee_details['name'];
    }
    
    // Get today's attendance status
    $today_attendance = getTodayAttendance($employee_id);
    if ($today_attendance) {
        $status_class = '';
        switch($today_attendance['status']) {
            case 'Present': $status_class = 'success'; break;
            case 'Late': $status_class = 'warning'; break;
            case 'Half Day': $status_class = 'info'; break;
            default: $status_class = 'secondary';
        }
        
        $attendance_status = '<div class="alert alert-' . $status_class . '">';
        $attendance_status .= '<strong>Status:</strong> ' . $today_attendance['status'];
        $attendance_status .= '<br><strong>Check-in:</strong> ' . ($today_attendance['checkin_time'] ?: 'Not yet');
        
        if ($today_attendance['late_minutes'] > 0) {
            $attendance_status .= ' <span class="badge bg-warning">Late by ' . $today_attendance['late_minutes'] . ' minutes</span>';
        }
        
        if ($today_attendance['checkout_time']) {
            $attendance_status .= '<br><strong>Check-out:</strong> ' . $today_attendance['checkout_time'];
            $attendance_status .= '<br><strong>Total Hours:</strong> ' . number_format($today_attendance['total_hours'], 2);
        }
        $attendance_status .= '</div>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance System - MedLink Analytics</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 20px;
        }
        .attendance-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.1);
            overflow: hidden;
        }
        .card-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border-bottom: none;
            padding: 25px 20px;
        }
        .time-display {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 15px;
            text-align: center;
            margin-bottom: 20px;
            border: 2px solid #e9ecef;
        }
        .current-time {
            font-size: 2em;
            font-weight: bold;
            color: #667eea;
            margin-bottom: 5px;
        }
        .current-date {
            color: #6c757d;
            font-size: 1.1em;
        }
        .employee-info {
            background: #f0f7ff;
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 20px;
            border-left: 4px solid #667eea;
        }
        .btn-checkin {
            background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
            border: none;
            padding: 15px;
            font-size: 1.2em;
            transition: transform 0.3s;
        }
        .btn-checkin:hover {
            transform: translateY(-2px);
            background: linear-gradient(135deg, #218838 0%, #1ea085 100%);
        }
        .btn-checkout {
            background: linear-gradient(135deg, #fd7e14 0%, #ffc107 100%);
            border: none;
            padding: 15px;
            font-size: 1.2em;
            transition: transform 0.3s;
        }
        .btn-checkout:hover {
            transform: translateY(-2px);
            background: linear-gradient(135deg, #e36209 0%, #e0a800 100%);
        }
        .status-card {
            background: #fff8e1;
            border-radius: 10px;
            padding: 15px;
            margin-top: 20px;
            border-left: 4px solid #ffc107;
        }
        .footer-links {
            margin-top: 20px;
            text-align: center;
        }
        .footer-links a {
            color: #6c757d;
            text-decoration: none;
            margin: 0 10px;
        }
        .footer-links a:hover {
            color: #667eea;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                <div class="attendance-card">
                    <div class="card-header text-center">
                        <h1 class="h3 mb-2"><i class="bi bi-calendar-check"></i> Attendance System</h1>
                        <p class="mb-0">MedLink Analytics Employee Portal</p>
                    </div>
                    
                    <div class="card-body p-4">
                        <!-- Time Display -->
                        <div class="time-display">
                            <div class="current-time" id="currentTime">--:--:--</div>
                            <div class="current-date"><?php echo date('l, F j, Y'); ?></div>
                            <small class="text-muted">Late threshold: <?php echo LATE_THRESHOLD; ?></small>
                        </div>
                        
                        <?php echo $message; ?>
                        
                        <form method="POST" action="" id="attendanceForm">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="employee_id" class="form-label">Employee ID *</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-person-badge"></i></span>
                                        <input type="text" class="form-control" id="employee_id" name="employee_id" 
                                               value="<?php echo htmlspecialchars($employee_id); ?>" 
                                               required
                                               placeholder="Enter your employee ID">
                                    </div>
                                    <small class="form-text text-muted">Example: 101, 102, 103, 104</small>
                                </div>
                                
                                <div class="col-md-6 mb-3">
                                    <label for="employee_name" class="form-label">Employee Name *</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-person"></i></span>
                                        <input type="text" class="form-control" id="employee_name" name="employee_name" 
                                               value="<?php echo htmlspecialchars($employee_name); ?>" 
                                               required
                                               placeholder="Your full name">
                                    </div>
                                </div>
                            </div>
                            
                            <?php if ($employee_details): ?>
                            <div class="employee-info">
                                <h6><i class="bi bi-info-circle"></i> Employee Information</h6>
                                <p class="mb-1"><strong>Department:</strong> <?php echo htmlspecialchars($employee_details['department']); ?></p>
                                <p class="mb-1"><strong>Position:</strong> <?php echo htmlspecialchars($employee_details['position']); ?></p>
                                <p class="mb-0"><strong>Email:</strong> <?php echo htmlspecialchars($employee_details['email']); ?></p>
                            </div>
                            <?php endif; ?>
                            
                            <div class="d-grid gap-3 mt-4">
                                <button type="submit" name="action" value="checkin" class="btn btn-checkin text-white">
                                    <i class="bi bi-box-arrow-in-right"></i> Check In Now
                                </button>
                                
                                <button type="submit" name="action" value="checkout" class="btn btn-checkout text-white">
                                    <i class="bi bi-box-arrow-left"></i> Check Out Now
                                </button>
                            </div>
                        </form>
                        
                        <?php if ($attendance_status): ?>
                        <div class="status-card">
                            <h6><i class="bi bi-clock-history"></i> Today's Attendance Status</h6>
                            <?php echo $attendance_status; ?>
                        </div>
                        <?php endif; ?>
                        
                        <!-- Quick Stats -->
                        <div class="row mt-4 text-center">
                            <div class="col-md-4 mb-3">
                                <div class="p-3 bg-light rounded">
                                    <i class="bi bi-people fs-1 text-primary"></i>
                                    <h5 class="mt-2">Employees</h5>
                                    <?php
                                    try {
                                        $pdo = getDBConnection();
                                        if ($pdo) {
                                            $stmt = $pdo->query("SELECT COUNT(*) as count FROM " . EMPLOYEES_TABLE . " WHERE status = 'Active'");
                                            $result = $stmt->fetch();
                                            echo '<h3>' . $result['count'] . '</h3>';
                                        }
                                    } catch (Exception $e) {}
                                    ?>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="p-3 bg-light rounded">
                                    <i class="bi bi-calendar-check fs-1 text-success"></i>
                                    <h5 class="mt-2">Present Today</h5>
                                    <?php
                                    try {
                                        $pdo = getDBConnection();
                                        if ($pdo) {
                                            $stmt = $pdo->prepare("SELECT COUNT(DISTINCT employee_id) as count FROM " . ATTENDANCE_TABLE . " 
                                                                   WHERE attendance_date = CURDATE() AND status IN ('Present', 'Late')");
                                            $stmt->execute();
                                            $result = $stmt->fetch();
                                            echo '<h3>' . $result['count'] . '</h3>';
                                        }
                                    } catch (Exception $e) {}
                                    ?>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="p-3 bg-light rounded">
                                    <i class="bi bi-clock fs-1 text-warning"></i>
                                    <h5 class="mt-2">Late Today</h5>
                                    <?php
                                    try {
                                        $pdo = getDBConnection();
                                        if ($pdo) {
                                            $stmt = $pdo->prepare("SELECT COUNT(*) as count FROM " . ATTENDANCE_TABLE . " 
                                                                   WHERE attendance_date = CURDATE() AND status = 'Late'");
                                            $stmt->execute();
                                            $result = $stmt->fetch();
                                            echo '<h3>' . $result['count'] . '</h3>';
                                        }
                                    } catch (Exception $e) {}
                                    ?>
                                </div>
                            </div>
                        </div>
                        
                        <div class="footer-links mt-4">
                            <hr>
                            <a href="attendance_report.php"><i class="bi bi-file-earmark-text"></i> View Reports</a>
                            |
                            <a href="index.html"><i class="bi bi-house"></i> Back to Home</a>
                            |
                            <a href="#" onclick="window.print()"><i class="bi bi-printer"></i> Print</a>
                        </div>
                    </div>
                </div>
                
                <div class="text-center mt-3 text-white">
                    <small>&copy; <?php echo date('Y'); ?> MedLink Analytics. All rights reserved.</small>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Update current time
        function updateTime() {
            const now = new Date();
            const timeString = now.toLocaleTimeString('en-US', { hour12: false });
            document.getElementById('currentTime').textContent = timeString;
            
            // Auto-refresh page at midnight
            if (timeString === '00:00:00') {
                location.reload();
            }
        }
        
        // Initialize
        updateTime();
        setInterval(updateTime, 1000);
        
        // Auto-fetch employee details
        document.getElementById('employee_id').addEventListener('blur', function() {
            const empId = this.value.trim();
            if (empId.length > 0) {
                // In a real application, you would make an AJAX request here
                // For now, we'll just submit the form to get details
                if (empId !== '<?php echo $employee_id; ?>') {
                    document.getElementById('employee_name').value = '';
                }
            }
        });
        
        // Form submission confirmation
        document.querySelectorAll('button[type="submit"]').forEach(button => {
            button.addEventListener('click', function(e) {
                const action = this.value;
                const empId = document.getElementById('employee_id').value;
                const empName = document.getElementById('employee_name').value;
                
                if (!empId || !empName) {
                    e.preventDefault();
                    alert('Please enter both Employee ID and Name');
                    return;
                }
                
                const confirmMsg = action === 'checkin' 
                    ? `Confirm check-in for ${empName} (ID: ${empId})?`
                    : `Confirm check-out for ${empName} (ID: ${empId})?`;
                
                if (!confirm(confirmMsg)) {
                    e.preventDefault();
                }
            });
        });
    </script>
</body>
</html>