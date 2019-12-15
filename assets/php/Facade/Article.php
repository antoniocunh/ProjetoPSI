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

    function setObject($id)
    {
        try {
            $count = 0;
            $array = $this->GetData($id, $this->getKeys());
            foreach ($this as &$key) {
                $key = $array[$count++];
            }
        } catch (Exception $e) { }
    }

    private function getVars()
    {
        return get_object_vars($this);
    }

    private function getKeys()
    {
        return array_keys($this->getVars());
    }
}
