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
    echo json_encode(['status' => 'success', 'message' => 'Reply posted successfully!']);
    exit;
}

/* ===============================
   RATE LIMITING
   =============================== */

$ip = $_SERVER['REMOTE_ADDR'];
$limit = 5;
$window = 3600;
$rateDir = __DIR__ . '/rate-limit';

if (!is_dir($rateDir)) {
    mkdir($rateDir, 0755, true);
}

$file = $rateDir . '/reply_' . md5($ip);
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

$reviewId    = trim($_POST['review_id'] ?? '');
$authorName  = trim($_POST['author_name'] ?? '');
$companyName = trim($_POST['company_name'] ?? '');
$replyText   = trim($_POST['reply_text'] ?? '');

if (!$reviewId || !preg_match('/^[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/i', $reviewId)) {
    echo json_encode(['status' => 'error', 'message' => 'Invalid review reference.']);
    exit;
}

if (!$authorName || mb_strlen($authorName) > 100) {
    echo json_encode(['status' => 'error', 'message' => 'Please enter a valid name (max 100 characters).']);
    exit;
}

if ($companyName && mb_strlen($companyName) > 100) {
    echo json_encode(['status' => 'error', 'message' => 'Company name must be under 100 characters.']);
    exit;
}

if (!$replyText || mb_strlen($replyText) > 1000) {
    echo json_encode(['status' => 'error', 'message' => 'Please enter a reply (max 1000 characters).']);
    exit;
}

/* ===============================
   INSERT INTO SUPABASE
   =============================== */

$salt = $config['recaptcha_secret'];
$ipHash = md5($ip . $salt);

$payload = json_encode([
    'review_id'    => $reviewId,
    'author_name'  => $authorName,
    'company_name' => $companyName ?: null,
    'reply_text'   => $replyText,
    'ip_hash'      => $ipHash,
]);

$ch = curl_init($supabaseUrl . '/rest/v1/review_replies');
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
    echo json_encode(['status' => 'error', 'message' => 'Failed to post reply. Please try again.']);
    exit;
}

$created = json_decode($response, true);
$reply = is_array($created) && isset($created[0]) ? $created[0] : $created;

echo json_encode([
    'status'  => 'success',
    'message' => 'Reply posted successfully!',
    'reply'   => $reply,
]);
exit;
