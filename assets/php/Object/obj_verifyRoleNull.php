<?php
require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Facade/User.php");

$user = new User();
$Columns = array(
    "iIdUserType"
);

$Query =
    $user->Select($Columns) .
    $user->Where([["vcUsername", '=', null]], true);

$result = $user->QueryExecute($Query, [$_SESSION["username"]], true);
if ($result[0]["iIdUserType"] != null)
    header("Location: http://" . $_SERVER["SERVER_NAME"] . "/ProjetoPSI/Dashboard/pages/perfil.php");
