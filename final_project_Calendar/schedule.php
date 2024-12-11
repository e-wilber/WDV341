<?php
    try {
        require 'dbConnect.php';

        $sql = "SELECT events_name, events_description, events_date FROM wdv341_events ORDER BY events_date ASC";

        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $events = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        $message = "There has been an error. Please try again later.";
        echo "<h1>$message</h1>";
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Schedule</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="calendar">
    <meta name="description" content="calendar">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
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
    <!-- Navigation -->
    <nav class="navbar navbar-expand-md navbar-dark bg-dark sticky-top">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main-nav" aria-controls="main-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end align-center" id="main-nav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="home_page.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="schedule.php">Schedule</a></li>
                    <li class="nav-item"><a class="nav-link" href="contact_us.php">Contact</a></li>
                    <li class="nav-item"><a class="nav-link" href="login.php">LOGIN</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Header -->
    <header class="text-center py-5 bg-dark text-white">
        <h1>SCHEDULE</h1>
    </header>

    <!-- Main Section -->
    <section class="container my-5">

        <div class="col-lg-12">
            <h2 class="fs-1 bg-dark py-3 text-start text-center"><strong>Current Schedule</strong></h2>
        </div>
        <div class="row">
            <?php foreach ($events as $event) : ?>
                <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
                    <div class="productBlock">
                        <p class="eventsDate"><?php echo htmlspecialchars($event['events_date']); ?></p>
                        <p class="eventsName"><?php echo htmlspecialchars($event['events_name']); ?></p>
                        <p class="eventsDesc"><?php echo htmlspecialchars($event['events_description']); ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="nav-item"><i><a class="links" href="schedule.php">Return to top of page</a></i></div>

    </section>

    <!-- Modal -->
    <div class="container mt-3 text-center">
        <p><em class="text-decoration-underline">Know when my next project is released! Click
                <button type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#myModal">here</button>
                to subscribe to emails!</em></p>
    </div>

    <div class="modal fade" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><strong>Subscribe to see new released projects!</strong></h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="form2" name="form2" method="post" action="form_response_basic-1.php">
                        <div class="mb-3">
                            <label for="fname" class="form-label">First Name</label>
                            <input type="text" id="fname" name="name" class="form-control" placeholder="Enter first name">
                        </div>
                        <div class="mb-3">
                            <label for="lname" class="form-label">Last Name</label>
                            <input type="text" id="lname" name="name" class="form-control" placeholder="Enter last name">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="email" name="email" class="form-control" placeholder="example@email.com">
                        </div>
                        <button type="submit" class="btn btn-dark">Submit</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-3">
        <p>© Copyright <?php echo date("Y"); ?> All rights reserved. Wilber Calendar</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
