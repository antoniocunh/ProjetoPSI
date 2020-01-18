    <?php
    
    require($_SERVER["CONTEXT_DOCUMENT_ROOT"]."/ProjetoPSI/assets/php/Facade/User.php");
    require($_SERVER["CONTEXT_DOCUMENT_ROOT"]."/ProjetoPSI/Mailer/class.Mail.php");
    require($_SERVER["CONTEXT_DOCUMENT_ROOT"]."/ProjetoPSI/PDF/class.Build.php");

    $mail = new Mail();
    $buildPdf = new BuildPDF();
    $user = new User();

    $Columns = array
    (
        "iIDUserType",
        "vcName",
        "vcLastName",
        "vcEmail"
    );
    $Query = $user->Select($Columns).
             $user->Where([["iIDUserType", '<>', null ]], true);
    
    $result = $user->QueryExecute($Query, ["0"], true);

    $Subject = "Certificado de Participação";
    $PathFile=$_SERVER["CONTEXT_DOCUMENT_ROOT"]."/ProjetoPSI/PDF/Certificates/";

    for ($i=0; $i < Count($result); $i++) { 
        
        $Email=$result[$i]["vcEmail"];
        $FirstName=$result[$i]["vcName"];
        $LastName=$result[$i]["vcLastName"];
        
        $FullName = $FirstName." ".$LastName;

        //Construção do corpo de E-mail
        $Message = "Olá , $FullName<br/><br/>
                  Segue em anexo o certificado de participação na Conferencia.<br><br>
      
                  Cumprimentos,<br/>
                  Estga Conferência";

        //TODO NAME FILES
        //0 ADMIN                         
        if($result[$i]["iIDUserType"]==1)//       1		Comissão Organizadora
            $GeneratedPDF = $buildPdf->$GenerateFile($PathFile."Certificado2019_ORADORES_CONVIDADOS.pdf",$FullName);
        if($result[$i]["iIDUserType"]==2)//       2		Comissão Científica
            $GeneratedPDF = $buildPdf->$GenerateFile($PathFile."Certificado2019_ORADORES_CONVIDADOS.pdf",$FullName);
        if($result[$i]["iIDUserType"]==3)//       3		Oradores
            $GeneratedPDF = $buildPdf->$GenerateFile($PathFile."Certificado2019_ORADORES_CONVIDADOS.pdf",$FullName);
        if($result[$i]["iIDUserType"]==4)//       4		Autor
            $GeneratedPDF = $buildPdf->$GenerateFile($PathFile."Certificado2019_ORADORES_CONVIDADOS.pdf",$FullName);
        if($result[$i]["iIDUserType"]==5)//       5		Participante
            $GeneratedPDF = $buildPdf->$GenerateFile($PathFile."Certificado2019_ORADORES_CONVIDADOS.pdf",$FullName);


        $mail->sendMailAttachment($Email, $Message, $Subject, $GeneratedPDF);
        //Destroy PDF
        unlink($GeneratedPDF);
    }

    

        




?>