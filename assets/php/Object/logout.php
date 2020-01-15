<?php
    session_start();
    session_destroy();
    //echo "<pre>";
    //var_dump($_SERVER);
    header("location: " . $_SERVER["DOCUMENT_NAME"] . "/ProjetoPSI/Index.html");
?>