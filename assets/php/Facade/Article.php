<?php


/* ==================================================================== 
        CLASS ARTICLE
====================================================================*/
    
require($_SERVER["DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Base/Bridge.php");
    
    class Article extends Bridge{
        
        private $iIdTypeWork;
        private $iIdScope;
        private $vcWork;
        private $vcTitle;
        private $vcSummary;
        
        //construtor da class article
        public function __construct(){  
            parent::__construct("tb_Article");
        }

    }
