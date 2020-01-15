<?php
session_start();
require_once($_SERVER["DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Facade/User.php");
if (isset($_SESSION["username"])) {

    $user = new User();
    $Columns = array(
        "iIdUserType"
    );

    $Query =
        $user->Select($Columns) .
        $user->Where([["vcUsername", '=', null]], true);

    echo json_encode($user->QueryExecute($Query, [$_SESSION["username"]], true), JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
}
