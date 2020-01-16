<?php

/* ==================================================================== 
        CLASS USER
====================================================================*/

require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Base/Bridge.php");

class User extends Bridge implements JsonSerializable
{
    private $iIdUser;
    private $iIdScope;
    private $vcName;
    private $vcLastName;
    private $vcAddress;
    private $vcPhoneNumber;
    private $vcEmail;
    private $vcCountry;
    private $vcAfiliation;
    private $vcUsername;
    private $vcPassword;
    private $vcCity;
    private $vcPostalCode;
    private $dtBirth;
    private $iIdUserType;
    private $enumUserStatus;
    private $vcTokenCode;

    //construtor da class user
    public function __construct($aColumn="vcUsername")
    {
        parent::__construct("tb_User", $aColumn, "UR");
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
        //$this->setIIdUser(420);
        //$this->setvcEmail("99@gmail.com");
        //$this->setvcUsername("BoaHancock");
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

        $this->Update($arrayFieldsUser, $arrayWhere, $aData);
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
     * Get the value of iIdUser
     */ 
    public function getIIdUser()
    {
        return $this->iIdUser;
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
     * Get the value of vcLastName
     */ 
    public function getVcLastName()
    {
        return $this->vcLastName;
    }

    /**
     * Get the value of vcAddress
     */ 
    public function getVcAddress()
    {
        return $this->vcAddress;
    }

    /**
     * Get the value of vcPhoneNumber
     */ 
    public function getVcPhoneNumber()
    {
        return $this->vcPhoneNumber;
    }

    /**
     * Get the value of vcEmail
     */ 
    public function getVcEmail()
    {
        return $this->vcEmail;
    }

    /**
     * Get the value of vcCountry
     */ 
    public function getVcCountry()
    {
        return $this->vcCountry;
    }

    /**
     * Get the value of vcAfiliation
     */ 
    public function getVcAfiliation()
    {
        return $this->vcAfiliation;
    }

    /**
     * Get the value of vcUsername
     */ 
    public function getVcUsername()
    {
        return $this->vcUsername;
    }

    /**
     * Get the value of vcPassword
     */ 
    public function getVcPassword()
    {
        return $this->vcPassword;
    }

    /**
     * Get the value of vcCity
     */ 
    public function getVcCity()
    {
        return $this->vcCity;
    }

    /**
     * Get the value of vcPostalCode
     */ 
    public function getVcPostalCode()
    {
        return $this->vcPostalCode;
    }

    /**
     * Get the value of dtBirth
     */ 
    public function getDtBirth()
    {
        return $this->dtBirth;
    }

    /**
     * Get the value of iIdUserType
     */ 
    public function getIIdUserType()
    {
        return $this->iIdUserType;
    }

     /**
     * Get the value of enumUserStatus
     */ 
    public function getEnumUserStatus()
    {
        return $this->enumUserStatus;
    }

     /**
     * Get the value of vcTokenCode
     */ 
    public function getvcTokenCode()
    {
        return $this->vcTokenCode;
    }

    /**
     * Set the value of iIdUser
     *
     * @return  self
     */ 
    public function setIIdUser($iIdUser)
    {
        $this->iIdUser = $iIdUser;

        return $this;
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

    /**
     * Set the value of vcLastName
     *
     * @return  self
     */ 
    public function setVcLastName($vcLastName)
    {
        $this->vcLastName = $vcLastName;

        return $this;
    }

    /**
     * Set the value of vcAddress
     *
     * @return  self
     */ 
    public function setVcAddress($vcAddress)
    {
        $this->vcAddress = $vcAddress;

        return $this;
    }

    /**
     * Set the value of vcPhoneNumber
     *
     * @return  self
     */ 
    public function setVcPhoneNumber($vcPhoneNumber)
    {
        $this->vcPhoneNumber = $vcPhoneNumber;

        return $this;
    }

    /**
     * Set the value of vcEmail
     *
     * @return  self
     */ 
    public function setVcEmail($vcEmail)
    {
        $this->vcEmail = $vcEmail;

        return $this;
    }

    /**
     * Set the value of vcCountry
     *
     * @return  self
     */ 
    public function setVcCountry($vcCountry)
    {
        $this->vcCountry = $vcCountry;

        return $this;
    }

    /**
     * Set the value of vcAfiliation
     *
     * @return  self
     */ 
    public function setVcAfiliation($vcAfiliation)
    {
        $this->vcAfiliation = $vcAfiliation;

        return $this;
    }

    /**
     * Set the value of vcUsername
     *
     * @return  self
     */ 
    public function setVcUsername($vcUsername)
    {
        $this->vcUsername = $vcUsername;

        return $this;
    }

    /**
     * Set the value of vcPassword
     *
     * @return  self
     */ 
    public function setVcPassword($vcPassword)
    {
        if($this->dtBirth != null){
            $this->vcPassword = hash("sha512", $vcPassword . "_" . $this->dtBirth);

            return $this;
        }
    }

    /**
     * Set the value of vcCity
     *
     * @return  self
     */ 
    public function setVcCity($vcCity)
    {
        $this->vcCity = $vcCity;

        return $this;
    }

    /**
     * Set the value of vcPostalCode
     *
     * @return  self
     */ 
    public function setVcPostalCode($vcPostalCode)
    {
        $this->vcPostalCode = $vcPostalCode;

        return $this;
    }

    /**
     * Set the value of dtBirth
     *
     * @return  self
     */ 
    public function setDtBirth($dtBirth)
    {
        $this->dtBirth = $dtBirth;

        return $this;
    }

    /**
     * Set the value of iIdUserType
     *
     * @return  self
     */ 
    public function setIIdUserType($iIdUserType)
    {
        $this->iIdUserType = $iIdUserType;

        return $this;
    }

     /**
     * Set the value of enumUserStatus
     *
     * @return  self
     */ 
    public function setEnumUserStatus($enumUserStatus)
    {
        $this->enumUserStatus = $enumUserStatus;

        return $this;
    }

     /**
     * Set the value of vcTokenCode
     *
     * @return  self
     */ 
    public function setVcTokenCode($vcTokenCode)
    {
        $this->vcTokenCode = $vcTokenCode;

        return $this;
    }
}
