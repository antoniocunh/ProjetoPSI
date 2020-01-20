<?php
session_start();
require_once $_SERVER["CONTEXT_DOCUMENT_ROOT"] . '/ProjetoPSI/Mailer/class.ForgotPass.php';

$ForgotPass = new ForgotPass();

if (isset($_POST['btn-submit']))
    $ForgotPass->ResetPassword($_POST['txtemail']);

?>