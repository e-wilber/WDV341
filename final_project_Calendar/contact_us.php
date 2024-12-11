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

    <!--custom font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,800;1,400&display=swap"
        rel="stylesheet">
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

            <h2 class="brown-txt"><strong>Questions?</strong></h2>

            <h3 class="brown-txt"><i>Leave me a message below! </i></h3>

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
                    <h3><i>I'll get back to you as soon as possible!</i></h3>

                    <!-- Honeypot Field -->
                    <input type="text" id="honeypot" name="honeypot" style="display:none;" tabindex="-1" autocomplete="off">

                    <div class="form-group">
                        <label for="fname">First Name</label>
                        <input type="text" id="fname" name="fname" placeholder="Enter first name" required>
                    </div>
                    <div class="form-group">
                        <label for="lname">Last Name</label>
                        <input type="text" id="lname" name="lname" placeholder="Enter last name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" placeholder="example@email.com" required>
                    </div>
                    <div class="form-group">
                        <label for="topic">Topic</label>
                        <select id="topic" name="topic" required>
                            <option value="Questions">Questions</option>
                            <option value="Applying">Applying</option>
                            <option value="Sign up for event">Sign up for event</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="message">Message</label><br>
                        <textarea id="message" name="message" rows="10" cols="50" placeholder="Leave your message here..." required></textarea>
                    </div>
                    <div>
                        <input type="submit" value="Submit">
                        <input type="reset" value="Reset">
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