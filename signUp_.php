<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/signup.css">
    <title>Bable | Crear cuenta</title>
</head>
<body>
<?php
include("include/connection.php");

if(isset($_POST['btnSignUp'])){

	$name = htmlentities(mysqli_real_escape_string($con,$_POST['namec']));
	$lastname = htmlentities(mysqli_real_escape_string($con,$_POST['lastname']));
	$code = htmlentities(mysqli_real_escape_string($con,$_POST['code']));
	$email = htmlentities(mysqli_real_escape_string($con,$_POST['email']));
	$username = htmlentities(mysqli_real_escape_string($con,$_POST['username']));
	$pass = htmlentities(mysqli_real_escape_string($con,$_POST['pass']));
	$vpass = htmlentities(mysqli_real_escape_string($con,$_POST['vpass']));
	$squest1 = htmlentities(mysqli_real_escape_string($con,$_POST['squest1']));
	$sanswer1 = htmlentities(mysqli_real_escape_string($con,$_POST['sanswer1']));
	$squest2 = htmlentities(mysqli_real_escape_string($con,$_POST['squest2']));
	$sanswer2 = htmlentities(mysqli_real_escape_string($con,$_POST['sanswer2']));

	if (empty($name) || empty($lastname) || empty($code) || empty($email) || empty($username) || empty($pass) || empty($squest1) || empty($sanswer1) || empty($squest2) || empty($sanswer2)) 
	{
    	?>
			<div id="alert" class="sticky-top"><p>¡Ups! Te falto uno o varios campos por llenar. <a href="#"><b>Intentalo una vez mas.</b></a></p></div>
		<?php
		exit();

	}

	if(strlen($code) < 4)
	{
		?>
			<div id="alert" class="sticky-top"><p>¡Ups! El nombre de usuario debe contener minimo 4 caracteres. <a href="#"><b>Intentalo de nuevo.</b></a></p></div>
		<?php
		exit();

	}
	else if(strlen($code) > 15)
	{
		?>
			<div id="alert" class="sticky-top"><p>¡Ups! El codigo debe contener maximo 15 caracteres. <a href="#"><b>Intentalo de nuevo.</b></a></p></div>
		<?php 
		exit();
	}

	$check_user = "SELECT * FROM user WHERE username = '$username'";
	$run_checkUser = mysqli_query($con,$check_user);
	$check0 = mysqli_num_rows($run_checkUser);

	if($check0 == 1)
	{
		?>
			<div id="alert" class="sticky-top"><p>¡Oh no! Es una pena que el usuario que haz ingresado ya esté en uso. <a href="#"><b>Intenta con uno diferente.</b></a></p></div>
		<?php
		exit();
	}

	$check_email = "SELECT * FROM client WHERE email='$email'";
	$run_checkEmail = mysqli_query($con,$check_email);
	$check1 = mysqli_num_rows($run_checkEmail);

	if($check1 == 1)
	{
		?>
			<div id="alert" class="sticky-top"><p>¡Vaya! Tenemos la sospecha de que ya tienes una cuenta con nosotros. La direccion de correo electronico que haz ingresado se encuentra en uso. <a href="#"><b>Intenta con uno diferente.</b></a></p></div>
		<?php
		exit();
	}
	
	$check_code = "SELECT * FROM client WHERE code='$code'";
	$run_checkcode = mysqli_query($con,$check_code);
	$check2 = mysqli_num_rows($run_checkcode);

	if($check2 == 1)
	{
		?>
			<div id="alert" class="sticky-top"><p>¡Vaya! Tenemos la sospecha de que ya tienes una cuenta con nosotros. El codigo que haz ingresado se encuentra en uso. <a href="#"><b>Intenta con uno diferente.</b></a></p></div>
		<?php
		exit();
	}

	if(($username == $name) || ($username == $lastname) || ($username == $email))
	{
		?>
			<div id="alert" class="sticky-top"><p>¡Ups! El nombre de usuario debe ser diferente a tu nombre , apellido y correo electronico. <a href="#"><b>Intentalo de nuevo.</b></a></p></div>
		<?php
		exit();
	}

	if(strlen($username) < 4)
	{
		?>
			<div id="alert" class="sticky-top"><p>¡Ups! El nombre de usuario debe contener minimo 4 caracteres. <a href="#"><b>Intentalo de nuevo.</b></a></p></div>
		<?php
		exit();

	}
	else if(strlen($username) > 64)
	{
		?>
			<div id="alert" class="sticky-top"><p>¡Ups! El nombre de usuario debe contener maximo 64 caracteres. <a href="#"><b>Intentalo de nuevo.</b></a></p></div>
		<?php 
		exit();
	}

	if(strlen($pass) < 8)
	{
		?>
			<div id="alert" class="sticky-top"><p>¡Ups! La contraseña debe contener minimo 8 caracteres. <a href="#"><b>Ingresa una contraseña mas compleja.</b></a></p></div>
		<?php
		exit();
	}

	if(strlen($pass) > 32)
	{
		?>
			<div id="alert" class="sticky-top"><p>¡Ups! La contraseña debe contener maximo 32 caracteres. <a href="#"><b>Ingresa una contraseña mas compleja.</b></a></p></div>
		<?php 
		exit();
	}

	if(!preg_match("/\d/", $pass))
	{
		?>
			<div id="alert" class="sticky-top"><p>¡Ups! La contraseña debe tener al menos 1 caracter numerico. <a href="#"><b>Ingresa una contraseña mas compleja.</b></a></p></div>
		<?php
		exit();
	}

	if(!preg_match("/[A-Z]/", $pass))
	{
		?>
			<div id="alert" class="sticky-top"><p>¡Ups! La contraseña debe tener al menos 1 letra en mayuscula. <a href="#"><b>Ingresa una contraseña mas compleja.</b></a></p></div>
		<?php
		exit();
	}

	if(($pass == $name) || ($pass == $lastname) || ($pass == $username) || ($pass == $email))
	{
		?>
			<div id="alert" class="sticky-top"><p>¡Ups! Tu contraseña debe ser diferente a tu nombre, apellido, usuario y correo electronico. <a href="#"><b>Ingresa una contraseña mas compleja.</b></a></p></div>
		<?php
		exit();
	}

	if($pass != $vpass)
	{
		?>
			<div id="alert" class="sticky-top"><p>¡Ups! ¿Algun caracter omitido? Recuerda que las contraseñas deben ser iguales.  <a href="#"><b>Intentalo de nuevo.</b></p></div>
		<?php 
		exit();
	}

	if($squest1 == $squest2)
	{
		?>
			<div id="alert" class="sticky-top"><p>¡Ups! Las preguntas de seguridad deben ser diferentes.<a href="#"><b>Intentalo una vez mas.</b></a></p></div>
		<?php 
		exit();
	}

	$insert1 = $con->query("INSERT INTO `client`(`namec`, `lastname`, `code`, `email`) VALUES ('$name','$lastname','$code','$email')");

	$insert2 = $con->query("INSERT INTO `user`(`username`, `pass`, `signup_date`) VALUES ('$username',md5('$pass'),now())");

	$insert3 = $con->query("INSERT INTO `userquest`(`squest1`, `sanswer1`, `squest2`, `sanswer2`) VALUES ('$squest1',md5('$sanswer1'),'$squest2',md5('$sanswer2'))");


	if ($insert3 == 1 && $insert2 == 1 ){
		$insert1;
	}

	if($insert1 == 1){
		?>
		<div id="alert" class="sticky-top"><p>¡Maravilloso! Tu cuenta a sido creada con exito. Ahora <a href="#"><b>INICIA SESION</b></a></p></div>
	<?php 
	exit();
		} 
		else
		{
	
			?>
				<div id="alert" class="sticky-top"><p>¡Oh noo! Fue imposible crear tu cuenta. ¡Pero no te preocupes! Puedes <a href="#"><b>informarnos de lo sucedido </b></a>o <a href="#"><b>intentarlo una vez mas.</b></a></p></div>
			<?php 
			exit();
		}
}
?>
</body>
</html>