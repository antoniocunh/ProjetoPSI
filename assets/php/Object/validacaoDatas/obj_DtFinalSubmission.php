<?php
    require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Facade/Event.php");

    $event = new Event();
    $event->readObject("0");

    if(!($event->getDtIniFinalSubmission() < date('Y-m-d') && $event->getDtEndFinalSubmission() > date('Y-m-d'))){
       header("location: ../../");
    }
?>