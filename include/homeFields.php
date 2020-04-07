
<?php
error_reporting(0);
@ini_set('display_errors', 0);
include_once 'include/homeData.php';
    $notes = new Home();

    if(isset($_POST['btnSaveN'])){
        $notes->setLanglevel($_POST['langlevel']);
        $notes->setTypeExam($_POST['typeExam']);
        $notes->setUnits($_POST['units']);
        $notes->setNote($_POST['note']);
        $notes->notes();
    }
    if(isset($_POST['btnSaveC'])){
        $notes->setNameC($_POST['nameC']);
        $notes->setEmailC($_POST['emailC']);
        $notes->setMessageC($_POST['messageC']);
        $notes->contact();
    }
?>