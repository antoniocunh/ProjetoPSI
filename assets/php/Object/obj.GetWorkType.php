<?php
    require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Facade/class.WorkType.php");
    $WorkType = new WorkType();
    
    echo json_encode($WorkType->SelectAllBP(),JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
?>