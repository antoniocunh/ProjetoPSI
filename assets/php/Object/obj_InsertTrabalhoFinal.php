<?php

require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Object/verifyLogin.php");
require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Facade/Attachment.php");
var_dump($_FILES);
if (isset($_FILES["file"]) && isset($_POST["iIdWork"])) {
  //1º Insert
  try{
  $Attachment = new Attachment();
  $Attachment->setIIdAttachment($Attachment->GetLastID("iIdAttachment")); //Set do last index
  $Attachment->setIIdWork($_POST["iIdWork"]);
  $Attachment->setBlAttachment($_FILES["file"]["tmp_name"]);
  $Attachment->setVcTitle($_FILES["file"]["name"]);
  $Attachment->setEnumState("Entrega Final");
  $Attachment->InsertObject();
  $msg = "Trabalho final inserido com sucesso.";
  }catch(PDOException $e){
      $msg = "Só pode entregar 1 trabalho final!";
  }
}else{
  $msg = "Não foi possivel adicionar o trabalho final á base de dados.";
}
echo json_encode(["msg"=>$msg]);

?>