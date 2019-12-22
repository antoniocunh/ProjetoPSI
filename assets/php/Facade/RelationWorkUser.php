<?php


/* ==================================================================== 
        CLASS RELATION_WORK_USER
====================================================================*/

require($_SERVER["DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Base/Bridge.php");

class RelationWorkUser extends Bridge
{

    private $idRelation;
    private $iIdUser;
    private $iIdWork;
    private $vcMainAuthor;
    private $vcSpeaker;

    //construtor da class relationworkuser
    public function __construct()
    {
        parent::__construct("tb_RelationWorkUser", "iIdRelationWorkUser");
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
}
