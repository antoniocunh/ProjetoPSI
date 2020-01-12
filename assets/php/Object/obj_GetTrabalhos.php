<?php
    
    require($_SERVER["DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Facade/RelationWorkUser.php");
    
    $RelationWorkUser = new RelationWorkUser();
    $Columns = array
    (
        array("TBA", "iIdWork"),
        array("TBA", "vcTitle"),
        array("TBA", "vcSummary"),
        array("TBU", "vcName"),
        array("TBU", "vcLastName"),
        array("TBATT", "blAttachment")
    );

    $Query =
        $RelationWorkUser->SelectJoin($Columns). "<br>".
        $RelationWorkUser->Join(Joins::INNER, "tb_work", [["iIdWork", "iIdWork"]], "TBA"). "<br>".
        $RelationWorkUser->Join(Joins::INNER, "tb_user", [["iIDUser", "iIDUser"]], "TBU"). "<br>".
        $RelationWorkUser->Join(Joins::INNER, "tb_attachment", [["iIdWork", "iIdWork"]], "TBATT", "TBA"). "<br>".
        $RelationWorkUser->Where([["bMainAuthor", '=', null ]], true);


    echo json_encode($RelationWorkUser->QueryExecute($Query, ["1"], true), JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);

    /*
    http://localhost/ProjetoPSI/Dashboard/pages/avaliar.php
    /*I've tried cleaning the string to conform to UTF-8 without any success. What worked for me - setting MySQL Names to UTF-8 prior to populating the array: 
        $mysqli->query("SET NAMES 'utf8'"); Now all special characters are displayed perfectly fine. */
?>