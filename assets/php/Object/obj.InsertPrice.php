<?php
    require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Object/Roles/obj.VerifyLogin.php");
    require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Object/Roles/obj.VerifyAdminRole.php");
    require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Facade/class.Price.php");
    require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Facade/class.User.php");
    if(isset($_POST["dPrice"]) && isset($_SESSION["username"])){

          $user = new User();
          $user->readObject($_SESSION["username"]);

          $Price = new Price();
          $Price->setIIdPrice($Price->GetLastID("iIdPrice"));
          $Price->setDPrice($_POST["dPrice"]);
          $Price->setvcDescription($_POST["vcDescription"]);
          $Price->InsertObject();

          echo json_encode(["msg" => "Inserido com sucesso!"]);
        }else{
            echo json_encode(["msg" => "Algo deu errado!"]);
        }
