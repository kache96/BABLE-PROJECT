date_default_timezone_set("America/Bogota");
            $date = $this->bookDate;
            $tomorrow = strtotime("Tomorrow");
            $dtomorrow = date("l d F yy", $tomorrow );
            $today = date("l d F yy");
            
            $dateT = str_replace(' ', '', $date);
            $dtomorrowT = str_replace(' ', '', $dtomorrow);
            $todayT = str_replace(' ', '', $today);

            $getTranslation = file_get_contents('https://translate.googleapis.com/translate_a/single?client=gtx&sl=en&tl=es&dt=t&q='.($dtomorrowT).'');
            $getTranslation = explode('"',$getTranslation,3);
            return $getTranslation[1];
            
            $getTranslation1 = file_get_contents('https://translate.googleapis.com/translate_a/single?client=gtx&sl=en&tl=es&dt=t&q='.($todayT).'');
            $getTranslation1 = explode('"',$getTranslation1,3);
            return $getTranslation1[1];

            $getTranslationT = str_replace(' ', '', $getTranslation[1]);
            $getTranslationT1 = str_replace(' ', '', $getTranslation1[1]);

            $tomorrowC = mb_strtolower($getTranslationT);
            $todayC = mb_strtolower($getTranslationT1);

            if($dateT == $todayC || $dateT == $tomorrowC){
            }else{
                ?>
				<div id="alert"><p>¡Ups! Recuerda que los domingo no hay clases. <a href="" onclick="location.reload()"><b>Reserva en otro dia.</b></a></p></div>
				<?php
				exit();
            };