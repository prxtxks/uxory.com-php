<?php
header('Content-Type: application/json');

// Load secrets from config file (outside web root)
$config = require __DIR__ . '/../../../config/secrets.php';

// Supabase configuration
$supabaseUrl = $config['supabase_url'];
$supabaseKey = $config['supabase_service_key'];

// Debug: Log request method and POST data (remove in production)
// error_log("Request Method: " . $_SERVER["REQUEST_METHOD"]);
// error_log("POST data: " . print_r($_POST, true));
// error_log("Raw input: " . file_get_contents('php://input'));

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['email'])) {
    $email = trim($_POST['email']);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(["success" => false, "message" => "Invalid email address."]);
        exit;
    }

    try {
        // Check if the email exists in Supabase and get its status
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
            echo json_encode(["success" => false, "message" => "Database connection failed."]);
            exit;
        }

        $existing = json_decode($response, true);

        if (empty($existing) || count($existing) === 0) {
            // Email doesn't exist in database
            echo json_encode(["success" => false, "message" => "This email was never subscribed."]);
        } else {
            // Email exists - check status
            $currentStatus = $existing[0]['status'] ?? 'inactive';
            
            if ($currentStatus === 'inactive') {
                // Already unsubscribed
                echo json_encode(["success" => false, "message" => "You are not subscribed."]);
            } else {
                // Status is active - proceed with unsubscribe
                $updateUrl = $supabaseUrl . '/rest/v1/subscribers?email=eq.' . urlencode($email);
                $updateData = [
                    'status' => 'inactive',
                    'unsubscribed_at' => date('c') // ISO 8601 format
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

                if ($httpCode === 200 || $httpCode === 204) {
                    echo json_encode(["success" => true, "message" => "You've been unsubscribed successfully."]);
                } else {
                    $errorData = json_decode($response, true);
                    $errorMsg = isset($errorData['message']) ? $errorData['message'] : 'Failed to update subscription status.';
                    echo json_encode(["success" => false, "message" => $errorMsg]);
                }
            }
        }
    } catch (Exception $e) {
        echo json_encode(["success" => false, "message" => "An error occurred: " . $e->getMessage()]);
    }
} else {
    // More detailed error message for debugging (remove details in production)
    $errorMsg = "Invalid request.";
    if ($_SERVER["REQUEST_METHOD"] !== "POST") {
        $errorMsg = "Invalid request method: " . $_SERVER["REQUEST_METHOD"];
    } elseif (!isset($_POST['email'])) {
        $errorMsg = "Email parameter missing. POST data: " . (empty($_POST) ? "empty" : json_encode($_POST));
    }
    echo json_encode(["success" => false, "message" => $errorMsg]);
}
?>
