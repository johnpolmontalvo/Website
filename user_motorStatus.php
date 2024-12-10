<?php
header('Content-Type: application/json');
session_start();

try {
    // Check if the request method is GET
    if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
        echo json_encode(['success' => false, 'message' => 'Invalid request method']);
        exit;
    }
    include 'connect_mongo.php';


    // Check if the user is logged in
    if (!isset($_SESSION['user_id'])) {
        echo json_encode(['success' => false, 'message' => 'User not logged in']);
        exit;
    }

    // Get the logged-in user's ID from the session
    $loggedInUserId = $_SESSION['user_id'];

    $collection = $client->toda_management->appointments;

    // Fetch documents that match the logged-in user's ID
    $tricycles = $collection->find(['userId' => $loggedInUserId])->toArray();

    // Prepare the response data
    $data = [];
    foreach ($tricycles as $tricycle) {
        $data[] = [
            '_id' => (string)$tricycle['_id'], // Convert ObjectId to string
            'userId' => $tricycle['userId'],
            'bodyNumber' => $tricycle['bodyNumber'],
            'licensePlate' => $tricycle['licensePlate'],
            'scheduleFrom' => $tricycle['scheduleFrom'],
            'scheduleTo' => $tricycle['scheduleTo'],
            'status' => $tricycle['status']
        ];
    }

    // Send JSON response
    echo json_encode(['success' => true, 'data' => $data]);
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
}
?>
