<?php

include_once '../include/user.php';
include_once '../include/userSession.php';

$userSession = new UserSession();
$user = new User();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" type="text/css" href="../css/bootstrapp.min.css">
    <script src="../js/jquery-3.4.1.min.js"></script>
    <script src="../js/bootstrapp.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/branches.css">
    <script src="../js/dropMenuVisible.js"></script>
    

    <!-- Esto es otro comentario -->
    <title>Bable | Arkadia</title>
</head>

<body>
    <div class="container-fluid">
        <nav class="navbar fixed-top navbar-expand-lg">
            <a class="navbar-brand"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
          
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav pull-sm-left">
                <li class="nav-item active">
                  <a class="nav-link" href="index.php" id="info"><b>Home</b> <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="scheduleBranch.php" id="info"><b>Reservar</b></a>
                </li>
            </ul>
            <ul class="navbar-nav mx-auto">
                <div><b>BABLE Bienvenido <?php echo $user->getUser(); ?></b></div>
            </ul>
        <ul class="navbar-nav pull-sm-right">
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" data-toggle="dropdown">
                        <span>
                            <i class="material-icons">account_circle</i>
                        </span>
                    </a>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="#"><i class="material-icons" id="configIcon">settings</i>Configuracion</a>
                      
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="include/signOut.php" role="button"><i class="material-icons"
                        id="configIcon">settings_power</i><b>Cerrar sesion</b></a>
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
                    <a class="nav-link collapsed" href="#langE" data-toggle="collapse" data-target="#langE" id="drop">Inglés</a>
                    <div class="collapse" id="langE">
                        <ul id="itemDrop">
                            <li class="nav-item" >
                                <a class="nav-link" onclick='levelA1Content' id="itemDropDrop">Nivel A1</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" onclick='levelA2Content' id="itemDropDrop">Nivel A2</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" onclick='levelB1Content' id="itemDropDrop">Nivel B1</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" onclick='levelB2Content' id="itemDropDrop">Nivel A2</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" onclick='levelC1Content' id="itemDropDrop">Nivel C1</a>
                            </li>
                        </ul>
                    </div>
                    <a class="nav-link collapsed" href="#langF" data-toggle="collapse" data-target="#langF" id="drop">Francés</a>
                    <div class="collapse" id="langF">
                        <ul id="itemDrop">
                            <li class="nav-item" >
                                <a class="nav-link" onclick='levelA1Content' id="itemDropDrop">Nivel A1</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" onclick='levelA2Content' id="itemDropDrop">Nivel A2</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" onclick='levelB1Content' id="itemDropDrop">Nivel B1</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" onclick='levelB2Content' id="itemDropDrop">Nivel A2</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" onclick='levelC1Content' id="itemDropDrop">Nivel C1</a>
                            </li>
                        </ul>
                    </div>
                    <a class="nav-link collapsed" href="#langI" data-toggle="collapse" data-target="#langI" id="drop">Italiano</a>
                    <div class="collapse" id="langI">
                        <ul id="itemDrop">
                            <li class="nav-item" >
                                <a class="nav-link" onclick='levelA1Content' id="itemDropDrop">Nivel A1</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" onclick='levelA2Content' id="itemDropDrop">Nivel A2</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" onclick='levelB1Content' id="itemDropDrop">Nivel B1</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" onclick='levelB2Content' id="itemDropDrop">Nivel A2</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" onclick='levelC1Content' id="itemDropDrop">Nivel C1</a>
                            </li>
                        </ul>
                    </div>
                    <a class="nav-link collapsed" href="#langA" data-toggle="collapse" data-target="#langA" id="drop">Alemán</a>
                    <div class="collapse" id="langA">
                        <ul id="itemDrop">
                            <li class="nav-item" >
                                <a class="nav-link" onclick='levelA1Content' id="itemDropDrop">Nivel A1</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" onclick='levelA2Content' id="itemDropDrop">Nivel A2</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" onclick='levelB1Content' id="itemDropDrop">Nivel B1</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" onclick='levelB2Content' id="itemDropDrop">Nivel A2</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" onclick='levelC1Content' id="itemDropDrop">Nivel C1</a>
                            </li>
                        </ul>
                    </div>
                    <a class="nav-link collapsed" href="#langP" data-toggle="collapse" data-target="#langP" id="drop">Portugués</a>
                    <div class="collapse" id="langP">
                        <ul id="itemDrop">
                            <li class="nav-item" >
                                <a class="nav-link" onclick='levelA1Content' id="itemDropDrop">Nivel A1</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" onclick='levelA2Content' id="itemDropDrop">Nivel A2</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" onclick='levelB1Content' id="itemDropDrop">Nivel B1</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" onclick='levelB2Content' id="itemDropDrop">Nivel A2</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" onclick='levelC1Content' id="itemDropDrop">Nivel C1</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div>
                    <h1>Nivel A1</h1>
                    <hr>
                    <p>A continuacion veras el calendario con fecha, hora y salon disponibles. Recuerde que solo
                        puede reservar su cupo para el presente dia (exceptuando domingos) y el dia siguiente.
                        <br>
                        <i>Nota: El dia viernes y sabado podra reservar su cupo para el dia lunes.</i>
                    </p>
                    <div>
                        <?php include_once 'calendar.php';?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>