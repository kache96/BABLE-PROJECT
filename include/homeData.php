<?php
error_reporting(0);
@ini_set('display_errors', 0);
include_once 'db.php';

    class Home extends DB{
        private $langlevel;
        private $typeExam;
        private $units;
        private $note;

        private $nameC;
        private $emailC;
        private $messageC;
        
        public function getNameC(){
            return $this->nameC;
        }
    
        public function setNameC($nameC){
            $this->nameC = $nameC;
        }
        
        public function getEmailC(){
            return $this->emailC;
        }
    
        public function setEmailC($emailC){
            $this->emailC = $emailC;
        }
        
        public function getMessageC(){
            return $this->messageC;
        }
    
        public function setMessageC($messageC){
            $this->messageC = $messageC;
        }

        public function getLanglevel(){
            return $this->langlevel;
        }
    
        public function setLanglevel($langlevel){
            $this->langlevel = $langlevel;
        }
        
        public function getTypeExam(){
            return $this->typeExam;
        }
    
        public function setTypeExam($typeExam){
            $this->typeExam = $typeExam;
        }

        public function getUnits(){
            return $this->units;
        }
    
        public function setUnits($units){
            $this->units = $units;
        }

        public function getNote(){
            return $this->note;
        }
    
        public function setNote($note){
            $this->note = $note;
        }

        public function notes(){
            if ($this->typeExam == "unspecified" || empty($this->langlevel) || empty($this->units) || empty($this->note))
			{
				echo'<script type="text/javascript"> alert("¡Ups! Te falto uno o varios campos por llenar. Intentalo de nuevo."); window.location.href="index.php";</script>';
				exit();
            }
            $userSession = new UserSession();
            $user = new User();
            
            if(isset($_SESSION['user'])){
                $user->setUser($userSession->getCurrentUser());
            }
            
            $currentUser = $user->getUser();
            
            $query = $this->connect()->prepare('INSERT INTO usernotes(
				username,
                typeExam, 
				langlevel, 
				units, 
				note,
				recordDate
				) VALUES (
                :username,
                :typeExam, 
				:langlevel, 
				:units, 
				:note,
				now())');

			$query->execute([
				'username' => $currentUser, 
				'typeExam' => $this->typeExam,
				'langlevel' => $this->langlevel,
				'units' => $this->units, 
				'note' => $this->note]);

			if($query = true){
				echo'<script type="text/javascript"> alert("¡En hora buena! Tu nota a sido ingresada al sistema. Ahora puedes visualizarla en tu record de notas."); window.location.href="index.php"; </script>';
				exit();
			}else{
				echo'<script type="text/javascript"> alert("OH NO! Hubo un error al ingresar tu nota en el sistema. Intentalo una vez mas."); window.location.href="index.php"; </script>';
				exit();
			}
        }

        public function contact(){
            if (empty($this->nameC) || empty($this->emailC) || empty($this->messageC))
			{
				echo'<script type="text/javascript"> alert("¡UPS! Te falto 1 o todos los campos por llenar. Intentalo de nuevo."); window.location.href="index.php"; </script>';
				exit();
            }

            $query = $this->connect()->prepare('INSERT INTO contact(
				nameC,
                emailC, 
				messageC,
                contactDate
				) VALUES (
                :nameC,
                :emailC, 
				:messageC, 
				now())');

			$query->execute([
				'nameC' => $this->nameC, 
				'emailC' => $this->emailC,
                'messageC' => $this->messageC
                ]);

			if($query = true){
				echo'<script type="text/javascript"> alert("¡En hora buena! El mensaje a sido enviado con exito."); window.location.href="index.php"; </script>';
			}else{
				echo'<script type="text/javascript"> alert("¡OH NO! A ocurrido un error al enviar el mensaje. Intentalo de nuevo."); window.location.href="index.php"; </script>';
				exit();
			}
        }
    }
?>