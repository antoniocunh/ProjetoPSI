<?php
    require("User.php");
    session_start();
    $teste = new User();
    echo "<pre>";
    //var_dump($teste->SelectAllBP("vcName = ? And vcLastName = ?", "António", "Cunha"));
    $teste->GetObject("teste3");
    //var_dump($teste);
    echo "<pre>";
    //var_dump($_SESSION);

    
    $teste1 = new User();
    $teste1->GetObject("teste1");
    var_dump($teste1);
    $teste1->removeObject();
    $teste1->setObject();

?>