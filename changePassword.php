<?php
error_reporting(0);
@ini_set('display_errors', 0);
include_once 'include/user.php';
include_once 'include/userSession.php';

$userSession = new UserSession();
$user = new User();

if(isset($_SESSION['user'])){
    $user->setUser($userSession->getCurrentUser());
}
$currentUser = $user->getUser();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/bootstrapp.min.css">
    <script src="js/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="js/bootstrapp.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/changePass.css">

    <title>Bable | Cambio de contraseña</title>
</head>

<body>
    <div class="container-fluid" id="content">
        <h1 id="textConfig">Cambiar contraseña</h1>
        <hr>
        <p>Para cambiar tu contraseña, debes recordar la que tienes actualmente. En caso de que la hayas olvidado, puedes intentar <a id="fPassLink" class="btn btn-primary" href="forgottenPass.php" role="button">recuperarla.</a>
        </p>
        <form action="" method="post">
        <?php include_once 'include/accountFields.php';?>
            <div class="row" id="userFormConfig">
                <div class="col-sm-2">
                    <img src="img/Backgrounds/pass.png" id="passIcon">
                </div>
                    <div id="formConfig" class="col-sm-9">
                        <div class="row">
                            <div class="col-sm-4">
                                <input type="password" class="form-control" name="oldPass" id="oldPass" placeholder="Contraseña vieja">
                            </div>
                            <div class="col-sm-4">
                                <input type="password" class="form-control" name="pass" id="pass" placeholder="Contraseña nueva">
                            </div>
                            <div class="col-sm-4">
                                <input type="password" class="form-control" name="vpass" id="vpass" placeholder="Confirmar contraseña">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <button id="btnChangePass" name="btnChangePass" type="submit" class="btn btn-primary btn-block">Guardar cambios</button>
                            </div>
                        </div>
                </div>
            </div>
        </form>
    </div>

        <div>
            <img src="img/Backgrounds/banners/banner2.png" id="footer">
        </div>
    </div>
</body>

</html>