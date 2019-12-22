<?php


/* ==================================================================== 
        CLASS ARTICLE
====================================================================*/

require($_SERVER["DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Base/Bridge.php");

class Article extends Bridge
{

    private $iIdTypeWork;
    private $iIdScope;
    private $vcWork;
    private $vcTitle;
    private $vcSummary;

    //construtor da class article
    public function __construct()
    {
        parent::__construct("tb_Article", "iIdArticle");
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
     * Get the value of vcWork
     */ 
    public function getVcWork()
    {
        return $this->vcWork;
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
}
