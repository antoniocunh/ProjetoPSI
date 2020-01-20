<?php

    /**
     * Objeto que vai restringir a utilização do website conforme a data da avaliação
     */
    require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Facade/class.Event.php"); 

    $event = new Event();
    $event->readObject("0"); // evento atual

    if(!($event->getDtIniEvaluation() < date('Y-m-d') && $event->getDtEndEvaluation() > date('Y-m-d'))){
        header("location: ../../");
    }
?>