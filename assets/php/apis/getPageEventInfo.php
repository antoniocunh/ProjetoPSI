<?php

    function selectAllDB($table, $condition){
        require('../library/configDatabase.php');
        $table = "tb_Event";
        $campo = "vcDescription";
        $condition = "iIdEvent=1";
        $stmt = $conn->prepare("SELECT {$campo} FROM {$table} WHERE {$condition};");
        $stmt->execute();
        $temp = array();
        $temp = $stmt->fetchAll(PDO::FETCH_BOTH);
        $array = array_values($temp);
        return $array;        
    }

    echo json_encode(selectAllDB("",""),JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
?>