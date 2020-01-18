<?php
    require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Object/verifyLogin.php");
    require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Object/obj_verifyRoleAdmin.php");
    require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Facade/RelationWorkUser.php");
    
    $RelationWorkUser = new RelationWorkUser();
    $Columns = array
    (
        array("TBW", "iIdWork"),
        array("TBW", "vcTitle"),
        array("TBW", "vcSummary"),
        array("TBU", "vcName"),
        array("TBTW", "vcDescription"),
        array("TBATT", "vcTitle"),
        array("TBATT", "iIdAttachment"),
        array("TBU", "vcLastName")
    );

    $Query =
        $RelationWorkUser->SelectJoin($Columns).
        $RelationWorkUser->Join(Joins::INNER, "tb_work", [["iIdWork", "iIdWork"]], "TBW").
        $RelationWorkUser->Join(Joins::INNER, "tb_user", [["iIDUser", "iIDUser"]], "TBU"). 
        $RelationWorkUser->Join(Joins::INNER, "tb_attachment", [["iIdWork", "iIdWork"]], "TBATT", "TBW").
        $RelationWorkUser->Join(Joins::INNER, "tb_worktype", [["iIdTypeWork", "iIdTypeWork"]], "TBTW", "TBW").
        $RelationWorkUser->Where([["TBU.vcUsername", '=', null ]], false);

    echo json_encode($RelationWorkUser->QueryExecute($Query, [$_SESSION["username"]], true), JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);

    /*
    http://localhost/ProjetoPSI/Dashboard/pages/avaliar.php
    /*I've tried cleaning the string to conform to UTF-8 without any success. What worked for me - setting MySQL Names to UTF-8 prior to populating the array: 
        $mysqli->query("SET NAMES 'utf8'"); Now all special characters are displayed perfectly fine. */
?>