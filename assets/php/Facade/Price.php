<?php


/* ==================================================================== 
        CLASS PRICE
====================================================================*/

require($_SERVER["DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Base/Bridge.php");

class Price extends Bridge
{

    private $iIdPrice;
    private $dPrice;


    //construtor da class price
    public function __construct()
    {
        parent::__construct("tb_Price", "iIdPrice");
    }

    private function getVars()
    {
        return get_object_vars($this);
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

    private function getKeys()
    {
        return array_keys($this->getVars());
    }

    public function __toString()
    {
        return $this->iIdPrice . " - " . $this->dPrice;
    }
}
