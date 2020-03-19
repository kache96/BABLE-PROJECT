<?php
include("include/connection.php"); 
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") {
    // user and pass sent from form 
    
    $username = mysqli_real_escape_string($con,$_POST['username']);
    $pass = mysqli_real_escape_string($con,$_POST['pass']); 
    
    $sql = "SELECT user_id FROM user WHERE username = '$username' and pass = '$pass'";
    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    
    $count = mysqli_num_rows($result);
    
    // If result matched $user and $pass, table row must be 1 row
      
    if($count == 1) {
      $_SESSION['username'] = $username;
      $_SESSION['id'] = $row['user_id'];
       
       header("location: home.php");
    }else {
       $error = "¡Ups! El nombre de usuario o contraseña es incorrecto. Intenta con un nombre de usuario o contraseña diferente.";
    }
 }
?>