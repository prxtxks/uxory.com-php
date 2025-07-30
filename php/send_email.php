<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'src/PHPMailer-master/src/Exception.php';
require 'src/PHPMailer-master/src/PHPMailer.php';
require 'src/PHPMailer-master/src/SMTP.php';

// Database credentials
$host     = 'localhost';
$db       = 'uxory_db';
$user     = 'root';  // Your database username
$pass     = 'uxory_pratikesh_2025';  // for hostinger use 'uxory_pratikesh_2025', 'newpassword' for mac

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize form data
    $name = htmlspecialchars(trim($_POST['name'] ?? ''));
    $company = htmlspecialchars(trim($_POST['company'] ?? ''));
    $email = htmlspecialchars(trim($_POST['email'] ?? ''));
    $message = htmlspecialchars(trim($_POST['Message'] ?? '')); // Note: 'Message' with capital M
    $phone = htmlspecialchars(trim($_POST['phone'] ?? ''));

    // --- START DATABASE INSERTION ---
    try {
        $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8mb4", $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false); // Recommended for security

        // Prepare the INSERT statement
        $stmt = $pdo->prepare("INSERT INTO leads (name, email, phone, company_name, message) VALUES (:name, :email, :phone, :company_name, :message)");

        // Bind parameters
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':company_name', $company);
        $stmt->bindParam(':message', $message);

        // Execute the statement
        $stmt->execute();

        // Optionally, log success or set a flag
        // error_log("New lead saved to database for: " . $email);

    } catch (PDOException $e) {
        // Handle database error
        // Instead of dying, you might want to log this and still attempt to send emails
        error_log("Database Error (leads table): " . $e->getMessage());
        // You might want to redirect to an error page or show a message
        // For now, we'll just log and continue to email sending.
        // If database saving is critical, you might exit here.
        // header('Location: ../error-page.php?db_error=true');
        // exit();
    }
    // --- END DATABASE INSERTION ---


    // 1. Email to you (Uxory)
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'uxoryllc@gmail.com';
        $mail->Password = 'jfsk uhey buqj hvsf';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        //Recipients
        $mail->setFrom('uxoryllc@gmail.com', 'Uxory');
        $mail->addAddress('uxoryllc@gmail.com');

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'New Contact Form Submission';
        $mail->Body    = "<h1>Uxory's Contact Form Submission</h1>
                          <p><strong>Name:</strong> $name</p>
                          <p><strong>Company:</strong> $company</p>
                          <p><strong>Email:</strong> $email</p>
                          <p><strong>Phone:</strong> $phone</p>
                          <p><strong>Message:</strong> $message</p>";
        $mail->send();

        // 2. Email to the user (auto-reply with HTML template)
        $autoReply = new PHPMailer(true);
        $autoReply->isSMTP();
        $autoReply->Host = 'smtp.hostinger.com'; // Ensure this SMTP is correctly configured and accessible
        $autoReply->SMTPAuth = true;
        $autoReply->Username = 'contact@uxory.com';
        $autoReply->Password = 'N2v&tb6/;Wu';
        $autoReply->SMTPSecure = 'tls';
        $autoReply->Port = 587;

        $autoReply->setFrom('contact@uxory.com', 'Uxory Team');
        $autoReply->addAddress($email);

        $autoReply->isHTML(true);
        $autoReply->Subject = 'We have received your message';

        // Load and personalize your HTML template
        $template = file_get_contents(__DIR__ . '/email-templates/thank-you-for-contacting.html');
        if ($template === false || trim($template) === '') {
            // Log the error instead of dying, so it doesn't break the script for the user
            error_log('Could not load HTML template or file is empty. Check the path and file contents!');
            $autoReply->Body = "Thank you for contacting Uxory! We have received your message and will get back to you soon."; // Fallback message
        } else {
            $template = str_replace(['{EMAIL}', '{Name}'], [$email, $name], $template);
            $autoReply->Body = $template;
        }

        $autoReply->send();

        // Redirect after all operations (DB save and both emails) are attempted
        header('Location: ../thank-you.php');
        exit();

    } catch (Exception $e) {
        // This catch block handles errors from *either* email sending (admin or auto-reply)
        error_log("Email sending error: " . $e->getMessage()); // Log the error
        // You might want to redirect to a generic success page even if email failed,
        // as the form data is likely saved to the DB.
        header('Location: ../thank-you.php?email_error=true'); // Indicate email error
        exit();
    }
} else {
    // If not a POST request, redirect or show an error
    header('Location: ../contact.html'); // Or your contact form page
    exit();
}
?>