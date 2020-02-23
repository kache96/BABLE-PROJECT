<?php

include_once 'include/user.php';
include_once 'include/userSession.php';

$userSession = new UserSession();
$user = new User();

if(isset($_SESSION['user'])){
    echo"Hay sesion";
    $user->setUser($userSession->getCurrentUser());

    include_once 'home.php';
}else if(isset($_POST['username']) && isset($_POST['pass'])){
    echo "Validacion de login";

    $userSignIn = $_POST['username'];
    $passSignIn = $_POST['pass'];

    if($user->userExists($userSignIn,$passSignIn)){
        echo "Usuario validado";
        $userSession->setCurrentUser($userSignIn);
        $user->setUser($userSignIn);

        include_once 'home.php';
    }else{
        echo "nombre de usuario y contraseña incorrecta";
        $errorSignIn = "¡Ups! El nombre de usuario o contraseña es incorrecto. Intenta con un nombre de usuario o contraseña diferente.";
        include_once 'signIn.php';
    }
}else{
    echo "Login";
    include_once 'signIn.php';
}
?>