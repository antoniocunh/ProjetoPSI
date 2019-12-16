<?php

class Bridge{
    
    private $conn;
    private $table;
    private $column;
        
    protected function __construct($aTable, $column){
        require($_SERVER["DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Proprieties/ConfigDB.php");
        $this->conn = $conn;      
        $this->table = $aTable;
        $this->column = $column;
    }

    /* ==================================================================== 
        Query Functions 
       ====================================================================*/

    protected function SelectAll($aCondition = "1=1"){
        return $this->QueryFetchAll("SELECT * FROM {$this->table} WHERE {$aCondition};");
    }

    protected function SelectColumns($column, $aCondition = "1=1"){
        return $this->QueryFetchAll("SELECT {$column} FROM {$this->table} WHERE {$aCondition};");
    }

    protected function SelectOrderBy($aColumn, $aOrder="ASC"){
        return $this->QueryFetchAll("SELECT {$aColumn} FROM {$this->table} ORDER BY {$aColumn} {$aOrder};");
    }
    
    /* ==================================================================== 
        Execute Functions 
       ====================================================================*/

    protected function QueryFetchAll($aQuery)
    {
        $stmt = $this->conn->prepare("{$aQuery}");
        $stmt->execute();
        return $this->GetArray($stmt);
    }

    protected function QueryExecute($aQuery)
    {
        $stmt = $this->conn->prepare("{$aQuery}");
        $stmt->execute();
    }

    protected function GetArray($stmt){
        $temp = array();
        $temp = $stmt->fetchAll(PDO::FETCH_BOTH);
        $array = array_values($temp);
        return $array;
    }

    public function GetData($id, $vars){
        $temp = array();
            $result = $this->SelectAll($this->column . " = " . $id);
            if(!empty($result)){
                for($count = 0; $count < count($vars); ++$count){
                    $temp[$count] = $result[0][$vars[$count]];
                }
                return $temp;
            }
    }

    protected function GetColumns(){
        $stmt = $this->conn->prepare("SHOW COLUMNS FROM {$this->table}");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_BOTH);
    }
    
    /* ==================================================================== 
        CRUD 
       ====================================================================*/
    
    protected function Update($aColumn, $aCondition)
    {
        echo "UPDATE {$this->table} SET {$aColumn} WHERE {$aCondition};";
        $this->QueryExecute("UPDATE {$this->table} SET {$aColumn} WHERE {$aCondition};");
    }

    protected function Delete($aCondition)
    {
        $this->QueryExecute("DELETE FROM {$this->table} WHERE {$aCondition};");
    }

    protected function Insert($aColumn, $aValues)
    {
        $this->QueryExecute("INSERT INTO {$this->table}({$aColumn}) VALUES({$aValues})");
    }

}

