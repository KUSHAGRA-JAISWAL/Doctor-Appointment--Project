<!--
* @file _dbConnect.php
* @author KUSHAGRA JAISWAL 
* @date 2022-06-30
* @copyright Copyright (c) 2022
-->

<!-- Program to connect the database to our code in php. -->

<?php
// connecting to the database
$servername = "localhost";
$username = "root";
$password = "";
$database = "appointment_app";

// Create a Connection Object
$conn = mysqli_connect($servername, $username, $password, $database);

//Die if connection was not successfull
if (!$conn) {
    die("Sorry we failed to connect : " . mysqli_connect_error());
}

?>