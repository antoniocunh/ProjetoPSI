<?php
require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Object/verifyLogin.php");
require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Object/obj_verifyRoleAdmin.php");
require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Facade/User.php");
if (isset($_POST["username"]) && isset($_SESSION["username"])) {
    if ($_POST["pass1"] == $_POST["pass2"]) {
        $user = new User();
        $user->setVcName($_POST["nome"]);
        $user->setVcLastName($_POST["ultimoNome"]);
        $user->setVcPhoneNumber($_POST["telefone"]);
        $user->setVcAfiliation($_POST["organizacao"]);
        $user->setIIdScope($_POST["scope"]);
        $user->setDtBirth($_POST["dataNascimento"]);
        $user->setVcAddress($_POST["morada"]);
        $user->setVcCountry($_POST["pais"]);
        $user->setVcCity($_POST["cidade"]);
        $user->setVcPostalCode($_POST["codPostal"]);
        $user->setVcUsername($_POST["username"]);
        $user->setVcEmail($_POST["email"]);
        $user->setVcPassword($_POST["pass1"]);
        $user->setIIdUserType($_POST["role"]);
        $user->setEnumUserStatus("N");
        $user->InsertObject();
        $msg = json_encode(["msg" => "Utilizador criado com sucesso!"]);
    }else{
        $msg = json_encode(["msg" => "Não foi possivel criar o utilizador!"]);
    }
    
}else{
    $msg = json_encode(["msg" => "Não foi possivel criar o utilizador!"]);
}
echo $msg;

