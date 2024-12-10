<?php
session_start(); // Start the session
include 'connect_mongo.php'; // Include MongoDB connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $collection = $database->admin_account; // Access the 'admin_account' collection

    $input = json_decode(file_get_contents('php://input'), true);

    if (isset($input['username']) && isset($input['password'])) {
        $username = $input['username'];
        $password = $input['password'];

        $user = $collection->findOne(['username' => $username]);

        if ($user) {
            // Check password (add actual password verification)
            // Assuming a successful login for demonstration purposes
            $_SESSION['admin_logged_in'] = true; // Set session variable
            $_SESSION['admin_username'] = $username; // Optional, store username
            $response = ['success' => true, 'message' => 'Login successful'];
        } else {
            $response = ['success' => false, 'message' => 'Invalid username or password'];
        }
    } else {
        $response = ['success' => false, 'message' => 'Invalid input'];
    }
} else {
    $response = ['success' => false, 'message' => 'Only POST requests are allowed'];
}

header('Content-Type: application/json');
echo json_encode($response);
?>
