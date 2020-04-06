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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="js/bootstrapp.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/noteRecord.css">

    <title>Bable | Record notas</title>
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
                        <a class="nav-link" href="#" data-toggle="dropdown">
                            <span>
                                <i class="material-icons">account_circle</i>
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="account.php"><i class="material-icons"
                                    id="configIcon">settings</i>Configuracion</a>
                            <a class="dropdown-item" href="include/signOut.php" role="button"><i class="material-icons"
                                    id="configIcon">settings_power</i><b>Cerrar sesion</b></a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <div class="container-fluid" id="content">
        <div id="containerContent">
            <h1 id="textConfig">Record notas</h1>
            <hr>
            <p>Te informamoss que una vez ingreses notas desde el formulario que se encuentra en el "Home", apartado
                "Recordatorios", podras visualizarlas aqui.
            </p>
            <form action="" method="post">
                <?php include_once 'include/accountFields.php';?>
                <div class="row" id="userFormConfig">
                    <div class="col-sm-2">
                        <img src="img/Backgrounds/notes.png" id="passIcon">
                    </div>
                    <div id="tableNotes" class="col-sm-9">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col"><b>Idioma y nivel</b></th>
                                    <th scope="col"><b>Tipo de examen</b></th>
                                    <th scope="col"><b>Unidades</b></th>
                                    <th scope="col"><b>Nota final</b></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    include_once 'include/connection.php';

                                    if(isset($_SESSION['user'])){
                                    $sql = "SELECT * FROM usernotes WHERE  username='$currentUser'" ;
                                    $res = $con->query($sql);
                                    $can = $res->num_rows;
                                    
                                    while($data=$res->fetch_object()){
                                ?>
                                <tr>

                                    <td><?php echo $data->langlevel;?></td>
                                    <td><?php echo $data->typeExam;?></td>
                                    <td><?php echo $data->units;?></td>
                                    <td><?php echo $data->note;?></td>
                                </tr>
                                <?php }}?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>