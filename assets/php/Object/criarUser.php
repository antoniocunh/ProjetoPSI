<?php
require($_SERVER["DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Facade/User.php");
session_start();
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
        $user->InsertObject();
        header("location: " .  $_SERVER["DOCUMENT_NAME"] . "/ProjetoPSI/Dashboard/pages/gerirutilizadores.php");
    }
}
