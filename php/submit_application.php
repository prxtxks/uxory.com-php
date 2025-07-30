<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'src/PHPMailer-master/src/Exception.php';
require 'src/PHPMailer-master/src/PHPMailer.php';
require 'src/PHPMailer-master/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $resume = $_FILES['resume'];

    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'uxoryllc@gmail.com'; // Your Gmail address
        $mail->Password = 'wqka qdbe kajy dunp'; // Your Gmail App Password
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Recipients
        $mail->setFrom('uxoryllc@gmail.com', 'Uxory');
        $mail->addAddress('uxoryllc@gmail.com');

        // Attach resume
        if ($resume['error'] === UPLOAD_ERR_OK) {
            $mail->addAttachment($resume['tmp_name'], $resume['name']);
        } else {
            throw new Exception("Resume upload failed. Error code: " . $resume['error']);
        }

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'New Application Form Submission';
        $mail->Body = "<h1>Uxory's Application Form Submission</h1>
                       <p><strong>Name:</strong> $name</p>
                       <p><strong>Email:</strong> $email</p>";

        $mail->send();

        header('Location: ../thank-you.html');
        exit();

    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>