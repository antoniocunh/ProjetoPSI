<?php


/* ==================================================================== 
        CLASS ATTACHMENT
====================================================================*/

require($_SERVER["DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Base/Bridge.php");

class Attachment extends Bridge
{

    private $iIdAttachment;
    private $iIdArticle;
    private $blAttachment;
    private $vcTitle;
    private $vcState;

    //construtor da class attachment
    public function __construct()
    {
        parent::__construct("tb_Attachment", "iIdAttachment");
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
