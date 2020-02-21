<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/h22.1/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Major+Mono+Display" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/logIn.css">

    <head>
        <script>
            var img1 = "img/back/1.png"
            var img2 = "img/back/2.png"
            var img3 = "img/back/3.png"
            var img4 = "img/back/4.png"
            var img5 = "img/back/5.png"
            var img6 = "img/back/6.png"
            var img7 = "img/back/7.png"
            var img8 = "img/back/8.png"
            var img9 = "img/back/9.png"
            var img10 = "img/back/10.png"
            var randomize = Math.round(Math.random() * 9) + 1
            if (randomize == 1) {
                newimg = img1
            } else if (randomize == 2) {
                newimg = img2
            } else if (randomize == 3) {
                newimg = img3
            } else if (randomize == 4) {
                newimg = img4
            } else if (randomize == 5) {
                newimg = img5
            } else if (randomize == 6) {
                newimg = img6
            } else if (randomize == 7) {
                newimg = img7
            } else if (randomize == 8) {
                newimg = img8
            } else if (randomize == 9) {
                newimg = img9
            } else {
                newimg = img10
            }
            document.write('<body background="' + newimg + '">')
        </script>
    </head>
    <title>Bable | Iniciar sesion</title>
</head>

<body>
    <div class="container-fluid" >
        <div class="container-fluid" id="header">
            <div class="row">
                <div class="col-md-8" >
                    <div id="logo"></div>
                </div>
                <div class="col-md-4" id="reg">
                    <a href="signUp.php" role="button" id="register"><b>Registrarse</b></a>
                </div>
            </div>
        </div>
        <div class="container" id="form">
            <div>
                <div id="title"></div>
                <div id="titlep"><p><b>| INICIAR SESION |</b></p></div>
            </div>
            <form action="" method="post">
                <div id="log">
                    <input type="text" name="username" id="nameuser" placeholder="Nombre de usuario" required>
                    <input type="password" name="pass" id="password" placeholder="Contraseña" required>

                    <br>
                    <button type="submit" name="btnSignIn"><b>Ingresar</b></button>
                    <br>
                    <small><a href="passf.php" role="button">¿Has olvidado tu contraseña?</a></small>
                </div>
                <?php include("signIn_.php"); ?>
            </form>
        </div>
    </div>
    <div class="container-fluid" id="header">
        <div  id="info">
            <p>Fotografia por <a href="https://www.instagram.com/banksy/"><b>@Banksy</b></a></p>
        </div>
</body>

</html>