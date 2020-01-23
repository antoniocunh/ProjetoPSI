<?php
   require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Facade/class.Scope.php");
    $ambito = new Scope();

    echo json_encode($ambito->SelectAllBP(),JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
?>