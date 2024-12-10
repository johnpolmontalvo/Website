<?php
require 'vendor/autoload.php'; // Ensure you have Composer's autoloader

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Include your MongoDB connection script
    include 'connect_mongo.php';

    $collection = $database->register_motor;

    // Query for documents where scheduleFrom = 'NA' and scheduleTo = 'NA'
    $filter = [
        'scheduleFrom' => 'NA',
        'scheduleTo' => 'NA'
    ];

    // Fetch data from the collection
    $cursor = $collection->find($filter);

    // Convert cursor to an array and prepare for JSON output
    $result = [];
    foreach ($cursor as $document) {
        $result[] = [
            '_id' => (string)$document['_id'], // Ensure the MongoDB ObjectId is converted to string for JSON
            'fullName' => $document['fullname'],
            'model' => $document['model'],
            'licensePlate' => $document['licensePlate'],
            'registrationDate' => $document['registrationDate'],
            // Add any other fields you need here
        ];
    }

    // Set the content type to application/json
    header('Content-Type: application/json');
    // Return the result as JSON
    echo json_encode($result);
}
?>