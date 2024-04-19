<?php
// Assuming this PHP script is named send_email.php

// Function to send email
function sendEmail($email, $subject, $message) {
    // Set headers
    $headers = "From: your_email@gmail.com" . "\r\n";
    $headers .= "Reply-To: your_email@gmail.com" . "\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Send email
    if (mail($email, $subject, $message, $headers)) {
        return true; // Email sent successfully
    } else {
        return false; // Failed to send email
    }
}

// Check if approve button is clicked and send email
if (isset($_POST['approve']) && isset($_POST['email'])) {
    $email = $_POST['email']; // Get the email address from the POST request
    $subject = "Your Appointment Approved";
    $message = "Your appointment has been approved. Thank you!"; // You can customize your message here

    // Send email
    if (sendEmail($email, $subject, $message)) {
        echo json_encode(array("status" => "success", "message" => "Email sent successfully."));
    } else {
        echo json_encode(array("status" => "error", "message" => "Failed to send email."));
    }
} else {
    echo json_encode(array("status" => "error", "message" => "Invalid request."));
}
?>
