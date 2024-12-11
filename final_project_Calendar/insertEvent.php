<?php
session_start(); // Start session

// Session protection
if (!isset($_SESSION['validSession']) || $_SESSION['validSession'] !== "yes") {
    // Redirect unauthorized users to the login page
    header("Location: login.php");
    exit();
}

    //to connect to a database these are the steps: (algorithm)

    //a. get the form data from the $_POST into variables
        //1. include dbConnect.php
        //2. create you SQL query
        //3. prepare your pdo statement
        //4. bind variables to the pdo statement, if any
        //5. execute the pdo statement -run your SQL against the database
        //6. process the response back to the client

    $eventsName = $_POST['events_name'];                //get the data from the form into a php variable
    $eventsDescription = $_POST['events_description'];
    $eventsPresenter = $_POST['events_presenter'];
    $eventsDate = $_POST['events_date'];
    $eventsTime = $_POST['events_time'];         //default is 24 hours
             
    $today = date_format(date_create(), "Y-m-d");
        
    $eventsDateInserted = ""; //needs formatted YYYY-MM-DD
    try {
        require 'dbConnect.php';    //Connects to the database
        
        $eventsName = $_POST['events_name'];                //get the data from the form into a php variable
        $eventsDescription = $_POST['events_description'];
        $eventsPresenter = $_POST['events_presenter'];
        $eventsDate = $_POST['events_date'];
        $eventsTime = $_POST['events_time'];         //default is 24 hours
             
        $today = date_format(date_create(), "Y-m-d");
        
        $eventsDateInserted = ""; //needs formatted YYY-MM-DD
        
        //#2 Create your SQL query
        $sql = "INSERT INTO wdv341_events (
                events_name, 
                events_description, 
                events_presenter,
                events_date, 
                events_time,
                events_date_inserted,
                events_date_updated
                )";    

        $sql .= "VALUES (
                :eventsName, 
                :eventsDescription,
                :eventsPresenter,
                :eventsDate, 
                :eventsTime,
                :eventsDateInserted,
                :eventsDateUpdated
                )";                
        
            //Prepared statement PDO
            $stmt = $conn->prepare($sql);
        
            //Bind Parameters
            $stmt->bindParam(":eventsName", $eventsName);
            $stmt->bindParam(":eventsDescription", $eventsDescription);
            $stmt->bindParam(":eventsPresenter", $eventsPresenter);
            $stmt->bindParam(":eventsDate", $eventsDate);
            $stmt->bindParam(":eventsTime", $eventsTime);
            $stmt->bindParam(":eventsDateInserted", $today);
            $stmt->bindParam(":eventsDateUpdated", $today);
        
            //Executes the PDO Statement and saves results in $stmt object
            $stmt->execute();
        
            //Process the results from the query
            $stmt->setFetchMode(PDO::FETCH_ASSOC);  //return values as an ASSOC array

        } catch (PDOException $e) {
            echo "Database Failed: " . $e->getMessage();
        }
        ?>
               
        <!DOCTYPE html>
        <html lang="en">
        
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Add</title>
            <link href="style.css" rel="stylesheet">
        </head>


        <body>
        <div class="wrapper">
            
            <section class="frame">
                <?php
                    if(isset($err_message)){
                        echo "<p class = errorMsgFormat>". $err_message . "</p>";
                    }else{
                ?>
                <header>
                    <h1><i>Add to Calendar</i></h1>
                </header>
                <p class="blue-txt">the calendar has been updated</p>
                <section class="adminPage">
            <!--displays to a VALID user after logining in -->
            <h2>ADMIN OPTIONS</h2>

                <ol>
                    <nav><button><a href="eventInputForm.php">ADD NEW</button></nav>
                    <nav><button><a href="selectEvents.php">EDIT</button></nav>
                    <nav><button><a href="updateEvents.php">UPDATE</button></nav>
                    <nav><button><a href="logout.php">LOGOUT</button></nav>
                </ol>
                </section>
                <?php
                    }
                ?>
            </section>
        
            <p>&nbsp;</p>
        </div>
        </body>
        
        </html>