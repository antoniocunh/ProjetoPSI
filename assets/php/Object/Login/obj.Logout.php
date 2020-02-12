<?php
    session_start();
    session_destroy();
    //echo "<pre>";
    //var_dump($_SERVER);
    header("location: http://" . $_SERVER["SERVER_NAME"] . "/ProjetoPSI/Index.html");
?>