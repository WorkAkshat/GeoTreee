<?php
// API key
$apiKey = 'live_RNT4eywS8kV9Je0GShfJ55AdoGi1tIgbwjOWi9IPQAGl7SEG7F9QRHPisqlOJYX0';

// Initialize cURL session
$ch = curl_init();

// Set cURL options
curl_setopt($ch, CURLOPT_URL, 'https://dog.ceo/api/breeds/image/random?apiKey=' . $apiKey);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Execute cURL session
$response = curl_exec($ch);

// Close cURL session
curl_close($ch);

// Decode JSON response
$dogData = json_decode($response, true);

// Check if the response is successful and retrieve the image URL
if ($dogData && $dogData['status'] == 'success') {
    $dogImageUrl = $dogData['message'];
} else {
    // Default image URL in case of error
    $dogImageUrl = 'https://via.placeholder.com/300';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Random Dog Image</title>
</head>
<body>
    <h1>Random Dog Image</h1>
    <div>
        <img src="<?php echo $dogImageUrl; ?>" alt="Random Dog Image">
    </div>
</body>
</html>
