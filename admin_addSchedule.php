<?php
    require 'vendor/autoload.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        include 'connect_mongo.php'; // Ensure this file contains the MongoDB connection setup

        // Decode the JSON data from the request
        $data = json_decode(file_get_contents("php://input"), true);

        // Extract the values
        $id = $data['id'];
        $dateFrom = $data['dateFrom'];
        $dateTo = $data['dateTo'];
        $status = $data['status']; // Get the status from the request data

        // Access the MongoDB collection
        $collection = $database->register_motor;

        // Prepare the filter and update array
        $filter = ['_id' => new MongoDB\BSON\ObjectId($id)]; // Ensure the ID is an ObjectId
        $update = ['$set' => [
            'scheduleFrom' => $dateFrom,
            'scheduleTo' => $dateTo,
            'status' => $status, // Update the status to "available"
        ]];

        try {
            // Update the document
            $result = $collection->updateOne($filter, $update);

            // Check if the update was successful
            if ($result->getModifiedCount() > 0) {
                // Successfully updated
                $response = ['success' => true, 'message' => 'Data updated successfully.'];
            } else {
                // No documents matched the query, or the data was the same
                $response = ['success' => false, 'message' => 'No changes made or document not found.'];
            }
        } catch (Exception $e) {
            // Handle any errors during the update
            $response = ['success' => false, 'message' => 'Error updating data: ' . $e->getMessage()];
        }

        // Set the response header to application/json
        header('Content-Type: application/json');
        // Send the JSON response
        echo json_encode($response);
    }
?>
