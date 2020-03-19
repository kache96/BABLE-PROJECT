<?php
include_once 'db.php';

    class Events extends DB{
        private $event_id;
        private $bookType;
        private $bookSubtype;
        private $numberClass;
        private $numberUnit;
        private $bookDate;
        private $bookTime;

        public function getEvent_id(){
            return $this->event_id;
        }
    
        public function setEvent_id($event_id){
            $this->event_id = $event_id;
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

        public function createEvent(){
			if (empty($this->bookType) || empty($this->bookSubtype) || empty($this->numberClass) || empty($this->numberUnit) || empty($this->bookDate) || empty($this->bookTime))
			{
				?>
				<div id="alert"><p>¡Ups! Te falto uno o varios campos por llenar. <a href="index.php"><b>Intentalo una vez mas.</b></a></p></div>
				<?php
				exit();
            }
            
            $query0 = $this->connect()->prepare("INSERT INTO calendarevent(event_id, title, studentCode, bookType, bookSubtype, numberClass, numberUnit, start, bookTime, textColor, color, dateEvent) VALUES (:event_id, :title, :studentCode, :bookType, :bookSubtype, :numberClass, :numberUnit, :start, :bookTime, :textColor, :color, now())");
            $query0->execute([
                'event_id' => '', 
                'title' => 'ESTUDIANTE', 
                'studentCode' => 'CODIGO', 

                'bookType' => $this->bookType, 
                'bookSubtype' => $this->bookSubtype,
                'numberClass' => $this->numberClass, 
                'numberUnit' => $this->numberUnit,

                'start' => $this->bookDate,
                'bookTime' => $this->bookTime,

                'textColor' => '#FFFFFF', 
                'color' => '#9b0000'
                ]);
        }
        public function updateEvent(){
            if (empty($this->bookType) || empty($this->bookSubtype) || empty($this->numberClass) || empty($this->numberUnit) || empty($this->bookDate) || empty($this->bookTime))
			{
				?>
				<div id="alert"><p>¡Ups! Te falto uno o varios campos por llenar. <a href="index.php"><b>Intentalo una vez mas.</b></a></p></div>
				<?php
				exit();
            }

            $query1 = $this->connect()->prepare("UPDATE calendarevent SET
            event_id = :event_id, 
            bookType = :bookType, 
            bookSubtype = :bookSubtype, 
            numberClass = :numberClass, 
            numberUnit = :numberUnit, 
            start = :start, 
            bookTime = :bookTime
            WHERE event_id = :event_id");

            $query1->execute([
                ':event_id' => '2', 
                
                ':bookType' => $this->bookType, 
                ':bookSubtype' => $this->bookSubtype,
                ':numberClass' => $this->numberClass, 
                ':numberUnit' => $this->numberUnit,

                ':start' => $this->bookDate,
                ':bookTime' => $this->bookTime
                ]);
        }
        public function deleteEvent(){
			 
            $query2 = $this->connect()->prepare("DELETE FROM calendarevent WHERE event_id=:event_id");
            $query2->execute([
                ':event_id' => 'event_id'
                ]);
        }
    }
?>