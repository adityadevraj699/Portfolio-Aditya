<?php

    // Sanitize user input
    $to = "adevraj934@gmail.com";
    $from = filter_var($_REQUEST['email'], FILTER_SANITIZE_EMAIL);
    $name = htmlspecialchars($_REQUEST['name'], ENT_QUOTES);
    $subject = htmlspecialchars($_REQUEST['subject'], ENT_QUOTES);
    $number = htmlspecialchars($_REQUEST['number'], ENT_QUOTES);
    $cmessage = htmlspecialchars($_REQUEST['message'], ENT_QUOTES);

    // Define headers
    $headers = "From: " . $from . "\r\n";
    $headers .= "Reply-To: ". $from . "\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

    // Define email subject
    $emailSubject = "You have a message from your Bitmap Photography.";

    // Logo and link (adjust the path to your logo if necessary)
    $logo = 'img/logo.png'; // make sure this path is correct
    $link = '#';

    // Email body
    $body = "<!DOCTYPE html><html lang='en'><head><meta charset='UTF-8'><title>Express Mail</title></head><body>";
    $body .= "<table style='width: 100%;'>";
    $body .= "<thead style='text-align: center;'><tr><td style='border:none;' colspan='2'>";
    $body .= "<a href='{$link}'><img src='{$logo}' alt=''></a><br><br>";
    $body .= "</td></tr></thead><tbody><tr>";
    $body .= "<td style='border:none;'><strong>Name:</strong> {$name}</td>";
    $body .= "<td style='border:none;'><strong>Email:</strong> {$from}</td>";
    $body .= "</tr>";
    $body .= "<tr><td style='border:none;'><strong>Subject:</strong> {$subject}</td></tr>";
    $body .= "<tr><td colspan='2' style='border:none;'>{$cmessage}</td></tr>";
    $body .= "</tbody></table>";
    $body .= "</body></html>";

    // Send the email
    $send = mail($to, $emailSubject, $body, $headers);

    // Optional: you can handle success or failure of mail sending like this
    if ($send) {
        echo "Message sent successfully.";
    } else {
        echo "Message could not be sent.";
    }

?>
