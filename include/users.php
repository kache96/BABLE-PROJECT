<?php
include_once 'db.php';

	class Users extends DB{
		
		private $namec;
		private $lastname;
		private $code;
		private $email;
		private $username;
		private $pass;
		private $vpass;
		private $squest1;
		private $sanswer1;
		private $squest2;
		private $sanswer2;

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
	
		public function getUsername(){
			return $this->username;
		}
	
		public function setUsername($username){
			$this->username = $username;
		}
	
		public function getPass(){
			return $this->pass;
		}
	
		public function setPass($pass){
			$this->pass = $pass;
		}

		public function getVpass(){
			return $this->vpass;
		}
	
		public function setVpass($vpass){
			$this->vpass = $vpass;
		}
	
		public function getSquest1(){
			return $this->squest1;
		}
	
		public function setSquest1($squest1){
			$this->squest1 = $squest1;
		}
	
		public function getSanswer1(){
			return $this->sanswer1;
		}
	
		public function setSanswer1($sanswer1){
			$this->sanswer1 = $sanswer1;
		}
	
		public function getSquest2(){
			return $this->squest2;
		}
	
		public function setSquest2($squest2){
			$this->squest2 = $squest2;
		}
	
		public function getSanswer2(){
			return $this->sanswer2;
		}
	
		public function setSanswer2($sanswer2){
			$this->sanswer2 = $sanswer2;
		}

		public function signUp(){
			if (empty($this->namec) || empty($this->lastname) || empty($this->code) || empty($this->email) || empty($this->username) || empty($this->pass) || empty($this->squest2) || empty($this->sanswer1) || empty($this->squest2) || empty($this->sanswer2)) 
			{
				?>
				<div id="alert"><p>¡Ups! Te falto uno o varios campos por llenar. <a href="" onclick="location.reload()"><b>Intentalo una vez mas.</b></a></p></div>
				<?php
				exit();
			}

			if(strlen($this->code) < 4)
			{
				?>
				<div id="alert"><p>¡Ups! El nombre de usuario debe contener minimo 4 caracteres. <a href="" onclick="location.reload()"><b>Intentalo de nuevo.</b></a></p></div>
				<?php
				exit();
			}
			else if(strlen($this->code) > 15)
			{
				?>
				<div id="alert"><p>¡Ups! El codigo debe contener maximo 15 caracteres. <a href="" onclick="location.reload()"><b>Intentalo de nuevo.</b></a></p></div>
				<?php 
				exit();
			}

			$query = $this->connect()->prepare("SELECT * FROM client WHERE code = '$this->code'");
			$query->execute();
			if($query->rowCount())
			{
				?>
				<div id="alert"><p>¡Vaya! Tenemos la sospecha de que ya tienes una cuenta con nosotros. El codigo que haz ingresado se encuentra en uso. <a href="" onclick="location.reload()"><b>Intenta con uno diferente.</b></a></p></div>
				<?php
				exit();
			}

			$query = $this->connect()->prepare("SELECT * FROM client WHERE email = '$this->email'");
			$query->execute();
			if($query->rowCount())
			{
				?>
				<div id="alert"><p>¡Vaya! Tenemos la sospecha de que ya tienes una cuenta con nosotros. La direccion de correo electronico que haz ingresado se encuentra en uso. <a href="" onclick="location.reload()"><b>Intenta con uno diferente.</b></a></p></div>
				<?php
				exit();
			}
			
			$query = $this->connect()->prepare("SELECT * FROM user WHERE username = '$this->username'");
			$query->execute();
			if($query->rowCount())
			{
				?>
				<div id="alert"><p>¡Oh no! Es una pena que el usuario que haz ingresado ya esté en uso. <a href="" onclick="location.reload()"><b>Intenta con uno diferente.</b></a></p></div>
				<?php
				exit();
			}

			if(($this->username == $this->namec) || ($this->username == $this->lastname) || ($this->username == $this->email))
			{
				?>
				<div id="alert"><p>¡Ups! El nombre de usuario debe ser diferente a tu nombre , apellido y correo electronico. <a href="" onclick="location.reload()"><b>Intentalo de nuevo.</b></a></p></div>
				<?php
				exit();
			}
			
			if(strlen($this->username) < 4)
			{
				?>
				<div id="alert"><p>¡Ups! El nombre de usuario debe contener minimo 4 caracteres. <a href="" onclick="location.reload()"><b>Intentalo de nuevo.</b></a></p></div>
				<?php
				exit();
			}
			else if(strlen($this->username) > 64)
			{
				?>
				<div id="alert"><p>¡Ups! El nombre de usuario debe contener maximo 64 caracteres. <a href="" onclick="location.reload()"><b>Intentalo de nuevo.</b></a></p></div>
				<?php 
				exit();
			}

			if(strlen($this->pass) < 8)
			{
				?>
				<div id="alert"><p>¡Ups! La contraseña debe contener minimo 8 caracteres. <a href="" onclick="location.reload()"><b>Ingresa una contraseña mas compleja.</b></a></p></div>
				<?php
				exit();
			}
			
			if(strlen($this->pass) > 32)
			{
				?>
				<div id="alert"><p>¡Ups! La contraseña debe contener maximo 32 caracteres. <a href="" onclick="location.reload()"><b>Ingresa una contraseña mas compleja.</b></a></p></div>
				<?php 
				exit();
			}
			
			if(!preg_match("/\d/", $this->pass))
			{
				?>
				<div id="alert"><p>¡Ups! La contraseña debe tener al menos 1 caracter numerico. <a href="" onclick="location.reload()"><b>Ingresa una contraseña mas compleja.</b></a></p></div>
				<?php
				exit();
			}
			
			if(!preg_match("/[A-Z]/", $this->pass))
			{
				?>
				<div id="alert"><p>¡Ups! La contraseña debe tener al menos 1 letra en mayuscula. <a href="" onclick="location.reload()"><b>Ingresa una contraseña mas compleja.</b></a></p></div>
				<?php
				exit();
			}
			
			if(($this->pass == $this->namec) || ($this->pass == $this->lastname) || ($this->pass == $this->username) || ($this->pass == $this->email))
			{
				?>
				<div id="alert"><p>¡Ups! Tu contraseña debe ser diferente a tu nombre, apellido, usuario y correo electronico. <a href="" onclick="location.reload()"><b>Ingresa una contraseña mas compleja.</b></a></p></div>
				<?php
				exit();
			}
			
			if($this->pass != $this->vpass)
			{
				?>
				<div id="alert"><p>¡Ups! ¿Algun caracter omitido? Recuerda que las contraseñas deben ser iguales.  <a href="" onclick="location.reload()"><b>Intentalo de nuevo.</b></p></div>
				<?php 
				exit();
			}
			
			if($this->squest1 == $this->squest2)
			{
				?>
				<div id="alert"><p>¡Ups! Las preguntas de seguridad deben ser diferentes.<a href="" onclick="location.reload()"><b>Intentalo una vez mas.</b></a></p></div>
				<?php 
				exit();
			}

			$query = $this->connect()->prepare('INSERT INTO client(namec, lastname, code, email) VALUES (:namec, :lastname, :code, :email)');
			$query->execute(['namec' => $this->namec, 'lastname' => $this->lastname,'code' => $this->code,'email' => $this->email]);

			$md5pass = md5($this->pass);
			$query = $this->connect()->prepare('INSERT INTO user(username, pass, signup_date) VALUES (:username, :pass, now())');
			$query->execute(['username' => $this->username, 'pass' => $md5pass]);

			$md5sanswer1 = md5($this->sanswer1);
			$md5sanswer2 = md5($this->sanswer2);

			$query = $this->connect()->prepare('INSERT INTO userquest(squest1, sanswer1, squest2, sanswer2) VALUES (:squest1, :sanswer1, :squest2, :sanswer2)');
			$query->execute(['squest1' => $this->squest1, 'sanswer1' => $md5sanswer1, 'squest2' => $this->squest2, 'sanswer2' => $md5sanswer2]);

			if($query = true){
				echo'<script type="text/javascript">
					alert("ESTAS ADENTRO");
					window.location.href="../index.php";
					</script>';
			}else{
				echo '<script type="text/javascript">
				alert("No se pudo insertar");
				</script>';
			}
		}
	}
?>