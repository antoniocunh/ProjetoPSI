
<?php
    $servername = "estga-dev.clients.ua.pt";
    $username = "ppsi-2019-gr5";
    $password = "S%#5H6z8r+";

    try{
    $conn = new PDO("mysql:host=$servername;dbname=ppsi-2019-gr5", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
?>