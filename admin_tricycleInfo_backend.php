<?php
// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Include the MongoDB connection file inside the POST request block
    include 'connect_mongo.php';  // Ensure this path is correct

    // MongoDB connection is now established in connect_mongo.php
    // Now, you can use the $database object to interact with the database.

    // Select the collection
    $collection = $database->register_motor; // Update with your collection name

    // Decode the incoming JSON data
    $input = json_decode(file_get_contents('php://input'), true);

    // Fetching data from MongoDB and sorting by fullname in ascending order
    $cursor = $collection->find([], ['sort' => ['fullname' => 1]]);
    $data = [];

    foreach ($cursor as $document) {
        $data[] = [
            '_id' => (string)$document['_id'],
            'fullname' => $document['fullname'],
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
