<?php


/* ==================================================================== 
        CLASS WORK_TYPE
====================================================================*/

require($_SERVER["DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Base/Bridge.php");

class WorkType extends Bridge
{

    private $iIdTypeWork;
    private $vcDescription;


    //construtor da class worktype
    public function __construct()
    {
        parent::__construct("tb_WorkType", "iIdWorkType");
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

    /**
     * Get the value of iIdTypeWork
     */
    public function getIIdTypeWork()
    {
        return $this->iIdTypeWork;
    }

    /**
     * Get the value of vcDescription
     */
    public function getVcDescription()
    {
        return $this->vcDescription;
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
     * Set the value of vcDescription
     *
     * @return  self
     */ 
    public function setVcDescription($vcDescription)
    {
        $this->vcDescription = $vcDescription;

        return $this;
    }
}
