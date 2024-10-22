<?php
// Include database connection file
include('dbConnect.php');

try {
    // Connect to the database using PDO
    $pdo = dbConnect();

    // Hardcode event number for testing purposes
    $eventNumber = 1; // Change this value for testing different events

    // SQL SELECT command using a WHERE clause to select one event
    $sql = "SELECT event_id, event_name, event_date, event_location FROM events WHERE event_id = :eventNumber";
    
    // Prepare the SQL statement
    $stmt = $pdo->prepare($sql);

    // Bind the hardcoded event number to the SQL statement
    $stmt->bindParam(':eventNumber', $eventNumber, PDO::PARAM_INT);

    // Execute the statement
    $stmt->execute();

    // Fetch the result
    $event = $stmt->fetch(PDO::FETCH_ASSOC);

    // Check if an event was found
    if ($event) {
        // Display the event in a table-like format
        echo "<h1>Event Details</h1>";
        echo "<table border='1' cellpadding='10'>";
        echo "<tr><th>Event ID</th><th>Event Name</th><th>Event Date</th><th>Event Location</th></tr>";
        echo "<tr>";
        echo "<td>" . htmlspecialchars($event['event_id']) . "</td>";
        echo "<td>" . htmlspecialchars($event['event_name']) . "</td>";
        echo "<td>" . htmlspecialchars($event['event_date']) . "</td>";
        echo "<td>" . htmlspecialchars($event['event_location']) . "</td>";
        echo "</tr>";
        echo "</table>";
    } else {
        // Display a message if no events were found
        echo "<p>No event found with the event number: " . htmlspecialchars($eventNumber) . ".</p>";
    }
} catch (PDOException $e) {
    // Handle any errors
    echo "<p>Failed to retrieve event: " . $e->getMessage() . "</p>";
}
?>
