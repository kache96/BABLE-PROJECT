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
    <link rel="stylesheet" type="text/css" href="css/forgottenPass.css">
    <script src="js/levels.js"></script>

    <title>Bable | Configuracion cuenta</title>
</head>

<body>
    <div class="container-fluid">
        <div class="container-fluid" id="head">
            <img src="img/Backgrounds/banners/banner8.png"/>
        </div>
        <form action="" method="post">
            <div class="container">
            <div id="step1">
                <h2>1</h2>
            </div>
            <div id="title">
                <h4>Preguntas de seguridad</h4>
                <p>Por favor, antes de cambiar tu contraseña responde a las siguientes preguntas. La respuesta, sera la que ingresaste una vez creaste tu cuenta.</p>
            </div>
            <?php
                            include_once 'include/connection.php';

                            if(isset($_SESSION['user'])){
                            $sql = "SELECT * FROM user WHERE  username='$currentUser'" ;
                            $res = $con->query($sql);
                            $can = $res->num_rows;
                            
                            while($data=$res->fetch_object()){
                        ?>
            <div id="quests">
                <div class="row">
                    <div class="col-sm-6">
                        <h5><?php echo $data->email;?></h5>
                    </div>
                    <div class="col-sm-6">
                        <h5><?php echo $data->email;?></h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <input type="text" placeholder="Escribe tu respuesta" name="answer1" class="form-control" required>
                    </div>
                    <div class="col-sm-6">
                        <input type="text" placeholder="Escribe tu respuesta" name="answer2" class="form-control" required>
                    </div>
                </div>
            </div>
            <?php }}?>
            <div id="step2">
                <h2>2</h2>
            </div>
            <div id="title">
                <h4>Cambio de contraseña</h4>
                <p>Recuerde que en el "confirmar contraseña", debe ingresar la contraseña nueva con igualdad en caracteres.</p>
            </div>
            <?php include_once 'include/accountFields.php';?>
            <div>
                <div class="row">
                    <div class="col-sm-6">
                        <input type="text" placeholder="Contraseña nueva" name="answer1" class="form-control" required>
                    </div>
                    <div class="col-sm-6">
                        <input type="text" placeholder="Confirmar contraseña" name="answer2" class="form-control" required>
                    </div>
                </div>
            </div>
            <div>
                <button type="submit" name="saveQ" class="btn btn-primary btn-block">Guardar</button>
            </div>
        </div>
        </form>
    
        <div class="container-fluid" id="head">
            <img src="img/Backgrounds/banners/banner7.png"/>
        </div>
    </div>
</body>

</html>