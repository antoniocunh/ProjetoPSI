
<?php
       require($_SERVER["DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Facade/Event.php");

       $event = new Event();
       $event->readObject("0");
       //echo $event->SelectAll();

       echo json_encode($event);
?>