<?php
    require_once($_SERVER["DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Object/verifyLogin.php");
    require_once($_SERVER["DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Object/obj_verifyRoleAdmin.php");
    require($_SERVER["DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Facade/User.php");
    if(isset($_POST["vcUsername"])){
        $user = new User();
        $user->readObject($_POST["vcUsername"]);
        $user->setVcName($_POST["vcName"]);
        $user->setVcLastName($_POST["vcLastName"]);
        $user->setVcPhoneNumber($_POST["vcPhoneNumber"]);
        $user->setVcAfiliation($_POST["vcAfiliation"]);
        $user->setIIdScope($_POST["iIdScope"]);
        $user->setVcAddress($_POST["vcAddress"]);
        $user->setVcCountry($_POST["vcCountry"]);
        $user->setVcCity($_POST["vcCity"]);
        $user->setVcPostalCode($_POST["vcPostalCode"]);
        $user->setVcUsername($_POST["vcUsername"]);
        $user->setVcEmail($_POST["vcEmail"]);
        $user->UpdateObject();
        echo json_encode(["msg" => "Utilizador atualizado com sucesso!"]);
    }else{
        echo json_encode(["msg" => "Erro au adicionar o utilizador!"]);
    }
   
?>