<?php
// Database connection parameters
$host = 'localhost';
$dbname = 'wdv341';
$username = 'root';
$password = '';

try {
    // Set up PDO connection
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Prepare the SQL statement
    $sql = "SELECT event_name, event_description, event_presenter, event_date, event_time FROM wdv341_events WHERE event_id = :event_id LIMIT 1";
    $stmt = $pdo->prepare($sql);

    // Bind the event_id parameter to the value you want (assuming 1 for this example)
    $eventId = 1;
    $stmt->bindParam(':event_id', $eventId, PDO::PARAM_INT);

    // Execute the query
    $stmt->execute();

    // Fetch the result as an associative array
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $eventData = $stmt->fetch();

    // Check if an event was found
    if ($eventData) {
        // Define the Event class with properties matching table columns
        class Event {
            public $event_name;
            public $event_description;
            public $event_presenter;
            public $event_date;
            public $event_time;

            // Optional: Constructor to initialize properties
            public function __construct($data) {
                $this->event_name = $data['event_name'];
                $this->event_description = $data['event_description'];
                $this->event_presenter = $data['event_presenter'];
                $this->event_date = $data['event_date'];
                $this->event_time = $data['event_time'];
            }
        }

        // Create an instance of Event and set its properties
        $outputObj = new Event($eventData);

        // Encode the object as JSON and output it
        echo json_encode($outputObj);
    } else {
        // No event found for the specified ID
        echo json_encode(["error" => "Event not found"]);
    }

} catch (PDOException $e) {
    // Handle database connection error
    echo json_encode(["error" => "Database error: " . $e->getMessage()]);
}
?>
