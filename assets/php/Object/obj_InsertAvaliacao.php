<?php
    require_once($_SERVER["DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Object/verifyLogin.php");
    require($_SERVER["DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Facade/Evaluation.php");
      if(isset($_POST["vcReview"])){

          $Evaluation = new Evaluation();
          $Evaluation->setiIdEvaluation($Evaluation->GetLastID("iIdEvaluation"));//Set do last index
          $Evaluation->setiIdWork($_POST["iIdWork"]);
          $Evaluation->setvcReview($_POST["vcReview"]);
          $Evaluation->setiRate($_POST["iRate"]);
          $Evaluation->InsertObject();

          echo json_encode(["msg" => "Inserido com sucesso!"]);
        }else{
            echo json_encode(["msg" => "Algo deu errado!"]);
        }
