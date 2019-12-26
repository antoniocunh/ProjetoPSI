<?php


/* ==================================================================== 
        CLASS RELATION_WORK_USER
====================================================================*/

require($_SERVER["DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Base/Bridge.php");

class RelationWorkUser extends Bridge implements JsonSerializable
{

    private $idRelation;
    private $iIdUser;
    private $iIdWork;
    private $vcMainAuthor;
    private $vcSpeaker;

    //construtor da class relationworkuser
    public function __construct()
    {
        parent::__construct("tb_RelationWorkUser", "iIdRelationWorkUser", "rwu");
    }

    public function readObject($id)
    {
        $count = 0;
        $array = $this->ReadObjectBD($id);
        
        foreach ($this as &$key) {
                $key = $array[$count++];
        }
    }

    public function InsertObject()
    {
        $this->InsertObjectBD(get_object_vars($this));
    }

    public function DeleteObject()
    {
        $id = $this->{$this->getColumn()};
        $this->DeleteObjectBD($id);
        //$this->ClearData();
    }

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
    public function getVcMainAuthor()
    {
        return $this->vcMainAuthor;
    }

    /**
     * Get the value of vcSpeaker
     */ 
    public function getVcSpeaker()
    {
        return $this->vcSpeaker;
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
    public function setVcMainAuthor($vcMainAuthor)
    {
        $this->vcMainAuthor = $vcMainAuthor;

        return $this;
    }

    /**
     * Set the value of vcSpeaker
     *
     * @return  self
     */ 
    public function setVcSpeaker($vcSpeaker)
    {
        $this->vcSpeaker = $vcSpeaker;

        return $this;
    }
}
