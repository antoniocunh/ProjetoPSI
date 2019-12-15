<?php


/* ==================================================================== 
        CLASS WORK_TYPE
====================================================================*/
    
require("../Base/Bridge.php");
    
       class WorkType extends Bridge{
        
        private $iIdTypeWork;
        private $vcDescription;
       
        public function __construct(){
            parent::__construct("tb_WorkType");
        }

    }