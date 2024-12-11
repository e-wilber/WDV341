<?php
    session_start();
    
//destroy session
    session_unset();    //remove session variables
    session_destroy();  //remove the session

//disconnect from database
    $conn = null;
    $stmt = null;

    //then redirect to the login page
    header("Location:home_page.php");
?>