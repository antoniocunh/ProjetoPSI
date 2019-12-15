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

    function setObject($id)
    {
        try {
            $count = 0;
            $array = $this->GetData($id, $this->getKeys());
            foreach ($this as &$key) {
                $key = $array[$count++];
            }
        } catch (Exception $e) { }
    }

    private function getVars()
    {
        return get_object_vars($this);
    }

    private function getKeys()
    {
        return array_keys($this->getVars());
    }
}
