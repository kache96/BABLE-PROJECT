<?php
include_once 'db.php';

	class Users extends DB{
		private $namec;
		private $lastname;
		private $code;
		private $email;

		public function getNamec(){
			return $this->namec;
		}
	
		public function setNamec($namec){
			$this->namec = $namec;
		}
	
		public function getLastname(){
			return $this->lastname;
		}
	
		public function setLastname($lastname){
			$this->lastname = $lastname;
		}
	
		public function getCode(){
			return $this->code;
		}
	
		public function setCode($code){
			$this->code = $code;
		}
	
		public function getEmail(){
			return $this->email;
		}
	
		public function setEmail($email){
			$this->email = $email;
		}

		public function signUp(){
			$query = $this->connect()->prepare('INSERT INTO client(namec, lastname, code, email) VALUES (:namec, :lastname, :code, :email)');
			$query->execute(['namec' => $this->namec, 'lastname' => $this->lastname,'code' => $this->code,'email' => $this->email]);
		}
	}
	//$insert1 = connect()->query("INSERT INTO `client`(`namec`, `lastname`, `code`, `email`) VALUES ('$name','$lastname','$code','$email')");

	//$insert2 = $connection->query("INSERT INTO `user` (`username`, `pass`, `signup_date`, `idClient`, `idUserq`) VALUES ('$username',md5('$pass'),now()),'$code','$code'");

	//$insert3 = $connection->query("INSERT INTO `userquest`(`squest1`, `sanswer1`, `squest2`, `sanswer2`) VALUES ('$squest1',md5('$sanswer1'),'$squest2',md5('$sanswer2'))");


	//if ($insert3 == 1 && $insert2 == 1 ){
		//$insert1;
?>