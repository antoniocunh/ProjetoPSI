<?php
    require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Object/Roles/obj.VerifyLogin.php");
    require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Facade/class.Work.php");
    
    $RelationWorkUser = new Work();
    $Columns = array
    (
        array(null , "iIdWork"),
        array(null , "vcTitle"),
        array(null, "vcSummary"),
        array("TBU", "vcName"),
        array("TBU", "vcLastName"),
        array("TBTW", "vcDescription"),
        array("TBA", "vcTitle"),
        array("TBA", "enumState"),
        array("TBA", "iIdAttachment"),
    );

    $Query =
        $RelationWorkUser->SelectJoin($Columns).
        $RelationWorkUser->Join(Joins::INNER, "tb_worktype", [["iIdTypeWork", "iIdTypeWork"]], "TBTW").
        $RelationWorkUser->Join(Joins::INNER, "tb_attachment", [["iIdWork", "iIdWork"]], "TBA").
        $RelationWorkUser->Join(Joins::INNER, "tb_relationworkuser", [["iIdWork", "iIdWork"]], "TBRWU").
        $RelationWorkUser->Join(Joins::INNER, "tb_user", [["iIDUser", "iIDUser"]], "TBU", "TBRWU").
        $RelationWorkUser->Where([["TBU.vcUsername", "=", "AND"], ["TBA.enumState", "=", null]], false);
       
        
        echo json_encode($RelationWorkUser->QueryExecute($Query, [$_SESSION["username"], "Provisório"], true), JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
        
?>