<?php
session_start();
if ($_SESSION['validUser'] !== "valid") {
    header("Location:login.php");     
}

//once for every field in the form; put each variable into PHP variable
$eventsName = $_POST['events_name'];                //get the data from the form into a variable
$eventsDescription = $_POST['events_description'];
$eventsPresenter = $_POST['events_presenter'];
$eventsDate = $_POST['events_date'];
$eventsTime = $_POST['events_time'];         //default is 24 hours for time

//need the events_id from the form 
$eventsID = $_GET["eventsID"];     

$eventsIDPost = $_POST['events_id'];


//Don't need to update the Date Inserted date
//use variable as the updated date for the database
$update_date = date_format(date_create(), "Y-m-d"); //created a formatted date "YYYY-MM-DD"

try {
    //#1
    require 'dbConnect.php';      

    $sql = "UPDATE wdv341_events 
            SET 
            events_name = :eventsName, 
            events_description = :eventsDescription, 
            events_presenter = :eventsPresenter,
            events_date = :eventsDate, 
            events_time = :eventsTime,
            events_date_updated = :eventsDateUpdated
            WHERE events_id = :eventsID";   //named parameter

    $stmt = $conn->prepare($sql);       //$conn from dbConnect.php file

    $stmt->bindParam(":eventsName", $eventsName);
    $stmt->bindParam(":eventsDescription", $eventsDescription);
    $stmt->bindParam(":eventsPresenter", $eventsPresenter);
    $stmt->bindParam(":eventsDate", $eventsDate);
    $stmt->bindParam(":eventsTime", $eventsTime);
    $stmt->bindParam(":eventsDateUpdated", $update_date);
    $stmt->bindParam(":eventsID", $eventsID);

    //Execute the PDO Statement/save results in $stmt object
    $stmt->execute();

    // Process the results from the query
    $stmt->setFetchMode(PDO::FETCH_ASSOC);    

} catch (PDOException $e) {
    echo "Database Failed: " . $e->getMessage();
}