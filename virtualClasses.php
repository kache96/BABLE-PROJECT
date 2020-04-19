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
    <link rel="stylesheet" type="text/css" href="css/doubts.css">

    <title>Bable | Dudas - Clases virtuales</title>
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
    <div class="container-fluid">
        <div id="content">
        <h1 id="subtitle">Preguntas y respuestas - Clases virtuales</h1>
        <hr>
        <p>En este espacio, podrás encontrar respuesta a varias de las inquietudes que se pueden presentar en tu proceso de formación de la Academia de Idiomas Smart referente a las clases virtuales. </p>
        <br>
            <div class="card card-body">
                <b>1. Adquirí un contrato de prestación de servicios en modalidad presencial, por qué ahora debo realizar clases virtuales?</b>
                <br>
                Como respuesta a la emergencia sanitaria declarada por el Presidente de la República, el Ministerio de Educación Nacional expidió la Directiva 06 del 25 de marzo de 2020 dirigida a gobernadores, alcaldes, secretarios de Educación e Instituciones oferentes de Educación para el Trabajo y el Desarrollo Humano, para el uso de tecnologías en el desarrollo de programas de Educación para el Trabajo y el Desarrollo Humano. 
                <br>
                En la citada Directiva Ministerial se solicita a las instituciones de formación a que de manera excepcional, durante el periodo que dure la emergencia sanitaria, ajusten su cronograma de actividades y desarrollen el componente teórico asistido por las herramientas que ofrecen las Tecnologías de la Información y las Comunicaciones. Por lo anterior, y hasta una nuevo pronunciamiento de la cartera Ministerial, las clases se desarrollan bajo la, modalidad virtual. Para conocer dicha directiva, podrás acceder a través del link: https://www.mineducacion.gov.co/1759/articles-394578_recurso_1.pdf                
                <br><br>                
                <b>2. Es obligatorio realizar las clases virtuales?</b>
                <br>
                No es obligatorio, sin embargo debes tener en cuenta que a partir del 1 de abril del 2020, la institución ha iniciado con la oferta y desarrollo de clases bajo la modalidad virtual. Por tal motivo, las obligaciones adquiridas en vigencia del contrato continuarán ejecutándose.                
                <br><br>                
                <b>3. No cuento con herramientas de acceso (internet o computador) que puedo hacer?</b>
                <br>
                En caso de  no contar con computador podrás descargar desde tu celular la APP “MEET” desde la play store o app store para agendar las clases. De presentar dificultades con la conexión a internet puedes comunicarte al correoservicioalcliente@smart.edu.co  en donde se evaluará la situación particular.
                <br><br>                             
                <b>4. Tengo varias semanas sin asistir a las clases  y no quiero programar mi siguiente sesión. Hay forma que se repasen las clases anteriores?</b>
                <br>
                Claro que sí, podrás solicitar a través de la web https://smart.edu.co/clases-virtuales/ sesiones virtuales de refuerzo donde contarás con la asistencia de un docente quien te ayudará con los temas que consideres necesites repasar.
                <br><br>                             
                <b>5. Mi próxima clase es un quiz, cómo puedo hacer para presentarlo y continuar con mi siguiente sesión y/o nivel?</b>
                <br>
                Actualmente estamos ajustando las evaluaciones que debes presentar, las cuales  estarán disponibles a partir del 14 de abril del 2020. Nuestra invitación y recomendación, es que practiques en tus sesiones virtuales, para que no tengas inconvenientes al momento de presentarlos y cuando los vayas a programar.                
                <br><br>                
                <b>6. Presente mi quiz final y estaba en la espera de la entrega del material siguiente nivel. Que debo hacer?</b>
                <br>
                Actualmente y debido a la contingencia, no contamos con la posibilidad física de revisar tu carpeta (ten en cuenta que ésta se encuentra en tu sede. Sin embargo puedes ayudarnos y enviarnos las fotos de tus progress check (donde aparece las notas de tus quices). Así, tu coordinador académico revisará tu proceso e internamente notificará para que te sea enviado las 4 primeras unidades de tu nuevo nivel. Debes tener en cuenta que una vez retomemos las labores, tendrás tu inducción y por consiguiente tu material didáctico.                
                <br><br>                
                <b>7. Una vez agende mi clase y/o sesión virtual, cómo me confirman que fue agendada?</b>
                <br>
                Recibirás 1 hora y media antes de tu clase, un correo de nuestras asistentes académicas en el que se indica el paso a paso de cómo podrás conectarte a tu clase.                
                <br><br>
                <b>8. Que puedo hacer si no puedo acceder al link?</b>
                <br>
                Deberás enviar un correo electrónico a clasevirtual@smart.edu.co con los pantallazos donde se evidencia presuntamente qué error estás presentando.                
                <br><br>                
                <b>9. Cual es el horario de programación de las clases?</b>
                <br>
                Se deben programar el día anterior o a más tardar con tres horas de anticipación de la hora deseada de lunes a viernes de 6:00 a.m. a 8:30 p.m. y los sábados de 7:00 a.m. a 4:00 p.m.                
                <br><br>                
                <b>10. Quisiera realizar sesiones y/o clubes. Están habilitados?</b>
                <br>
                Claro que sí, los clubs podrás solicitarlos a través de las sesiones virtuales en cada una de las sedes.                  
                <br><br>
                <b>11. Programé una clase. Sin embargo no puedo asistir. Cómo puedo cancelarla?</b>
                <br>
                Puedes realizarlo a través de los correos de cancelación de clases respectivo según la sede donde programaste. Ten en cuenta que esto debes hacerlo con al menos 1 hora 30 minutos de anticipación.
            </div>
        <section id="sec2">
            <img src="img/Backgrounds/banners/banner6.png" id="footer">
            <div class="row" id="contact">
                <div class="col-sm-6">
                    <img src="img/Backgrounds/mail.png" id="mailIcon">
                </div>
                <div class="col-sm-6">
                    <h2 id="textContact">CONTÁCTANOS</h2>
                    <form action="" method="post" id="formContact">
                    <?php include_once 'include/homeFields.php';?>
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
                            <div class="col-sm-11" id="containerMessage">
                                <textarea id="messageC" placeholder="Mensaje" name="messageC"
                                    class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="row" id="containerBtnContact">
                            <div class="col-sm-12">
                                <button id="btnSaveC" name="btnSaveC" type="submit" class="btn btn-primary">Enviar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <img src="img/Backgrounds/banners/footer.png" id="footer">
    </div>
</div>
</body>

</html>