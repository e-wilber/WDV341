<?php
session_start();
if ($_SESSION['validUser'] !== "valid") {
    header("Location: login.php");
}

try {
    //Connect to the database
    require '../dbConnect.php';

    //Create your SQL query
    $sql = "SELECT * FROM wdv341_events ORDER BY events_date";

    // Prepare your PDO statement
    $stmt = $conn->prepare($sql);

    //Bind Parameters

    //Execute the PDO Statement
    $stmt->execute();

    //Process the results from query
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Database Failed: " . $e->getMessage();
}
?>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="style.css" rel="stylesheet">
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
            
            let confirmCode = confirm("Are you sure?");

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
            <h1>Edit Calendar</h1>
        </header>
        <nav class="spaced">
            <li><a href="9-1_InputFormEvents_INSERT/eventInputForm.php">Add New Event</a></li>
            <li><a href="logout.php">Logout</a></li>
        </nav>
        <section class="frame">
            <h3></h3>
            <table>
                <tr class="tableheader">
                    <td>Event Name</td>
                    <td>Event Desription</td>
                    <td>Presenter</td>
                    <td>Date</td>
                    <td>Time</td>
                    <td>Update</td>
                    <td>Delete</td>
                </tr>
                <a href=""></a>
                <?php
                
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
    </div>
</body>

</html>