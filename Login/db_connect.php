<?php
    $servername = "localhost:8080";
    $username = "root";
    $password = "";
    try{
    $conn = new PDO("mysql:host=$servername;dbname=demo1", $username, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
?>