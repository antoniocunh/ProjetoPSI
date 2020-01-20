<?php
ini_set('display_errors', 1);


/**
 * Class dos works.
 * 
 * Class correspondente à tabela de works, onde se encontra e trata a informação dos works.
 * Class works extende a class Brigde.
 */

require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Base/class.Bridge.php");

class Work extends Bridge implements JsonSerializable
{

    private $iIdTypeWork;// id tipode trabalho
    private $iIdScope; // id do ambito
    private $iIdWork; // id to trabalho
    private $vcTitle;//titulo
    private $vcSummary;// resumo

    /**
     * construtor da class Work
     */
    public function __construct()
    {
        parent::__construct("tb_work", "iIdWork", "AR");
    }    

    /**
     * lê os dados de um work de acordo com o seu id.
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
     * Inserir o objecto work na base de dados.
     */
    public function InsertObject()
    {
        $this->Insert($this->GetAtributesName(), get_object_vars($this));
    }

    /**
     * Update da informação do objeto work na base de dados.
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
     * Apagar o objeto work da base de dados
     */
    public function DeleteObject()
    {
        $arrayWhere = array(array($this->getColumn(), "=", null));
        $Data = array($this->{$this->getColumn()});
        $Query= $this->Delete($arrayWhere, $Data);
        $this->ClearData();
    }

    /**
     * Apaga os dados dos atributos do objeto work.
     */
    private function ClearData()
    {
        foreach ($this as &$key)
        if(!($key instanceof Bridge))
            $key = null;
    }

    /**
     * Converte o objeto work para Json
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
     * Get the value of iIdScope
     */ 
    public function getIIdScope()
    {
        return $this->iIdScope;
    }

    /**
     * Get the value of iIdWork
     */ 
    public function getIIdWork()
    {
        return $this->iIdWork;
    }

    /**
     * Get the value of vcTitle
     */ 
    public function getVcTitle()
    {
        return $this->vcTitle;
    }

    /**
     * Get the value of vcSummary
     */ 
    public function getVcSummary()
    {
        return $this->vcSummary;
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
     * Set the value of iIdWork
     *
     * @return  self
     */ 
    public function setIIdWork($iIdWork)
    {
        $this->iIdWork = $iIdWork;

        return $this;
    }

    /**
     * Set the value of vcTitle
     *
     * @return  self
     */ 
    public function setVcTitle($vcTitle)
    {
        $this->vcTitle = $vcTitle;

        return $this;
    }

    /**
     * Set the value of vcSummary
     *
     * @return  self
     */ 
    public function setVcSummary($vcSummary)
    {
        $this->vcSummary = $vcSummary;

        return $this;
    }
}
