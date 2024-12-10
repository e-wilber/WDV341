<?php
// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Form input values
    $firstName = htmlspecialchars(trim($_POST['fname']));
    $lastName = htmlspecialchars(trim($_POST['lname']));
    $email = htmlspecialchars(trim($_POST['email']));
    $topic = htmlspecialchars(trim($_POST['topic']));
    $message = nl2br(htmlspecialchars(trim($_POST['message'])));
    $honeypot = $_POST['honeypot']; // Honeypot field

    // Honeypot validation (should be empty)
    if (!empty($honeypot)) {
        echo "<h2>Access Denied</h2><p>Please go back and try again.</p>";
        echo '<button onclick="location.href=\'contact_form.html\'">Go Back</button>';
        exit; // Stop further processing
    }

    // Your Heartland Web Hosting email
    $to = "contact@erinwilber.org"; // Admin email to receive form submissions
    $fromEmail = "contact@erinwilber.org"; // Must match your Heartland Web Hosting email

    // Email subject and body for admin notification
    $subject = "New Contact Form Submission: $topic";
    $emailBody = "
        <html>
        <head><title>Contact Form Submission</title></head>
        <body>
            <p><strong>Name:</strong> $firstName $lastName</p>
            <p><strong>Email:</strong> $email</p>
            <p><strong>Topic:</strong> $topic</p>
            <p><strong>Message:</strong><br>$message</p>
        </body>
        </html>
    ";

    // Headers for admin notification email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: <$fromEmail>" . "\r\n"; // Your domain email
    $headers .= "Reply-To: <$email>" . "\r\n"; // User's email for replies

    // Send email to admin
    mail($to, $subject, $emailBody, $headers);

    // Email subject and body for user confirmation
    $userSubject = "Thank you for contacting us!";
    $userMessage = "
        <html>
        <head><title>Thank You</title></head>
        <body>
            <p>Dear $firstName $lastName,</p>
            <p>Thank you for reaching out! We'll get back to you as soon as possible.</p>
            <p><strong>Topic:</strong> $topic</p>
            <p><strong>Message:</strong><br>$message</p>
            <p>Best regards,<br>Your Team</p>
        </body>
        </html>
    ";

    // Headers for user confirmation email
    $userHeaders = "MIME-Version: 1.0" . "\r\n";
    $userHeaders .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $userHeaders .= "From: <$fromEmail>" . "\r\n"; // Must use your Heartland Web Hosting email
    $userHeaders .= "Reply-To: <$to>" . "\r\n"; // Admin email for user replies

    // Send confirmation email to user
    mail($email, $userSubject, $userMessage, $userHeaders);

    // Display success message
    echo "<h2>Thank You!</h2><p>Your message has been sent successfully, $firstName. We'll get back to you soon.</p>";
    exit;
}
?>
