<?php

// Ensure the request is a POST request
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(["success" => false, "message" => "Invalid request method"]);
    exit;
}

// Include MongoDB connection
include 'connect_mongo.php';  // Include the MongoDB connection from connect_mongo.php

// Directory where the uploaded images will be stored
$uploadDir = 'payment/'; 

// Check if the upload directory exists, if not create it
if (!file_exists($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

// Check if an image was uploaded and if fullname and amount are provided
if (isset($_FILES['image']) && $_FILES['image']['error'] == 0 && isset($_POST['fullname']) && isset($_POST['amount'])) {
    $image = $_FILES['image'];
    $fullname = $_POST['fullname'];  // Get the fullname from the form
    $amount = $_POST['amount'];      // Get the amount from the form
    
    // Get file extension and generate a unique name for the file
    $imageExtension = pathinfo($image['name'], PATHINFO_EXTENSION);
    $imageName = uniqid('image_') . '.' . $imageExtension;

    // Move the uploaded file to the desired directory
    $targetPath = '../backendtoda/' . $uploadDir . $imageName;

    if (move_uploaded_file($image['tmp_name'], $targetPath)) {
        
        // Retrieve the user ID from the session
        session_start();
        $userId = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
        
        // Prepare data to insert into MongoDB
        $paymentData = [
            'user_id' => $userId,         // Save user ID
            'fullname' => $fullname,      // Save fullname
            'amount' => $amount,          // Save amount
            'image' => $targetPath,       // Path to the uploaded image
            'payDate' => new MongoDB\BSON\UTCDateTime(),  // Store the timestamp of the upload
        ];

        // Insert data into MongoDB
        $collection = $database->payments;  // MongoDB collection for payments (using the $database object from connect_mongo.php)
        $result = $collection->insertOne($paymentData);

        // Return success message with the MongoDB inserted ID
        echo json_encode([
            "success" => true, 
            "file" => $targetPath, 
            "mongoId" => $result->getInsertedId()
        ]);
    } else {
        echo json_encode(["success" => false, "message" => "Failed to upload image."]);
    }
} else {
    echo json_encode(["success" => false, "message" => "No file uploaded or missing data."]);
}
?>
