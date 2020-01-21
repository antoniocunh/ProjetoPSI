<?php


/**
 * Class dos Users.
 * 
 * Class correspondente à tabela de users, onde se encontra e trata a informação dos users.
 * Class user extende a class Brigde.
 */

 ini_set('display_errors', 1);


require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Base/class.Bridge.php");

class User extends Bridge implements JsonSerializable
{
    private $iIdUser;  //atributo do id 
    private $iIdScope;    //atributo do id do scope 
    private $vcName;  //atributo do nome 
    private $vcLastName;  //atributo do sobrenome 
    private $vcAddress;  //atributo da morada 
    private $vcPhoneNumber;  //atributo do numero de telemovel 
    private $vcEmail;  //atributo do email 
    private $vcCountry;  //atributo do pais 
    private $vcAfiliation;  //atributo da afiliação 
    private $vcUsername;  //atributo do username 
    private $vcPassword;  //atributo da password
    private $vcCity;  //atributo da cidade 
    private $vcPostalCode;  //atributo do codigo postal 
    private $dtBirth;  //atributo da data de nascimento
    private $iIdUserType;  //atributo do id do tipo de utilizador
    private $enumUserStatus;  //atributo status
    private $vcTokenCode;  //atributo do token para o reset password

    /**
     * construtor da class user.
     */
    public function __construct($aColumn="vcUsername")
    {
        parent::__construct("tb_user", $aColumn, "UR");
    }
    
    /**
     * lê os dados de um user de acordo com o seu username.
     */
    public function readObject($id)
    {
        $count = 0;
        $array = $this->ReadObjectBD($id);
        
        foreach ($this as &$key) {
            $key = $array[$count++];
        }
    }
    
    /**
     * Inserir o objecto user na base de dados.
     */
    public function InsertObject()
    {
        $this->Insert($this->GetAtributesName(), get_object_vars($this));
    }

    /**
     * Update da informação do objeto user na base de dados.
     */
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
    
    /**
     * Apagar o objeto user da base de dados
     */
    public function DeleteObject()
    {
        $arrayWhere = array(array($this->getColumn(), "=", null));
        $Data = array($this->{$this->getColumn()});
        $Query= $this->Delete($arrayWhere, $Data);
        $this->ClearData();
    }

    /**
     * Apaga os dados dos atributos do objeto user.
     */
    private function ClearData()
    {
        foreach ($this as &$key)
        if(!($key instanceof Bridge))
            $key = null;
    }

    /**
     * Converte o objeto user para Json
     */
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
