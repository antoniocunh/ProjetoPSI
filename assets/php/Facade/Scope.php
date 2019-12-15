<?php


/* ==================================================================== 
        CLASS SCOPE
       ====================================================================*/
    
       require("../Base/Bridge.php");
    
    
       class Scope extends Bridge{


        private $iIdScope;
        private $vcName;

        //construtor da class scope
        public function __construct(){
            parent::__construct("tb_Scope");
        }

    }

    $cScope = new Scope();
    echo "<pre>";
    var_dump($cScope->SelectAll());
    echo "</pre>";

    
?>