<?php

// TEMPORARILY DISABLE CONTACT FORM
http_response_code(403);
exit('Contact form temporarily disabled. Please try again later.');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'src/PHPMailer-master/src/Exception.php';
require 'src/PHPMailer-master/src/PHPMailer.php';
require 'src/PHPMailer-master/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $company = $_POST['company'];
    $email = $_POST['email'];
    $message = $_POST['Message'];
    $phone = $_POST['phone'];

    // 1. Email to you (Uxory)
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = '';
        $mail->Password = '';
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
        $autoReply->Host = 'smtp.hostinger.com';
        $autoReply->SMTPAuth = true;
        $autoReply->Username = '';
        $autoReply->Password = '';
        $autoReply->SMTPSecure = 'tls';
        $autoReply->Port = 587;

        $autoReply->setFrom('contact@uxory.com', 'Uxory Team');
        $autoReply->addAddress($email);

        $autoReply->isHTML(true);
        $autoReply->Subject = 'We have received your message';

        // Load and personalize your HTML template
        $template = file_get_contents(__DIR__ . '/contact-form-thank-you-email-template.html');
        if ($template === false || trim($template) === '') {
            die('Could not load HTML template or file is empty. Check the path and file contents!');
        }
        $template = str_replace(['{EMAIL}'], [$email], $template);

        $autoReply->Body = $template;

        $autoReply->send();

        // Redirect after both emails sent
        header('Location: ../thank-you.php');
        exit();

   } catch (Exception $e) {
    // Show which mail failed:
    echo "Admin mail sent.<br>";
    echo "Auto-reply error: {$e->getMessage()}<br>";
    echo "PHPMailer Error: {$autoReply->ErrorInfo}";
}
}
?>