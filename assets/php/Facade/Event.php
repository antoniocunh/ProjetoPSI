<?php


/* ==================================================================== 
        CLASS EVENT
====================================================================*/

require_once($_SERVER["DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Base/Bridge.php");

class Event extends Bridge implements JsonSerializable
{

    private $iIdEvent;
    private $vcTitle;
    private $vcDescription;
    private $vcAbout;
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
    private $dtIniEvent;
    private $dtEndEvent;

    //construtor da class event
    public function __construct()
    {
        parent::__construct("tb_Event", "iIdEvent", "eve");
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
        //$this->setIIdUser(420);
        //$this->setvcEmail("99@gmail.com");
        //$this->setvcUsername("BoaHancock");
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
     * Get the value of iIdEvent
     */ 
    public function getIIdEvent()
    {
        return $this->iIdEvent;
    }

    /**
     * Get the value of vcTitle
     */ 
    public function getVcTitle()
    {
        return $this->vcTitle;
    }

    /**
     * Get the value of vcDescription
     */ 
    public function getVcDescription()
    {
        return $this->vcDescription;
    }

    /**
     * Get the value of dtIniSubmition
     */ 
    public function getDtIniSubmition()
    {
        return $this->dtIniSubmition;
    }

    /**
     * Get the value of dtEndSubmition
     */ 
    public function getDtEndSubmition()
    {
        return $this->dtEndSubmition;
    }

    /**
     * Get the value of dtIniEvaluation
     */ 
    public function getDtIniEvaluation()
    {
        return $this->dtIniEvaluation;
    }

    /**
     * Get the value of dtEndEvaluation
     */ 
    public function getDtEndEvaluation()
    {
        return $this->dtEndEvaluation;
    }

    /**
     * Get the value of dtResults
     */ 
    public function getDtResults()
    {
        return $this->dtResults;
    }

    /**
     * Get the value of dtIniFinalSubmission
     */ 
    public function getDtIniFinalSubmission()
    {
        return $this->dtIniFinalSubmission;
    }

    /**
     * Get the value of dtEndFinalSubmission
     */ 
    public function getDtEndFinalSubmission()
    {
        return $this->dtEndFinalSubmission;
    }

    /**
     * Get the value of dtIniSubscription
     */ 
    public function getDtIniSubscription()
    {
        return $this->dtIniSubscription;
    }

    /**
     * Get the value of dtEndSubscription
     */ 
    public function getDtEndSubscription()
    {
        return $this->dtEndSubscription;
    }

    /**
     * Get the value of vcLocal
     */ 
    public function getVcLocal()
    {
        return $this->vcLocal;
    }

    /**
     * Get the value of iIdOrganizer
     */ 
    public function getIIdOrganizer()
    {
        return $this->iIdOrganizer;
    }

    /**
     * Get the value of dtIniEvent
     */ 
    public function getDtIniEvent()
    {
        return $this->dtIniEvent;
    }

    /**
     * Get the value of dtEndEvent
     */ 
    public function getDtEndEvent()
    {
        return $this->dtEndEvent;
    }

    /**
     * Get the value of vcAbout
     */ 
    public function getVcAbout()
    {
        return $this->vcAbout;
    }

    //======================================================================

    /**
     * Set the value of iIdEvent
     *
     * @return  self
     */ 
    public function setIIdEvent($iIdEvent)
    {
        $this->iIdEvent = $iIdEvent;

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
     * Set the value of vcDescription
     *
     * @return  self
     */ 
    public function setVcDescription($vcDescription)
    {
        $this->vcDescription = $vcDescription;

        return $this;
    }

    /**
     * Set the value of dtIniSubmition
     *
     * @return  self
     */ 
    public function setDtIniSubmition($dtIniSubmition)
    {
        $this->dtIniSubmition = $dtIniSubmition;

        return $this;
    }

    /**
     * Set the value of dtEndSubmition
     *
     * @return  self
     */ 
    public function setDtEndSubmition($dtEndSubmition)
    {
        $this->dtEndSubmition = $dtEndSubmition;

        return $this;
    }

    /**
     * Set the value of dtIniEvaluation
     *
     * @return  self
     */ 
    public function setDtIniEvaluation($dtIniEvaluation)
    {
        $this->dtIniEvaluation = $dtIniEvaluation;

        return $this;
    }

    /**
     * Set the value of dtEndEvaluation
     *
     * @return  self
     */ 
    public function setDtEndEvaluation($dtEndEvaluation)
    {
        $this->dtEndEvaluation = $dtEndEvaluation;

        return $this;
    }

    /**
     * Set the value of dtResults
     *
     * @return  self
     */ 
    public function setDtResults($dtResults)
    {
        $this->dtResults = $dtResults;

        return $this;
    }

    /**
     * Set the value of dtIniFinalSubmission
     *
     * @return  self
     */ 
    public function setDtIniFinalSubmission($dtIniFinalSubmission)
    {
        $this->dtIniFinalSubmission = $dtIniFinalSubmission;

        return $this;
    }

    /**
     * Set the value of dtEndFinalSubmission
     *
     * @return  self
     */ 
    public function setDtEndFinalSubmission($dtEndFinalSubmission)
    {
        $this->dtEndFinalSubmission = $dtEndFinalSubmission;

        return $this;
    }

    /**
     * Set the value of dtIniSubscription
     *
     * @return  self
     */ 
    public function setDtIniSubscription($dtIniSubscription)
    {
        $this->dtIniSubscription = $dtIniSubscription;

        return $this;
    }

    /**
     * Set the value of dtEndSubscription
     *
     * @return  self
     */ 
    public function setDtEndSubscription($dtEndSubscription)
    {
        $this->dtEndSubscription = $dtEndSubscription;

        return $this;
    }

    /**
     * Set the value of vcLocal
     *
     * @return  self
     */ 
    public function setVcLocal($vcLocal)
    {
        $this->vcLocal = $vcLocal;

        return $this;
    }

    /**
     * Set the value of iIdOrganizer
     *
     * @return  self
     */ 
    public function setIIdOrganizer($iIdOrganizer)
    {
        $this->iIdOrganizer = $iIdOrganizer;

        return $this;
    }

    /**
     * Set the value of dtIniEvent
     *
     * @return  self
     */ 
    public function setDtIniEvent($dtIniEvent)
    {
        $this->dtIniEvent = $dtIniEvent;

        return $this;
    }

    /**
     * Set the value of dtEndEvent
     *
     * @return  self
     */ 
    public function setDtEndEvent($dtEndEvent)
    {
        $this->dtEndEvent = $dtEndEvent;

        return $this;
    }

    /**
     * Set the value of vcAbout
     *
     * @return  self
     */ 
    public function setVcAbout($vcAbout)
    {
        $this->vcAbout = $vcAbout;

        return $this;
    }
}
