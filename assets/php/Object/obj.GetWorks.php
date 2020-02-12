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
        $RelationWorkUser->Join(Joins::INNER, "tb_work", [["iIdWork", "iIdWork"]], "TBW").
        $RelationWorkUser->Join(Joins::INNER, "tb_user", [["iIDUser", "iIDUser"]], "TBU"). 
        $RelationWorkUser->Join(Joins::INNER, "tb_attachment", [["iIdWork", "iIdWork"]], "TBATT", "TBW").
        $RelationWorkUser->Join(Joins::INNER, "tb_worktype", [["iIdTypeWork", "iIdTypeWork"]], "TBTW", "TBW").
        $RelationWorkUser->Where([["rwu.bMainAuthor", '=', "AND"], ["TBATT.enumState", "=", null]], false);

    echo json_encode($RelationWorkUser->QueryExecute($Query, ["1", "Provisório"], true), JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);

    /*
    SELECT * FROM `ppsi-2019-gr5`.tb_relationworkuser as trwu
        INNER JOIN tb_work AS tbw ON
			tbw.iIdWork=trwu.iIdWork
		INNER JOIN tb_worktype AS tbwt ON
			tbwt.iIdTypeWork = tbw.iIdTypeWork
		INNER JOIN tb_user AS tbu ON
			tbu.iIdUser=trwu.iIdUser
		INNER JOIN tb_attachment AS tbat ON
			tbat.iIdWork=trwu.iIdWork
        where trwu.bMainAuthor = 1 and tbat.enumState = 'Provisório' and trwu.iIdUser <> 127;
        ...



    http://localhost/ProjetoPSI/Dashboard/pages/Review.php
    /*I've tried cleaning the string to conform to UTF-8 without any success. What worked for me - setting MySQL Names to UTF-8 prior to populating the array: 
        $mysqli->query("SET NAMES 'utf8'"); Now all special characters are displayed perfectly fine. */
?>