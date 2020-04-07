<?php
include_once 'db.php';
error_reporting(0);
@ini_set('display_errors', 0);
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
		private $userIdentity;
		private $oldPass;


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

		public function getUserIdentity(){
			return $this->userIdentity;
		}
	
		public function setUserIdentity($userIdentity){
			$this->userIdentity = $userIdentity;
		}

		public function getOldPass(){
			return $this->oldPass;
		}
	
		public function setOldPass($oldPass){
			$this->oldPass = $oldPass;
		}
		
		public function signUp(){
			if (empty($this->namec) || empty($this->lastname) || empty($this->code) || empty($this->email) || empty($this->username) || empty($this->pass) || empty($this->squest1) || empty($this->sanswer1) || empty($this->squest2) || empty($this->sanswer2)) 
			{
				?>
				<div id="alert"><p>¡Ups! Te falto uno o varios campos por llenar. <a href="" onclick="location.reload()"><b>Intentalo una vez mas.</b></a></p></div>
				<?php
				exit();
			}

			if(strlen($this->code) < 4)
			{
				?>
				<div id="alert"><p>¡Ups! El codigo debe contener minimo 4 caracteres. <a href="" onclick="location.reload()"><b>Intentalo de nuevo.</b></a></p></div>
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

			$query = $this->connect()->prepare("SELECT * FROM user WHERE code = '$this->code'");
			$query->execute();
			if($query->rowCount())
			{
				?>
				<div id="alert"><p>¡Vaya! Tenemos la sospecha de que ya tienes una cuenta con nosotros. El codigo que haz ingresado se encuentra en uso. <a href="" onclick="location.reload()"><b>Intenta con uno diferente.</b></a></p></div>
				<?php
				exit();
			}

			$query = $this->connect()->prepare("SELECT * FROM user WHERE email = '$this->email'");
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
			
			if(($this->pass == $this->namec) || ($this->pass == $this->lastname) || ($this->pass == $this->username))
			{
				?>
				<div id="alert"><p>¡Ups! Tu contraseña debe ser diferente a tu nombre, apellido y usuario. <a href="" onclick="location.reload()"><b>Ingresa una contraseña mas compleja.</b></a></p></div>
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
			$md5pass = md5($this->pass);
			$md5sanswer1 = md5($this->sanswer1);
			$md5sanswer2 = md5($this->sanswer2);

			$query = $this->connect()->prepare('INSERT INTO user(
				namec, 
				lastname, 
				code, 
				email, 
				username, 
				pass, 
				squest1, 
				sanswer1, 
				squest2, 
				sanswer2, 
				signup_date, 
				accountUpdated
				) VALUES (
				:namec, 
				:lastname, 
				:code, 
				:email, 
				:username, 
				:pass, 
				:squest1, 
				:sanswer1, 
				:squest2, 
				:sanswer2, 
				now(), 
				now())');

			$query->execute([
				'namec' => $this->namec, 
				'lastname' => $this->lastname,
				'code' => $this->code,
				'email' => $this->email, 
				'username' => $this->username, 
				'pass' => $md5pass, 
				'squest1' => $this->squest1, 
				'sanswer1' => $md5sanswer1, 
				'squest2' => $this->squest2, 
				'sanswer2' => $md5sanswer2]);

			if($query = true){
				echo'<script type="text/javascript"> alert("¡YEI! Tu registro a sido exitoso. Ahora haces parte de la familia BABLE y puedes inciar sesion."); 
				window.location.href="index.php";
				</script>';
			}else{
				echo'<script type="text/javascript"> alert("¡OH NO! Lamentamos la molestia, pero ah ocurrido un error al momento del registro. Por favor, intentalo de nuevo."); window.location.href="signUp.php";
				</script>';
			}
		}
		public function updateAccount(){
			if(strlen($this->code) < 4)
			{
				?>
				<div id="alert"><p>¡Ups! El codigo debe contener minimo 4 caracteres. <a href="" onclick="location.reload()"><b>Intentalo de nuevo.</b></a></p></div>
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
            
            $userSession = new UserSession();
            $user = new User();
            
            if(isset($_SESSION['user'])){
                $user->setUser($userSession->getCurrentUser());
            }
            
			$currentUser = $user->getUser();
			
			$query2 = $this->connect()->prepare("UPDATE user SET
					namec = :namec, 
                    lastname = :lastname, 
                    code = :code, 
                    email = :email,
					accountUpdated = now()
                    WHERE username = :username");
            
            $query2->execute([
                    'namec' => $this->namec, 
                    'lastname' => $this->lastname, 
                    'code' => $this->code,
                    'email' => $this->email, 
                    'username' => $currentUser
            ]);
                        
            if($query2 = true){
                echo'<script type="text/javascript"> alert("¡Perfecto! Haz modificado los datos de tu cuenta con exito."); </script>';
            }else{
                echo'<script type="text/javascript"> alert("¡OH NO! Ocurrio un error al momento de modificar tu cuenta. Intentalo de nuevo"); </script>';
            }
		}
		public function forgottenPass(){
			if (empty($this->pass) || empty($this->vpass) || empty($this->userIdentity) || empty($this->sanswer1) || empty($this->sanswer2)) 
			{
				echo'<script type="text/javascript"> alert("¡Ups! Te falto 1 o varios campos por llenar. Intentalo de nuevo."); window.location.href="forgottenPass.php";</script>';
				exit();
			}
			
			if(strlen($this->pass) < 8)
			{
				echo'<script type="text/javascript"> alert("¡Ups!La contraseña debe contener minimo 8 caracteres. Ingresa una contraseña mas compleja.");  window.location.href="forgottenPass.php"; </script>';
				exit();
			}
			
			if(strlen($this->pass) > 32)
			{
				echo'<script type="text/javascript"> alert("¡Ups! La contraseña debe contener maximo 32 caracteres. Ingresa una contraseña mas compleja.");  window.location.href="forgottenPass.php"; </script>';
				exit();
			}
			
			if(!preg_match("/\d/", $this->pass))
			{
				echo'<script type="text/javascript"> alert("¡Ups! La contraseña debe tener al menos 1 caracter numerico. Ingresa una contraseña mas compleja.");  window.location.href="forgottenPass.php"; </script>';
				exit();
			}
			
			if(!preg_match("/[A-Z]/", $this->pass))
			{
				echo'<script type="text/javascript"> alert("¡Ups! La contraseña debe tener al menos 1 letra en mayuscula. Ingresa una contraseña mas compleja.");  window.location.href="forgottenPass.php"; </script>';
				exit();
			}
			if($this->pass != $this->vpass)
			{
				echo'<script type="text/javascript"> alert("¡Ups! ¿Algun caracter omitido? Recuerda que las contraseñas deben ser iguales. Intentalo de nuevo.");  window.location.href="forgottenPass.php";</script>';
				exit();
			}

			$md5sanswer1 = md5($this->sanswer1);
			$md5sanswer2 = md5($this->sanswer2);

                        
			$query = $this->connect()->prepare("SELECT * FROM user WHERE username = '$this->userIdentity' AND sanswer1 = :sanswer1 AND sanswer2 = :sanswer2");
                        
            $query->execute(['sanswer1' => $md5sanswer1, 'sanswer2' => $md5sanswer2]);
                                                
			if($query->rowCount()){
				$md5pass = md5($this->pass);

				$query4 = $this->connect()->prepare("UPDATE user SET
					pass = :pass,
					accountUpdated = now()
					WHERE username = '$this->userIdentity'");
				
				$query4->execute([
					'pass' => $md5pass
				]);
							
				if($query4 = true){
					echo'<script type="text/javascript"> alert("¡Perfecto! Haz modificado tu contraseña con exito.");  window.location.href="index.php";</script>';
				}else{
					echo'<script type="text/javascript"> alert("¡OH NO! Ocurrio un error al momento de modificar tu contraseña. Intentalo de nuevo");  window.location.href="forgottenPass.php"; </script>';
					exit();
				}
			}else{
                echo'<script type="text/javascript"> alert("¡OH NO! Las respuestas que has escrito son incorrectas. Intentelo de nuevo.");  window.location.href="forgottenPass.php"; </script>';
				exit();
			}

		}
		public function changePass(){
            if (empty($this->pass) || empty($this->vpass) || empty($this->oldPass)) 
			{
				?>
				<div id="alert"><p>¡Ups! Te falto 1 o varios campos por llenar. <a href="" onclick="location.reload()"><b>Intentalo de nuevo.</b></a></p></div>
				<?php
				exit();
			}
			$userSession = new UserSession();
            $user = new User();
            
            if(isset($_SESSION['user'])){
                $user->setUser($userSession->getCurrentUser());
            }
            
			$currentUser = $user->getUser();
			$md5oldPass = md5($this->oldPass);

			$query = $this->connect()->prepare("SELECT pass FROM user WHERE username = :username AND pass = :oldPass");
			$query->execute([
				'username' => $currentUser,
				'oldPass' => $md5oldPass]);
			if($query->rowCount())
			{
				
			}else{
				?>
				<div id="alert"><p>¡Vaya! La contraseña ingresada es incorrecta <a href="" onclick="location.reload()"><b>Intentelo una vez mas.</b></a></p></div>
				<?php
				exit();
			}
			if($query = $this->pass)
			{
				?>
				<div id="alert"><p>UPS! La contraseña nueva no puede ser igual a la actual. <a href="" onclick="location.reload()"><b>Intentelo una vez mas.</b></a></p></div>
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
				<div id="alert"><p>¡Ups! La contraseña debe contener al menos 1 caracter numerico. <a href="" onclick="location.reload()"><b>Ingresa una contraseña mas compleja.</b></a></p></div>
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
			if($this->pass != $this->vpass)
			{
				?>
				<div id="alert"><p>¡Ups! ¿Algun caracter omitido? Recuerda que las contraseñas deben ser iguales. <a href="" onclick="location.reload()"><b>Intentalo de nuevo.</b></a></p></div>
				<?php
				exit();
			}
            $userSession = new UserSession();
            $user = new User();
            
            if(isset($_SESSION['user'])){
                $user->setUser($userSession->getCurrentUser());
            }
            
			$currentUser = $user->getUser();
			$md5pass = md5($this->pass);

			$query2 = $this->connect()->prepare("UPDATE user SET
					pass = :pass,
					accountUpdated = now()
                    WHERE username = :username");
            
            $query2->execute([
                    'pass' => $md5pass, 
                    'username' => $currentUser
            ]);
                        
            if($query2 = true){
                echo'<script type="text/javascript"> alert("¡Perfecto! Haz modificado los datos de tu cuenta con exito."); window.location.href="index.php";</script>';
            }else{
                echo'<script type="text/javascript"> alert("¡OH NO! Ocurrio un error al momento de modificar tu cuenta. Intentalo de nuevo"); window.location.href="index.php"; </script>';
            }
		}
	}
	
?>