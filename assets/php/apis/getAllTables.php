<?php

    function selectAllDB($table, $condition){
        require('../library/configDatabase.php');
        $table = "`{$table}`";
        $stmt = $conn->prepare("SELECT * FROM {$table} WHERE {$condition};");
        $stmt->execute();
        $temp = array();
        $temp = $stmt->fetchAll(PDO::FETCH_BOTH);
        $array = array_values($temp);
        return $array;
    }
?>