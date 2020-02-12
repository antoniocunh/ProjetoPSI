<?php
    require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Object/Roles/obj.VerifyLogin.php");
    require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Object/Roles/obj.VerifyAdminRole.php");
    require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Facade/class.RelationWorkUser.php");
    require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Facade/class.User.php");
    $RelationWorkUser = new RelationWorkUser();
    $User = new User();
    $User->readObject($_SESSION["username"]);
    
    $ID = $User->getIIdUser();
    /*$Columns = array
    (
        array("TBW", "iIdWork"),
        array("TBW", "vcTitle"),
        array("TBW", "vcSummary"),
        array("TBU", "vcName"),
        array("TBTW", "vcDescription"),
        array("TBATT", "vcTitle"),
        array("TBATT", "iIdAttachment"),
        array("TBU", "vcLastName")
    );*/

    /*$Query =
        $RelationWorkUser->SelectJoin($Columns).
        $RelationWorkUser->Join(Joins::INNER, "tb_evaluation", [["iIdWork", "iIdWork"]], "TBE").
        $RelationWorkUser->Join(Joins::INNER, "tb_work", [["iIdWork", "iIdWork"]], "TBW").
        $RelationWorkUser->Join(Joins::INNER, "tb_user", [["iIDUser", "iIDUser"]], "TBU"). 
        $RelationWorkUser->Join(Joins::INNER, "tb_user", [["iIdReviewer", "iIDUser"]], "TBUA", "TBE"). 
        $RelationWorkUser->Join(Joins::INNER, "tb_attachment", [["iIdWork", "iIdWork"]], "TBATT", "TBW").
        $RelationWorkUser->Join(Joins::INNER, "tb_worktype", [["iIdTypeWork", "iIdTypeWork"]], "TBTW", "TBW").
        $RelationWorkUser->Where([["rwu.bMainAuthor", '=', "AND"], ["TBATT.enumState", "=", null], ["TBATT.vcUsername", "!=", null]], false);
*/
    $Query = "SELECT
    TW.iIdWork,
    TW.vcTitle,
      TW.vcSummary,
    CONCAT(TBU.vcName, ' ', TBU.vcLastName) AS vcFullName,
      WT.vcDescription,
    ATTp.vcTitle AS FicheiroProvisorio,
    ATTp.iIdAttachment AS BlobProvisorio
  FROM
      tb_work TW
    INNER JOIN tb_attachment ATTp ON
      ATTp.iIDWork = TW.iIdWork
          AND ATTp.enumState = 'Provisório'
      INNER JOIN tb_relationworkuser RWU ON
          RWU.iIdWork = TW.iIdWork
          AND RWU.bMainAuthor = 1
    INNER JOIN tb_user TBU ON
          TBU.iIdUser = RWU.iIdUser
      INNER JOIN tb_worktype WT ON
          WT.iIdTypeWork = TW.iIdTypeWork
  WHERE
      NOT EXISTS(SELECT * FROM tb_attachment WHERE iIDWork = TW.iIdWork AND enumState = 'Entrega Final')
      AND NOT EXISTS(SELECT * FROM tb_relationworkuser WHERE iIDWork = TW.iIdWork AND iIdUser =".$ID.")
      AND NOT EXISTS(SELECT * FROM tb_evaluation WHERE iIdWork = TW.iIdWork AND iIdReviewer =".$ID.")";

    echo json_encode($RelationWorkUser->QueryExec($Query), JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
?>