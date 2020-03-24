<?php

    $events = new Events();
    if(isset($_POST['btnSave'])){
        $events->setBookType($_POST['bookType']);
        $events->setBookSubtype($_POST['bookSubtype']);
        $events->setNumberClass($_POST['numberClass']);
        $events->setNumberUnit($_POST['numberUnit']);
        $events->setBookDate($_POST['bookDate']);
        $events->setBookTime($_POST['bookTime']);
        $events->createEvent();
    }
    if(isset($_POST['btnUpdate'])){
        $events->setEvent_id($_POST['event_id']);
        $events->setBookType($_POST['bookType']);
        $events->setBookSubtype($_POST['bookSubtype']);
        $events->setNumberClass($_POST['numberClass']);
        $events->setNumberUnit($_POST['numberUnit']);
        $events->setBookDate($_POST['bookDate']);
        $events->setBookTime($_POST['bookTime']);
        $events->updateEvent();
    }
    if(isset($_POST['btnDelete'])){
        $events->setEvent_id($_POST['event_id']);
        $events->deleteEvent();
    }
 ?>