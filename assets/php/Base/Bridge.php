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

    public function SelectAllJoin($aTable, $aCondition = "1", ...$args){
        return $this->BindParameters("SELECT * FROM {$this->table} INNER JOIN table2 ON table1.column_name = table2.column_name; WHERE {$aCondition};", $args);
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

    protected function ReadObjectBD($id){
        $result = array();
        $vars = $this->GetAtributesName();
        $result = $this->SelectAllBP($this->column . " = ?", $id);
        return $this->DataToArray($vars, $result);
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

    public function QueryExecute($aQuery, $aData)
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
            return true;
        }
        catch(PDOException $e)
        {
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

        $x=1;
        $FieldNums=count($aField);
        
        for($i=0; $i < $FieldNums; ++$i) {
            if(!is_null($aField[$i][0])) //Se o Alias do Array vier vazio então mete o alias definido da Classe
                $Columns = $x < $FieldNums ? $Columns.$aField[$i][0].".".$aField[$i][1].", " :  $Columns.$aField[$i][0].".".$aField[$i][1];
            else
                $Columns = $x < $FieldNums ? $Columns."{$this->Alias}.".$aField[$i][1].", " :  $Columns."{$this->Alias}.".$aField[$i][1];
            
            $x++;
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
     * 
     * MISSING OPERATORS 
     */ 
    public function Join($aTable, $aAlias=null, $aField, $aJoin)
    {
        if(is_null($aTable))
            throw new Exception('Tabela não existe ou está vazia!');

        if(strcasecmp($aAlias, 'null') == 0)
            throw new Exception('O texto null é uma palavra reservada, por este motivo não pode ser usado como alias de uma tabela!');

        $JoinStr = "";
        $Condition = "";
        $x=1;

        $FieldNums = is_array($aField) ? count($aField) : 0;

        $JoinStr = is_null($aAlias) ? " ".$aJoin." JOIN {$aTable} ON ": " ".$aJoin." JOIN {$aTable} AS {$aAlias} ON ";
        
        if($FieldNums >1)
        {
            for($i=0; $i < $FieldNums; ++$i) 
            {
                //Se alias da tabela do join estiver vazia o codigo usa o nome da tabela inves de do Alias
                if(is_null($aAlias))
                {
                    //Se o nome da coluna do INNER Vier vazio o codigo usa o nome da coluna da tabela source como padrão para o nome da coluna da tb do Inner
                    if(isset($aField[$i][1]) && !is_null($aField[$i][1]))
                        $Condition = $x < $FieldNums ? $Condition."{$this->Alias}.{$aField[$i][0]} = {$aTable}.{$aField[$i][1]} AND " : $Condition."{$this->Alias}.{$aField[$i][0]} = {$aTable}.{$aField[$i][1]}";
                    else 
                        $Condition = $x < $FieldNums ? $Condition."{$this->Alias}.{$aField[$i][0]} = {$aTable}.{$aField[$i][0]} AND " : $Condition."{$this->Alias}.{$aField[$i][0]} = {$aTable}.{$aField[$i][0]}";    
                }
                else 
                {
                    //Se o nome da coluna do INNER Vier vazio o codigo usa o nome da coluna da tabela source como padrão para o nome da coluna da tb do Inner
                    if(isset($aField[$i][1]) && !is_null($aField[$i][1]))
                        $Condition = $x < $FieldNums ? $Condition."{$this->Alias}.{$aField[$i][0]} = {$aAlias}.{$aField[$i][1]} AND " : $Condition."{$this->Alias}.{$aField[$i][0]} = {$aAlias}.{$aField[$i][1]}";
                    else 
                        $Condition = $x < $FieldNums ? $Condition."{$this->Alias}.{$aField[$i][0]} = {$aAlias}.{$aField[$i][0]} AND " : $Condition."{$this->Alias}.{$aField[$i][0]} = {$aAlias}.{$aField[$i][0]}";
                }

               $x++;
            }
        }
        else 
            $Condition = !is_array($aField) ? "{$this->Alias}.{$aField} = {$aAlias}.{$aField}" : "{$this->Alias}.{$aField[0][0]} = {$aAlias}.{$aField[0][0]}";

        $Query = $JoinStr.$Condition;
        
        return $Query;
    }

    /*
        htmlspecialchars - '<, >, ", &'
        Conector-(OR) OR AND (NOT)

        Array Multi dimensional

        $arrayWhere = array(
           array("Field", "Operator", "Conector"),
           array("Field", "Operator", "Conector"),
           array("Field", "Operator", NULL),
        );
     */
    public function Where($aArrayMultidimensional)
    {
        if(is_null($aArrayMultidimensional))
            throw new Exception('Procedimento sem Valores definidos!');
        
        $x=1;
        $FieldNums = is_array($aArrayMultidimensional) ? count($aArrayMultidimensional) : 0;
        $Where=" WHERE ";
        $Condition="";

        if($FieldNums >1)
        {
            for($i=0; $i < $FieldNums; ++$i) 
            {
               $Condition = $x < $FieldNums ? $Condition."{$this->Alias}.{$aArrayMultidimensional[$i][0]}".$aArrayMultidimensional[$i][1]."? " .$aArrayMultidimensional[$i][2]. " ": $Condition."{$this->Alias}.{$aArrayMultidimensional[$i][0]}".$aArrayMultidimensional[$i][1]."? ";
               $x++;
            }
        }
        else
            $Condition = "{$this->Alias}.{$aArrayMultidimensional[0][0]}"."{$aArrayMultidimensional[0][1]}"."? ";

        $Query = $Where.$Condition;
        return $Query;
    }

    //Não Está Acabado
    // FALTA O DESC E O ASC
    // VERIFICAR SE É ARRAY
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


    public function GroupBy($aField)
    {
        $Query="";
        $GroupBy="GROUP BY ";
        
        $Columns="";
        $i=1;
        $FieldNums=count($aField);
        
        foreach($aField as &$Name)
        {
            $Columns = $i < $FieldNums ? $Columns."{$this->Alias}.{$Name}, " : $Columns."{$this->Alias}.{$Name}";
            $i++;
        }

        $Query = $GroupBy.$Columns;
        
        return $Query;
    }

    /*
        Parametros - Array de colunas para montar o SET do update
                   - Array de Colunas para o where
                   - Array de Valores para usar na query
    */
    public function Update($aField, $aWhere ,$aData)
    {
        if(is_null($aField) || is_null($aWhere) || is_null($aData))
        throw new Exception('Preencha todos os parâmetros');

        if(is_array($aWhere)==0)
            throw new Exception('Paramentro Where tem de ser um array!');

        if(is_array($aData)==0)
            throw new Exception('Paramentro Data tem de ser um array!');

        $Query="";
        $Update="UPDATE {$this->table} AS {$this->Alias} SET ";
        $Columns="";

        $x=1;
        
        $FieldNums = is_array($aField) ? count($aField) : 0;
        $WhereNums = count($aWhere);
        $DataNums = count($aData);

        $Sum = $FieldNums + $WhereNums;

        if($Sum != $DataNums)
            throw new Exception('O numero de entrada no paramentro Data não coincide com os arrays fornecidos!');

        if($FieldNums >1)
        {
            for($i=0; $i < $FieldNums; ++$i) 
            {
                $Columns = $x < $FieldNums ? $Columns."{$aField[$i][0]}".$aField[$i][1]."?, ": $Columns."{$aField[$i][0]}".$aField[$i][1]."? ";
                $x++;
            }
        }
        else
            $Columns = $Columns."{$aField[0][0]}"."{$aField[0][1]}"."? ";
        
        $Query = $Update.$Columns.$this->Where($aWhere);
        $this->QueryExecute($Query,$aData);
        return $Query;
    }

    public function Delete($aWhere ,$aData)
    {
        if(is_null($aWhere) || is_null($aData))
        throw new Exception('Preencha todos os parâmetros');

        if(is_array($aWhere)==0)
            throw new Exception('Paramentro Where tem de ser um array!');

        $Query = "DELETE FROM {$this->table} AS {$this->Alias}".$this->Where($aWhere);
        $this->QueryExecute($Query,$aData);
        return $Query;
    }



}
