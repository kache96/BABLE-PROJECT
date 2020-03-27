<?php
date_default_timezone_set("America/Bogota");

$dateS = "sábado, 4 abril, 2020";
$dateT = str_replace(' ', '', $dateS);

$translate = file_get_contents('https://translate.googleapis.com/translate_a/single?client=gtx&sl=es&tl=en&dt=t&q='.($dateT).'');
$translate = explode('"',$translate,3);

$date = strtotime($translate[1]);

$passed = ceil(($date-time())/60/60/24);

if( $passed <= -1 || $passed > 8){
echo "No puede reservar";
}else{
echo "Reservar";
};

?>