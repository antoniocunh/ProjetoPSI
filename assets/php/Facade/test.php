<?php
    require("User.php");
    session_start();
    $teste = new User();
    echo "<pre>";
    //var_dump($teste->SelectAllBP("vcName = ? And vcLastName = ?", "António", "Cunha"));
    //var_dump($teste);

    //var_dump($_SESSION);

    
    $teste1 = new User();
    $teste1->readObject("teste1f234d");
    //$teste1->setVcCountry("França");
    //$teste1->UpdateObject();
    
    $teste1->InsertObject();

    //var_dump($teste1);
    /*$teste1->ReadObject("33333");
    //$teste1->UpdateObject();
    $teste1->DeleteObject();
    $teste1->InsertObject();
    */
    echo "</pre>";
?>
