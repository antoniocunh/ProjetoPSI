<?php
    
    require($_SERVER["DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Facade/UserType.php");
    $role = new UserType();
    $Query = $role->Select();

    echo json_encode($role->QueryExec($Query), JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
?>  