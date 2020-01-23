<?php
require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Object/Roles/obj.VerifyLogin.php");
require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Object/Roles/obj.VerifyAdminRole.php");
require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Object/Roles/obj.VerifyCO.php");
require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Object/Roles/obj.OutOfPermitionRedirect.php");
require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Facade/class.Scope.php");
$classScope = new Scope();

if (isset($_POST["iIdScope"])) {
    $classScope->readObject($_POST["iIdScope"]);
    $classScope->setVcName($_POST["vcName"]);
    $classScope->UpdateObject();

    echo json_encode(["msg" => "Ambito atualizado com sucesso"]);
}else{
    echo json_encode(["msg" => "Não foi possivel atualizar o Ambito"]);
}
