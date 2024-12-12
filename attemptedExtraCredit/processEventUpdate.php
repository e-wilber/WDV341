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
$eventsTime = $_POST['events_time'];     

//need the events_id from the form 
$eventsID = $_GET["eventsID"];     

$eventsIDPost = $_POST['events_id'];

$update_date = date_format(date_create(), "Y-m-d"); 

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
            WHERE events_id = :eventsID";  

    $stmt = $conn->prepare($sql);       

    $stmt->bindParam(":eventsName", $eventsName);
    $stmt->bindParam(":eventsDescription", $eventsDescription);
    $stmt->bindParam(":eventsPresenter", $eventsPresenter);
    $stmt->bindParam(":eventsDate", $eventsDate);
    $stmt->bindParam(":eventsTime", $eventsTime);
    $stmt->bindParam(":eventsDateUpdated", $update_date);
    $stmt->bindParam(":eventsID", $eventsID);

    //Execute PDO Statement and save results in $stmt object
    $stmt->execute();

    // Process the results from query
    $stmt->setFetchMode(PDO::FETCH_ASSOC);    

} catch (PDOException $e) {
    echo "Database Failed: " . $e->getMessage();
}