<?php  

require('../fpdf/fpdf.php');

include '../koneksi.php';
$desa = "Pecalongan";
$kecamatan = "Sukosari";
$kabupaten = "Bondowoso";
$provinsi = "Jawa Timur";
$kewarganegaraan = "1";
$kebangsaan = "Indonesia"; 
#bayi
$Kode = $_GET['kode'];
$Ayah = $dbconnect -> query("SELECT * FROM tb_layanan where id_pelayanan=$Kode") -> fetch_array();
$NIKAyah = $Ayah['id_penduduk'];
$BayidanIbu = $dbconnect->query("SELECT tb_kelahiran.nik, tb_kelahiran.nik_ayah, tb_kelahiran.nik_ibu, tb_kelahiran.nik_saksi1, tb_kelahiran.nik_saksi2, tb_kelahiran.nik_pelapor FROM tb_kelahiran  where tb_kelahiran.nik_ayah=$NIKAyah")->fetch_array();
$Bapak = $BayidanIbu['nik_ayah'];
$Ummi = $BayidanIbu['nik_ibu'];
$NIKBayi = $BayidanIbu['nik'];
$pelapor = $dbconnect->query("SELECT * from tb_kelahiran Inner join tb_penduduk on tb_kelahiran.nik=tb_penduduk.nik where tb_penduduk.ayah=$NIKAyah")->fetch_array();
$Bayi2 = $dbconnect->query("SELECT * from tb_kelahiran where nik='$NIKBayi'")->fetch_array();
$Bayi3 = $dbconnect->query("SELECT * from tb_penduduk where nik='$NIKBayi'")->fetch_array();
$Ibu = $dbconnect->query("SELECT * from tb_penduduk where nik=$Ummi")->fetch_array();
$Ayah1 = $dbconnect->query("SELECT * from tb_penduduk where nik=$Bapak")->fetch_array();
$pelapor = $dbconnect->query("SELECT * from tb_penduduk where nik=$Bayi2[nik_pelapor]")->fetch_array();
$saksi1 = $dbconnect->query("SELECT * from tb_penduduk where nik=$Bayi2[nik_saksi1]")->fetch_array();
$saksi2 = $dbconnect->query("SELECT * from tb_penduduk where nik=$Bayi2[nik_saksi2]")->fetch_array();

#Perangkat
$queryhasil1 = $dbconnect->query("SELECT
tb_jabatan.nama_jabatan,
tb_penduduk.nama_lengkap
FROM
tb_penduduk
Inner Join tb_perangkat ON tb_penduduk.nik = tb_perangkat.id_penduduk
Inner Join tb_jabatan ON tb_jabatan.id_jabatan = tb_perangkat.id_jabatan");
while($datahasil1 = $queryhasil1->fetch_array()){
	$Nama_Perangkat = $datahasil1['nama_lengkap'];
	$Jabatan = $datahasil1['nama_jabatan'];
}


$pdf = new FPDF('P', 'cm', array(21.59, 33));
$pdf->addPage();
$pdf->setTitle(strtoupper($Bayi3['nama_lengkap']." - SURAT KETERANGAN KELAHIRAN"));

#header
$pdf->setFont('Arial', 'B', '14');
$pdf->setX(15.5);
$pdf->cell(5, 1, "Kode . F-2.01", 1, 1, "C");

# desa, kecmatan, kabupaten, kodewilayah
$desa = "Pecalongan";
$kecamatan = "Sukosari";
$kabupaten = "Bondowoso";
$kodewilayah = "120987" ;
$pdf->setFont("Arial", "", 7);
	#desa
$pdf->setY(2.3);
$pdf->cell(0, 0, "Pemerintah Desa / Kelurahan", 0, 0, "L");
$pdf->setX(5);
$pdf->cell(0,0,":");
$pdf->setX(5.5);
$pdf->cell(0, 0, strtoupper($desa), 0, 1, "L");
	#kecamatan
$pdf->setY(2.65);
$pdf->cell(0, 0, "Kecamatan", 0, 0, "L");
$pdf->setX(5);
$pdf->cell(0,0,":");
$pdf->setX(5.5);
$pdf->cell(0,0,strtoupper($kecamatan));
	#kabupaten
$pdf->setY(3);
$pdf->Cell(0,0,"Kabupaten / Kota");
$pdf->setX(5);
$pdf->cell(0,0,":");
$pdf->setX(5.5);
$pdf->cell(0, 0, strtoupper($kabupaten));
	#kode wilayah
$pdf->setY(3.35);
$pdf->cell(0,0.5,"Kode Wilayah");
$pdf->setX(5);
$pdf->cell(0, 0.5, ":");
$pdf->setX(5.6);
for ($i=0; $i < strlen($kodewilayah); $i++) { 
	if ($i == strlen($kodewilayah)-1) {
		$pdf->cell(0.35, 0.35, $kodewilayah[$i], 1, 0, "C");
		break;
	}
	$pdf->cell(0.35, 0.35, $kodewilayah[$i], "TLB", 0, "C");
}

# keterangan
$pdf->setXY(15.5, 2.3);
$pdf->cell(0, 0, "Ket : Lembar 1 : UPTD/Instansi Pelaksana");
$pdf->setXY(16.08, 2.65);
$pdf->cell(0, 0, "Lembar 2 : Untuk yang bersangkutan");
$pdf->setXY(16.08, 3);
$pdf->Cell(0, 0, "Lembar 3 : Desa/Kelurahan");
$pdf->setXY(16.08, 3.35);
$pdf->cell(0, 0, "Lembar 4 : Kecamatan");

# judul formulir
$pdf->setFont("Arial", "B", 11);
$pdf->setY(3.7);
$pdf->cell(0, 1, "SURAT KETERANGAN KELAHIRAN", 0, 0, "C");

# nama kepala keluarga
$pdf->setFont("Arial", "", "7");
$pdf->setY(4.6);
$pdf->cell(0, 0.35, "Nama Kepala Keluarga");
$pdf->setX(5);
$pdf->cell(0, 0.35, ":");
$pdf->setX(5.6);
for ($i=0; $i < strlen($Ayah1['nama_lengkap']) ; $i++) { 
	if ($i == strlen($Ayah1['nama_lengkap'])-1) {
		$pdf->cell(0.35, 0.35, strtoupper($Ayah1['nama_lengkap'][$i]), 1, 0, "C");
		break;
	}
	$pdf->cell(0.35, 0.35, strtoupper($Ayah1['nama_lengkap'][$i]), "TLB", 0, "C");
	 
}
# nomor kk
$pdf->setY(4.95);
$pdf->cell(0, 0.35, "Nomor Kartu Keluarga");
$pdf->setX(5);
$pdf->cell(0, 0.35, ":");
$pdf->setX(5.6);
for ($i=0; $i < strlen($Ayah1['no_kk']); $i++) { 
	if ($i <= strlen($Ayah1['nama_lengkap'])-1) {
		$pdf->cell(0.35, 0.35, $Ayah1['no_kk'][$i], "LB", 0, "C");
	} else {
		$pdf->cell(0.35, 0.35, $Ayah1['no_kk'][$i], "TLB", 0, "C");
	}
}
$pdf->cell(0.35, 0.35, "", "L", 0, "C");

# DATA BAYI
$pdf->setFont("Arial", "B", 7);
$pdf->setXY(1.3, 5.30);
$pdf->cell(0, 1, "BAYI / ANAK", 0, 1, "L");
$pdf->setFont("Arial", "", 7);
	# NAMA
$pdf->setXY(1.3, 6);
$pdf->cell(0.35, 0.35, "1. Nama");
$pdf->setX(5);
$pdf->cell(0.35, 0.35, ":");
$pdf->setX(5.6);
for ($i=0; $i < strlen($Bayi3['nama_lengkap']) ; $i++) { 
	if ($i == strlen($Bayi3['nama_lengkap'])-1) {
		$pdf->cell(0.35, 0.35, strtoupper($Bayi3['nama_lengkap'][$i]), 1, 0, "C");
		break;
	}
	$pdf->cell(0.35, 0.35, strtoupper($Bayi3['nama_lengkap'][$i]), "TLB", 0, "C");
}
	# jenis kelamin
$pdf->setXY(1.3, 6.35);
$pdf->Cell(0.35, 0.35, "2. Jenis Kelamin");
$pdf->setX(5);
$pdf->cell(0.35, 0.35, ":");
$pdf->setX(5.6);
if ($Bayi3['jk']=="Laki-Laki") {
	$kodebayi = 1;
}else{
	$kodebayi = 2;
}
$pdf->cell(0.35, 0.35, $kodebayi, "LBR", 0, "C");
$pdf->setX(5.95);
$pdf->cell(0.35, 0.35, "1. Laki-laki        2. Perempuan");
# tempat dilahirkan
if ($Bayi2['lokasi_lahir']=="RS/RB") {
	$Kode_Tempat = 1;
}elseif ($Bayi2['lokasi_lahir']=="Puskesmas") {
	$Kode_Tempat = 2;
}elseif ($Bayi2['lokasi_lahir']=="Polindes") {
	$Kode_Tempat = 3;
}elseif ($Bayi2['lokasi_lahir']=="Rumah") {
	$Kode_Tempat = 4;
}elseif ($Bayi2['lokasi_lahir']=="Lainnya") {
	$Kode_Tempat = 5;
}
$pdf->setXY(1.3, 6.70);
$pdf->cell(0.35, 0.35, "3. Tempat dilahirkan");
$pdf->setX(5);
$pdf->cell(0.35, 0.35, ":");
$pdf->setX(5.6);
$pdf->cell(0.35, 0.35, $Kode_Tempat, "LBR", 0, "C");
$pdf->setX(5.95);
$pdf->cell(0.35, 0.35, "1. RS/RB     2. Puskesmas     3. Polindes    4. Rumah      5. Lainnya");
	# tempat kelahiran
$pdf->setXY(1.3, 7.05);
$pdf->cell(0.35, 0.35, "4. Tempat kelahiran");
$pdf->setX(5);
$pdf->cell(0.35, 0.35, ':');
$pdf->setX(5.6);
for ($i=0; $i < strlen($Bayi3['tpt_lahir']) ; $i++) { 
	if ($i == 0) {
		$pdf->cell(0.35, 0.35, strtoupper($Bayi3['tpt_lahir'][$i]), "LB", 0, "C");
	}else{
		$pdf->cell(0.35, 0.35, strtoupper($Bayi3['tpt_lahir'][$i]), "TLB", 0, "C");
	}
}

$pdf->cell(0.35, 0.35, "", "L", 0, "C");
	# hari dan tanggal lahir
$pdf->setXY(1.3, 7.40);
$pdf->cell(0.35, 0.35, "5. Hari dan Tanggal Lahir");
$pdf->setX(5);
$pdf->cell(0.35, 0.35, ":");
$pdf->setX(5.6);
	# hari lahir
$pdf->cell(0.7, 0.35, "Hari", 0, 0, "C");
for ($i=0; $i < strlen($Bayi2['hari_lahir']) ; $i++) { 
	$pdf->cell(0.35, 0.35, strtoupper($Bayi2['hari_lahir'][$i]), 1, 0, "C");
}
	# tanggal lahir
$pdf->cell(0.70, 0.35, "Tgl", 0, 0, "C");
$tanggal_lahir = explode("-", $Bayi3['tgl_lahir']);
$tgl = $tanggal_lahir[2];
$bln = $tanggal_lahir[1];
$thn = $tanggal_lahir[0];
for ($i=0; $i < strlen($tgl) ; $i++) { 
	$pdf->cell(0.35, 0.35, $tgl[$i], 1, 0, "C");
}
	#bulan
$pdf->cell(0.70, 0.35, "Bln", 0, 0, "C");
for ($i=0; $i < strlen($bln); $i++) { 
	$pdf->cell(0.35, 0.35, $bln[$i], 1, 0, "C");
}
	#tahun
$pdf->cell(0.70, 0.35, "Thn", 0, 0, "C");
for ($i=0; $i < strlen($thn); $i++) { 
	$pdf->cell(0.35, 0.35, $thn[$i], 1, 0, "C");
}
# jam lahir
$pdf->setXY(1.3, 7.75);
$pdf->cell(0, 0.35, "6. Pukul");
$pdf->setX(5);
$pdf->cell(0, 0.35, ":");
$pdf->setX(5.6);
$jam = $Bayi2['pukul'];
$jam = explode(".", $jam);
$jam = $jam[0].$jam[1];
for ($i=0; $i < strlen($jam); $i++) { 
	$pdf->cell(0.35, 0.35, $jam[$i], 1, 0, "C");
}
# jenis kelahiran
if ($Bayi2['jenis_kelahiran']=="Tunggal") {
	$Kode_Jenis = 1;
}elseif ($Bayi2['jenis_kelahiran']=="Kembar 2") {
	$Kode_Jenis = 2;
}elseif ($Bayi2['jenis_kelahiran']=="Kembar 3") {
	$Kode_Jenis = 3;
}elseif ($Bayi2['jenis_kelahiran']=="Kembar 4") {
	$Kode_Jenis = 4;
}elseif ($Bayi2['jenis_kelahiran']=="Lainnya") {
	$Kode_Jenis = 5;
}
$pdf->setXY(1.3, 8.1);
$pdf->Cell(0, 0.35, "7. Jenis Kelahiran" );
$pdf->setX(5);
$pdf->cell(0, 0.5, ":");
$pdf->setX(5.6);
$pdf->cell(0.35, 0.35, $Kode_Jenis, 1, 0, "C");
$pdf->cell(0, 0.35, "1. Tunggal       2. Kembar 2         3. Kembar 3        4. Kembar 4         5. Lainnya");
# kelahiran ke
$pdf->setXY(1.3, 8.45);
$pdf->Cell(0, 0.35, "8. Kelahiran Ke");
$pdf->SetX(5);
$pdf->cell(0, 0.35, ":");
$pdf->setX(5.6);
$pdf->cell(0.35, 0.35, $Bayi2['kelahiran_ke'], 1, 0, "C");
$pdf->cell(0, 0.35, "1. 2. 3. 4.     ..............");
# penolong kelahiran
if ($Bayi2['penolong_kelahiran']=="Dokter") {
	$Penolong = 1;
}elseif ($Bayi2['penolong_kelahiran']=="Bidan/Perawat") {
	$Penolong = 2;
}elseif ($Bayi2['penolong_kelahiran']=="Dukun") {
	$Penolong = 3;
}elseif ($Bayi2['penolong_kelahiran']=="Lainnya") {
	$Penolong = 4;
}
$pdf->setXY(1.3, 8.80);
$pdf->cell(0, 0.35, "9. Penolong Kelahiran");
$pdf->SetX(5);
$pdf->Cell(0, 0.35, ":");
$pdf->setX(5.6);
$pdf->cell(0.35, 0.35, $Penolong, 1, 0, "C");
$pdf->cell(0, 0.35, "1. Dokter      2. Bidan/Perawat        3. Dukun       4. Lainnya");
# berat bayi
$pdf->setXY(1.3,  9.15);
$pdf->Cell(0, 0.35, "10. Berat Bayi");
$pdf->setX(5);
$pdf->Cell(0, 0.35, ":");
$pdf->setX(5.6);
for ($i=0; $i < strlen($Bayi2['berat_bayi']); $i++) { 
	$pdf->cell(0.35, 0.35, $Bayi2['berat_bayi'][$i], 1, 0, "C");
}
$pdf->cell(0, 0.35, "Kg");
# panjang bayi
$pdf->setXY(1.3, 9.50);
$pdf->Cell(0, 0.35, "11. Panjang Bayi");
$pdf->setX(5);
$pdf->Cell(0, 0.35, ":");
$pdf->setX(5.6);
for ($i=0; $i < strlen($Bayi2['panjang_bayi']); $i++) { 
	$pdf->cell(0.35, 0.35, $Bayi2['panjang_bayi'][$i], 1, 0, "C");
}
$pdf->cell(0, 0.35, "Cm");
#garis garis
$pdf->Line(1, 5.4, 20.58, 5.4); # atas
$pdf->Line(1, 5.4, 1, 10); # kiri
$pdf->LIne(1, 10, 20.58, 10); # bawah
$pdf->Line(20.58, 5.4, 20.58, 10); # kanan

# ibu
$pdf->setXY(1.3, 10);
$pdf->setFont("Arial", "B", 7);
$pdf->cell(0, 0.8, "IBU");
# nik
$pdf->setFont("Arial", "", 7);
$pdf->setXY(1.3, 10.60);
$pdf->Cell(0, 0.35, "1. NIK");
$pdf->SetX(5);
$pdf->cell(0, 0.35, ":");
$pdf->setX(5.6);
for ($i=0; $i < strlen($Ibu['nik']) ; $i++) { 
	$pdf->cell(0.35, 0.35, $Ibu['nik'][$i], 1, 0, "C");
}
# nama lengkap
$pdf->setXY(1.3, 10.95);
$pdf->cell(0, 0.35, "2. Nama Lengkap");
$pdf->setX(5);
$pdf->cell(0, 0.35, ":");
$pdf->setX(5.6);
for ($i=0; $i < strlen($Ibu['nama_lengkap']); $i++) { 
	$pdf->cell(0.35, 0.35, strtoupper($Ibu['nama_lengkap'][$i]), 1, 0, "C");
}
# tanggal lahir
$pdf->setXY(1.3, 11.3);
$pdf->cell(0, 0.35, "3. Tanggal Lahir");
$pdf->setX(5);
$pdf->cell(0, 0.35, ":");
$pdf->setX(5.6);
// $pdf->cell(0.70, 0.35, "Tgl", 0, 0, "C");
// for ($i=0; $i < strlen($Ibu['tanggal_lahir']); $i++) { 
// 	$pdf->cell(0.35, 0.35, $Ibu['tanggal_lahir'][$i], 1, 0, "C");
// }
$pdf->cell(0.70, 0.35, "Tgl", 0, 0, "C");
$tanggal_lahir = explode("-", $Ibu['tgl_lahir']);
$tgl = $tanggal_lahir[2];
$bln = $tanggal_lahir[1];
$thn = $tanggal_lahir[0];
for ($i=0; $i < strlen($tgl) ; $i++) { 
	$pdf->cell(0.35, 0.35, $tgl[$i], 1, 0, "C");
}
	#bulan
$pdf->cell(0.70, 0.35, "Bln", 0, 0, "C");
for ($i=0; $i < strlen($bln); $i++) { 
	$pdf->cell(0.35, 0.35, $bln[$i], 1, 0, "C");
}
	#tahun
$pdf->cell(0.70, 0.35, "Thn", 0, 0, "C");
for ($i=0; $i < strlen($thn); $i++) { 
	$pdf->cell(0.35, 0.35, $thn[$i], 1, 0, "C");
}
// $pdf->Cell(0.70, 0.35, "Bln", 0, 0, "C");
// for ($i=0; $i < strlen($Ibu['bulan_lahir']); $i++) { 
// 	$pdf->cell(0.35, 0.35, $Ibu['bulan_lahir'][$i], 1, 0, "C");
// }
// $pdf->Cell(0.70, 0.35, "Thn", 0, 0, "C");
// for ($i=0; $i < strlen($Ibu['tahun_lahir']); $i++) { 
// 	$pdf->cell(0.35, 0.35, $Ibu['tahun_lahir'][$i], 1, 0, "C");
// }
$umuribu = date("Y")-$thn;
$pdf->cell(1.05, 0.35, "Umur", 0, 0, "C");
$pdf->cell(0.70, 0.35, $umuribu, 1, 0, "C");
// for ($i=0; $i < strlen($thn); $i++) { 
// 	$pdf->cell(0.35, 0.35, $thn[$i], 1, 0, "C");
// }
# pekerjaan
$pdf->setXY(1.3, 11.65);
$pdf->Cell(0, 0.35, "4. Pekerjaan");
$pdf->setX(5);
$pdf->cell(0, 0.35, ":");
$pdf->setX(5.6);
for ($i=0; $i < strlen($Ibu['pekerjaan']); $i++) { 
	$pdf->cell(0.35, 0.35, $Ibu['pekerjaan'][$i], 1, 0, "C");
}
# alamat
$pdf->setXY(1.3, 12);
$pdf->Cell(0, 0.35, "5. Alamat");
$pdf->setX(5);
$pdf->cell(0, 0.35, ":");
$pdf->setX(5.6);
$pdf->Cell(14, 0.35, strtoupper($Ibu['alamat']), 1, 0, "L");
# desa
$pdf->setXY(5, 12.35);
$pdf->cell(0, 0.35, ":");
$pdf->setX(5.6);
$pdf->cell(2.45, 0.35, "a. Desa/Kelurahan", 0, 0, "L");
$pdf->cell(2.45, 0.35, strtoupper($desa), 1, 0, "L");
# kab
$pdf->cell(1.75, 0.35, "c. Kab/Kota", 0, 0, "L");
$pdf->cell(2.45, 0.35, strtoupper($kabupaten), 1, 0, "L");
# kec
$pdf->setXY(5, 12.7);
$pdf->cell(0, 0.35, ":");
$pdf->setX(5.6);
$pdf->cell(2.45, 0.35, "b. Kecamatan", 0, 0, "L");
$pdf->Cell(2.45,0.35, strtoupper($kecamatan), 1, 0, "L");
# prov
$pdf->cell(1.75, 0.35, "d. Provinsi", 0, 0, "L");
$pdf->cell(2.45, 0.35, strtoupper($provinsi), 1, 0, "L");
# kewarganegaraan
$pdf->setXY(1.3, 13.05);
$pdf->cell(0, 0.35, "6. Kewarganegaraan");
$pdf->setX(5);
$pdf->cell(0, 0.35, ":");
$pdf->setX(5.6);
$pdf->Cell(0.35, 0.35, $kewarganegaraan, 1, 0, "C");
$pdf->cell(0, 0.35, "1. WNI     2. WNA");
# kebangsaan
$pdf->setXY(1.3, 13.4);
$pdf->cell(0, 0.35, "7. Kebangsaan");
$pdf->setX(5);
$pdf->cell(0, 0.35, ":");
$pdf->setX(5.6);
$pdf->cell(3.15, 0.35, $kebangsaan, 1, 0, "L");
# tgl pencatatan perkawinan
$pdf->setXY(1.3, 13.75);
$pdf->cell(0, 0.35, "8. Tgl Pencatatan Perkawinan");
$pdf->setX(5);
$pdf->cell(0, 0.35, ":");
$pdf->setX(5.6);
$pdf->cell(0.7, 0.35, "Tgl", 0, 0, "C");
$tanggal_kawin = explode("-", $Ibu['tgl_lahir']);
for ($i=0; $i < strlen($tanggal_kawin[2]); $i++) { 
	$pdf->cell(0.35, 0.35, $tanggal_kawin[2][$i], 1, 0, "C");
}
$pdf->cell(0.7, 0.35, "Bln", 0, 0, "C");
for ($i=0; $i < strlen($tanggal_kawin[1]); $i++) { 
	$pdf->cell(0.35, 0.35, $tanggal_kawin[1][$i], 1, 0, "C");
}
$pdf->cell(0.7, 0.35, "Thn", 0, 0, "C");
for ($i=0; $i < strlen($tanggal_kawin[0]) ; $i++) { 
	$pdf->cell(0.35, 0.35, $tanggal_kawin[0][$i], 1, 0, "C");
}
#garis garis
$pdf->Line(1, 10, 1, 14.2); # kiri
$pdf->LIne(1, 14.2, 20.58, 14.2); # bawah
$pdf->Line(20.58, 10, 20.58, 14.2); # kanan

# ayah
$pdf->setXY(1.3, 14.15);
$pdf->setFont("Arial", "B", 7);
$pdf->Cell(0, 0.8, "AYAH");

# nik
$pdf->setFont("Arial", "", 7);
$pdf->setXY(1.3, 14.70);
$pdf->Cell(0, 0.35, "1. NIK");
$pdf->setX(5);
$pdf->cell(0, 0.35, ":");
$pdf->setX(5.6);
for ($i=0; $i < strlen($Ayah1['nik']); $i++) { 
	$pdf->cell(0.35, 0.35, $Ayah1['nik'][$i], 1, 0, "C") ;
}
# nama lengkap
$pdf->setXY(1.3, 15.05);
$pdf->cell(0, 0.35, "2. Nama Lengkap");
$pdf->setX(5);
$pdf->Cell(0, 0.35, ":");
$pdf->setX(5.6);
for ($i=0; $i < strlen($Ayah1['nama_lengkap']); $i++) { 
	$pdf->cell(0.35, 0.35, strtoupper($Ayah1['nama_lengkap'][$i]), 1, 0, "C");
}
# tanggal lahir
$pdf->setXY(1.3, 15.40);
$pdf->cell(0, 0.35, "3. Tanggal Lahir");
$pdf->setX(5);
$pdf->cell(0, 0.35, ":");
$pdf->setX(5.6);
$pdf->cell(0.70, 0.35, "Tgl", 0, 0, "C");
$tanggal_lahir = explode("-", $Ayah1['tgl_lahir']);
$tgl = $tanggal_lahir[2];
$bln = $tanggal_lahir[1];
$thn = $tanggal_lahir[0];
for ($i=0; $i < strlen($tgl) ; $i++) { 
	$pdf->cell(0.35, 0.35, $tgl[$i], 1, 0, "C");
}
	#bulan
$pdf->cell(0.70, 0.35, "Bln", 0, 0, "C");
for ($i=0; $i < strlen($bln); $i++) { 
	$pdf->cell(0.35, 0.35, $bln[$i], 1, 0, "C");
}
	#tahun
$pdf->cell(0.70, 0.35, "Thn", 0, 0, "C");
for ($i=0; $i < strlen($thn); $i++) { 
	$pdf->cell(0.35, 0.35, $thn[$i], 1, 0, "C");
}
// $pdf->cell(0.70, 0.35, "Tgl", 0, 0, "C");
// for ($i=0; $i < strlen($Ayah1['tgl_lahir']); $i++) { 
// 	$pdf->cell(0.35, 0.35, $Ayah1['tgl_lahir'][$i], 1, 0, "C");
// }
// $pdf->Cell(0.70, 0.35, "Bln", 0, 0, "C");
// for ($i=0; $i < strlen($Ayah1['bulan_lahir']); $i++) { 
// 	$pdf->cell(0.35, 0.35, $Ayah1['bulan_lahir'][$i], 1, 0, "C");
// }
// $pdf->Cell(0.70, 0.35, "Thn", 0, 0, "C");
// for ($i=0; $i < strlen($Ayah1['tahun_lahir']); $i++) { 
// 	$pdf->cell(0.35, 0.35, $Ayah1['tahun_lahir'][$i], 1, 0, "C");
// }
$umurayah = date("Y")-$thn;
$pdf->cell(1.05, 0.35, "Umur", 0, 0, "C");
$pdf->cell(0.70, 0.35, $umurayah, 1, 0, "C");
// for ($i=0; $i < strlen($umurayah); $i++) { 
// 	$pdf->cell(0.35, 0.35, $umurayah[$i], 1, 0, "C");
// }
# pekerjaan
$pdf->setXY(1.3, 15.75);
$pdf->Cell(0, 0.35, "4. Pekerjaan");
$pdf->setX(5);
$pdf->cell(0, 0.35, ":");
$pdf->setX(5.6);
for ($i=0; $i < strlen($Ayah1['pekerjaan']); $i++) { 
	$pdf->cell(0.35, 0.35, $Ayah1['pekerjaan'][$i], 1, 0, "C");
}
# alamat
$pdf->setXY(1.3, 16.10);
$pdf->Cell(0, 0.35, "5. Alamat");
$pdf->setX(5);
$pdf->cell(0, 0.35, ":");
$pdf->setX(5.6);
$pdf->Cell(14, 0.35, strtoupper($Ayah1['alamat']), 1, 0, "L");
# desa
$pdf->setXY(5, 16.45);
$pdf->cell(0, 0.35, ":");
$pdf->setX(5.6);
$pdf->cell(2.45, 0.35, "a. Desa/Kelurahan", 0, 0, "L");
$pdf->cell(2.45, 0.35, strtoupper($desa), 1, 0, "L");
# kab
$pdf->cell(1.75, 0.35, "c. Kab/Kota", 0, 0, "L");
$pdf->cell(2.45, 0.35, strtoupper($kabupaten), 1, 0, "L");
# kec
$pdf->setXY(5, 16.80);
$pdf->cell(0, 0.35, ":");
$pdf->setX(5.6);
$pdf->cell(2.45, 0.35, "b. Kecamatan", 0, 0, "L");
$pdf->Cell(2.45,0.35, strtoupper($kecamatan), 1, 0, "L");
# prov
$pdf->cell(1.75, 0.35, "d. Provinsi", 0, 0, "L");
$pdf->cell(2.45, 0.35, strtoupper($provinsi), 1, 0, "L");
# kewarganegaraan
$pdf->setXY(1.3, 17.15);
$pdf->cell(0, 0.35, "6. Kewarganegaraan");
$pdf->setX(5);
$pdf->cell(0, 0.35, ":");
$pdf->setX(5.6);
$pdf->Cell(0.35, 0.35, $kewarganegaraan, 1, 0, "C");
$pdf->cell(0, 0.35, "1. WNI     2. WNA");
# kebangsaan
$pdf->setXY(1.3, 17.50);
$pdf->cell(0, 0.35, "7. Kebangsaan");
$pdf->setX(5);
$pdf->cell(0, 0.35, ":");
$pdf->setX(5.6);
$pdf->cell(3.15, 0.35, $kebangsaan, 1, 0, "L");
#garis garis
$pdf->Line(1, 14.2, 1, 18); # kiri
$pdf->LIne(1, 18, 20.58, 18); # bawah
$pdf->Line(20.58, 14.2, 20.58, 18); # kanan

// # pelapor
$pdf->setFont("Arial", "B", 7);
$pdf->setXY(1.3, 17.9);
$pdf->cell(0, 0.8, "PELAPOR");
# nik
$pdf->setFont("Arial", "", 7);
$pdf->setXY(1.3, 18.45);
$pdf->Cell(0, 0.35, "1. NIK");
$pdf->setX(5);
$pdf->cell(0, 0.35, ":");
$pdf->setX(5.6);
for ($i=0; $i < strlen($pelapor['nik']); $i++) { 
	$pdf->cell(0.35, 0.35, $pelapor['nik'][$i], 1, 0, "C") ;
}
# nama lengkap
$pdf->setXY(1.3, 18.80);
$pdf->cell(0, 0.35, "2. Nama Lengkap");
$pdf->setX(5);
$pdf->Cell(0, 0.35, ":");
$pdf->setX(5.6);
for ($i=0; $i < strlen($pelapor['nama_lengkap']); $i++) { 
	$pdf->cell(0.35, 0.35, strtoupper($pelapor['nama_lengkap'][$i]), 1, 0, "C");
}
# umur
$pdf->setXY(1.3, 19.15);
$pdf->cell(0, 0.35, "3. Umur");
$pdf->setX(5);
$pdf->cell(0, 0.35, ":");
$pdf->setX(5.6);
$tanggal_lahir = explode("-", $pelapor['tgl_lahir']);
$thn = $tanggal_lahir[0];
$umurpelapor = date("Y")-$thn;
$pdf->cell(0.70, 0.35, $umurpelapor, 1, 0, "C");
$pdf->cell(0, 0.35, "Tahun");
# jenis kelamin
$pdf->setXY(1.3, 19.5);
$pdf->cell(0, 0.35, "4. Jenis Kelamin");
$pdf->setX(5);
$pdf->cell(0, 0.35, ":");
$pdf->setX(5.6);
if ($pelapor['jk']=="Laki-Laki") {
	$kodejk=1;
}else{
	$kodejk=2;
}
$pdf->cell(0.35, 0.35, $kodejk, 1, 0, "C");
$pdf->cell(0, 0.35, "1. Laki-laki      2. Perempuan");
# pekerjaan
$pdf->setXY(1.3, 19.85);
$pdf->cell(0, 0.35, "5. Pekerjaan");
$pdf->setX(5);
$pdf->cell(0, 0.35, ":");
$pdf->setX(5.6);
for ($i=0; $i < strlen($pelapor['pekerjaan']); $i++) { 
	$pdf->cell(0.35, 0.35, $pelapor['pekerjaan'][$i], 1, 0, "C");
}
# alamat
$pdf->setXY(1.3, 20.2);
$pdf->Cell(0, 0.35, "6. Alamat");
$pdf->setX(5);
$pdf->cell(0, 0.35, ":");
$pdf->setX(5.6);
$pdf->Cell(14, 0.35, strtoupper($pelapor['alamat']), 1, 0, "L");
# desa
$pdf->setXY(5, 20.55);
$pdf->cell(0, 0.35, ":");
$pdf->setX(5.6);
$pdf->cell(2.45, 0.35, "a. Desa/Kelurahan", 0, 0, "L");
$pdf->cell(2.45, 0.35, strtoupper($desa), 1, 0, "L");
# kab
$pdf->cell(1.75, 0.35, "c. Kab/Kota", 0, 0, "L");
$pdf->cell(2.45, 0.35, strtoupper($kabupaten), 1, 0, "L");
# kec
$pdf->setXY(5, 20.90);
$pdf->cell(0, 0.35, ":");
$pdf->setX(5.6);
$pdf->cell(2.45, 0.35, "b. Kecamatan", 0, 0, "L");
$pdf->Cell(2.45,0.35, strtoupper($kecamatan), 1, 0, "L");
# prov
$pdf->cell(1.75, 0.35, "d. Provinsi", 0, 0, "L");
$pdf->cell(2.45, 0.35, strtoupper($provinsi), 1, 0, "L");
#garis garis
$pdf->Line(1, 18, 1, 21.4); # kiri
$pdf->LIne(1, 21.4, 20.58, 21.4); # bawah
$pdf->Line(20.58, 18, 20.58, 21.4); # kanan

// # saksi 1
$pdf->setFont("Arial", "B", 7);
$pdf->setXY(1.3, 21.5);
$pdf->cell(0, 0.35, "SAKSI I");

# nik
$pdf->setFont("Arial", "", 7);
$pdf->setXY(1.3, 21.85);
$pdf->cell(0, 0.35, "1. NIK");
$pdf->setX(5);
$pdf->cell(0, 0.35, ":");
$pdf->setX(5.6);
for ($i=0; $i < strlen($saksi1['nik']); $i++) { 
	$pdf->cell(0.35, 0.35, $saksi1['nik'][$i], 1, 0, "C");
}
# nama lengkap
$pdf->setXY(1.3, 22.2);
$pdf->cell(0, 0.35, "2. Nama Lengkap");
$pdf->setX(5);
$pdf->Cell(0, 0.35, ":");
$pdf->setX(5.6);
for ($i=0; $i < strlen($saksi1['nama_lengkap']); $i++) { 
	$pdf->cell(0.35, 0.35, strtoupper($saksi1['nama_lengkap'][$i]), 1, 0, "C");
}
# umur
$pdf->setXY(1.3, 22.55);
$pdf->cell(0, 0.35, "3. Umur");
$pdf->setX(5);
$pdf->cell(0, 0.35, ":");
$pdf->setX(5.6);
$tanggal_lahir = explode("-", $saksi1['tgl_lahir']);
$thn = $tanggal_lahir[0];
$umursaksi1 = date("Y")-$thn;
$pdf->cell(0.70, 0.35, $umursaksi1, 1, 0, "C");
$pdf->cell(0, 0.35, "Tahun");
# pekerjaan
$pdf->setXY(1.3, 22.90);
$pdf->cell(0, 0.35, "4. Pekerjaan");
$pdf->setX(5);
$pdf->cell(0, 0.35, ":");
$pdf->setX(5.6);
for ($i=0; $i < strlen($saksi1['pekerjaan']); $i++) { 
	$pdf->cell(0.35, 0.35, $saksi1['pekerjaan'][$i], 1, 0, "C");
}
# alamat
$pdf->setXY(1.3, 23.25);
$pdf->Cell(0, 0.35, "5. Alamat");
$pdf->setX(5);
$pdf->cell(0, 0.35, ":");
$pdf->setX(5.6);
$pdf->Cell(14, 0.35, strtoupper($saksi1['alamat']), 1, 0, "L");
# desa
$pdf->setXY(5, 23.60);
$pdf->cell(0, 0.35, ":");
$pdf->setX(5.6);
$pdf->cell(2.45, 0.35, "a. Desa/Kelurahan", 0, 0, "L");
$pdf->cell(2.45, 0.35, strtoupper($desa), 1, 0, "L");
# kab
$pdf->cell(1.75, 0.35, "c. Kab/Kota", 0, 0, "L");
$pdf->cell(2.45, 0.35, strtoupper($kabupaten), 1, 0, "L");
# kec
$pdf->setXY(5, 23.95);
$pdf->cell(0, 0.35, ":");
$pdf->setX(5.6);
$pdf->cell(2.45, 0.35, "b. Kecamatan", 0, 0, "L");
$pdf->Cell(2.45,0.35, strtoupper($kecamatan), 1, 0, "L");
# prov
$pdf->cell(1.75, 0.35, "d. Provinsi", 0, 0, "L");
$pdf->cell(2.45, 0.35, strtoupper($provinsi), 1, 0, "L");
#garis garis
$pdf->Line(1, 21.4, 1, 24.5); # kiri
$pdf->LIne(1, 24.5, 20.58, 24.5); # bawah
$pdf->Line(20.58, 21.4, 20.58, 24.5); # kanan

// # saksi 2
$pdf->setFont("Arial", "B", 7);
$pdf->setXY(1.3, 24.65);
$pdf->cell(0, 0.35, "SAKSI 2");
# nik
$pdf->setFont("Arial", "", 7);
$pdf->setXY(1.3, 25);
$pdf->cell(0, 0.35, "1. NIK");
$pdf->setX(5);
$pdf->cell(0, 0.35, ":");
$pdf->setX(5.6);
for ($i=0; $i < strlen($saksi2['nik']); $i++) { 
	$pdf->cell(0.35, 0.35, $saksi2['nik'][$i], 1, 0, "C");
}
# nama lengkap
$pdf->setXY(1.3, 25.35);
$pdf->cell(0, 0.35, "2. Nama Lengkap");
$pdf->setX(5);
$pdf->Cell(0, 0.35, ":");
$pdf->setX(5.6);
for ($i=0; $i < strlen($saksi2['nama_lengkap']); $i++) { 
	$pdf->cell(0.35, 0.35, strtoupper($saksi2['nama_lengkap'][$i]), 1, 0, "C");
}
# umur
$pdf->setXY(1.3, 25.70);
$pdf->cell(0, 0.35, "3. Umur");
$pdf->setX(5);
$pdf->cell(0, 0.35, ":");
$pdf->setX(5.6);

$tanggal_lahir = explode("-", $saksi2['tgl_lahir']);
$thn = $tanggal_lahir[0];
$umursaksi2 = date("Y")-$thn;
$pdf->cell(0.70, 0.35, $umursaksi2, 1, 0, "C");
$pdf->cell(0, 0.35, "Tahun");
# pekerjaan
$pdf->setXY(1.3, 26.05);
$pdf->cell(0, 0.35, "4. Pekerjaan");
$pdf->setX(5);
$pdf->cell(0, 0.35, ":");
$pdf->setX(5.6);
for ($i=0; $i < strlen($saksi2['pekerjaan']); $i++) { 
	$pdf->cell(0.35, 0.35, $saksi2['pekerjaan'][$i], 1, 0, "C");
}
# alamat
$pdf->setXY(1.3, 26.40);
$pdf->Cell(0, 0.35, "5. Alamat");
$pdf->setX(5);
$pdf->cell(0, 0.35, ":");
$pdf->setX(5.6);
$pdf->Cell(14, 0.35, strtoupper($saksi2['alamat']), 1, 0, "L");
# desa
$pdf->setXY(5, 26.75);
$pdf->cell(0, 0.35, ":");
$pdf->setX(5.6);
$pdf->cell(2.45, 0.35, "a. Desa/Kelurahan", 0, 0, "L");
$pdf->cell(2.45, 0.35, strtoupper($desa), 1, 0, "L");
# kab
$pdf->cell(1.75, 0.35, "c. Kab/Kota", 0, 0, "L");
$pdf->cell(2.45, 0.35, strtoupper($kabupaten), 1, 0, "L");
# kec
$pdf->setXY(5, 27.1);
$pdf->cell(0, 0.35, ":");
$pdf->setX(5.6);
$pdf->cell(2.45, 0.35, "b. Kecamatan", 0, 0, "L");
$pdf->Cell(2.45,0.35, strtoupper($kecamatan), 1, 0, "L");
# prov
$pdf->cell(1.75, 0.35, "d. Provinsi", 0, 0, "L");
$pdf->cell(2.45, 0.35, strtoupper($provinsi), 1, 0, "L");
#garis garis
$pdf->Line(1, 24.5, 1, 27.7); # kiri
$pdf->LIne(1, 27.7, 20.58, 27.7); # bawah
$pdf->Line(20.58, 24.5, 20.58, 27.7); # kanan

# tanda tangan
$pdf->setY(28);
$pdf->cell(14, 0.35, "",0,0);
$pdf->cell(5.56, 0.35, "Bondowoso, ".date("d/m/Y"),0,1,"C");
$pdf->cell(5.56, 0.35, "Mengetahui",0,0,"C");
$pdf->cell(8.44, 0.35, "",0,0,"C");
$pdf->cell(5.56, 0.35, "Pelapor",0,1,"C");
$pdf->cell(5.56, 0.35, "Kepala Desa/Lurah",0,0,"C");
$pdf->cell(8.44, 0.35, "",0,0,"C");
$pdf->cell(5.56, 1.4, " ",0,1,"C");
$pdf->cell(5.56, 0.35,"( ".$Nama_Perangkat." )",0,0,"C");
$pdf->cell(8.44, 0.35, "",0,0,"C");
$pdf->cell(5.56, 0.35,"( ".$pelapor['nama_lengkap']." )",0,1,"C");


$pdf->Output("SURAT KETERANGAN KELAHIRAN-".$Bayi3['nama_lengkap'].".pdf","I");
?>