<?php
    require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Object/Roles/obj.VerifyLogin.php");
    require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Object/Roles/obj.VerifyAdminRole.php");
    require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Object/Roles/obj.VerifyCO.php");
    require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Object/Roles/obj.OutOfPermitionRedirect.php");
    require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Facade/class.Scope.php");
    require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Facade/class.User.php");
    if(isset($_POST["vcName"]) && isset($_SESSION["username"])){

          $user = new User();
          $user->readObject($_SESSION["username"]);

          $classScope = new Scope();
          $classScope->setIIdScope($classScope->GetLastID("iIdScope"));
          $classScope->setVcName($_POST["vcName"]);
          $classScope->InsertObject();

          echo json_encode(["msg" => "Inserido com sucesso!"]);
        }else{
            echo json_encode(["msg" => "Algo deu errado!"]);
        }