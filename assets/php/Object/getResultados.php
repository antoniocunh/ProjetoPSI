<?php
    require($_SERVER["DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Facade/Evaluation.php");


    $Columns = array
    (
        array(null,"vcReview"),
        array(null,"iRate")
    );

    $join = array(
        array("vcReview","vcName")
    );

    /*SELECT * tb_evaluation
    inner join tb_work on
    eva.idWork = work.idwork and
    inner join tb_relationworkuser on
    wokr.idwork = rwu.iwork*/

    $arrayFieldsUser = array();
    array_push($arrayFieldsUser, "vcName");
    array_push($arrayFieldsUser, "vc");

    $arrayOperators = array();
    array_push($arrayOperators, "=");
    array_push($arrayOperators, htmlspecialchars("<"));

    
    $resultados = new Evaluation();
    $Query=
        $resultados->SelectJoin($Columns).
        $resultados->Join("tb_user", "u", "vcName", Joins::INNER).
        $resultados->Where($arrayFieldsUser[0], htmlspecialchars("<"));
        
        
        echo $Query;
?>