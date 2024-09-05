<?php
header('Content-Type: application/json'); // Set header for JSON response

if (isset($_GET['city'])) {
    $city = htmlspecialchars($_GET['city']);
    $apiKey = "1b7bebf078dcfadb61240e1c4a3eb6d5"; // Your API key
    $apiUrl = "https://api.openweathermap.org/data/2.5/weather?q={$city}&appid={$apiKey}&units=metric";

    $weatherData = @file_get_contents($apiUrl);

    if ($weatherData === false) {
        echo json_encode(["cod" => 500, "message" => "Unable to fetch weather data."]);
    } else {
        echo $weatherData; // Output raw JSON data for debugging
    }
} else {
    echo json_encode(["cod" => 400, "message" => "City parameter is missing."]);
}
?>
