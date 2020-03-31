<?php
include_once 'db.php';

    class Events extends DB{
        private $event_id;
        private $langLvl;
        private $bookType;
        private $bookSubtype;
        private $numberClass;
        private $numberUnit;
        private $bookDate;
        private $bookTime;
        private $studentName;


        public function getEvent_id(){
            return $this->event_id;
        }
    
        public function setEvent_id($event_id){
            $this->event_id = $event_id;
        }

        public function getlangLvl(){
            return $this->langLvl;
        }
    
        public function setlangLvl($langLvl){
            $this->langLvl = $langLvl;
        }

        public function getBookType(){
            return $this->bookType;
        }
    
        public function setBookType($bookType){
            $this->bookType = $bookType;
        }
    
        public function getBookSubtype(){
            return $this->bookSubtype;
        }
    
        public function setBookSubtype($bookSubtype){
            $this->bookSubtype = $bookSubtype;
        }
    
        public function getNumberClass(){
            return $this->numberClass;
        }
    
        public function setNumberClass($numberClass){
            $this->numberClass = $numberClass;
        }
    
        public function getNumberUnit(){
            return $this->numberUnit;
        }
    
        public function setNumberUnit($numberUnit){
            $this->numberUnit = $numberUnit;
        }
    
        public function getBookDate(){
            return $this->bookDate;
        }
    
        public function setBookDate($bookDate){
            $this->bookDate = $bookDate;
        }
    
        public function getBookTime(){
            return $this->bookTime;
        }
    
        public function setBookTime($bookTime){
            $this->bookTime = $bookTime;
        }

        public function getStudentName(){
            return $this->studentName;
        }
    
        public function setStudentName($studentName){
            $this->studentName = $studentName;
        }

        public function createEvent(){
            // INPUTS EMPTY (Y)
			if ($this->bookType == "unspecified" || $this->bookSubtype == "unspecified" || empty($this->bookDate) || empty($this->bookTime))
			{
				?>
				<div id="alert"><p>¡Ups! Te falto uno o varios campos por llenar. <a href="" onclick="location.reload()"><b>Intentalo una vez mas.</b></a></p></div>
				<?php
				exit();
            }

            date_default_timezone_set("America/Bogota");

            $dateS = $this->bookDate;
            $dateT = str_replace(' ', '', $dateS);

            $translate = file_get_contents('https://translate.googleapis.com/translate_a/single?client=gtx&sl=es&tl=en&dt=t&q='.($dateT).'');
            $translate = explode('"',$translate,3);

            $date = strtotime($translate[1]);

            $passed = ceil(($date-time())/60/60/24);

            $intday = strtotime($translate[1]);
            $fday = date("yy-m-d" , $intday);
            $thish = $fday . " " . $this->bookTime;
            $current = date("yy-m-d h:i");

            $currentH = new DateTime($current);//fecha inicial
            $hourI = new DateTime($thish);//fecha de cierre
            $hmTime = $currentH->diff($hourI);
            $numberH = $hmTime->format('%Y %M %D %H %i');

            // CAN'T BOOK YESTERDAY AND AFTER 8 DAYS (Y)
            
            if( $passed <= -1 || $passed > 8){
                ?>
				<div id="alert"><p>¡Ups! Recuerda que no puedes reservar para ayer ni para dentro de 9 dias. <a href="" onclick="location.reload()"><b>Reserva en otro dia.</b></a></p></div>
                <?php
                exit();

            }
            
            // CAN'T BOOK LESS THAN THREE HOURS (Y)
            if($numberH <= '00 00 00 03 00'){
                ?>
				<div id="alert"><p>¡Ups! Recuerda que debes reservar 3 horas antes. <a href="" onclick="location.reload()"><b>Reserva en otro dia.</b></a></p></div>
				<?php
				exit();
            }
            $day = $this->bookDate;
            $time = $this->bookTime;

            // CAN'T BOOK ON SUNDAYS (Y)
            if (strpos($day, 'domingo') !== false) {
                ?>
				<div id="alert"><p>¡Ups! Recuerda que los domingo no hay clases. <a href="" onclick="location.reload()"><b>Reserva en otro dia.</b></a></p></div>
				<?php
				exit();
            }

            if (strpos($day, 'sábado') !== false){
                // CAN'T BOOK BEFORE 6:30 ON SATURDAYS (Y)
                if ($time < "06:30") {
                    ?>
                    <div id="alert"><p>¡Ups! Recuerda que los sabados las clases inician a las 6:30am. <a href="" onclick="location.reload()"><b>Reserva en otra hora.</b></a></p></div>
                    <?php
                    exit();
                }
                // CAN'T BOOK AFTER 15:00 ON SATURDAYS (Y)
                if ($time > "15:00") {
                    ?>
                    <div id="alert"><p>¡Ups! Recuerda que los sabados las clases finalizan a las 15:00pm. <a href="" onclick="location.reload()"><b>Reserva en otra hora.</b></a></p></div>
                    <?php
                    exit();
                }
            }
            // CAN'T BOOK BEFORE 6:00 ON WEEK (Y)
            if ($time < "06:00") {
                ?>
				<div id="alert"><p>¡Ups! Recuerda que las clases inician a las 6:00am. <a href="" onclick="location.reload()"><b>Reserva en otra hora.</b></a></p></div>
				<?php
				exit();
            }
                        // CAN'T BOOK AFTER 19:30 ON WEEK (Y)

            if ($time > "19:30") {
                ?>
				<div id="alert"><p>¡Ups! Recuerda que las clases finalizan a las 19:30pm. <a href="" onclick="location.reload()"><b>Reserva en otra hora.</b></a></p></div>
				<?php
				exit();
            }
            include_once '../include/user.php';
            include_once '../include/userSession.php';

            $userSession = new UserSession();
            $user = new User();

            if(isset($_SESSION['user'])){
                $user->setUser($userSession->getCurrentUser());
            }

            $title = $user->getUser();

            if($this->bookType)
            $querry = $this->connect()->prepare('SELECT * FROM calendarevent WHERE title = :title AND bookType = :bookType AND bookSubtype = :bookSubtype AND numberClass = :numberClass AND numberUnit = :numberUnit');
            $querry->execute([
                    'title' => $title,
                    'bookType' => $this->bookType,
                    'bookSubtype' => $this->bookSubtype,
                    'numberClass' => $this->numberClass,
                    'numberUnit' => $this->numberUnit,
                    ]);
            
                    $showQ = $querry->fetchAll(PDO::FETCH_ASSOC);
                
            if($showQ){
                ?>
				<div id="alert"><p>¡Ups! Ya haz reservado esta clase anteriormente. <a href="" onclick="location.reload()"><b>Ahora ya no tienes posibilidad de hacerlo.</b></a></p></div>
				<?php        
            }else{

                include_once '../include/user.php';
            include_once '../include/userSession.php';

            $userSession = new UserSession();
            $user = new User();

            if(isset($_SESSION['user'])){
                $user->setUser($userSession->getCurrentUser());
            }

            $title = $user->getUser();
                $query0 = $this->connect()->prepare("INSERT INTO calendarevent(event_id, title, langLvl, bookType, bookSubtype, numberClass, numberUnit, start, bookTime, textColor, color, dateEvent) VALUES (:event_id, :title, :langLvl, :bookType, :bookSubtype, :numberClass, :numberUnit, :start, :bookTime, :textColor, :color, now())");
                $query0->execute([
                'event_id' => '', 
                'title' => $title,
                'langLvl' => $this->langLvl, 

                'bookType' => $this->bookType, 
                'bookSubtype' => $this->bookSubtype,
                'numberClass' => $this->numberClass, 
                'numberUnit' => $this->numberUnit,

                'start' => $this->bookDate . " " . $this->bookTime,
                'bookTime' => $this->bookTime,

                'textColor' => '#FFFFFF', 
                'color' => '#9b0000'
                ]);

                if($query0 = true){
                    echo'<script type="text/javascript">
                        alert("Tarea Guardada");
                        </script>';
                }else{
                    echo '<script type="text/javascript">
                    alert("No se pudo insertar");
                    </script>';
                }
            }  
        }
        
        public function updateEvent(){
            date_default_timezone_set("America/Bogota");

            $dateS = $this->bookDate;
            $dateT = str_replace(' ', '', $dateS);

            $translate = file_get_contents('https://translate.googleapis.com/translate_a/single?client=gtx&sl=es&tl=en&dt=t&q='.($dateT).'');
            $translate = explode('"',$translate,3);

            $date = strtotime($translate[1]);

            $passed = ceil(($date-time())/60/60/24);

            $intday = strtotime($translate[1]);
            $fday = date("yy-m-d" , $intday);
            $thish = $fday . " " . $this->bookTime;
            $current = date("yy-m-d h:i");

            $currentH = new DateTime($current);//fecha inicial
            $hourI = new DateTime($thish);//fecha de cierre
            $hmTime = $currentH->diff($hourI);
            $numberH = $hmTime->format('%Y %M %D %H %i');
            
            if($numberH <= '00 00 00 01 30'){
                ?>
				<div id="alert"><p>¡Ups! Recuerda que debiste modificar tu clase hace 1:30. <a href="" onclick="location.reload()"><b>Ahora ya no tienes posibilidad de hacerlo.</b></a></p></div>
				<?php
				exit();
            }

            include_once '../include/user.php';
            include_once '../include/userSession.php';

            $userSession = new UserSession();
            $user = new User();

            if(isset($_SESSION['user'])){
                $user->setUser($userSession->getCurrentUser());
            }

            $title = $user->getUser();

            if($this->studentName !== $title){
                ?>
				<div id="alert"><p>¡Ups! No eres el dueño de este evento. <a href="" onclick="location.reload()"><b>Ahora ya no tienes posibilidad de hacerlo.</b></a></p></div>
				<?php
				exit();
            }

            $query1 = $this->connect()->prepare("UPDATE calendarevent SET
            bookType = :bookType, 
            bookSubtype = :bookSubtype, 
            numberClass = :numberClass, 
            numberUnit = :numberUnit, 
            start = :start, 
            bookTime = :bookTime
            WHERE event_id = :event_id");

            $query1->execute([
                'event_id' => $this->event_id, 
                
                'bookType' => $this->bookType, 
                'bookSubtype' => $this->bookSubtype,
                'numberClass' => $this->numberClass, 
                'numberUnit' => $this->numberUnit,

                'start' => $this->bookDate . " " . $this->bookTime,
                'bookTime' => $this->bookTime
                ]);
            
                if($query1 = true){
                    echo'<script type="text/javascript">
                        alert("Tarea actu");
                        </script>';
                }else{
                    echo '<script type="text/javascript">
                    alert("No se pudo insertar");
                    </script>';
                }
        }
        public function deleteEvent(){
            date_default_timezone_set("America/Bogota");

            $dateS = $this->bookDate;
            $dateT = str_replace(' ', '', $dateS);

            $translate = file_get_contents('https://translate.googleapis.com/translate_a/single?client=gtx&sl=es&tl=en&dt=t&q='.($dateT).'');
            $translate = explode('"',$translate,3);

            $date = strtotime($translate[1]);

            $passed = ceil(($date-time())/60/60/24);

            $intday = strtotime($translate[1]);
            $fday = date("yy-m-d" , $intday);
            $thish = $fday . " " . $this->bookTime;
            $current = date("yy-m-d h:i");

            $currentH = new DateTime($current);//fecha inicial
            $hourI = new DateTime($thish);//fecha de cierre
            $hmTime = $currentH->diff($hourI);
            $numberH = $hmTime->format('%Y %M %D %H %i');
            
            if($numberH <= '00 00 00 01 30'){
                ?>
				<div id="alert"><p>¡Ups! Recuerda que debiste cancelar tu clase hace 1:30. <a href="" onclick="location.reload()"><b>Ahora ya no tienes posibilidad de hacerlo.</b></a></p></div>
				<?php
				exit();
            }

            include_once '../include/user.php';
            include_once '../include/userSession.php';

            $userSession = new UserSession();
            $user = new User();

            if(isset($_SESSION['user'])){
                $user->setUser($userSession->getCurrentUser());
            }

            $title = $user->getUser();

            if($this->studentName !== $title){
                ?>
				<div id="alert"><p>¡Ups! No eres el dueño de este evento. <a href="" onclick="location.reload()"><b>Ahora ya no tienes posibilidad de hacerlo.</b></a></p></div>
				<?php
				exit();
            }
            
            
            $query2 = $this->connect()->prepare("DELETE FROM calendarevent WHERE event_id = :event_id");
            $query2->execute([
                'event_id' => $this->event_id
                ]);
                if($query2 = true){
                    echo'<script type="text/javascript">
                        alert("Tarea borra");
                        </script>';
                }else{
                    echo '<script type="text/javascript">
                    alert("No se pudo insertar");
                    </script>';
                }
        }
    }
?>