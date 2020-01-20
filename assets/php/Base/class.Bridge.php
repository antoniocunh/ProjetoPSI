<?php

ini_set('display_errors', 1);
require_once("enum.Joins.php");

/**
 * Class da Bridge.
 * 
 * Class que interliga as classes e a base de dados, e permite a facilidade e agilização das querries.
 * 
 * Class desenvolvida de raiz pelo grupo.
 */

class Bridge{
    
    private $conn; //coneção da bd
    private $table; //tabela
    private $column; // coluna
    private $ColumType = "Column"; // tipo de coluna
    private $ValueType = "Value"; // tipo de valor
    private $Alias; //alias
    

    /**
     * Construtor da class bridge
     */
    protected function __construct($aTable, $aColumn, $aAlias){
        require($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Proprieties/ConfigDB.php");
        $this->conn = &$conn;      
        $this->table = $aTable;
        $this->column = $aColumn;
        $this->Alias = $aAlias;
    }

    /**
     * Função que faz um select all de todas as colunas de uma certa tabela
     */
    public function SelectAllBP($aCondition = "1", ...$args){
        return $this->BindParameters("SELECT * FROM {$this->table} WHERE {$aCondition};", $args);
    }

    /**
     * Função que permite dar bind a parametros numa querry, o que dá uma certa segurança contra sql injection
     */
    protected function BindParameters($query, $args)
    {
        if(substr_count($query, "?") == count($args)){
            $stmt = $this->conn->prepare($query);
            $stmt->execute($args);
            return $stmt->fetchAll(PDO::FETCH_BOTH);
        }
        return false;
    }

    /**
     * Função que retorna os nomes das colunas de uma certa tabela
     */
    protected function GetColumns(){
        $stmt = $this->conn->prepare("SHOW COLUMNS FROM {$this->table}");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_BOTH);
    }

    /**
     * Funcção que converte os dados obtidos da base de dados num array copatível com a class
     */
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

    /**
     * Funcção que vai buscar os nomes dos atributos de uma class
     */
    protected function GetAtributesName(){
        $object = $this; 
        $array = array_keys((array)$object);
        $class = get_class($object);
        foreach($array as $key => $element){
            if(strpos($array[$key], "Bridge") == false){
                if(strpos($array[$key], $class) == 1){
                    $array[$key] = substr($array[$key], strlen($class) + 2);
                } 
            }else{
                unset($array[$key]);
            }
        }
        return $array;
    }

    /**
     * Funcção que obtem todos os valores de uma certa row na bd.
     * Obtem os dados de uma certa row e converte num objeto de uma class compativel.
     */
    protected function ReadObjectBD($id){
        $result = array();
        $vars = $this->GetAtributesName();
        $result = $this->SelectAllBP($this->column . " = ?", $id);
        return $this->DataToArray($vars, $result);
    }

    /* ==================================================================== 
        Execute Functions 
       ====================================================================*/

    /**
     * Funcção que permite fazer uma execução basica à bd sem usar binds
     */   
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

    /**
     * Funcção que permite fazer uma execução à bd, mas a user bind parameters.
     * Permite também a realização e escolha de fetch
     */
    public function QueryExecute($aQuery, $aData, $aValue=0)// $bReturn = false)
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
            //if($bReturn)
            //    return $stmt->fetchAll(PDO::FETCH_BOTH);

            return $this->fetch($stmt, $aValue);
        }
        catch(PDOException $e)
        {
            echo "<br>".$e->getMessage();
            return false;
        }
    } 

    /**
     * Funcção que retorna o modo de fetch selecionado pelo parametro
     */
    private function fetch($aStmt, $aValue)
    {
        switch ($aValue) 
        {
            case 0:
                return true;
                break;
            case 1:
                return $aStmt->fetchAll(PDO::FETCH_BOTH);
                break;
            case 2:
                return $aStmt->fetch(PDO::FETCH_ASSOC);
                break;
        }
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


    //================================SETTERS==============================
    /**
     * Set the value of column
     *
     * @return  self
     */ 
    public function setColumn($column)
    {
        $this->column = $column;

        return $this;
    }

    
    //===============================================================================================
    //TODO - COUNT AVG ETC WITH ORDERBY DISTINCT
    
    
    /**
     * Funcção que faz um select à base de dados.
     * Se não levar nenhum parametro realiza um select all.
     */
    public function Select($aField=null)
    {
        $Query="";
        $Select="SELECT ";
        $From=" FROM {$this->table}";

        //Se Array For Null
        if(is_null($aField))
            $Query = $Select." * ".$From;
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
        //echo $Query;
        return $Query;
    }

    /**
     * Funcção que faz um select à base de dados, com um join
     */
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
        //echo $Query;
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
    public function Join($aJoin, $aTable, $aField, $aTBAlias=null, $aTBAliasCondition = null)
    {
        if(is_null($aTBAliasCondition))
            $aTBAliasCondition = $this->Alias;

        if(is_null($aTable))
            throw new Exception('Tabela não existe ou está vazia!');

        if(strcasecmp($aTBAlias, 'null') == 0)
            throw new Exception('O texto null é uma palavra reservada, por este motivo não pode ser usado como alias de uma tabela!');

        $JoinStr = "";
        $Condition = "";
        $x=1;

        $FieldNums = is_array($aField) ? count($aField) : 0;

        $JoinStr = is_null($aTBAlias) ? " ".$aJoin." JOIN {$aTable} ON ": " ".$aJoin." JOIN {$aTable} AS {$aTBAlias} ON ";
        
        if($FieldNums >1)
        {
            for($i=0; $i < $FieldNums; ++$i) 
            {
                //Se alias da tabela do join estiver vazia o codigo usa o nome da tabela inves de do Alias
                if(is_null($aTBAlias))
                {
                    //Se o nome da coluna do INNER Vier vazio o codigo usa o nome da coluna da tabela source como padrão para o nome da coluna da tb do Inner
                    if(isset($aField[$i][1]) && !is_null($aField[$i][1]))
                        $Condition = $x < $FieldNums ? $Condition."{$aTBAliasCondition}.{$aField[$i][0]} = {$aTable}.{$aField[$i][1]} AND " : $Condition."{$aTBAliasCondition}.{$aField[$i][0]} = {$aTable}.{$aField[$i][1]}";
                    else 
                        $Condition = $x < $FieldNums ? $Condition."{$aTBAliasCondition}.{$aField[$i][0]} = {$aTable}.{$aField[$i][1]} AND " : $Condition."{$aTBAliasCondition}.{$aField[$i][0]} = {$aTable}.{$aField[$i][1]}";    
                }
                else 
                {
                    //Se o nome da coluna do INNER Vier vazio o codigo usa o nome da coluna da tabela source como padrão para o nome da coluna da tb do Inner
                    if(isset($aField[$i][1]) && !is_null($aField[$i][1]))
                        $Condition = $x < $FieldNums ? $Condition."{$aTBAliasCondition}.{$aField[$i][0]} = {$aTBAlias}.{$aField[$i][1]} AND " : $Condition."{$aTBAliasCondition}.{$aField[$i][0]} = {$aTBAlias}.{$aField[$i][1]}";
                    else 
                        $Condition = $x < $FieldNums ? $Condition."{$aTBAliasCondition}.{$aField[$i][0]} = {$aTBAlias}.{$aField[$i][1]} AND " : $Condition."{$aTBAliasCondition}.{$aField[$i][0]} = {$aTBAlias}.{$aField[$i][1]}";
                }

               $x++;
            }
        }
        else 
            $Condition = !is_array($aField) ? "{$aTBAliasCondition}.{$aField} = {$aTBAlias}.{$aField}" : "{$aTBAliasCondition}.{$aField[0][0]} = {$aTBAlias}.{$aField[0][1]}";

        $Query = $JoinStr.$Condition;
        //echo $Query;
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

        $aBoolAlias - Desliga o Alias -  Para Deletes e querys simples a so uma tb
     */


    /**
     * Funcção que permite adicionar um where a uma querry
     */ 
    public function Where($aArrayM, $aBoolAlias)
    {
        if(is_null($aArrayM))
            throw new Exception('Procedimento sem Valores definidos!');
        
        $x=1;
        $FieldNums = is_array($aArrayM) ? count($aArrayM) : 0;
        $Where=" WHERE ";
        $Condition="";

        if($aBoolAlias)
        {
            if($FieldNums >1)
            {
                for($i=0; $i < $FieldNums; ++$i) 
                {
                   $Condition = $x < $FieldNums ? $Condition."{$this->Alias}.{$aArrayM[$i][0]}".$aArrayM[$i][1]."? " .$aArrayM[$i][2]. " ": $Condition."{$this->Alias}.{$aArrayM[$i][0]}".$aArrayM[$i][1]."? ";
                   $x++;
                }
            }
            else
                $Condition = "{$this->Alias}.{$aArrayM[0][0]}"."{$aArrayM[0][1]}"."? ";
        }else {
            if($FieldNums >1)
            {
                for($i=0; $i < $FieldNums; ++$i) 
                {
                   $Condition = $x < $FieldNums ? $Condition."{$aArrayM[$i][0]}".$aArrayM[$i][1]."? " .$aArrayM[$i][2]. " ": $Condition."{$aArrayM[$i][0]}".$aArrayM[$i][1]."? ";
                   $x++;
                }
            }
            else
                $Condition = "{$aArrayM[0][0]}"."{$aArrayM[0][1]}"."? ";
        }


        $Query = $Where.$Condition;
        //echo $Query;
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
        //echo $Query;
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
        //echo $Query;
        return $Query;
    }

    /*
        Parametros - Array de colunas para montar o SET do update
                   - Array de Colunas para o where
                   - Array de Valores para usar na query
    */

    /**
     * Funcção que permite fazer um update
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
        if($FieldNums >1)
        {
            for($i=0; $i < $FieldNums; ++$i) 
            {
                $Columns = $x < $FieldNums ? $Columns . $aField[$i][0] . $aField[$i][1]."?, ": $Columns . $aField[$i][0] . $aField[$i][1]."? ";
                $x++;
            }
        }
        else
            $Columns = $Columns."{$aField[0][0]}"."{$aField[0][1]}"."? ";

        $Query = $Update.$Columns.$this->Where($aWhere, true);
        $this->QueryExecute($Query,$aData);
        //echo $Query;
        return $Query;
    }

    /**
     * Funcção que permite fazer um delete
     */
    public function Delete($aWhere, $aData)
    {
        if(is_null($aWhere) || is_null($aData))
        throw new Exception('Preencha todos os parâmetros');
        if(is_array($aWhere)==0)
            throw new Exception('Paramentro Where tem de ser um array!');
        
        $Query = "DELETE FROM {$this->table}".$this->Where($aWhere, false);
        $this->QueryExecute($Query,$aData);
    }
    
    /**
     * Funcção que permite fazer um insert
     */
    public function Insert($aField, $aData)
    {
        $Query="";
        $Columns="";
        $ValuesBind="";
        $FieldNums = is_array($aField) ? count($aField) : 0;
        
        $Columns = $this->setColumns($aField);
        $ValuesBind = $this->setCharacterBind($aField);
        
        if($FieldNums >1)
        {
            $Columns = $this->setColumns($aField);
            $ValuesBind = $this->setCharacterBind($aField);
        }
        else
        {
            $Columns = "{$aField[0]}";
            $ValuesBind = "?";
        }

        $Query = "INSERT INTO {$this->table}(".$Columns.') VALUES('.$ValuesBind.');';
        $this->QueryExecute($Query, $aData);
        //echo $Query;
        return $Query;
    }

    //=========================================================================
    
    
    /**
     * Funcção que junta as colunas todas numa string separadas por uma virgula.
     */
    private function setColumns(array $columns){
        $cols = implode(', ', array_values($columns));
        return $cols;
    }
    
    /**
     * Funcção que junta os ?? paa permitir o uso dos binds
     */
    private function setCharacterBind(array $columns){
        $fields="";

        for($i=0; $i < count($columns)-1; ++$i) 
            $fields =$fields.'?, ';

        return $fields.'?';
    }

    /**
     * Funcção que junta os ?? paa permitir o uso dos binds 
     */
    private function setFields(array $columns){
        $fields = implode('?, ', array_values($columns));
        return $fields.' = ?';
    }
    //=========================================================================

    /**
     * Funcção que obtem o ultimo id de uma coluna 
     */
    public function GetLastID($aPKColumn)
    {
        //lastInsertId();
        $LastId = 0;
        try{
            $Query="SELECT MAX({$aPKColumn}) FROM {$this->table}";
            $Result = $this->QueryExec($Query);

            if(!isset($Result[0][0]))// is_null($Result)){
                $LastId = 0;   
            else
                $LastId = $Result[0][0]+1;
        }
        catch(PDOException $e){
            $LastId = -1;
            echo "Erro ao obter o ID.<br>Coluna do  parâmetro deve ser sempre a coluna do ID da tabela";
        }finally{
            return $LastId;
        }
    }

    //Preciso depois de entregar fazer o Refractoring desta Classe

    /*
    private function RemoveDataParams($aData, ...$aParams){
          //Exclui Elementos que nao quero passar no aData
          foreach ($aParams as $Param)
            foreach (array_keys($aData, $Param) as $Value) {
                unset($aData[$Value]);
            }

        return $aData;
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
    
    Esta Classe constroi as string com 
    
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
    */
}
