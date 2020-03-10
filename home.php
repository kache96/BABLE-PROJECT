<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/home.css">
    <script type="text/javascript" src="js/bable.js"></script>
    <title>Bable | Home</title>
</head>

<body>
    <div class="container-fluid">
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-left">
                    <li><a class="navbar-brand"></a></li>
                    <li><a href="home.php" id="info"><b>Home</b></a></li>
                </ul>
                <ul class="nav navbar-nav navbar-center">
                    <div id="welcome"><b>Bienvenido <?php echo $user->getUser(); ?></b></div>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a class="dropdown-toggle" id="userIcon" data-toggle="dropdown">
                            <span>
                                <i class="material-icons">account_circle</i>
                            </span>
                            <ul class="dropdown-menu">
                                <li><a href="#"><i class="material-icons" id="configIcon">settings</i>Configuracion</a>
                                </li>
                                <li>
                                    <a href="include/signOut.php" role="button"><i class="material-icons"
                                            id="configIcon">settings_power</i><b>Cerrar sesion</b></a>
                                </li>
                            </ul>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <div class="container-fluid">
        <img src="img/Backgrounds/banners/banner1.png" id="book">
    </div>
    <div class="container-fluid" id="page">
        <div class="container-fluid" id="content">
            <div class="wizard">
                <div class="wizard-inner">
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active">
                            <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Primer paso">
                                <span>
                                    <img src="img/Options/numbers/step1.png" id="steps">
                                    <h1 id="subtitle">Sede</h1>
                                    <p>Selecciona la sede en la que reservaras clase.</p>
                                </span>
                            </a>
                        </li>
                        <li role="presentation" class="disabled">
                            <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Segundo paso">
                                <span>
                                    <img src="img/Options/numbers/step2.png" id="steps">
                                    <h1 id="subtitle">Idioma</h1>
                                    <p>Selecciona el idioma que estudias.</p>
                                </span>
                            </a>
                        </li>
                        <li role="presentation" class="disabled">
                            <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="Tercer paso">
                                <span>
                                    <img src="img/Options/numbers/step3.png" id="steps">
                                    <h1 id="subtitle">Libro</h1>
                                    <p>Selecciona el nivel del idioma que estudias.</p>
                                </span>
                            </a>
                        </li>
                        <li role="presentation" class="disabled">
                            <a href="#step4" data-toggle="tab" aria-controls="step4" role="tab" title="Cuarto paso">
                                <span>
                                    <img src="img/Options/numbers/step4.png" id="steps">
                                    <h1 id="subtitle">Dia y hora</h1>
                                    <p>Selecciona el dia y la hora en la que quieres reservar.</p>
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <form action="" method="post">
                <div class="tab-content">
                    <div class="tab-pane active" role="tabpanel" id="step1">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <input type="image" src="img/Options/branches/branch1.png" name="img" value="bello"
                                    id="branch">
                                <input type="image" src="img/Options/branches/branch2.png" name="img" value="arkadia"
                                    id="branch">
                                <input type="image" src="img/Options/branches/branch3.png" name="img" value="centro"
                                    id="branch">
                                <input type="image" src="img/Options/branches/branch4.png" name="img" value="poblado"
                                    id="branch">
                                <input type="image" src="img/Options/branches/branch5.png" name="img" value="itagui"
                                    id="branch">
                                <input type="image" src="img/Options/branches/branch6.png" name="img" value="calasanz"
                                    id="branch">
                                <input type="image" src="img/Options/branches/branch1.png" name="img" value="olaya"
                                    id="branch">
                            </div>
                        </div>
                        <ul class="list-inline pull-right">
                            <li><button type="button" class="next-step "><b>Siguiente</b></button>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-pane" role="tabpanel" id="step2">
                        <div class="form-group col-md-12">
                            <input type="image" src="img/Options/langs/ingles.png" name="img" value="ingles"
                                id="idioma">
                            <input type="image" src="img/Options/langs/frances.png" name="img" value="frances"
                                id="idioma">
                            <input type="image" src="img/Options/langs/aleman.png" name="img" value="aleman"
                                id="idioma">
                        </div>
                        <div class="form-group col-md-12">
                            <ul class="list-inline pull-right">
                                <li><button type="button" class="prev-step"><b>Anterior</b></button>
                                </li>
                                <li><button type="button" class="next-step"><b>Siguiente</b></button>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="tab-pane" role="tabpanel" id="step3">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <input type="image" src="img/Options/levels/level1.png" name="img" value="a1"
                                    id="levels">
                                <input type="image" src="img/Options/levels/level2.png" name="img" value="a2"
                                    id="levels">
                                <input type="image" src="img/Options/levels/level3.png" name="img" value="b1"
                                    id="levels">
                                <input type="image" src="img/Options/levels/level4.png" name="img" value="b2"
                                    id="levels">
                                <input type="image" src="img/Options/levels/level5.png" name="img" value="c1"
                                    id="levels">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <input type="image" src="img/Options/levels/book1.png" name="img" value="book1"
                                    id="books">
                                <input type="image" src="img/Options/levels/book2.png" name="img" value="book2"
                                    id="books">
                                <input type="image" src="img/Options/levels/book3.png" name="img" value="book3"
                                    id="books">
                                <input type="image" src="img/Options/levels/book4.png" name="img" value="book4"
                                    id="books">
                                <input type="image" src="img/Options/levels/book5.png" name="img" value="book5"
                                    id="books">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <ul class="list-inline pull-right">
                                    <li><button type="button" class="prev-step"><b>Anterior</b></button>
                                    </li>
                                    <li><button type="button" class="next-step"><b>Siguiente</b></button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane" role="tabpanel" id="step4">
                        <div class="form-row">
                            <div class="col-md-12">
                                <input type="date" name="date" placeholder="Ingrese el dia y la hora">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <ul class="list-inline pull-right">
                                    <li><button type="button" class="prev-step"><b>Anterior</b></button>
                                    </li>
                                    <li><button type="submit" name="btnSignUp"><b>Crear cuenta</b></button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </form>
            <div class="container-fluid">
                <img src="img/Backgrounds/banners/banner3.png" id="book">
            </div>
</body>

</html>