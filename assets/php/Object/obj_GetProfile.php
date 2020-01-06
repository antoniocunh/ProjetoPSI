
<?php
     session_start();
       
     require($_SERVER["DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Facade/User.php");
 
     $CurrentUser = new User();
     $CurrentUser->readObject($_SESSION["username"]);

    echo json_encode($CurrentUser);
?>