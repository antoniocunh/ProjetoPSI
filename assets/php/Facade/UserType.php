<?php


/* ==================================================================== 
        CLASS USER_TYPE
====================================================================*/

require($_SERVER["DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Base/Bridge.php");

class UserType extends Bridge
{

    private $iIdTypeUser;
    private $iIdPrice;
    private $vcDescription;


    //construtor da class usertype
    public function __construct()
    {
        parent::__construct("tb_UserType", "iIdUserType");
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

    public function getVars()
    {
        return get_object_vars($this);
    }

    public function getKeys()
    {
        return array_keys($this->getVars());
    }
}
