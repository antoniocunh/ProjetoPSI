<?php

class Bridge{
    
    public $conn;
    private $table;
        
    public function __construct($aTable){
        require("../../Proprieties/ConfigDB.php");
        $this->conn = $conn;      
        $this->table = $aTable;
    }

    /* ==================================================================== 
        Query Functions 
       ====================================================================*/

    public function SelectAll($aCondition = "1=1"){
        return $this->QueryFetchAll("SELECT * FROM {$this->table} WHERE {$aCondition};");
    }

    public function SelectColumns($column, $aCondition = "1=1"){
        return $this->QueryFetchAll("SELECT {$column} FROM {$this->table} WHERE {$aCondition};");
    }

    public function SelectOrderBy($aColumn, $aOrder="ASC"){
        return $this->QueryFetchAll("SELECT {$aColumn} FROM {$this->table} ORDER BY {$aColumn} {$aOrder};");
    }
    
    /* ==================================================================== 
        Execute Functions 
       ====================================================================*/

    public function QueryFetchAll($aQuery)
    {
        $stmt = $this->conn->prepare("{$aQuery}");
        $stmt->execute();
        return $this->GetArray($stmt);
    }

    public function QueryExecute($aQuery)
    {
        $stmt = $this->conn->prepare("{$aQuery}");
        $stmt->execute();
    }

    public function GetArray($stmt){
        $temp = array();
        $temp = $stmt->fetchAll(PDO::FETCH_BOTH);
        $array = array_values($temp);
        return $array;
    }

    public function GetData($aObject){
        echo "<pre>";
        var_dump($aObject);
        /*foreach($object as $key => $value) {
            echo "$value\n";
            }*/
        echo "</pre>";
    }

    public function GetColumns(){
        $stmt = $this->conn->prepare("SHOW COLUMNS FROM {$this->table}");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_BOTH);
    }
    
    /* ==================================================================== 
        CRUD 
       ====================================================================*/
    
    public function Update($aColumn, $aCondition)
    {
        $this->QueryExecute("UPDATE {$this->table} SET {$aColumn} WHERE {$aCondition};");
    }

    public function Delete($aCondition)
    {
        $this->QueryExecute("DELETE FROM {$this->table} WHERE {$aCondition};");
    }

    public function Insert($aColumn, $aValues)
    {
        $this->QueryExecute("INSERT INTO {$this->table}({$aColumn}) VALUES({$aValues})");
    }

}