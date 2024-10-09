<?php
// Get form data
$contactName = $_POST['contactName'];
$contactEmail = $_POST['contactEmail'];
$contactReason = $_POST['contactReason'];
$contactComments = $_POST['contactComments'];
$dateOfContact = date("m/d/Y");

// Prepare email to the site owner (you)
$to = "contact@about.erinwilber.org";  // Your Heartland-hosted email address
$subject = "New Contact Request - $contactReason";

// Prepare email headers
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/plain;charset=UTF-8" . "\r\n";  // Use text/plain for now, can switch to text/html later
$headers .= "From: contact@about.erinwilber.org";  // Use your domain email

// Email body message (plain text format)
$message = "
New contact request received: \n
Name: $contactName\n
Email: $contactEmail\n
Reason: $contactReason\n
Comments: $contactComments\n
Date of Contact: $dateOfContact
";

// Send email to the site owner (you)
if (mail($to, $subject, $message, $headers)) {
    echo "Email sent to you successfully.";
} else {
    echo "Email to you failed.";
}

// Prepare confirmation email to the customer
$confirmationSubject = "We have received your request!";
$confirmationMessage = "
<html>
<head>
  <title>Contact Confirmation</title>
  <style>
    body { font-family: Arial, sans-serif; }
    h2 { color: #4CAF50; }
  </style>
</head>
<body>
  <h2>Thank you, $contactName!</h2>
  <p>We have received your message and will get back to you shortly.</p>
  <p><strong>Contact Details:</strong></p>
  <p>Reason: $contactReason</p>
  <p>Comments: $contactComments</p>
  <p><em>Date of Contact: $dateOfContact</em></p>
  <p>Best regards,<br>Your Company</p>
</body>
</html>
";

// Prepare HTML email headers for confirmation email
$confirmationHeaders = "MIME-Version: 1.0" . "\r\n";
$confirmationHeaders .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$confirmationHeaders .= "From: contact@about.erinwilber.org";  // Use your domain email

// Send confirmation email to the customer
if (mail($contactEmail, $confirmationSubject, $confirmationMessage, $confirmationHeaders)) {
    echo "Confirmation email sent to the customer.";
} else {
    echo "Failed to send confirmation email.";
}
?>
