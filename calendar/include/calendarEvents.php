<?php
include_once 'db.php';
header('Content-Type: application/json');

class CalendarEvent extends DB{
        public function events(){

                $action = (isset($_GET['action']))?$_GET['action']:'read';

                switch($action){
                case 'create':
                        echo "INSERTING DATA";
                        $query = $this->connect()->prepare("INSERT INTO calendarevent(title, studentCode, bookType, bookSubtype, numberClass, numberUnit, start, end, textColor, color) VALUES(:title, :studentCode, :bookType, :bookSubtype, :numberClass, :numberUnit, :start, :end, :textColor, :color)");
                        
                        $create = $query->execute(array(
                                "title" =>$_POST['title'],
                                "studentCode" =>$_POST['studentCode'],
                                "bookType" =>$_POST['bookType'],
                                "bookSubtype" =>$_POST['bookSubtype'],
                                "numberClass" =>$_POST['numberClass'],
                                "numberUnit" =>$_POST['numberUnit'],
                                "start" =>$_POST['start'],
                                "end" =>$_POST['end'],
                                "textColor" =>$_POST['textColor'],
                                "color" =>$_POST['color']
                        ));
                        if($create){
                                echo json_encode($create);
                            }else{
                                echo "No se insertaron los datos";
                            }


                break;
                case 'update':
                        echo "UPDATING DATA";
                break;
                case 'delete':
                        echo "DELETING DATA";
                break;
                default:

                $query = $this->connect()->prepare('SELECT * FROM calendarevent');
                $query->execute();

                $showQ = $query->fetchAll(PDO::FETCH_ASSOC);
                
                if($showQ){
                        echo json_encode($showQ);
                    }else{
                        echo "No se han encontrado datos";
                    }
                break;
                }
                
        }
}

$a = new CalendarEvent;
echo $a->events();
?>