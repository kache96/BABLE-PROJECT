<?php
date_default_timezone_set("America/Bogota");

$dateS = "viernes, 27 marzo, 2020";
echo "FECHA QUE INGRESE <br>";
echo $dateS . "<br><br>";

$dateT = str_replace(' ', '', $dateS);

$translate = file_get_contents('https://translate.googleapis.com/translate_a/single?client=gtx&sl=es&tl=en&dt=t&q='.($dateT).'');
$translate = explode('"',$translate,3);

$date = strtotime($translate[1]);

$passed = ceil(($date-time())/60/60/24);

echo "DIAS DE DIFERENCIA <br>";
echo $passed . "<br><br>";

$intday = strtotime($translate[1]);

$fday = date("yy-m-d" , $intday);
echo "DIA INGRESADO FORMATEADO <br>";
echo $fday . "<br><br>";

$thish = $fday . " " . "09:00";
echo "HORA INGRESADA POR MI <br>";
echo $thish . "<br><br>";

$current = date("yy-m-d h:i");
echo "HORA ACTUAL <br>";
echo $current . "<br><br>";

$currentH = new DateTime($current);//fecha inicial
$hourI = new DateTime($thish);//fecha de cierre
$hmTime = $currentH->diff($hourI);
$numberH = $hmTime->format('%Y %M %D %H %i');

echo "TIEMPO QUE FALTA PARA LA HORA QUE INGRESE <br>";
echo $numberH . "<br><br>";

if($passed <= -1 || $passed > 8){
    echo "-----------------NO PUEDE RESERVAR POR LA FECHA <br>";
}else if($numberH <= '00 00 00 03 00'){
    echo "-----------------NO PUEDE RESERVAR POR LA HORA <br>";
};


?>