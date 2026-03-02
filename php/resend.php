<?php

/**
 * Send an email via the Resend API.
 *
 * @param string $apiKey       Resend API key
 * @param string $from         Sender (e.g. "Uxory Team <contact@uxory.com>")
 * @param string|array $to     Recipient email(s)
 * @param string $subject      Email subject
 * @param string $html         HTML body
 * @param array  $attachments  Optional [['filename'=>'...','content'=>'base64...']]
 *
 * @return array ['success' => bool, 'status' => int, 'body' => string]
 */
function sendResendEmail($apiKey, $from, $to, $subject, $html, $attachments = []) {
    $payload = [
        'from'    => $from,
        'to'      => is_array($to) ? $to : [$to],
        'subject' => $subject,
        'html'    => $html,
    ];

    if (!empty($attachments)) {
        $payload['attachments'] = $attachments;
    }

    $ch = curl_init('https://api.resend.com/emails');
    curl_setopt_array($ch, [
        CURLOPT_POST           => true,
        CURLOPT_POSTFIELDS     => json_encode($payload),
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER     => [
            'Authorization: Bearer ' . $apiKey,
            'Content-Type: application/json',
        ],
    ]);

    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    return [
        'success' => $httpCode === 200,
        'status'  => $httpCode,
        'body'    => $response,
    ];
}
