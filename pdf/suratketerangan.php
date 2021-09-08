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
	$Tpt_Lahir = $datahasil['tpt_lahir'];
	$Tgl_Lahir = $datahasil['tgl_lahir'];
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
	$Tgl_Proses = $datahasil['tgl_pelayanan'];
	$No_Surat = $datahasil['no_surat'];
	$Isi = $datahasil['isi'];
	$Keperluan = $datahasil['keperluan'];
	$TanggalProses = TanggalIndo($datahasil['tgl_pelayanan']);
	$TanggalLahir = TanggalIndo($datahasil['tgl_lahir']);
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

$pdf = new FPDF("P","cm","A4");
$pdf->setTitle(strtoupper($Nama." - ".$Nama_Surat));

$pdf->SetMargins(1,1,1);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->Image('../logo.png',1,1,2.7,3);
$pdf->SetY(1.2);            
$pdf->SetX(3.5);
$pdf->SetFont('Times','B',16);
$pdf->Cell(15.5,0.7,'DINAS PENDIDIKAN DAN KEBUDAYAAN',0,1,'C');
$pdf->SetFont('Times','B',14);
$pdf->SetX(3.5);
$pdf->Cell(15.5,0.7,'KECAMATAN SUKOSARI',0,1,'C');
$pdf->SetFont('Arial','B',13);
$pdf->SetX(3.5);
$pdf->Cell(15.5,0.7,'KANTOR DESA PECALONGAN',0,1,'C');
$pdf->SetFont('Arial','B',9);
$pdf->SetX(3.5);
$pdf->Cell(15.5,0.5,'Jl. Raya Pakisan No. 1 Pecalongan Sukosari Bondowoso Kode Pos  68287',0,1,'C');
$pdf->SetX(2.9);
$pdf->Line(1,4.2,20,4.2);
$pdf->SetLineWidth(0.1);      
$pdf->Line(1,4.35,20,4.35);   
$pdf->SetLineWidth(0);

$pdf->SetY(5);
$pdf->SetX(1);
$pdf->SetFont('Times','BU',14);
$pdf->Cell(19,0.6,strtoupper($Nama_Surat),0,1,'C');
$pdf->SetFont('Times','',12);
$pdf->Cell(19,0.3,'No : '.$Nomor_Surat.'/    '.$No_Surat.'    /430.12.15.3/'.date('Y'),0,1,'C');

$pdf->SetY(6.5);
$pdf->SetX(1);
$pdf->SetFont('Times','',12);
$pdf->MultiCell(19,0.6,'     Yang bertanda tangan dibawah ini Kepala Desa Pecalongan Kecamatan Sukosari Kabupaten Bondowoso menerangkan dengan sebenarnya bahwa :',0,'J');
// $pdf->Cell(5,0.6,'Nama',0,0,'L');
// $pdf->Cell(1,0.6,':',0,0,'C');
// $pdf->Cell(13,0.6,$Nama_Perangkat,0,1,'L');
// $pdf->Cell(5,0.6,'Jabatan',0,0,'L');
// $pdf->Cell(1,0.6,':',0,0,'C');
// $pdf->Cell(13,0.6,$Jabatan,0,1,'L');

// $pdf->SetY(9);
$pdf->MultiCell(19,0.5,' ',0,'J');
$pdf->SetX(1);
$pdf->SetFont('Times','',12);
// $pdf->Cell(19,0.6,'Dengan ini menerangkan bahwa :',0,1,'L');
$pdf->Cell(5,0.6,'Nama',0,0,'L');
$pdf->Cell(1,0.6,':',0,0,'C');
$pdf->Cell(13,0.6,$Nama,0,1,'L');
$pdf->Cell(5,0.6,'Tempat Tanggal Lahir',0,0,'L');
$pdf->Cell(1,0.6,':',0,0,'C');
$pdf->Cell(13,0.6,$Tpt_Lahir.', '.$TanggalLahir,0,1,'L');
// $pdf->Cell(5,0.6,'Kewarganegaraan',0,0,'L');
// $pdf->Cell(1,0.6,':',0,0,'C');
// $pdf->Cell(13,0.6,'Indonesia',0,1,'L');
$pdf->Cell(5,0.6,'Jenis Kelamin',0,0,'L');
$pdf->Cell(1,0.6,':',0,0,'C');
$pdf->Cell(13,0.6,$Jenis_Kelamin,0,1,'L');
$pdf->Cell(5,0.6,'Agama',0,0,'L');
$pdf->Cell(1,0.6,':',0,0,'C');
$pdf->Cell(13,0.6,$Agama,0,1,'L');
// $pdf->Cell(5,0.6,'Pekerjaan',0,0,'L');
// $pdf->Cell(1,0.6,':',0,0,'C');
// $pdf->Cell(13,0.6,$Pekerjaan,0,1,'L');
$pdf->Cell(5,0.6,'Status',0,0,'L');
$pdf->Cell(1,0.6,':',0,0,'C');
$pdf->Cell(13,0.6,$Status,0,1,'L');
$pdf->Cell(5,0.6,'Pekerjaan',0,0,'L');
$pdf->Cell(1,0.6,':',0,0,'C');
$pdf->Cell(13,0.6,$Pekerjaan,0,1,'L');
$pdf->Cell(5,0.6,'Alamat',0,0,'L');
$pdf->Cell(1,0.6,':',0,0,'C');
$pdf->MultiCell(13,0.6,'Desa '.$Alamat.' RT.'.$RT.' RW.'.$RW.' Kecamatan Sukosari Kabupaten Bondowoso',0,'J');

$pdf->MultiCell(19,0.5,' ',0,'J');
$pdf->SetX(1);
$pdf->SetFont('Times','',12);
$pdf->Cell(19,0.6,'Keterangan : ',0,1,'J');
// $pdf->Cell(1,0.6,'1. ',0,0,'L');
// $pdf->MultiCell(18,0.6,'Orang tersebut diatas benar-benar Penduduk Desa '.$Alamat.' RT.'.$RT.' RW.'.$RW.' Kecamatan  Sukosari  Kabupaten  Bondowoso.',0,'L');
// $pdf->Cell(1,0.6,'2. ',0,0,'L');
$pdf->MultiCell(19,0.6,"     ".$Isi,0,'J');
$pdf->SetFont('Times','B',12);
$pdf->MultiCell(19,0.6,$Keperluan,0,'C');

$pdf->SetX(1);
$pdf->SetFont('Times','',12);
$pdf->Cell(1,0.6,'',0,1,'J');
$pdf->MultiCell(20,0.6,'     Demikian surat keterangan ini dibuat dengan sebenarnya agar dapat dipergunakan sebagaimana mestinya.',0,'L');

$pdf->SetY(23.3);
$pdf->SetX(1);
$pdf->SetFont('Times','',12);
$pdf->Cell(12,0.6,' ',0,0,'L');
$pdf->Cell(7,0.6,'Bondowoso, '. $TanggalProses,0,1,'C');
$pdf->Cell(12,0.6,' ',0,0,'L');
$pdf->Cell(7,0.6,'Kepala Desa Pecalongan',0,1,'C');
$pdf->Cell(12,2.5,' ',0,0,'L');
$pdf->Cell(7,2.5,' ',0,1,'C');
$pdf->Cell(12,0.6,' ',0,0,'L');
$pdf->SetFont('Times','B',12);
$pdf->Cell(7,0.6,$Nama_Perangkat,0,1,'C');

$pdf->Output("SURAT KETERANGAN - ".strtoupper($Nama).".pdf","I");


?>