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
        $this->InsertObjectBD(get_object_vars($this));
    }

    public function DeleteObject()
    {
        $id = $this->{$this->getColumn()};
        $this->DeleteObjectBD($id);
        //$this->ClearData();
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

    /**
     * Set the value of iIdScope
     *
     * @return  self
     */ 
    public function setIIdScope($iIdScope)
    {
        $this->iIdScope = $iIdScope;

        return $this;
    }

    /**
     * Set the value of vcName
     *
     * @return  self
     */ 
    public function setVcName($vcName)
    {
        $this->vcName = $vcName;

        return $this;
    }
}
