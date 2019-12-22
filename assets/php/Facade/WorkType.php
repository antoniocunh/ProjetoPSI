<?php


/* ==================================================================== 
        CLASS WORK_TYPE
====================================================================*/

require($_SERVER["DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Base/Bridge.php");

class WorkType extends Bridge
{

    private $iIdTypeWork;
    private $vcDescription;


    //construtor da class worktype
    public function __construct()
    {
        parent::__construct("tb_WorkType", "iIdWorkType");
    }

    

    /**
     * Get the value of iIdTypeWork
     */ 
    public function getIIdTypeWork()
    {
        return $this->iIdTypeWork;
    }

    /**
     * Get the value of vcDescription
     */ 
    public function getVcDescription()
    {
        return $this->vcDescription;
    }
}
