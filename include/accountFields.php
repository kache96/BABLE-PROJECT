<?php
    include_once 'users.php';

    $userAccount = new Users();
    if(isset($_POST['btnUpdateU'])){
        $userAccount->setNamec($_POST['namec']);
        $userAccount->setLastname($_POST['lastname']);
        $userAccount->setCode($_POST['code']);
        $userAccount->setEmail($_POST['email']);
        $userAccount->updateAccount();
    }
    if(isset($_POST['btnChangeP'])){
        $userAccount->setSanswer1($_POST['sanswer1']);
        $userAccount->setSanswer2($_POST['sanswer2']);
        $userAccount->setUserIdentity($_POST['userIdentity']);
        $userAccount->setPass($_POST['pass']);
        $userAccount->setVpass($_POST['vpass']);
        $userAccount->forgottenPass();
    }
 ?>