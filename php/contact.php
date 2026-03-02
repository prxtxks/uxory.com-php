<?php
header('Content-Type: application/json');

require __DIR__ . '/resend.php';

// Load secrets from config file (outside web root)
$config = require __DIR__ . '/../../../config/secrets.php';
$resendKey = $config['resend_api_key'];
$supabaseUrl = $config['supabase_url'];
$supabaseKey = $config['supabase_service_key'];

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
    exit;
}

/* ===============================
   HONEYPOT
   =============================== */

$honeypot = trim($_POST['website'] ?? '');
if ($honeypot !== '') {
    echo json_encode(['status' => 'success', 'message' => 'Message sent successfully!']);
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

$file = $rateDir . '/contact_' . md5($ip);
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

$name    = trim($_POST['name'] ?? '');
$phone   = trim($_POST['phone'] ?? '');
$email   = filter_var(trim($_POST['email'] ?? ''), FILTER_SANITIZE_EMAIL);
$company = trim($_POST['company'] ?? '');
$message = trim($_POST['Message'] ?? '');

if (!$name || !$phone || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(['status' => 'error', 'message' => 'Invalid form data.']);
    exit;
}

/* ===============================
   EMAIL LOGIC (Resend API)
   =============================== */

$adminHtml = "
    <h2>New Contact Message</h2>
    <p><strong>Name:</strong> {$name}</p>
    <p><strong>Email:</strong> {$email}</p>
    <p><strong>Phone:</strong> {$phone}</p>
    <p><strong>Company:</strong> {$company}</p>
    <p><strong>Message:</strong><br>{$message}</p>
";

$adminResult = sendResendEmail(
    $resendKey,
    'Uxory Contact <onboarding@resend.dev>',
    'uxoryllc@gmail.com',
    'New Contact Form Submission',
    $adminHtml
);

if (!$adminResult['success']) {
    echo json_encode(['status' => 'error', 'message' => 'Failed to send message. Please try again later.']);
    exit;
}

// Store lead in Supabase (silent fail — email already sent to admin)
$leadData = json_encode([
    'name'    => $name,
    'email'   => $email,
    'phone'   => $phone,
    'company' => $company,
    'message' => $message,
]);
$ch = curl_init($supabaseUrl . '/rest/v1/leads');
curl_setopt_array($ch, [
    CURLOPT_POST           => true,
    CURLOPT_POSTFIELDS     => $leadData,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTPHEADER     => [
        'apikey: ' . $supabaseKey,
        'Authorization: Bearer ' . $supabaseKey,
        'Content-Type: application/json',
    ],
]);
curl_exec($ch);
curl_close($ch);

// User auto-reply (silent fail)
$tplPath = __DIR__ . '/email-templates/contact.html';
$autoReplyHtml = file_exists($tplPath)
    ? str_replace('{EMAIL}', $email, file_get_contents($tplPath))
    : 'Thank you for contacting us!';

sendResendEmail(
    $resendKey,
    'Uxory Team <onboarding@resend.dev>',
    $email,
    'Thank You for Contacting Uxory',
    $autoReplyHtml
);

echo json_encode([
    'status' => 'success',
    'message' => 'Message sent successfully! We\'ll get back to you shortly.'
]);
exit;
