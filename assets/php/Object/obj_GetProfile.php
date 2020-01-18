
<?php
require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Object/verifyLogin.php");
require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Facade/User.php");

$CurrentUser = new User();
$CurrentUser->readObject($_SESSION["username"]);

echo json_encode($CurrentUser);
?>