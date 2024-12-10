<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    include 'connect_mongo.php';
    $database = $client->toda_management; // Replace with your database name
    $collection = $database->user_account; // Replace with your collection name

    // Get the JSON input from the request
    $input = json_decode(file_get_contents('php://input'), true);

    // Hash the password before storing it
    $hashedPassword = password_hash($input['password'], PASSWORD_DEFAULT);

    // Prepare the user data
    $userData = [
        'firstname' => $input['firstname'],
        'lastname' => $input['lastname'],
        'username' => $input['username'],
        'password' => $hashedPassword,
        'email' => $input['email'],
        'phonenumber' => $input['phonenumber'],
        'emergencyname' => $input['emergencyname'],
        'emergencynumber' => $input['emergencynumber'],
        'address' => $input['address'],
        'civilstatus' => $input['civilstatus'],
        'nationality' => $input['nationality'],
        'birthday' => $input['birthday'],
        'gender' => $input['gender'],
        'created_at' => new MongoDB\BSON\UTCDateTime()
    ];

    // Insert the user data into the collection
    $result = $collection->insertOne($userData);

    // Check if the insert was successful
    if ($result->getInsertedCount() == 1) {
        echo json_encode(['message' => 'User registered successfully']);
    } else {
        http_response_code(500); // Internal Server Error
        echo json_encode(['error' => 'Failed to register user']);
    }
}