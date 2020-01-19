<?php
use setasign\Fpdi\Fpdi;
use setasign\Fpdi\PdfReader;
//https://www.setasign.com/products/fpdi/manual/#p-106
//http://www.fpdf.org/
//https://manuals.setasign.com/fpdi-manual/v2/the-fpdi-class/examples/
//millimeters 
require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"].'/ProjetoPSI/PDF/fpdf/fpdf.php');
require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"].'/ProjetoPSI/PDF/fpdi2/src/autoload.php');


Class BuildPDF
    {
        public function GenerateCertificate($aPath, $aFullName)
        {
            $pdf = new Fpdi();
            $pageCount = $pdf->setSourceFile($aPath);//'./Certificates/Certificado2019_CC.pdf');

            // iterate through all pages
            for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++) {
                // import a page
                $templateId = $pdf->importPage($pageNo);
            
                $pdf->AddPage();
                //254mm=25.4cm  to cm x 190.5mm=19.5cm
                $pdf->useTemplate($templateId, ['adjustPageSize' => true]);
                //var_dump($pdf->useTemplate($templateId, ['adjustPageSize' => true]));
                $pdf->SetFont('Helvetica','',18);
                $pdf->SetXY(64.9, 100.4);//MM 64.9
                $pdf->Write(8, $aFullName);
            }

            $PathFile=$_SERVER["CONTEXT_DOCUMENT_ROOT"]."/ProjetoPSI/PDF/Certificates/GeneratedPDF.pdf";
            $pdf->Output($PathFile,'F');
            return $PathFile;
        }


        public function GenerateFile($aPathFile,$aFullName)
        {
            return $this->GenerateCertificate($aPathFile, $aFullName);
        }
        
    }
?>