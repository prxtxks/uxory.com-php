<?php
// Get the user's IP address
$ip = $_SERVER['REMOTE_ADDR'];

// Use an IP geolocation service to get the country
$geoData = file_get_contents("http://ip-api.com/json/{$ip}");
$geoData = json_decode($geoData, true);
$country = $geoData['country'];

// Return the country as a JSON response
header('Content-Type: application/json');
echo json_encode(['country' => $country]);
?>