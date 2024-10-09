<?php
$to = "emariawilber2000@gmail.com";  // Replace with your email address
$subject = "Testing PHP Mail";
$message = "This is a test email to see if PHP mail is working.";
$headers = "From: emariawilber2000@gmail.com";  // Replace with a valid email address

if (mail($to, $subject, $message, $headers)) {
    echo "Test email sent successfully.";
} else {
    echo "Test email sending failed.";
}
?>
