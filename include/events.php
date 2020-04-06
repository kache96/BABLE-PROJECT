<?php
error_reporting(0);
@ini_set('display_errors', 0);
include_once 'db.php';

    class Events extends DB{
        private $event_id;
        private $langLvl;
        private $branch;
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

        public function getBranch(){
            return $this->branch;
        }
    
        public function setBranch($branch){
            $this->branch = $branch;
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
				echo'<script type="text/javascript"> alert("¡UPS! Te falto 1 o varios campos por llenar. Intentalo de nuevo."); </script>';
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
            
            if( $passed <= -1 || $passed > 70){
                echo'<script type="text/javascript"> alert("¡UPS! Recuerda que en fechas pasadas no se reserva y que no puedes reservar con mas de 70 dias de anticipacion."); </script>';
                exit();

            }
            
            // CAN'T BOOK LESS THAN THREE HOURS (N) IT DOESNT HAVE 24 HOURS FORMAT
            if($numberH <= '00 00 00 03 00'){
                echo'<script type="text/javascript"> alert("¡UPS! Recuerda que debes reservar con minimo 3 horas de anticipacion."); </script>';
				exit();
            }
            
            $day = $this->bookDate;
            $time = $this->bookTime;

            // CAN'T BOOK ON SUNDAYS (Y)
            if (strpos($day, 'domingo') !== false) {
                echo'<script type="text/javascript"> alert("¡UPS! Recuerda que no estamos disponibles el dia domingo."); </script>';
				exit();
            }

            if (strpos($day, 'sábado') !== false){
                // CAN'T BOOK BEFORE 6:30 ON SATURDAYS (Y)
                if ($time < "06:30") {
                    echo'<script type="text/javascript"> alert("¡UPS! Recuerda que los sabados el horario de reserva inicia a las 06:30."); </script>';
                    exit();
                }
                // CAN'T BOOK AFTER 15:00 ON SATURDAYS (Y)
                if ($time > "15:00") {
                    echo'<script type="text/javascript"> alert("¡UPS! Recuerda que los sabados el horario de reserva finaliza a las 15:00."); </script>';
                    exit();
                }
            }
            // Las horas aceptadas los sabados seran 6:30 8:00 10:30 12:00 13:30 15:00 Las horas aceptadas en semana seran 6:00 7:30 9:0 10:30 12:00 13:30 15:00 16:30 18:00 19:30
            if($time == "06:00" || $time == "06:30" || $time == "07:30" || $time == "08:00" || $time == "09:00" || $time == "10:30" || $time == "12:00" || $time == "13:30" || $time == "15:00" || $time == "16:30" || $time == "18:00" || $time == "19:30"){

            }else{
                echo'<script type="text/javascript"> alert("¡UPS! La hora que has escogido no esta disponible. Por favor, revisa el horario que se encuentra en la descripcion del nivel."); </script>';
                exit();
            }
            // CAN'T BOOK BEFORE 6:00 ON WEEK (Y)

            if ($time < "06:00") {
                echo'<script type="text/javascript"> alert("¡UPS! Recuerda que el horario de reserva en semana inicia a las 06:00."); </script>';
				exit();
            }
            // CAN'T BOOK AFTER 19:30 ON WEEK (Y)

            if ($time > "19:30") {
                echo'<script type="text/javascript"> alert("¡UPS! Recuerda que el horario de reserva en semana finaliza a las 19:30."); </script>';
				exit();
            }
            $querry = $this->connect()->prepare('SELECT * FROM calendarevent WHERE langLvl = :langLvl AND branch = :branch AND start = :start AND bookType = :bookType');
            $querry->execute([
                'langLvl' => $this->langLvl, 
                'branch' => $this->branch,
                'start' => $this->bookDate . " " . $this->bookTime,
                'bookType' => $this->bookType
                    ]);

                    $numEvents = $querry->rowCount();
                    $showQr = $querry->fetchAll(PDO::FETCH_ASSOC);

                    if($numEvents >= 12){
                        echo'<script type="text/javascript"> alert("¡OH NO! Lamentamos informarte que el cupo esta lleno. Por favor, elige una hora o fecha diferente."); </script>';
                }else{
                    include_once '../include/user.php';
                    include_once '../include/userSession.php';
        
                    $userSession = new UserSession();
                    $user = new User();
        
                    if(isset($_SESSION['user'])){
                        $user->setUser($userSession->getCurrentUser());
                    }
        
                    $title = $user->getUser();
        
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
                        echo'<script type="text/javascript"> alert("¡UPS! Recuerda que solo puedes reservar clase/quiz/examen una sola vez. Si lo que deseas es reservar tutoria o repeticion, por favor selecciona -Tutoria- o -Repeticion- en el campo -Subtipo-.); </script>';      
                    }else{
        
                        include_once '../include/user.php';
                    include_once '../include/userSession.php';
        
                    $userSession = new UserSession();
                    $user = new User();
        
                    if(isset($_SESSION['user'])){
                        $user->setUser($userSession->getCurrentUser());
                    }
        
                    $title = $user->getUser();
                        $query0 = $this->connect()->prepare("INSERT INTO calendarevent(event_id, title, langLvl, branch, bookType, bookSubtype, numberClass, numberUnit, start, bookTime, textColor, color, dateEvent) VALUES (:event_id, :title, :langLvl, :branch, :bookType, :bookSubtype, :numberClass, :numberUnit, :start, :bookTime, :textColor, :color, now())");
                        $query0->execute([
                        'event_id' => '', 
                        'title' => $title,
                        'langLvl' => $this->langLvl, 
                        'branch' => $this->branch, 
        
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
                            echo'<script type="text/javascript"> alert("¡YEI! Haz reservado tu cupo con exito."); </script>';
                        }else{
                            echo'<script type="text/javascript"> alert("¡OH NO! Ocurrio un error al momento de reservar tu cupo. Intentalo de nuevo"); </script>';
                        }
                    }  
                }         
        }
        
        public function updateEvent(){
            // INPUTS EMPTY (Y)
			if ($this->bookType == "unspecified" || $this->bookSubtype == "unspecified" || empty($this->bookDate) || empty($this->bookTime))
			{
				echo'<script type="text/javascript"> alert("¡UPS! Te falto 1 o varios campos por llenar. Intentalo de nuevo."); </script>';
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
            if( $passed <= -1 || $passed > 70){
                echo'<script type="text/javascript"> alert("¡UPS! Recuerda que los sabados el horario de reserva finaliza a las 15:00."); </script>';
                exit();

            }
            
            // CAN'T BOOK LESS THAN THREE HOURS (N) IT DOESNT HAVE 24 HOURS FORMAT
            if($numberH <= '00 00 00 03 00'){
                echo'<script type="text/javascript"> alert("¡UPS! Recuerda que debes reservar con minimo 3 horas de anticipacion."); </script>';
				exit();
            }
            
            $day = $this->bookDate;
            $time = $this->bookTime;

            // CAN'T BOOK ON SUNDAYS (Y)
            if (strpos($day, 'domingo') !== false) {
                echo'<script type="text/javascript"> alert("¡UPS! Recuerda que no estamos disponibles el dia domingo."); </script>';
				exit();
            }

            if (strpos($day, 'sábado') !== false){
                // CAN'T BOOK BEFORE 6:30 ON SATURDAYS (Y)
                if ($time < "06:30") {
                    echo'<script type="text/javascript"> alert("¡UPS! Recuerda que los sabados el horario de reserva inicia a las 06:30."); </script>';
                    exit();
                }
                // CAN'T BOOK AFTER 15:00 ON SATURDAYS (Y)
                if ($time > "15:00") {
                    echo'<script type="text/javascript"> alert("¡UPS! Recuerda que los sabados el horario de reserva finaliza a las 15:00."); </script>';
                    exit();
                }
            }
            // Las horas aceptadas los sabados seran 6:30 8:00 10:30 12:00 13:30 15:00 Las horas aceptadas en semana seran 6:00 7:30 9:0 10:30 12:00 13:30 15:00 16:30 18:00 19:30
            if($time == "06:00" || $time == "06:30" || $time == "07:30" || $time == "08:00" || $time == "09:00" || $time == "10:30" || $time == "12:00" || $time == "13:30" || $time == "15:00" || $time == "16:30" || $time == "18:00" || $time == "19:30"){

            }else{
                echo'<script type="text/javascript"> alert("¡UPS! La hora que has escogido no esta disponible. Por favor, revisa el horario que se encuentra en la descripcion del nivel."); </script>';
                exit();
            }

            // CAN'T BOOK BEFORE 6:00 ON WEEK (Y)
            if ($time < "06:00") {
                echo'<script type="text/javascript"> alert("¡UPS! Recuerda que el horario de reserva en semana inicia a las 06:00."); </script>';
				exit();
            }

            // CAN'T BOOK AFTER 19:30 ON WEEK (Y)
                if ($time > "19:30") {
                    echo'<script type="text/javascript"> alert("¡UPS! Recuerda que el horario de reserva en semana finaliza a las 19:30."); </script>';
				    exit();
                }

                $querry = $this->connect()->prepare('SELECT * FROM calendarevent WHERE langLvl = :langLvl AND branch = :branch AND start = :start AND bookType = :bookType');
                $querry->execute([
                    'langLvl' => $this->langLvl, 
                    'branch' => $this->branch,
                    'start' => $this->bookDate . " " . $this->bookTime,
                    'bookType' => $this->bookType
                ]);

                $numEvents = $querry->rowCount();
                $showQr = $querry->fetchAll(PDO::FETCH_ASSOC);

                if($numEvents >= 12){
                    echo'<script type="text/javascript"> alert("¡OH NO! Lamentamos informarte que el cupo esta lleno. Por favor, elige una hora o fecha diferente."); </script>';
                }else{
                    include_once '../include/user.php';
                    include_once '../include/userSession.php';
        
                    $userSession = new UserSession();
                    $user = new User();
        
                    if(isset($_SESSION['user'])){
                        $user->setUser($userSession->getCurrentUser());
                    }
        
                    $title = $user->getUser();
        
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
                        echo'<script type="text/javascript"> alert("¡UPS! Recuerda que solo puedes reservar clase/quiz/examen una sola vez. Si lo que deseas es reservar tutoria o repeticion, por favor selecciona -Tutoria- o -Repeticion- en el campo -Subtipo-.); </script>';      
                    }else{
                        include_once '../include/user.php';
                        include_once '../include/userSession.php';
            
                        $userSession = new UserSession();
                        $user = new User();
            
                        if(isset($_SESSION['user'])){
                            $user->setUser($userSession->getCurrentUser());
                        }
            
                        $title = $user->getUser();
            
                        $query2 = $this->connect()->prepare("SELECT title FROM calendarevent WHERE event_id = :event_id");
                        
                        $query2->execute(['event_id' => $this->event_id]);
                        if($query2 = $title){
            
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
                                echo'<script type="text/javascript"> alert("¡YEI! Haz modificado tu reserva con exito."); </script>';
                            }else{
                                echo'<script type="text/javascript"> alert("¡OH NO! Ocurrio un error al momento de modificar tu reserva. Intentalo de nuevo"); </script>';
                            }
                        }else{
                            echo'<script type="text/javascript"> alert("¡UPS! La reserva que has seleccionado no es de tu autoria. No puedes modificarla o eliminarla."); </script>';
                        }
                    }  
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

            // CAN'T BOOK YESTERDAY AND AFTER 8 DAYS (Y)
            if( $passed <= -1 || $passed > 70){
                echo'<script type="text/javascript"> alert("¡UPS! La fecha que haz seleccionado esta inhabilitada. Intentalo de nuevo"); </script>';
                exit();

            }
                
            // CAN'T BOOK LESS THAN THREE HOURS (N) IT DOESNT HAVE 24 HOURS FORMAT
            if($numberH <= '00 00 00 01 30'){
                echo'<script type="text/javascript"> alert("¡OH NO! El plazo de cancelacion de la reserva se a cumplido. Recuerda que debes cancelar con 1 hora y 30 minutos de anticipacion."); </script>';
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

            $query2 = $this->connect()->prepare("SELECT title FROM calendarevent WHERE event_id = :event_id");
                
            $query2->execute(['event_id' => $this->event_id]);
            if($query2 = $title){

                $query3 = $this->connect()->prepare("DELETE FROM calendarevent WHERE event_id = :event_id");
                    
                $query3->execute(['event_id' => $this->event_id]);
                    
                if($query3 = true){
                    echo'<script type="text/javascript"> alert("¡YEI! Haz cancelado tu reserva con exito."); </script>';
                }else{
                    echo'<script type="text/javascript"> alert("¡OH NO! Ocurrio un error al momento de cancelar tu reserva. Intentalo de nuevo"); </script>';
                }
            }else{
                echo'<script type="text/javascript"> alert("¡UPS! La reserva que has seleccionado no es de tu autoria. No puedes modificarla o eliminarla."); </script>';
            }
        }
    }

?>