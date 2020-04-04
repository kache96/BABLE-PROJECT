<?php

include_once 'db.php';

header('Content-Type: application/json');

class CalendarEvent extends DB{

        public function events(){
        
                $query0= $this->connect()->prepare("SELECT getBranchN FROM branchn");
                $query0->execute();

                $arrD = $query0->fetchAll(PDO::FETCH_ASSOC);

                foreach ($arrD as $bName) {
                        $branch = $bName['getBranchN'];
                }
                
                $query1 = $this->connect()->prepare('SELECT * FROM calendarevent WHERE branch = :getBranchN');
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