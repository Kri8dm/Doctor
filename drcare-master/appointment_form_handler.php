<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = htmlspecialchars($_POST["first_name"]);
    $last_name = htmlspecialchars($_POST["last_name"]);
    $service = htmlspecialchars($_POST["service"]);
    $phone = htmlspecialchars($_POST["phone"]);
    $date = htmlspecialchars($_POST["date"]);
    $time = htmlspecialchars($_POST["time"]);
    $message = htmlspecialchars($_POST["message"]);

    // Validate input
    if (empty($first_name) || empty($last_name) || empty($service) || empty($phone) || empty($date) || empty($time) || empty($message)) {
        echo "Please fill in all fields.";
        exit;
    }

    // Additional validation for phone number, date, and time can be added here

    // Send email
    $to = "kricodesoftwaressolution@gmail.com";
    $subject = "New Appointment Request: $service";
    $body = "First Name: $first_name\nLast Name: $last_name\nService: $service\nPhone: $phone\nDate: $date\nTime: $time\n\nMessage:\n$message";
    $headers = "From: $phone";

    if (mail($to, $subject, $body, $headers)) {
        echo "Appointment request sent successfully!";
    } else {
        echo "Failed to send appointment request. Please try again later.";
    }
} else {
    echo "Invalid request.";
}
?>
