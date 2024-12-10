<?php
require 'vendor/autoload.php'; // Include MongoDB library (via Composer)

use MongoDB\Client;

header('Content-Type: application/json'); // Ensure JSON response
header('Access-Control-Allow-Origin: *'); // Allow cross-origin requests

session_start(); // Start the session to access the user_id

// Check if user_id exists in the session
if (!isset($_SESSION['user_id'])) {
    echo json_encode(['error' => 'User not logged in']);
    exit;
}

// Check if the request method is GET
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    try {
        include "connect_mongo.php";
        $collection = $database->payments; // Replace with your collection name
        $userId = $_SESSION['user_id']; // Get the logged-in user ID from the session

        // Find the payments for the specific user
        $data = $collection->find(['user_id' => $userId])->toArray();

        $response = [];
        foreach ($data as $doc) {
            $payDate = $doc['payDate'] instanceof MongoDB\BSON\UTCDateTime
                ? $doc['payDate']->toDateTime()->format('Y-m-d H:i:s') // Convert to string format
                : $doc['payDate']; // Use as-is if not a UTCDateTime object

            $response[] = [
                'amount' => $doc['amount'],
                'payDate' => $payDate,
            ];
        }

        echo json_encode($response);
    } catch (Exception $e) {
        echo json_encode(['error' => $e->getMessage()]);
    }
} else {
    // Respond with an error if the request method is not GET
    echo json_encode(['error' => 'Invalid request method. Only GET requests are allowed.']);
}
