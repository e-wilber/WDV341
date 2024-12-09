<?php
//to connect to a database these are the steps: (algorithm)

    //1. include dbConnect.php
    //2. create you SQL query
    //3. prepare your pdo statement
    //4. bind variables to the pdo statement, if any
    //5. execute the pdo statement -run your SQL against the database
    //6. process the results from the query

//always the way to do it

try{
    require 'dbConnect.php';   //access to database

    $sql = "SELECT events_name, events_date, events_description FROM wdv341_events";

    //$sql = "SELECT note FROM reminders";

    $stmt = $conn->prepare($sql); //prepared statement PDO
    

    //bind parameters= n/a

    $stmt->execute(); //execute the PDO prepared statement, save results in $stmt object

    $stmt->setFetchMode(PDO::FETCH_ASSOC); // return values as an ASSOC array
}
catch(PDOException $e){
    echo "Database Failed: " . $e->getMessage(); //this will display if an error happens during connection
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!--E Wilber 10 Dec. 2024-->
    <title>Calendar</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
        content="Calendar">
    <meta name="description"
        content="Calendar">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- bootstrap components in the head section: the link to the stylesheet, the viewport meta.The script code in the bottom just before the close of the body.-->
    <link href="style.css" rel="stylesheet">
</head>

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
            <h1>CALENDAR</h1>
        </div>
    </header>

    <section>

        <div class="col-lg-12">
            <h2 class="fs-1 bg-dark py-3 text-start text-center"><strong>Current Schedule</strong></h2>
        </div>

        <div class="container">

            <div class="container mt-5">
                <div class="row">
                    <div class="col-sm-4">

                        <div class="hours">
                            <h1><strong>REMINDERS</strong></h1>
                            <h5><em>post reminders here</em></h5>
                            <table>
                                
                                <?php 
                                    //loop the processes database result and outputs content as HTML table
                                    //while($reminderRow = $stmt->fetch()){
                                    //    echo "<tr>";
                                    //    echo "<td>" . $reminderRow["note"] . "</td>";
                                    //    echo "</tr>";
                                    //}
                                ?>  
                            </table>

                        </div>

                        <hr>

                        <p class="brown-txt"><em>Please email with questions or concerns about this site.
                                <button type="button" class="btn btn-dark-outline" data-bs-toggle="modal"
                                    data-bs-target="#myModal"><em> CLICK HERE to send email</em></button></em>
                        </p>

                        <div class="modal fade" id="myModal">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title"><strong>Email me!</strong></h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        <h6><em>Send email for questions about this Calendar site!</em></h6>
                                        <p>
                                        <form id="form3" name="form3" method="post" action="form_response_basic-1.php">
                                            <div class="form-group">
                                                <label for="fname">First Name</label>
                                                <input type="text" id="fname" name="name"
                                                    placeholder="Enter first name">
                                            </div>
                                            <div class="form-group">
                                                <label for="lname">Last Name</label>
                                                <input type="text" id="lname" name="name" placeholder="Enter last name">
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Email:</label>
                                                <input type="email" id="email" name="email"
                                                    placeholder="example@email.com">
                                            </div>
                                            <button type="submit" class="btn btn-dark">Submit</button>
                                        </form>
                                        <p>
                                    </div>

                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-dark"
                                            data-bs-dismiss="modal">Close</button>
                                    </div>

                                </div>
                            </div>
                        </div>

                        
                        <hr>

                        <hr class="d-sm-none">
                    </div>
                    <div class="col-sm-8">
                        <table>
                            <tr>
                                <th>EVENT</th>
                                <th>DATE</th>
                            </tr>
                            <?php 
                                //loop the processes database result and outputs content as HTML table
                                while($eventRow = $stmt->fetch()){
                                    echo "<tr>";
                                    echo "<td>" . $eventRow["events_name"] . "</td>";
                                    echo "<td>" . $eventRow["events_date"] . "</td>";
                                    echo "</tr>";
                                }
                            ?>  
                        </table>

                        <ul class="nav nav-pills flex-column">
                            <li class="nav-item">
                                <a class="links" href="events.html">SCHEDULE</a>
                            </li>
                            <li class="nav-item">
                                <a class="links" href="about.html">ABOUT</a>
                            </li>
                            <li class="nav-item">
                                <a class="links" href="contact_us.html">CONTACT ME!</a>
                            </li>
                        </ul>

                    </div>
                </div>
            </div>

            <div class="nav-item"><i><a class="links" href="home_page.php">Return to top of page</a></i></div>

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