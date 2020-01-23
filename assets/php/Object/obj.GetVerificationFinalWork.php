<?php
require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Facade/class.Attachment.php");

if (isset($_REQUEST["iIdWork"])) {
    $att = new Attachment();
    $att->readObject($_REQUEST["iIdWork"]);
    if ($att->getIIdWork() != null) {
        $RelationWorkUser = new Attachment();
        $Columns = array(
            array(null, "iIdAttachment"),
            array(null, "vcTitle")
        );

        $Query =
            $RelationWorkUser->SelectJoin($Columns) .
            $RelationWorkUser->Where([["iIdWork", "=", "and"], ["enumState", "=", null]], true);
        if ($result = $RelationWorkUser->QueryExecute($Query, [$att->getIIdWork(), "Entrega Final"], 1))
            echo json_encode($result);
        else
            echo "-1";
    } else {
        echo "-1";
    }
} else {
    echo "-1";
}
