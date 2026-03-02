<?php
header('Content-Type: application/json');

$config = require __DIR__ . '/../../../config/secrets.php';
$supabaseUrl = $config['supabase_url'];
$supabaseKey = $config['supabase_service_key'];

if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
    exit;
}

$ch = curl_init($supabaseUrl . '/rest/v1/reviews?select=id,author_name,company_name,rating,review_text,created_at,review_replies(id,review_id,author_name,company_name,reply_text,created_at)&order=created_at.desc&review_replies.order=created_at.asc');
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
    echo json_encode(['status' => 'error', 'message' => 'Failed to fetch reviews.']);
    exit;
}

$reviews = json_decode($response, true) ?: [];

$total = count($reviews);
$avgRating = 0;
if ($total > 0) {
    $sum = array_sum(array_column($reviews, 'rating'));
    $avgRating = round($sum / $total, 1);
}

echo json_encode([
    'status'  => 'success',
    'reviews' => $reviews,
    'stats'   => [
        'total'          => $total,
        'average_rating' => $avgRating,
    ],
]);
exit;
