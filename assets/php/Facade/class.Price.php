<?php
ini_set('display_errors', 1);


/**
 * Class do price.
 * 
 * Class correspondente à tabela de price, onde se encontra e trata a informação do price.
 * Class price extende a class Brigde.
 */

require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Base/class.Bridge.php");

class Price extends Bridge implements JsonSerializable
{

    private $iIdPrice; //id 
    private $dPrice;//valor
    private $vcDescription;//valor


    /**
     * construtor da class price
     */
    public function __construct()
    {
        parent::__construct("tb_price", "iIdPrice", "pr");
    }

    /**
     * lê os dados de um price de acordo com o seu id.
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
     * Inserir o objecto price na base de dados.
     */
    public function InsertObject()
    {
        $this->Insert($this->GetAtributesName(), get_object_vars($this));
    }

    /**
     * Update da informação do objeto price na base de dados.
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
     * Apagar o objeto price da base de dados
     */
    public function DeleteObject()
    {
        $arrayWhere = array(array($this->getColumn(), "=", null));
        $Data = array($this->{$this->getColumn()});
        $Query= $this->Delete($arrayWhere, $Data);
        $this->ClearData();
    }

    /**
     * Apaga os dados dos atributos do objeto price.
     */
    private function ClearData()
    {
        foreach ($this as &$key)
        if(!($key instanceof Bridge))
            $key = null;
    }

    /**
     * Converte o objeto price para Json
     */
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
     * Get the value of Description
     */ 
    public function getvcDescription()
    {
        return $this->vcDescription;
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

    /**
     * Set the value of Description
     *
     * @return  self
     */ 
    public function setvcDescription($vcDescription)
    {
        $this->vcDescription = $vcDescription;

        return $this;
    }
}
