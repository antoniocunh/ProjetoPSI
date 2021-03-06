<?php
ini_set('display_errors', 1);


/**
 * Class do tipo de user.
 * 
 * Class correspondente à tabela de tipo de user, onde se encontra e trata a informação dos tipos de user.
 * Class tipo de user extende a class Brigde.
 */

require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Base/class.Bridge.php");

class UserType extends Bridge implements JsonSerializable
{

    private $iIdTypeUser;//id
    private $iIdPrice;//id do preço
    private $vcDescription;//descrição
    
    /**
     * construtor da class usertype
     */
    public function __construct()
    {
        parent::__construct("tb_usertype", "iIdTypeUser", "ut");
    }
    

    /**
     * lê os dados de um tipo de user de acordo com o seu id.
     */
    public function readObject($id)
    {
        $count = 0;
        $array = $this->ReadObjectBD($id);
        if ($array != false) 
            foreach ($this as &$key) {
                $key = $array[$count++];
            }
    }

    /**
     * Inserir o objecto tipo de user na base de dados.
     */
    public function InsertObject()
    {
        $this->Insert($this->GetAtributesName(), get_object_vars($this));
    }

    /**
     * Update da informação do objeto tipo de user na base de dados.
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

        $this->Update($arrayFieldsUser, $arrayWhere,  $aData);
    }
    
    /**
     * Apagar o objeto tipo de user da base de dados
     */
    public function DeleteObject()
    {
        $arrayWhere = array(array($this->getColumn(), "=", null));
        $Data = array($this->{$this->getColumn()});
        $Query= $this->Delete($arrayWhere, $Data);
        $this->ClearData();
    }

    /**
     * Apaga os dados dos atributos do objeto tipo de user.
     */
    private function ClearData()
    {
        foreach ($this as &$key)
        if(!($key instanceof Bridge))
            $key = null;
    }

    /**
     * Converte o objeto tipo de user para Json
     */
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
