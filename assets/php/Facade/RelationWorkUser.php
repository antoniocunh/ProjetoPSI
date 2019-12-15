<?php


/* ==================================================================== 
        CLASS RELATION_WORK_USER
====================================================================*/
    
       require("Bridge.php");
    
       class RelationWorkUser extends Bridge{
        
        private $idRelation;
        private $iIdUser;
        private $iIdWork;
        private $vcMainAuthor;
        private $vcSpeaker;
        

        public function __construct(){
            parent::__construct("tb_RelationWorkUser");
        }

    }
