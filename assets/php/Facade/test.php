<?php
ini_set('display_errors', 1);
echo "<pre>";

    var_dump($_SERVER);
    echo __DIR__ ."/user.php<BR>";
    echo $_SERVER["CONTEXT_DOCUMENT_ROOT"];
    require($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Base/Bridge.php");
?>
