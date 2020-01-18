<?php
    require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Object/verifyLogin.php");
    require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Object/obj_verifyRoleNull.php");
    require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Facade/User.php");

    $user = new User();
    $user->readObject($_SESSION["username"]);
    echo json_encode($user);
    $user->setIIdUserType(4);
    $user->updateObject();
?>