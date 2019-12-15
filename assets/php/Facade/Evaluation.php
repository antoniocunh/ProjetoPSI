<?php


/* ==================================================================== 
        CLASS EVALUATION
====================================================================*/
    
require($_SERVER["DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Base/Bridge.php");
    
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
