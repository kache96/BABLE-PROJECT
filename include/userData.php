<?php
include_once 'db.php';

header('Content-Type: application/json');

class userData extends DB{

        public function userFields(){
                
                $query1 = $this->connect()->prepare('SELECT * FROM user WHERE branch = :getBranchN');
                $query1->execute([
                        'getBranchN' => $branch 
                ]);

                $showQ = $query1->fetchAll(PDO::FETCH_ASSOC);

                if($showQ){
                        echo json_encode($showQ);
                }else{
                        echo "No se han encontrado datos";
                }   

        }
}
$a = new CalendarEvent;
echo $a->events();

?>