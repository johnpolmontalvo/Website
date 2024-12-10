<?php

try {
    // Ensure we only handle GET requests
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        // Include MongoDB connection setup inside the GET request block
        include 'connect_mongo.php';  // This includes the MongoDB connection code

        // Use the $client object from connect_mongo.php to select the database and collection
        $db = $client->toda_management; // The database selected in connect_mongo.php
        $collection = $db->appointments; // The collection you are working with

        // If 'id' is passed, fetch a specific appointment's details
        if (isset($_GET['id'])) {
            $userId = $_GET['id'];
            $appointment = $collection->findOne(['userId' => $userId]);

            if ($appointment) {
                // Return the details of the specific appointment
                echo json_encode([
                    'motorImagePath' => $appointment['motorImagePath'], // Assuming 'motorImagePath' stores the image path
                    'userId' => $appointment['userId'],
                    'motorId' => $appointment['motorId'],
                    'firstName' => $appointment['firstname'],
                    'lastName' => $appointment['lastname'],
                    'licensePlate' => $appointment['licensePlate'], // Assuming email exists in the data
                    'bodyNumber' => $appointment['bodyNumber'], 
                    'orcr' => $appointment['orcr'], 
                    'price' => $appointment['price'], 
                    'scheduleFrom' => $appointment['scheduleFrom'],
                    'scheduleTo' => $appointment['scheduleTo'], 
                ]);
            } else {
                echo json_encode(['error' => 'Appointment not found']);
            }
        } else {
            // Fetch all appointments if no id is passed
            $cursor = $collection->find(['status' => ['$ne' => 'rented']]);  // Exclude appointments that are marked as 'rented'

            $appointments = [];

            foreach ($cursor as $appointment) {
                $appointments[] = [
                    'userId' => $appointment['userId'],
                    'firstName' => $appointment['firstname'],
                    'email' => $appointment['email'],
                    'phoneNumber' => $appointment['phonenumber'],
                ];
            }

            echo json_encode($appointments);
        }
    } else {
        // If the request method is not GET, send a 405 Method Not Allowed error
        header('HTTP/1.1 405 Method Not Allowed');
        echo json_encode(['error' => 'Method not allowed']);
    }
} catch (Exception $e) {
    // Catch any exceptions and return an error
    http_response_code(500);
    echo json_encode(['error' => $e->getMessage()]);
}
?>
