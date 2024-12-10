<?php
// // Same error logging setup
// error_reporting(E_ALL);
// ini_set('display_errors', 1);

// include 'connect_mongo.php';

// if ($_SERVER['REQUEST_METHOD'] == 'GET') {
//     // Select database and collection
//     $collection = $client->toda_management->register_motor;

//     // Set default pagination parameters
//     $page = isset($_GET['page']) ? (int)$_GET['page'] : 1; 
//     $limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 6; 

//     // Calculate the offset
//     $offset = ($page - 1) * $limit;

//     // Fetch the total number of documents
//     $totalDocuments = $collection->countDocuments();

//     // Fetch documents for the current page
//     $result = $collection->find([], [
//         'skip' => $offset,
//         'limit' => $limit
//     ]);

//     // Create an array to store the motor data
//     $motorData = [];

//     foreach ($result as $document) {
//         error_log('Motor ID: ' . (string)$document['_id']);
//         $motorData[] = [
//             'id' => (string)$document['_id'], 
//             'username' => $document['username'] ?? 'Unknown', 
//             'price' => $document['price'] ?? 'N/A',
//             'image' => !empty($document['motorImage']) ? 'http://localhost/backendtoda/' . $document['motorImage'] : 'default-image-path.jpg',
//         ];
//     }

//     // Send the data as a JSON response
//     header('Content-Type: application/json');
//     echo json_encode([
//         'motorData' => $motorData,
//         'totalDocuments' => $totalDocuments,
//         'currentPage' => $page,
//         'totalPages' => ceil($totalDocuments / $limit),
//     ]);
// }
?>
