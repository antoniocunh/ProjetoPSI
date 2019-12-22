<?php


/* ==================================================================== 
        CLASS USER
====================================================================*/

require($_SERVER["DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Base/Bridge.php");

class User extends Bridge
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


    //construtor da class user
    public function __construct()
    {
        parent::__construct("tb_User", "vcUsername");
    }
    
    public function saveObject($id)
    {
        $count = 0;
        $array = $this->GetObject($id);
        
        foreach ($this as &$key) {
                $key = $array[$count++];
                
        }
    }

    public function ClearData()
    {
        foreach ($this as &$key)
        if(!($key instanceof Bridge))
            $key = null;
    }

    public function setObject()
    {
        //$this->GetCountry();
        //var_dump(get_object_vars($this));
        $this->Insert(get_object_vars($this));
    }

    public function removeObject()
    {
        $id = $this->vcUsername;
        $this->DeleteObject($id);
        //$this->ClearData();
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
}
