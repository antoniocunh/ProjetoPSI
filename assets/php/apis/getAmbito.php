<?php
    require('../library/configDatabase.php');

    function selectAllDB($table, $conn){
        $stmt = $conn->prepare("SELECT * FROM " . $table . ";");
        $stmt->execute();
        $temp = array();
        $temp = $stmt->fetchAll(PDO::FETCH_BOTH);
        $array = array_values($temp);
        return $array;
    }

    $a = json_encode(selectAllDB("tb_Scope", $conn),JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
    echo $a;
?>