<?php
    //require da verificação do login
    require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Object/Roles/obj.VerifyLogin.php");
    //require da verificação da role de admin
    require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Object/Roles/obj.VerifyAdminRole.php");
    //require da class user
    require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Facade/class.User.php");

    /**
     * Se o username nao for null o user será removido
     */
    //echo $_POST["username"];

    if(isset($_POST["username"])){
        $username = $_POST["username"];

        $user = new User();

        $user->readObject($username);
        $user->DeleteObject();

        echo json_encode(["msg" => $username . " removido com sucesso."]); //mensgaem json sucesso
    }else{
        echo json_encode(["msg" => "Não foi possivel remover o utilizador."]); //mensagem json erro
    }
?>