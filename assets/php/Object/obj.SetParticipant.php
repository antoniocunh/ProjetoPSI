<?php
    require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Object/Roles/obj.VerifyLogin.php");
    require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Facade/class.User.php");

    try{
        $user = new User();
        $user->readObject($_SESSION["username"]);
        if($user->getIIdUserType() != 7)
            throw new RuntimeException();
        $user->setIIdUserType(5);
        $user->updateObject();
        echo json_encode(["msg"=>"Utilizador registados como participante com sucesso!"]);
    }catch(Exception $e){
        echo json_encode(["msg"=>"Não foi possivel registar como participante!"]);
    }
?>