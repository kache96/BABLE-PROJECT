<?php
error_reporting(0);
@ini_set('display_errors', 0);
include_once '../include/user.php';
include_once '../include/userSession.php';

$userSession = new UserSession();
$user = new User();

if(isset($_SESSION['user'])){
    $user->setUser($userSession->getCurrentUser());
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/bootstrapp.min.css">

    <script src="../js/jquery.min.js"></script>
    <script src="../js/moment.min.js"></script>
    <link rel="stylesheet" href="../css/fullcalendar.min.css">
    <script src="../js/fullcalendar.min.js"></script>
    <script src="../js/es.js"></script>

    <link rel="stylesheet" href="../css/calendar.css">
    <script src="../js/calendar.js"></script>

    <link rel="stylesheet" href="../css/jquery-ui.css">
    <link rel="stylesheet" href="../css/jquery-ui.structure.css">
    <link rel="stylesheet" href="../css/jquery-ui.theme.css">
    <script src="../js/jquery-ui.js"></script>
    <script src="../js/datepicker-es.js"></script>

    <link rel="stylesheet" href="../css/bootstrap-clockpicker.css">
    <script src="../js/bootstrap-clockpicker.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="../js/bootstrapp.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/branches.css">

    <title>Bable | Arkadia</title>
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
                        <a class="nav-link" href="../index.php" id="info"><b>Home</b> 
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../branch.php" id="info"><b>Reservar</b></a>
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
                            <a class="dropdown-item" href="../account.php"><i class="material-icons" id="configIcon">settings</i>Configuracion</a>
                            <a class="dropdown-item" href="../include/signOut.php" role="button"><i class="material-icons" id="configIcon">settings_power</i><b>Cerrar sesion</b></a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <div class="container-fluid" id="content">

        <div class="row">
            <div class="col-2">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link collapsed" href="#langE" data-toggle="collapse" data-target="#langE"
                        id="drop">Inglés</a>
                    <div class="collapse" id="langE">
                        <ul id="itemDrop">
                            <li class="nav-item">
                                <a class="nav-link" onclick='enA1()' id="itemDropDrop">Nivel A1</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" onclick='enA2()' id="itemDropDrop">Nivel A2</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" onclick='enB1()' id="itemDropDrop">Nivel B1</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" onclick='enB2()' id="itemDropDrop">Nivel B2</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" onclick='enC1()' id="itemDropDrop">Nivel C1</a>
                            </li>
                        </ul>
                    </div>
                    <a class="nav-link collapsed" href="#langF" data-toggle="collapse" data-target="#langF"
                        id="drop">Francés</a>
                    <div class="collapse" id="langF">
                        <ul id="itemDrop">
                            <li class="nav-item">
                                <a class="nav-link" onclick='frA1()' id="itemDropDrop">Nivel A1</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" onclick='frA2()' id="itemDropDrop">Nivel A2</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" onclick='frB1()' id="itemDropDrop">Nivel B1</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" onclick='frB2()' id="itemDropDrop">Nivel B2</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" onclick='frC1()' id="itemDropDrop">Nivel C1</a>
                            </li>
                        </ul>
                    </div>
                    <a class="nav-link collapsed" href="#langI" data-toggle="collapse" data-target="#langI"
                        id="drop">Italiano</a>
                    <div class="collapse" id="langI">
                        <ul id="itemDrop">
                            <li class="nav-item">
                                <a class="nav-link" onclick='itA1()' id="itemDropDrop">Nivel A1</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" onclick='itA2()' id="itemDropDrop">Nivel A2</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" onclick='itB1()' id="itemDropDrop">Nivel B1</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" onclick='itB2()' id="itemDropDrop">Nivel B2</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" onclick='itC1()' id="itemDropDrop">Nivel C1</a>
                            </li>
                        </ul>
                    </div>
                    <a class="nav-link collapsed" href="#langA" data-toggle="collapse" data-target="#langA"
                        id="drop">Alemán</a>
                    <div class="collapse" id="langA">
                        <ul id="itemDrop">
                            <li class="nav-item">
                                <a class="nav-link" onclick='alA1()' id="itemDropDrop">Nivel A1</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" onclick='alA2()' id="itemDropDrop">Nivel A2</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" onclick='alB1()' id="itemDropDrop">Nivel B1</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" onclick='alB2()' id="itemDropDrop">Nivel B2</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" onclick='alC1()' id="itemDropDrop">Nivel C1</a>
                            </li>
                        </ul>
                    </div>
                    <a class="nav-link collapsed" href="#langP" data-toggle="collapse" data-target="#langP"
                        id="drop">Portugués</a>
                    <div class="collapse" id="langP">
                        <ul id="itemDrop">
                            <li class="nav-item">
                                <a class="nav-link" onclick='poA1()' id="itemDropDrop">Nivel A1</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" onclick='poA2()' id="itemDropDrop">Nivel A2</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" onclick='poB1()' id="itemDropDrop">Nivel B1</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" onclick='poB2()' id="itemDropDrop">Nivel B2</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" onclick='poC1()' id="itemDropDrop">Nivel C1</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-9" id="containerInfo">
                <h1>Bienvenido a la sede <b id="branchName">Arkadia</b></h1>
                <hr>
                <p>Para reservar su cupo, por favor seleccione el idioma y el nivel en el que se encuentra en el menu izquierdo. Una vez alli, seleccione la fecha en la que desea reservar.</p>
            </div>
            <div class="col-9" id="containerLevelsC" hidden>
                <div id="langLevel">
                    <h1 id="level"></h1>
                    <hr>
                    <p>A continuación veras el calendario con los días en los que podrás reservar tu cupo.
                        <br><br>
                        El horario de reserva inicia a las 6:00am y finaliza a las 7:30pm en semana. Los sábados inicia
                        a las 6:30am y finaliza a las 3:00pm.
                        <br>
                        <i>Nota: Le recordamos que no podrá reservar su cupo para el día domingo.</i>
                    </p>
                </div>
                <div id="containerCalendar">
                    <?php include_once 'calendar.php';?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>