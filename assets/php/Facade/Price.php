<?php


/* ==================================================================== 
        CLASS PRICE
====================================================================*/
    
require($_SERVER["DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Base/Bridge.php");
    
       class Price extends Bridge{
        
        private $iIdPrice;
        private $dPrice;
        
        
        //construtor da class price
        public function __construct(){
            parent::__construct("tb_Price");
        }

    }
