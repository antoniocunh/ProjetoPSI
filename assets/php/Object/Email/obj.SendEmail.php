<?php
    
    require($_SERVER["CONTEXT_DOCUMENT_ROOT"]."/ProjetoPSI/Mailer/class.Mail.php");

    $mail = new Mail();

    $Email = $_POST['email'];
    $Name = $_POST['name'];
    $Subject = $_POST['subject'];
    $Message = $_POST['message'];

    $mail->sendContactMail($Email, $Name, $Message, $Subject);

?>