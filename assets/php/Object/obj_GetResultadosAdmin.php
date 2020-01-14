<?php
    require_once($_SERVER["DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Object/verifyLogin.php");
    require_once($_SERVER["DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Object/obj_verifyRoleAdmin.php");
    require_once($_SERVER["DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Facade/Evaluation.php");
    
    $RelationWorkUser = new Evaluation();
    $Columns = array
    (
        array("TBU", "vcName"),
        array("TBW", "vcTitle"),
        array(null, "iRate"),
        array(null, "vcReview"),
        array("TBU", "vcLastName"),
        array("TBA", "iIdAttachment")
    );

    $Query =
        $RelationWorkUser->SelectJoin($Columns).
        $RelationWorkUser->Join(Joins::INNER, "tb_work", [["iIdWork", "iIdWork"]], "TBW").
        $RelationWorkUser->Join(Joins::INNER, "tb_attachment", [["iIdWork", "iIdWork"]], "TBA", "TBW").
        $RelationWorkUser->Join(Joins::INNER, "tb_relationworkuser", [["iIdWork", "iIdWork"]], "TBRWU", "TBW").
        $RelationWorkUser->Join(Joins::INNER, "tb_user", [["iIDUser", "iIDUser"]], "TBU", "TBRWU").
        $RelationWorkUser->Where([["TBRWU.bMainAuthor", '=', null ]], false);


        /*
            SELECT 
                TBA.iIdWork, 
                TBA.vcTitle,
                TBA.vcSummary, 
                TBU.vcName, 
                TBU.vcLastName, 
                TBATT.blAttachment
         FROM tb_RelationWorkUser AS rwu
         INNER JOIN tb_work AS TBA ON 
            rwu.iIdWork = TBA.iIdWork 
        INNER JOIN tb_user AS TBU ON 
            rwu.iIDUser = TBU.iIDUser 
        INNER JOIN tb_attachment AS TBATT ON
            TBA.iIdWork = TBATT.iIdWork 
        WHERE rwu.bMainAuthor=?
        
        */
    
    //<<$obj->picture = base64_encode($binaryData); //Nesse Binary tem de vir so a blob

    echo json_encode($RelationWorkUser->QueryExecute($Query, ["1"], true), JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);