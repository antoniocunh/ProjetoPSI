<?php
    require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Object/Roles/obj.VerifyLogin.php");
    require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Object/Roles/obj.VerifyAdminRole.php");
    require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Facade/class.RelationWorkUser.php");
    
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
        $RelationWorkUser->Join(Joins::INNER, "tb_evaluation", [["iIdWork", "iIdWork"]], "TBE").
        $RelationWorkUser->Join(Joins::INNER, "tb_work", [["iIdWork", "iIdWork"]], "TBW").
        $RelationWorkUser->Join(Joins::INNER, "tb_user", [["iIDUser", "iIDUser"]], "TBU"). 
        $RelationWorkUser->Join(Joins::INNER, "tb_user", [["iIdReviewer", "iIDUser"]], "TBUA", "TBE"). 
        $RelationWorkUser->Join(Joins::INNER, "tb_attachment", [["iIdWork", "iIdWork"]], "TBATT", "TBW").
        $RelationWorkUser->Join(Joins::INNER, "tb_worktype", [["iIdTypeWork", "iIdTypeWork"]], "TBTW", "TBW").
        $RelationWorkUser->Where([["rwu.bMainAuthor", '=', "AND"], ["TBATT.enumState", "=", null], ["TBATT.vcUsername", "!=", null]], false);

    echo $Query;
    echo json_encode($RelationWorkUser->QueryExec($Query, ["1", "Provisório", $_SESSION["username"]]), JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
?>