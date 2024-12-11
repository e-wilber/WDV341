<?php
session_start();    // Access the current session or start a new one if needed

$errorMsg = "";
$validUser = false; // Default state for the user

// Check if the user is already signed in with a valid session
if (isset($_SESSION['validSession']) && $_SESSION['validSession'] === "yes") {
    $validUser = true;  // User is already authenticated
} else {
    // User is not signed in or session is invalid
    if (isset($_POST["submit"])) {
        // Form was submitted, process the login attempt

        $inUsername = $_POST['inUsername'];   // Pull username from the form
        $inPassword = $_POST['inPassword'];   // Pull password from the form
        $honeypot = $_POST['honeypot'];      // Check honeypot field

        // Honeypot validation: if the hidden field is filled, assume bot and deny access
        if (!empty($honeypot)) {
            $errorMsg = "Invalid submission. Please try again.";
        } else {
            // Connect to the database and verify credentials
            try {
                require 'dbConnect.php';    // Connect to the database

                $sql = "SELECT COUNT(*) FROM wdv341_users WHERE user_username = :username AND user_password = :password";

                // Prepared statement with PDO
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(":username", $inUsername);
                $stmt->bindParam(":password", $inPassword);
                $stmt->execute();

                $rowCount = $stmt->fetchColumn();

                if ($rowCount > 0) {
                    // Valid user credentials
                    $validUser = true;
                    $_SESSION['validSession'] = "yes";  // Set session variable for valid user
                } else {
                    // Invalid credentials
                    $errorMsg = "Invalid username or password. Please try again.";
                    $_SESSION['validSession'] = "no";  // Mark session as invalid
                }
            } catch (PDOException $e) {
                echo "Database Failed: " . $e->getMessage();
            }
        }
    }
}

                    echo '<pre>';
                    print_r($_SESSION);
                    echo '</pre>';                
                
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="style.css" rel="stylesheet">
    <style>
        .errorMsg {
            color: red;
            font-style: italic;
        }
    </style>
</head>
<body>
    <header>
        <h1>ADMIN LOGIN</h1>
    </header>

    <?php
    if ($validUser) {
        // Display admin page to authenticated users
        ?>
        <section class="adminPage">
            <?php
                echo '<pre>';
                print_r($_SESSION);
                echo '</pre>';            
            ?>
            <h2>Welcome to the Admin Page!</h2>
            <h2>OPTIONS</h2>

            <ol>
                <nav><button><a href="eventInputForm.php">ADD NEW</a></button></nav>
                <nav><button><a href="selectEvents.php">DELETE</a></button></nav>
                <nav><button><a href="updateEvents.php">EDIT</a></button></nav>
                <nav><button><a href="logout.php">LOGOUT</a></button></nav>
            </ol>
        </section>
        <?php
    } else {
        // Display login form
        ?>
        <section class="loginForm">
            <form method="post" action="login.php">
                <div class="errorMsg">
                    <?php echo $errorMsg; ?>
                </div>
                
                <p>
                    <label for="inUsername">Username: </label>
                    <input type="text" name="inUsername" id="inUsername">
                </p>
                <p>
                    <label for="inPassword">Password: </label>
                    <input type="password" name="inPassword" id="inPassword">
                </p>
                <!-- Honeypot field -->
                <input type="text" name="honeypot" style="display:none;" autocomplete="off">
                <p>
                    <input type="submit" name="submit" value="Submit">
                    <input type="reset">
                    <nav><a href="home_page.php">HOME PAGE</a></nav>
                </p>
            </form>
        </section>
        <?php
    }
    ?>
</body>
</html>
