<?php


    date_default_timezone_set("America/Bogota");
    $date = "martes 24 marzo 2020";
    $tomorrow = strtotime("Tomorrow");
    $dtomorrow = date("l d F yy", $tomorrow );
    $today = date("l d F yy");
    
    echo "DIAS NORMALES <br>";
    echo "Fecha:  " . $date . "<br>";
    echo "Mañana:  " . $dtomorrow . "<br>";
    echo "Hoy:  " . $today . "<br>";
    echo "<br>";
    
    echo "DIAS TRIMEADOS <br>";
    $dateT = str_replace(' ', '', $date);
    $dtomorrowT = str_replace(' ', '', $dtomorrow);
    $todayT = str_replace(' ', '', $today);

    echo $dateT . "<br>";
    echo $dtomorrowT . "<br>";
    echo $todayT . "<br><br>";

    echo $dtomorrowT . "<br>";

      $getTranslation = file_get_contents('https://translate.googleapis.com/translate_a/single?client=gtx&sl=en&tl=es&dt=t&q='.($dtomorrowT).'');
      $getTranslation = explode('"',$getTranslation,3);
      echo $getTranslation[1] . "<br><br>";
      
    echo $todayT . "<br>";

      $getTranslation1 = file_get_contents('https://translate.googleapis.com/translate_a/single?client=gtx&sl=en&tl=es&dt=t&q='.($todayT).'');
      $getTranslation1 = explode('"',$getTranslation1,3);
      echo $getTranslation1[1] . "<br><br>";

      $getTranslationT = str_replace(' ', '', $getTranslation[1]);
      $getTranslationT1 = str_replace(' ', '', $getTranslation1[1]);

      echo "FECHAS TRADUCIDAS <br>";
      echo $getTranslationT . "<br>";
      echo $getTranslationT1 . "<br><br>";

      echo "VARIABLES PARA VALIDAR <br>";

      $tomorrowC = mb_strtolower($getTranslationT);
      $todayC = mb_strtolower($getTranslationT1);

      echo $tomorrowC . "<br>";
      echo $todayC . "<br><br>";

      echo "RESULTADO CONDICION <br>";
    if($dateT == $todayC || $dateT == $tomorrowC){
        echo "Puede reservar";
    }else{
    echo "No puede reservar";
    };

?>