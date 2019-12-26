<?php
    require($_SERVER["DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Facade/Evaluation.php");

    $resultados = new Evaluation();
    $Query=
        $resultados->SelectJoin(array("vcReview", "iRate")).
        $resultados->Join("tb_user", "u", array("vcName"), Joins::INNER).
        $resultados->Where("vcReview", "<");

        echo $Query;
?>