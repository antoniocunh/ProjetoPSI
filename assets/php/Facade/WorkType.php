<?php
ini_set('display_errors', 1);


/**
 * Class dos tipos de trabalho.
 * 
 * Class correspondente à tabela de tipos de trabalho, onde se encontra e trata a informação dos tipos de trabalho.
 * Class worktype extende a class Brigde.
 */
require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Base/Bridge.php");

class WorkType extends Bridge implements JsonSerializable
{

    private $iIdTypeWork;//id tipode trabalho
    private $vcDescription;//descrição

    /**
     * construtor da class worktype
     */
    public function __construct()
    {
        parent::__construct("tb_worktype", "iIdTypeWork", "TWT");
    }

    /**
     * lê os dados de um tipo de trabalho de acordo com o seu id.
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
     * Inserir o objecto tipo de trabalho na base de dados.
     */
    public function InsertObject()
    {
        $this->Insert($this->GetAtributesName(), get_object_vars($this));
    }

    /**
     * Update da informação do objeto tipo de trabalho na base de dados.
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
     * Apagar o objeto tipo de trabalho da base de dados
     */
    public function DeleteObject()
    {
        $arrayWhere = array(array($this->getColumn(), "=", null));
        $Data = array($this->{$this->getColumn()});
        $Query= $this->Delete($arrayWhere, $Data);
        $this->ClearData();
    }

    /**
     * Apaga os dados dos atributos do objeto tipo de trabalho.
     */
    private function ClearData()
    {
        foreach ($this as &$key)
        if(!($key instanceof Bridge))
            $key = null;
    }

    /**
     * Converte o objeto tipo de trabalho para Json
     */
    public function jsonSerialize(){
        $json =  array();
        foreach ($this as $key => &$value) {
            $json += [$key=>$value];
        }
        return $json;
    }

    /**
     * Get the value of iIdTypeWork
     */
    public function getIIdTypeWork()
    {
        return $this->iIdTypeWork;
    }

    /**
     * Get the value of vcDescription
     */
    public function getVcDescription()
    {
        return $this->vcDescription;
    }

    /**
     * Set the value of iIdTypeWork
     *
     * @return  self
     */
    public function setIIdTypeWork($iIdTypeWork)
    {
        $this->iIdTypeWork = $iIdTypeWork;

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
