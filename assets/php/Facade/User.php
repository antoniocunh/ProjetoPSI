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

    public function getObject($id)
    {
        $count = 0;
        $array = $this->GetData($id, $this);
        var_dump($array);
        foreach ($this as &$key) {
                $key = $array[$count++];
        }
    }

    public function setObject()
    {
        $this->InsertObject(get_object_vars($this));
    }

    public function removeObject()
    {
        $id = $this->vcUsername;
        $this->DeleteObject($id);
    }

    public function GetVcPassword()
    {
        return $this->vcPassword;
    }

    public function GetVcUsername()
    {
        return $this->vcUsername;
    }

    public function GetDtBirth()
    {
        return $this->dtBirth;
    }

    public function __toString()
    {
        return $this->iIdUser . " - " . $this->vcName;
    }
}
