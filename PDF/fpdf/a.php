<?php

require_once('index.php');


$PDF = new PDF();
$PDF->Create();


?>


<?php
//define('FPDF_FONTPATH','/Library/WebServer/Documents/derby/font/');
require( 'fpdf.php' );
 
class PDF extends FPDF
{
    public function DrawString($aString)
    {
        // W- H - T - Border
    }
   
    public function Create()
    {
        /*$pdf = new PDF();
        $pdf->SetFont('Arial','',10);
        $pdf->Cell(40,10,"Cona",0);
        $pdf->AddPage();
        return $pdf->Output();*/
        $name = $_POST['uName'];
        $lastname = $_POST['uLName'];
        $FName= $name." ".$lastname;
        require('fpdf.php');

        $pdf = new PDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial','',10);
        $pdf->Cell(40,10,$FName,0);
        $pdf->Output();
    }
}   
?>