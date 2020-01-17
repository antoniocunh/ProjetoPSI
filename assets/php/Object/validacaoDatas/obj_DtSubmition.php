<?php
    require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Facade/Event.php");

    $event = new Event();
    $event->readObject("0");

    if(!(date('Y-m-d') >= $event->getDtIniSubmition() && date('Y-m-d') <= $event->getDtEndSubmition())){
       header("location: ../../");
    }
?>