<?php
require 'phpmailer/PHPMailerAutoload.php';

class Mail
{
    private $HostServer = 'smtp.gmail.com';
    private $Port = 587;//Default for TLS GMAIL
    private $DefaultMail = 'conferenciaestga@gmail.com';
    private $DefaultMailTitle = 'Estga Conferência';
    private $Password = '123456789AA!!';
    private $Mail;

    public function __construct()
    {
        $this->Mail = new PHPMailer;
        $this->Mail->isSMTP();//LocalHost -------------------- TOREMOVE()
        
        $this->Mail->Host = $this->HostServer;
        $this->Mail->Port =  $this->Port;
        $this->Mail->SMTPAuth = true;
        $this->Mail->SMTPSecure = 'tls';

        $this->Mail->Username = $this->DefaultMail;
        $this->Mail->Password = $this->Password;
    }

    function sendMail($aEmail, $aMessage, $aSubject)
    {
        $this->Mail->CharSet = 'UTF-8';
        $this->Mail->Encoding = 'base64';
        $this->Mail->setFrom($this->DefaultMail, $this->DefaultMailTitle);
        $this->Mail->addAddress($aEmail);
        $this->Mail->addReplyTo($this->DefaultMail,  $this->DefaultMailTitle);
        $this->Mail->Subject = $aSubject;
        $this->Mail->MsgHTML($aMessage);
        $this->Mail->Send();
    }

    function sendMailAttachment($aEmail, $aMessage, $aSubject, $aFile)
    {
        $this->Mail->CharSet = 'UTF-8';
        $this->Mail->setFrom($this->DefaultMail, $this->DefaultMailTitle);
        $this->Mail->addAddress($aEmail);
        $this->Mail->addReplyTo($this->DefaultMail,  $this->DefaultMailTitle);
        //Percorre todos os ficheiros e adiciona-os ao corpo de email
			//for ($i=0; $i < Count($_FILES['file']['tmp_name']) ; $i++) { 
		$this->Mail->addAttachment($aFile, $aFile);
            //}
        $this->Mail->Subject = $aSubject;
        $this->Mail->MsgHTML($aMessage);
        $this->Mail->Send();
    }

    function sendContactMail($aEmail, $aName, $aMessage, $aSubject)
    {
        $this->Mail->CharSet = 'UTF-8';
        $this->Mail->setFrom($aEmail, $aEmail);
        $this->Mail->addAddress($this->DefaultMail);
        $this->Mail->addReplyTo($aEmail,  $aEmail);
        $this->Mail->Subject = $aSubject;
        $this->Mail->MsgHTML('Enviado por:'.$aName.'<br>Mail:'.$aEmail.'<br><br>'.$aMessage);
        $this->Mail->Send();
    }

}

