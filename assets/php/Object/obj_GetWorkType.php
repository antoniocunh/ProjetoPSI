<?php
    require($_SERVER["DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Facade/WorkType.php");
    $WorkType = new WorkType();
    
    echo json_encode($WorkType->SelectAllBP(),JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
?>