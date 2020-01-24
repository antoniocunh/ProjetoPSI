<?php
    require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Object/Roles/obj.VerifyLogin.php");
    require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Object/Roles/obj.VerifyAdminRole.php");
    require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Facade/class.Evaluation.php");

    require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Proprieties/ConfigDB.php");
    
    $RelationWorkUser = new Evaluation();
    $Columns = array
    (
        array("distinct TBU", "vcName"),
        array("TBW", "vcTitle"),
        array("TBU", "vcLastName"),
        array("ATT", "vcTitle"),
        array("ATT", "iIdAttachment"),
        array("ATT", "enumState")
    );

    $Query = "SELECT
    TW.iIdWork,
    CONCAT(TBU.vcName, ' ', TBU.vcLastName) AS NomeCompletoAutor,
    TW.vcTitle AS Titulo,
    ATTp.vcTitle AS Ficheiro,
    ATTp.vcTitle AS Provisorio,
    ATTf.vcTitle AS Final,
    ATTp.iIdAttachment AS BlobProvisorio,
    ATTf.iIdAttachment AS BlobFinal
  FROM
      (SELECT DISTINCT iIdWork FROM tb_evaluation) AV
      INNER JOIN tb_worK TW ON
          TW.iIdWork = AV.iIDWork
      INNER JOIN tb_relationworkuser RWU ON
          RWU.iIDWork = TW.iIdWork
          AND RWU.bMainAuthor = 1
    INNER JOIN tb_user TBU ON
          TBU.iIdUser = RWU.iIdUser
    INNER JOIN tb_attachment ATTp ON
      ATTp.iIDWork = RWU.iIdWork
          AND ATTp.enumState = 'Provisório'
    LEFT OUTER JOIN tb_attachment ATTf ON
      ATTf.iIDWork = RWU.iIdWork
          AND ATTf.enumState = 'Entrega Final'";
    echo json_encode($RelationWorkUser->QueryExec($Query), JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);

    

/*try{
    echo json_encode($RelationWorkUser->QueryExec($Query), JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
}catch(PDOException $e){
    echo $e->getMessage();
}*/