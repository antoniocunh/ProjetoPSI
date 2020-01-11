<?php
    
    require($_SERVER["DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Facade/RelationWorkUser.php");
    
    $RelationWorkUser = new RelationWorkUser();
    $Columns = array
    (
        array("TBA", "iIdWork"),
        array("TBU", "iIdUser"),
        array("TBA", "vcTitle"),
        array("TBU", "vcName"),
        array("TBU", "vcLastName")
    );

    $Query = 
    $RelationWorkUser->SelectJoin($Columns).
    $RelationWorkUser->Join("tb_article", "TBA", [["iIdWork", "iIdWork"]], Joins::INNER).
    $RelationWorkUser->Join("tb_user", "TBU", [["iIDUser", "iIDUser"]], Joins::INNER).
    $RelationWorkUser->Where([["bMainAuthor", '=', null ]], true);
    
    echo json_encode($RelationWorkUser->QueryExecute($Query, ["1"], true), JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
    
    /*
    http://localhost/ProjetoPSI/Dashboard/pages/avaliar.php
    /*I've tried cleaning the string to conform to UTF-8 without any success. What worked for me - setting MySQL Names to UTF-8 prior to populating the array: 
        $mysqli->query("SET NAMES 'utf8'"); Now all special characters are displayed perfectly fine. */
?>