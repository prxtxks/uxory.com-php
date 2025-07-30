<?php
// Return JSON
header('Content-Type: application/json');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load PHPMailer classes
require 'src/PHPMailer-master/src/Exception.php';
require 'src/PHPMailer-master/src/PHPMailer.php';
require 'src/PHPMailer-master/src/SMTP.php';

// Database credentials
$host     = 'localhost';
$db       = 'uxory_db';
$user     = 'root'; 
$pass     = 'uxory_pratikesh_2025';  // for hostinger use 'uxory_pratikesh_2025'

$response = [
    'status'  => 'error',
    'message' => ''
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // 1. Database operation
        try {
            $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $pdo->prepare("SELECT id FROM subscribers WHERE email = :email");
            $stmt->execute(['email' => $email]);
            $subscriberExists = $stmt->fetchColumn();

            if ($subscriberExists) {
                $stmt = $pdo->prepare(
                    "UPDATE subscribers
                     SET is_subscribed = 1, subscribed_at = NOW(), unsubscribe_at = NULL
                     WHERE email = :email"
                );
                $stmt->execute(['email' => $email]);
                $response['status']  = 'success';
                $response['message'] = 'You have successfully re-subscribed!';
            } else {
                $stmt = $pdo->prepare(
                    "INSERT INTO subscribers (email, is_subscribed, subscribed_at, unsubscribe_at)
                     VALUES (:email, 1, NOW(), NULL)"
                );
                $stmt->execute(['email' => $email]);
                $response['status']  = 'success';
                $response['message'] = 'Subscription successful!';
            }
        } catch (PDOException $e) {
            $response['message'] = 'Database error: ' . $e->getMessage();
            echo json_encode($response);
            exit;
        }

        // 2. Send admin notification
        if ($response['status'] === 'success') {
            $mail = new PHPMailer(true);
            try {
                $mail->isSMTP();
                $mail->Host       = 'smtp.gmail.com';
                $mail->SMTPAuth   = true;
                $mail->Username   = 'uxoryllc@gmail.com';
                $mail->Password   = 'jfsk uhey buqj hvsf'; // App password
                $mail->SMTPSecure = 'tls';
                $mail->Port       = 587;

                $mail->setFrom('uxoryllc@gmail.com', 'Uxory Subscriptions');
                $mail->addAddress('uxoryllc@gmail.com', 'Uxory Team');

                $mail->isHTML(true);
                $mail->Subject = 'New Subscriber';
                $mail->Body    = "<h1>New Uxory Subscription</h1><p><strong>Email:</strong> {$email}</p>";

                $mail->send();
            } catch (Exception $e) {
                error_log("Admin notification error: " . $mail->ErrorInfo);
                // continue even on failure
            }

            // ── ADD THIS BLOCK TO SEND THE CUSTOMER A “THANK YOU” EMAIL ──

            try {
                $autoReply = new PHPMailer(true);
                $autoReply->isSMTP();
                $autoReply->Host       = 'smtp.hostinger.com';
                $autoReply->SMTPAuth   = true;
                $autoReply->Username   = 'contact@uxory.com';
                $autoReply->Password   = 'N2v&tb6/;Wu';
                $autoReply->SMTPSecure = 'tls';
                $autoReply->Port       = 587;

                $autoReply->setFrom('contact@uxory.com', 'Uxory Team');
                $autoReply->addAddress($email);

                $autoReply->isHTML(true);
                $autoReply->Subject = 'Thank You for Subscribing to Uxory';

                // Load and personalize the “thank you for subscribing” template
                $tplPath = __DIR__ . '/email-templates/thank-you-for-subscribing.html';
                $template = file_get_contents($tplPath);
                if ($template && trim($template) !== '') {
                    // Replace {EMAIL} placeholder (or add more if needed)
                    $template = str_replace(
                        ['{EMAIL}'],
                        [$email],
                        $template
                    );
                    $autoReply->Body = $template;
                } else {
                    // Fallback plain text
                    $autoReply->Body = "Thank you for subscribing to Uxory! We're excited to have you on board.";
                }

                $autoReply->send();
            } catch (Exception $e) {
                error_log("Customer auto-reply error: " . $autoReply->ErrorInfo);
            }
            // ── END CUSTOMER EMAIL BLOCK ──
        }
    } else {
        $response['message'] = 'Please enter a valid email address.';
    }
} else {
    $response['message'] = 'Invalid request method.';
}

echo json_encode($response);
exit;
?>