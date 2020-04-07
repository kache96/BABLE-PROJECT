<?php
error_reporting(0);
@ini_set('display_errors', 0);
$servername = "localhost";
$database = "babledb";
$username = "root";
$password = "";

$con = mysqli_connect($servername, $username, $password, $database);

if (!$con) {
      die("Connection failed: " . mysqli_connect_error());
}

?>