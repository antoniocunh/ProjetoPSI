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

    $Query = "SELECT DISTINCT TW.iIdWork,(SELECT CONCAT( TU.vcName, ' ', TU.vcLastName) As NameAutor FROM tb_relationworkuser AS TBWR INNER JOIN tb_user AS TU ON TU.iIdUser = TBWR.iIdUser WHERE TBWR.iIdWork = TW.iIdWork AND TBWR.bMainAuthor = 1) AS NomeCompletoAutor, TW.vcTitle AS Titulo, ATT.vcTitle AS Ficheiro, (SELECT AT.vcTitle from tb_attachment as AT WHERE AT.iIdWork = TW.iIdWork AND AT.enumState = 'Provisório') AS Provisorio, (SELECT AT.vcTitle from tb_attachment as AT WHERE AT.iIdWork = TW.iIdWork AND AT.enumState = 'Entrega Final') AS Final, (SELECT AT.iIdAttachment from tb_attachment as AT WHERE AT.iIdWork = TW.iIdWork AND AT.enumState = 'Provisório') AS BlobProvisorio, (SELECT AT.iIdAttachment from tb_attachment as AT WHERE AT.iIdWork = TW.iIdWork AND AT.enumState = 'Entrega Final') AS BlobFinal FROM tb_worK as TW INNER JOIN tb_relationworkuser as RWU ON RWU.iIDWork = TW.iIdWork INNER JOIN tb_attachment as ATT ON ATT.iIDWork = TW.iIdWork INNER JOIN tb_evaluation as AV ON AV.iIDWork = TW.iIdWork INNER JOIN tb_user AS TBU ON TBU.iIdUser = AV.iIdReviewer WHERE RWU.bMainAuthor = 1 and ATT.enumState = 'Provisório'";
    echo json_encode($RelationWorkUser->QueryExec($Query), JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);

    /*SELECT CONCAT( TBU.vcName, ' ', TBU.vcLastName) As FullName, TW.vcTitle AS Titulo, ATT.vcTitle AS Ficheiro, ATT.iIdAttachment, ATT.enumState
    FROM 
     (
        SELECT * from tb_work as TBW
        UNION ALL
        SELECT * from tb_evaluation as EVA
     ) As tbUnion
     INNER JOIN tb_attachment as ATT ON
      ATT.iIDWork = tbUnion.iIdWork
     INNER JOIN tb_evaluation as AV ON
      AV.iIDWork = tbUnion.iIdWork
     INNER JOIN tb_user AS TBU ON
      TBU.iIdUser = AV.iIdReviewer
     INNER JOIN tb_work AS TW ON
      TW.iIdWork = tbUnion.iIdWork
ORDER BY `AV`.`iIdEvaluation` ASC
*/
    

/*try{
    echo json_encode($RelationWorkUser->QueryExec($Query), JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
}catch(PDOException $e){
    echo $e->getMessage();
}*/