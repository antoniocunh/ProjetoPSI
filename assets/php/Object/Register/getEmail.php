<?php
//Mudar para o Bridge ou o Facade Que Interage com isto Provavelmente um Register.php
    
    require($_SERVER["DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Facade/User.php");

    if(isset($_POST['email'])){  
        $user = new User();
        if(empty($user->selectAll("vcEmail like '{$_POST['email']}'" ))){
            echo json_encode("true");
        }else{
            echo json_encode("O email já existe.");
        }
    }
?>