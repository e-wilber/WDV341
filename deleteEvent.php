<?php
session_start();    //access to current session or starts new one if needed

if ($_SESSION['validSession'] !== "yes") {
    header('Location: login.php');
}
//this will delete a single event from the wdv341 events table using events id value
//confirmation message required
//it will return to select events to display updated events

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

    $sql = "DELETE FROM wdv341_events WHERE events_id = :eventsID";

    $stmt = $conn->prepare($sql); //prepared statement PDO

    //bind parameters
    $eventsID = 27;
    $stmt->bindParam(":eventsID",$eventsID);

    $stmt->execute(); //execute the PDO prepared statement, save results in $stmt object

    $stmt->setFetchMode(PDO::FETCH_ASSOC); // return values as an ASSOC array
}
catch(PDOException $e){
    echo "Database Failed: " . $e->getMessage(); //this will display if an error happens during connection
}
//return to select events page to show update
header('Location: selectEvents.php');
?>
