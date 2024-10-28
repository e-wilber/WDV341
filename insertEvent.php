<?php
// insertEvent.php
include '../db-connect.php';  // Go up one directory level to include db-connect.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Honeypot field validation
    if (!empty($_POST['address'])) {
        die("Form submission failed.");
    }

    // Prepare data
    $name = $_POST['name'];
    $description = $_POST['description'];
    $presenter = $_POST['presenter'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $dateInserted = date('Y-m-d H:i:s');  // Current date and time

    try {
        // SQL Insert statement with PDO prepared statement
        $sql = "INSERT INTO wdv341_events (name, description, presenter, date, time, date_inserted, date_updated)
                VALUES (:name, :description, :presenter, :date, :time, :dateInserted, :dateUpdated)";
        
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':presenter', $presenter);
        $stmt->bindParam(':date', $date);
        $stmt->bindParam(':time', $time);
        $stmt->bindParam(':dateInserted', $dateInserted);
        $stmt->bindParam(':dateUpdated', $dateInserted);  // date_updated is the same as date_inserted for a new record

        $stmt->execute();

        echo "Event has been successfully added.";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
