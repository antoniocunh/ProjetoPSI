
<?php
ini_set('display_errors', 1);
     $host = "localhost";
     $dbname = "ppsi-2019-gr5";
     $user = "root";
     $password = "";

    try
    {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e){
        echo $e->getMessage();
    }
    
?>