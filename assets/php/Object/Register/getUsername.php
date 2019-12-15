<?php
//Mudar para o Bridge ou o Facade Que Interage com isto Provavelmente um Register.php
    require("../../Facade/getAllTables.php");

    if(isset($_POST['username'])){
        if(empty(selectAllDB("tb_User", "vcUserName like '{$_POST['username']}'" ))){
            echo json_encode("true");
        }else{
            echo json_encode("O username já existe.");
        }
    }
?>