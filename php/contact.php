<?php
header('Content-Type: application/json');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'src/PHPMailer-master/src/Exception.php';
require 'src/PHPMailer-master/src/PHPMailer.php';
require 'src/PHPMailer-master/src/SMTP.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
    exit;
}

/* ===============================
   RECAPTCHA
   =============================== */

$recaptchaSecret = '6LeSajcsAAAAADjIlVWH7gmuRqSoHwMVecXYM_Ei';
$recaptchaResponse = $_POST['g-recaptcha-response'] ?? '';

$ch = curl_init('https://www.google.com/recaptcha/api/siteverify');
curl_setopt_array($ch, [
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => http_build_query([
        'secret' => $recaptchaSecret,
        'response' => $recaptchaResponse
    ]),
    CURLOPT_RETURNTRANSFER => true
]);

$response = curl_exec($ch);
curl_close($ch);

$captchaData = json_decode($response);

if (!$captchaData || !$captchaData->success) {
    echo json_encode(['status' => 'error', 'message' => 'CAPTCHA failed.']);
    exit;
}

/* ===============================
   RATE LIMITING
   =============================== */

$ip = $_SERVER['REMOTE_ADDR'];
$limit = 5;
$window = 3600;
$rateDir = __DIR__ . '/rate-limit';

if (!is_dir($rateDir)) {
    mkdir($rateDir, 0755, true);
}

$file = $rateDir . '/' . md5($ip);
$data = ['count' => 0, 'time' => time()];

if (file_exists($file)) {
    $data = json_decode(file_get_contents($file), true) ?: $data;

    if (time() - $data['time'] < $window) {
        if ($data['count'] >= $limit) {
            echo json_encode([
                'status' => 'error',
                'message' => 'Too many attempts. Please try again later.'
            ]);
            exit;
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
   EMAIL LOGIC
   =============================== */

try {
    // Admin email
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'noreply.uxory@gmail.com';
    $mail->Password = 'hxge frbq sbur wjug';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    $mail->setFrom('noreply.uxory@gmail.com', 'Uxory Contact');
    $mail->addAddress('uxoryllc@gmail.com');
    $mail->isHTML(true);
    $mail->Subject = 'New Contact Form Submission';

    $mail->Body = "
        <h2>New Contact Message</h2>
        <p><strong>Name:</strong> {$name}</p>
        <p><strong>Email:</strong> {$email}</p>
        <p><strong>Phone:</strong> {$phone}</p>
        <p><strong>Company:</strong> {$company}</p>
        <p><strong>Message:</strong><br>{$message}</p>
    ";

    $mail->send();

    // User auto-reply
    $autoReply = new PHPMailer(true);
    $autoReply->isSMTP();
    $autoReply->Host = 'smtp.hostinger.com';
    $autoReply->SMTPAuth = true;
    $autoReply->Username = 'contact@uxory.com';
    $autoReply->Password = 'N2v&tb6/;Wu';
    $autoReply->SMTPSecure = 'tls';
    $autoReply->Port = 587;

    $autoReply->setFrom('contact@uxory.com', 'Uxory Team');
    $autoReply->addAddress($email);
    $autoReply->isHTML(true);
    $autoReply->Subject = 'Thank You for Contacting Uxory';

    $tplPath = __DIR__ . '/email-templates/contact.html';
    $autoReply->Body = file_exists($tplPath)
        ? str_replace('{EMAIL}', $email, file_get_contents($tplPath))
        : 'Thank you for contacting us!';

    $autoReply->send();

} catch (Exception $e) {
    // Silent fail by design
}

echo json_encode([
    'status' => 'success',
    'message' => 'Message sent successfully! We’ll get back to you shortly.'
]);
exit;