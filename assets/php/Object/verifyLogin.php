<?php
ini_set('display_errors', 1);
    session_start();
    require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Object/validacaoDatas/obj_DtEvent.php");
    require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Facade/User.php");

    function hashPass($password, $dtBirth){
        return hash("sha512", $password . "_" . $dtBirth);
    }

    function validateUser($username, $password){
        $user = new User();
        $user->readObject($username);
        if($user->GetVcPassword() != hashPass($password, $user->GetDtBirth())){
            header("location: ../../Login/index.php");
            die();
        }
    }
    if(!isset($_SESSION["username"])){
        header("location: ../../Login/index.php");
    }else{
        validateUser($_SESSION["username"], $_SESSION["password"]);
    }
?>