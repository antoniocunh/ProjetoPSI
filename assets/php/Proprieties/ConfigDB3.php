
<?php
    $host = "estga-dev.clients.ua.pt";
    $dbname = "asw-2018-gr1";
    $user = "asw-2018-gr1";
    $password = "p^&472DbDx";

    try
    {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e){
        echo $e->getMessage();
    }
?>