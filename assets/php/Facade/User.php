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
        parent::__construct("tb_User", "iIdUser");
    }

    function setObject($id)
    {
        try {
            $count = 0;
            $array = $this->GetData($id, $this->getKeys());
            foreach ($this as &$key) {
                $key = $array[$count++];
            }
        } catch (Exception $e) { }
    }

    public function getVars()
    {
        return get_object_vars($this);
    }

    public function getKeys()
    {
        return array_keys($this->getVars());
    }

    public function __toString()
    {
        return $this->iIdUser . " - " . $this->vcName;
    }
}
