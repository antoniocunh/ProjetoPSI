<?php
    require("User.php");
    session_start();
    $teste = new User();
    echo "<pre>";
    //var_dump($teste->SelectAllBP("vcName = ? And vcLastName = ?", "António", "Cunha"));
    $teste->saveObject("teste3");
    //var_dump($teste);
    echo "<pre>";
    //var_dump($_SESSION);

    
    $teste1 = new User();
    $teste1->saveObject("teste12334d");
    
    $teste1->removeObject();
    $teste1->setObject();

?>