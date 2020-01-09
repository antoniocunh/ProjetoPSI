<?php
    require($_SERVER["DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Facade/User.php");
    session_start();

    if(isset($_SESSION["username"])){
        $user = new User();
        $user->readObject($_SESSION["username"]);
        $user->setVcName($_POST["vcName"]);
        $user->setVcLastName($_POST["vcLastName"]);
        $user->setVcPhoneNumber($_POST["vcPhoneNumber"]);
        $user->setVcAfiliation($_POST["vcAfiliation"]);
        $user->setIIdScope($_POST["iIdScope"]);
        $user->setDtBirth($_POST["dtBirth"]);
        $user->setVcAddress($_POST["vcAddress"]);
        $user->setVcCountry($_POST["vcCountry"]);
        $user->setVcCity($_POST["vcCity"]);
        $user->setVcPostalCode($_POST["vcPostalCode"]);
        $user->setVcUsername($_POST["vcUsername"]);
        $user->setVcEmail($_POST["vcEmail"]);
        $user->UpdateObject();
        header("location: " .  $_SERVER["DOCUMENT_NAME"] . "/ProjetoPSI/Dashboard/pages/perfil.php");

        
    }
?>