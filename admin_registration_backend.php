<?php

// Check request method
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // backend/createAccount.php
    include 'connect_mongo.php';
    $collection = $client->toda_management->admin_account; // Change to your database and collection name
    
    // Get the data from the request
    $data = json_decode(file_get_contents('php://input'), true);

    // Prepare and insert data
    $result = $collection->insertOne([
        'firstname' => $data['firstname'],
        'lastname' => $data['lastname'],
        'username' => $data['username'],
        'password' => ['password'],
        'email' => $data['email'],
        'phonenumber' => $data['phonenumber'],
        'address' => $data['address'],
        'gender' => $data['gender']
    ]);

    // Return response
    if ($result->getInsertedCount() == 1) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to create account']);
    }
} else {
    // Handle other request methods
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
}
?>
