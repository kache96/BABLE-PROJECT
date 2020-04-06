<?php
error_reporting(0);
@ini_set('display_errors', 0);
include_once 'userSession.php';

$userSession = new UserSession();
$userSession->closeSession();

header("location: ../index.php");

?>