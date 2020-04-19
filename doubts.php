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

    <title>Bable | Dudas</title>
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
        <h1 id="subtitle">Preguntas y respuestas</h1>
        <hr>
        <p>En este espacio encontraras las respuestas a las preguntas mas comunes. Por favor si no pudo resolver su duda, llene el formulario al final de la pagina y nosotros nos pondremos en contacto con usted. </p>
        <ul>
            <li>
                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#point1"
                    aria-expanded="false" aria-controls="collapseExample">
                    <b>Ampliación de caducidad o vigencia del contrato.</b>
                </button>
                <div class="collapse" id="point1">
                    <div class="card card-body">
                        <b> 1. Adquirí mi contrato antes del 20 de marzo del 2020. ¿Cómo será el proceso de ampliación durante el tiempo del aislamiento?
                        </b>
                        <br>
                        Smart ha contemplado realizar una ampliación de 30 días calendario durante la vigencia de
                        aislamiento. Debes tener en cuenta que no prestamos servicio presencial en sede desde el 16 de
                        marzo y retomamos nuevamente el servicio el 1 de abril de forma virtual. Así cuando tu contrato
                        caduqué podrás solicitar la ampliación de los 30 días al correo electrónico
                        servicioalcliente@smart.edu.co
                        <br><br>
                        <b>2. Mi contrato caducó durante el tiempo que se presentó la pandemia, que puedo hacer para recibir mis clases virtuales?</b>
                        <br>
                        Deberás presentar al correo de servicioalcliente@smart.edu.co solicitud de ampliación. Ellos
                        estudiaran tu caso y te indicarán cómo puedes proceder.
                        <br><br>
                        <b>3. Tuve sesiones virtuales durante el tiempo antes de implementar las clases que están ofreciendo a partir del 1 de abril del 2020. Esas fueron tenida en cuenta y descontadas de mi programa?</b>
                        <br>
                        No. Por ser sesiones de refuerzo y aprendizaje virtual éstas no abordaban de forma directa el
                        contenido de tu programa y no fueron tenidas en cuenta en el descuento de las horas adquiridas
                        inicialmente. Por lo anterior, se está otorgando ampliación de 30 días calendario a la caducidad
                        de tu programa.
                    </div>
                </div>
            </li>
            <li>
                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#point3"
                    aria-expanded="false" aria-controls="collapseExample">
                    <b> Trámites del contrato</b>
                </button>
                <div class="collapse" id="point3">
                    <div class="card card-body">
                        <b> 1. Soy estudiante de Smart y necesito un certificado estudiantil. Cómo puedo solicitarlo?
                        </b>
                        <br>
                        Para gestionar este trámite deberás ingresar a https://smart.edu.co/pagos/ y realizar el pago de
                        $10.000 enviando el soporte a los correos electrónicos de las asistentes académicas de tu sede,
                        y en un término no mayor a 5 días hábiles, recibirás tu certificado. Recuerda relacionar tus
                        datos completos en el correo.
                        <br><br>
                        <b>2. Estoy en un nivel que considero es menor y/o mayor a mis competencias, es posible realizar test de clasificación?</b>
                        <br>
                        Claro que sí. Deberás solicitar al correo del coordinador académico donde actualmente recibes
                        tus clases y/o te encuentras matriculado para que evalúen tu caso y te brindan las diversas
                        alternativas que tienes.
                        <br><br>
                        <b>3. Mi contrato caducó hace vario tiempo, pero deseo continuar con mi proceso de aprendizaje, que opciones tengo?</b>
                        <br>
                        En Smart tu contrato nunca caduca, podrás realizar el beneficio por actualización de costos de
                        las horas, y/o niveles que necesites. Ten en cuenta que no es necesario que lo realices por
                        todos los niveles que te hacen falta. Para mayor información no dudes en contactarte a
                        servicioalcliente@smart.edu.co
                        <br><br>
                        <b>4. Quiero hacer un cambio de beneficiario. Es posible?</b>
                        <br>
                        Claro que sí, deberás enviar tu solicitud en conjunto con los datos del nuevo beneficiario a
                        servicioalcliente@smart.edu.co ahí validarán tu caso y te darán respuesta.
                        <br><br>
                        <b>5. Me encuentro matriculado en una sede. Sin embargo quisiera hacer cambio de ésta. Cómo es el proceso?.</b>
                        <br>
                        Deberás solicitar el cambio a las asistentes académicas de la sede donde te matriculaste,
                        indicando el motivo y la nueva sede.
                        <br><br>
                        <b>6. Soy nuevo en Smart y desconozco el directorio de los colaboradores. Podría suministrar?</b>
                        <br>
                        Claro que sí. Podrás solicitar el correo electrónico de la persona o área que necesites a
                        servicioalcliente@smart.edu.co
                    </div>
                </div>
            </li>
            <li>
                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#point2"
                    aria-expanded="false" aria-controls="collapseExample">
                    <b>Pagos</b>
                </button>
                <div class="collapse" id="point2">
                    <div class="card card-body">
                        <b>1. Estoy interesado en las sesiones y/o clases de inglés, pero lamentablemente me encuentro en mora de la cuota de abril. Qué puedo hacer?</b>
                        <br>
                        Smart entiende tu situación y dará posibilidad a los estudiantes que se encuentren en mora de
                        una (1) cuota a continuar con su proceso académico. Así mismo sin generar reporte a centrales de
                        riesgo.
                        <br><br>
                        <b>2. Cómo puedo hacer los pagos de las cuotas si estoy en casa?.</b>
                        <br>
                        Podrás efectuarlo a través de nuestra página webhttps://smart.edu.co/pagos/ por medio de Nuestro
                        boton PSE usando tarjeta debito y Credito una vez lo realices, deberás enviar el soporte a
                        gestorescartera@smart.edu.co.
                        <br>
                        Adicional podrás realizar transferencias Bancarias, pagos pse por medio de tarjeta de
                        crédito/débito y consignaciones en las oficinas físicas y puntos Autorizados incluyendo Puntos
                        Balotto de los siguientes Bancos:
                        <br><br>
                        <b>3. Por la calamidad pública no podré realizar el pago correspondiente a la cuota establecida, que puedo hacer al respecto?</b>
                        <br>
                        La Academia de Idiomas Smart, ha dispuesto un espacio para que usted pueda presentar
                        directamente su solicitud acorde a sus necesidades. Tenga en cuenta los siguientes pasos:
                        <br>
                        Usted deberá enviar un correo electrónico a gestorescartera@smart.edu.co. En el asunto deberá
                        incluir “información pago código xxx”. En el cuerpo del correo debe escribir textualmente su
                        caso en concreto, explicando detalladamente la situación que actualmente le acontece y/o la
                        información que desea recibir. Deberá agregar en el cuerpo del correo los siguientes datos:
                        <br><br>
                        - Nombre completo del titular
                        <br>
                        - Número de cédula del titular
                        <br>
                        - Nombre completo del actual beneficiario
                        <br>
                        - Número del código de estudiante.
                        <br>
                        - Sede donde actualmente se encuentra matriculado
                        <br>
                        - Número de celular y/o donde se puedan contactar con usted.
                        <br><br>
                        Es importante que su solicitud sea remitida directamente a ellos. Si usted cuenta con un
                        documento y/o soporte de algún inconveniente, debe adjuntarlo a la solicitud, de tal manera que
                        su respuesta sea dada acorde a su caso en particular.
                        <br><br>
                        <b>4. Envié el correo electrónico respecto a los pagos. En cuantos días recibiré respuesta?</b>
                        <br>
                        Su respuesta se obtendrá en el transcurso de hasta 8 días Hábiles teniendo en cuenta la fecha de
                        su solicitud.
                        <br><br>
                        <b>5. Actualmente me llegan mensajes que seré reportada a las centrales de riesgo por el no
                            pago. Que debo hacer al respecto?</b>
                        <br>
                        Debes contactarte al correo gestorescartera@smart.edu.co indicando la novedad. Dicha área
                        validará y te dará respuesta a tu solicitud.
                    </div>
                </div>
            </li>
        </ul>
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