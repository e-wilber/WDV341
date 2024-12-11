<?php
session_start(); // Start the session

// Check for a valid session
if (!isset($_SESSION['validSession']) || $_SESSION['validSession'] !== "yes") {
    // Redirect unauthorized users to the login page
    header("Location: login.php");
    exit();
}

// Protected content goes here
echo "Welcome to the protected page!";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add new</title>
    <link href="style.css" rel="stylesheet">
</head>

<body>
    <div class>
        <header>
            <h1><i>Add to calendar</i></h1>
        </header>
        <section>
            <form method="post" action="insertEvent.php">
                <p>
                    <label for="events_name">Name: </label> <!--labels for ada compliance -->
                    <input type="text" name="events_name" id="events_name" placeholder="Event Name" required>
                </p>

                <p>
                    <label for="events_description">Description: </label>
                    <input type="text" name="events_description" id="events_description" placeholder="Event Description" required>
                </p>

                <p>
                    <label for="events_presenter">Presenter: </label>
                    <input type="text" name="events_presenter" id="events_presenter" placeholder="Event Presenter">
                </p>

                <p>
                    <label for="events_date">Date: </label>
                    <input type="date" name="events_date" id="events_date" placeholder="MM/DD/YYY" onfocus="(this.type = 'date')" required>
                </p>

                <p>
                    <label for="events_time">Start Time: </label>
                    <input type="time" name="events_time" id="events_time" required>
                </p>

                <p>
                    <input type="submit" name="" id="" value="Submit">
                    <input type="reset" name="" id="" value="Reset">
                </p>
            </form>
            <h2>OPTIONS</h2>

            <ol>
                <nav><button><a href="eventInputForm.php">ADD NEW</button></nav>
                <nav><button><a href="selectEvents.php">DELETE</button></nav>
                <nav><button><a href="updateEvents.php">EDIT</button></nav>
                <nav><button><a href="logout.php">LOGOUT</button></nav>
            </ol>
        </section>
    </div>
</body>
</html>