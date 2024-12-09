<?php
/* PHP connection file

act as PDO connection between PHP code and the MySQL database

use require command
*/

$serverName = 'localhost';

$database = "wdv341"; //name of the database that you wish to access

$username = "root"; //username to sign into your MySQL database on your localhost

$password = ""; //default password to sign on to your MySQL database on you localhost


try{
    $conn = new PDO("mysql:host=$serverName;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
}
catch(PDOException $e){
    echo "Connection Failed: " . $e->getMessage(); //this will display if an error happens during connection
}
?>