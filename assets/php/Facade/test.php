<?php
    require("User.php");
    session_start();
    $teste = new User();
    echo "<pre>";
    //var_dump($teste->SelectAllBP("vcName = ? And vcLastName = ?", "António", "Cunha"));
    //var_dump($teste);

    //var_dump($_SESSION);

    
    $teste1 = new User();
    $teste1->saveObject("tedste1234d");
    
    $teste1->removeObject();
    $teste1->setObject();

    echo "</pre>";
?>
