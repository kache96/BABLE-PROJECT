<?php
include("include/connection.php");

if(isset($_POST['saveQ'])){

	$user = htmlentities(mysqli_real_escape_string($con,$_POST['user']));
    $questS1 = htmlentities(mysqli_real_escape_string($con,$_POST['questS1']));
    $answer1 = htmlentities(mysqli_real_escape_string($con,$_POST['answer1']));
    $questS2 = htmlentities(mysqli_real_escape_string($con,$_POST['questS2']));
    $answer2 = htmlentities(mysqli_real_escape_string($con,$_POST['answer2']));

    $check_user2 = "SELECT * FROM user WHERE user = '$user'";
	$run_checkUser2 = mysqli_query($con,$check_user2);
	$check1 = mysqli_num_rows($run_checkUser2);

	if($check1 == 1)
	{
		?>
			<br>
			<div class="alert alert-success" role="alert">Nombre de usuario correcto.</div>
		<?php
	}
	else{
		?>
			<br>
			<div class="alert alert-danger" role="alert">¡Ups! El nombre de usuario que haz ingresado no existe <a href="signedUp.php" class="alert-link">Intentalo de nuevo.</a></div>
		<?php
		exit();
	}
    
	$insert = "UPDATE user SET questS1='$questS1', answer1='$answer1', questS2='$questS2', answer2='$answer2' WHERE user='$user'";
	
	if (mysqli_query($con, $insert))
	{
		header('Location: index.html');
	} 
	else
	{

		?>
			<br>
			<div class="alert alert-danger" role="alert">¡Oh noo! Fue imposible crear tu cuenta. ¡Pero no te preocupes! Puedes <a href="" class="alert-link"> informarnos de lo sucedido </a>o <a href="signedUp.php" class="alert-link">intentarlo una vez mas.</a></div>
		<?php 
		exit();
	}
}
?>