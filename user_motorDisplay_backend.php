<?php
// Error logging setup
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    include 'connect_mongo.php';
    $collection = $client->toda_management->register_motor;

    // Pagination parameters
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 6; // Default limit is 5
    $skip = ($page - 1) * $limit;

    // Filter conditions
    $filter = [
        'status' => 'available',
        'scheduleFrom' => ['$exists' => true, '$ne' => 'NA'],
        'scheduleTo' => ['$exists' => true, '$ne' => 'NA']
    ];

    // Fetch data with pagination
    $total = $collection->countDocuments($filter); // Total count for pagination
    $result = $collection->find($filter, ['skip' => $skip, 'limit' => $limit]);

    $motorData = [];
    foreach ($result as $document) {
        $motorData[] = [
            'id' => (string)$document['_id'], 
            'model' => $document['model'],
            'price' => $document['price'] ?? 'N/A',
            'image' => $document['motorImagePath'],
            'scheduleFrom' => $document['scheduleFrom'],
            'scheduleTo' => $document['scheduleTo']
        ];
    }

    // Send the data as a JSON response
    header('Content-Type: application/json');
    echo json_encode([
        'motorData' => $motorData,
        'total' => $total,
        'page' => $page,
        'limit' => $limit
    ]);
}
