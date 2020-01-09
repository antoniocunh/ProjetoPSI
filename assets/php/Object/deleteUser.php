<?php
    require($_SERVER["DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Facade/User.php");
    if(isset($_POST["username"])){
        $user = new User();
        $user->readObject($_POST["username"]);
        $user->DeleteObject();
    }
?>