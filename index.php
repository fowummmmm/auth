<?php
$endpoint = 'https://account-public-service-prod.ol.epicgames.com/account/api/oauth/token';

// Replace these values with your actual account_id, device_id, and secret
$account_id = '713a8da996934f0e9165d6f5f86e12a5';
$device_id = 'bd9491099367453992ea0a96d8856e79';
$secret = 'SW43ZILTIGUEZARSELP646S63SPTZMZ5';

// Client ID and Secret for Basic Authentication
$client_id = '3446cd72694c4a4485d81b77adbb2141';
$client_secret = '9209d4a5e25a457fb9b07489d313b41a';

// Set the request body
$data = http_build_query(array(
    'grant_type' => 'device_auth',
    'account_id' => $account_id,
    'device_id' => $device_id,
    'secret' => $secret
));

// Initialize cURL session
$ch = curl_init($endpoint);

// Set cURL options for the POST request
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Set the required headers
$headers = array(
    'Content-Type: application/x-www-form-urlencoded',
    'Authorization: Basic ' . base64_encode($client_id . ':' . $client_secret)
);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

// Execute the cURL request
$response = curl_exec($ch);

// Check for cURL errors
if (curl_errno($ch)) {
    echo 'cURL Error: ' . curl_error($ch);
} else {
    // Close the cURL session
    curl_close($ch);

    // Output the response (you may need to parse the JSON response)
    echo $response;
}
?>
