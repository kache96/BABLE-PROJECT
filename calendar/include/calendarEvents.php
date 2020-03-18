<?php
include_once 'db.php';
header('Content-Type: application/json');

class CalendarEvent extends DB{
        public function events(){

                $action = (isset($_GET['action']))?$_GET['action']:'read';

                switch($action){
                case 'create':
                        echo "INSERTING DATA";

                        $query = $this->connect()->prepare("INSERT INTO calendarevent(title, studentCode, bookType, bookSubtype, numberClass, numberUnit, start, textColor, color) VALUES(:title, :studentCode, :bookType, :bookSubtype, :numberClass, :numberUnit, :start, :textColor, :color)");
                        
                        $answer = $query->execute(array(
                                "title" =>$_POST['title'],
                                "studentCode" =>$_POST['studentCode'],
                                "bookType" =>$_POST['bookType'],
                                "bookSubtype" =>$_POST['bookSubtype'],
                                "numberClass" =>$_POST['numberClass'],
                                "numberUnit" =>$_POST['numberUnit'],
                                "start" =>$_POST['start'],
                                "textColor" =>$_POST['textColor'],
                                "color" =>$_POST['color']
                        ));
                        if($answer){
                                echo json_encode($answer);
                            }else{
                                echo "No se ha podido insertar datos";
                            }

                break;
                case 'update':
                        echo "UPDATING DATA";
                        $query = $this->connect()->prepare('UPDATE calendarevent SET
                        bookType = :bookType, bookSubtype = :bookSubtype, numberClass = :numberClass, numberUnit = :numberUnit, start = :start, end = :end WHERE event_id = :event_id');

                        $answer = $query->execute(array(
                                "event_id"=>$_POST['id'],
                                "bookType" =>$_POST['bookType'],
                                "bookSubtype" =>$_POST['bookSubtype'],
                                "numberClass" =>$_POST['numberClass'],
                                "numberUnit" =>$_POST['numberUnit'],
                                "start" =>$_POST['start'],
                        ));
                        if($answer){
                                echo json_encode($answer);
                            }else{
                                echo "No se pudo actualizar";
                            }

                break;
                case 'delete':
                        $answer = false;

                        $query = $this->connect()->prepare('DELETE FROM calendarevent WHERE event_id=:event_id');

                        $answer = $query->execute(array(
                                "event_id"=>$_POST['id']
                        ));
                        if($answer){
                                echo json_encode($answer);
                            }else{
                                echo "No se pudo eliminar";
                            }

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