<?php
    require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Object/verifyLogin.php");
    require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Object/obj_verifyRoleAdmin.php");
    require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Facade/User.php");
    if(isset($_POST["username"])){
        $username = $_POST["username"];
        $user = new User();
        $user->readObject($username);
        $user->DeleteObject();
        echo json_encode(["msg" => $username . " removido com sucesso."]);
    }else{
        echo json_encode(["msg" => $username . " não pode ser removido."]);
    }
?>