<?php


/* ==================================================================== 
        CLASS ATTACHMENT
====================================================================*/

require($_SERVER["DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Base/Bridge.php");

class Attachment extends Bridge
{

    private $iIdAttachment;
    private $iIdArticle;
    private $blAttachment;
    private $vcTitle;
    private $vcState;

    //construtor da class attachment
    public function __construct()
    {
        parent::__construct("tb_Attachment", "iIdAttachment");
    }


    /**
     * Get the value of iIdAttachment
     */ 
    public function getIIdAttachment()
    {
        return $this->iIdAttachment;
    }

    /**
     * Get the value of iIdArticle
     */ 
    public function getIIdArticle()
    {
        return $this->iIdArticle;
    }

    /**
     * Get the value of blAttachment
     */ 
    public function getBlAttachment()
    {
        return $this->blAttachment;
    }

    /**
     * Get the value of vcTitle
     */ 
    public function getVcTitle()
    {
        return $this->vcTitle;
    }

    /**
     * Get the value of vcState
     */ 
    public function getVcState()
    {
        return $this->vcState;
    }
}
