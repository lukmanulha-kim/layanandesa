<?php  
require('../fpdf/fpdf.php');

include '../koneksi.php';

$queryperangkat = $dbconnect->query("SELECT
tb_jabatan.nama_jabatan,
tb_penduduk.nama_lengkap
FROM
tb_penduduk
Inner Join tb_perangkat ON tb_penduduk.nik = tb_perangkat.id_penduduk
Inner Join tb_jabatan ON tb_jabatan.id_jabatan = tb_perangkat.id_jabatan where tb_jabatan.nama_jabatan='Kepala Desa'");
while($datahasil1 = $queryperangkat->fetch_array()){
	$Nama_Perangkat = $datahasil1['nama_lengkap'];
	$Jabatan = $datahasil1['nama_jabatan'];
}

$Tahun = $_POST['i_tahun'];

$pdf = new FPDF("L","cm","A4");
$pdf->setTitle(strtoupper("Data Kelahiran ".date("Y")));
$pdf->addPage();
$pdf->Image('../logo.png',1,1,2.5);;            
$pdf->SetY(1.1);
// $pdf->SetX(3);
$pdf->SetFont('Times','B',16);
$pdf->Cell(27.7,0.7,'PEMERINTAH KABUPATEN BONDOWOSO',0,1,'C');
// $pdf->SetX(3);
$pdf->SetFont('Times','B',14);
$pdf->Cell(27.7,0.7,'KECAMATAN SUKOSARI',0,1,'C');
// $pdf->SetX(3);
$pdf->SetFont('Times','B',12);
$pdf->Cell(27.7,0.7,'DESA PECALONGAN',0,1,'C');
// $pdf->SetX(3);
$pdf->SetFont('Times','B',10);
$pdf->Cell(27.7,0.5,'Jl. Pakisan No. 01 Pecalongan Sukosari Bondowoso',0,1,'C');
$pdf->SetX(2.9);
$pdf->Line(1,4.2,28.7,4.2);
$pdf->SetLineWidth(0.1);      
$pdf->Line(1,4.35,28.7,4.35);   
$pdf->SetLineWidth(0);

$pdf->SetY(4.8);
$pdf->SetFont('Times','BU',14);
$pdf->Cell(27.7,0.6,'Data Kelahiran Desa Pecalongan',0,1,'C');
$pdf->Cell(27.7,0.6,'',0,1,'C');

$pdf->SetFont('Times','B',12);
$pdf->Cell(1,0.5,'',0,0,'C');
$pdf->Cell(6,0.5,'Tahun : '.$Tahun,0,0,'L');
$pdf->Cell(6,0.5,'',0,1,'L');
$pdf->Cell(1,0.5,'No',1,0,'C');
$pdf->Cell(5.5,0.5,'Nama Bayi',1,0,'C');
$pdf->Cell(6,0.5,'Nama Ayah',1,0,'C');
$pdf->Cell(5.5,0.5,'Nama Ibu',1,0,'C');
$pdf->Cell(4,0.5,'Jenis Kelamin',1,0,'C');
$pdf->Cell(5.7,0.5,'Alamat',1,1,'C');

$querycetak = $dbconnect -> query("SELECT
tb_penduduk.nama_lengkap,
tb_penduduk.ibu,
tb_penduduk.ayah,
tb_penduduk.jk,
tb_kelahiran.pukul,
tb_kelahiran.lokasi_lahir,
tb_kelahiran.kelahiran_ke,
tb_kelahiran.penolong_kelahiran,
tb_penduduk.alamat
FROM
tb_kelahiran
Inner Join tb_penduduk ON tb_penduduk.nik = tb_kelahiran.nik where year(tgl_lahir)='$Tahun'");
while ($datacetak = $querycetak->fetch_array()) {
	@$no++;
	$pdf->SetFont('Times','',12);
	$pdf->Cell(1,0.5,$no,1,0,'C');
	$pdf->Cell(5.5,0.5,$datacetak['nama_lengkap'],1,0,'C');
	$pdf->Cell(6,0.5,$datacetak['ayah'],1,0,'C');
	$pdf->Cell(5.5,0.5,$datacetak['ibu'],1,0,'C');
	$pdf->Cell(4,0.5,$datacetak['jk'],1,0,'C');
	$pdf->Cell(5.7,0.5,'Pecalongan',1,1,'C');
}

$pdf->Cell(27.7,0.6,'',0,1,'C');

$pdf->Cell(19.7,0.5,'',0,0,'C');
$pdf->Cell(8,0.5,'Pecalongan, '.date("d-m-Y"),0,1,'L');
$pdf->Cell(19.7,0.5,'',0,0,'C');
$pdf->Cell(8,0.5,'Kepala Desa',0,1,'L');
$pdf->Cell(19.7,0.5,'',0,0,'C');
$pdf->Cell(8,1.5,'',0,1,'L');
$pdf->Cell(19.7,0.5,'',0,0,'C');
$pdf->Cell(8,0.5,$Nama_Perangkat,0,1,'L');

$pdf->Output("Pelayanan.pdf","I");

?>