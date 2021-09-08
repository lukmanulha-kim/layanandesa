<?php 
require('../fpdf/fpdf.php');

include '../koneksi.php';
$desa = "Pecalongan";
$kecamatan = "Sukosari";
$kabupaten = "Bondowoso";
$provinsi = "Jawa Timur";
$kewarganegaraan = "1";
$kebangsaan = "Indonesia"; 
$kd_prov = "35"; 
$kd_kab = "11"; 
$kd_kec = "04"; 
$kd_des = "1234";
$kodepos = "68287";

$kode = $_GET['kode'];
$data = $dbconnect->query("SELECT * FROM
tb_layanan
Inner Join tb_penduduk ON tb_penduduk.nik = tb_layanan.id_penduduk
Inner Join tb_jenissurat ON tb_jenissurat.id_jenis = tb_layanan.id_jenissurat
Inner Join tb_dusun ON tb_dusun.id_dusun = tb_penduduk.kode_dusun
Inner Join tb_rt ON tb_rt.id_rt = tb_penduduk.kode_rt
Inner Join tb_rw ON tb_rw.id_rw = tb_penduduk.kode_rw
where tb_layanan.id_pelayanan='$kode'")->fetch_array();

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
$pdf->setTitle(strtoupper($data['nama_surat']." - ".$data['nama_lengkap']));


# header
$pdf->setFont('Arial', 'B', 14);
$pdf->cell(14.5);
$pdf->cell(5, 1, 'F-1.15', 1, 1, 'C');
$pdf->setFont('Arial', 'B', 11);
$pdf->Ln(1.5);
$pdf->cell(0, 0, 'FORMULIR PERMOHONAN KARTU KELUARGA (KK) BARU WARGA NEGARA INDONESIA', 0, 1, 'C');

# petunjuk
$pdf->setY(4.4);
$pdf->setFont('Arial', 'B', 6);
$pdf->cell(0, 0, "Petunjuk :",0, 2);
$pdf->setFont('Arial', '', 6);
$pdf->setY(4.8);
$pdf->cell(0,0, "1. Harap diisi dengan huruf cetak dan menggunakan tinta hitam.");
$pdf->setY(5.1);
$pdf->cell(0,0, "2. Setelah formulir ini diisi dan ditandatangani, harap diserahkan kembali ke kantor Desa / Kelurahan.");
# garis garis
$pdf->line(1, 4, 20.5, 4); 
$pdf->line(1, 4, 1, 5.5); 
$pdf->line(20.5, 4, 20.5, 5.5);
$pdf->line(1, 5.5, 20.5, 5.5);


#propinsi
$pdf->setY(5.8);
$pdf->setFont('Arial', '', 7);
$pdf->cell(0.5,0.5, "PEMERINTAH PROPINSI");
$pdf->setX(6);
$pdf->cell(0.5,0.5,':');
$pdf->setX(6.3);
	# kode prop
for($i=0; $i<strlen($kd_prov); $i++){
	if($i == strlen($kd_prov)-1){
		$pdf->cell(0.5, 0.5, $kd_prov[$i], 1, 0, 'C');
		break;
	} 
	$pdf->cell(0.5, 0.5, $kd_prov[$i], 'LTB', 0, 'C');
}
$pdf->setX(8.6);
	# nama prop
$pdf->cell(3, 0.5, strtoupper($provinsi), 1, 0, 'L');

# kabupaten
$pdf->setY(6.5);
$pdf->cell(0.5,0.5, "PEMERINTAH KABUPATEN / KOTA");
$pdf->setX(6);
$pdf->cell(0.5,0.5,':');
$pdf->setX(6.3);
	#kode kab
for($i=0; $i<strlen($kd_kab); $i++){
	if($i == strlen($kd_kab)-1){
		$pdf->cell(0.5, 0.5, $kd_kab[$i], 1, 0, 'C');
		break;
	} 
	$pdf->cell(0.5, 0.5, $kd_kab[$i], 'LTB', 0, 'C');
}
	#nama kab
$pdf->setX(8.6);
$pdf->cell(3, 0.5, strtoupper($kabupaten), 1, 0, 'L');

# kecamatan
$pdf->setY(7.2);
$pdf->setFont('Arial', '', 7);
$pdf->cell(0.5,0.5, "KECAMATAN");
$pdf->setX(6);
$pdf->cell(0.5,0.5,':');
$pdf->setX(6.3);
#kode kec
for($i=0; $i<strlen($kd_kec); $i++){
	if($i == strlen($kd_kec)-1){
		$pdf->cell(0.5, 0.5, $kd_kec[$i], 1, 0, 'C');
		break;
	} 
	$pdf->cell(0.5, 0.5, $kd_kec[$i], 'LTB', 0, 'C');
}
	#nama kec
$pdf->setX(8.6);
$pdf->cell(3, 0.5, strtoupper($kecamatan), 1, 0, 'L');

# desa
$pdf->setY(7.9);
$pdf->setFont('Arial', '', 7);
$pdf->cell(0.5,0.5, "KELURAHAN / DESA");
$pdf->setX(6);
$pdf->cell(0.5,0.5,':');
$pdf->setX(6.3);
#kode kec
for($i=0; $i<strlen($kd_des); $i++){
	if($i == strlen($kd_des)-1){
		$pdf->cell(0.5, 0.5, $kd_des[$i], 1, 0, 'C');
		break;
	} 
	$pdf->cell(0.5, 0.5, $kd_des[$i], 'LTB', 0, 'C');
}
	#nama kec
$pdf->setX(8.6);
$pdf->cell(3, 0.5, strtoupper('pecalongan'), 1, 0, 'L');

#garis-garis
$pdf->line(1, 5.5, 1, 8.7); # kiri
$pdf->line(1, 8.7, 20.5, 8.7); # bawah
$pdf->line(20.5, 8.7, 20.5, 5.5); #kanan



#Konten Pemohon
	# nama pemohon
$pdf->setXY(1.2, 9);
$pdf->setFont('Arial', '', 7);
$pdf->cell(3.5, 0.5, '1. Nama Lengkap Pemohon', 1, 0, 'L');
$pdf->setX(5);
$pdf->cell(0.5, 0.5, ':');
$pdf->setX(5.5);
for($i=0; $i<strlen($data['nama_lengkap']); $i++){
	if($i == strlen($data['nama_lengkap'])-1){
		$pdf->cell(0.5, 0.5, strtoupper($data['nama_lengkap'][$i]), 1, 0, 'C');
		break;
	}
	$pdf->cell(0.5, 0.5, strtoupper($data['nama_lengkap'][$i]), 'LTB', 0, 'C');
}

	#nik pemohon
$pdf->setXY(1.2, 9.7);
$pdf->cell(3.5, 0.5, '2. NIK Pemohon', 1, 0, 'L');
$pdf->setX(5);
$pdf->cell(0.5, 0.5, ':');
$pdf->setX(5.5);
for($i=0; $i<strlen($data['nik']); $i++){
	if($i == strlen($data['nik'])-1){
		$pdf->cell(0.5, 0.5, strtoupper($data['nik'][$i]), 1, 0, 'C');
		break;
	}
	$pdf->cell(0.5, 0.5, strtoupper($data['nik'][$i]), 'LTB', 0, 'C');
}

	# no kk semula
$pdf->setXY(1.2, 10.4);
$pdf->cell(3.5, 0.5, '3. No. KK Semula', 1, 0, 'L');
$pdf->setX(5);
$pdf->cell(0.5, 0.5, ':');
$pdf->setX(5.5);
for($i=0; $i<strlen($data['no_kk']); $i++){
	if($i == strlen($data['no_kk'])-1){
		$pdf->cell(0.5, 0.5, strtoupper($data['no_kk'][$i]), 1, 0, 'C');
		break;
	}
	$pdf->cell(0.5, 0.5, strtoupper($data['no_kk'][$i]), 'LTB', 0, 'C');
}
$pdf->setX(13.5);
$pdf->cell(0, 0.5, '*) Diisi oleh petugas');

	# alamat pemohon
$pdf->setXY(1.2, 11.1);
$pdf->cell(3.5, 0.5, '4. Alamat Pemohon', 1, 0, 'L');
$pdf->setX(5);
$pdf->cell(0.5, 0.5, ':');
$pdf->setX(5.5);
$pdf->cell(8, 0.5, strtoupper($data['alamat']), 1, 0, 'L');
	#rt
$pdf->setX(14);
$pdf->cell(0, 0.5, 'RT');
$pdf->setX(14.7);
for($i=0; $i<strlen($data['no_rt']); $i++){
	if($i == strlen($data['no_rt'])-1){
		$pdf->cell(0.5, 0.5, $data['no_rt'][$i], 1, 0, 'C');
		break;
	}
	$pdf->cell(0.5, 0.5, $data['no_rt'][$i], 'LTB', 0, 'C');
}
	#rw
$pdf->setX(16.5);
$pdf->cell(0, 0.5, 'RW');
$pdf->setX(17.2);
for($i=0; $i<strlen($data['no_rw']); $i++){
	if($i == strlen($data['no_rw'])-1){
		$pdf->cell(0.5, 0.5, $data['no_rw'][$i], 1, 0, 'C');
		break;
	}
	$pdf->cell(0.5, 0.5, $data['no_rw'][$i], 'LTB', 0, 'C');
}
	#desa
$pdf->setXY(5, 11.8);
$pdf->cell(0, 0.5, "a. Desa / Kelurahan");
$pdf->setX(7.5);
$pdf->cell(4, 0.5, strtoupper($desa), 1, 0, 'L');
	#kec
$pdf->setX(12);
$pdf->cell(0, 0.5, "b. Kecamatan");
$pdf->setX(13.9);
$pdf->cell(4, 0.5, strtoupper($kecamatan), 1, 0, 'L');
	#kab
$pdf->setXY(5, 12.5);
$pdf->cell(0, 0.5, "c. Kabupaten / Kota");
$pdf->setX(7.5);
$pdf->cell(4, 0.5, strtoupper($kabupaten),1, 0, 'L');
	#propinsi
$pdf->setX(12);
$pdf->cell(0, 0.5, "d. Propinsi");
$pdf->setX(13.9);
$pdf->cell(4, 0.5, strtoupper($provinsi), 1, 0, 'L');
	#kode pos
$pdf->setXY(5, 13.2);
$pdf->cell(0, 0.5, "Kode Pos");
$pdf->setX(7.5);
for($i=0; $i<strlen($kodepos); $i++){
	if($i == strlen($kodepos)-1){
		$pdf->cell(0.5, 0.5, $kodepos[$i], 1, 0, 'C');
		break;
	}
	$pdf->cell(0.5, 0.5, $kodepos[$i], 'LTB', 0, 'C');
}
	#telepon
$telepon = "082335542098";
$pdf->setX(12);
$pdf->cell(0, 0.5, "Telepon");
$pdf->setX(13.9);
for($i=0; $i<strlen($telepon); $i++){
	if($i == strlen($telepon)-1){
		$pdf->cell(0.5, 0.5, $telepon[$i], 1, 0, 'C');
		break;
	}
	$pdf->cell(0.5, 0.5, $telepon[$i], 'LTB', 0, 'C');
}


	# alasan permohonan
$pdf->setXY(1.2, 13.9);
$pdf->cell(3.5, 0.5, "5. Alasan Permohonan", 1, 0, 'L');
$pdf->setX(5);
$pdf->cell(0.5, 0.5, ':');
$pdf->setX(5.5);
$pdf->cell(0.5, 0.5, "3", 1, 0, 'C');
$pdf->setX(6.3);
$pdf->cell(0, 0.5, "1. Karena Membentuk Rumah Tangga Baru");
$pdf->setX(12);
$pdf->cell(0, 0.5, "3. Karena Lainnya");
$pdf->setXY(6.3, 14.6);
$pdf->cell(0, 0.5, "2. Karena Kartu Keluarga Hilang / Rusak");

	# jumlah anggota keluarga
$queryy = $dbconnect->query("SELECT COUNT(no_kk) as jumlah from tb_penduduk where no_kk=$data[no_kk]")->fetch_array();
$total = $queryy['jumlah']-1;
$pdf->setXY(1.2, 15.3);
$pdf->cell(3.5, 0.5, "6. Jumlah Anggota Keluarga", 1, 0, 'L');
$pdf->setX(5);
$pdf->cell(0.5, 0.5, ':');
$pdf->setX(5.5);
for($i=0; $i<strlen($total); $i++){
	if($i == strlen($total)-1){
		$pdf->cell(0.5, 0.5, $total, 1, 0, 'C');
		break;
	}
	$pdf->cell(0.5, 0.5, $total, 'LTB', 0, 'C');
}
$pdf->setX(6.3);
$pdf->cell(0, 0.5, "Orang");

#garis-garis
$pdf->line(1, 8.7, 1, 16.3); # kiri
$pdf->line(1, 16.3, 20.5, 16.3); # bawah
$pdf->line(20.5, 8.7, 20.5, 16.3); #kanan


# DAFTAR ANGGOTA KELUARGA PEMOHON
$queryanggota = $dbconnect->query("SELECT * from tb_penduduk where no_kk=$data[no_kk] and nik != $data[nik]");

$pdf->setXY(1.2, 16.5);
$pdf->setFont('Arial', 'B', 7);
$pdf->cell(0, 0.5, "7. DAFTAR ANGGOTA KELUARGA PEMOHON (hanya diisi anggota keluarga saja)");
	# header
$pdf->setXY(1.2, 17.2);
$pdf->setFillColor(50, 50, 50);
$pdf->SetTextColor(255, 255, 255);
$pdf->cell(1, 0.5, "NO", 1, 0, 'C', true);
$pdf->setX(2.4);
$pdf->cell(8, 0.5, "N I K", 1, 0, 'C', true);
$pdf->setX(10.6);
$pdf->cell(8, 0.5, "NAMA LENGKAP", 1, 0, 'C', true);
$pdf->setX(18.8);
$pdf->cell(1.5, 0.5, "SHDK**)", 1, 0, 'C', true);
// 	# KONTEN
$pdf->setFont('Arial', '', 7);
$pdf->SetTextColor(0, 0, 0);
$x = 1.2;
$y =17.9;
$no = 1;
while($row = $queryanggota->fetch_array()){
	$pdf->setXY($x, $y);
	$strno = "0".strval($no);
	# nomor
	for($i=0; $i<strlen($strno); $i++){
		if($i == strlen($strno)-1){
			$pdf->cell(0.5, 0.5, $strno[$i], 1, 0, 'C');
			break;
		}
		$pdf->cell(0.5, 0.5, $strno[$i], 'LTB', 0, 'C');
	}
	# nik anggota
	$pdf->setX(2.4);
	for($i=0; $i<strlen($row['nik']); $i++){
		if($i == strlen($row['nik'])-1){
			$pdf->cell(0.5, 0.5, $row['nik'][$i], 1, 0, 'C');
			break;
		}
		$pdf->cell(0.5, 0.5, $row['nik'][$i], 'LTB', 0, 'C');
	}
	# nama anggota
	$pdf->setX(10.6);	
	$pdf->cell(8, 0.5, strtoupper($row['nama_lengkap']), 1, 0, 'L');
	# shdk
	$pdf->setX(18.8);
	if ($row['stat_hub_kel']=="Kepala Keluarga") {
		$shdk = "01";
	}elseif ($row['stat_hub_kel']=="Istri") {
		$shdk = "02";
	}elseif ($row['stat_hub_kel']=="Anak") {
		$shdk = "03";
	}
	for($i=0; $i<strlen($shdk); $i++){
		if($i == strlen($shdk)-1){
			$pdf->cell(0.75, 0.5, $shdk[$i], 1, 0, 'C');
			break;
		}
		$pdf->cell(0.75, 0.5, $shdk[$i], 'LTB', 0, 'C');
	}
	
	$y += 0.7;
	$no++;
}


# TANDA TANGAN
$pdf->setFont('Arial', '', 8);
$pdf->setXY(1.2, 26);
$pdf->cell(10, 0, "Mengetahui,", 0, 0, 'C');
$pdf->setX(11.2);
$pdf->cell(10, 0, "Pecalongan, ", 0, 0, 'C');
$pdf->setXY(11.2, 26.3);
$pdf->cell(10, 0, "Pemohon,", 0, 0, 'C');
$pdf->setXY(11.2, 28);
$pdf->cell(10, 0, "( ".$data['nama_lengkap']." )", 0, 0, 'C');
$pdf->setXY(1.2, 26.7);
$pdf->cell(5, 0, "Camat", 0, 0, "C");
$pdf->setX(6.2);
$pdf->cell(5, 0, "Kepala Desa / Lurah", 0, 0, "C");
$pdf->setXY(1.2, 28.3);
$pdf->cell(5, 0, "....................................................", 0, 0, "C");
$pdf->setX(6.2);
$pdf->setFont('Arial', 'B', 8);
$pdf->cell(5, 0, strtoupper($Nama_Perangkat), 0, 0, "C");
$pdf->setFont('Arial', '', 8);
$pdf->setXY(1.2, 29);
$pdf->cell(5, 0, "NIP ............................................", 0, 0, "C");
$pdf->setX(6.2);
$pdf->cell(5, 0, "NIP ............................................", 0, 0, "C");
$pdf->setXY(13, 29);
$pdf->setFont('Arial', 'B', 8);
$pdf->cell(8, 0, "Tanggal Pemasukan Data", 0, 0, 'L');
$pdf->setFont('Arial', '', 8);
$pdf->setXY(13, 29.4);
$pdf->cell(1, 0.5, "Tgl.");
$pdf->setX(13.7);
$pdf->cell(0.5, 0.5, "", "LTB");
$pdf->cell(0.5, 0.5, "", 1);
$pdf->setX(15);
$pdf->cell(1, 0.5, "Bln.");
$pdf->setX(15.7);
$pdf->cell(0.5, 0.5, "", "LTB");
$pdf->cell(0.5, 0.5, "", 1);
$pdf->setX(17);
$pdf->cell(1, 0.5, "Thn.");
$pdf->setX(17.8);
$pdf->cell(0.5, 0.5, "", "LTB");
$pdf->cell(0.5, 0.5, "", 1);
$pdf->setXY(13, 30.1);
$pdf->cell(0, 0.5, "Paraf Petugas");
$pdf->setX(15);
$pdf->cell(4, 0.8, "", 1);

#garis-garis
$pdf->line(1, 32, 1, 16.3); # kiri
$pdf->line(1, 32, 20.5, 32); # bawah
$pdf->line(20.5, 16.3, 20.5, 32); #kanan






$pdf->Output(strtoupper($data['nama_surat'])." - ".strtoupper($data['nama_lengkap']).".pdf","I");




?>