<?php
require 'vendor/autoload.php'; // Include Composer autoload for dependencies
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

try {
    // Ensure we only handle POST requests for updating the status
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Include the MongoDB connection code inside the POST request
        include 'connect_mongo.php'; // Include the MongoDB connection code

        // Decode the JSON body of the request
        $data = json_decode(file_get_contents('php://input'), true);

        if (isset($data['motorId']) && isset($data['status'])) {
            $motorId = $data['motorId'];
            $status = $data['status'];

            // Use the already connected MongoDB client
            $appointmentsCollection = $database->appointments;

            $appointment = $appointmentsCollection->findOne(['motorId' => $motorId]);
            if ($appointment) {
                // If appointment exists, update the status
                $updateResult = $appointmentsCollection->updateOne(
                    ['motorId' => $motorId], 
                    ['$set' => ['status' => $status]]
                );

                if ($updateResult->getModifiedCount() > 0) {
                    // Send email notification after accepting the appointment
                    $mail = new PHPMailer(true);

                    // Server settings
                    $mail->isSMTP();
                    $mail->Host = 'smtp.gmail.com'; // Set the SMTP server to Gmail
                    $mail->SMTPAuth = true;
                    $mail->Username = 'your-email@gmail.com'; // Your Gmail email address
                    $mail->Password = 'your-app-password'; // Your Gmail password or app password if 2FA is enabled
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                    $mail->Port = 587;

                    // Recipients
                    $mail->setFrom('your-email@gmail.com', 'Your Name or Business');
                    $mail->addAddress($appointment['email'], $appointment['firstname'] . ' ' . $appointment['lastname']); // Recipient email

                    // Content
                    $mail->isHTML(true);
                    $mail->Subject = 'Appointment Status Update';
                    $mail->Body    = "Dear {$appointment['firstname']},<br><br>Your motor status is now 'rented'.<br><br>Thank you!";

                    // Send the email
                    if ($mail->send()) {
                        echo json_encode(['success' => true, 'message' => 'Appointment status updated and email sent successfully']);
                    } else {
                        echo json_encode(['error' => 'Failed to send email']);
                    }
                } else {
                    echo json_encode(['error' => 'Appointment not found or status is already updated']);
                }
            } else {
                echo json_encode(['error' => 'Appointment not found']);
            }
        } else {
            echo json_encode(['error' => 'Invalid parameters']);
        }
    } else {
        echo json_encode(['error' => 'Invalid request method']);
    }
} catch (Exception $e) {
    echo json_encode(['error' => 'Failed to update appointment status: ' . $e->getMessage()]);
}
?>
