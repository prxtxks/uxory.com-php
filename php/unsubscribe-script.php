<?php
header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['email'])) {
    $email = trim($_POST['email']);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(["success" => false, "message" => "Invalid email address."]);
        exit;
    }

    // Connect to DB (for hostinger use- $conn = new mysqli("localhost", "root", "uxory_pratikesh_2025", "uxory_db"); )
    $conn = new mysqli("localhost", "root", "newpassword", "uxory_db");

    if ($conn->connect_error) {
        echo json_encode(["success" => false, "message" => "Database connection failed."]);
        exit;
    }

    // Check if the email exists
    $stmt = $conn->prepare("SELECT id FROM subscribers WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows === 0) {
        echo json_encode(["success" => false, "message" => "This email was never subscribed."]);
    } else {
        $stmt->close(); // Close the SELECT stmt before running UPDATE

        // Mark as unsubscribed and set is_subscribed to 0
        $stmt = $conn->prepare("UPDATE subscribers SET unsubscribe_at = NOW(), is_subscribed = 0 WHERE email = ?");
        $stmt->bind_param("s", $email);
        if ($stmt->execute()) {
            echo json_encode(["success" => true, "message" => "You’ve been unsubscribed successfully."]);
        } else {
            echo json_encode(["success" => false, "message" => "Failed to update subscription status: " . $stmt->error]);
        }
    }

    $stmt->close(); // Ensure all statements are closed
    $conn->close();
} else {
    echo json_encode(["success" => false, "message" => "Invalid request."]);
}
?>