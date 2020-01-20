<?php
require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Object/Roles/obj.VerifyLogin.php");
require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Object/Roles/obj.VerifyAdminRole.php");
require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Facade/class.Price.php");
$Price = new Price();

if (isset($_POST["dPrice"])) {
    $Price->readObject($_POST["iIdPrice"]);
    $Price->setdPrice($_POST["dPrice"]);
    $Price->setvcDescription($_POST["vcDescription"]);
    $Price->UpdateObject();

    echo json_encode(["msg" => "Priceo atualizado com sucesso"]);
}else{
    echo json_encode(["msg" => "Não foi possivel atualizar o Priceo"]);
}
