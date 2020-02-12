<?php
//require da verificação do login
require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Object/Roles/obj.VerifyLogin.php");
//require da class evaluation
require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Facade/class.Evaluation.php");

$evaluation = new Evaluation();
$Columns = array(
    array("TBU", "vcName"),
    array("TBW", "vcTitle"),
    array(null, "iRate"),
    array(null, "vcReview"),
    array("TBU", "vcLastName"),
);
if (isset($_POST["iIdWork"])) {
    $Query =
        $evaluation->SelectJoin($Columns) .
        $evaluation->Join(Joins::INNER, "tb_work", [["iIdWork", "iIdWork"]], "TBW") .
        $evaluation->Join(Joins::INNER, "tb_user", [["iIdReviewer", "iIDUser"]], "TBU") .
        $evaluation->Where([["iIdWork", "=", null]], true);

    echo json_encode($evaluation->QueryExecute($Query, [$_POST["iIdWork"]], true), JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
}

