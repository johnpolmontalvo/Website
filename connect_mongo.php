<?php
require 'vendor/autoload.php'; // Include Composer's autoloader

try {
    // Create a new MongoDB client
    $client = new MongoDB\Client("mongodb+srv://admin:adminpassword@cluster0.ldkls.mongodb.net");

    // $client = new MongoDB\Client("mongodb://localhost:27017");


    // Select the "toda_management" database
    $database = $client->toda_management;

    // Print a success message
    //echo "Successfully connected to MongoDB and selected the 'toda_management' database.\n";

} catch (Exception $e) {
    //echo "Failed to connect to MongoDB: ", $e->getMessage(), "\n";
}
