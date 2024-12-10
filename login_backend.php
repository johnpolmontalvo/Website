<?php
header('Content-Type: application/json');

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include 'connect_mongo.php';

    // Retrieve data from the frontend
    $data = json_decode(file_get_contents('php://input'), true);
    $username = $data['username'];
    $password = $data['password'];

    $collection = $client->toda_management->user_account; // Change 'mydatabase' and 'users' to your actual DB and collection names

    // Search for the user in the collection
    $user = $collection->findOne(['username' => $username]);

    if ($user) {
        // Verify the hashed password
        if (password_verify($password, $user['password'])) {
            // Password matches, successful login
            session_start();
            $_SESSION['username'] = $username; // Set session
            $_SESSION['user_id'] = (string)$user['_id']; // Store user ID in session
            
            // Return the user's ID in the response
            $userId = (string) $user['_id'];
            echo json_encode(['success' => true, 'message' => 'Login successful', 'userId' => $userId]);
        } else {
            // Password does not match
            echo json_encode(['success' => false, 'message' => 'Incorrect password']);
        }
    } else {
        // User not found
        echo json_encode(['success' => false, 'message' => 'User not found']);
    }
} else {
    // Respond with an error if the request method is not POST
    echo json_encode(['success' => false, 'message' => 'Only POST requests are allowed']);
}
?>
