<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header('Access-Control-Allow-Headers: Content-Type');

// Check if the request method is GET
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    include 'connect_mongo.php';
    $collection = $client->toda_management->admin_account; // Change these to your database and collection names


    $data = $collection->find()->toArray();
    
    if (empty($data)) {
        echo json_encode(['message' => 'No data found']);
        exit();
    }
    header('Content-Type: application/json');
    echo json_encode($data);
} else {
    // Handle other request methods, if necessary
    header("HTTP/1.1 405 Method Not Allowed");
    echo json_encode(['message' => 'Method not allowed']);
}
?>
