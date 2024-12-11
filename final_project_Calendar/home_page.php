<?php
//to connect to a database these are the steps: (algorithm)

    //1. include dbConnect.php
    //2. create you SQL query
    //3. prepare your pdo statement
    //4. bind variables to the pdo statement, if any
    //5. execute the pdo statement -run your SQL against the database
    //6. process the results from the query

//always the way to do it

try {
    require 'dbConnect.php';

    // Query for events happening today
    $sqlEvents = "SELECT events_name, events_description, events_date 
                  FROM wdv341_events 
                  WHERE events_date = CURDATE() 
                  ORDER BY events_date ASC";

    $stmtEvents = $conn->prepare($sqlEvents);
    $stmtEvents->execute();
    $event = $stmtEvents->fetch(PDO::FETCH_ASSOC);

    // Query for reminders (you can customize this as needed)
    $sqlReminders = "SELECT note 
                     FROM reminders";

    $stmtReminders = $conn->prepare($sqlReminders);
    $stmtReminders->execute();
    $reminders = $stmtReminders->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "<h1>There has been an error. Please try again later.</h1>";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!--E Wilber 10 Dec. 2024-->
    <title>Home</title>
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
    <style>
        .productBlock {
            width: 100%; /* Ensure full responsiveness */
            display: flex;
            flex-direction: column; /* Stack child elements vertically */
            justify-content: space-between; /* Space between elements if needed */
            padding: 1rem;
            background: #efefef;
            border-radius: 10px;
            font-size: 0.875rem;
            line-height: 1.5;
            overflow: hidden; /* Prevent content overflow */
            word-wrap: break-word; /* Break long words to fit within the block */
            text-align: center; /* Align text within the block */
        }
        .eventsDesc {
            white-space: normal; /* Allow wrapping of long descriptions */
            text-overflow: ellipsis; /* Optional: Add ellipsis for overflowing text */
            overflow: hidden;
            color: #333;
            margin-bottom: 0.5rem;
        }
        .eventsName {
            color: #00f;
            font-size: large;
            margin-bottom: 0.5rem;
        }
        .eventsDate {
            font-size: larger;
            color: #555;
            margin-bottom: 1rem;
        }
    </style>
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
            <h1>CALENDAR</h1>
        </div>
    </header>

    <section>

    <h2 class="fs-1 bg-dark py-3 text-start text-center"><strong><i>Today</i></strong></h2>   

        <div class="container">

            <div class="container mt-5">
                <div class="row">
                    <div class="col-sm-4">

                        <div>
                            <section>
                            <h3 class="blue-txt"><i>Reminders</i></h3>
                                <?php if (!empty($reminders)): ?>
                                    <ul>
                                        <?php foreach ($reminders as $reminder): ?>
                                            <p class="productBlock">
                                                <?php echo htmlspecialchars($reminder['note']); ?>
                                            </p>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php else: ?>
                                    <p>No reminders.</p>
                                <?php endif; ?>
                            </section>
                        </div>

                        <hr>

                        <!-- Modal -->

    <div class="modal fade" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><strong><i class="blue-txt">Reminder</i></strong></h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <section>
                            <?php if (!empty($reminders)): ?>
                                <ul>
                                    <?php foreach ($reminders as $reminder): ?>
                                        <li>
                                            <?php echo htmlspecialchars($reminder['note']); ?>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                                <?php else: ?>
                            <p>No reminders.</p>
                        <?php endif; ?>
                    </section>                   
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

<script>
    // Wait for the page to load completely
    document.addEventListener('DOMContentLoaded', function () {
        var myModal = new bootstrap.Modal(document.getElementById('myModal'));
        myModal.show(); // Show the modal automatically
    });
</script>


                        
                        <hr>

                        <hr class="d-sm-none">
                    </div>
                    <div class="col-sm-8">
                        <main class="container my-5">
                            <?php if ($event) : ?>
                                <div class="row justify-content-center">
                                    <div class="col-sm-12 col-md-8 col-lg-6">
                                        <div class="productBlock">
                                            <p class="eventsDate"><?php echo htmlspecialchars($event['events_date']); ?></p>
                                            <p class="eventsName"><?php echo htmlspecialchars($event['events_name']); ?></p>
                                            <p class="eventsDesc"><?php echo htmlspecialchars($event['events_description']); ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php else : ?>
                                <p class="text-center">No events today.</p>
                            <?php endif; ?>
                        </main>

                    </div>
                </div>
            </div>

            <div class="nav-item"><i><a class="links" href="home_page.php">Return to top of page</a></i></div>

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