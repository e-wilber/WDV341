<?php 
session_start(); // Start the session

// Check for a valid session
if (!isset($_SESSION['validSession']) || $_SESSION['validSession'] !== "yes") {
    // Redirect unauthorized users to the login page
    header("Location: login.php");
    exit();
}

// Protected content goes here
echo "Welcome to the protected page!";

require 'dbConnect.php';

try {
    $sql = "SELECT events_id, events_name, events_description, events_date FROM wdv341_events";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Database Failed: " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Event</title>
    <link href="style.css" rel="stylesheet">
    <style>
        .success { color: green; }
        .error { color: red; }
    </style>
</head>
<body>
    <header>
        <h1><i>Update Event</i></h1>
    </header>
    <h2>OPTIONS</h2>

    <ol>
        <nav><button><a href="eventInputForm.php">ADD NEW</a></button></nav>
        <nav><button><a href="selectEvents.php">DELETE</a></button></nav>
        <nav><button><a href="updateEvents.php">EDIT</a></button></nav>
        <nav><button><a href="logout.php">LOGOUT</a></button></nav>
    </ol>

    <?php
    // Display any success or error messages
    if (isset($_SESSION['message'])) {
        $message_type = $_SESSION['message_type']; // "success" or "error"
        echo "<p class='{$message_type}'>{$_SESSION['message']}</p>";
        unset($_SESSION['message']);
        unset($_SESSION['message_type']);
    }
    ?>

    <table>
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Date</th>
        </tr>
        <?php while ($row = $stmt->fetch()): ?>
        <tr>
            <td><?= htmlspecialchars($row['events_name']); ?></td>
            <td><?= htmlspecialchars($row['events_description']); ?></td>
            <td><?= htmlspecialchars($row['events_date']); ?></td>
            <td>
                <!-- Update form -->
                <form action="updateEvents.php" method="GET">
                    <input type="hidden" name="recid" value="<?= $row['events_id']; ?>">
                    <input type="text" name="honeypot" style="display:none;" autocomplete="off">
                    <button type="submit">EDIT</button>
                </form>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
