<?php  
require('../fpdf/fpdf.php');

include '../koneksi.php';

$DateNow = date("Y-m-d");

$queryperangkat = $dbconnect->query("SELECT
tb_jabatan.nama_jabatan,
tb_penduduk.nama_lengkap
FROM
tb_penduduk
Inner Join tb_perangkat ON tb_penduduk.nik = tb_perangkat.id_penduduk
Inner Join tb_jabatan ON tb_jabatan.id_jabatan = tb_perangkat.id_jabatan where tb_jabatan.nama_jabatan='Kepala Desa' and tb_perangkat.tgl_berhenti>'$DateNow'");
while($datahasil1 = $queryperangkat->fetch_array()){
	$Nama_Perangkat = $datahasil1['nama_lengkap'];
	$Jabatan = $datahasil1['nama_jabatan'];
}

$Bulan = $_POST['i_bulan'];
$Tahun = $_POST['i_tahun'];

switch ($Bulan) {
	case '01':
		$BulanIndo="Januari";
		break;
	case '02':
		$BulanIndo="Februari";
		break;
	case '03':
		$BulanIndo="Maret";
		break;
	case '04':
		$BulanIndo="April";
		break;
	case '05':
		$BulanIndo="Mei";
		break;
	case '06':
		$BulanIndo="Juni";
		break;
	case '07':
		$BulanIndo="Juli";
		break;
	case '08':
		$BulanIndo="Agustus";
		break;
	case '09':
		$BulanIndo="September";
		break;
	case '10':
		$BulanIndo="Oktober";
		break;
	case '11':
		$BulanIndo="November";
		break;
	case '12':
		$BulanIndo="Desember";
		break;
	
	default:
		$BulanIndo="Data Tak Ditemukan";
		break;
}

$pdf = new FPDF("L","cm","A4");
$pdf->setTitle(strtoupper("Data Pelayanan ".date("Y")));
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
$pdf->Cell(27.7,0.6,'Data Pelayanan Desa Pecalongan',0,1,'C');
$pdf->Cell(27.7,0.6,'',0,1,'C');

$pdf->SetFont('Times','B',12);
$pdf->Cell(1.7,0.5,'',0,0,'C');
$pdf->Cell(6,0.5,'Bulan : '.$BulanIndo,0,0,'L');
$pdf->Cell(6,0.5,'Tahun : '.$Tahun,0,1,'L');
$pdf->Cell(1,0.5,'No',1,0,'C');
$pdf->Cell(5.5,0.5,'Nama Pemohon',1,0,'C');
$pdf->Cell(6,0.5,'Jenis Permohonan',1,0,'C');
$pdf->Cell(5.5,0.5,'Kode/Nomor',1,0,'C');
$pdf->Cell(4,0.5,'Tanggal Dibuat',1,0,'C');
$pdf->Cell(5.7,0.5,'Perihal',1,1,'C');

$querycetak = $dbconnect -> query("SELECT
tb_penduduk.nama_lengkap,
tb_layanan.tgl_pelayanan,
tb_layanan.keperluan,
tb_layanan.no_surat,
tb_jenissurat.nama_surat,
tb_jenissurat.jenis,
tb_jenissurat.nomor_kode
FROM
tb_layanan
Inner Join tb_penduduk ON tb_penduduk.nik = tb_layanan.id_penduduk
Inner Join tb_jenissurat ON tb_jenissurat.id_jenis = tb_layanan.id_jenissurat where month(tgl_pelayanan)='$Bulan' and year(tgl_pelayanan)='$Tahun'");
while ($datacetak = $querycetak->fetch_array()) {
	@$no++;
	$pdf->SetFont('Times','',12);
	$pdf->Cell(1,0.5,$no,1,0,'C');
	$pdf->Cell(5.5,0.5,$datacetak['nama_lengkap'],1,0,'C');
	$pdf->Cell(6,0.5,$datacetak['nama_surat'],1,0,'C');
	if ($datacetak['jenis']=="Administrasi") {
		$pdf->Cell(5.5,0.5,$datacetak['nomor_kode'].'/  '.$datacetak['no_surat'].'  /430.12.15.3/'.$Tahun,1,0,'C');
	}else{
		$pdf->Cell(5.5,0.5,$datacetak['nomor_kode'],1,0,'C');
	}
	$pdf->Cell(4,0.5,$datacetak['tgl_pelayanan'],1,0,'C');
	$pdf->Cell(5.7,0.5,$datacetak['keperluan'],1,1,'C');
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