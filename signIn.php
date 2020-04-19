<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/signIn.css">
    <title>Bable | Iniciar sesion</title>
</head>

<body>
    <div class="container-fluid" >
        <div class="container-fluid" id="header">
            <div class="row">
                <div class="col-md-8" >
                    <div id="logo"></div>
                </div>
                <div class="col-md-4" id="reg">
                    <a href="signUp.php" role="button" id="register"><b>Registrarse</b></a>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div id="title">BABLE</div>
        </div>
        <div class="container-fluid" id="content">
            <form action="" method="post">
                <div id="log">
                    <input type="text" name="username" id="nameuser" placeholder="Nombre de usuario" required>
                    <input type="password" name="pass" id="password" placeholder="Contraseña" required>
                    <br>
                    <button type="submit" name="btnSignIn"><b>Ingresar</b></button>
                    <br>
                    <small><a href="forgottenPass.php" role="button">¿Has olvidado tu contraseña?</a></small>
                </div>
            </form>
        </div>
    </div>
    <div class="container-fluid" id="header">
        <div id="info"></div>
</body>

</html>