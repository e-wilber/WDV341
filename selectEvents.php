<?php
// Include the database connection
require('dbConnect.php'); // Ensures the database connection is established

try {
    // SQL SELECT query to pull all events
    $query = 'SELECT * FROM events';
    
    // Prepare the query using the PDO connection
    $statement = $conn->prepare($query);
    
    // Execute the query
    $statement->execute();
    
    // Fetch all rows
    $events = $statement->fetchAll(PDO::FETCH_ASSOC);
    
    // Check if events exist in the table
    if (empty($events)) {
        echo "<p>No events found in the database.</p>";
    } else {
        // Start creating the table structure
        echo '<table border="1" cellpadding="10" cellspacing="0">';
        echo '<thead>';
        echo '<tr>';
        echo '<th>Event ID</th>';
        echo '<th>Event Name</th>';
        echo '<th>Event Date</th>';
        echo '<th>Description</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
        
        // Loop through each event and format it into a table row
        foreach ($events as $event) {
            echo '<tr>';
            echo '<td>' . htmlspecialchars($event['event_id']) . '</td>';
            echo '<td>' . htmlspecialchars($event['event_name']) . '</td>';
            echo '<td>' . htmlspecialchars($event['event_date']) . '</td>';
            echo '<td>' . htmlspecialchars($event['description']) . '</td>';
            echo '</tr>';
        }
        
        echo '</tbody>';
        echo '</table>';
    }
    
    // Close the statement
    $statement->closeCursor();
    
} catch (PDOException $e) {
    // Display an error message if the query fails
    echo "<p>Error fetching events: " . $e->getMessage() . "</p>";
}
?>
