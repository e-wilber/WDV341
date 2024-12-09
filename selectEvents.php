<?php
session_start();
require 'dbConnect.php';

try {
    $sql = "SELECT events_id, events_name, events_description FROM wdv341_events";
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
    <title>Events</title>
    <link href="style.css" rel="stylesheet">
    <style>
        .success { color: green; }
        .error { color: red; }
    </style>
</head>
<body>
    <h1>Events</h1>
    
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
            <th>Action</th>
        </tr>
        <?php while ($row = $stmt->fetch()): ?>
        <tr>
            <td><?= htmlspecialchars($row['events_name']); ?></td>
            <td><?= htmlspecialchars($row['events_description']); ?></td>
            <td>
                <!-- Wrap each button in a form with a hidden HoneyPot input -->
                <form onsubmit="return confirmDelete();" action="deleteEvent.php" method="GET">
                    <input type="hidden" name="id" value="<?= $row['events_id']; ?>">
                    <input type="text" name="honeypot" style="display:none;" autocomplete="off">
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>

    <script>
        // Confirmation prompt before deleting
        function confirmDelete() {
            return confirm("Are you sure you want to delete this event?");
        }
    </script>
</body>
</html>
