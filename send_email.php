<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Validate and sanitize input (you should do more thorough validation)
    $name = filter_var($name, FILTER_SANITIZE_STRING);
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $subject = filter_var($subject, FILTER_SANITIZE_STRING);
    $message = filter_var($message, FILTER_SANITIZE_STRING);

    // Send email
    $to = "sdhital428@gmail.com"; 
    $headers = "From: $name <$email>";
    $mail_body = "Subject: $subject\n\n$message";
    if (mail($to, $subject, $mail_body, $headers)) {
        echo json_encode(array("success" => true));
    } else {
        echo json_encode(array("success" => false, "error" => "Failed to send email"));
    }
} else {
    echo json_encode(array("success" => false, "error" => "Method not allowed"));
}
?>
