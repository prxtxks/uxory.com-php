<?php
header('Content-Type: application/json');

require __DIR__ . '/resend.php';

// Load secrets from config file (outside web root)
$config = require __DIR__ . '/../../../config/secrets.php';
$resendKey = $config['resend_api_key'];

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
    exit;
}

/* ===============================
   HONEYPOT
   =============================== */

$honeypot = trim($_POST['website'] ?? '');
if ($honeypot !== '') {
    echo json_encode(['status' => 'success', 'message' => 'Application submitted successfully!']);
    exit;
}

/* ===============================
   RATE LIMITING + CONDITIONAL CAPTCHA
   =============================== */

$ip = $_SERVER['REMOTE_ADDR'];
$limit = 5;
$window = 3600;
$rateDir = __DIR__ . '/rate-limit';

if (!is_dir($rateDir)) {
    mkdir($rateDir, 0755, true);
}

$file = $rateDir . '/app_' . md5($ip);
$data = ['count' => 0, 'time' => time()];

if (file_exists($file)) {
    $data = json_decode(file_get_contents($file), true) ?: $data;

    if (time() - $data['time'] < $window) {
        if ($data['count'] >= $limit) {
            $recaptchaResponse = $_POST['g-recaptcha-response'] ?? '';

            if (!$recaptchaResponse) {
                echo json_encode([
                    'status'  => 'captcha_required',
                    'message' => 'Please complete the CAPTCHA to continue.',
                ]);
                exit;
            }

            $recaptchaSecret = $config['recaptcha_secret'];
            $ch = curl_init('https://www.google.com/recaptcha/api/siteverify');
            curl_setopt_array($ch, [
                CURLOPT_POST           => true,
                CURLOPT_POSTFIELDS     => http_build_query([
                    'secret'   => $recaptchaSecret,
                    'response' => $recaptchaResponse,
                ]),
                CURLOPT_RETURNTRANSFER => true,
            ]);
            $captchaResult = curl_exec($ch);
            curl_close($ch);

            $captchaData = json_decode($captchaResult);
            if (!$captchaData || !$captchaData->success) {
                echo json_encode(['status' => 'error', 'message' => 'CAPTCHA verification failed.']);
                exit;
            }
        }
        $data['count']++;
    } else {
        $data = ['count' => 1, 'time' => time()];
    }
} else {
    $data = ['count' => 1, 'time' => time()];
}

file_put_contents($file, json_encode($data));

/* ===============================
   INPUT VALIDATION
   =============================== */

$name = trim($_POST['name'] ?? '');
$email = filter_var(trim($_POST['email'] ?? ''), FILTER_SANITIZE_EMAIL);
$position = trim($_POST['position'] ?? 'General Application');

if (!$name || strlen($name) < 2) {
    echo json_encode(['status' => 'error', 'message' => 'Please enter a valid name.']);
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(['status' => 'error', 'message' => 'Please enter a valid email address.']);
    exit;
}

/* ===============================
   FILE VALIDATION
   =============================== */

if (!isset($_FILES['resume']) || $_FILES['resume']['error'] !== UPLOAD_ERR_OK) {
    echo json_encode(['status' => 'error', 'message' => 'Resume upload failed. Please try again.']);
    exit;
}

$resume = $_FILES['resume'];
$allowedTypes = ['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'image/png', 'image/jpeg'];
$maxSize = 5 * 1024 * 1024; // 5MB

// Check file type
$finfo = finfo_open(FILEINFO_MIME_TYPE);
$mimeType = finfo_file($finfo, $resume['tmp_name']);
finfo_close($finfo);

if (!in_array($mimeType, $allowedTypes)) {
    echo json_encode(['status' => 'error', 'message' => 'Invalid file type. Please upload PDF, DOC, DOCX, PNG, or JPG.']);
    exit;
}

// Check file size
if ($resume['size'] > $maxSize) {
    echo json_encode(['status' => 'error', 'message' => 'File too large. Maximum size is 5MB.']);
    exit;
}

/* ===============================
   EMAIL LOGIC (Resend API)
   =============================== */

$adminHtml = "
    <h2>New Job Application Received</h2>
    <p><strong>Position:</strong> {$position}</p>
    <p><strong>Name:</strong> {$name}</p>
    <p><strong>Email:</strong> {$email}</p>
    <p><strong>Resume:</strong> Attached</p>
";

// Base64-encode the uploaded resume for the Resend attachment
$resumeAttachment = [
    [
        'filename' => $resume['name'],
        'content'  => base64_encode(file_get_contents($resume['tmp_name'])),
    ]
];

$adminResult = sendResendEmail(
    $resendKey,
    'Uxory Careers <noreply@uxory.com>',
    'uxoryllc@gmail.com',
    "New Job Application: {$position}",
    $adminHtml,
    $resumeAttachment
);

if (!$adminResult['success']) {
    echo json_encode(['status' => 'error', 'message' => 'Failed to send application. Please try again later.']);
    exit;
}

// Auto-reply to applicant (silent fail)
$tplPath = __DIR__ . '/email-templates/application.html';
if (file_exists($tplPath)) {
    $autoReplyHtml = str_replace(['{NAME}', '{POSITION}'], [$name, $position], file_get_contents($tplPath));
} else {
    $autoReplyHtml = "
        <h2>Thank You for Your Application, {$name}!</h2>
        <p>We have received your application for the <strong>{$position}</strong> position.</p>
        <p>Our team will review your application and get back to you soon.</p>
        <br>
        <p>Best regards,<br>Uxory Team</p>
    ";
}

sendResendEmail(
    $resendKey,
    'Uxory Careers <contact@uxory.com>',
    $email,
    'Application Received - Uxory',
    $autoReplyHtml
);

echo json_encode([
    'status' => 'success',
    'message' => 'Application submitted successfully! We\'ll review your application and get back to you soon.'
]);
exit;
