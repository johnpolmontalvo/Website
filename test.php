<?php
require 'vendor/autoload.php'; // If using SDK
use PayMongo\PayMongo;

$apiKey = "sk_test_G7ToHcocfAmj86Zsh3fehYyd";
$url = "https://api.paymongo.com/v1/sources";

$payload = [
    "data" => [
        "attributes" => [
            "amount" => 10000, // Amount in centavos (PHP 100)
            "type" => "gcash",
            "currency" => "PHP",
            "redirect" => [
                "success" =>  "http://localhost/frontendtoda/user_dashboard.php",
                "failed" =>  "http://localhost/frontendtoda/user_dashboard.php"
            ]
        ]
    ]
];

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json',
    'Authorization: Basic ' . base64_encode($apiKey . ':')
]);

$response = curl_exec($ch);
curl_close($ch);

echo $response;
?>
