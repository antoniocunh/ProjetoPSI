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

    function getObject($id)
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
