<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require('./vendor/autoload.php');

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->isSMTP();
    $mail->Host       = "ssl://smtp.gmail.com";
    $mail->SMTPAuth   = true;
    $mail->Username   = "projetopsigrupo5@gmail.com";
    $mail->Password   = "grupo5psi";
    
    $mail->Port       = 465;
    $mail->Subject = 'TOMA LA MORANGOS';
    $mail->isHTML(true);


    //Recipients
    $mail->setFrom('projetopsigrupo5@gmail.com', 'Mailer');
    $mail->addAddress('antoniocunha505@gmail.com', 'António Cunha');     // Add a recipient
    
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}


