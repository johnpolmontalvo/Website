<?php

// Check if the request method is GET
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    include 'connect_mongo.php';

    // Select the database and collection
    $collection = $client->toda_management->appointments;

    // Count the total rented motorcycles
    $totalRented = $collection->countDocuments(['status' => 'rented']); // Adjust the query as needed

    // Return the count as JSON
    echo json_encode(['totalRented' => $totalRented]);
} else {
    // Return an error for other request methods
    http_response_code(405); // Method Not Allowed
    echo json_encode(['error' => 'Method not allowed']);
}
?>
