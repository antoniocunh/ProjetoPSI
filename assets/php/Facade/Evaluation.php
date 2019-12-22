<?php


/* ==================================================================== 
        CLASS EVALUATION
====================================================================*/

require($_SERVER["DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Base/Bridge.php");

class Evaluation extends Bridge
{

    private $iIdEvaluation;
    private $iIdWork;
    private $vcReview;
    private $iRate;

    //construtor da class evaluation
    public function __construct()
    {
        parent::__construct("tb_Evaluation", "iIdEvaluation");
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
}
