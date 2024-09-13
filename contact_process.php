<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Recipient email address
$to = "adevraj934@gmail.com";

// Get form data
$from = isset($_POST['email']) ? $_POST['email'] : 'no-reply@example.com'; // Fallback to prevent errors
$name = isset($_POST['name']) ? $_POST['name'] : 'No Name';
$subject = isset($_POST['subject']) ? $_POST['subject'] : 'No Subject';
$message = isset($_POST['message']) ? $_POST['message'] : 'No Message';

// Email headers
$headers = "From: $from\r\n";
$headers .= "Reply-To: $from\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

// Email subject
$subject = "You have a message from your Bitmap Photography";

// Email body content
$logo = 'img/logo.png'; // Ensure this path is correct relative to your PHP script
$link = '#'; // Replace with your actual URL if needed

// Construct the email body
$body = "<!DOCTYPE html><html lang='en'><head><meta charset='UTF-8'><title>Express Mail</title></head><body>";
$body .= "<table style='width: 100%;'>";
$body .= "<thead style='text-align: center;'><tr><td style='border:none;' colspan='2'>";
$body .= "<a href='{$link}'><img src='{$logo}' alt='Logo'></a><br><br>";
$body .= "</td></tr></thead><tbody><tr>";
$body .= "<td style='border:none;'><strong>Name:</strong> {$name}</td>";
$body .= "<td style='border:none;'><strong>Email:</strong> {$from}</td>";
$body .= "</tr>";
$body .= "<tr><td style='border:none;'><strong>Subject:</strong> {$subject}</td></tr>";
$body .= "<tr><td></td></tr>";
$body .= "<tr><td colspan='2' style='border:none;'>{$message}</td></tr>";
$body .= "</tbody></table>";
$body .= "</body></html>";

// Send email
$send = mail($to, $subject, $body, $headers);

// Check if the email was sent
if ($send) {
    echo "Email sent successfully!";
} else {
    echo "Failed to send email.";
}

?>
