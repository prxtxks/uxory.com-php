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
$pass     = 'uxory_pratikesh_2025';  // for hostinger use 'uxory_pratikesh_2025' 'newpassword' for mac

// Default response
$response = [
    'status'  => 'error',
    'message' => ''
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get and sanitize email
    $email = trim($_POST['email'] ?? '');

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // 1. Database operation (Insert or Update)
        try {
            $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Check if email already exists
            $stmt = $pdo->prepare("SELECT id FROM subscribers WHERE email = :email");
            $stmt->execute(['email' => $email]);
            $subscriberExists = $stmt->fetchColumn(); // Returns id if exists, false otherwise

            if ($subscriberExists) {
                // If email exists, update its status
                $stmt = $pdo->prepare(
                    "UPDATE subscribers
                     SET is_subscribed = 1, subscribed_at = NOW(), unsubscribe_at = NULL
                     WHERE email = :email"
                );
                $stmt->execute(['email' => $email]);
                $response['status']  = 'success';
                $response['message'] = 'You have successfully re-subscribed!';
            } else {
                // If email does not exist, insert a new record
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

        // 2. Send email notification (only if database operation was successful)
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
                $mail->addAddress('uxoryllc@gmail.com', 'Uxory Team'); // Or to the user's email: $mail->addAddress($email, 'New Subscriber');

                $mail->isHTML(true);
                $mail->Subject = 'New Subscriber';
                $mail->Body    = "<h1>New Uxory Subscription</h1><p><strong>Email:</strong> {$email}</p>";

                $mail->send();
                // The response message is already set by the database operation.
                // No need to override it here unless you want a different message for email success.
            } catch (Exception $e) {
                // If email sending fails, it's a soft error. We'll still report DB success.
                // You might want to log this error.
                error_log("PHPMailer Error: " . $mail->ErrorInfo);
                // Optionally, append to the user message, but don't change 'success' status
                // if the primary action (DB update) was successful.
                $response['message'] .= " (Email notification failed: " . $mail->ErrorInfo . ")";
            }
        }
    } else {
        $response['message'] = 'Please enter a valid email address.';
    }
} else {
    $response['message'] = 'Invalid request method.';
}

echo json_encode($response);
exit;