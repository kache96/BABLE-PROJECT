<?php
include_once 'db.php';
header('Content-Type: application/json');

class CalendarEvent extends DB{
        public function events(){

                $query = $this->connect()->prepare('SELECT * FROM calendarevent');
                $query->execute();

                $showQ = $query->fetchAll(PDO::FETCH_ASSOC);
                
                if($showQ){
                        echo json_encode($showQ);
                }else{
                        echo "No se han encontrado datos";
                }

                $query1 = $this->connect()->prepare('SELECT * FROM calendarevent WHERE (title, langLvl, bookType, bookSubtype, numberClass, numberUnit) IN "andreah934", "Enlish A1", "Class", "tutorship", 14, 14');

                $query1->execute();

                $showQ = $query1->fetchAll(PDO::FETCH_ASSOC);

                if($showQ){
                        echo json_encode($showQ);

                        echo "No puede insertar";

                }

                
        }
}
$a = new CalendarEvent;
echo $a->events();


?>