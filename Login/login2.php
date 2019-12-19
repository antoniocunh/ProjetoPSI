<?php

    session_start(); 
    
    require($_SERVER["DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Facade/User.php");

    function hashPass($password, $dtBirth){
        return hash("sha512", $password . "_" . $dtBirth);
    }

    function validateUser($username, $password){
        $user = new User();
        echo 1;
        $user->setObject($username);
         if($user->GetVcPassword() != hashPass($password, $user->GetDtBirth())){
             header("location: " . $_SERVER["DOCUMENT_ROOT"] . "/ProjetoPSI/Login/index.php");
        }/*else{
            $msg = "ok";
            echo json_encode(array("msg" => $msg)); // Sucesso na Autenticação
        }*/
    }
    

    if(isset($_SESSION["username"])){
        
       validateUser($_SESSION["username"], $_SESSION["password"]);
    }
    
    /*else{
        if (isset($_POST["login_button"]))
        {
          $username = trim($_POST['username']);
          $password = trim($_POST['password']);
          validateUser($username, $password);
          $_SESSION["username"] = $username;
          $_SESSION["password"] = $password;
        }
    }
    echo $user;*/
?>