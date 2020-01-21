<?php
ini_set('display_errors', 1);
    session_start();
    require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Facade/class.User.php");

    function hashPass($password, $dtBirth){
        return hash("sha512", $password . "_" . $dtBirth);
    }

    function validateUser($username, $password){
        $user2 = new User();
        $user2->readObject($username);
        if($user2->GetVcPassword() != hashPass($password, $user2->GetDtBirth())){
            header("location: Location: http://" . $_SERVER["SERVER_NAME"] . "/ProjetoPSI/Index.html");
            die();
        }
    }
    if(!isset($_SESSION["username"])){
        require($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Object/Login/obj.Logout.php");
    }else{
        validateUser($_SESSION["username"], $_SESSION["password"]);
        require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Object/ValidationDates/obj.DtEvent.php");
        $user1 = new User();
        $Columns = array(
            "iIdUserType"
        );
    
        $Query =
            $user1->Select($Columns) .
            $user1->Where([["vcUsername", '=', null]], true);
        
        $result = $user1->QueryExecute($Query, [$_SESSION["username"]], true);
        $validation = false;
    }

?>