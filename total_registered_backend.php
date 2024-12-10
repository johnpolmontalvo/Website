<?php
// Check if the request method is GET
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    include 'connect_mongo.php';

    // Select the database and collection
    $collection = $client->toda_management->register_motor;

    // Count the total registered users
    $totalRegistered = $collection->countDocuments();

    // Return the count as JSON
    echo json_encode(['totalRegistered' => $totalRegistered]);
} else {
    // Return an error for other request methods
    http_response_code(405); // Method Not Allowed
    echo json_encode(['error' => 'Method not allowed']);
}
?>
