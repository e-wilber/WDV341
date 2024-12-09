<!DOCTYPE html>
<html lang="en">

<head>
    <!--E Wilber 10 Dec. 2024-->
    <title>Schedule</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
        content="calendar">
    <meta name="description" content="calendar">
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
<!--changes header -->
<style>
    header {
        background-color: black;
    }

    p {
        align-items: center;
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
                        <a class="nav-link" href="contact_us.html">Contact</a>
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
            <h1>SCHEDULE</h1>
        </div>
    </header>

    <section>

        <div class="col-lg-12">
            <h2 class="fs-1 bg-dark py-3 text-start text-center"><strong>Upcoming Events</strong></h2>
        </div>

        <div class="container">

            <!-- div class of row, then a class of col to the divs. Bootstrap automatically stacks the columns when the viewport gets smaller.-->
            <div class="row">
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <h3 class="brown-txt"><strong>1</strong></h3>
                    <p> column 1</p>
                </div>

                <div class="col-sm-6 col-md-8 col-lg-4">
                    <h3 class="brown-txt"><strong>2</strong></h3>
                    <p>column 2</p>
                </div>

                <div class="col-sm-12 col-md-12 col-lg-4">
                    <h3 class="brown-txt"><strong>3</strong></h3>
                    <p>column 3</p>
                </div>
            </div>
        </div>

        <div class="container mt-3">
            <p style="color: black;"><em class="text-decoration-underline">Know when our next project is released!
                    Click
                    <button type="button" class="btn btn-dark-outline" data-bs-toggle="modal"
                        data-bs-target="#myModal"><em>
                            here</em>
                    </button>
                    to subscribe to our emails!</em></p>
        </div>

        <div class="modal fade" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title"><strong>Subscribe to see new released projects!</strong></h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <h6><em>Subscribe!</em></h6>
                        
                        <form id="form2" name="form2" method="post" action="form_response_basic-1.php">
                            <div class="form-group">
                                <label for="fname">First Name</label>
                                <input type="text" id="fname" name="name" placeholder="Enter first name">
                            </div>
                            <div class="form-group">
                                <label for="lname">Last Name</label>
                                <input type="text" id="lname" name="name" placeholder="Enter last name">
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" id="email" name="email" placeholder="example@email.com">
                            </div>
                            <button type="submit" class="btn btn-dark">Submit</button>
                        </form>
                        <p>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>
        </div>

        <div class="nav-item"><i><a class="links" href="schedule.php">Return to top of page</a></i></div>

    </section>



    <footer>
        <nav class="navbar navbar-expand-md navbar-dark bg-dark sticky-top">
            <div class="container">
                <p>© Copyright 2023 All rights reserved. Wilber Calendar</p>
                
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