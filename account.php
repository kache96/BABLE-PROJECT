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
    <link rel="stylesheet" type="text/css" href="css/account.css">
    <script src="js/levels.js"></script>

    <title>Bable | Configuracion cuenta</title>
</head>

<body>
    <div class="container-fluid">
        <nav class="navbar fixed-top navbar-expand-lg">
            <a class="navbar-brand"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav pull-sm-left">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php" id="info"><b>Home</b>
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="branch.php" id="info"><b>Reservar</b></a>
                    </li>
                </ul>
                <ul class="navbar-nav mx-auto">
                    <div id="welcome"><b>Bienvenido <?php echo $user->getUser();?></b></div>
                </ul>
                <ul class="navbar-nav pull-sm-right">
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#user" data-toggle="dropdown">
                            <span>
                                <i class="material-icons">account_circle</i>
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#user"><i class="material-icons"
                                    id="configIcon">settings</i>Configuracion</a>
                            <a class="dropdown-item" href="../include/signOut.php" role="button"><i
                                    class="material-icons" id="configIcon">settings_power</i><b>Cerrar sesion</b></a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <div class="container-fluid" id="content">
        <h1 id="textConfig">Configuracion</h1>
        <hr>
        <p>Bienvenido una vez mas a BABLE. Es un placer para nostros que hagas parte de esta familia. Para configurar tu cuenta, rellena los campos que desees actualizar.
        <br>
        Recuerda que para eliminar tu cuenta, debes hablar con el administrador.
        </p>
        <form action="" method="post">
        <?php include_once 'include/accountFields.php';?>
            <div class="row" id="userFormConfig">
                <div class="col-sm-2">
                    <img src="img/Backgrounds/user.png" id="userIcon2">
                </div>
                <div class="col-sm-10">
                    <div id="formConfig">
                        <?php
                            include_once 'include/connection.php';

                            if(isset($_SESSION['user'])){
                            $sql = "SELECT * FROM user WHERE  username='$currentUser'" ;
                            $res = $con->query($sql);
                            $can = $res->num_rows;
                            
                            while($data=$res->fetch_object()){
                        ?>
                        <div class="row">
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="namec" placeholder="Nombre(s)" id="namec" value="<?php echo $data->namec;?>">
                            </div>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="lastname" placeholder="Apellidos" id="lastname" value="<?php echo $data->lastname;?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="code" placeholder="Codigo" id="code" value="<?php echo $data->code;?>">
                            </div>
                            <div class="col-sm-5">
                                <input type="email" class="form-control" name="email" placeholder="Correo electronico" id="email" value="<?php echo $data->email;?>">
                            </div>
                            <div class="col-sm-3">
                                <a id="passChangeLink" class="btn btn-primary" href="changePassword.php" role="button">Cambiar contraseña</a>
                            </div>
                        </div>
                        <?php }}?>
                        <div class="row">
                            <div class="col-sm-12">
                                <button id="btnUpdateU" name="btnUpdateU" type="submit" class="btn btn-primary btn-block">Guardar cambios</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <div>
            <img src="img/Backgrounds/banners/banner2.png" id="footer">
        </div>
    </div>
</body>

</html>