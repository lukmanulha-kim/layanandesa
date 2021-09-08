<?php  
require('../fpdf/fpdf.php');

include '../koneksi.php';
include '../tgl_indo.php';
$Kode = $_GET['kode'];
$queryhasil = $dbconnect->query("SELECT *
FROM
tb_jenissurat
Inner Join tb_layanan ON tb_jenissurat.id_jenis = tb_layanan.id_jenissurat
Inner Join tb_penduduk ON tb_penduduk.nik = tb_layanan.id_penduduk
Inner Join tb_rt ON tb_rt.id_rt = tb_penduduk.kode_rt
Inner Join tb_rw ON tb_rw.id_rw = tb_penduduk.kode_rw
Inner Join tb_dusun ON tb_dusun.id_dusun = tb_penduduk.kode_dusun
Inner Join tb_pekerjaan ON tb_pekerjaan.id_pekerjaan = tb_penduduk.pekerjaan where tb_layanan.id_pelayanan=$Kode");
while ($datahasil = $queryhasil -> fetch_array()) {
	$Nama_Surat = $datahasil['nama_surat'];
	$Nomor_Surat = $datahasil['nomor_kode'];
	$Nama = $datahasil['nama_lengkap'];
	$NOKK = $datahasil['no_kk'];
	$NIK = $datahasil['nik'];
	$Tpt_Lahir = $datahasil['tpt_lahir'];
	$Tgl_Lahir = TanggalIndo($datahasil['tgl_lahir']);
	$Jenis_Kelamin = $datahasil['jk'];
	$Agama = $datahasil['agama'];
	$Pekerjaan = $datahasil['nama_pekerjaan'];
	$Status = $datahasil['stat_kawin'];
	$Status_Hub = $datahasil['stat_hub_kel'];
	$NIK = $datahasil['nik'];
	$Alamat = $datahasil['alamat'];
	$RT = $datahasil['no_rt'];
	$RW = $datahasil['no_rw'];
	$Dusun = $datahasil['nama_dusun'];
	$Tgl_Proses = TanggalIndo($datahasil['tgl_pelayanan']);
	$No_Surat = $datahasil['no_surat'];
	$Isi = $datahasil['isi'];
}

$queryhasil1 = $dbconnect->query("SELECT
tb_jabatan.nama_jabatan,
tb_penduduk.nama_lengkap
FROM
tb_penduduk
Inner Join tb_perangkat ON tb_penduduk.nik = tb_perangkat.id_penduduk
Inner Join tb_jabatan ON tb_jabatan.id_jabatan = tb_perangkat.id_jabatan where tb_jabatan.nama_jabatan='Kepala Desa'");
while($datahasil1 = $queryhasil1->fetch_array()){
	$Nama_Perangkat = $datahasil1['nama_lengkap'];
	$Jabatan = $datahasil1['nama_jabatan'];
}

$pdf = new FPDF("L","cm",array(21, 16.5));
$pdf->setTitle(strtoupper($Nama." - ".$Nama_Surat));

// $pdf->SetMargins(1,1,1,1);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->Image('../logo.png',1,0.7,1);
$pdf->SetY(0.8);            
$pdf->SetX(1.8);
$pdf->SetFont('Times','B',10);
$pdf->Cell(17,0.4,'PEMERINTAH KABUPATEN BONDOWOSO',0,1,'C');
$pdf->SetX(1.8);
$pdf->Cell(17,0.4,'DINAS PENDUDUKAN DAN PENCATATAN SIPIL',0,1,'C');
$pdf->SetX(1.8);
$pdf->Cell(17,0.4,'FORMULIR PERMOHONAN KARTU TANDA PENDUDUK (KTP) WARGA NEGARA INDONESIA',0,1,'C');

$pdf->SetY(0.5);            
$pdf->SetX(17);
$pdf->SetFont('Times','B',10);
$pdf->Cell(2.5,0.6,'F-1.21',1,1,'C');

$pdf->line(1, 2, 20, 2); //Garis Atas
$pdf->line(1, 3.7, 20, 3.7); //Garis Bawah
$pdf->line(1, 2, 1, 3.7); //Garis Kiri
$pdf->line(20, 2, 20, 3.7); //Garis Kanan

$pdf->SetX(1);
$pdf->SetY(2);
$pdf->Cell(19,0.4,'Perhatian :',0,1,'L');
$pdf->SetFont('Times','',10);
$pdf->Cell(0.4,0.4,'1. ',0,0,'L');
$pdf->Cell(18.5,0.4,'Harap diisi dengan huruf cetak dan menggunakan tinta hitam',0,1,'L');
$pdf->Cell(0.4,0.4,'2. ',0,0,'L');
$pdf->Cell(18.5,0.4,'Untuk kolom pilihan, harap memberi tanda silang (X) pada kotak pilihan',0,1,'L');
$pdf->Cell(0.4,0.4,'3. ',0,0,'L');
$pdf->Cell(18.5,0.4,'Setelah formulir ini diisi dan ditandatangani, harap diserahkan kembali ke kantor Desa/Kelurahan',0,1,'L');

$pdf->SetX(1);
$pdf->SetY(4);
$pdf->SetFont('Arial','B',9);
$pdf->Cell(7,0.4,'PEMERINTAH PROPINSI',0,0,'L');
$pdf->Cell(0.4,0.4,':',0,0,'C');
$pdf->Cell(0.4,0.4,' ',0,0,'C');
$pdf->Cell(0.4,0.4,'3',1,0,'C');
$pdf->Cell(0.4,0.4,'5',1,0,'C');
$pdf->Cell(0.4,0.4,' ',0,0,'C');
$pdf->Cell(0.4,0.4,' ',0,0,'C');
$pdf->Cell(0.4,0.4,' ',0,0,'C');
$pdf->Cell(7,0.4,'Jawa Timur',1,1,'L');

$pdf->Cell(7,0.4,'PEMERINTAH KABUPATEN',0,0,'L');
$pdf->Cell(0.4,0.4,':',0,0,'C');
$pdf->Cell(0.4,0.4,' ',0,0,'C');
$pdf->Cell(0.4,0.4,'I',1,0,'C');
$pdf->Cell(0.4,0.4,'I',1,0,'C');
$pdf->Cell(0.4,0.4,' ',0,0,'C');
$pdf->Cell(0.4,0.4,' ',0,0,'C');
$pdf->Cell(0.4,0.4,' ',0,0,'C');
$pdf->Cell(7,0.4,'Bondowoso',1,1,'L');

$pdf->Cell(7,0.4,'KECAMATAN',0,0,'L');
$pdf->Cell(0.4,0.4,':',0,0,'C');
$pdf->Cell(0.4,0.4,' ',0,0,'C');
$pdf->Cell(0.4,0.4,'',1,0,'C');
$pdf->Cell(0.4,0.4,'',1,0,'C');
$pdf->Cell(0.4,0.4,' ',0,0,'C');
$pdf->Cell(0.4,0.4,' ',0,0,'C');
$pdf->Cell(0.4,0.4,' ',0,0,'C');
$pdf->Cell(7,0.4,'Sukosari',1,1,'L');

$pdf->Cell(7,0.4,'KELURAHAN / DESA',0,0,'L');
$pdf->Cell(0.4,0.4,':',0,0,'C');
$pdf->Cell(0.4,0.4,' ',0,0,'C');
$pdf->Cell(0.4,0.4,' ',1,0,'C');
$pdf->Cell(0.4,0.4,' ',1,0,'C');
$pdf->Cell(0.4,0.4,' ',1,0,'C');
$pdf->Cell(0.4,0.4,' ',1,0,'C');
$pdf->Cell(0.4,0.4,' ',0,0,'C');
$pdf->Cell(7,0.4,'Pecalongan',1,1,'L');

$pdf->Cell(7,0.2,' ',0,1,'L');

$pdf->SetFont('Arial','BIU',9);
$pdf->Cell(5,0.4,'PERMOHONAN KTP',0,0,'L');
$pdf->SetFont('Arial','',10);
$pdf->Cell(0.4,0.4,' ',1,0,'L');
$pdf->Cell(3,0.4,'A. Baru',1,0,'C');
$pdf->Cell(0.4,0.4,' ',0,0,'L');
$pdf->Cell(0.4,0.4,' ',1,0,'L');
$pdf->Cell(3,0.4,'B. Perpanjangan',1,0,'C');
$pdf->Cell(0.4,0.4,' ',0,0,'L');
$pdf->Cell(0.4,0.4,' ',1,0,'L');
$pdf->Cell(3,0.4,'C. Pergantian',1,1,'C');

$pdf->Cell(7,0.4,' ',0,1,'L');

$pdf->SetFont('Arial','',9);
$pdf->Cell(4,0.4,'1. Nama Lengkap',1,0,'L');
$pdf->Cell(0.2,0.4,' ',0,0,'L');
for($i=0; $i<strlen($Nama); $i++){
	if($i == strlen($Nama)-1){
		$pdf->cell(0.4, 0.4, strtoupper($Nama[$i]), 1, 1, 'C');
		break;
	} 
	$pdf->cell(0.4, 0.4, strtoupper($Nama[$i]), 'LTB', 0, 'C');
}

$pdf->Cell(4,0.4,'4. No. KK',1,0,'L');
$pdf->Cell(0.2,0.4,' ',0,0,'L');
for($i=0; $i<strlen($NOKK); $i++){
	if($i == strlen($NOKK)-1){
		$pdf->cell(0.4, 0.4, strtoupper($NOKK[$i]), 1, 1, 'C');
		break;
	} 
	$pdf->cell(0.4, 0.4, strtoupper($NOKK[$i]), 'LTB', 0, 'C');
}

$pdf->Cell(4,0.4,'3. NIK',1,0,'L');
$pdf->Cell(0.2,0.4,' ',0,0,'L');
for($i=0; $i<strlen($NIK); $i++){
	if($i == strlen($NIK)-1){
		$pdf->cell(0.4, 0.4, strtoupper($NIK[$i]), 1, 1, 'C');
		break;
	} 
	$pdf->cell(0.4, 0.4, strtoupper($NIK[$i]), 'LTB', 0, 'C');
}

$pdf->Cell(4,0.4,'4. Alamat',1,0,'L');
$pdf->Cell(0.2,0.4,' ',0,0,'L');
$pdf->MultiCell(14.8,0.4,strtoupper($Alamat),1,'L');

$pdf->Cell(4.2,0.4,' ',0,0,'L');

$pdf->Cell(1,0.4,'RT',1,0,'C');
$pdf->Cell(0.4,0.4,' ',0,0,'L');
for($i=0; $i<strlen($RT); $i++){
	if($i == strlen($RT)-1){
		$pdf->cell(0.4, 0.4, strtoupper($RT[$i]), 1, 0, 'C');
		break;
	} 
	$pdf->cell(0.4, 0.4, strtoupper($RT[$i]), 'LTB', 0, 'C');
}

$pdf->Cell(0.4,0.4,' ',0,0,'L');

$pdf->Cell(1,0.4,'RW',1,0,'C');
$pdf->Cell(0.4,0.4,' ',0,0,'L');
for($i=0; $i<strlen($RW); $i++){
	if($i == strlen($RW)-1){
		$pdf->cell(0.4, 0.4, strtoupper($RW[$i]), 1, 0, 'C');
		break;
	} 
	$pdf->cell(0.4, 0.4, strtoupper($RW[$i]), 'LTB', 0, 'C');
}

$pdf->Cell(2,0.4,' ',0,0,'L');

$Kodepos = "68287";

$pdf->Cell(2,0.4,'Kode Pos :',1,0,'C');
$pdf->Cell(0.4,0.4,' ',0,0,'L');
for($i=0; $i<strlen($Kodepos); $i++){
	if($i == strlen($Kodepos)-1){
		$pdf->cell(0.4, 0.4, strtoupper($Kodepos[$i]), 1, 0, 'C');
		break;
	} 
	$pdf->cell(0.4, 0.4, strtoupper($Kodepos[$i]), 'LTB', 0, 'C');
}
$pdf->Cell(0.4,0.4,' ',0,1,'L');
$pdf->Cell(0.4,0.4,' ',0,1,'L');

$pdf->SetFont('Arial','',6);
$pdf->Cell(2,0.4,'Pas Photo (2x3)',1,0,'C');
$pdf->Cell(2.5,0.4,'Cap Jempol',1,0,'C');
$pdf->Cell(6,0.4,'Specimen Tanda Tangan',1,1,'C');
$pdf->Cell(2,2.9,' ',1,0,'C');
$pdf->Cell(2.5,2.9,' ',1,0,'C');
$pdf->Cell(6,1.5,' ',1,1,'C');
$pdf->Cell(4.5,0.4,' ',0,0,'C');
$pdf->Cell(6,0.4,'Ket : Cap Jempol/Tanda Tangan',0,1,'L');
$pdf->Cell(11,0.4,' ',0,0,'C');

$pdf->SetFont('Arial','',9);
$pdf->Cell(8,0.4,' Mengetahui',0,1,'L');
$pdf->Cell(5,0.4,' ',0,0,'C');
$pdf->Cell(6,0.4,'Camat .......................................................',0,0,'L');
$pdf->Cell(1.5,0.4,'',0,0,'C');
$pdf->Cell(6.5,0.4,'Kepala Desa / Lurah Pecalongan',0,1,'L');
$pdf->Cell(5,0.4,' ',0,0,'C');
$pdf->Cell(6,1.1,' ',0,0,'L');
$pdf->Cell(1.5,1.1,'',0,0,'C');
$pdf->Cell(6.5,1.1,' ',0,1,'L');
$pdf->Cell(5,0.4,' ',0,0,'C');
$pdf->Cell(6,0.4,'(................................................................)',0,0,'L');
$pdf->Cell(1.5,0.4,'',0,0,'C');
$pdf->Cell(6.5,0.4,'( '.$Nama_Perangkat.' )',0,1,'L');
$pdf->Cell(5,0.4,' ',0,0,'C');
$pdf->Cell(6,0.4,'NIP.',0,0,'L');
$pdf->Cell(1.5,0.4,'',0,0,'C');
$pdf->Cell(6.5,0.4,'NIP.',0,1,'L');

$pdf->SetY(8.8);
$pdf->SetX(12);
$pdf->Cell(6.5,0.4,'Pecalongan, '.$Tgl_Proses,0,1,'C');
$pdf->SetX(12);
$pdf->Cell(6.5,0.4,'Pemohon',0,1,'C');
$pdf->SetX(12);
$pdf->Cell(6.5,1,'',0,1,'L');
$pdf->SetX(12);
$pdf->Cell(6.5,0.4,'( '.$Nama.' )',0,1,'C');

$pdf->Output(strtoupper($Nama_Surat)." - ".strtoupper($Nama).".pdf","I");

?>