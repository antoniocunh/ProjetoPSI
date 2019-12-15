<?php
    require("../../Proprieties/ConfigDB.php");
    //Mudar para o Bridge ou o Facade Que Interage com isto Provavelmente um Register.php
    require("../../Facade/Scope.php");
   
    $a = json_encode(selectAllDB("tb_Scope", "1=1"),JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
    echo $a;
?>