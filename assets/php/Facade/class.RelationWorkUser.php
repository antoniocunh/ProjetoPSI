<?php
ini_set('display_errors', 1);


/**
 * Class da Relação entre trabalho e user.
 * 
 * Class correspondente à tabela relationworkuser, onde se encontra e trata a informação da relationworkuser.
 * Class relationworkuser extende a class Brigde.
 */

require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Base/class.Bridge.php");

class RelationWorkUser extends Bridge implements JsonSerializable
{

    private $idRelation;//id
    private $iIdUser;//id do user
    private $iIdWork;//id do trabalho
    private $bMainAuthor;//autor principal
    private $bSpeaker;//apresentador do trabalho

    /**
     * construtor da class relationworkuser
     */
    public function __construct()
    {
        parent::__construct("tb_relationworkuser", "iIdRelationWorkUser", "rwu");
    }

    /**
     * lê os dados de um objeto de acordo com o seu id.
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
     * Inserir o objecto na base de dados.
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

        $this->Update($arrayFieldsUser, $arrayWhere,  $aData);
    }
    
    /**
     * Apagar o objeto da base de dados
     */
    public function DeleteObject()
    {
        $arrayWhere = array(array($this->getColumn(), "=", null));
        $Data = array($this->{$this->getColumn()});
        $Query= $this->Delete($arrayWhere, $Data);
        $this->ClearData();
    }

    /**
     * Apaga os dados dos atributos do objeto.
     */
    private function ClearData()
    {
        foreach ($this as &$key)
        if(!($key instanceof Bridge))
            $key = null;
    }

    /**
     * Converte o objeto para Json
     */
    public function jsonSerialize(){
        $json =  array();
        foreach ($this as $key => &$value) {
            $json += [$key=>$value];
        }
        return $json;
    }

    /**
     * Get the value of idRelation
     */ 
    public function getIdRelation()
    {
        return $this->idRelation;
    }

    /**
     * Get the value of iIdUser
     */ 
    public function getIIdUser()
    {
        return $this->iIdUser;
    }

    /**
     * Get the value of iIdWork
     */ 
    public function getIIdWork()
    {
        return $this->iIdWork;
    }

    /**
     * Get the value of vcMainAuthor
     */ 
    public function getBMainAuthor()
    {
        return $this->bMainAuthor;
    }

    /**
     * Get the value of vcSpeaker
     */ 
    public function getBSpeaker()
    {
        return $this->bSpeaker;
    }

    /**
     * Set the value of idRelation
     *
     * @return  self
     */ 
    public function setIdRelation($idRelation)
    {
        $this->idRelation = $idRelation;

        return $this;
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
     * Set the value of vcMainAuthor
     *
     * @return  self
     */ 
    public function setBMainAuthor($bMainAuthor)
    {
        $this->bMainAuthor = $bMainAuthor;

        return $this;
    }

    /**
     * Set the value of vcSpeaker
     *
     * @return  self
     */ 
    public function setBSpeaker($bSpeaker)
    {
        $this->bSpeaker = $bSpeaker;

        return $this;
    }
}
