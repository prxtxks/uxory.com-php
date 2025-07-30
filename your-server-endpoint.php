use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);
try {
    $mail->setFrom($email, $name);
    $mail->addAddress('mepratikchaudhari@icloud.com');
    $mail->Subject = 'Uxory- New Contact Form Submission';
    $mail->Body    = "Name: $name\nCompany: $company\nEmail: $email\nService: $service\nBudget: $budget\nMessage: $message";
    $mail->send();
    http_response_code(200);
} catch (Exception $e) {
    http_response_code(500);
}