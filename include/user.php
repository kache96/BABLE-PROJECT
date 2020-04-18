<?php
include_once 'db.php';

class User extends DB{
    private $username;

    public function userExists($user, $pass){
        $md5pass = md5($pass);
        $query = $this->connect()->prepare('SELECT * FROM user WHERE username = :user AND pass = :pass');

        $query->execute(['user' => $user, 'pass' => $md5pass]);

        if($query->rowCount()){
            return true;
        }else{
            return false;
        }
    }
    
    public function setUser($user){
        $query = $this->connect()->prepare('SELECT * FROM user WHERE username = :user');
        $query->execute(['user' => $user]);

        foreach ($query as $currentUser){
            $this->username = $currentUser['username'];
        }
    }

    public function getUser(){
        return $this->username;
    }
}

?>