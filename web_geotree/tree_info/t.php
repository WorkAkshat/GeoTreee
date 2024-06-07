<?php

// Fetch JSON data from the API URL
$url = 'https://reactnative.dev/movies.json';
$response = file_get_contents($url);

// Check if data is fetched successfully
if ($response !== false) {
    // Decode JSON data
    $data = json_decode($response, true);

    // Check if JSON decoding was successful
    if ($data !== null) {
        // Print the decoded JSON data
        echo '<pre>';
        print_r($data);
        echo '</pre>';
    } else {
        echo 'Failed to decode JSON data.';
    }
} else {
    echo 'Failed to fetch data from the API URL.';
}
?>
