<?php
// Include the database connection
require('dbConnect.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the event ID from the form
    $eventId = $_POST['event_id'];

    try {
        // SQL DELETE query
        $query = 'DELETE FROM events WHERE event_id = :event_id';
        
        // Prepare the query
        $statement = $conn->prepare($query);
        
        // Bind the event ID to the parameter
        $statement->bindValue(':event_id', $eventId);
        
        // Execute the query
        $statement->execute();
        
        echo "<p>Event successfully deleted!</p>";
        
        // Close the statement
        $statement->closeCursor();
        
    } catch (PDOException $e) {
        // Display an error message if the query fails
        echo "<p>Error deleting event: " . $e->getMessage() . "</p>";
    }
}
?>

<!-- HTML form to delete an event by ID -->
<form action="deleteEvent.php" method="POST">
    <label for="event_id">Event ID to delete:</label>
    <input type="number" name="event_id" required>
    <br>
    <input type="submit" value="Delete Event">
</form>
