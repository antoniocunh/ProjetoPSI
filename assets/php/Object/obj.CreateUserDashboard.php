<?php
//require da verificação do login
require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Object/Roles/obj.VerifyLogin.php");
//require da verificação da role de admin
require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Object/Roles/obj.VerifyAdminRole.php");
//require da class user
require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Facade/class.User.php");
//require do obj reset password
require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/Mailer/class.ForgotPass.php");

/**
 * Se o username passado pelo post e o username da sessao nao forem null, 
 * e as passes coincidirem,
 * é criado um novo utilizador
 */
if (isset($_POST["username"]) && isset($_SESSION["username"])) 
{
        $user = new User();
        $ForgotPass = new ForgotPass();
      
        $user->setVcName($_POST["nome"]); 
        $user->setVcLastName($_POST["ultimoNome"]);
        $user->setVcPhoneNumber($_POST["telefone"]);
        $user->setVcAfiliation($_POST["organizacao"]);
        $user->setIIdScope($_POST["scope"]);
        $user->setDtBirth($_POST["dataNascimento"]);
        $user->setVcAddress($_POST["morada"]);
        $user->setVcCountry($_POST["pais"]);
        $user->setVcCity($_POST["cidade"]);
        $user->setVcPostalCode($_POST["codPostal"]);
        $user->setVcUsername($_POST["username"]);
        $user->setVcEmail($_POST["email"]);
        
        $TempPass = $user->getVcPhoneNumber().$user->getVcPostalCode();
        $user->setVcPassword($TempPass);
        
        $user->setIIdUserType($_POST["role"]);
        $user->setEnumUserStatus("N");
        
        $user->InsertObject(); //insert do objeto

        $Email = $user->getVcEmail();
        //Envia o Email com o link para o reset da password
        $ForgotPass->ResetPassword($Email);
        
    $msg = json_encode(["msg" => "Utilizador criado com sucesso"]); //mensagem json de sucesso
}
else
    $msg = json_encode(["msg" => "Nao foi possivel criar o utilizador!"]);//mensagem json de erro


echo $msg;

