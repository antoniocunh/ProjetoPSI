<?php


/* ==================================================================== 
        CLASS PRICE
====================================================================*/

require($_SERVER["DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Base/Bridge.php");

class Price extends Bridge implements JsonSerializable
{

    private $iIdPrice;
    private $dPrice;


    //construtor da class price
    public function __construct()
    {
        parent::__construct("tb_Price", "iIdPrice", "pr");
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

    public function jsonSerialize(){
        $json =  array();
        foreach ($this as $key => &$value) {
            $json += [$key=>$value];
        }
        return $json;
    }



    /**
     * Get the value of iIdPrice
     */ 
    public function getIIdPrice()
    {
        return $this->iIdPrice;
    }

    /**
     * Get the value of dPrice
     */ 
    public function getDPrice()
    {
        return $this->dPrice;
    }

    /**
     * Set the value of iIdPrice
     *
     * @return  self
     */ 
    public function setIIdPrice($iIdPrice)
    {
        $this->iIdPrice = $iIdPrice;

        return $this;
    }

    /**
     * Set the value of dPrice
     *
     * @return  self
     */ 
    public function setDPrice($dPrice)
    {
        $this->dPrice = $dPrice;

        return $this;
    }
}
