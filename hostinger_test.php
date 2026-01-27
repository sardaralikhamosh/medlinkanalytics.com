<?php
// hostinger_test.php
echo "<h1>Hostinger Database Connection Test</h1>";

// Include config
require_once 'config.php';

echo "<h2>1. Testing Connection with Found Host: <strong>" . DB_HOST . "</strong></h2>";

try {
    $result = testHostingerConnection();
    
    if ($result['success']) {
        echo "<div style='background: #d4edda; color: #155724; padding: 15px; border-radius: 5px;'>";
        echo "<h3 style='color: #155724;'>✓ SUCCESS! Database Connected</h3>";
        echo "<table border='1' cellpadding='10' style='border-collapse: collapse;'>";
        echo "<tr><th>Field</th><th>Value</th></tr>";
        echo "<tr><td>Database Name</td><td>" . htmlspecialchars($result['database']) . "</td></tr>";
        echo "<tr><td>MySQL Version</td><td>" . htmlspecialchars($result['version']) . "</td></tr>";
        echo "<tr><td>Configured Host</td><td>" . htmlspecialchars($result['host']) . "</td></tr>";
        echo "<tr><td>Server Host</td><td>" . htmlspecialchars($result['server_host']) . "</td></tr>";
        echo "<tr><td>Current User</td><td>" . htmlspecialchars($result['user']) . "</td></tr>";
        echo "</table>";
        echo "</div>";
        
        // Test creating table
        echo "<h2>2. Testing Table Creation</h2>";
        try {
            $pdo = getDBConnection();
            
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
            echo "<p style='color: green;'>✓ Table 'contact_submissions' created/verified</p>";
            
            // Count existing records
            $stmt = $pdo->query("SELECT COUNT(*) as count FROM contact_submissions");
            $count = $stmt->fetch()['count'];
            echo "<p>Existing submissions: <strong>" . $count . "</strong></p>";
            
        } catch (Exception $e) {
            echo "<p style='color: red;'>✗ Table creation failed: " . htmlspecialchars($e->getMessage()) . "</p>";
        }
        
    } else {
        echo "<div style='background: #f8d7da; color: #721c24; padding: 15px; border-radius: 5px;'>";
        echo "<h3 style='color: #721c24;'>✗ CONNECTION FAILED</h3>";
        echo "<p><strong>Error:</strong> " . htmlspecialchars($result['error']) . "</p>";
        echo "</div>";
    }
    
} catch (Exception $e) {
    echo "<p style='color: red;'>Test error: " . htmlspecialchars($e->getMessage()) . "</p>";
}

// Common Hostinger solutions
echo "<h2>3. Hostinger Specific Solutions</h2>";
echo "<div style='background: #fff3cd; color: #856404; padding: 15px; border-radius: 5px;'>";
echo "<h3>If connection fails, try these:</h3>";
echo "<ol>";
echo "<li><strong>Check hPanel:</strong> Login to hPanel → Hosting → Databases</li>";
echo "<li><strong>Verify credentials:</strong> Make sure username, password, and database name match exactly</li>";
echo "<li><strong>User permissions:</strong> In hPanel, go to MySQL Databases and make sure user has ALL privileges</li>";
echo "<li><strong>Hostname:</strong> For Hostinger, it's almost always 'localhost'</li>";
echo "<li><strong>PHP Version:</strong> Check you're using PHP 7.4 or 8.x in hPanel</li>";
echo "<li><strong>Clear cache:</strong> Sometimes Hostinger caches database changes</li>";
echo "</ol>";
echo "</div>";

// Test PDO directly
echo "<h2>4. Direct PDO Tests</h2>";

$test_cases = [
    ['host' => 'localhost', 'desc' => 'Standard localhost'],
    ['host' => '127.0.0.1', 'desc' => 'Localhost IP'],
    ['host' => 'localhost:3306', 'desc' => 'With port 3306'],
];

foreach ($test_cases as $test) {
    echo "<p><strong>" . $test['desc'] . " (" . $test['host'] . "):</strong> ";
    
    try {
        $host_parts = explode(':', $test['host']);
        $hostname = $host_parts[0];
        $port = isset($host_parts[1]) ? $host_parts[1] : null;
        
        if ($port) {
            $dsn = "mysql:host={$hostname};port={$port};dbname=" . DB_NAME . ";charset=utf8mb4";
        } else {
            $dsn = "mysql:host={$hostname};dbname=" . DB_NAME . ";charset=utf8mb4";
        }
        
        $pdo = new PDO($dsn, DB_USER, DB_PASS, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_SILENT,
            PDO::ATTR_TIMEOUT => 3
        ]);
        
        if ($pdo->query("SELECT 1")) {
            echo "<span style='color: green;'>✓ Works</span>";
        } else {
            echo "<span style='color: red;'>✗ Failed</span>";
        }
        
    } catch (Exception $e) {
        echo "<span style='color: red;'>✗ Error: " . htmlspecialchars($e->getMessage()) . "</span>";
    }
    
    echo "</p>";
}

// Check PHP extensions
echo "<h2>5. PHP Extension Check</h2>";
$required_extensions = ['pdo_mysql', 'mysqli', 'json'];
foreach ($required_extensions as $ext) {
    if (extension_loaded($ext)) {
        echo "<p style='color: green;'>✓ {$ext} is loaded</p>";
    } else {
        echo "<p style='color: red;'>✗ {$ext} is NOT loaded</p>";
    }
}

// Check file permissions
echo "<h2>6. File Permission Check</h2>";
$files_to_check = [
    'config.php' => '644',
    'submit_contact.php' => '644',
    '.' => '755' // Directory
];

foreach ($files_to_check as $file => $expected) {
    if (file_exists($file)) {
        $perms = substr(sprintf('%o', fileperms($file)), -4);
        if ($perms == $expected) {
            echo "<p style='color: green;'>✓ {$file}: {$perms} (OK)</p>";
        } else {
            echo "<p style='color: orange;'>⚠ {$file}: {$perms} (Expected: {$expected})</p>";
        }
    } else {
        echo "<p style='color: red;'>✗ {$file}: Does not exist</p>";
    }
}
?>