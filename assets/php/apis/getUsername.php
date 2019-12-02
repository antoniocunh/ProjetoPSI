<?php
    require("../apis/getAllTables.php");
    if(isset($_POST['username'])){
        if(empty(selectAllDB("tb_User", "vcUserName like '{$_POST['username']}'" ))){
            echo json_encode("true");
        }else{
            echo json_encode("O username já existe.");
        }
    }
?>