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

    function getObject($id)
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
