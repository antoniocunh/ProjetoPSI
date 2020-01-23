    <?php

    /**
     * Envia certificados para o email para os membros de uma role escolhida pelo utilizado
     * 
     */
    require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"]."/ProjetoPSI/assets/php/Object/Roles/obj.VerifyLogin.php");
    require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"]."/ProjetoPSI/assets/php/Object/Roles/obj.VerifyAdminRole.php");
    require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"]."/ProjetoPSI/assets/php/Object/Roles/obj.OutOfPermitionRedirect.php");
    
    require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"]."/ProjetoPSI/assets/php/Facade/class.User.php");
    require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"]."/ProjetoPSI/Mailer/class.Mail.php");
    require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"]."/ProjetoPSI/PDF/class.Build.php");

    
    $buildPdf = new BuildPDF();
    $userMail = new User();
    
    $Role = $_POST['role'];
    $Subject = $_POST['subject'];
    //Construção do corpo de E-mail
    $Message = $_POST['message'];


    $Columns = array
    (
        "iIdUserType",
        "vcName",
        "vcLastName",
        "vcEmail"
    );
    $Query = $userMail->Select($Columns).
             $userMail->Where([["iIdUserType", '=', null ]], true);
    
    $Result = $userMail->QueryExecute($Query, [$Role], true);
    $PathFile=$_SERVER["CONTEXT_DOCUMENT_ROOT"]."/ProjetoPSI/PDF/Certificates/";
    try{
        if(!empty($Result))
        {    
            for ($i=0; $i < Count($Result); $i++) 
            { 
                $mail = new Mail();
                $Email=$Result[$i]["vcEmail"];
                
                //Concatenar o nome
                $FirstName=$Result[$i]["vcName"];
                $LastName=$Result[$i]["vcLastName"];
                $FullName = $FirstName." ".$LastName;

                //Escolher o certificado certo para a role especifica
                if($Result[$i]["iIdUserType"]==0)// x      0		Admin
                    $GeneratedPDF = $buildPdf->GenerateFile($PathFile."Certificado2019_PARTICIPANTES.pdf", $FullName);
                if($Result[$i]["iIdUserType"]==1)//       1		Comissão Organizadora
                    $GeneratedPDF = $buildPdf->GenerateFile($PathFile."Certificado2019_CO.pdf", $FullName);
                if($Result[$i]["iIdUserType"]==2)//       2		Comissão Científica
                    $GeneratedPDF = $buildPdf->GenerateFile($PathFile."Certificado2019_CC.pdf", $FullName);
                if($Result[$i]["iIdUserType"]==3)//       3		Oradores
                    $GeneratedPDF = $buildPdf->GenerateFile($PathFile."Certificado2019_ORADORES_CONVIDADOS.pdf", $FullName);
                if($Result[$i]["iIdUserType"]==4)//       4		Autor
                    $GeneratedPDF = $buildPdf->GenerateFile($PathFile."Certificado2019_PARTICIPANTES.pdf", $FullName);
                if($Result[$i]["iIdUserType"]==5)//       5		Participante
                    $GeneratedPDF = $buildPdf->GenerateFile($PathFile."Certificado2019_PARTICIPANTES.pdf", $FullName);

                if(!is_null($GeneratedPDF)){
                    //echo $Email.'        |           ';
                    $mail->sendMailAttachment($Email, $Message, $Subject, $GeneratedPDF);
                    //Destroy PDF
                    //unlink($GeneratedPDF);
                }
                else
                    echo '0';
            }
            echo '1';
        }
        else
            echo '0';
    }
    catch(Exception $e)
    {
        echo '0';
    }

?>