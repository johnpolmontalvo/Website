<?php
header('Content-Type: application/json');

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Include the MongoDB connection file inside the POST request method
    include 'connect_mongo.php'; // Make sure this path is correct relative to your current script

    // MongoDB connection parameters are now handled in the connect_mongo.php file
    // $client and $database are already initialized in connect_mongo.php

    $motorCollection = $database->register_motor; // Motor collection name
    $appointmentsCollection = $database->appointments; // Appointments collection name
    $usersCollection = $database->user_account; // Users collection name

    session_start();
    $userId = $_SESSION['user_id']; // Get user ID from session

    // Get the input data from the request body
    $data = json_decode(file_get_contents('php://input'), true);
    
    // Check if the required data is provided
    if (isset($data['motorId']) && isset($data['status'])) {
        $motorId = $data['motorId'];
        $status = $data['status'];

        try {
            // Update the motor status in the database
            $updateResult = $motorCollection->updateOne(
                ['_id' => new MongoDB\BSON\ObjectId($motorId)],  // Filter by motorId
                ['$set' => ['status' => $status]] // Set the new status
            );

            // Check if the motor status was updated successfully
            if ($updateResult->getModifiedCount() > 0) {
                // Fetch all motor details from the 'register_motor' collection
                $motor = $motorCollection->findOne(['_id' => new MongoDB\BSON\ObjectId($motorId)]);

                // If motor is found, prepare all data fields
                if ($motor) {
                    $motorModel = $motor['model'] ?? 'Unknown';
                    $fullname = $motor['fullname'] ?? 'Unknown';
                    $email = $motor['email'] ?? 'Unknown';
                    $contactNo = $motor['contactNo'] ?? 'Unknown';
                    $licensePlate = $motor['licensePlate'] ?? 'Unknown';
                    $bodyNumber = $motor['bodyNumber'] ?? 'Unknown';
                    $orcr = $motor['orcr'] ?? 'Unknown';
                    $price = $motor['price'] ?? 'Unknown';
                    $scheduleFrom = $motor['scheduleFrom'] ?? 'Unknown';
                    $scheduleTo = $motor['scheduleTo'] ?? 'Unknown';
                    $motorImagePath = $motor['motorImagePath'] ?? 'Unknown';

                    // Insert the appointment record into the 'appointments' collection
                    $appointmentData = [
                        'userId' => $userId,
                        'motorId' => $motorId,
                        'status' => 'pending', // Set the status to 'pending'
                        'timestamp' => new MongoDB\BSON\UTCDateTime(),
                        'motorModel' => $motorModel,
                        'fullname' => $fullname,
                        'email' => $email,
                        'contactNo' => $contactNo,
                        'licensePlate' => $licensePlate,
                        'bodyNumber' => $bodyNumber,
                        'orcr' => $orcr,
                        'price' => $price,
                        'scheduleFrom' => $scheduleFrom,
                        'scheduleTo' => $scheduleTo,
                        'motorImagePath' => $motorImagePath
                    ];

                    // Fetch the user's details from the users collection
                    $user = $usersCollection->findOne(['_id' => new MongoDB\BSON\ObjectId($userId)]);
                    $firstname = $user ? $user['firstname'] : 'Unknown';
                    $lastname = $user ? $user['lastname'] : 'Unknown';
                    $email = $user ? $user['email'] : 'Unknown';
                    $phonenumber = $user ? $user['phonenumber'] : 'Unknown';
                    $address = $user ? $user['address'] : 'Unknown';

                    // Add the user's details to the appointment data
                    $appointmentData['firstname'] = $firstname;
                    $appointmentData['lastname'] = $lastname;
                    $appointmentData['email'] = $email;
                    $appointmentData['phonenumber'] = $phonenumber;
                    $appointmentData['address'] = $address;

                    // Insert the appointment into the appointments collection
                    $appointmentsCollection->insertOne($appointmentData);

                    // Respond with a success message and all motor and user details
                    echo json_encode([
                        'success' => true,
                        'message' => 'Motor status updated and appointment stored successfully',
                        'motor' => [
                            'motorModel' => $motorModel,
                            'fullname' => $fullname,
                            'email' => $email,
                            'contactNo' => $contactNo,
                            'licensePlate' => $licensePlate,
                            'bodyNumber' => $bodyNumber,
                            'orcr' => $orcr,
                            'price' => $price,
                            'scheduleFrom' => $scheduleFrom,
                            'scheduleTo' => $scheduleTo,
                            'motorImagePath' => $motorImagePath
                        ],
                        'user' => [
                            'firstname' => $firstname,
                            'lastname' => $lastname,
                            'email' => $email,
                            'phonenumber' => $phonenumber,
                            'address' => $address
                        ]
                    ]);
                } else {
                    echo json_encode(['error' => 'Motor not found']);
                }
            } else {
                echo json_encode(['error' => 'Motor not found or status is already updated']);
            }
        } catch (Exception $e) {
            echo json_encode(['error' => 'Failed to update motor status: ' . $e->getMessage()]);
        }
    } else {
        echo json_encode(['error' => 'Missing required parameters']);
    }
} else {
    // If the method is not POST, return an error
    echo json_encode(['error' => 'Invalid request method']);
}
?>
