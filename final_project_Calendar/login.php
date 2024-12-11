<?php
session_start();    //access to current session or starts new one if needed

$errorMsg = "";

//check if form was submitted or needs displayed to the customer

if( isset( $_SESSION['validSession']) && $_SESSION['validSession'] === "yes"){
    //if you are a validSession then you should see admin page and stay signed on 
    $validUser = true;  //sets valid user to display the admin page
}
else{
    //you need to sign on

    if( isset($_POST["submit"])){
        //did the user submit the signon form? then
        //the form was submitted continue processing the form data

        //get data from form, connect to database, see if there's a matching record in the user table
        /*  
        if(match = true){
                valid user
                display admin page
            }  
        else{
            Invalid user
            display error msg
            display login form
        } 
        */
        $inUsername = $_POST['inUsername'];   //pull username from form (case sensitive)
        $inPassword = $_POST['inPassword'];   //pull password

        //connect to database
        try {
            require 'dbConnect.php';    //Connects to the database
            
            //does the username and password match the one in the database?
            //SELECT for a specific set of data using WHERE
            //$sql = "SELECT user_username, user_password FROM wdv341_users WHERE user_username = :username AND user_password = :password";    
            
            $sql = "SELECT COUNT(*) FROM wdv341_users WHERE user_username = :username AND user_password = :password";
            
            //Prepared statement PDO
            $stmt = $conn->prepare($sql);
            
            //Bind Parameters
            $stmt->bindParam(":username", $inUsername);
            $stmt->bindParam(":password", $inPassword);
            
            //Executes the PDO Statement and saves results in $stmt object
            $stmt->execute();

            $rowCount = $stmt->fetchColumn();

            if($rowCount > 0){
                //its a user listed in the database
                //echo "<h3>Login Successful</h3>";
                $validUser = true;  //switch aka flag
                $_SESSION['validSession'] = "yes";  //Valid user with access to Admin pages
            }
            else{
                //invalid
                //echo "<h3>NOT A VALID USER OR PASSWORD</h3>";
                $validUser = false;
                $errorMsg = "Invalid username or password. Enter again.";
                $_SESSION['validSession'] = "no";  //Invalid user
            }
            
            //Process the results from the query
            $stmt->setFetchMode(PDO::FETCH_ASSOC);  //return values as an ASSOC array

        } catch (PDOException $e) {
            echo "Database Failed: " . $e->getMessage();
        }
    }
    else{
        //the customer needs to see the form in order to fill it out and SUBMIT it for sign on
    }
}   //end of check for validSession
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="style.css" rel="stylesheet">
    <style>
        .errorMsg{
            color:red;
            font-style: italic;
        }
    </style>
</head>
<body>
    <header>
        <h1>ADMIN LOGIN</h1>
    </header>

    <?php
        if( isset($_POST['submit']) && $validUser===true){   //isset istead of "( $_POST["submit"] == "Submit")"
            //display ADMIN
    ?>
        <section class="adminPage">
            <!--displays to a VALID user after logining in -->
            <h2>Welcome to the Admin Page!</h2>
            <h2>OPTIONS</h2>

            <ol>
            <nav><button><a href="eventInputForm.php">ADD NEW</button></nav>
            <nav><button><a href="selectEvents.php">DELETE</button></nav>
            <nav><button><a href="updateEvents.php">EDIT</button></nav>
            <nav><button><a href="logout.php">LOGOUT</button></nav>
        </ol>
        </section>
    <?php
        }
        else{   //display form
    ?>
        <section class="loginForm">
            <!--this displays when user asks to login to application -->
            <form method="post" action="login.php">
                <div class="errorMsg">
                    <?php
                        echo $errorMsg;     //invalid user error message
                    ?>
                </div>
                <p>
                    <label for="inUsername">Username: </label>
                    <input type="text" name="inUsername" id="inUsername">
                </p>
                <p>
                    <label for="inPassword">Password: </label>
                    <input type="password" name="inPassword" id="inPassword">
                </p>
                <p>
                    <input type="submit" name="submit" value="submit">
                    <input type="reset">
                    <nav><a href="home_page.php">HOME PAGE</nav>
                </p>   
            </form>
        </section>
    <?php
        }   //end of else branch
    ?>
</body>
</html>