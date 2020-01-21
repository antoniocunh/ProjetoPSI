    <?php
    require($_SERVER["CONTEXT_DOCUMENT_ROOT"]."/ProjetoPSI/assets/php/Object/ValidationDates/obj.DtEvent.php");
    require($_SERVER["CONTEXT_DOCUMENT_ROOT"]."/ProjetoPSI/assets/php/Object/Roles/obj.VerifyLogin.php");
    require($_SERVER["CONTEXT_DOCUMENT_ROOT"]."/ProjetoPSI/assets/php/Object/Roles/obj.VerifyAdminRole.php");
    require($_SERVER["CONTEXT_DOCUMENT_ROOT"]."/ProjetoPSI/assets/php/Object/Roles/obj.OutOfPermitionRedirect.php");
    
    require($_SERVER["CONTEXT_DOCUMENT_ROOT"]."/ProjetoPSI/assets/php/Facade/class.User.php");
    require($_SERVER["CONTEXT_DOCUMENT_ROOT"]."/ProjetoPSI/Mailer/class.Mail.php");
    require($_SERVER["CONTEXT_DOCUMENT_ROOT"]."/ProjetoPSI/PDF/class.Build.php");

    $mail = new Mail();
    $buildPdf = new BuildPDF();
    $user = new User();
    
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
    $Query = $user->Select($Columns).
             $user->Where([["iIdUserType", '=', null ]], true);
    
    $Result = $user->QueryExecute($Query, [$Role], true);
    $PathFile=$_SERVER["CONTEXT_DOCUMENT_ROOT"]."/ProjetoPSI/PDF/Certificates/";

    try{
        if(!empty($Result))
        {    
            for ($i=0; $i < Count($Result); $i++) 
            { 
                $Email=$Result[$i]["vcEmail"];
                
                $FirstName=$Result[$i]["vcName"];
                $LastName=$Result[$i]["vcLastName"];
                $FullName = $FirstName." ".$LastName;
                //Definir os SETS

                if($Result[$i]["iIdUserType"]==0)// x      0		Admin
                    $GeneratedPDF = $buildPdf->GenerateFile($PathFile."Certificado2019_ORADORES_CONVIDADOS.pdf", $FullName);     
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