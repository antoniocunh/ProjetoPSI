<?php
    //require da verificação do login
    require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Object/Roles/obj.VerifyLogin.php");
    //require da verificação da role de admin
    require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Object/Roles/obj.VerifyAdminRole.php");
    require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Object/Roles/obj.VerifyCO.php");
    require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Object/Roles/obj.OutOfPermitionRedirect.php");
    //require da class user
    require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Facade/class.Scope.php");

    /**
     * Se o username nao for null o user será removido
     */
    //echo $_POST["username"];

    if(isset($_POST["iIdScope"])){
        $iIdScope = $_POST["iIdScope"];

        $scopeclass = new Scope();

        $scopeclass->readObject($iIdScope);
        $Name = $scopeclass->getVcName();
        $scopeclass->DeleteObject();

        echo json_encode(["msg" => $Name . " removido com sucesso."]); //mensgaem json sucesso
    }else{
        echo json_encode(["msg" => "0"]); //mensagem json erro
    }
?>