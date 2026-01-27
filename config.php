<?php
// config.php - Complete standalone configuration

// ============================================
// DATABASE CONFIGURATION
// ============================================
define('DB_HOST', 'localhost');
define('DB_USER', 'u791316988_medlinkanalyti');
define('DB_PASS', 'Medlink14@555');
define('DB_NAME', 'u791316988_medlinkanalyti');

// ============================================
// EMAIL CONFIGURATION
// ============================================
define('TO_EMAIL', 'contact@medlinkanalytics.com');
define('EMAIL_SUBJECT', 'New Contact Form Submission - MedLink Analytics');
define('SITE_NAME', 'MedLink Analytics');
define('SITE_EMAIL', 'noreply@medlinkanalytics.com');

// ============================================
// SITE URL CONFIGURATION
// ============================================
// Determine base URL automatically
$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https://" : "http://";
$domain = $_SERVER['HTTP_HOST'];
$base_url = $protocol . $domain . '/';

// Alternative: Hardcode if needed (uncomment and use this instead)
// $base_url = 'https://medlinkanalytics.com/';

// ============================================
// DEBUG SETTINGS
// ============================================
define('DEBUG_MODE', true); // Set to false when live
error_reporting(DEBUG_MODE ? E_ALL : 0);
ini_set('display_errors', DEBUG_MODE ? 1 : 0);

// ============================================
// ATTENDANCE SYSTEM CONFIGURATION
// ============================================
define('LATE_THRESHOLD', '09:15:00'); // Time after which check-in is marked as late
define('WORK_HOURS_STANDARD', 8.0); // Standard working hours
define('ATTENDANCE_TABLE', 'attendance');
define('EMPLOYEES_TABLE', 'employees');

// ============================================
// DATABASE CONNECTION FUNCTION
// ============================================
function getDBConnection() {
    static $connection = null;
    
    if ($connection === null) {
        try {
            $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4";
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4"
            ];
            
            $connection = new PDO($dsn, DB_USER, DB_PASS, $options);
            
        } catch (PDOException $e) {
            if (DEBUG_MODE) {
                error_log("Database Connection Error: " . $e->getMessage());
            }
            $connection = false;
        }
    }
    
    return $connection;
}

// ============================================
// CREATE TABLES FUNCTIONS
// ============================================
function createContactTableIfNotExists() {
    try {
        $pdo = getDBConnection();
        if ($pdo) {
            $sql = "CREATE TABLE IF NOT EXISTS contact_submissions (
                id INT AUTO_INCREMENT PRIMARY KEY,
                name VARCHAR(100) NOT NULL,
                email VARCHAR(100) NOT NULL,
                practice VARCHAR(100),
                phone VARCHAR(20),
                message TEXT NOT NULL,
                source VARCHAR(50) DEFAULT 'contact_page',
                submitted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                is_read BOOLEAN DEFAULT FALSE
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";
            
            $pdo->exec($sql);
            return true;
        }
        return false;
    } catch (Exception $e) {
        if (DEBUG_MODE) {
            error_log("Table Creation Error: " . $e->getMessage());
        }
        return false;
    }
}

function createAttendanceTablesIfNotExists() {
    try {
        $pdo = getDBConnection();
        if ($pdo) {
            // Create employees table
            $employees_sql = "CREATE TABLE IF NOT EXISTS " . EMPLOYEES_TABLE . " (
                id INT(11) AUTO_INCREMENT PRIMARY KEY,
                employee_id INT(11) UNIQUE NOT NULL,
                name VARCHAR(100) NOT NULL,
                email VARCHAR(100) NOT NULL,
                department VARCHAR(50),
                position VARCHAR(50),
                hire_date DATE,
                status ENUM('Active', 'Inactive', 'On Leave') DEFAULT 'Active',
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";
            
            // Create attendance table
            $attendance_sql = "CREATE TABLE IF NOT EXISTS " . ATTENDANCE_TABLE . " (
                id INT(11) AUTO_INCREMENT PRIMARY KEY,
                employee_id INT(11) NOT NULL,
                employee_name VARCHAR(100) NOT NULL,
                attendance_date DATE NOT NULL,
                checkin_time TIME,
                checkout_time TIME,
                total_hours DECIMAL(5,2),
                status ENUM('Present', 'Absent', 'Late', 'Half Day', 'On Leave') DEFAULT 'Absent',
                late_minutes INT DEFAULT 0,
                notes TEXT,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                INDEX idx_employee_date (employee_id, attendance_date),
                INDEX idx_date_status (attendance_date, status),
                FOREIGN KEY (employee_id) REFERENCES " . EMPLOYEES_TABLE . "(employee_id) ON DELETE CASCADE
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";
            
            $pdo->exec($employees_sql);
            $pdo->exec($attendance_sql);
            
            // Add some sample employees if table is empty
            $check_employees = $pdo->query("SELECT COUNT(*) as count FROM " . EMPLOYEES_TABLE);
            $result = $check_employees->fetch();
            
            if ($result['count'] == 0) {
                $sample_employees = [
                    ['employee_id' => 101, 'name' => 'John Doe', 'email' => 'john@example.com', 'department' => 'IT', 'position' => 'Developer'],
                    ['employee_id' => 102, 'name' => 'Jane Smith', 'email' => 'jane@example.com', 'department' => 'HR', 'position' => 'Manager'],
                    ['employee_id' => 103, 'name' => 'Robert Johnson', 'email' => 'robert@example.com', 'department' => 'Sales', 'position' => 'Executive'],
                    ['employee_id' => 104, 'name' => 'Emily Davis', 'email' => 'emily@example.com', 'department' => 'Marketing', 'position' => 'Specialist'],
                ];
                
                $stmt = $pdo->prepare("INSERT INTO " . EMPLOYEES_TABLE . " 
                    (employee_id, name, email, department, position, hire_date) 
                    VALUES (?, ?, ?, ?, ?, ?)");
                
                foreach ($sample_employees as $employee) {
                    $stmt->execute([
                        $employee['employee_id'],
                        $employee['name'],
                        $employee['email'],
                        $employee['department'],
                        $employee['position'],
                        date('Y-m-d', strtotime('-1 year'))
                    ]);
                }
            }
            
            return true;
        }
        return false;
    } catch (Exception $e) {
        if (DEBUG_MODE) {
            error_log("Attendance Table Creation Error: " . $e->getMessage());
        }
        return false;
    }
}

// ============================================
// ATTENDANCE SYSTEM FUNCTIONS
// ============================================

/**
 * Check if employee has checked in today
 * @param int $employee_id
 * @return array|false
 */
function getTodayAttendance($employee_id) {
    try {
        $pdo = getDBConnection();
        if ($pdo) {
            $sql = "SELECT * FROM " . ATTENDANCE_TABLE . " 
                    WHERE employee_id = ? 
                    AND attendance_date = CURDATE()";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$employee_id]);
            return $stmt->fetch();
        }
        return false;
    } catch (Exception $e) {
        if (DEBUG_MODE) {
            error_log("Get Today Attendance Error: " . $e->getMessage());
        }
        return false;
    }
}

/**
 * Process employee check-in
 * @param int $employee_id
 * @param string $employee_name
 * @return array [success, message, data]
 */
function processCheckIn($employee_id, $employee_name) {
    try {
        $pdo = getDBConnection();
        if (!$pdo) {
            return ['success' => false, 'message' => 'Database connection failed'];
        }
        
        // Check if already checked in today
        $existing = getTodayAttendance($employee_id);
        if ($existing) {
            return ['success' => false, 'message' => 'You have already checked in today at ' . $existing['checkin_time']];
        }
        
        // Check if employee exists
        $employee_stmt = $pdo->prepare("SELECT * FROM " . EMPLOYEES_TABLE . " WHERE employee_id = ? AND status = 'Active'");
        $employee_stmt->execute([$employee_id]);
        $employee = $employee_stmt->fetch();
        
        if (!$employee) {
            return ['success' => false, 'message' => 'Employee not found or inactive'];
        }
        
        // Get current time and determine status
        $checkin_time = date('H:i:s');
        $status = 'Present';
        $late_minutes = 0;
        
        // Calculate if late
        if ($checkin_time > LATE_THRESHOLD) {
            $status = 'Late';
            $checkin_dt = new DateTime(date('Y-m-d') . ' ' . $checkin_time);
            $threshold_dt = new DateTime(date('Y-m-d') . ' ' . LATE_THRESHOLD);
            $interval = $checkin_dt->diff($threshold_dt);
            $late_minutes = $interval->h * 60 + $interval->i;
        }
        
        // Insert attendance record
        $sql = "INSERT INTO " . ATTENDANCE_TABLE . " 
                (employee_id, employee_name, attendance_date, checkin_time, status, late_minutes) 
                VALUES (?, ?, CURDATE(), ?, ?, ?)";
        
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            $employee_id,
            $employee_name,
            $checkin_time,
            $status,
            $late_minutes
        ]);
        
        return [
            'success' => true,
            'message' => 'Check-in successful at ' . $checkin_time,
            'data' => [
                'checkin_time' => $checkin_time,
                'status' => $status,
                'late_minutes' => $late_minutes
            ]
        ];
        
    } catch (Exception $e) {
        if (DEBUG_MODE) {
            error_log("Check-in Error: " . $e->getMessage());
        }
        return ['success' => false, 'message' => 'Error processing check-in: ' . $e->getMessage()];
    }
}

/**
 * Process employee check-out
 * @param int $employee_id
 * @return array [success, message, data]
 */
function processCheckOut($employee_id) {
    try {
        $pdo = getDBConnection();
        if (!$pdo) {
            return ['success' => false, 'message' => 'Database connection failed'];
        }
        
        // Get today's attendance
        $attendance = getTodayAttendance($employee_id);
        if (!$attendance) {
            return ['success' => false, 'message' => 'You need to check in first!'];
        }
        
        if ($attendance['checkout_time']) {
            return ['success' => false, 'message' => 'You have already checked out at ' . $attendance['checkout_time']];
        }
        
        // Calculate total hours
        $checkout_time = date('H:i:s');
        $checkin_time = $attendance['checkin_time'];
        
        $checkin_dt = new DateTime(date('Y-m-d') . ' ' . $checkin_time);
        $checkout_dt = new DateTime(date('Y-m-d') . ' ' . $checkout_time);
        
        // If checkout is next day, add 1 day
        if ($checkout_dt < $checkin_dt) {
            $checkout_dt->modify('+1 day');
        }
        
        $interval = $checkin_dt->diff($checkout_dt);
        $total_hours = $interval->h + ($interval->i / 60);
        
        // Update record
        $sql = "UPDATE " . ATTENDANCE_TABLE . " 
                SET checkout_time = ?, 
                    total_hours = ?,
                    updated_at = NOW()
                WHERE employee_id = ? 
                AND attendance_date = CURDATE()";
        
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$checkout_time, $total_hours, $employee_id]);
        
        return [
            'success' => true,
            'message' => 'Check-out successful at ' . $checkout_time . ' (Total: ' . number_format($total_hours, 2) . ' hours)',
            'data' => [
                'checkout_time' => $checkout_time,
                'total_hours' => $total_hours
            ]
        ];
        
    } catch (Exception $e) {
        if (DEBUG_MODE) {
            error_log("Check-out Error: " . $e->getMessage());
        }
        return ['success' => false, 'message' => 'Error processing check-out: ' . $e->getMessage()];
    }
}

/**
 * Get employee details
 * @param int $employee_id
 * @return array|false
 */
function getEmployeeDetails($employee_id) {
    try {
        $pdo = getDBConnection();
        if ($pdo) {
            $sql = "SELECT * FROM " . EMPLOYEES_TABLE . " WHERE employee_id = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$employee_id]);
            return $stmt->fetch();
        }
        return false;
    } catch (Exception $e) {
        if (DEBUG_MODE) {
            error_log("Get Employee Error: " . $e->getMessage());
        }
        return false;
    }
}

/**
 * Get attendance report
 * @param array $filters [employee_id, start_date, end_date, department]
 * @return array|false
 */
function getAttendanceReport($filters = []) {
    try {
        $pdo = getDBConnection();
        if ($pdo) {
            $sql = "SELECT a.*, e.department, e.position 
                    FROM " . ATTENDANCE_TABLE . " a
                    LEFT JOIN " . EMPLOYEES_TABLE . " e ON a.employee_id = e.employee_id
                    WHERE 1=1";
            
            $params = [];
            $types = '';
            
            if (!empty($filters['employee_id'])) {
                $sql .= " AND a.employee_id = ?";
                $params[] = $filters['employee_id'];
                $types .= 'i';
            }
            
            if (!empty($filters['start_date'])) {
                $sql .= " AND a.attendance_date >= ?";
                $params[] = $filters['start_date'];
                $types .= 's';
            }
            
            if (!empty($filters['end_date'])) {
                $sql .= " AND a.attendance_date <= ?";
                $params[] = $filters['end_date'];
                $types .= 's';
            }
            
            if (!empty($filters['department'])) {
                $sql .= " AND e.department = ?";
                $params[] = $filters['department'];
                $types .= 's';
            }
            
            if (!empty($filters['status'])) {
                $sql .= " AND a.status = ?";
                $params[] = $filters['status'];
                $types .= 's';
            }
            
            $sql .= " ORDER BY a.attendance_date DESC, a.employee_id";
            
            $stmt = $pdo->prepare($sql);
            $stmt->execute($params);
            return $stmt->fetchAll();
        }
        return false;
    } catch (Exception $e) {
        if (DEBUG_MODE) {
            error_log("Attendance Report Error: " . $e->getMessage());
        }
        return false;
    }
}

// ============================================
// AUTO-CREATE TABLES ON FIRST REQUEST
// ============================================
if (DEBUG_MODE) {
    createContactTableIfNotExists();
    createAttendanceTablesIfNotExists();
}
?>