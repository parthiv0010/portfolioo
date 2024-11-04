<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form fields and remove whitespace
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $message = trim($_POST["message"]);

    // Validate the fields
    if (empty($name) || empty($email) || empty($message)) {
        echo "All fields are required.";
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format.";
        exit;
    }

    // Email content
    $to = "parthivjr0010@gmail.com"; // Replace with your email address
    $subject = "New Contact Form Message from $name";
    $email_content = "Name: $name\n";
    $email_content .= "Email: $email\n\n";
    $email_content .= "Message:\n$message\n";

    $headers = "From: $email";

    // Send the email
    if (mail($to, $subject, $email_content, $headers)) {
        echo "Thank you! Your message has been sent.";
    } else {
        echo "Oops! Something went wrong, and we couldn't send your message.";
    }
} else {
    echo "There was a problem with your submission, please try again.";
}
?>
