<?php

require_once $_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Facade/class.User.php";
require_once $_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/Mailer/class.Mail.php";

class ForgotPass{

    public function ResetPassword($aEmail)
    {
        $User  = new User('vcEmail');
        $Mail = new Mail();
        
        $User->readObject($aEmail);
        $ID = $User->getiIdUser();
    
        if (!is_null($ID))
        {
            $EncodedId = base64_encode($ID);
            $TokenCode = md5(uniqid(rand()));
            $User->setvcTokenCode($TokenCode);
            $User->UpdateObject();
        
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
            
            return $msg = "<div class='alert alert-success'>
                    <button class='close' data-dismiss='alert'>&times;</button>
                    Foi enviado um email para $aEmail.
                    Por favor, clique no link que lhe foi enviado para redefinir a palavra-passe.
                    </div>";
        }
        else
        {
           return $msg = "<div class='alert alert-danger'>
                    <button class='close' data-dismiss='alert'>&times;</button>
                    <strong>Desculpe!</strong> O email não consta na base de dados.
                    </div>";
        }
    }

}
?>