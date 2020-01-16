<?php
ini_set('display_errors', 1);


/* ==================================================================== 
        CLASS EVALUATION
====================================================================*/

require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Base/Bridge.php");

class Evaluation extends Bridge implements JsonSerializable
{

    private $iIdEvaluation;
    private $iIdWork;
    private $vcReview;
    private $iRate;

    //construtor da class evaluation
    public function __construct()
    {
        parent::__construct("tb_evaluation", "iIdEvaluation", "EVA");
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
        $this->Insert($this->GetAtributesName(), get_object_vars($this));
    }

    public function UpdateObject()
    {
        $arrayFieldsUser = array();
        $columns = $this->GetAtributesName();
        $aData = get_object_vars($this);
        $arrayWhere = array(array($this->getColumn(),"=",null));

        array_push($aData, $aData[$this->getColumn()]);
        foreach($columns as $value){
            array_push($arrayFieldsUser, [$value, "="]);
        }

        $this->Update($arrayFieldsUser, $arrayWhere,  $aData);
    }

    public function DeleteObject()
    {
        $arrayWhere = array(array($this->getColumn(), "=", null));
        $Data = array($this->{$this->getColumn()});
        $Query= $this->Delete($arrayWhere, $Data);
        $this->ClearData();
    }

    private function ClearData()
    {
        foreach ($this as &$key)
        if(!($key instanceof Bridge))
            $key = null;
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
