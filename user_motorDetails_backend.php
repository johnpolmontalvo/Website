<?php
header('Content-Type: application/json');

// Check if the request method is GET
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Include MongoDB connection inside the GET method
    include 'connect_mongo.php'; // Make sure the path is correct

    // MongoDB connection and collection selection
    $collection = $database->register_motor; // Use the database object from connect_mongo.php

    try {
        // Check if 'id' is set in the query parameters
        if (isset($_GET['id'])) {
            $motorId = $_GET['id'];

            // Fetch the motor details from the MongoDB collection
            $motorDetails = $collection->findOne(['_id' => new MongoDB\BSON\ObjectId($motorId)]);

            if ($motorDetails) {
                // Remove MongoDB's internal fields before returning (optional)
                $motorDetails['_id'] = (string)$motorDetails['_id']; // Convert ObjectId to string

                // Add the image URL to the response
                $motorDetails['imageUrl'] = 'http://localhost/backendtoda/' . $motorDetails->motorImagePath;

                echo json_encode($motorDetails);
            } else {
                echo json_encode(['error' => 'Motor not found']);
            }
        } else {
            echo json_encode(['error' => 'No ID provided']);
        }
    } catch (Exception $e) {
        // Handle exceptions and return a JSON error response
        echo json_encode(['error' => $e->getMessage()]);
    }
} else {
    // Respond with a 405 Method Not Allowed if the request method is not GET
    http_response_code(405);
    echo json_encode(['error' => 'Method Not Allowed. Please use GET request.']);
}
?>
