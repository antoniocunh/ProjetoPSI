<?php
     require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Object/verifyLogin.php");
     require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Object/obj_verifyRoleAdmin.php");  
       require($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Facade/Event.php");
       $event = new Event();


       if(empty($event->SelectAllBP("?", "1 = 1"))){
            $event->InsertObject();
       }
