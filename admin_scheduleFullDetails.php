<?php
    require 'vendor/autoload.php';

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        include 'connect_mongo.php';
        $data = json_decode(file_get_contents("php://input"), true);
        $id = $data['id']; // Access the 'id' field

        $collection = $database->register_motor;


        header('Content-Type: application/json');

        // Specify the fields you want to retrieve in the projection
        $modalData = [
            // 'driverImagePath' => 1,
            'motorImagePath' => 1,
            'fullname' => 1,
            'age' => 1,
            'gender' => 1,
            'contactNo' => 1,
            'email' => 1,
            'address' => 1,
            'model' => 1,
            'licensePlate' => 1,
            'bodyNumber' => 1,
            'orcr' => 1,
            'registereddate' => 1,
            'price' => 1

        ];

        // Query the collection based on the provided ID
        $result = $collection->findOne(
            ['_id' => new MongoDB\BSON\ObjectId($id)],
            ['projection' => $modalData]
        );

        // Check if a result was found
        if ($result) {
            // Return the result as JSON
            echo json_encode([
                'success' => true,
                'data' => $result // Include the found document
            ]);
        } else {
            // If no result is found, return an error message
            echo json_encode([
                'success' => false,
                'message' => 'No record found for the provided ID.'
            ]);
        }
    }
?>