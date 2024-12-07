<?php
//check if form was submitted or needs displayed to the customer
if( isset($_POST["submit"])){
    //the form was submitted continue processing the form data
}
else{
    //the customer needs to see the form in order to fill it out and SUBMIT it for sign on
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Introduction to PHP</h1>
    <h2>Login Example Page</h2>

    <?php
        if( isset($_POST['submit'])){   //isset istead of "( $_POST["submit"] == "Submit")"
            //display ADMIN
    ?>
        <section class="adminPage">
            <!--displays to a VALID user after logining in -->
            <h2>Admin Page</h2>
        </section>
    <?php
        }
        else{   //display form
    ?>
        <section class="loginForm">
            <!--this displays when user asks to login to application -->
            <h2>Login Form</h2>
            <form method="post" action="login.php">

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
                </p>
                
            </form>
        </section>
    <?php
        }   //end of else branch
    ?>
</body>
</html>