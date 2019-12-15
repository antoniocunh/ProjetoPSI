<?php


/* ==================================================================== 
        CLASS EVENT
====================================================================*/
    
require("../Base/Bridge.php");
    
       class Event extends Bridge{
        
        private $iIdEvent;
        private $vcTitle;
        private $vcDescription;
        private $dtIniSubmition;
        private $dtEndSubmition;
        private $dtIniEvaluation;
        private $dtEndEvaluation;
        private $dtResults;
        private $dtIniFinalSubmission;
        private $dtEndFinalSubmission;
        private $dtIniSubscription;
        private $dtEndSubscription;
        private $vcLocal;
        private $iIdOrganizer;
        private $dtIniEvent;
        private $dtEndEvent;

        

        public function __construct(){
            parent::__construct("tb_Event");
        }

    }