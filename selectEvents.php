<?php
// Include database connection and prepare SELECT query
try {
    require 'dbConnect.php';

    $sql = "SELECT events_id, events_name, events_description FROM wdv341_events"; // Include events_id for deletion
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Database Failed: " . $e->getMessage();
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events</title>
    <link href="style.css" rel="stylesheet">
    <style>
        button {
            color: red;
            border-color: red;
        }
        table, td {
            border: solid black;
        }
    </style>
</head>
<body>
    <div>
        <header>
            <h1>EVENTS</h1>
        </header>
        <table>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
            <?php 
            // Loop through the query result and output as HTML table htmlspecialchars to protect against attackes
            while ($eventRow = $stmt->fetch()) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($eventRow["events_name"]) . "</td>";
                echo "<td>" . htmlspecialchars($eventRow["events_description"]) . "</td>";
                echo "<td>
                        <form action='deleteEvent.php' method='POST'>
                            <input type='hidden' name='eventsID' value='" . htmlspecialchars($eventRow["events_id"]) . "'>
                            <button type='submit'>DELETE</button>
                        </form>
                      </td>";
                echo "</tr>";
            }
            ?>
        </table>  
    </div>
</body>
</html>
