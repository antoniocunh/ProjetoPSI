<?php

use PHPMailer\PHPMailer\PHPMailer;   
use PHPMailer\PHPMailer\Exception;    
 require 'PHPMailer/src/Exception.php';    
 require 'PHPMailer/src/PHPMailer.php';    
 require 'PHPMailer/src/SMTP.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);


    $mail = new PHPMailer;
        $mail->CharSet = 'UTF-8';
        $mail->isSMTP();
        $mail->SMTPSecure = 'ssl';
        $mail->SMTPAuth = true;
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 465;
        $mail->Username = 'conferenciaestga@gmail.com';
        $mail->Password = '123456789AA!!';
        $mail->setFrom('conferenciaestga@gmail.com', 'estga-conferencia');
        $mail->addAddress("darkmadarauchila5000@gmail.com");
        $mail->Subject = 'Solicitação de recuperação de conta';
        $mail->Body = "CONAAAAAAAAAA";
        //$mail->Body = "<h3>Olá ".$row["primeiro_nome"].",</h3><p>Esta é a tua password temporária: ".$password;
        $mail->IsHTML(true); 

        if($mail->send())
            echo 'Message has been sent';
        else 
            echo $mail->ErrorInfo;

?>
