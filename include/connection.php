<?php

$servername = "localhost";
$database = "babledb";
$username = "root";
$password = "";

$con = mysqli_connect($servername, $username, $password, $database);

if (!$con) {
      die("Connection failed: " . mysqli_connect_error());
}

?>