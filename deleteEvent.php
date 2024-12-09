<?php
session_start(); 

if ($_SESSION['validSession'] !== "yes") {
    header('Location: login.php');
    exit;
}

try {
    require 'dbConnect.php'; 

    if (isset($_POST['eventsID']) && is_numeric($_POST['eventsID'])) {
        $eventsID = (int)$_POST['eventsID'];

        $sql = "DELETE FROM wdv341_events WHERE events_id = :eventsID";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":eventsID", $eventsID);
        $stmt->execute();
    }
} catch (PDOException $e) {
    echo "Database Failed: " . $e->getMessage();
    exit;
}

header('Location: selectEvents.php'); // Redirect back to the event list
exit;
?>
