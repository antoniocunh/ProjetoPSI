<?php
require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Object/verifyLogin.php");
require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Facade/Work.php");
require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Facade/User.php");
require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Facade/Attachment.php");
require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Facade/RelationWorkUser.php");

if (isset($_POST["vcTitle"]) && isset($_POST["vcSummary"])) {

  //1º Insert
  $Work = new Work();
  $Work->setIIdWork($Work->GetLastID("iIdWork")); //Set do last index

  $Work->setIIDTypeWork($_POST["iIdTypeWork"]); //Define o tipo de trabalho - este campo é uma foreign key da tb_worktype
  $Work->setIIdScope($_POST["iIdScope"]);
  $Work->setVcTitle($_POST["vcTitle"]);
  $Work->setVcSummary($_POST["vcSummary"]);
  $Work->InsertObject();

  //2º Insert
  $Attachment = new Attachment();
  $Attachment->setIIdAttachment($Attachment->GetLastID("iIdAttachment")); //Set do last index
  $Attachment->setiIdWork($Work->getIIdWork());
  $Attachment->setBlAttachment($_FILES["file"]["tmp_name"]);
  $Attachment->setVcTitle($_FILES["file"]["name"]);
  $Attachment->setenumState("Provisório");
  $Attachment->InsertObject();

  //3º Insert
  foreach ($_POST["membros"] as $element) {
    $user = new User();
    $user->readObject($element);
    $RelationWorkUser = new RelationWorkUser();
    $RelationWorkUser->setIdRelation($RelationWorkUser->GetLastID("IdRelation")); //Set do last index

    $RelationWorkUser->setIIdUser($user->getIIdUser()); // Vai buscar o id consoante o vcusername escolhido na interface
    $RelationWorkUser->setIIdWork($Work->getIIdWork());
    if (in_array($element, $_POST["speakers"])) {
      $speakers = 1;
    } else {
      $speakers = 0;
    }

    if ($element == $_POST["autorP"]) {
      $autorP = 1;
    } else {
      $autorP = 0;
    }

    $RelationWorkUser->setBMainAuthor($autorP);
    $RelationWorkUser->setBSpeaker($speakers);
    $RelationWorkUser->InsertObject();
  }
  echo json_encode(["msg" => $_FILES["file"]["tmp_name"] . "Inserido com sucesso!"]);
} 
else 
{
  echo json_encode(["msg" => "Algo deu errado!"]);
}

?>