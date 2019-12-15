<?php


/* ==================================================================== 
        CLASS SCOPE
       ====================================================================*/
    
       require("Bridge.php");
    
    
       class Scope extends Bridge{


        private $iIdScope;
        private $vcName;

        //construtor da class scope
        public function __construct(){
            parent::__construct("tb_Scope");
        }

    }

    var cScope = new Scope();
    var_dump($cScope->SelectAll());

    
?>