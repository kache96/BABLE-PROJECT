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
       
    </head>
    <title>Bable | Home</title>
</head>

<body>
    <div class="container-fluid" >
        <div class="container-fluid" id="header">
            <div class="row">
                <div class="col-md-8" >
                    <div id="logo"></div>
                </div>
                <div class="col-md-4" id="reg">
                    <a href="include/signOut.php" role="button" id="register"><b>Cerrar sesion</b></a>
                </div>
            </div>
        </div>
        <div class="container" id="form">
            <div>
                <div id="title"></div>
                <div id="titlep"><p><b>| Bienvenido <?php echo $user->getUser(); ?> |</b></p></div>
            </div>
        </div>
    </div>
</body>

</html>