<?php
    require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Object/verifyLogin.php");
    require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Object/obj_verifyRoleAdmin.php");
    require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Facade/Evaluation.php");
    require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Facade/User.php");
    if(isset($_POST["vcReview"]) && isset($_SESSION["username"])){

          $user = new User();
          $user->readObject($_SESSION["username"]);

          $Evaluation = new Evaluation();
          $Evaluation->setIIdEvaluation($Evaluation->GetLastID("iIdEvaluation"));//Set do last index
          $Evaluation->setIIdWork($_POST["iIdWork"]);
          $Evaluation->setvcReview($_POST["vcReview"]);
          $Evaluation->setIIDReviewer($user->getIIdUser());
          $Evaluation->setIRate($_POST["iRate"]);
          $Evaluation->InsertObject();

          echo json_encode(["msg" => "Inserido com sucesso!"]);
        }else{
            echo json_encode(["msg" => "Algo deu errado!"]);
        }
