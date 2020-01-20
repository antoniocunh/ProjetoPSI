<?php

    /**
     * Objeto que vai restringir a utilização do website conforme a data da submissao final
     */
    require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Facade/class.Event.php");

    $event = new Event();
    $event->readObject("0");// evento atual

    if(!($event->getDtIniFinalSubmission() < date('Y-m-d') && $event->getDtEndFinalSubmission() > date('Y-m-d'))){
       header("location: ../../");
    }
?>