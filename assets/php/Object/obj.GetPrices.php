<?php
    require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Object/Roles/obj.VerifyLogin.php");
    require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Facade/class.Price.php");
    
    $columns = array(
        array(null, "iIdPrice"),
        array(null, "dPrice"),
        array(null, "vcDescription"),
        array("UT", "vcDescription")
    );


    $Price = new Price();
    $Query = $Price->SelectJoin($columns).
    $Price->Join(Joins::INNER, "tb_UserType", [["iIdPrice", "iIdPrice"]], "UT", "pr");
    echo json_encode($Price->QueryExec($Query), JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
        
?>