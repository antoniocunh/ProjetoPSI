<?php

require_once("EnumJoins.php");
require_once("EnumJoins.php");

class Bridge{
    
    private $conn;
    private $table;
    private $column;
    private $ColumType = "Column";
    private $ValueType = "Value";
    private $Alias;
    

    protected function __construct($aTable, $aColumn, $aAlias){
        require($_SERVER["DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Proprieties/ConfigDB.php");
        $this->conn = &$conn;      
        $this->table = $aTable;
        $this->column = $aColumn;
        $this->Alias = $aAlias;
    }

    /* ==================================================================== 
        Query Functions 
       ====================================================================*/

    public function SelectAllBP($aCondition = "1", ...$args){
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

    /* ==================================================================== 
        CRUD 
    ====================================================================*/
    
    protected function Update($aColumn, $aCondition, $aArgs)
    {
        $this->BindParameters("UPDATE {$this->table} SET {$aColumn} WHERE {$aCondition};", $aArgs);
    }

    protected function Delete($aCondition, ...$args)
    {
        $this->BindParameters("DELETE FROM {$this->table} WHERE {$aCondition};", $args);
    }

    protected function ReadObjectBD($id){
        $result = array();
        $vars = $this->GetAtributesName();
        $result = $this->SelectAllBP($this->column . " = ?", $id);
        return $this->DataToArray($vars, $result);
    }
    
    protected function UpdateObjectBD($aId, $aData)
    {
        $columns = $this->GetAtributesName();
        $holders = $this->setHolders($columns);
        $cols = $this->setColumns($columns);

        $rColumns = $this->prepareInsert($aData, $this->ColumType);
        $rValues = $this->prepareInsert($aData, $this->ValueType);

        $aData["vcUsername"] = "33333";
        $aData["vcEmail"] = "Tete@gmail.com";
        
        $this->QueryExecute("REPLACE INTO {$this->table}($rColumns) VALUES($rValues)", $aData);

        
        /*var_dump($aData);
        $rFields = $this->prepareUpdateV2($aData);
           
        array_push($aData, $aId);
        $aData["vcUsername"] = "3333333333333333333333333333333333333";
        $aData["vcEmail"] = "TesasdaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaadteTeste@gmail.com";
        echo "<br>===================================================";
        echo "<br>PRINT<br>";
        
        //$query = "UPDATE {$this->table} SET {$rFields} WHERE {$this->column} = {$a};"; - '"'.$a.'"'
        $query = "REPLACE INTO tb_User SET {$rFields} WHERE vcUsername = ?;";
        echo  $query;
        

        $this->QueryExecute($query, $aData);
        echo "<br>===================================================<br>";
        */
    }
    
    private function prepareUpdateV2($aData)
    {
        $rValue = "";
        $i =1;
        foreach($aData as $Name => &$Value){
            if($i<count($aData))
               $rValue = $rValue." ".$Name."=?,";
            else
                $rValue = $rValue." ".$Name."=? ";

           $i++;
        }
        return $rValue;
    }
    
    private function RemoveDataParams($aData, ...$aParams){
          //Exclui Elementos que nao quero passar no aData
          foreach ($aParams as $Param)
            foreach (array_keys($aData, $Param) as $Value) {
                unset($aData[$Value]);
            }

        return $aData;
    }

    protected function DeleteObjectBD($id)
    {
        $this->QueryExecute("DELETE FROM {$this->table} WHERE {$this->column} = ?;", array($id));
    }

    protected function InsertObjectBD($aData)
    {
        $columns = $this->GetAtributesName();
        $holders = $this->setHolders($columns);
        $cols = $this->setColumns($columns);

        $rColumns = $this->prepareInsert($aData, $this->ColumType);
        $rValues = $this->prepareInsert($aData, $this->ValueType);
        
        $this->QueryExecute("INSERT INTO {$this->table}($rColumns) VALUES($rValues)", $aData);
    }

    private function prepareInsert($aData, $aType)
    {
        $array = array();
        foreach($aData as $Name => &$Value){
              if($aType == $this->ColumType)
                    array_push($array, $Name);
               else if($aType == $this->ValueType)
                        array_push($array, '?');
        }

        $rValue = implode(",", $array);
        return $rValue;
    }

    public function QueryExec($aQuery)
    {
        try{
            $stmt = $this->conn->prepare($aQuery);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_BOTH);
        }
        catch(PDOException $e){
            //$stmt->debugDumpParams();
            echo "<br>".$e->getMessage();
            return false;
        }
    }

    private function QueryExecute($aQuery, $aData)
    {
        try{
            if(substr_count($aQuery, '?') != count($aData))
                throw new PDOException("Invalid number of tokens! - " . substr_count($aQuery, "?") . " of " . count($aData));

            $stmt = $this->conn->prepare($aQuery);
            $count = 1;
            foreach ($aData as $Name => &$Value){
                    $stmt->bindParam($count++, $Value);
            }

            $stmt->execute();
            $stmt->debugDumpParams();
            return true;
        }
        catch(PDOException $e){
            //$stmt->debugDumpParams();
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
        $holders = array_fill(1 ,count($columns),'?');
        return implode(', ',array_values($holders));
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

    //================================GETTERS==============================

    /**
     * Get the value of column
     */ 
    public function getColumn()
    {
        return $this->column;
    }

    //===============================================================================================


    //TODO - COUNT AVG ETC WITH ORDERBY DISTINCT
    public function Select($aField=null)
    {
        $Query="";
        $Select="SELECT ";
        $From=" FROM {$this->table}";
        

        //Se Array For Null
        if(is_null($aField))
            $Query = $Select."*".$From;
        else 
        {
            $Columns="";
            $i=1;
            $FieldNums=count($aField);

            foreach($aField as &$Name){
                $Columns = $i < $FieldNums ? $Columns."{$this->Alias}.{$Name}, " : $Columns."{$this->Alias}.{$Name}";
                $i++;
            }

            $Query = $Select.$Columns.$From." AS {$this->Alias}";
        }
        
        return $Query;
    }

    public function SelectJoin($aField)
    {
        $Query="";
        $Select="SELECT ";
        $From= " FROM {$this->table}";
        $Columns="";

        $i=1;
        $FieldNums=count($aField);
        
        foreach ($aField as $key => $value) {

            if(!is_null($aField[$i-1][0])) //Se o Alias do Array vier vazio então mete o alias definido da Classe
                $Columns = $i < $FieldNums ? $Columns.$aField[$i-1][0].".".$aField[$i-1][1].", " :  $Columns.$aField[$i-1][0].".".$aField[$i-1][1];
            else
                $Columns = $i < $FieldNums ? $Columns."{$this->Alias}.".$aField[$i-1][1].", " :  $Columns."{$this->Alias}.".$aField[$i-1][1];

            $i++;
        }

        $Query = $Select.$Columns.$From." AS {$this->Alias}";
        
        return $Query;
    }

    /**
     * Function Join - Monta a Parte Do Join
     * * @param aTable - Tabela que vou juntar á query 
     * * @param aAlias - Alias da Tabela
     * * @param aField - Array de Campos que quero juntar no Join
     * * @param aJoin - Define o Tipo de Join
     * 
     * @return  self
     */ 
    public function Join($aTable, $aAlias=null, $aField, $aJoin)
    {
        if(is_null($aTable))
            throw new Exception('Tabela não existe ou está vazia!');

        $JoinStr = "";
        $Condition = "";
        $i=1;

        $FieldNums = is_array($aField) ? count($aField) : 0;

        $JoinStr = is_null($aAlias) ? " ".$aJoin." JOIN {$aTable} ON ": " ".$aJoin." JOIN {$aTable} AS {$aAlias} ON ";
        
        if($FieldNums >1){
            foreach($aField as &$Name)
            {
                if(is_null($aAlias))
                    $Condition = $i < $FieldNums ? $Condition."{$this->Alias}.{$Name} = {$aTable}.{$Name} AND " : $Condition."{$this->Alias}.{$Name} = {$aTable}.{$Name}";
                else 
                    $Condition = $i < $FieldNums ? $Condition."{$this->Alias}.{$Name} = {$aAlias}.{$Name} AND " : $Condition."{$this->Alias}.{$Name} = {$aAlias}.{$Name}";
               $i++;
            }
        }
        else {
            $Condition = "{$this->Alias}.{$aField} = {$aAlias}.{$aField}";
        }

        $Query = $JoinStr.$Condition;
        
        return $Query;
    }

    // FALTA O -(OR) OR AND (NOT)
    public function Where($aField, $aOperator)
    {
        if(is_null($aField))
            throw new Exception('Procedimento sem Valores definidos!');
        
        if(is_array($aField) && is_array($aOperator))
            if(count($aField) != count($aOperator))
                throw new Exception('O numero de Campos e Operadores definidos não coincide!');
        $i=1;
        $FieldNums = is_array($aField) ? count($aField) : 0;
        $Where=" WHERE ";
        $Condition="";

        if($FieldNums >1){
            foreach($aField as &$Name)
            {
               $Condition = $i < $FieldNums ? $Condition."{$this->Alias}.{$Name}".$aOperator[$i-1]."? AND " : $Condition."{$this->Alias}.{$Name}".$aOperator[$i-1]."? ";
               $i++;
            }
        }
        else {
            $Condition = "{$this->Alias}.{$aField}".$aOperator[0]."? ";
        }

        $Query = $Where.$Condition;
        
        return $Query;
    }


    //Não Está Acabado
    public function OrderBy($aField)
    {
        $Query="";
        $OrderBy="ORDER BY ";
        
        $Columns="";
        $i=1;
        $FieldNums=count($aField);
        
        foreach($aField as &$Name)
        {
            $Columns = $i < $FieldNums ? $Columns."{$this->Alias}.{$Name}, " : $Columns."{$this->Alias}.{$Name}";
            $i++;
        }

        $Query = $OrderBy.$Columns;
        
        return $Query;
    }


    public function GroupBy()
    {
        
    }

}
