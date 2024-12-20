<?php
    session_start();    //access to current session or starts new one if needed
    if ($_SESSION['validSession'] !== "yes") {
        header('Location: login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event input form</title>
</head>

<body>
    <div class>
        <header>
            <h1>Introduction to PHP</h1>
            <h2>Input form sends data to the database</h2>
        </header>
        <section>
            <form method="post" action="insertEvent.php">
                <p>
                    <label for="events_name">Event Name: </label> <!--labels for ada compliance -->
                    <input type="text" name="events_name" id="events_name" placeholder="Event Name" required>
                </p>

                <p>
                    <label for="events_description">Event Description: </label>
                    <input type="text" name="events_description" id="events_description" placeholder="Event Description" required>
                </p>

                <p>
                    <label for="events_presenter">Event Presenter: </label>
                    <input type="text" name="events_presenter" id="events_presenter" placeholder="Event Presenter">
                </p>

                <p>
                    <label for="events_date">Event Date: </label>
                    <input type="date" name="events_date" id="events_date" placeholder="MM/DD/YYY" onfocus="(this.type = 'date')" required>
                </p>

                <p>
                    <label for="events_time">Event Start Time: </label>
                    <input type="time" name="events_time" id="events_time" required>
                </p>

                <p>
                    <input type="submit" name="" id="" value="Submit">
                    <input type="reset" name="" id="" value="Reset">
                </p>
            </form>
        </section>
    </div>
</body>
</html>
