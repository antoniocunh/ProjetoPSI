<?php
    require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Facade/Event.php");

    $event = new Event();
    $event->readObject("0");

    if(!($event->getDtIniEvaluation() < date('Y-m-d') && $event->getDtEndEvaluation() > date('Y-m-d'))){
        header("location: ../../");
    }
?>