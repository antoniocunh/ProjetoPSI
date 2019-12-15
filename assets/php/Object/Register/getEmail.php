<?php
//Mudar para o Bridge ou o Facade Que Interage com isto Provavelmente um Register.php
    require("../apis/getAllTables.php");
    if(isset($_POST['email'])){
        if(empty(selectAllDB("tb_User", "vcEmail like '{$_POST['email']}'" ))){
            echo json_encode("true");
        }else{
            echo json_encode("O email já existe.");
        }
    }
?>