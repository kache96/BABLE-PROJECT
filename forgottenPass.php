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
    <link rel="stylesheet" type="text/css" href="css/forgottenPass.css">

    <title>Bable | Recuperacion cuenta</title>
</head>

<body>
    <div class="container-fluid">
        <div class="container-fluid" id="head">
            <img src="img/Backgrounds/banners/bannerTop.png" class="responsive" />
        </div>
        <div class="container">
            <form action="" method="post">
                <div id="welcome">
                    <h1>Bienvenido ¿de nuevo?</h1>
                    <hr>
                    <p>Antes de proceder a la recuperacion de su cuenta, le informamos que es total y
                        absolutamentenecesario que usted recuerde las respuestas a las preguntas de seguridad que
                        ingreso una vez creo su cuenta y su nombre de usuario.
                        <br><br>
                        En caso de que las hayas olvidado, puedes hablar con el administrador y <a id="goBack" class="btn btn-primary" href="index.php" role="button">volver al inicio</a>
                    </p>
                </div>
                <div id="userID">
                <div class="row" >
                        <div class="col-sm-1">
                        <img src="img/Backgrounds/0.png" id="step" class="responsive" />
                        </div>
                        <div class="col-sm-11">
                        <p id="textStep">Para iniciar, ingrese el nombre de usuario con el que creo la cuenta.</p>
                        <hr>
                    <div class="row">
                        <div class="col-sm-6" id="columnUser">
                            <input type="text" placeholder="Nombre usuario" id="useridy" name="useridy" class="form-control" >
                        </div>
                        <div class="col-sm-6" id="columnUser">
                        <button type="submit" name="btnUserIdentity" id="btnUserIdentity" class="btn btn-primary btn-block">></button>
                        </div>
                    </div>

                        </div>
                    </div>
                    </div>
                <?php
                    include_once 'include/connection.php';
                    $useridy = $_POST["useridy"];
                    if(isset($_POST['btnUserIdentity'])){

                        if (empty($useridy))
                            {
                                ?>
                                <div id="alert"><p>¡Ups! No haz ingresado tu nombre de usuario. <a href="" onclick="location.reload()"><b>Intentalo una vez mas.</b></a></p></div>
                                <?php
                                exit();
                            }
			
                    $sql = "SELECT * FROM user WHERE  username = '$useridy'" ;
                    $res = $con->query($sql);
                    $can = $res->num_rows;
                    while($data=$res->fetch_object()){
                ?>
                <div class="row">
                    <div class="col-sm-6">
                        <img src="img/Backgrounds/1.png" id="step1" class="responsive" />
                        <div id="title">
                            <h3>Preguntas de seguridad</h3>
                            <hr>
                            <p>Responde a las siguientes preguntas. La respuesta, sera la que ingresaste una vez creaste tu cuenta.</p>
                        </div>
                        <div id="quests">
                            <div class="row">
                                <div class="col-sm-12">
                                    <input type="text" id="fieldQuest" name="squest1" class="form-control" value="<?php echo $data->squest1;?>" disabled>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <input type="text" onclick="hideUser()" placeholder="Escribe tu respuesta" name="sanswer1" class="form-control" autocomplete="off">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12" onclick="hideUser()">
                                    <input type="text" id="fieldQuest" name="squest2" class="form-control" value="<?php echo $data->squest2;?>" disabled>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <input type="text" placeholder="Escribe tu respuesta" name="sanswer2" class="form-control" autocomplete="off">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <img src="img/Backgrounds/2.png" id="step1">
                        <div id="title">
                            <h3>Cambio de contraseña</h3>
                            <hr>
                            <p>Recuerde que la contraseña debe tener al menos 8 caracteres, 1 caracter numerico y 1 mayuscula. Ademas, debe ser diferente al nombre, apellido y correo electronico..</p>
                        </div>
                        
                        <div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <input type="text" placeholder="Nombre usuario" name="userIdentity" class="form-control" >
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <input type="password" placeholder="Contraseña nueva" name="pass" class="form-control" >
                                </div>
                                <div class="col-sm-6">
                                    <input type="password" placeholder="Confirmar contraseña" name="vpass" class="form-control" >
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <button type="submit" name="btnChangeP" id="btnChangeP" class="btn btn-primary btn-block">Guardar</button>
                <?php 
                    }
                }
                ?>
                <?php 
                        include_once 'include/accountFields.php';
                        ?>
            </form>
        </div>
        <div class="container-fluid" id="head">
            <img src="img/Backgrounds/banners/banner2.png" />
        </div>
    </div>
<script>
    function hideUser() {
        document.getElementById("userID").innerHTML = "";
    }
</script>
</body>

</html>