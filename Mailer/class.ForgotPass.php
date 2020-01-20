<?php

require_once $_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Facade/class.User.php";
require_once $_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/Mailer/class.Mail.php";

class ForgotPass{

    public function ResetPassword($aEmail)
    {
        $User2  = new User('vcEmail');
        $Mail = new Mail();
        
        $User2->readObject($aEmail);
        $ID = $User2->getiIdUser();
    
        if (!is_null($ID))
        {
            $EncodedId = base64_encode($ID);
            $TokenCode = md5(uniqid(rand()));
            $User2->setvcTokenCode($TokenCode);
            $User2->UpdateObject();
        
            //Construção do Url
            $Url  = "http://" . $_SERVER["SERVER_NAME"] . "/ProjetoPSI/Login/includes/reset-password.php?id=$EncodedId&code=$TokenCode";   //TA MAL

            //Construção do corpo de E-mail
            $Message = "Olá , $aEmail<br/><br/>
                        Fomos solicitados a redefinir sua senha. Para isso, basta clicar no link a seguir para redefinir sua senha;<br> 
                        Se não, pode apenas ignorar este e-mail<br><br>
                        
                        <a href='$Url'>$Url</a><br/><br/>
                        Cumprimentos,<br/>
                        Estga Conferência";
        
            $Subject = "Alteração ";
            $Mail->sendMail($aEmail,$Message,$Subject);
            
            $msg = "<div class='alert alert-success'>
                    <button class='close' data-dismiss='alert'>&times;</button>
                    We've sent an email to $aEmail.
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

}
?>