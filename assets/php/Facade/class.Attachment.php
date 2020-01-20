<?php
ini_set('display_errors', 1);

/**
 * Class dos Attachments.
 * 
 * Class correspondente à tabela de attachments, onde se encontra e trata a informação dos attachments.
 * Class attachments extende a class Brigde.
 */

require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Base/class.Bridge.php");

class Attachment extends Bridge implements JsonSerializable
{

    private $iIdAttachment; //atributo id 
    private $iIdWork; //atributo id do trabalho
    private $blAttachment; //atributo blattachment
    private $vcTitle; // atributo do titulo
    private $enumState; //atributo do estado

    /**
     * construtor da class attachment
     */
    public function __construct()
    {
        parent::__construct("tb_attachment", "iIdAttachment", "att");
    }
    
    /**
     * lê os dados de um attachment de acordo com o seu id.
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
     * Inserir o objecto attachment na base de dados.
     */
    public function InsertObject()
    {
        $this->Insert($this->GetAtributesName(), get_object_vars($this));
    }

    /**
     * Update da informação do objeto attachment na base de dados.
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
     * Apagar o objeto attachment da base de dados
     */
    public function DeleteObject()
    {
        $arrayWhere = array(array($this->getColumn(), "=", null));
        $Data = array($this->{$this->getColumn()});
        $Query= $this->Delete($arrayWhere, $Data);
        $this->ClearData();
    }

    /**
     * Apaga os dados dos atributos do objeto attachment.
     */
    private function ClearData()
    {
        foreach ($this as &$key)
        if(!($key instanceof Bridge))
            $key = null;
    }

    /**
     * Converte o objeto attachment para Json
     */
    public function jsonSerialize(){
        $json =  array();
        foreach ($this as $key => &$value) {
            $json += [$key=>$value];
        }
        return $json;
    }

    /**
     * Get the value of iIdAttachment
     */ 
    public function getIIdAttachment()
    {
        return $this->iIdAttachment;
    }

    /**
     * Get the value of iIdWork
     */ 
    public function getiIdWork()
    {
        return $this->iIdWork;
    }

    /**
     * Get the value of blAttachment
     */ 
    public function getBlAttachment()
    {
        return base64_encode($this->blAttachment);
    }

    /**
     * Get the value of vcTitle
     */ 
    public function getVcTitle()
    {
        return $this->vcTitle;
    }

    /**
     * Get the value of enumState
     */ 
    public function getEnumState()
    {
        return $this->enumState;
    }

    /**
     * Set the value of iIdAttachment
     *
     * @return  self
     */ 
    public function setIIdAttachment($iIdAttachment)
    {
        $this->iIdAttachment = $iIdAttachment;

        return $this;
    }

    /**
     * Set the value of iIdWork
     *
     * @return  self
     */ 
    public function setiIdWork($iIdWork)
    {
        $this->iIdWork = $iIdWork;

        return $this;
    }

    /**
     * Set the value of blAttachment
     *
     * @return  self
     */ 
    public function setBlAttachment($blAttachment)
    {
        $this->blAttachment = file_get_contents($blAttachment);

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
     * Set the value of enumState
     *
     * @return  self
     */ 
    public function setEnumState($enumState)
    {
        $this->enumState = $enumState;

        return $this;
    }
}
