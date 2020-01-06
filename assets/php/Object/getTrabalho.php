<?php
    echo "<pre>";
    //var_dump($_POST);
    var_dump($_FILES);
    $destination = "./uploads/" . $_FILES["file"]["name"];
    echo $destination;
    $file = $_FILES["file"]["tmp_name"];
    move_uploaded_file($file, $destination);
    if (file_exists($destination)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="'.basename($destination).'"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($destination));
        readfile($destination);
        exit;
    }
?>