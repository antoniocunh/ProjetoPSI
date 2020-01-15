<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Object/verifyLogin.php");
    require_once($_SERVER["DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Facade/User.php");
    $user = new User();    
    $Query = $user->Select(["vcUsername"]);

    echo json_encode($user->QueryExec($Query), JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
    ?>