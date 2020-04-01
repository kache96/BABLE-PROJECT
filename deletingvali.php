<?php
date_default_timezone_set("America/Bogota");

            $dateS = 'martes, 31 marzo, 2020';
            $dateT = str_replace(' ', '', $dateS);
            echo "DIA QUE PUSE <br>";
            echo $dateS . "<br>";

            $translate = file_get_contents('https://translate.googleapis.com/translate_a/single?client=gtx&sl=es&tl=en&dt=t&q='.($dateT).'');
            $translate = explode('"',$translate,3);

            $date = strtotime($translate[1]);

            $passed = ceil(($date-time())/60/60/24);

            $intday = strtotime($translate[1]);
            $fday = date("yy-m-d" , $intday);
            $thish = $fday . " " . '09:30';
            $current = date("yy-m-d h:i");

            $currentH = new DateTime($current);//fecha inicial
            $hourI = new DateTime($thish);//fecha de cierre
            $hmTime = $currentH->diff($hourI);
            $numberH = $hmTime->format('%Y %M %D %H %i');
            echo "FALTA ESTE TIEMPO PARA LA FECHA Y HORA QUE PUSE <br>";
            echo $numberH . "<br>";

            if($numberH <= '00 00 00 01 30'){
                ?>
				<div id="alert"><p>¡Ups! Recuerda que debes reservar 3 horas antes. <a href="" onclick="location.reload()"><b>Reserva en otro dia.</b></a></p></div>
				<?php
				exit();
            }
            ?>