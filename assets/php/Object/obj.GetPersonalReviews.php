<?php
    require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Object/Roles/obj.VerifyLogin.php");
    require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Object/Roles/obj.VerifyAdminRole.php");
    require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Facade/class.Evaluation.php");
    
    $RelationWorkUser = new Evaluation();
    $Columns = array
    (
        array("distinct TBU", "vcName"),
        array("TBW", "vcTitle"),
        array("TBU", "vcLastName"),
        array("TBA", "iIdAttachment")
    );

    $Query =
        $RelationWorkUser->SelectJoin($Columns).
        $RelationWorkUser->Join(Joins::INNER, "tb_work", [["iIdWork", "iIdWork"]], "TBW").
        $RelationWorkUser->Join(Joins::INNER, "tb_attachment", [["iIdWork", "iIdWork"]], "TBA", "TBW").
        $RelationWorkUser->Join(Joins::INNER, "tb_relationworkuser", [["iIdWork", "iIdWork"]], "TBRWU", "TBW").
        $RelationWorkUser->Join(Joins::INNER, "tb_user", [["iIDUser", "iIDUser"]], "TBU", "TBRWU").
        $RelationWorkUser->Join(Joins::INNER, "tb_user", [["iIDReviewer", "iIDUser"]], "TBUA").
        $RelationWorkUser->Where([["TBUA.vcUsername", "=", "AND"], ["TBA.enumState", "=", null]], false);

    echo json_encode($RelationWorkUser->QueryExecute($Query, [$_SESSION["username"], "Final"], true), JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);