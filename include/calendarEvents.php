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

                $query1 = $this->connect()->prepare('SELECT
                title, bookType, bookSubtype, numberUnit, COUNT(*) FROM calendarevent WHERE bookType = "Quiz" GROUP BY title, bookType, bookSubtype, numberUnit HAVING COUNT(*) > 1');

                $query1->execute();

                $showQ = $query->fetchAll(PDO::FETCH_ASSOC);

                if($showQ){
                        echo json_encode($showQ);

                        echo "No puede insertar";

                }else{
                        echo "No se han encontrado datos";
                }

                
        }
}
$a = new CalendarEvent;
echo $a->events();


?>