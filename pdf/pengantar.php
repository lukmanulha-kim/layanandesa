<?php  
require('../fpdf/fpdf.php');

include '../koneksi.php';

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
	$tanggal_proses = explode("-", $datahasil['tgl_pelayanan']);
	$tgl = $tanggal_proses[2];
	$bln = $tanggal_proses[1];
	$thn = $tanggal_proses[0];
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

$datahasil2 = $dbconnect->query("SELECT
tb_penduduk.nama_lengkap,
tb_kecamatan.kecamatan,
tb_kabupaten.kabupaten,
tb_provinsi.provinsi,
tb_mutasi_keluar.pindah_ke
FROM
tb_mutasi_keluar
Inner Join tb_penduduk ON tb_penduduk.nik = tb_mutasi_keluar.nik_penduduk
Inner Join tb_provinsi ON tb_provinsi.id_provinsi = tb_mutasi_keluar.id_provinsi
Inner Join tb_kabupaten ON tb_kabupaten.id_kabupaten = tb_mutasi_keluar.id_kabupaten
Inner Join tb_kecamatan ON tb_kecamatan.id_kecamatan = tb_mutasi_keluar.id_kecamatan WHERE tb_mutasi_keluar.nik_penduduk=$NIK")->fetch_array();

$Desa = $datahasil2['pindah_ke'];
$Kecamatan = $datahasil2['kecamatan'];
$Kabupaten = $datahasil2['kabupaten'];
$Provinsi = $datahasil2['provinsi'];

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
$pdf->Line(1,4.2,20,4.2);
$pdf->SetLineWidth(0.1);      
$pdf->Line(1,4.35,20,4.35);   
$pdf->SetLineWidth(0);

$pdf->SetY(5);

$pdf->SetFont('Times','',12);
$pdf->Cell(12,0.6,' ',0,0,'C');
$pdf->Cell(7,0.6,'Bondowoso, '.date("d/m/Y"),0,1,'');
$pdf->Cell(12,0.5,' ',0,0,'C');
$pdf->Cell(7,0.5,'Kepada',0,1,'');
$pdf->Cell(12,0.5,' ',0,0,'C');
$pdf->Cell(1,0.5,'Yth : ',0,0,'');
$pdf->MultiCell(6,0.5,'Kepala Dinas Kependudukan dan Pencatatan Sipil Kabupaten Bondowoso',0,'');
$pdf->Cell(12,0.5,' ',0,0,'C');
$pdf->Cell(1,0.5,'Di - ',0,1,'');
$pdf->Cell(12,0.5,' ',0,0,'C');
$pdf->Cell(1,0.5,'',0,0,'');
$pdf->SetFont('Times','BU',12);
$pdf->Cell(6,0.5,'Bondowoso',0,1,'');
$pdf->Cell(19,3,'',0,1,'C');

$pdf->SetFont('Times','BU',14);
$pdf->Cell(19,0.6,strtoupper($Nama_Surat),0,1,'C');
$pdf->SetFont('Times','',12);
$pdf->Cell(19,0.3,'No : '.$Nomor_Surat.'/'.    $No_Surat    .'/430.12.15.3/'.date('Y'),0,1,'C');
$pdf->Cell(19,1,' ',0,1,'C');

$pdf->SetFont('Times','B',12);
$pdf->Cell(1,0.6,'No',1,0,'C');
$pdf->Cell(9,0.6,'JENIS SURAT YANG DIKIRIM',1,0,'C');
$pdf->Cell(3,0.6,'BANYAKNYA',1,0,'C');
$pdf->Cell(6,0.6,'KETERANGAN',1,1,'C');

$pdf->SetFont('Times','',12);
$pdf->Cell(1,4.8,'1.',1,0,'C');
$pdf->MultiCell(9,0.6,'Surat Keterangan Pindah Tempat Tinggal An : 
	'.$Nama.' 
	Ke Desa/Kelurahan '.$Desa.' 
	Kecamatan '.$Kecamatan.' Kabupaten '.$Kabupaten.' 
	Provinsi '.$Provinsi.'

	' ,1,'C');
$pdf->SetY(14.1);
$pdf->SetX(11);
$pdf->Cell(3,4.8,'1 (Satu) Bendel',1,0,'C');
$pdf->MultiCell(6,0.6,$Isi.'




	',1,'');

$pdf->Cell(19,2,' ',0,1,'C');
$pdf->Cell(12,0.6,' ',0,0,'C');
$pdf->Cell(7,0.6,'Kepala Desa Pecalongan',0,1,'C');
$pdf->Cell(12,2,' ',0,0,'C');
$pdf->Cell(7,2,'',0,1,'');
$pdf->Cell(12,0.6,' ',0,0,'C');
$pdf->SetFont('Times','BU',12);
$pdf->Cell(7,0.6,$Nama_Perangkat,0,1,'C');

$pdf->SetFont('Times','',12);
$pdf->Cell(19,1,' ',0,1,'C');
$pdf->Cell(19,0.6,'Tembusan Kepada Yth :',0,1,'');
$pdf->Cell(19,0.6,'Sdr ...............................................',0,1,'');
$pdf->Cell(19,0.6,'di-',0,1,'');
$pdf->Cell(19,0.6,'      _________________________',0,1,'');


$pdf->Output(strtoupper($Nama_Surat)."-".strtoupper($Nama).".pdf","I");

?>