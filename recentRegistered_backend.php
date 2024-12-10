<?php
// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Include the MongoDB connection setup inside the POST request block
    include 'connect_mongo.php';  // Include your connection file

    // MongoDB collection setup after connecting
    $collection = $database->register_motor; // Use the $database variable from connect_mongo.php

    // Decode the incoming JSON data
    $input = json_decode(file_get_contents('php://input'), true);

    // You can access any parameters sent from the frontend
    // For example: $filter = isset($input['filter']) ? $input['filter'] : null;

    // Fetching data from MongoDB
    $cursor = $collection->find();
    $data = [];

    foreach ($cursor as $document) {
        $data[] = [
            'model' => $document['model'],
            'bodyNumber' => $document['bodyNumber'],
            'licensePlate' => $document['licensePlate'],
            'registrationDate' => $document['registrationDate'],
            'status' => $document['status']
        ];
    }

    // Return data as JSON
    header('Content-Type: application/json');
    echo json_encode($data);
} else {
    // Handle non-POST requests
    header('HTTP/1.1 405 Method Not Allowed');
    echo json_encode(['error' => 'Invalid request method']);
}
?>
