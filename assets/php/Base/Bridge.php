<?php

class Bridge{
    
    private $conn;
    private $table;
    private $column;
    private $ColumType = "Column";
    private $ValueType = "Value";
    

    protected function __construct($aTable, $column){
        require($_SERVER["DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Proprieties/ConfigDB.php");
        $this->conn = &$conn;      
        $this->table = $aTable;
        $this->column = $column;
    }

    /* ==================================================================== 
        Query Functions 
       ====================================================================*/
    protected function SelectAll(){
        return $this->Query("SELECT * FROM {$this->table}");
    }

    protected function SelectAllBP($aCondition = "1", ...$args){
        return $this->BindParameters("SELECT * FROM {$this->table} WHERE {$aCondition};", $args);
    }

    protected function SelectColumnsBP($column, $aCondition = "1", ...$args){
        return $this->BindParameters("SELECT {$column} FROM {$this->table} WHERE {$aCondition};", $args);
    }
    /* ==================================================================== 
        Execute Functions 
       ====================================================================*/

    protected function BindParameters($query, $args)
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

    protected function GetColumns(){
        $stmt = $this->conn->prepare("SHOW COLUMNS FROM {$this->table}");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_BOTH);
    }

    protected function DataToArray($vars, $values){
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

    protected function GetAtributesName(){
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

    
    public function GetObject($id){
        $result = array();
        $vars = $this->GetAtributesName();
        var_dump($vars);
        $result = $this->SelectAllBP($this->column . " = ?", $id);
        return $this->DataToArray($vars, $result);
    }

    /* ==================================================================== 
        CRUD 
       ====================================================================*/
    
    protected function Update($aColumn, $aCondition, ...$args)
    {
        echo "UPDATE {$this->table} SET {$aColumn} WHERE {$aCondition};";
        $this->BindParameters("UPDATE {$this->table} SET {$aColumn} WHERE {$aCondition};", $args);
    }

    protected function Delete($aCondition, ...$args)
    {
        $this->BindParameters("DELETE FROM {$this->table} WHERE {$aCondition};", $args);
    }
    
    protected function DeleteObject($id)
    {
        echo "DELETE FROM {$this->table} WHERE {$this->column} = {$id};";
        $this->QueryExec("DELETE FROM {$this->table} WHERE {$this->column} = ?;", array($id));
    }

    protected function Insert($aData)
    {
        $columns = $this->GetAtributesName();
        $holders = $this->setHolders($columns);
        $cols = $this->setColumns($columns);

        $rColumns = $this->prepareObject($aData, $this->ColumType);
        $rValues = $this->prepareObject($aData, $this->ValueType);

        echo "<br>===================================================";
        echo "<br>PRINT<br>";
        echo "INSERT INTO tb_user($rColumns) VALUES($rValues)";
        echo "<br>===================================================<br>";

        $this->QueryExecute("INSERT INTO tb_user($rColumns) VALUES($rValues)", $aData);
    }

    public function prepareObject($aData, $aType)
    {
        $array = array();
        foreach($aData as $Name => &$Value){
            if(!empty($Value))
              if($aType == $this->ColumType)
                    array_push($array, $Name);
               else if($aType == $this->ValueType)
                        array_push($array, '"?"');
                    /*
                        INSERT INTO tb_user(iIdUser,iIdScope,vcName,vcLastName,vcAddress,vcPhoneNumber,vcEmail,vcCountry,vcAfiliation,vcUsername,vcPassword,vcCity,vcPostalCode,dtBirth) 
                        VALUES("?","?","?","?","?","?","?","?","?","?","?","?","?","?")
                    */
                    /*
                        array_push($array, '"'.$Value.'"'); 
                            INSERT INTO tb_user(iIdUser,iIdScope,vcName,vcLastName,vcAddress,vcPhoneNumber,vcEmail,vcCountry,vcAfiliation,vcUsername,vcPassword,vcCity,vcPostalCode,dtBirth)
                            VALUES("17","2","António","Cunha","Rua Dr. Marques da Costa","913245857","antonio3cunha505@gmail.com","Portugal","Estudante","teste12334d","sdsdfsdf.","dgf","3800-596","1996-02-14")
                    */
        }

        $rValue = implode(",", $array);
        return $rValue;
    }

    protected function QueryExecute($aQuery, $aData)
    {
        try
        {
            $stmt = $this->conn->prepare($aQuery);

            foreach ($aData as $Name => &$Value){
                if(!empty($Value)){
                    echo "<br>".$Name." - ".$Value;
                    $stmt->bindParam($Name, $Value);
                }
            }

            $stmt->execute();
            echo "<br>Query executada com sucesso!";
            return true;
        }
        catch(PDOException $e){
            echo "<br>".$e->getMessage();
            return false;
        }
    } 


    protected function QueryExec($aQuery, $aData)
    {
        try
        {
            $stmt = $this->conn->prepare($aQuery);

            $count = 1;
            
            foreach($aData as $key){
                $stmt->bindParam($count++, $key);
            }

            $stmt->execute();
            echo "<br>Query executada com sucesso!";
            return true;
        }
        catch(PDOException $e){
            echo "<br>".$e->getMessage();
            return false;
        }
    } 

    //=========================================================================

    private function setColumns(array $columns){
        $cols = implode(', ', array_values($columns));
        return $cols;
    }
    
    private function setFields(array $columns){
        $fields = implode(' = ?, ', array_values($columns));
        return $fields.' = ?';
    }
    
    private function setHolders(array $columns){
        $holders = array_fill(1 ,count($columns),'"?"');
        return implode(', ',array_values($holders));
    }

    protected function getColumn(){
        return $this->column;
    }

    /*
        Esta Classe constroi as string com 
    */
    public function prepareParams($aData)
    {
        $array = array();
        foreach($aData as $Name => &$Value){
            if(!empty($Value))
               array_push($array, '"'.$Value.'"');
            else
                array_push($array, 'NULL');
        }

        $rValue = implode(",", $array);
        return $rValue;
    }

    public function CallFunction($aSp)
    {
        try {
            $stmt = $this->conn->prepare("CALL $aSp");
            $stmt->execute();        
            echo "<br><br>Query executada com sucesso!";
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }

}