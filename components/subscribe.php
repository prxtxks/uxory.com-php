<?php
// subscribe.php

// TEMPORARILY DISABLE SUBSCRIPTIONS (ANTI-SPAM)
header('Content-Type: application/json');
http_response_code(403);
echo json_encode([
    'status' => 'disabled',
    'message' => 'Subscriptions are temporarily disabled. Please try again later.'
]);
exit;

// Return JSON
header('Content-Type: application/json');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load PHPMailer classes
require 'src/PHPMailer-master/src/Exception.php';
require 'src/PHPMailer-master/src/PHPMailer.php';
require 'src/PHPMailer-master/src/SMTP.php';

// Prepare default response
$response = [
    'status'  => 'error',
    'message' => ''
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve and validate email
    $email = trim($_POST['email'] ?? '');
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $mail = new PHPMailer(true);
        try {
            // SMTP settings
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'uxoryllc@gmail.com';       // your Gmail address
            $mail->Password   = 'jfsk uhey buqj hvsf';        // your Gmail App Password
            $mail->SMTPSecure = 'tls';
            $mail->Port       = 587;

            // Recipients
            $mail->setFrom('uxoryllc@gmail.com', 'Uxory Subscriptions');
            $mail->addAddress('uxoryllc@gmail.com', 'Uxory Team');

            // Content
            $mail->isHTML(true);
            $mail->Subject = 'New Subscriber';
            $mail->Body    = "
                <h1>New Uxory Subscription</h1>
                <p><strong>Email:</strong> {$email}</p>
            ";

            // Send mail
            $mail->send();
            $response['status']  = 'success';
            $response['message'] = 'Subscription successful!';
        } catch (Exception $e) {
            $response['message'] = 'Subscription failed: ' . $mail->ErrorInfo;
        }
    } else {
        $response['message'] = 'Please enter a valid email address.';
    }
} else {
    $response['message'] = 'Invalid request method.';
}

// Return JSON response
echo json_encode($response);
exit;