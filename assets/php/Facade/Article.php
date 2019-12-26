<?php


/* ==================================================================== 
        CLASS ARTICLE
====================================================================*/

require($_SERVER["DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Base/Bridge.php");

class Article extends Bridge implements JsonSerializable
{

    private $iIdTypeWork;
    private $iIdScope;
    private $vcWork;
    private $vcTitle;
    private $vcSummary;

    //construtor da class article
    public function __construct()
    {
        parent::__construct("tb_Article", "iIdArticle", "ar");
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

    public function jsonSerialize(){
        $json =  array();
        foreach ($this as $key => &$value) {
            $json += [$key=>$value];
        }
        return $json;
    }



    /**
     * Get the value of iIdTypeWork
     */ 
    public function getIIdTypeWork()
    {
        return $this->iIdTypeWork;
    }

    /**
     * Get the value of iIdScope
     */ 
    public function getIIdScope()
    {
        return $this->iIdScope;
    }

    /**
     * Get the value of vcWork
     */ 
    public function getVcWork()
    {
        return $this->vcWork;
    }

    /**
     * Get the value of vcTitle
     */ 
    public function getVcTitle()
    {
        return $this->vcTitle;
    }

    /**
     * Get the value of vcSummary
     */ 
    public function getVcSummary()
    {
        return $this->vcSummary;
    }

    /**
     * Set the value of iIdTypeWork
     *
     * @return  self
     */ 
    public function setIIdTypeWork($iIdTypeWork)
    {
        $this->iIdTypeWork = $iIdTypeWork;

        return $this;
    }

    /**
     * Set the value of iIdScope
     *
     * @return  self
     */ 
    public function setIIdScope($iIdScope)
    {
        $this->iIdScope = $iIdScope;

        return $this;
    }

    /**
     * Set the value of vcWork
     *
     * @return  self
     */ 
    public function setVcWork($vcWork)
    {
        $this->vcWork = $vcWork;

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
     * Set the value of vcSummary
     *
     * @return  self
     */ 
    public function setVcSummary($vcSummary)
    {
        $this->vcSummary = $vcSummary;

        return $this;
    }
}
