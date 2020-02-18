<?php
include("include/connection.php");

if(isset($_POST['sign_up'])){

	$name = htmlentities(mysqli_real_escape_string($con,$_POST['name']));
	$lastname = htmlentities(mysqli_real_escape_string($con,$_POST['lastname']));
	$code = htmlentities(mysqli_real_escape_string($con,$_POST['code']));
	$email = htmlentities(mysqli_real_escape_string($con,$_POST['email']));
	$username = htmlentities(mysqli_real_escape_string($con,$_POST['username']));
	$pass = htmlentities(mysqli_real_escape_string($con,$_POST['pass']));
	$vpass = htmlentities(mysqli_real_escape_string($con,$_POST['vpass']));
	$squest1 = htmlentities(mysqli_real_escape_string($con,$_POST['squest1']));
	$sanswer1	 = htmlentities(mysqli_real_escape_string($con,$_POST['sanswer1	']));
	$squest2 = htmlentities(mysqli_real_escape_string($con,$_POST['squest2']));
	$sanswer2 = htmlentities(mysqli_real_escape_string($con,$_POST['sanswer2']));

	$check_user = "SELECT * FROM user WHERE username = '$username'";
	$run_checkUser = mysqli_query($con,$check_user);
	$check0 = mysqli_num_rows($run_checkUser);

	if($check0 == 1)
	{
		?>
			<br>
			<div class="alert alert-danger top" role="alert">¡Oh no! Es una pena que el usuario que haz ingresado ya esté en uso. <a href="signUp.php" class="alert-link">Intenta con un nombre de usuario diferente.</a></div>
		<?php
		exit();
	}

	$check_email = "SELECT * FROM client WHERE email='$email'";
	$run_checkEmail = mysqli_query($con,$check_email);
	$check1 = mysqli_num_rows($run_checkEmail);

	if($check1 == 1)
	{
		?>
			<br>
			<div class="alert alert-danger" role="alert">¡Vaya! Tenemos la sospecha de que ya tienes una cuenta con nosotros. La direccion de correo electronico que haz ingresado se encuentra en uso. <a href="signUp.php" class="alert-link">Intenta con uno diferente.</a></div>
		<?php
		exit();
	}

	if(($username == $name) || ($username == $lastname) || ($username == $email))
	{
		?>
			<br>
			<div class="alert alert-danger" role="alert">¡Ups! Tu usuario debe ser diferente a tu nombre y correo electronico. <a href="signUp.php" class="alert-link">Intentalo de nuevo.</a></div>
		<?php
		exit();
	}

	if(strlen($username) < 4)
	{
		?>
			<br>
			<div class="alert alert-danger" role="alert">¡Ups! El nombre de usuario debe de contener minimo 4 caracteres. <a href="signUp.php" class="alert-link">Intentalo de nuevo.</a></div>
		<?php 
		
	}
	else if(strlen($username) > 64)
	{
		?>
			<br>
			<div class="alert alert-danger" role="alert">¡UY! El nombre de usuario debe de contener maximo 64 caracteres. <a href="signUp.php" class="alert-link">Intentalo de nuevo.</a></div>
		<?php 
		exit();
	}

	if(strlen($pass) < 8)
	{
		?>
			<br>
			<div class="alert alert-danger" role="alert">¡Ups! La contraseña debe de contener minimo 8 caracteres. <a href="signUp.php" class="alert-link">Ingresa una contraseña mas compleja.</a></div>
		<?php
		exit();
	}

	if(strlen($pass) > 32)
	{
		?>
			<br>
			<div class="alert alert-danger" role="alert">¡Uy! La contraseña debe de contener maximo 32 caracteres. <a href="signUp.php" class="alert-link">Ingresa una contraseña mas compleja.</a></div>
		<?php 
		exit();
	}

	if(!preg_match("/\d/", $pass))
	{
		?>
			<br>
			<div class="alert alert-danger" role="alert">La contraseña debe tener al menos 1 caracter numerico <a href="signUp.php" class="alert-link">Ingresa una contraseña mas compleja.</a></div>
		<?php
		exit();
	}

	if(!preg_match("/[A-Z]/", $pass))
	{
		?>
			<br>
			<div class="alert alert-danger" role="alert">La contraseña debe tener al menos 1 letra en mayuscula <a href="signUp.php" class="alert-link">Ingresa una contraseña mas compleja.</a></div>
		<?php
		exit();
	}

	if(($pass == $name) || ($pass == $lastname) || ($pass == $username) || ($pass == $email))
	{
		?>
			<br>
			<div class="alert alert-danger" role="alert">¡Ups! Tu contraseña debe ser diferente a tu nombre, usuario y correo electronico. <a href="signUp.php" class="alert-link">Ingresa una contraseña mas compleja.</a></div>
		<?php
		exit();
	}

	if($pass != $vpass)
	{
		?>
			<br>
			<div class="alert alert-danger" role="alert">¡Ups! ¿Algun caracter omitido? Recuerda que las contraseñas deben ser iguales. <a href="signUp.php" class="alert-link">Intentalo de nuevo.</a></div>
		<?php 
		exit();
	}

	$insert1 = "INSERT INTO client (name, lastname, email, code) VALUES ('$name','$lastname','$email','$code')";
	$insert2 = "INSERT INTO user (username, md5('$pass'), avatar, signup_date) VALUES ('$username','$pass','',now())";
	$insert3 = "INSERT INTO userquest (squest1, sanswer1, squest2, sanswer2) VALUES ('$squest1','$sanswer1','$squest2','$sanswer2')";

	$query = mysqli_query($con,$insert);

	if($query){
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
