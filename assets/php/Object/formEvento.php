<?php
       require($_SERVER["DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Facade/Event.php");
       $event = new Event();


       if(empty($event->SelectAllBP("?", "1 = 1"))){
            $event->InsertObject();
       }
?>