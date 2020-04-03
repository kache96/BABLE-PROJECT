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
 ?>