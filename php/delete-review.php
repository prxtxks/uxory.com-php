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
   INPUT VALIDATION
   =============================== */

$reviewId    = trim($_POST['review_id'] ?? '');
$deleteToken = trim($_POST['delete_token'] ?? '');

if (!$reviewId || !preg_match('/^[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/i', $reviewId)) {
    echo json_encode(['status' => 'error', 'message' => 'Invalid review reference.']);
    exit;
}

if (!$deleteToken || strlen($deleteToken) !== 64) {
    echo json_encode(['status' => 'error', 'message' => 'Invalid delete token.']);
    exit;
}

/* ===============================
   VERIFY TOKEN BY FETCHING REVIEW
   =============================== */

$ch = curl_init($supabaseUrl . '/rest/v1/reviews?id=eq.' . $reviewId . '&select=id,delete_token');
curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTPHEADER     => [
        'apikey: ' . $supabaseKey,
        'Authorization: Bearer ' . $supabaseKey,
        'Content-Type: application/json',
    ],
]);

$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

if ($httpCode !== 200) {
    echo json_encode(['status' => 'error', 'message' => 'Failed to verify review.']);
    exit;
}

$reviews = json_decode($response, true) ?: [];

if (empty($reviews)) {
    echo json_encode(['status' => 'error', 'message' => 'Review not found.']);
    exit;
}

if (!hash_equals($reviews[0]['delete_token'], $deleteToken)) {
    echo json_encode(['status' => 'error', 'message' => 'Unauthorized. You can only delete your own reviews.']);
    exit;
}

/* ===============================
   DELETE FROM SUPABASE
   =============================== */

$ch = curl_init($supabaseUrl . '/rest/v1/reviews?id=eq.' . $reviewId);
curl_setopt_array($ch, [
    CURLOPT_CUSTOMREQUEST  => 'DELETE',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTPHEADER     => [
        'apikey: ' . $supabaseKey,
        'Authorization: Bearer ' . $supabaseKey,
        'Content-Type: application/json',
    ],
]);

$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

if ($httpCode !== 200 && $httpCode !== 204) {
    echo json_encode(['status' => 'error', 'message' => 'Failed to delete review.']);
    exit;
}

echo json_encode([
    'status'  => 'success',
    'message' => 'Review deleted successfully.',
]);
exit;
