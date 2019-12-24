<?php
    session_start(); 
    require_once($_SERVER["DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Facade/User.php");

    function hashPass($password, $dtBirth){
        return hash("sha512", $password . "_" . $dtBirth);
    }

    function validateUser($username, $password){
        $user = new User();
        $user->readObject($username);
         if($user->GetVcPassword() != hashPass($password, $user->GetDtBirth())){
            header("location: " . $_SERVER["DOCUMENT_ROOT"] . "/ProjetoPSI/Login/index.php");
            die();
        }
    }
    session_destroy();
    var_dump($_SESSION);
    if(!isset($_SESSION["username"])){
        header("location: " . $_SERVER["DOCUMENT_ROOT"] . "/ProjetoPSI/Login/index.php");
    }else{
        validateUser($_SESSION["username"], $_SESSION["password"]);
        die();
    }
?>