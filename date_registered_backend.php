<?php
// backend.php
header('Content-Type: application/json');


// Get the input from the AJAX request
$input = json_decode(file_get_contents('php://input'), true);

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include 'connect_mongo.php';
    $collection = $client->toda_management->register_motor;
    // Validate if the date is present in the input
    if (isset($input['date'])) {
        $date = $input['date'];

        // Adjust the query to match a string date
        $totalRegistered = $collection->countDocuments([
            'registrationDate' => $date  // Match exact date as a string
        ]);

        // Return JSON response
        echo json_encode(['totalRegistered' => $totalRegistered]);
    } else {
        echo json_encode(['error' => 'Invalid input']);
    }
} else {
    echo json_encode(['error' => 'Invalid request method']);
}
?>
