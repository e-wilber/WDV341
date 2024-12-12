<?php
session_start();
if ($_SESSION['validUser'] !== "valid") {
    header("Location:login.php");     
}
$eventsID = $_GET["eventsID"];      //get the value of the GET parameter into this page

try {
    
    require 'dbConnect.php';        

    $sql = "SELECT * FROM wdv341_events WHERE events_id = :eventsID";
    
    //Prepared statement PDO 
    $stmt = $conn->prepare($sql);

    $stmt ->bindParam(":eventsID", $eventsID);

    //Execute the PDO Statement
    $stmt->execute(); 

    //Process the results from the query
    $stmt->setFetchMode(PDO::FETCH_ASSOC);   

    //get record from the result set/$stmt object
    $eventRow = $stmt->fetch();
    
    $eventName = $eventRow['events_name'];
} 
catch (PDOException $e) {
    echo "Database Failed: " . $e->getMessage();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update</title>
    <link href="style.css" rel="stylesheet">
    <style>
        
    </style>
</head>

<body>
    <div class="wrapper">
        <header>
            <h1>Update Calendar</h1>
        </header>
        <section class="frame">
            
        <form method="post" action="processEventUpdate.php?eventsID=<?php echo $eventsID; ?>">
        
        <h3>Update Form for Event '<?php echo $eventName?>'</h3>
        <p>
            <label for="events_name">Name: </label> <!--have to have labels for ada compliance -->
            <input type="text" name="events_name" id="events_name" placeholder="Event Name" value=" <?php echo $eventName; ?>">
            <!-- same name as the database columns -->
        </p>

        <p>
            <label for="events_description">Description: </label>
            <input type="text" name="events_description" id="events_description" placeholder="Event Description" value=" <?php echo $eventRow['events_description']; ?>">
        </p>

        <p>
            <label for="events_presenter">Presenter: </label>
            <input type="text" name="events_presenter" id="events_presenter" placeholder="Event Presenter" value=" <?php echo $eventRow['events_presenter']; ?>">
        </p>

        <p>
            <label for="events_date">Date: </label>
            <input type="date" name="events_date" id="events_date" placeholder="MM/DD/YYY" onfocus="(this.type = 'date')" value="<?php echo $eventRow['events_date'];?>">
        </p>

        <p>
            <label for="events_time">Start Time: </label>
            <input type="time" name="events_time" id="events_time" value="<?php echo $eventRow['events_time'];?>">
        </p>
        <p>
            <input type="hidden" name="events_id" id="events_id" value="<?php echo $eventsID ?>">
        </p>

        <p>
            <input type="submit" name="submit" id="submit" value="Update Event">
            <a href="selectEvents.php"><button type=button>Cancel</button></a>
        </p>

    </form>

            <?php

            ?>
        </section>
        
    </div>
</body>

</html>