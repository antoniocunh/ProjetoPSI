<?php
require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Object/Roles/obj.VerifyLogin.php");
require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Object/Roles/obj.VerifyAdminRole.php");
require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Facade/class.RelationWorkUser.php");

$RelationWorkUser = new RelationWorkUser();
$Columns = array
(
    array("TBU", "vcName"),
    array("TBU", "vcLastName")
);

$Query =
    $RelationWorkUser->SelectJoin($Columns).
    $RelationWorkUser->Join(Joins::INNER, "tb_user", [["iIdUser", "iIdUser"]], "TBU").
    $RelationWorkUser->Where([["iIdWork", "=", null]], true);

echo $Query;
echo json_encode($RelationWorkUser->QueryExec($Query, [2]), JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
?>