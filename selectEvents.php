<?php
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

    $sql = "SELECT events_name, events_description FROM wdv341_events";

    $stmt = $conn->prepare($sql); //prepared statement PDO

    //bind parameters= n/a

    $stmt->execute(); //execute the PDO prepared statement, save results in $stmt object

    $stmt->setFetchMode(PDO::FETCH_ASSOC); // return values as an ASSOC array
}
catch(PDOException $e){
    echo "Database Failed: " . $e->getMessage(); //this will display if an error happens during connection
}
//$eventRecord = $stmt->fetch(); //return first row of the result - ASSOC array

//echo "<p>" . $eventRecord["events_name"] . "</p>";
//echo "<p>" . $eventRecord["events_description"] . "</p>";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>WDV 341 Introduction to PHP</h1>
    <h2>Assignment 7-1 selectEvents.php</h2>

    <table>
        <tr>
            <th>Event Name</th>
            <th>Event Description</th>
        </tr>
        <?php 
            //loop the processes database result and outputs content as HTML table
            while($eventRow = $stmt->fetch()){
                echo "<tr>";
                echo "<td>" . $eventRow["events_name"] . "</td>";
                echo "<td>" . $eventRow["events_description"] . "</td>";
                echo "</tr>";
            }
        ?>  
    </table>  
</body>
</html>
