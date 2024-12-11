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
    $fromEmail = "contact@erinwilber.org"; // Heartland Web Hosting email

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
    $headers .= "From: <$fromEmail>" . "\r\n"; // domain email
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
}
?>





<!DOCTYPE html>
<html lang="en">

<head>
    <!--E Wilber 10 Dec. 2024-->
    <title>Contact</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
        content="Contact">
    <meta name="description" content=" Contact us!.">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- bootstrap components in the head section: the link to the stylesheet, the viewport meta.The script code in the bottom just before the close of the body.-->

    <link href="style.css" rel="stylesheet">
</head>
<!--changes header-->
<style>
    header {
        background-color:black;
    }
</style>

<body>

    <!--bootstrap navbar-->

    <nav class="navbar navbar-expand-md navbar-dark bg-dark sticky-top">
        <div class="container">
            
            <!-- Toggle Button for Mobile Nav -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main-nav"
                aria-controls="main-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- navbar links -->
            <div class="collapse navbar-collapse justify-content-end align-center" id="main-nav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="home_page.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="schedule.php">Schedule</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact_us.php">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">LOGIN</a>
                    </li>
                </ul>
            </div>

        </div>
    </nav>

    <header>
        <div class="container">
            <h1>Questions?</h1>
        </div>
    </header>

    <section>

        <div class="col-lg-12">
            <h2 class="fs-1 bg-dark py-3 text-start text-center"><strong>Contact Me!</strong></h2>
        </div>

        <div class="container">

            <h2><strong>Questions?</strong></h2>

            <h3><i>Leave me a message below! </i></h3>

            <br>

            <!-- div class of row, then a class of col to the divs. Bootstrap automatically stacks the columns when the viewport gets smaller.-->
            <div class="row">
                <div class="col-sm-6 p-3">
                    <div class="hours">
                        <h1><strong>HOURS</strong></h1>
                        
                        <ul>
                            <li>Monday 9:00 am - 5:00 pm</li>
                            <li>Tuesday 9:00 am - 5:00 pm</li>
                            <li>Wednesday 9:00 am - 5:00 pm</li>
                            <li>Thursday 9:00 am - 5:00 pm</li>
                            <li>Friday 9:00 am - 5:00 pm</li>
                            <li>Saturday 9:00 am - 5:00 pm</li>
                            <li>Sunday 9:00 am - 5:00 pm</li>
                        </ul>
                    </div>
                </div>

                <div class="col-sm-6">

                <form id="form1" name="form1" method="post" action="form_response_basic-1.php">
                    <?php
                        // Display success message
                        echo "<h2>Thank You!</h2><p>Your message has been sent successfully, $firstName. We'll get back to you soon.</p>";
                    ?>
                    </div>
                </form>

                </div>

            </div>
        </div>

        <div class="nav-item"><i><a class="links" href="contact_us.php">Return to top of page</a></i></div>

    </section>

    <footer>
        <nav class="navbar navbar-expand-md navbar-dark bg-dark sticky-top">
            <div class="container">
                <p>© Copyright <?php echo date("Y"); ?> All rights reserved. Wilber Calendar</p>

    
                <!-- Toggle Button for Mobile Nav -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main-nav"
                    aria-controls="main-nav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

            </div>
        </nav>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

</body>

</html>