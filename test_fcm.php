<?php
/**
 * Diagnostic script to test FCM Push Notifications (HTTP v1) and inspect responses.
 * Place this in the root of your CodeIgniter project and run it via command line or browser.
 * Usage:
 *   1. Download your Firebase service account credentials JSON.
 *   2. Save it as `service-account.json` in this directory.
 *   3. CLI: php test_fcm.php
 *   4. Browser: http://localhost/ggcc/test_fcm.php
 */

define('BASEPATH', true);

echo "FCM Notification Diagnostic Test (HTTP v1 API)\n";
echo "===============================================\n\n";

$serviceAccountFile = __DIR__ . '/service-account.json';

// Paste your actual mobile FCM Token here to test a single device
$testToken = 'YOUR_MOBILE_DEVICE_FCM_TOKEN_HERE';

if ($testToken === 'YOUR_MOBILE_DEVICE_FCM_TOKEN_HERE') {
    echo "Warning: Please replace \$testToken in this file with the actual FCM Token from your mobile device logs (check Flutter console output for: [FCM] Token: ...)\n\n";
}

if (!file_exists($serviceAccountFile)) {
    echo "ERROR: 'service-account.json' not found in this directory.\n";
    echo "Please follow these steps to obtain it:\n";
    echo "  1. Open Firebase Console.\n";
    echo "  2. Go to Project Settings (gear icon) > Service Accounts tab.\n";
    echo "  3. Click 'Generate new private key'.\n";
    echo "  4. Save the downloaded file as 'service-account.json' in this folder: " . __DIR__ . "\n\n";
    exit;
}

try {
    echo "1. Reading credentials from service-account.json...\n";
    $credentials = json_decode(file_get_contents($serviceAccountFile), true);
    if (!$credentials || !isset($credentials['private_key']) || !isset($credentials['client_email']) || !isset($credentials['project_id'])) {
        throw new Exception("Invalid service-account.json file format.");
    }
    $projectId = $credentials['project_id'];
    echo "   Project ID: " . $projectId . "\n";
    echo "   Client Email: " . $credentials['client_email'] . "\n\n";

    echo "2. Generating OAuth 2.0 Access Token (JWT & RS256 signing)...\n";
    $accessToken = getGoogleAccessToken($credentials);
    echo "   Access Token acquired successfully! (Length: " . strlen($accessToken) . ")\n\n";

    echo "3. Preparing FCM HTTP v1 Request...\n";
    $url = "https://fcm.googleapis.com/v1/projects/{$projectId}/messages:send";
    
    // HTTP v1 Payload structure
    $payload = [
        'message' => [
            'token' => $testToken,
            'notification' => [
                'title' => 'HTTP v1 Test',
                'body' => 'If you see this, HTTP v1 notifications are working!',
            ],
            'data' => [
                'title' => 'HTTP v1 Test',
                'body' => 'If you see this, HTTP v1 notifications are working!',
                'notification_type' => 'custom',
            ],
            'android' => [
                'priority' => 'HIGH',
                'notification' => [
                    'notification_channel_id' => 'ggcc_notifications',
                    'sound' => 'default',
                    'click_action' => 'FLUTTER_NOTIFICATION_CLICK',
                ]
            ],
            'apns' => [
                'headers' => [
                    'apns-priority' => '10',
                ],
                'payload' => [
                    'aps' => [
                        'sound' => 'default',
                    ]
                ]
            ]
        ]
    ];

    $headers = [
        'Authorization: Bearer ' . $accessToken,
        'Content-Type: application/json',
    ];

    echo "   Endpoint: " . $url . "\n";
    echo "   Sending request to Google FCM servers...\n";

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));

    $result = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $error = curl_error($ch);
    curl_close($ch);

    echo "\nFirebase Server Response:\n";
    echo "HTTP Status Code: " . $httpCode . "\n";

    if ($error) {
        echo "cURL Error: " . $error . "\n";
    } else {
        echo "Response Body:\n" . $result . "\n\n";
        if ($httpCode == 200) {
            echo "Success: Notification pushed successfully! Check your phone.\n";
        } else {
            echo "Error: Push failed. Check the error details above.\n";
        }
    }

} catch (Exception $e) {
    echo "\nEXCEPTION: " . $e->getMessage() . "\n";
}

/**
 * Generate Google OAuth 2.0 Access Token using Service Account credentials
 */
function getGoogleAccessToken($credentials) {
    $privateKey = $credentials['private_key'];
    $clientEmail = $credentials['client_email'];

    $header = json_encode(['alg' => 'RS256', 'typ' => 'JWT']);
    
    $now = time();
    $payload = json_encode([
        'iss' => $clientEmail,
        'scope' => 'https://www.googleapis.com/auth/firebase.messaging',
        'aud' => 'https://oauth2.googleapis.com/token',
        'iat' => $now,
        'exp' => $now + 3600
    ]);

    $base64UrlHeader = base64UrlEncode($header);
    $base64UrlPayload = base64UrlEncode($payload);

    $signatureInput = $base64UrlHeader . "." . $base64UrlPayload;
    $signature = '';
    
    if (!openssl_sign($signatureInput, $signature, $privateKey, 'SHA256')) {
        throw new Exception("Failed to sign JWT assertion token using openssl_sign.");
    }
    
    $base64UrlSignature = base64UrlEncode($signature);
    $jwt = $signatureInput . "." . $base64UrlSignature;

    // Exchange JWT for access token
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://oauth2.googleapis.com/token');
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query([
        'grant_type' => 'urn:ietf:params:oauth:grant-type:jwt-bearer',
        'assertion' => $jwt
    ]));

    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($httpCode !== 200) {
        throw new Exception("Google Token API returned HTTP status {$httpCode}: {$response}");
    }

    $json = json_decode($response, true);
    return $json['access_token'];
}

function base64UrlEncode($data) {
    return str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($data));
}
