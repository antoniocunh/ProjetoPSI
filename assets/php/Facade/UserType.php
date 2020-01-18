<?php
ini_set('display_errors', 1);


/* ==================================================================== 
        CLASS USER_TYPE
====================================================================*/

require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Base/Bridge.php");

class UserType extends Bridge implements JsonSerializable
{

    private $iIdTypeUser;
    private $iIdPrice;
    private $vcDescription;
    
    //construtor da class usertype
    public function __construct()
    {
        parent::__construct("tb_usertype", "iIdUserType", "ut");
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
        $this->Insert($this->GetAtributesName(), get_object_vars($this));
    }

    public function UpdateObject()
    {
        $arrayFieldsUser = array();
        $columns = $this->GetAtributesName();
        $aData = get_object_vars($this);
        $arrayWhere = array(array($this->getColumn(),"=",null));

        array_push($aData, $aData[$this->getColumn()]);
        foreach($columns as $value){
            array_push($arrayFieldsUser, [$value, "="]);
        }

        $this->Update($arrayFieldsUser, $arrayWhere,  $aData);
    }
    
    public function DeleteObject()
    {
        $arrayWhere = array(array($this->getColumn(), "=", null));
        $Data = array($this->{$this->getColumn()});
        $Query= $this->Delete($arrayWhere, $Data);
        $this->ClearData();
    }

    private function ClearData()
    {
        foreach ($this as &$key)
        if(!($key instanceof Bridge))
            $key = null;
    }

    public function jsonSerialize(){
        $json =  array();
        foreach ($this as $key => &$value) {
            $json += [$key=>$value];
        }
        return $json;
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
