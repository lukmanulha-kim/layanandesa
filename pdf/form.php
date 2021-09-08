<?php  
require('../fpdf/fpdf.php');

include '../koneksi.php';

$Nama = "Lukmanul Hakim";
$RT = "012";

$pdf = new FPDF("L","cm",array(21, 17));

// $pdf->SetMargins(1,1,1,1);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','B',10);
// $pdf->Cell(19,11.8,'PEMERINTAH KABUPATEN BONDOWOSO',1,1,'C');
$pdf->SetY(12.5);
$pdf->Cell(19,0.5,'PEMERINTAH KABUPATEN BONDOWOSO',1,1,'C');

$pdf->Output("FORM.pdf","I");

?>