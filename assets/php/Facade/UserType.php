<?php


/* ==================================================================== 
        CLASS USER_TYPE
====================================================================*/

require($_SERVER["DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Base/Bridge.php");

class UserType extends Bridge
{

    private $iIdTypeUser;
    private $iIdPrice;
    private $vcDescription;
    
    //construtor da class usertype
    public function __construct()
    {
        parent::__construct("tb_UserType", "iIdUserType");
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
     * Get the value of iIdTypeUser
     */ 
    public function getIIdTypeUser()
    {
        return $this->iIdTypeUser;
    }

    /**
     * Get the value of iIdPrice
     */ 
    public function getIIdPrice()
    {
        return $this->iIdPrice;
    }

    /**
     * Get the value of vcDescription
     */ 
    public function getVcDescription()
    {
        return $this->vcDescription;
    }

    /**
     * Set the value of iIdTypeUser
     *
     * @return  self
     */ 
    public function setIIdTypeUser($iIdTypeUser)
    {
        $this->iIdTypeUser = $iIdTypeUser;

        return $this;
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
     * Set the value of vcDescription
     *
     * @return  self
     */ 
    public function setVcDescription($vcDescription)
    {
        $this->vcDescription = $vcDescription;

        return $this;
    }
}
