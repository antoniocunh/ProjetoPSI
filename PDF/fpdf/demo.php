<?php
use setasign\Fpdi\Fpdi;
use setasign\Fpdi\PdfReader;
require('fpdf.php');
require_once('autoload.php');

$name = $_POST['uName'];
$lastname = $_POST['uLName'];
$FName= $name." ".$lastname;

$pdf = new FPDF();
$pageCount = $pdf->setSourceFile('./Certificates/Certificado2019_CC.pdf');
$pageId = $pdf->importPage(1, PdfReader\PageBoundaries::MEDIA_BOX);
$pdf->AddPage();
$pdf->useImportedPage($pageId, 10, 10, 90);

$pdf->SetFont('Arial','',10);
$pdf->Cell(40,10,$FName,0);
$pdf->Output();

?>