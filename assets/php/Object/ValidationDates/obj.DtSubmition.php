<?php

    /**
     * Objeto que vai restringir a utilização do website conforme a data das submissoes
     */
    require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Facade/class.Event.php");

    $event = new Event();
    $event->readObject("0"); // evento atual

    if(!(date('Y-m-d') >= $event->getDtIniSubmition() && date('Y-m-d') <= $event->getDtEndSubmition())){
       header("location: ../../");
    }
?>