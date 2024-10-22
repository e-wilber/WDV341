<?php
// Include the database connection
require('dbConnect.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the form data
    $eventName = $_POST['event_name'];
    $eventDate = $_POST['event_date'];
    $description = $_POST['description'];

    try {
        // SQL INSERT query
        $query = 'INSERT INTO events (event_name, event_date, description) VALUES (:event_name, :event_date, :description)';
        
        // Prepare the query
        $statement = $conn->prepare($query);
        
        // Bind values to parameters
        $statement->bindValue(':event_name', $eventName);
        $statement->bindValue(':event_date', $eventDate);
        $statement->bindValue(':description', $description);
        
        // Execute the query
        $statement->execute();
        
        echo "<p>Event successfully added!</p>";
        
        // Close the statement
        $statement->closeCursor();
        
    } catch (PDOException $e) {
        // Display an error message if the query fails
        echo "<p>Error adding event: " . $e->getMessage() . "</p>";
    }
}
?>

<!-- HTML form to insert a new event -->
<form action="insertEvent.php" method="POST">
    <label for="event_name">Event Name:</label>
    <input type="text" name="event_name" required>
    <br>
    <label for="event_date">Event Date (YYYY-MM-DD):</label>
    <input type="date" name="event_date" required>
    <br>
    <label for="description">Description:</label>
    <textarea name="description" required></textarea>
    <br>
    <input type="submit" value="Add Event">
</form>
