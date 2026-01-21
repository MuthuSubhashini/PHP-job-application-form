<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require('fpdf/fpdf.php');

/* ========= FILE UPLOAD ========= */
$photoName = "";
$resumeName = "";

if (!empty($_FILES['photo']['name'])) {
    $photoName = time() . "_" . $_FILES['photo']['name'];
    move_uploaded_file($_FILES['photo']['tmp_name'], "uploads/" . $photoName);
}

if (!empty($_FILES['resume']['name'])) {
    $resumeName = time() . "_" . $_FILES['resume']['name'];
    move_uploaded_file($_FILES['resume']['tmp_name'], "uploads/" . $resumeName);
}

/* ========= PDF ========= */
$pdf = new FPDF();
$pdf->AddPage();

$pdf->SetFont('Arial','B',16);
$pdf->Cell(0,10,'Job Application Form',0,1,'C');
$pdf->Ln(5);

$pdf->SetFont('Arial','',12);
$pdf->Cell(0,8,"Photo: $photoName",0,1);
$pdf->Cell(0,8,"Resume: $resumeName",0,1);

$pdf->Ln(5);
$pdf->Cell(0,8,"Application submitted successfully.",0,1);
header('Content-Type: application/pdf');
header('Content-Disposition: attachment; filename="Job_Application.pdf"');
header('Cache-Control: private, max-age=0, must-revalidate');
header('Pragma: public');
$pdf->Output('D', 'Job_Application.pdf');
exit;
