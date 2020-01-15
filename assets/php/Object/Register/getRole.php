<?php
   
    require($_SERVER["DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Facade/Scope.php");
    $role = new UserType();

    echo json_encode($role->SelectAllBP(),JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
?>