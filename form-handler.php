<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $visitor_email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $subject = filter_input(INPUT_POST, 'subject', FILTER_SANITIZE_STRING);
    $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);

    if (!filter_var($visitor_email, FILTER_VALIDATE_EMAIL)) {
        // Handle invalid email
        echo "Invalid email format";
        exit;
    }

    $email_from = 'info@dariofficepark.com';
    $email_subject = 'New Submission';
    $email_body = "User Name: $name.\n" .
                  "User Email: $visitor_email.\n" .
                  "Subject: $subject.\n" .
                  "User Message: $message.\n";

    $to = 'bildadchero@gmail.com';
    $headers = "From: $email_from \r\n";
    $headers .= "Reply-To: $visitor_email \r\n";

    if (mail($to, $email_subject, $email_body, $headers)) {
        header("Location: contact.html");
    } else {
        // Handle error accordingly
        echo "Mail sending failed.";
    }
} else {
    // Not a POST request
    echo "Invalid request type.";
}

?>