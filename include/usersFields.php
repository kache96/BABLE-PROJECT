<?php
error_reporting(0);
@ini_set('display_errors', 0);
    $users = new Users();
    if(isset($_POST['btnSignUp'])){
        $users->setNamec($_POST['namec']);
        $users->setLastname($_POST['lastname']);
        $users->setCode($_POST['code']);
        $users->setEmail($_POST['email']);
        $users->setUsername($_POST['username']);
        $users->setPass($_POST['pass']);
        $users->setVpass($_POST['vpass']);
        $users->setSquest1($_POST['squest1']);
        $users->setSanswer1($_POST['sanswer1']);
        $users->setSquest2($_POST['squest2']);
        $users->setSanswer2($_POST['sanswer2']);
        $users->signUp();
    }

 ?>