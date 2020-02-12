<?php
require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Object/Roles/obj.VerifyLogin.php");
require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Facade/class.Work.php");
require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Facade/class.User.php");
require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Facade/class.Attachment.php");
require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Facade/class.RelationWorkUser.php");

if(isset($_POST["vcTitle"]) && isset($_POST["vcSummary"]) && isset($_POST["autorP"]) && isset($_POST["speakers"]) && isset($_POST["membros"])) {
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
  foreach (json_decode($_POST["membros"]) as $element) 
  {
    $user = new User();
    $user->readObject($element);
  
    if($user->getIIdUserType() == 7){
      $user->setIIdUserType(4);
      $user->UpdateObject();
    }

    $RelationWorkUser = new RelationWorkUser();
    $RelationWorkUser->setIdRelation($RelationWorkUser->GetLastID("IdRelation")); //Set do last index

    $RelationWorkUser->setIIdUser($user->getIIdUser()); // Vai buscar o id consoante o vcusername escolhido na interface
    $RelationWorkUser->setIIdWork($Work->getIIdWork());

    $speakers = in_array($element, json_decode($_POST["speakers"])) ? 1 : 0;
    $autorP = $element == $_POST["autorP"] ? 1 : 0;

    $RelationWorkUser->setBMainAuthor($autorP);
    $RelationWorkUser->setBSpeaker($speakers);
    $RelationWorkUser->InsertObject();
  }

  $msg = "Inserido com sucesso!";
} 
else 
  $msg = "Algo deu errhhhhado!";

  echo json_encode(["msg" => $msg]);

?>