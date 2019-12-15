<?php


/* ==================================================================== 
        CLASS EVALUATION
====================================================================*/
    
       require("Bridge.php");
    
       class Evaluation extends Bridge{
        
        private $iIdEvaluation;
        private $iIdWork;
        private $vcReview;
        private $iRate;
    
        //construtor da class evaluation
        public function __construct(){
            parent::__construct("tb_Evaluation");
        }

    }
