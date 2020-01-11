<?php
    require_once($_SERVER["DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Facade/User.php");

    $user = new User();
    $Columns = array(
        "iIdUserType"
    );

    $Query = 
        $user->Select($Columns).
        $user->Where([["vcUsername", '=', null ]], true);

    $result = $user->QueryExecute($Query, [$_SESSION["username"]], true);
    if($result[0]["iIdUserType"] == null)
        $result[0]["iIdUserType"] = -1;
    if($result[0]["iIdUserType"] != 0){
        header("Location: ./perfil.php");
    }
    
?>