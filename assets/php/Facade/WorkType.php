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
