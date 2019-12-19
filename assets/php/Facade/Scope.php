<?php


/* ==================================================================== 
        CLASS SCOPE
       ====================================================================*/

require($_SERVER["DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Base/Bridge.php");


class Scope extends Bridge
{


    private $iIdScope;
    private $vcName;

    //construtor da class scope
    public function __construct()
    {
        parent::__construct("tb_Scope", "iIdScope");
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

    public function __toString()
    {
        return $this->iIdScope . " - " . $this->vcName;
    }
}
