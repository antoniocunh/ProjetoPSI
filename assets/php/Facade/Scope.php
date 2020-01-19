<?php
ini_set('display_errors', 1);

/**
 * Class do scope.
 * 
 * Class correspondente à tabela de scope, onde se encontra e trata a informação do scope.
 * Class scope extende a class Brigde.
 */
require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Base/Bridge.php");


class Scope extends Bridge implements JsonSerializable
{


    private $iIdScope;//id
    private $vcName;//nome do scope

    /**
     * construtor da class scope
     */
    public function __construct()
    {
        parent::__construct("tb_scope", "iIdScope", "sc");
    }

    /**
     * lê os dados de um scope de acordo com o seu id.
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
     * Inserir o objecto scope na base de dados.
     */
    public function InsertObject()
    {
        $this->Insert($this->GetAtributesName(), get_object_vars($this));
    }

    /**
     * Update da informação do objeto scope na base de dados.
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
     * Apagar o objeto scope da base de dados
     */
    public function DeleteObject()
    {
        $arrayWhere = array(array($this->getColumn(), "=", null));
        $Data = array($this->{$this->getColumn()});
        $Query= $this->Delete($arrayWhere, $Data);
        $this->ClearData();
    }

    /**
     * Apaga os dados dos atributos do objeto scope.
     */
    private function ClearData()
    {
        foreach ($this as &$key)
        if(!($key instanceof Bridge))
            $key = null;
    }

    /**
     * Converte o objeto scope para Json
     */
    public function jsonSerialize(){
        $json =  array();
        foreach ($this as $key => &$value) {
            $json += [$key=>$value];
        }
        return $json;
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
}
