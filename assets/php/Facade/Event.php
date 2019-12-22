<?php


/* ==================================================================== 
        CLASS EVENT
====================================================================*/

require($_SERVER["DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Base/Bridge.php");

class Event extends Bridge
{

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


    //construtor da class event
    public function __construct()
    {
        parent::__construct("tb_Event", "iIdEvent");
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
}
