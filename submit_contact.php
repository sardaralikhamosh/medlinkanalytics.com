<?php
// submit_contact.php - Simplified working version
require_once 'config.php';

// Start session for rate limiting
session_start();

// Set JSON header
header('Content-Type: application/json');

// Simple validation
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
    exit;
}

// Get form data
$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$practice = trim($_POST['practice'] ?? '');
$phone = trim($_POST['phone'] ?? '');
$message = trim($_POST['message'] ?? '');
$source = trim($_POST['source'] ?? 'contact_page');

// Validate
if (empty($name) || empty($email) || empty($message)) {
    echo json_encode(['success' => false, 'message' => 'Please fill all required fields']);
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(['success' => false, 'message' => 'Please enter a valid email']);
    exit;
}

try {
    // 1. Save to database
    $db_success = false;
    $pdo = getDBConnection();
    
    if ($pdo) {
        // Make sure table exists
        $table_check = $pdo->query("SHOW TABLES LIKE 'contact_submissions'");
        if ($table_check->rowCount() == 0) {
            createContactTableIfNotExists();
        }
        
        $sql = "INSERT INTO contact_submissions (name, email, practice, phone, message, source) 
                VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $db_success = $stmt->execute([$name, $email, $practice, $phone, $message, $source]);
    }
    
    // 2. Send email
    $email_body = "
    <html>
    <body>
        <h2>New Contact Form Submission</h2>
        <p><strong>From:</strong> {$source} Form</p>
        <p><strong>Name:</strong> {$name}</p>
        <p><strong>Email:</strong> {$email}</p>
        <p><strong>Practice:</strong> " . (empty($practice) ? 'Not provided' : $practice) . "</p>
        <p><strong>Phone:</strong> " . (empty($phone) ? 'Not provided' : $phone) . "</p>
        <p><strong>Message:</strong></p>
        <div style='background: #f5f5f5; padding: 15px;'>
            " . nl2br(htmlspecialchars($message)) . "
        </div>
        <hr>
        <p><small>Submitted: " . date('Y-m-d H:i:s') . "</small></p>
    </body>
    </html>
    ";
    
    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
    $headers .= "From: " . SITE_NAME . " <" . SITE_EMAIL . ">\r\n";
    $headers .= "Reply-To: {$name} <{$email}>\r\n";
    
    $email_success = false;
    $message_id = '<' . time() . md5($email . time()) . '@' . $_SERVER['HTTP_HOST'] . '>';

// Email headers with anti-spam measures
$headers = [
    'MIME-Version' => '1.0',
    'Content-Type' => 'text/html; charset=UTF-8',
    'From' => SITE_NAME . ' <' . SITE_EMAIL . '>',
    'Reply-To' => $name . ' <' . $email . '>',
    'Return-Path' => SITE_EMAIL,
    'Message-ID' => $message_id,
    'X-Mailer' => 'PHP/' . phpversion(),
    'X-Priority' => '3', // Normal priority
    'X-MSMail-Priority' => 'Normal',
    'Importance' => 'Normal',
    'Precedence' => 'bulk',
    'List-Unsubscribe' => '<mailto:' . SITE_EMAIL . '?subject=Unsubscribe>',
];
// Add DKIM-like headers (if you have DKIM set up)
if (isset($_SERVER['SERVER_NAME'])) {
    $headers['X-Originating-IP'] = $_SERVER['SERVER_ADDR'];
    $headers['X-Sender-IP'] = $_SERVER['SERVER_ADDR'];
}

// Convert headers array to string
$headers_string = '';
foreach ($headers as $key => $value) {
    $headers_string .= "$key: $value\r\n";
}

// Add additional headers to help with delivery
$additional_headers = [
    'MIME-Version: 1.0',
    'Content-Type: text/html; charset=UTF-8',
    'From: ' . SITE_NAME . ' <' . SITE_EMAIL . '>',
    'Reply-To: ' . $name . ' <' . $email . '>',
    'Return-Path: ' . SITE_EMAIL,
    'Message-ID: ' . $message_id,
    'X-Mailer: PHP/' . phpversion(),
    'X-Priority: 3',
    'X-MSMail-Priority: Normal',
    'Importance: Normal'
];

$headers_string = implode("\r\n", $additional_headers);

// Create proper HTML email
$email_body = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Contact Form Submission</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background-color: #f8f9fa; padding: 20px; border-radius: 5px; margin-bottom: 20px; }
        .field { margin-bottom: 15px; padding-bottom: 15px; border-bottom: 1px solid #eee; }
        .label { font-weight: bold; color: #2c3e50; display: inline-block; width: 120px; }
        .footer { margin-top: 30px; padding-top: 20px; border-top: 1px solid #eee; font-size: 12px; color: #7f8c8d; }
        .message-box { background-color: #f8f9fa; padding: 15px; border-radius: 5px; margin: 10px 0; }
    </style>
</head>
<body>
    <div class="header">
        <h2 style="margin: 0; color: #2c3e50;">From: MedLinkAnalytics.com</h2>
        <p style="margin: 5px 0 0 0; color: #7f8c8d;">MedLink Analytics Website</p>
    </div>
    
    <div class="field">
        <span class="label">Form Source:</span>
        <span>' . ucfirst(str_replace('_', ' ', $source)) . ' Form</span>
    </div>
    
    <div class="field">
        <span class="label">Name:</span>
        <span>' . htmlspecialchars($name) . '</span>
    </div>
    
    <div class="field">
        <span class="label">Email:</span>
        <span><a href="mailto:' . htmlspecialchars($email) . '" style="color: #3498db;">' . htmlspecialchars($email) . '</a></span>
    </div>
    
    <div class="field">
        <span class="label">Practice:</span>
        <span>' . (!empty($practice) ? htmlspecialchars($practice) : 'Not provided') . '</span>
    </div>
    
    <div class="field">
        <span class="label">Phone:</span>
        <span>' . (!empty($phone) ? htmlspecialchars($phone) : 'Not provided') . '</span>
    </div>
    
    <div class="field">
        <span class="label">Message:</span>
        <div class="message-box">
            ' . nl2br(htmlspecialchars($message)) . '
        </div>
    </div>
    
    <div class="field">
        <span class="label">Submitted:</span>
        <span>' . date('F j, Y, g:i a') . ' (MST)</span>
    </div>
    
    <div class="footer">
        <p>This email was sent from the contact form on ' . SITE_NAME . ' website.</p>
        <p>Please respond to the sender using the Reply-To address above.</p>
        <p style="font-size: 11px; color: #95a5a6;">
            IP Address: ' . $_SERVER['REMOTE_ADDR'] . '<br>
            User Agent: ' . ($_SERVER['HTTP_USER_AGENT'] ?? 'Not available') . '
        </p>
    </div>
</body>
</html>';

// Send email using proper parameters
$to = TO_EMAIL;
$subject = EMAIL_SUBJECT . ' - ' . date('m/d/Y');

// Use additional parameters for mail() function
$additional_params = '-f ' . SITE_EMAIL;

$email_success = mail($to, $subject, $email_body, $headers_string, $additional_params);

if (!$email_success && DEBUG_MODE) {
    error_log("Email sending failed. Headers used: " . print_r($headers_string, true));
}
    // 3. Prepare response
    $response = [
        'success' => true,
        'message' => 'Thank you! Your message has been sent successfully. We\'ll get back to you within 24 hours.',
        'db_saved' => $db_success,
        'email_sent' => $email_success
    ];
    
} catch (Exception $e) {
    // Log error
    if (DEBUG_MODE) {
        error_log("Form Error: " . $e->getMessage());
    }
    
    // Still show success to user (graceful degradation)
    $response = [
        'success' => true,
        'message' => 'Thank you! We have received your message.',
        'db_saved' => false,
        'email_sent' => false
    ];
}

echo json_encode($response);
?>