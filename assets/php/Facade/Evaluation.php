<?php


/* ==================================================================== 
        CLASS EVALUATION
====================================================================*/

require($_SERVER["DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Base/Bridge.php");

class Evaluation extends Bridge implements JsonSerializable
{

    private $iIdEvaluation;
    private $iIdWork;
    private $vcReview;
    private $iRate;

    //construtor da class evaluation
    public function __construct()
    {
        parent::__construct("tb_Evaluation", "iIdEvaluation", "eva");
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
     * Get the value of iIdEvaluation
     */ 
    public function getIIdEvaluation()
    {
        return $this->iIdEvaluation;
    }

    /**
     * Get the value of iIdWork
     */ 
    public function getIIdWork()
    {
        return $this->iIdWork;
    }

    /**
     * Get the value of vcReview
     */ 
    public function getVcReview()
    {
        return $this->vcReview;
    }

    /**
     * Get the value of iRate
     */ 
    public function getIRate()
    {
        return $this->iRate;
    }

    /**
     * Set the value of iIdEvaluation
     *
     * @return  self
     */ 
    public function setIIdEvaluation($iIdEvaluation)
    {
        $this->iIdEvaluation = $iIdEvaluation;

        return $this;
    }

    /**
     * Set the value of iIdWork
     *
     * @return  self
     */ 
    public function setIIdWork($iIdWork)
    {
        $this->iIdWork = $iIdWork;

        return $this;
    }

    /**
     * Set the value of vcReview
     *
     * @return  self
     */ 
    public function setVcReview($vcReview)
    {
        $this->vcReview = $vcReview;

        return $this;
    }

    /**
     * Set the value of iRate
     *
     * @return  self
     */ 
    public function setIRate($iRate)
    {
        $this->iRate = $iRate;

        return $this;
    }
}
