<?php
// Ensure no whitespace exists before the opening <?php tag
header('Content-Type: application/json');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'src/PHPMailer-master/src/Exception.php';
require 'src/PHPMailer-master/src/PHPMailer.php';
require 'src/PHPMailer-master/src/SMTP.php';

$host = 'localhost';
$db   = 'uxory_db';
$user = 'root'; 
$pass = 'uxory_pratikesh_2025'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $recaptchaSecret = '6LeSajcsAAAAADjIlVWH7gmuRqSoHwMVecXYM_Ei';
    $recaptchaResponse = $_POST['g-recaptcha-response'] ?? '';

    // Verify reCAPTCHA
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(['secret' => $recaptchaSecret, 'response' => $recaptchaResponse]));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $verify = curl_exec($ch);
    curl_close($ch);
    $captchaData = json_decode($verify);

    if (!$captchaData || !$captchaData->success) {
        echo json_encode(['status' => 'error', 'message' => 'CAPTCHA failed. Are you a robot?']);
        exit;
    }

    // Rate limiting
    $ip = $_SERVER['REMOTE_ADDR'];
        $limit = 5;           // max attempts
        $window = 3600;       // 1 hour in seconds
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

    $email = filter_var(trim($_POST['email'] ?? ''), FILTER_SANITIZE_EMAIL);

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        try {
            $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $pdo->prepare("SELECT id FROM subscribers WHERE email = :email");
            $stmt->execute(['email' => $email]);
            
            if ($stmt->fetchColumn()) {
                $stmt = $pdo->prepare("UPDATE subscribers SET is_subscribed = 1, subscribed_at = NOW(), unsubscribe_at = NULL WHERE email = :email");
            } else {
                $stmt = $pdo->prepare("INSERT INTO subscribers (email, is_subscribed, subscribed_at) VALUES (:email, 1, NOW())");
            }
            $stmt->execute(['email' => $email]);
            
            // Logic succeeded, now send emails
            sendEmails($email);

            echo json_encode(['status' => 'success', 'message' => 'Subscription successful!']);
            exit;

        } catch (PDOException $e) {
            echo json_encode(['status' => 'error', 'message' => 'Database error.']);
            exit;
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Invalid email address.']);
        exit;
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
    exit;
}

// Function stays outside the logic block
function sendEmails($email) {
    try {
        // Admin Notification
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'uxoryllc@gmail.com';
        $mail->Password = 'csqh ehxs itjm nfko'; 
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        $mail->setFrom('uxoryllc@gmail.com', 'Uxory Subscriptions');
        $mail->addAddress('uxoryllc@gmail.com');
        $mail->isHTML(true);
        $mail->Subject = 'New Subscriber';
        $mail->Body = "<h1>New Uxory Subscription</h1><p>Email: {$email}</p>";
        $mail->send();

        // User Confirmation
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
        $autoReply->Subject = 'Thank You for Subscribing to Uxory';
        $tplPath = __DIR__ . '/email-templates/subscribe.html';
        $autoReply->Body = file_exists($tplPath) ? str_replace(['{EMAIL}'], [$email], file_get_contents($tplPath)) : "Thank you for subscribing!";
        $autoReply->send();
    } catch (Exception $e) {
        // We don't exit here so the user still gets a "Success" message even if email logs fail
    }
}