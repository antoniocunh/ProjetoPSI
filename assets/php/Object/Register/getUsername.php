<?php
//Mudar para o Bridge ou o Facade Que Interage com isto Provavelmente um Register.php
require($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Facade/User.php");

    if(isset($_POST['username'])){
        $user = new User();
        if(empty($user->selectAllBP("vcUserName like '{$_POST['username']}'" ))){
            echo json_encode("true");
        }else{
            echo json_encode("O username já existe.");
        }
    }
?>