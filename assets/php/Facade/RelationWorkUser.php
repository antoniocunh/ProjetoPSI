<?php


/* ==================================================================== 
        CLASS RELATION_WORK_USER
====================================================================*/
    
require($_SERVER["DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Base/Bridge.php");
    
       class RelationWorkUser extends Bridge{
        
        private $idRelation;
        private $iIdUser;
        private $iIdWork;
        private $vcMainAuthor;
        private $vcSpeaker;
        
        //construtor da class relationworkuser
        public function __construct(){
            parent::__construct("tb_RelationWorkUser");
        }

    }
