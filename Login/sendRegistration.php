<?php
    require('config.php');
    try{
        $t1 = "admin4fq";
        $t2 = "admin";
    $stmt = $conn->prepare("insert into tb_Admin (vcUsername, vcPassword) 
    values(?, ?)");
    $stmt->bindParam(1, $t1);
    $stmt->bindParam(2, $t2);
    $stmt->execute();
    echo "Utilizador Adicionado";
    }catch(PDOException $e){
        $stmt = $conn->prepare("SELECT `AUTO_INCREMENT`
        FROM  INFORMATION_SCHEMA.TABLES
        WHERE TABLE_SCHEMA = 'ppsi-2019-gr5'
        AND   TABLE_NAME   = 'tb_Admin';");
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_BOTH);
        $stmt = $conn->prepare("ALTER TABLE tb_Admin AUTO_INCREMENT = ?");
        $newAuto = 1;
        echo $newAuto;
        
        $stmt->bindParam(1, (int)$newAuto), PDO::PARAM_INT);
        $stmt->execute();
    }
?>