<?php
    require("User.php");
    session_start();
    $teste = new User();
    echo "<pre>";
    //var_dump($teste->SelectAllBP("vcName = ? And vcLastName = ?", "António", "Cunha"));
    //var_dump($teste);

    //var_dump($_SESSION);

    
    $teste1 = new User();
    $teste1->ReadObject("teste2");
    $teste1->UpdateObject();
    $teste1->DeleteObject();
    $teste1->InsertObject();

    echo "</pre>";
?>
