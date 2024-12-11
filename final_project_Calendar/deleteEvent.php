<?php
session_start(); // get the session

// Check for a valid session
if (!isset($_SESSION['validSession']) || $_SESSION['validSession'] !== "yes") {
    // Redirect unauthorized users to the login page
    header("Location: login.php");
    exit();
}

// Protected content goes here
echo "Welcome to the protected page!";

require 'dbConnect.php';

// Validate HoneyPot
if (!empty($_GET['honeypot'])) {
    $_SESSION['message'] = "Delete failed due to invalid submission.";
    $_SESSION['message_type'] = "error";
    header("Location: selectEvents.php");
    exit;
}

// Ensure the event ID is valid
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $eventID = (int)$_GET['id'];

    try {
        $sql = "DELETE FROM wdv341_events WHERE events_id = :eventID";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":eventID", $eventID);

        if ($stmt->execute()) {
            $_SESSION['message'] = "Event deleted successfully.";
            $_SESSION['message_type'] = "success";
        } else {
            $_SESSION['message'] = "Failed to delete the event.";
            $_SESSION['message_type'] = "error";
        }
    } catch (PDOException $e) {
        $_SESSION['message'] = "Database error: " . $e->getMessage();
        $_SESSION['message_type'] = "error";
    }
} else {
    $_SESSION['message'] = "Invalid event ID.";
    $_SESSION['message_type'] = "error";
}

// Redirect back to the events page
header("Location: selectEvents.php");
exit;
?>
