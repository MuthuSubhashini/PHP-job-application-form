<?php
require('fpdf/fpdf.php');

/* ---------- SAFETY ---------- */
error_reporting(0);
ob_clean();

/* ---------- PDF ---------- */
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);

$pdf->Cell(0,10,'Job Application Form',0,1,'C');
$pdf->Ln(5);

$pdf->SetFont('Arial','',12);

$pdf->Cell(0,8,'Name: '.($_POST['name'] ?? 'N/A'),0,1);
$pdf->Cell(0,8,'Email: '.($_POST['email'] ?? 'N/A'),0,1);
$pdf->Cell(0,8,'Phone: '.($_POST['phone'] ?? 'N/A'),0,1);

$pdf->Ln(5);
$pdf->MultiCell(0,8,'Address: '.($_POST['address'] ?? 'N/A'));

/* ---------- FORCE DOWNLOAD ---------- */
header('Content-Type: application/pdf');
header('Content-Disposition: attachment; filename="Job_Application.pdf"');
header('Cache-Control: private, max-age=0, must-revalidate');
header('Pragma: public');

$pdf->Output('D','Job_Application.pdf');
exit;
