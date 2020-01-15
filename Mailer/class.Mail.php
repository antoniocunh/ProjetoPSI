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
        $this->Mail->CharSet = 'UTF-8';
        $this->Mail->Host = $this->HostServer;
        $this->Mail->Port =  $this->Port;
        $this->Mail->SMTPAuth = true;
        $this->Mail->SMTPSecure = 'tls';

        $this->Mail->Username = $this->DefaultMail;
        $this->Mail->Password = $this->Password;
    }

    function sendMail($aEmail, $aMessage, $aSubject)
    {
        $this->Mail->setFrom($this->DefaultMail, $this->DefaultMailTitle);
        $this->Mail->addAddress($aEmail);
        $this->Mail->addReplyTo($this->DefaultMail,  $this->DefaultMailTitle);
        $this->Mail->Subject = $aSubject;
        $this->Mail->MsgHTML($aMessage);
        $this->Mail->Send();
    }

}

