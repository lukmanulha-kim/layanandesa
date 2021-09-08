<?php  
require('../fpdf/fpdf.php');

include '../koneksi.php'; 
// $Kode = $_GET['kode'];
// $queryhasil = $dbconnect->query("SELECT *
// FROM
// tb_jenissurat
// Inner Join tb_layanan ON tb_jenissurat.id_jenis = tb_layanan.id_jenissurat
// Inner Join tb_penduduk ON tb_penduduk.id_penduduk = tb_layanan.id_penduduk
// Inner Join tb_rt ON tb_rt.id_rt = tb_penduduk.kode_rt
// Inner Join tb_rw ON tb_rw.id_rw = tb_penduduk.kode_rw
// Inner Join tb_dusun ON tb_dusun.id_dusun = tb_penduduk.kode_dusun
// Inner Join tb_pekerjaan ON tb_pekerjaan.id_pekerjaan = tb_penduduk.pekerjaan where tb_layanan.id_pelayanan=$Kode");
// while ($datahasil = $queryhasil -> fetch_array()) {
// 	$Nama_Surat = $datahasil['nama_surat'];
// 	$Nomor_Surat = $datahasil['nomor_kode'];
// 	$Nama = $datahasil['nama_lengkap'];
// 	$Tpt_Lahir = $datahasil['tpt_lahir'];
// 	$Tgl_Lahir = $datahasil['tgl_lahir'];
// 	$Jenis_Kelamin = $datahasil['jk'];
// 	$Agama = $datahasil['agama'];
// 	$Pekerjaan = $datahasil['nama_pekerjaan'];
// 	$Status = $datahasil['stat_kawin'];
// 	$NIK = $datahasil['nik'];
// 	$Alamat = $datahasil['alamat'];
// 	$RT = $datahasil['no_rt'];
// 	$RW = $datahasil['no_rw'];
// 	$Dusun = $datahasil['nama_dusun'];
// 	$Tgl_Proses = $datahasil['tgl_pelayanan'];
// }

// $queryhasil1 = $dbconnect->query("SELECT
// tb_jabatan.nama_jabatan,
// tb_penduduk.nama_lengkap
// FROM
// tb_penduduk
// Inner Join tb_perangkat ON tb_penduduk.id_penduduk = tb_perangkat.id_penduduk
// Inner Join tb_jabatan ON tb_jabatan.id_jabatan = tb_perangkat.id_jabatan");
// while($datahasil1 = $queryhasil1->fetch_array()){
// 	$Nama_Perangkat = $datahasil1['nama_lengkap'];
// 	$Jabatan = $datahasil1['nama_jabatan'];
// }

$pdf = new FPDF("L","cm","A4");
$pdf->addPage();
$pdf->SetMargins(1,1,1,1);

$pdf->line(1, 3, 28.7, 3);
$pdf->line(1, 3, 1, 20);
$pdf->line(1, 20, 28.7, 20);
$pdf->line(9, 3, 9, 20);
$pdf->line(20.7, 3, 20.7, 20);
$pdf->line(28.7, 3, 28.7, 20);

$pdf->line(9.5, 3.1, 20.2, 3.1);
$pdf->line(9.5, 16, 20.2, 16);
$pdf->line(9.5, 3.1, 9.5, 16);
$pdf->line(20.2, 3.1, 20.2, 16);

$pdf->setY(1);
$pdf->setFont('Arial', 'BI', 12);
$pdf->cell(8, 0, "UNTUK ARSIP DESA / KELURAHAN",0, 0, 'C');
$pdf->cell(11.7, 0, "UNTUK ARSIP KECAMATAN",0, 0, 'C');
$pdf->cell(8, 0, "UNTUK YANG BERSANGKUTAN",0, 1, 'C');
$pdf->setFont('Arial', 'BU', 14);
$pdf->cell(8, 2, "SURAT KELAHIRAN",0, 0, 'C');
$pdf->cell(11.7, 2, "SURAT KELAHIRAN",0, 0, 'C');
$pdf->cell(8, 2, "SURAT KELAHIRAN",0, 1, 'C');
$pdf->setFont('Arial', '', 12);
$pdf->cell(8, -1, "No",0, 0, 'C');
$pdf->cell(11.7, -1, "No",0, 0, 'C');
$pdf->cell(8, -1, "No",0, 1, 'C');

$pdf->setY(3);
$pdf->setFont('Times', '', 12);
$pdf->MultiCell(8,0.5,'Yang bertanda tangan dibawah ini, menerangkan bahwa : ',1,'L');
$pdf->Cell(2,0.6,'Hari',1,0,'L');
$pdf->Cell(0.5,0.6,':',1,0,'C');
$pdf->Cell(5.5,0.6,'jjhdfu',1,1,'L');
$pdf->Cell(2,0.6,'Tanggal',1,0,'L');
$pdf->Cell(0.5,0.6,':',1,0,'C');
$pdf->Cell(5.5,0.6,'jjhdfu',1,1,'L');
$pdf->Cell(2,0.6,'Di',1,0,'L');
$pdf->Cell(0.5,0.6,':',1,0,'C');
$pdf->MultiCell(5.5,0.6,'Desa dalam bahasa sansekerta berarti tanah kelahiran atau tanah tumpah darah.',1,'L');

$pdf->Cell(2,0.6,'Hari',1,0,'L');
$pdf->Cell(0.5,0.6,':',1,0,'C');
$pdf->Cell(5.5,0.6,'jjhdfu',1,1,'L');

$pdf->MultiCell(8,0.5,'Telah lahir seorang anak Laki-Laki',1,'L');

$pdf->Cell(8,0.6,' ',1,1,'L');

$pdf->Cell(8,0.6,'Bernama :',1,1,'L');
$pdf->Cell(8,0.6,'Nama Anak',1,1,'L');
$pdf->Cell(8,0.6,'Dari seorang ibu bernama',1,1,'L');
$pdf->Cell(8,0.6,'Nama Ibu',1,1,'L');
$pdf->Cell(2,0.6,'Alamat',1,0,'L');
$pdf->Cell(0.5,0.6,':',1,0,'C');
$pdf->MultiCell(5.5,0.6,'Desa Pecalongan RT.01 RW.03 Kecamatan Sukosari Kabupaten Bondowoso',1,'L');
$pdf->Cell(2,0.6,'Istri dari',1,0,'L');
$pdf->Cell(0.5,0.6,':',1,0,'C');
$pdf->Cell(5.5,0.6,'jjhdfu',1,1,'L');
$pdf->MultiCell(8,0.5,'Surat keterangan ini dibuat atas dasar yang sebenarnya :',1,'L');

$pdf->Cell(4,0.6,'Nama yang melapor',1,0,'L');
$pdf->Cell(0.5,0.6,':',1,0,'C');
$pdf->MultiCell(3.5,0.6,'jjhdfu',1,'L');
$pdf->Cell(4,0.6,'Hubungan dengan bayi',1,0,'L');
$pdf->Cell(0.5,0.6,':',1,0,'C');
$pdf->MultiCell(3.5,0.6,'jjhdfu',1,'L');

$pdf->Cell(8,0.6,' ',1,1,'L');
$pdf->Cell(8,0.6,'Lurah / Kades :',1,1,'L');
$pdf->Cell(8,1.4,' ',1,1,'L');
$pdf->Cell(8,0.6,'Lurah / Kades :',1,1,'C');

$pdf->setY(3.1);
$pdf->setX(9.5);
$pdf->setFont('Times', 'B', 12);
$pdf->Cell(10.7,0.5,'BAYI ',0,1,'C');
$pdf->setFont('Times', '', 12);
$pdf->setX(9.5);
$pdf->Cell(0.7,0.6,'1.',1,0,'L');
$pdf->Cell(4,0.6,'Nama Lengkap',1,0,'L');
$pdf->Cell(0.3,0.6,':',1,0,'C');
$pdf->Cell(5.7,0.6,'Nama Lengkap',1,1,'L');
$pdf->setX(9.5);
$pdf->Cell(0.7,0.6,'2.',1,0,'L');
$pdf->Cell(4,0.6,'Jenis Kelamin',1,0,'L');
$pdf->Cell(0.3,0.6,':',1,0,'C');
$pdf->Cell(5.7,0.6,'Nama Lengkap',1,1,'L');
$pdf->setX(9.5);
$pdf->Cell(0.7,0.6,'3.',1,0,'L');
$pdf->Cell(4,0.6,'Dilahirkan',1,0,'L');
$pdf->Cell(0.3,0.6,':',1,0,'C');
$pdf->Cell(5.7,0.6,'Nama Lengkap',1,1,'L');
$pdf->setX(9.5);
$pdf->Cell(0.7,0.6,'4.',1,0,'L');
$pdf->Cell(4,0.6,'Kelahiran',1,0,'L');
$pdf->Cell(0.3,0.6,':',1,0,'C');
$pdf->Cell(5.7,0.6,'Nama Lengkap',1,1,'L');
$pdf->setX(9.5);
$pdf->Cell(0.7,0.6,'5.',1,0,'L');
$pdf->Cell(4,0.6,'Tempat Kelahiran',1,0,'L');
$pdf->Cell(0.3,0.6,':',1,0,'C');
$pdf->Cell(5.7,0.6,'Nama Lengkap',1,1,'L');
$pdf->setX(9.5);
$pdf->Cell(0.7,0.6,'6.',1,0,'L');
$pdf->Cell(4,0.6,'Penolong Kelahiran',1,0,'L');
$pdf->Cell(0.3,0.6,':',1,0,'C');
$pdf->Cell(5.7,0.6,'Nama Lengkap',1,1,'L');

$pdf->Output("Surat Kelahiran.pdf","I");

?>