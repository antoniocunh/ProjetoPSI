<?php
    
    require_once($_SERVER["DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Facade/RelationWorkUser.php");
    
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
        $RelationWorkUser->Join(Joins::INNER, "tb_workType", [["iIdTypeWork", "iIdTypeWork"]], "TBTW", "TBW").
        $RelationWorkUser->Where([["bMainAuthor", '=', null ]], true);

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

    /*
    http://localhost/ProjetoPSI/Dashboard/pages/avaliar.php
    /*I've tried cleaning the string to conform to UTF-8 without any success. What worked for me - setting MySQL Names to UTF-8 prior to populating the array: 
        $mysqli->query("SET NAMES 'utf8'"); Now all special characters are displayed perfectly fine. */
?>