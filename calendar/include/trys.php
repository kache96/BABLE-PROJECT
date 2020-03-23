<?php
$time = "05:90";
            
if ($time >= "06:00") {
    ?>
    <div id="alert"><p>¡Ups! Recuerda que las clases inician a las 6:00am. <a href="index.php"><b>Reserva en otra hora.</b></a></p></div>
    <?php
    exit();
}
?>