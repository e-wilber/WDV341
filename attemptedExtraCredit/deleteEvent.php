<?php

//protect page from unwanted activity
session_start();
if ($_SESSION['validUser'] !== "valid") {
    header("Location: login.php");     
}

$eventsID = $_GET["eventsID"];

try {
    //Connect to the database
    require 'dbConnect.php';        

    // SQL query
    $sql = "DELETE FROM wdv341_events WHERE events_id = :eventsID";
    
    //Prepared statement PDO 
    $stmt = $conn->prepare($sql);      

    //Bind Variables to the PDO Statement
    $stmt ->bindParam(":eventsID", $eventsID);

    //Execute the PDO Statement
    $stmt->execute(); 

    //Process the results from the query
    $stmt->setFetchMode(PDO::FETCH_ASSOC);        

} catch (PDOException $e) {
    echo "Database Failed: " . $e->getMessage();
}

header("Location: selectEvents.php");

?>