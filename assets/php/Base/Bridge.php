<?php

class Bridge{
    
    private $conn;
    private $table;
    private $column;
        
    protected function __construct($aTable, $column){
        require($_SERVER["DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Proprieties/ConfigDB.php");
        $this->conn = &$conn;      
        $this->table = $aTable;
        $this->column = $column;
    }

    /* ==================================================================== 
        Query Functions 
       ====================================================================*/

    public function SelectAllBP($aCondition = "1", ...$args){
        return $this->BindParameters("SELECT * FROM {$this->table} WHERE {$aCondition};", $args);
    }

    public function SelectColumnsBP($column, $aCondition = "1", ...$args){
        return $this->BindParameters("SELECT {$column} FROM {$this->table} WHERE {$aCondition};", $args);
    }
    /* ==================================================================== 
        Execute Functions 
       ====================================================================*/

    public function BindParameters($query, $args)
    {
        if(substr_count($query, "?") == count($args)){
            $stmt = $this->conn->prepare($query);
            $stmt->execute($args);
            return $stmt->fetchAll(PDO::FETCH_BOTH);
        }
        return false;
    }


    protected function Query($aQuery)
    {
        $stmt = $this->conn->prepare($aQuery);
        $stmt->execute();
    }

    protected function QueryExecute($query, $args)
    {
        echo "<br>CONDIÇÃO<br>";
        var_dump(substr_count($query, "?"));
        var_dump(count($args));

        if(substr_count($query, "?") == count($args))
        {
            $stmt = $this->conn->prepare($query);
            $count = 1;
            var_dump($query);
            echo "<br>Keys<br>";
            var_dump($args);
            foreach($args as &$key){
                $stmt->bindParam($count++, $key);
                var_dump($key);
            }

            $stmt->execute();
            echo "Query Executada com sucesso";

            echo 1;
            return true;
        }
        echo 0;
        echo "Query Falhou!";
        return false;
    }

    protected function GetColumns(){
        $stmt = $this->conn->prepare("SHOW COLUMNS FROM {$this->table}");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_BOTH);
    }

    public function GetData($id){
        $result = array();
        $vars = $this->GetAtributesName();
        $result = $this->SelectAllBP($this->column . " = ?", $id);
        return $this->DataToArray($vars, $result);
    }

    public function DataToArray($vars, $values){
        $temp = array();

        if(!empty($values)){
            foreach($values as $x){
                for($count = 0; $count < count($vars); ++$count){
                    $temp[$count] = $x[$count];
                }
            }
            return $temp;
        }
        return false;  
    }

    private function getType($var){
        if(is_int($var)){
            return PDO::PARAM_INT;
        }else{
            if(is_string($var)){
                return PDO::PARAM_STR;
            }
        }
    }

    public function GetAtributesName(){
        $object = $this; 
        $array = array_keys((array)$object);
        $class = get_class($object);
        foreach($array as $key => $element){
            if(strpos($array[$key], "Bridge") == false){
                if(strpos($array[$key], $class) == 1){
                    $array[$key] = substr($array[$key], strlen($class) + 1);
                } 
            }else{
                unset($array[$key]);
            }
        }
        return $array;
    }

    /* ==================================================================== 
        CRUD 
    ====================================================================*/
    
    protected function Update($aColumn, $aCondition, ...$args)
    {
        $this->BindParameters("UPDATE {$this->table} SET {$aColumn} WHERE {$aCondition};", $args);
    }

    protected function Delete($aCondition, ...$args)
    {
        $this->BindParameters("DELETE FROM {$this->table} WHERE {$aCondition};", $args);
    }

    public function Insert($aColumn, $args)
    {
        if($aColumn != Null && $aColumn != ""){
            $values = "";
            for($count = 0; $count < count($args); ++$count){
                $values = $count == 0 ? "?" :  $values . ", ?";
            }
            $this->QueryExecute("INSERT INTO {$this->table}({$aColumn}) VALUES({$values})", $args);
        }
    }

    public function DeleteObject($id)
    {
        $this->QueryExecute("DELETE FROM `{$this->table}` WHERE {$this->column} = ?;", array($id));
    }

    public function InsertObject($array){
        $arrayCols = $this->GetAtributesName();
        $Cols = implode(", ", $arrayCols);
        echo "<br>" . $Cols;

        if($Cols != Null && $Cols != ""){
            $values = "";
            for($count = 0; $count < count($arrayCols) ; ++$count){
                $values = $count == 0 ? "?" :  $values . ", ?";
            }
            $this->QueryExecute("INSERT INTO {$this->table}({$Cols}) VALUES({$values})", $array);
        }
    }
}