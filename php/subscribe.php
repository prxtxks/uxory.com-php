<?php
// Ensure no whitespace exists before the opening <?php tag
header('Content-Type: application/json');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'src/PHPMailer-master/src/Exception.php';
require 'src/PHPMailer-master/src/PHPMailer.php';
require 'src/PHPMailer-master/src/SMTP.php';

// Load secrets from config file (outside web root)
$config = require __DIR__ . '/../../../config/secrets.php';

// Supabase configuration
$supabaseUrl = $config['supabase_url'];
$supabaseKey = $config['supabase_service_key']; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $recaptchaSecret = $config['recaptcha_secret'];
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
            // Check if email exists in Supabase
            $checkUrl = $supabaseUrl . '/rest/v1/subscribers?email=eq.' . urlencode($email) . '&select=id,status';
            $ch = curl_init($checkUrl);
            curl_setopt_array($ch, [
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_HTTPHEADER => [
                    'apikey: ' . $supabaseKey,
                    'Authorization: Bearer ' . $supabaseKey,
                    'Content-Type: application/json'
                ]
            ]);
            $response = curl_exec($ch);
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);

            if ($httpCode !== 200) {
                throw new Exception('Failed to check existing subscription');
            }

            $existing = json_decode($response, true);
            
            if (!empty($existing) && count($existing) > 0) {
                // Email exists - check status
                $currentStatus = $existing[0]['status'] ?? 'inactive';
                
                if ($currentStatus === 'active') {
                    // Already subscribed - don't update timestamp or send emails
                    echo json_encode(['status' => 'success', 'message' => 'You are already subscribed.']);
                    exit;
                } else {
                    // Status is inactive - resubscribe (update to active)
                    $updateUrl = $supabaseUrl . '/rest/v1/subscribers?email=eq.' . urlencode($email);
                    $updateData = [
                        'status' => 'active',
                        'subscribed_at' => date('c'), // ISO 8601 format
                        'unsubscribed_at' => null
                    ];
                    
                    $ch = curl_init($updateUrl);
                    curl_setopt_array($ch, [
                        CURLOPT_CUSTOMREQUEST => 'PATCH',
                        CURLOPT_POSTFIELDS => json_encode($updateData),
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_HTTPHEADER => [
                            'apikey: ' . $supabaseKey,
                            'Authorization: Bearer ' . $supabaseKey,
                            'Content-Type: application/json',
                            'Prefer: return=representation'
                        ]
                    ]);
                    $response = curl_exec($ch);
                    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                    curl_close($ch);

                    if ($httpCode !== 200 && $httpCode !== 204) {
                        throw new Exception('Failed to update subscription');
                    }
                    
                    // Resubscribed - send emails and return resubscribed message
                    if (!sendEmails($email, $config)) {
                        echo json_encode(['status' => 'error', 'message' => 'Resubscription saved but failed to send notification. Please try again.']);
                        exit;
                    }

                    echo json_encode(['status' => 'success', 'message' => 'You are resubscribed!']);
                    exit;
                }
            } else {
                // Email doesn't exist - insert new record
                $insertUrl = $supabaseUrl . '/rest/v1/subscribers';
                $insertData = [
                    'email' => $email,
                    'status' => 'active',
                    'subscribed_at' => date('c') // ISO 8601 format
                ];
                
                $ch = curl_init($insertUrl);
                curl_setopt_array($ch, [
                    CURLOPT_POST => true,
                    CURLOPT_POSTFIELDS => json_encode($insertData),
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_HTTPHEADER => [
                        'apikey: ' . $supabaseKey,
                        'Authorization: Bearer ' . $supabaseKey,
                        'Content-Type: application/json',
                        'Prefer: return=representation'
                    ]
                ]);
                $response = curl_exec($ch);
                $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                curl_close($ch);

                if ($httpCode !== 201 && $httpCode !== 200) {
                    $errorData = json_decode($response, true);
                    // Check if it's a unique constraint violation (email already exists)
                    if (isset($errorData['code']) && $errorData['code'] === '23505') {
                        // Email was inserted between check and insert - check status first
                        $checkUrl = $supabaseUrl . '/rest/v1/subscribers?email=eq.' . urlencode($email) . '&select=status';
                        $ch = curl_init($checkUrl);
                        curl_setopt_array($ch, [
                            CURLOPT_RETURNTRANSFER => true,
                            CURLOPT_HTTPHEADER => [
                                'apikey: ' . $supabaseKey,
                                'Authorization: Bearer ' . $supabaseKey,
                                'Content-Type: application/json'
                            ]
                        ]);
                        $response = curl_exec($ch);
                        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                        curl_close($ch);

                        if ($httpCode === 200) {
                            $existing = json_decode($response, true);
                            $currentStatus = $existing[0]['status'] ?? 'inactive';
                            
                            if ($currentStatus === 'active') {
                                // Already subscribed - don't update
                                echo json_encode(['status' => 'success', 'message' => 'You are already subscribed.']);
                                exit;
                            } else {
                                // Status is inactive - resubscribe
                                $updateUrl = $supabaseUrl . '/rest/v1/subscribers?email=eq.' . urlencode($email);
                                $updateData = [
                                    'status' => 'active',
                                    'subscribed_at' => date('c'),
                                    'unsubscribed_at' => null
                                ];
                                
                                $ch = curl_init($updateUrl);
                                curl_setopt_array($ch, [
                                    CURLOPT_CUSTOMREQUEST => 'PATCH',
                                    CURLOPT_POSTFIELDS => json_encode($updateData),
                                    CURLOPT_RETURNTRANSFER => true,
                                    CURLOPT_HTTPHEADER => [
                                        'apikey: ' . $supabaseKey,
                                        'Authorization: Bearer ' . $supabaseKey,
                                        'Content-Type: application/json',
                                        'Prefer: return=representation'
                                    ]
                                ]);
                                curl_exec($ch);
                                $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                                curl_close($ch);

                                if ($httpCode !== 200 && $httpCode !== 204) {
                                    throw new Exception('Failed to update subscription');
                                }
                                
                                // Resubscribed - send emails
                                if (!sendEmails($email, $config)) {
                                    echo json_encode(['status' => 'error', 'message' => 'Resubscription saved but failed to send notification. Please try again.']);
                                    exit;
                                }

                                echo json_encode(['status' => 'success', 'message' => 'You are resubscribed!']);
                                exit;
                            }
                        }
                    } else {
                        throw new Exception('Failed to create subscription');
                    }
                }
            }
            
            // Logic succeeded, now send emails
            if (!sendEmails($email, $config)) {
                echo json_encode(['status' => 'error', 'message' => 'Subscription saved but failed to send notification. Please try again.']);
                exit;
            }

            echo json_encode(['status' => 'success', 'message' => 'Subscription successful!']);
            exit;

        } catch (Exception $e) {
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
function sendEmails($email, $config) {
    // Admin Notification
    try {
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'noreply.uxory@gmail.com';
        $mail->Password = $config['gmail_smtp_password']; 
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        $mail->setFrom('noreply.uxory@gmail.com', 'Uxory Subscriptions');
        $mail->addAddress('uxoryllc@gmail.com');
        $mail->isHTML(true);
        $mail->Subject = 'New Subscriber';
        $mail->Body = "<h1>New Uxory Subscription</h1><p>Email: {$email}</p>";
        $mail->send();
    } catch (Exception $e) {
        return false; // Admin email failed
    }

    // User Confirmation (separate try-catch, silent fail)
    try {
        $autoReply = new PHPMailer(true);
        $autoReply->isSMTP();
        $autoReply->Host = 'smtp.hostinger.com';
        $autoReply->SMTPAuth = true;
        $autoReply->Username = 'contact@uxory.com';
        $autoReply->Password = $config['hostinger_email_password'];
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
        // Silent fail - user still sees success since admin received the notification
    }

    return true;
}