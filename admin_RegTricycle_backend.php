<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$response = ['success' => false, 'message' => ''];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Include MongoDB connection inside the POST request block
    include 'connect_mongo.php';  // Include the MongoDB connection setup

    // Access the MongoDB collection after connecting to the database
    $collection = $database->register_motor;  // Access the collection directly from $database object

    // Collect form data
    $fullname = $_POST['fullname'] ?? '';
    $age = $_POST['age'] ?? '';
    $gender = $_POST['gender'] ?? '';
    $address = $_POST['address'] ?? '';
    $email = $_POST['email'] ?? '';
    $contactNo = $_POST['contactNo'] ?? '';
    $model = $_POST['model'] ?? '';
    $registereddate = $_POST['registereddate'] ?? '';
    $licensePlate = $_POST['licensePlate'] ?? '';
    $bodyNumber = $_POST['bodyNumber'] ?? '';
    $orcr = $_POST['orcr'] ?? '';
    $price = $_POST['price'] ?? '';
    $registrationDate = date('Y-m-d');

    // Handle file uploads
    $uploadDirMotor = 'tricycles/';
    
    // Check for motor image upload
    if (isset($_FILES['motorImage']) && $_FILES['motorImage']['error'] === UPLOAD_ERR_OK) {
        $motorFileName = basename($_FILES['motorImage']['name']);
        $motorFilePath = '../backendtoda/' . $uploadDirMotor . $motorFileName;

        if (!is_dir($uploadDirMotor)) {
            mkdir($uploadDirMotor, 0777, true);
        }

        if (move_uploaded_file($_FILES['motorImage']['tmp_name'], $motorFilePath)) {
            // Prepare document for MongoDB
            $document = [
                'fullname' => $fullname,
                'age' => $age,
                'gender' => $gender,
                'address' => $address,
                'email' => $email,
                'model' => $model,
                'contactNo' => $contactNo,
                'registereddate' => $registereddate,
                'licensePlate' => $licensePlate,
                'bodyNumber' => $bodyNumber,
                'orcr' => $orcr,
                'price' => $price,
                'motorImagePath' => $motorFilePath, // Path for motor image
                'registrationDate' => $registrationDate,
                'status' => 'NA',
                'scheduleFrom' => 'NA',
                'scheduleTo' => 'NA'
            ];

            // Insert document into MongoDB
            $insertResult = $collection->insertOne($document);

            if ($insertResult->getInsertedCount() > 0) {
                $newDocument = $collection->findOne(['_id' => $insertResult->getInsertedId()]);
                $response = [
                    'success' => true,
                    'message' => 'Registration successful',
                    'data' => $newDocument
                ];
            } else {
                $response['message'] = 'Failed to save data to the database';
            }
        } else {
            $response['message'] = 'Motor image upload failed';
        }
    } else {
        $response['message'] = 'Motor image file is required';
    }
}

header('Content-Type: application/json');
echo json_encode($response);
exit;
