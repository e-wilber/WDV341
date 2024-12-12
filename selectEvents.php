<?php
session_start();
if ($_SESSION['validUser'] !== "valid") {
    header("Location: ../login.php");
}

try {
    //1. Connect to the database
    require '../dbConnect.php';

    //2. Create your SQL query
    $sql = "SELECT * FROM wdv341_events ORDER BY events_date";

    //3. Prepare your PDO statement - returns statement object/value, need to catch it in variable '$stmt'
    $stmt = $conn->prepare($sql);

    //#4 - Bind Parameters - N/A

    //#5 - Execute the PDO Statement/save results in $stmt object
    $stmt->execute();

    //#6 - Process the results from the query
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Database Failed: " . $e->getMessage();
}
?>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="../styles/stylesheet_flex_responsive.css">
    <style>
        table {
            table-layout: fixed;
            width: 100%;
        }

        table,
        td {
            border: thin solid black;
            border-collapse: collapse;
        }

        td {
            text-align: left;
            word-wrap: wordwrap;
            padding-bottom: 5px;
            padding-right: 20px;
        }

        .tableheader {
            font-weight: bold;
        }
    </style>
    <script>
        function confirmDelete(inEventsID) {
            //alert("inside confirmDelete() need to know the events_id: " + inEventsID);
            //display a model asking Delete this Record Y or N
            let confirmCode = confirm("To 'DELETE' this event, click 'OK'. If you delete this event you cannot recovder it.");

            //if the response is Y send the events_ID to the deleteEvent.php page to be deleted
            //if N nothing
            if (confirmCode) {
                
                window.location.href = "deleteEvent.php?eventsID=" + inEventsID;
            } else {
                header("Location: selectEvents.php");
            }
        }
    </script>

</head>

<body>

    <div class="wrapper">
        <header>
            <h1>WDV341 Intro PHP</h1>
            <h2>7-1: Create selectEvents.php</h2>
        </header>
        <nav class="spaced">
            <li><a href="9-1_InputFormEvents_INSERT/eventInputForm.php">Add New Event</a></li>
            <li><a href="../logout.php">Logout</a></li>
        </nav>
        <section class="frame">
            <h3></h3>
            <table>
                <tr class="tableheader">
                    <td width="17.5%">Event Name</td>
                    <td width="30%">Event Desription</td>
                    <td width="18%">Presenter</td>
                    <td width="12.5%">Date</td>
                    <td width="7.5%">Time</td>
                    <td width="7.5%">Update</td>
                    <td width="7%">Delete</td>
                </tr>
                <a href=""></a>
                <?php
                //put in a loop that processes the database results and outputs the content as HTML table
                while ($eventRow = $stmt->fetch()) {
                    echo "<tr>";
                    echo "<td>" . $eventRow["events_name"] . "</td>";
                    echo "<td>" . $eventRow["events_description"] . "</td>";
                    echo "<td>" . $eventRow["events_presenter"] . "</td>";
                    echo "<td>" . $eventRow["events_date"] . "</td>";
                    echo "<td>" . $eventRow["events_time"] . "</td>";
                    echo "<td><a href='13-1_Create_UPDATE_Event/updateEvent.php?eventsID=" . $eventRow["events_id"] . "'><button>Update</button></td>";
                     echo "<td><button onclick='confirmDelete(" . $eventRow['events_id'] . ")'>Delete</button></td>";
                    echo "</tr>";
                }
                   
                ?>
                
            </table>
        </section>
        <div class="footer">
            <a class="" href="../../wdv341Homework.php">WDV341 Homework Page</a>
            <a href="https://github.com/mistichris/wdv341.git">Git Hub Link</a>
            <a class="" href="../../../index.html">Christianson Home Page</a>
        </div>

        <p>&nbsp;</p>
    </div>
</body>

</html>