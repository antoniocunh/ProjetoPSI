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
    
    public function readObject($id)
    {
        $count = 0;
        $array = $this->ReadObjectBD($id);
        
        foreach ($this as &$key) {
                $key = $array[$count++];
        }
    }

    public function InsertObject()
    {
        $this->InsertObjectBD(get_object_vars($this));
    }

    public function DeleteObject()
    {
        $id = $this->{$this->getColumn()};
        $this->DeleteObjectBD($id);
        //$this->ClearData();
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

    /**
     * Set the value of iIdAttachment
     *
     * @return  self
     */ 
    public function setIIdAttachment($iIdAttachment)
    {
        $this->iIdAttachment = $iIdAttachment;

        return $this;
    }

    /**
     * Set the value of iIdArticle
     *
     * @return  self
     */ 
    public function setIIdArticle($iIdArticle)
    {
        $this->iIdArticle = $iIdArticle;

        return $this;
    }

    /**
     * Set the value of blAttachment
     *
     * @return  self
     */ 
    public function setBlAttachment($blAttachment)
    {
        $this->blAttachment = $blAttachment;

        return $this;
    }

    /**
     * Set the value of vcTitle
     *
     * @return  self
     */ 
    public function setVcTitle($vcTitle)
    {
        $this->vcTitle = $vcTitle;

        return $this;
    }

    /**
     * Set the value of vcState
     *
     * @return  self
     */ 
    public function setVcState($vcState)
    {
        $this->vcState = $vcState;

        return $this;
    }
}
