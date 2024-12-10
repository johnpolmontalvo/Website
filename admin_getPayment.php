<?php
header('Content-Type: application/json');

// Check if the request method is GET
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    include 'connect_mongo.php';

    $collection = $client->toda_management->payments; // Replace with your database and collection names

    try {
        // Fetch all documents
        $result = $collection->find();

        // Prepare an array to hold the data
        $data = [];
        foreach ($result as $document) {
            $payDate = isset($document['payDate']) && $document['payDate'] instanceof MongoDB\BSON\UTCDateTime
                ? $document['payDate']->toDateTime()->format('Y-m-d') // Convert to string format
                : null; // Handle missing or invalid dates

            $data[] = [
                'fullname' => $document['fullname'],
                'amount' => $document['amount'],
                'payDate' => $payDate,
                'image' => $document['image'] ?? null, // Add image URL
            ];
        }

        // Return the data as JSON
        echo json_encode(['success' => true, 'data' => $data]);
    } catch (Exception $e) {
        echo json_encode(['success' => false, 'message' => $e->getMessage()]);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
}
?>
