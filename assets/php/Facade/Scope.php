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


    /**
     * Get the value of iIdScope
     */ 
    public function getIIdScope()
    {
        return $this->iIdScope;
    }

    /**
     * Get the value of vcName
     */ 
    public function getVcName()
    {
        return $this->vcName;
    }
}
