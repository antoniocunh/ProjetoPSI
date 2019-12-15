<?php


/* ==================================================================== 
        CLASS ARTICLE
====================================================================*/
    
       require("Bridge.php");
    
       class Article extends MiddleMan{
        
        private $iIdTypeWork;
        private $iIdScope;
        private $vcWork;
        private $vcTitle;
        private $vcSummary;
        

        public function __construct(){
            parent::__construct("tb_Article");
        }

    }
