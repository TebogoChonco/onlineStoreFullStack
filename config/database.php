<?php

//Params to connect to a database
$dbHost = "localhost";
$dbUser = "Tebogo";
$dbPass = "Siya2023";
$dbName = "finalStore";

//Connection to database
$conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);

//Check db connection
if (!$conn) {
    die("Database connection failed!".mysqli_connect_error());
}

//else echo'Connected'

?>
 