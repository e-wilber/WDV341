<?php
    //Testing Event.php class to make sure that all of the methods work as expected

    require "Events.php";       //get access to the Event class

    //instantiate a new object from the event class
     $eventObject = new Event();     //use the name of the class as the constructor method name

     //set values intothe new object
     $eventObject->setEventsID(5);
     $eventObject->setEventsName("Test E");
     $eventObject->setEventsDescription("Using PHP to test event class");
     $eventObject->setEventsPresenter("Jeff Gullion");

    //get values from the new Event object
    echo "<p>Events ID: " . $eventObject->getEventsID();
    echo "<p>Events Name: " . $eventObject->getEventsName();
    echo "<p>Events Description: " . $eventObject->getEventsDescription();
    echo "<p>Events Presenter: " . $eventObject->getEventsPresenter();

    //accessing the properties directly from the object
    //echo "<p>Events ID property " . $eventObject->eventsID; // this causes an ERROR bc it is a private property
    echo "<p>Events Name property " . $eventObject->eventsName;

    $eventObject->eventsName = "This no longer works!!!";   //changes name to this because it is public
    echo "<p>Events Name property: " . $eventObject->eventsName; 

?>