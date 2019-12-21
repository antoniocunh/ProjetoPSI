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

    public function setObject()
    {
        $this->CreateUser();
        //var_dump(get_object_vars($this));
        //$this->Insert("iIdUser, iIdScope, vcName, vcLastName, vcAddress, vcPhoneNumber, vcEmail, vcCountry, vcAfiliation, vcUsername, vcPassword, vcCity, vcPostalCode, dtBirth, iIdUserType");
        //$this->Test(get_object_vars($this));
    }

    public function removeObject()
    {
        //$column = $this->getColumn();
        //echo $column ." <br/>";
        $id = $this->vcUsername;
        //echo $id ." <br/>";
        $this->DeleteObject($id);
    }

    public function __toString()
    {
        return $this->iIdUser . " - " . $this->vcName;
    }

    public function CreateUser()
    {
        $aParams=$this->prepareParams(get_object_vars($this));//Vai buscar os values
        echo "<br>".$aParams;
        $this->CallFunction("sp_USER_CreateUser(".$aParams.")");
    }

}
