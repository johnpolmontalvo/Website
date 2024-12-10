<?php
header('Content-Type: application/json');

// Only process POST requests
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include 'connect_mongo.php'; // Ensure this file connects to your MongoDB

    // Decode the incoming JSON data
    $input = json_decode(file_get_contents('php://input'), true);
    
    // Optional: Retrieve parameters from the request if needed
    // $someParameter = isset($input['someParameter']) ? $input['someParameter'] : null;

    // Access the MongoDB collection
    $collection = $client->toda_management->register_motor;

    // Query to count documents with status "rented"
    $pendingCount = $collection->countDocuments(['status' => 'pending']);

    // Query to count documents with status "available"
    $availableCount = $collection->countDocuments(['status' => 'available']);

    // Calculate the total
    $total = $pendingCount + $availableCount;

    // Avoid division by zero and calculate percentages
    $pendingPercentage = $total > 0 ? ($pendingCount / $total) * 100 : 0;
    $availablePercentage = $total > 0 ? ($availableCount / $total) * 100 : 0;

    // Prepare the response
    $response = [
        'pendingPercentage' => $pendingPercentage,
        'availablePercentage' => $availablePercentage,
        'total' => $total,
        'pendingCount' => $pendingCount,
        'availableCount' => $availableCount
    ];

    // Send JSON response
    echo json_encode($response);
} else {
    // Handle non-POST requests
    echo json_encode(['error' => 'Invalid request method']);
}
?>
