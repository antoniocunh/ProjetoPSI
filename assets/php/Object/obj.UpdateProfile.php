<?php
    require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Object/Roles/obj.VerifyLogin.php");
    require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Facade/class.User.php");

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
        $user->setVcEmail($_POST["vcEmail"]);
        $user->UpdateObject();
        echo json_encode(["msg" => " Perfil atualizado com sucesso"]);      
    }else{
        echo json_encode(["msg" => "Não foi possivel atualizar o perfil"]);    
    }

?>