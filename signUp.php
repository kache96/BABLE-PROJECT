<?php
include_once 'include/users.php';
?>
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
    <link rel="stylesheet" type="text/css" href="css/signUp.css">
    <script type="text/javascript" src="js/backChange.js"></script>
    <script type="text/javascript" src="js/wizard.js"></script>

    <title>Bable | Crear cuenta</title>
</head>

<body>
    <div class="container-fluid">
        <div class="container-fluid" id="header">
            <div class="row">
                <div class="col-md-2">
                    <div id="logo">
                        <img src="">
                    </div>
                </div>
                <div class="col-md-10" id="reg">
                    <a href="signIn.php" role="button" id="login"><b>Iniciar sesion</b></a>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div id="title"></div>
            <div id="titlep">
                <p><b>| CREAR CUENTA |</b></p>
            </div>
        </div>
        <div class="container-fluid" id="content">
            <div class="wizard">
                <div class="wizard-inner">
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active">
                            <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Primer paso">
                                <span>
                                    <i class="material-icons">
                                        person
                                    </i>
                                </span>
                            </a>
                        </li>
                        <li role="presentation" class="disabled">
                            <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Segundo paso">
                                <span>
                                    <i class="material-icons">
                                        person_add
                                    </i>
                                </span>
                            </a>
                        </li>
                        <li role="presentation" class="disabled">
                            <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="Tercer paso">
                                <span>
                                    <i class="material-icons">
                                        how_to_reg
                                    </i>
                                </span>
                            </a>
                        </li>
                        <li role="presentation" class="disabled">
                            <a href="#step4" data-toggle="tab" aria-controls="step4" role="tab" title="Cuarto paso">
                                <span>
                                    <i class="material-icons"> assignment_ind

                                    </i>
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <form action="" method="post">
                <?php include_once 'include/usersFields.php';?>
                <div class="tab-content">
                    <div class="tab-pane active" role="tabpanel" id="step1">

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <input type="text" name="namec" placeholder="Nombres">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" name="lastname" placeholder="Apellidos">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <input type="text" name="code" placeholder="Codigo">
                                <small id="info">El codigo debe contener minimo 4 caracteres y maximo 15.</small>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="email" name="email" placeholder="Correo electrónico">
                                <small id="info">Por favor, escriba una direccion de correo electronico real.</small>
                            </div>
                        </div>
                        <ul class="list-inline pull-right">
                            <li><button type="button" class="next-step "><b>Siguiente</b></button>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-pane" role="tabpanel" id="step2">
                        <div class="form-group col-md-12">
                            <small id="info">El nombre de usuario debe contener minimo 4 caracteres y maximo 64. Ademas,
                                debe ser diferente al nombre, apellido y correo electronico.</small>
                            <input type="text" name="username" id="nameUser" placeholder="Nombre de usuario">
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <input type="password" name="pass" placeholder="Contraseña">
                                <small id="info">La contraseña debe tener al menos 8 caracteres, 1 caracter numerico y 1
                                    mayuscula. Ademas, debe ser diferente al nombre, apellido y correo
                                    electronico.</small>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="password" name="vpass" placeholder="Repetir contraseña">
                                <small id="info">Las contraseñas deben ser iguales.</small>
                            </div>
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
                            <div class="form-group col-md-12" id="questinfo">
                                <h4><b>Preguntas de seguridad</b></h4>
                                <p>Selecciona dos preguntas de seguridad y escribe su respuesta correspondiente. Estas
                                    preguntas nos ayudaran a verificar tu identidad en caso de que olvides tu
                                    contraseña.
                                    <br>
                                    <small>Por favor, escribe una respuesta que puedas recordar con facilidad y ten
                                        presente que las preguntas que selecciones deberan ser diferentes.</small>
                                </p>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <select name="squest1">
                                    <option selected id="selected">1. Seleccione la pregunta</option>
                                    <option value="quest1">¿En que ciudad se conocieron tus padres?</option>
                                    <option value="quest2">¿Cual seria tu trabajo ideal?</ption>
                                    <option value="quest3">¿Cual era el nombre de pila de tu mejor amigo?
                                    </option>
                                    <option value="quest4">¿Cual es tu lugar favorito?</option>
                                    <option value="quest5">¿Cual era la marca de tu primer celular?</option>
                                    <option value="quest6">¿Como se llamaba tu primera mascota?</option>
                                    <option value="quest7">¿Cual era la raza de tu primera mascota?</option>
                                    <option value="quest8">¿Que fue lo primero que aprendiste a cocinar?
                                    </option>
                                    <option value="quest9">¿Cual era tu cantante o grupo preferido en el instituto?
                                    </option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <select name="squest2">
                                    <option selected>2. Seleccione la pregunta</option>
                                    <option value="quest1">¿En que ciudad se conocieron tus padres?</option>
                                    <option value="quest2">¿Cual seria tu trabajo ideal?</ption>
                                    <option value="quest3">¿Cual era el nombre de pila de tu mejor amigo?
                                    </option>
                                    <option value="quest4">¿Cual es tu lugar favorito?</option>
                                    <option value="quest5">¿Cual era la marca de tu primer celular?</option>
                                    <option value="quest6">¿Como se llamaba tu primera mascota?</option>
                                    <option value="quest7">¿Cual era la raza de tu primera mascota?</option>
                                    <option value="quest8">¿Que fue lo primero que aprendiste a cocinar?
                                    </option>
                                    <option value="quest9">¿Cual era tu cantante o grupo preferido en el instituto?
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <input type="text" placeholder="1. Escribe tu respuesta" name="sanswer1">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" placeholder="2. Escribe tu respuesta" name="sanswer2" id="ranswer">
                            </div>
                            <br>
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
                            <div class="col-md-12" id="info">
                                <p><b>¡PARECE QUE TODO VA BIEN!</b>
                                    <br>
                                    Por ultimo, por favor haz click en el boton "crear cuenta" para finalizar tu proceso
                                    de registro en Bable.
                                    <br>
                                    Recuerda que para iniciar sesion, utilizaras el nombre de usuario que anteriormente
                                    elegiste y la contraseña.
                                    <br><br>
                                    Esperamos que Bable sea de tu agrado, muchas gracias por elegirnos.
                                </p>
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
                    </div>
                </div>
                <div class="clearfix"></div>
        </div>
        </form>
    </div>
    <div class="container-fluid" id="header">
        <div class="pull-right" id="info">
            <p>Fotografia por <a href="https://www.instagram.com/banksy/"><b>@Banksy</b></a></p>
        </div>
    </div>
    </div>

</body>

</html>