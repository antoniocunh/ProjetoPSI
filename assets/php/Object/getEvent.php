<?php
       require($_SERVER["DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Facade/Event.php");

       $event = new Event();
       $event->readObject("0");

       echo "<pre>";
       echo json_encode((array)$event,JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
        echo "</pre>"
?>