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
    <link rel="stylesheet" type="text/css" href="css/home.css">
    <script src="js/levels.js"></script>

    <title>Bable | Home</title>
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
                            <a class="dropdown-item" href="include/signOut.php" role="button"><i
                                    class="material-icons" id="configIcon">settings_power</i><b>Cerrar sesion</b></a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <div class="container-fluid" id="content">
        <div class="container-fluid" id="carouselSmartNews">
            <div id="smartNews" class="carousel slide" data-ride="carousel">
                <ul class="carousel-indicators">
                    <li data-target="#smartNews" data-slide-to="0" class="active"></li>
                    <li data-target="#smartNews" data-slide-to="1"></li>
                    <li data-target="#smartNews" data-slide-to="2"></li>
                </ul>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="img/Smart/slide1.jpg">
                    </div>
                    <div class="carousel-item">
                        <img src="img/Smart/slide2.jpg">
                        <div class="carousel-caption">
                            <h3 id="captionTitle">EXPERIENCIAS SMART</h3>
                            <p id="captionDesc">Smart brinda a sus estudiantes actividades complementarias a las sesiones de aprendizaje, que se desarrollan fuera del salón de clase. Nuestros clubes y talleres son el apoyo que tienen nuestros estudiantes para...</p>
                            <a id="captionLink" class="btn btn-primary" href="https://smart.edu.co/experiencias-smart/" role="button">Ver post</a>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="img/Smart/slide3.jpg">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#smartNews" data-slide="prev">
                    <span class="material-icons" id="slideArrow">
                        chevron_left
                    </span>
                </a>
                <a class="carousel-control-next" href="#smartNews" data-slide="next">
                    <span class="material-icons" id="slideArrow">
                        chevron_right
                    </span>
                </a>
            </div>
        </div>
        <section>
            <div class="row" id="reminds">
                <div class="col-sm-8">
                    <img id="infoIcon" src="img/Backgrounds/info.png">
                    <h2 id="textReminds">Recordatorios</h2>
                    <hr>
                    <p>No olvides ingresar la nota de quiz o examen final una vez los hayas tomado. De esta manera, podras visualizar tus notas y tener un record de ellas.
                    <br><br>
                    Para ello, llena el siguiente formulario.
                    </p>
                    <form action="" method="post" id="formNotes">
                        <div class="row">
                            <div class="col-sm-7" id="columnForm">
                                <input id="notes" type="number" class="form-control" name="notes" placeholder="Nota final">
                            </div>
                            <div class="col-sm-5" id="columnForm">
                                <button id="btnSaveN" type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-sm-4">
                    <a href="">
                        <div id="virtualClasses"></div>
                    </a>
                </div>
            </div>
        </section>
        <section id="sec1">
            <div class="row" id="workbook">
                <div class="col-sm-12">
                    <img id="workIcon" src="img/Backgrounds/cambridgeLogo.png">
                    <h2 id="textWork">Workbook</h2>
                    <p>Recuerda que antes de presentar tu quiz, debes realizar el workbook.
                    <br>
                    ¡No busques mas! Aqui te hemos dejado el link directo para que puedas realizar tus actividades.
                    </p>
                    <img id="linkIcon" src="img/Backgrounds/link.png">
                    <a href="https://www.cambridgelms.org/main/p/splash" id="aWork">Workbook Cambridge LMS</a>
                </div>
            </div>
        </section>
        <section>
            <div id="doubts">
                <a id="doubtsLink" class="btn btn-primary" href="https://smart.edu.co/experiencias-smart/" role="button">Resuelvelas aqui</a>
            </div>
        </section>
        <section id="sec2">
            <img src="img/Backgrounds/banners/banner6.png" id="footer">
            <div class="row" id="contact">
                <div class="col-sm-6">
                    <img src="img/Backgrounds/mail.png" id="mailIcon">
                </div>
                <div class="col-sm-6">
                    <h2 id="textContact">CONTÁCTANOS</h2>
                    <form action="" method="post" id="formContact">
                        <div class="row" id="columnFormC">
                            <div class="col-sm-1">
                                <span class="material-icons" id="contactIcon">
                                    person
                                </span>
                            </div>
                            <div class="col-sm-11">
                                <input type="text" class="form-control" name="nameC" id="contactField"
                                    placeholder="Nombre">
                            </div>
                        </div>
                        <div class="row" id="columnFormC">
                            <div class="col-sm-1">
                                <span class="material-icons" id="contactIcon">
                                    email
                                </span>
                            </div>
                            <div class="col-sm-11">
                                <input type="email" class="form-control" name="emailC" id="contactField"
                                    placeholder="Correo electronico">
                            </div>
                        </div>
                        <div class="row" id="columnFormC">
                            <div class="col-sm-11">
                                <textarea id="messageC" placeholder="Mensaje" name="messageC"
                                    class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="row" id="containerBtnContact">
                            <div class="col-sm-12">
                                <button id="btnSaveC" type="submit" class="btn btn-primary">Enviar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <img src="img/Backgrounds/banners/footer.png" id="footer">
        </section>
    </div>
</body>

</html>