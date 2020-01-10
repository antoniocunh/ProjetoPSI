<?php

    
    require($_SERVER["DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Evaluation.php");
    
    $Evaluation = new Evaluation();
    $Columns = array
    (
        array("iIDTypeWork", ""),
        array("iIDTypeWork", ""),
        array("iIDTypeWork", ""),
        array("iIDTypeWork", ""),
        array("iIDTypeWork", "")
    );
    
    $Query = 
    $Evaluation->SelectJoin($Columns).
    $Evaluation->Join().
    $Evaluation->Join().
    $Evaluation->Where();


    /*

    SELECT 
        TBA.iIDTypeWork AS idWork,
        TBU.iIdUser AS idUser,
        TBA.vcTitle,
        TBU.vcName,
        TBU.vcLastName,
        TBRWU.tiMainAuthor,
        TBRWU.tiSpeaker
    FROM tb_relationworkuser AS TBRWU
    INNER JOIN  tb_article AS TBA ON
        TBA.iIdWork = TBRWU.iIdWork
    INNER JOIN  tb_user AS TBU ON
        TBU.iIDUser = TBRWU.iIDUser
    WHERE 
        TBRWU.tiMainAuthor =1

    http://localhost/ProjetoPSI/Dashboard/pages/avaliar.php
    
    */
    echo json_encode($Article->QueryExec($Query), JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);

    /*I've tried cleaning the string to conform to UTF-8 without any success. What worked for me - setting MySQL Names to UTF-8 prior to populating the array: 
        $mysqli->query("SET NAMES 'utf8'"); Now all special characters are displayed perfectly fine. */
?>