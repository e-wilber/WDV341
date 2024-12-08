<?php
//destroy session
    session_unset();    //remove session variables
    session_destroy();  //remove the session

//disconnect from database
    $conn = null;
    $stmt = null;

    //then redirect to the login page
    header("Location:login.php");
?>
