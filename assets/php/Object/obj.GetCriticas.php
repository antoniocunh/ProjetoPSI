<?php
//require da verificação do login
require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Object/Roles/obj.VerifyLogin.php");
//require da class evaluation
require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Facade/class.Evaluation.php");

$RelationWorkUser = new Evaluation();
$Columns = array(
    array("TBU", "vcName"),
    array("TBW", "vcTitle"),
    array(null, "iRate"),
    array(null, "iIdReviewer"),
    array("TBU", "vcLastName"),
);
var_dump($_POST["iIdWork"]);
if (isset($_POST["iIdWork"])) {
    $Query =
        $RelationWorkUser->SelectJoin($Columns) .
        $RelationWorkUser->Join(Joins::INNER, "tb_work", [["iIdWork", "iIdWork"]], "TBW") .
        $RelationWorkUser->Join(Joins::INNER, "tb_user", [["iIdReviewer", "iIDUser"]], "TBU") .
        $RelationWorkUser->Where([["vciIdUser", "=", null]], true);

    echo json_encode($RelationWorkUser->QueryExecute($Query, [$_POST["iIdWork"]]), JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
}
