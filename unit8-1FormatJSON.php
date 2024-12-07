<?php
    //This application will access the wdv341 database to get the events data
    //it will create a PHP Event object using the Event class
    //it will load the events data into that object
    //Format the Event object into a JSON format
    //echo the object back to the client


//to connect to a database these are the steps: (algorithm)

    //1. include dbConnect.php
    //2. create you SQL query
    //3. prepare your pdo statement
    //4. bind variables to the pdo statement, if any
    //5. execute the pdo statement -run your SQL against the database
    //6. process the results from the query

//always the way to connect to database

//(mostly) same code from selectEvents.php assignment 
    try{
        require 'dbConnect.php';   //access to database
        //changed this part of it:
        $sql = "SELECT events_id, events_name, events_description, events_presenter FROM wdv341_events";

        $stmt = $conn->prepare($sql); //prepared statement PDO

        //bind parameters= n/a

        $stmt->execute(); //execute the PDO prepared statement, save results in $stmt object

        $stmt->setFetchMode(PDO::FETCH_ASSOC); // return values as an ASSOC array
    }
    catch(PDOException $e){
        echo "Database Failed: " . $e->getMessage(); //this will display if an error happens during connection
    }
    //(end of code from selectEvents.php assignment)

    require 'Events.php'; //gets access to Event class

    //$eventObject = new Event(); //create an event object
        //fetch an event from the result
        //get each column of data and set it into the eventObject
        //Do this for each event in the database

        //fetch one event from the 
    //$eventRow = $stmt->Fetch(); //this will pull one row from the result set

    $eventArray = [];   //array to store event objects

    //gets all of the rows from the database
    while( $eventRow = $stmt->fetch()){
        $eventObject = new Event(); //creates new event objects for each event

        $eventObject->setEventsID( $eventRow["events_id"]);
        $eventObject->setEventsName( $eventRow["events_name"]);
        $eventObject->setEventsDescription( $eventRow["events_description"]);
        $eventObject->setEventsPresenter( $eventRow["events_presenter"]);

        //add the object to an array
        array_push($eventArray,$eventObject);
    } 

    

        //testing output
    //echo "<p>Events ID: " . $eventObject->getEventsID();
    //echo "<p>Events Name: " . $eventObject->getEventsName();
    //echo "<p>Events Description: " . $eventObject->getEventsDescription();
    //echo "<p>Events Presenter: " . $eventObject->getEventsPresenter();
    echo "<br>";

    //convert the $eventObject into a JSON object $eventObjectJSON

    echo json_encode($eventArray); 

    //echo json_encode($eventObject); //sends JSON object to the response
    //echo "<br>";
    //echo $eventObject; //cannot read PHP object,fatal errors
?>
