<?php

    /**
     * Objeto que vai restringir a utilização do website conforme a data do evento
     */
    require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Facade/class.Event.php");
    require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Facade/class.User.php");
    $temp = new User();
    $temp->readObject($_SESSION["username"]);

    $event = new Event();
    $event->readObject("0");//evento atual

    if(!($event->getDtIniEvent() < date('Y-m-d') && $event->getDtEndEvent() > date('Y-m-d'))){
       header("location: ../../");
    }
?>