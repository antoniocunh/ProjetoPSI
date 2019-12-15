<?php


/* ==================================================================== 
        CLASS ARTICLE
====================================================================*/
    
require("../Base/Bridge.php");
    
    class Article extends Bridge{
        
        private $iIdTypeWork;
        private $iIdScope;
        private $vcWork;
        private $vcTitle;
        private $vcSummary;
        

        public function __construct(){
            parent::__construct("tb_Article");
        }

    }
