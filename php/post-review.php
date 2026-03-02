<?php
header('Content-Type: application/json');

$config = require __DIR__ . '/../../../config/secrets.php';
$supabaseUrl = $config['supabase_url'];
$supabaseKey = $config['supabase_service_key'];

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
    exit;
}

/* ===============================
   HONEYPOT
   =============================== */

$honeypot = trim($_POST['website'] ?? '');
if ($honeypot !== '') {
    echo json_encode(['status' => 'success', 'message' => 'Review posted successfully!']);
    exit;
}

/* ===============================
   RATE LIMITING
   =============================== */

$ip = $_SERVER['REMOTE_ADDR'];
$limit = 3;
$window = 3600;
$rateDir = __DIR__ . '/rate-limit';

if (!is_dir($rateDir)) {
    mkdir($rateDir, 0755, true);
}

$file = $rateDir . '/review_' . md5($ip);
$rateData = ['count' => 0, 'time' => time()];

if (file_exists($file)) {
    $rateData = json_decode(file_get_contents($file), true) ?: $rateData;

    if (time() - $rateData['time'] < $window) {
        if ($rateData['count'] >= $limit) {
            $recaptchaResponse = $_POST['g-recaptcha-response'] ?? '';

            if (!$recaptchaResponse) {
                echo json_encode([
                    'status'  => 'captcha_required',
                    'message' => 'Please complete the CAPTCHA to continue.',
                ]);
                exit;
            }

            $recaptchaSecret = $config['recaptcha_secret'];
            $ch = curl_init('https://www.google.com/recaptcha/api/siteverify');
            curl_setopt_array($ch, [
                CURLOPT_POST           => true,
                CURLOPT_POSTFIELDS     => http_build_query([
                    'secret'   => $recaptchaSecret,
                    'response' => $recaptchaResponse,
                ]),
                CURLOPT_RETURNTRANSFER => true,
            ]);
            $captchaResult = curl_exec($ch);
            curl_close($ch);

            $captchaData = json_decode($captchaResult);
            if (!$captchaData || !$captchaData->success) {
                echo json_encode(['status' => 'error', 'message' => 'CAPTCHA verification failed.']);
                exit;
            }
        }
        $rateData['count']++;
    } else {
        $rateData = ['count' => 1, 'time' => time()];
    }
} else {
    $rateData = ['count' => 1, 'time' => time()];
}

file_put_contents($file, json_encode($rateData));

/* ===============================
   INPUT VALIDATION
   =============================== */

$authorName  = trim($_POST['author_name'] ?? '');
$companyName = trim($_POST['company_name'] ?? '');
$email       = filter_var(trim($_POST['email'] ?? ''), FILTER_SANITIZE_EMAIL);
$rating      = (int)($_POST['rating'] ?? 0);
$reviewText  = trim($_POST['review_text'] ?? '');

if (!$authorName || mb_strlen($authorName) > 100) {
    echo json_encode(['status' => 'error', 'message' => 'Please enter a valid name (max 100 characters).']);
    exit;
}

if ($companyName && mb_strlen($companyName) > 100) {
    echo json_encode(['status' => 'error', 'message' => 'Company name must be under 100 characters.']);
    exit;
}

if (!$email || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(['status' => 'error', 'message' => 'Please enter a valid email address.']);
    exit;
}

if ($rating < 1 || $rating > 5) {
    echo json_encode(['status' => 'error', 'message' => 'Please select a rating between 1 and 5.']);
    exit;
}

if (!$reviewText || mb_strlen($reviewText) > 2000) {
    echo json_encode(['status' => 'error', 'message' => 'Please enter a review (max 2000 characters).']);
    exit;
}

/* ===============================
   INSERT INTO SUPABASE
   =============================== */

$salt = $config['recaptcha_secret'];
$ipHash = md5($ip . $salt);
$deleteToken = bin2hex(random_bytes(32));

$payload = json_encode([
    'author_name'  => $authorName,
    'company_name' => $companyName ?: null,
    'email'        => $email,
    'rating'       => $rating,
    'review_text'  => $reviewText,
    'delete_token' => $deleteToken,
    'ip_hash'      => $ipHash,
]);

$ch = curl_init($supabaseUrl . '/rest/v1/reviews');
curl_setopt_array($ch, [
    CURLOPT_POST           => true,
    CURLOPT_POSTFIELDS     => $payload,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTPHEADER     => [
        'apikey: ' . $supabaseKey,
        'Authorization: Bearer ' . $supabaseKey,
        'Content-Type: application/json',
        'Prefer: return=representation',
    ],
]);

$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

if ($httpCode !== 201) {
    echo json_encode(['status' => 'error', 'message' => 'Failed to post review. Please try again.']);
    exit;
}

$created = json_decode($response, true);
$review = is_array($created) && isset($created[0]) ? $created[0] : $created;
$review['review_replies'] = [];

unset($review['email'], $review['ip_hash'], $review['delete_token']);

echo json_encode([
    'status'       => 'success',
    'message'      => 'Review posted successfully!',
    'review'       => $review,
    'delete_token' => $deleteToken,
]);
exit;
