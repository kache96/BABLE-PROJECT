<?php

include_once 'include/user.php';
include_once 'include/userSession.php';

$userSession = new UserSession();
$user = new User();

if(isset($_SESSION['user'])){
    $user->setUser($userSession->getCurrentUser());

    include_once 'branch.php';
}else if(isset($_POST['username']) && isset($_POST['pass'])){
    $userSignIn = $_POST['username'];
    $passSignIn = $_POST['pass'];

    if($user->userExists($userSignIn,$passSignIn)){
        $userSession->setCurrentUser($userSignIn);
        $user->setUser($userSignIn);
        include_once 'home.php';
    }else{
        echo'<script type="text/javascript"> alert("¡OH NO! La contraseña o usuario que has ingresado no es correcta. Intentalo de nuevo"); window.location.href="index.php" </script>';
    }
}else{
    include_once 'signIn.php';
}
?>