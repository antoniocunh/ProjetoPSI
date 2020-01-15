<?php
session_start();
require_once '../../assets/php/Facade/User.php';
require_once '../../Mailer/class.Mail.php';

$User = new User('vcEmail');
$Mail = new Mail();

//Verificação para ver se está online
//if ($User->is_logged_in() != "")
//    $User->redirect('../../Login/index.php');

if (isset($_POST['btn-submit']))
{
    $Email = $_POST['txtemail'];
    $User->readObject($Email);
    $ID = $User->getiIdUser();

    if (!is_null($ID))
    {
        $EncodedId = base64_encode($ID);
        $TokenCode = md5(uniqid(rand()));
        $User->setvcTokenCode($TokenCode);
        $User->UpdateObject();

        //Construção do Url
        $PathInfo = pathinfo($_SERVER['PHP_SELF']);
        $HostName = $_SERVER['HTTP_HOST']; 
        $Url  = "http://".$HostName.$PathInfo['dirname'].'/'."reset-password.php?id=$EncodedId&code=$TokenCode";
        
        //Construção do corpo de E-mail
        $Message = "Olá , $Email<br/><br/>
                    Fomos solicitados a redefinir sua senha. Para isso, basta clicar no link a seguir para redefinir sua senha;<br> 
                    Se não, pode apenas ignorar este e-mail<br><br>
                    
                    <a href='$Url'>$Url</a><br/><br/>
                    Cumprimentos,<br/>
                    Estga Conferência";

        $Subject = "Alteração ";
        $Mail->sendMail($Email,$Message,$Subject);
        
        $msg = "<div class='alert alert-success'>
                <button class='close' data-dismiss='alert'>&times;</button>
                We've sent an email to $Email.
                Please click on the password reset link in the email to generate new password. 
                </div>";
    }
    else
    {
        $msg = "<div class='alert alert-danger'>
                <button class='close' data-dismiss='alert'>&times;</button>
                <strong>Sorry!</strong> This email not found. 
                </div>";
    }
}
?>