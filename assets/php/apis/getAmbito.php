<?php
    require('../library/configDatabase.php');
    require('../apis/getAllTables.php');

    $a = json_encode(selectAllDB("tb_Scope", "1=1"),JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
    echo $a;
?>