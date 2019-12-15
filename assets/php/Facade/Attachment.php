<?php


/* ==================================================================== 
        CLASS ATTACHMENT
====================================================================*/
    
require($_SERVER["DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Base/Bridge.php");
    
       class Attachment extends Bridge{
        
        private $iIdAttachment;
        private $iIdArticle;
        private $blAttachment;
        private $vcTitle;
        private $vcState;
        
        //construtor da class attachment
        public function __construct(){
            parent::__construct("tb_Attachment");
        }

    }
?>