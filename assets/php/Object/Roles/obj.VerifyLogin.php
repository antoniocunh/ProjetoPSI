<?php
ini_set('display_errors', 1);
    session_start();
    require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Object/ValidationDates/obj.DtEvent.php");
    require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Facade/class.User.php");

    function hashPass($password, $dtBirth){
        return hash("sha512", $password . "_" . $dtBirth);
    }

    function validateUser($username, $password){
        $user = new User();
        $user->readObject($username);
        if($user->GetVcPassword() != hashPass($password, $user->GetDtBirth())){
            header("location: Location: http://" . $_SERVER["SERVER_NAME"] . "/ProjetoPSI/Dashboard/pages/Profile.php");
            die();
        }
    }
    if(!isset($_SESSION["username"])){
        header("location: Location: http://" . $_SERVER["SERVER_NAME"] . "/ProjetoPSI/Dashboard/pages/Profile.php");
    }else{
        validateUser($_SESSION["username"], $_SESSION["password"]);
    }

    
    $user1 = new User();
    $Columns = array(
        "iIdUserType"
    );

    $Query =
        $user1->Select($Columns) .
        $user1->Where([["vcUsername", '=', null]], true);
    
    $result = $user1->QueryExecute($Query, [$_SESSION["username"]], true);
    $validation = false;
?>