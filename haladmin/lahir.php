<?php include 'koneksi.php'; ?>
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Data Kelahiran</a> </div>
    <h1>Data Kelahiran</h1>
  </div>
  <?php
    @$aksi = $_GET['aksi'];
    if ($aksi == "tambah") {
  ?>
  <hr>
  <div class="container-fluid">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Tambah Data Kelahiran</h5>
          <a href="?page=kelahiran" class="label label-info btn btn-mini btn-info">Lihat Data</a>
        </div>
        <div class="widget-content">
         <form action="" method="post" name="forminput" class="form-horizontal">

            <div class="control-group" id="div">
              <label for="normal" class="control-label">Nama Bayi</label>
              <div class="controls">
                <input type="text" id="i_bayi" name="i_bayi" class="span8" onkeyup="HitungNIK()" required>
                <span class="help-inline" id="pesan"></span> <span class="help-inline" id="sisa"></span> </div>
            </div>

            <div class="control-group">
              <label class="control-label">Jenis Kelamin</label>
              <div class="controls">
                <label>
                  <input type="radio" name="i_jenis" value="Laki-Laki" required/>
                  Laki-Laki</label>
                <label>
                  <input type="radio" name="i_jenis" value="Perempuan" required/>
                  Perempuan</label>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Lokasi Kelahiran</label>
              <div class="controls">
                <label>
                  <input type="radio" name="i_lokasi" value="RS/RB" required/>
                  RS/RB</label>
                <label>
                  <input type="radio" name="i_lokasi" value="Puskesmas" />
                  Puskesmas</label>
                <label>
                  <input type="radio" name="i_lokasi" value="Polindes" />
                  Polindes</label>
                <label>
                  <input type="radio" name="i_lokasi" value="Rumah" />
                  Rumah</label>
                <label>
                  <input type="radio" name="i_lokasi" value="Lainnya" />
                  Lainnya</label>
              </div>
            </div>

            <div class="control-group" id="div">
              <label for="normal" class="control-label">Tempat Lahir</label>
              <div class="controls">
                <input type="text" name="i_tempat" class="span8" required>
                <span class="help-inline" id="pesan"></span> <span class="help-inline" id="sisa"></span> </div>
            </div>

            <div class="control-group">
              <label for="normal" class="control-label">Tanggal Lahir</label>
              <div class="controls">
                <input type="date" name="i_tanggal" class="span8" required>
                <!-- <span class="help-block blue span8">(999) 999-9999</span> --> </div>
            </div>

            <div class="control-group">
              <label for="normal" class="control-label">Hari Lahir</label>
              <div class="controls">
                <select name="i_hari" required>
                  <option value="">--Pilih Hari--</option>
                  <option value="Senin">Senin</option>
                  <option value="Selasa">Selasa</option>
                  <option value="Rabu">Rabu</option>
                  <option value="Kamis">Kamis</option>
                  <option value="Jum'at">Jum'at</option>
                  <option value="Sabtu">Sabtu</option>
                  <option value="Minggu">Minggu</option>
                </select>
              </div>
            </div>

            <div class="control-group">
              <label for="normal" class="control-label">Pukul</label>
              <div class="controls">
                <input type="text" name="i_pukul" class="span8" required>
                <span class="help-block">Contoh : 19.20</span> </div>
            </div>

            <div class="control-group">
              <label class="control-label">Penolong Kelahiran</label>
              <div class="controls">
                <label>
                  <input type="radio" name="i_penolong" value="Dokter" required />
                  Dokter</label>
                <label>
                  <input type="radio" name="i_penolong" value="Bidan/Perawat" />
                  Bidan/Perawat</label>
                <label>
                  <input type="radio" name="i_penolong" value="Dukun" />
                  Dukun</label>
                <label>
                  <input type="radio" name="i_penolong" value="Lainnya" />
                  Lainnya</label>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Jenis Kelahiran</label>
              <div class="controls">
                <label>
                  <input type="radio" name="i_jkelahiran" value="Tunggal" required />
                  Tunggal</label>
                <label>
                  <input type="radio" name="i_jkelahiran" value="Kembar 2" />
                  Kembar 2</label>
                <label>
                  <input type="radio" name="i_jkelahiran" value="Kembar 3" />
                  Kembar 3</label>
                <label>
                  <input type="radio" name="i_jkelahiran" value="Kembar 4" />
                  Kembar 4</label>
                <label>
                  <input type="radio" name="i_jkelahiran" value="Lainnya" />
                  Lainnya</label>
              </div>
            </div>

            <div class="control-group">
              <label for="normal" class="control-label">Kelahiran Ke</label>
              <div class="controls">
                <input type="number" name="i_kelke" class="span8" required>
                <!-- <span class="help-block">Dalam Centimeter</span> --> </div>
            </div>

            <div class="control-group">
              <label for="normal" class="control-label">Berat Bayi</label>
              <div class="controls">
                <input type="number" name="i_berat" class="span8" required>
                <span class="help-block">Dalam Kilogram</span> </div>
            </div>

            <div class="control-group">
              <label for="normal" class="control-label">Panjang Bayi</label>
              <div class="controls">
                <input type="number" name="i_panjang" class="span8" required>
                <span class="help-block">Dalam Centimeter</span> </div>
            </div>

            <div class="control-group">
              <label class="control-label">Pilih Ayah</label>
              <div class="controls">
                <select name="i_nama" id="i_nama">
                  <option>--Pilih Ayah--</option>
                  <?php 
                  $querydusun = $dbconnect -> query("SELECT nik, no_kk, nama_lengkap FROM tb_penduduk where jk='Laki-Laki' and stat_hub_kel='Kepala Keluarga'");
                  while ($datadusun = $querydusun -> fetch_array()) {
                  ?>
                  <option value="<?php echo $datadusun['no_kk'].','.$datadusun['nik'] ?>"><?php echo $datadusun['nama_lengkap']." - NIK ".$datadusun['nik']?></option>
                  <?php } ?>
                </select>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Pilih Ibu</label>
              <div class="controls">
                <select name="i_pengikut" id="i_pengikut">
                  <option>--Pilih Ibu--</option>
                </select>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Pilih Saksi 1</label>
              <div class="controls">
                <select name="i_saksi1" id="i_saksi1" required>
                  <option>--Pilih Saksi 1--</option>
                  <?php 
                  $querypenduduk = $dbconnect -> query("SELECT * FROM tb_penduduk");
                  while ($datapenduduk = $querypenduduk -> fetch_array()) {
                  ?>
                  <option value="<?php echo $datapenduduk['nik'] ?>"><?php echo $datapenduduk['nama_lengkap']." - NIK ".$datapenduduk['nik'] ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Pilih Saksi 2</label>
              <div class="controls">
                <select name="i_saksi2" id="i_saksi2" required>
                  <option>--Pilih Saksi 2--</option>
                  <?php 
                  $querypenduduk = $dbconnect -> query("SELECT * FROM tb_penduduk");
                  while ($datapenduduk = $querypenduduk -> fetch_array()) {
                  ?>
                  <option value="<?php echo $datapenduduk['nik'] ?>"><?php echo $datapenduduk['nama_lengkap']." - NIK ".$datapenduduk['nik'] ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Pilih Pelapor</label>
              <div class="controls">
                <select name="i_pelapor" id="i_pelapor" required>
                  <option>--Pilih Pelapor--</option>
                  <?php 
                  $querypenduduk = $dbconnect -> query("SELECT * FROM tb_penduduk");
                  while ($datapenduduk = $querypenduduk -> fetch_array()) {
                  ?>
                  <option value="<?php echo $datapenduduk['nik'] ?>"><?php echo $datapenduduk['nama_lengkap']." - NIK ".$datapenduduk['nik'] ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>

            <div class="form-actions">
              <input type="submit" name="simpan" class="btn btn-success" value="Simpan">
            </div>
          </form>
          <?php 
          if (isset($_POST['simpan'])) {
            $Pisah = explode(",", $_POST['i_nama']);
            $NOKK = $Pisah[0];
            $NIK1 = $Pisah[1];
            $NamaBayi = addslashes($_POST['i_bayi']);
            $JK = addslashes($_POST['i_jenis']);
            $Tempat = addslashes($_POST['i_tempat']);
            $Tanggal = addslashes($_POST['i_tanggal']);
            $Hari = addslashes($_POST['i_hari']);
            $Pukul = addslashes($_POST['i_pukul']);
            $Lokasi = addslashes($_POST['i_lokasi']);
            $Penolong = addslashes($_POST['i_penolong']);
            $Jeniskel = addslashes($_POST['i_jkelahiran']);
            $Berat = addslashes($_POST['i_berat']);
            $Panjang = addslashes($_POST['i_panjang']);
            $KelahiranKe = addslashes($_POST['i_kelke']);
            $Ibu = addslashes($_POST['i_pengikut']);
            $TanggalLaporan = date("Y-m-d");
            $Saksi1 = addslashes($_POST['i_saksi1']);
            $Saksi2 = addslashes($_POST['i_saksi2']);
            $Pelapor = addslashes($_POST['i_pelapor']);

            $tanggal_lahir = explode("-", $Tanggal);
            $tgl = $tanggal_lahir[2];
            $bln = $tanggal_lahir[1];
            $thn = $tanggal_lahir[0];

            $NIKSementara = "KL-".$tgl.$bln.$thn.$Pukul;

            $querypenduduk = mysqli_query($dbconnect, "INSERT into tb_penduduk (nik, jk, tpt_lahir, tgl_lahir, nama_lengkap, ayah, ibu) VALUES ('".$NIKSementara."', '".$JK."', '".$Tempat."','".$Tanggal."','".$NamaBayi."','".$NIK1."','".$Ibu."')");
 
            $querybayi = mysqli_query($dbconnect, "INSERT into tb_kelahiran VALUES ('', '".$NIKSementara."', '".$Hari."', '".$Pukul."','".$Lokasi."','".$KelahiranKe."','".$Penolong."','".$Jeniskel."','".$Berat."','".$Panjang."', '".$TanggalLaporan."', '".$NIK1."', '".$Ibu."', '".$Saksi1."', '".$Saksi2."', '".$Pelapor."')");

            $querylayanan = $dbconnect->query("INSERT INTO tb_layanan (id_jenissurat, id_penduduk, keperluan, isi) VALUES ('4','$NIK1', '-', '-')");
            if ($querypenduduk && $querybayi && $querylayanan) {
              echo "<script type='text/javascript'>window.location.href='?page=kelahiran';</script>";
            }

           } ?>
        </div>
    </div>
  </div>
  <?php }elseif ($aksi=="edit") { ?>

  <hr>
  <div class="container-fluid">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Edit Data Kelahiran</h5>
          <a href="?page=kelahiran" class="label label-info btn btn-mini btn-info">Lihat Data</a>
        </div>
        <div class="widget-content">
          <?php  
          $kode = $_GET['kode'];
          $queryedit = $dbconnect -> query("SELECT * FROM tb_kelahiran inner join tb_penduduk on tb_kelahiran.nik=tb_penduduk.nik where tb_penduduk.nik='$kode'");
          while ($dataedit = $queryedit -> fetch_array()) {
          ?>
          <form action="" method="post" class="form-horizontal">

            <div class="control-group" id="div">
              <label for="normal" class="control-label">NIK SEmentara</label>
              <div class="controls">
                <input type="text" id="i_bayi" name="i_nik" value="<?php echo $dataedit['nik']; ?>" class="span8" readonly>
                <span class="help-block">Bisa Diedit Melalui Tombol Edit Kependudukan</span>
              </div>
            </div>

            <div class="control-group" id="div">
              <label for="normal" class="control-label">Nama Bayi</label>
              <div class="controls">
                <input type="text" id="i_bayi" name="i_bayi" value="<?php echo $dataedit['nama_lengkap']; ?>" class="span8" readonly>
                <span class="help-block">Bisa Diedit Melalui Tombol Edit Kependudukan</span>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Jenis Kelamin</label>
              <div class="controls">
                <input type="text" id="i_bayi" name="i_bayi" value="<?php echo $dataedit['jk']; ?>" class="span8" readonly>
                <span class="help-block">Bisa Diedit Melalui Tombol Edit Kependudukan</span>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Lokasi Kelahiran</label>
              <div class="controls">
                <label>
                  <input type="radio" name="i_lokasi" value="RS/RB" <?php $stat=$dataedit['lokasi_lahir']; if($stat=="RS/RB"){ echo "checked=\"checked\"";};?> required/>
                  RS/RB</label>
                <label>
                  <input type="radio" name="i_lokasi" value="Puskesmas" <?php $stat=$dataedit['lokasi_lahir']; if($stat=="Puskesmas"){ echo "checked=\"checked\"";};?>/>
                  Puskesmas</label>
                <label>
                  <input type="radio" name="i_lokasi" value="Polindes" <?php $stat=$dataedit['lokasi_lahir']; if($stat=="Polindes"){ echo "checked=\"checked\"";};?>/>
                  Polindes</label>
                <label>
                  <input type="radio" name="i_lokasi" value="Rumah" <?php $stat=$dataedit['lokasi_lahir']; if($stat=="Rumah"){ echo "checked=\"checked\"";};?>/>
                  Rumah</label>
                <label>
                  <input type="radio" name="i_lokasi" value="Lainnya" <?php $stat=$dataedit['lokasi_lahir']; if($stat=="Lainnya"){ echo "checked=\"checked\"";};?>/>
                  Lainnya</label>
              </div>
            </div>

            <div class="control-group" id="div">
              <label for="normal" class="control-label">Tempat Lahir</label>
              <div class="controls">
                <input type="text" name="i_tempat" class="span8" value="<?php echo $dataedit['tpt_lahir']; ?>" readonly>
                <span class="help-block">Bisa Diedit Melalui Tombol Edit Kependudukan</span>
              </div>
            </div>

            <div class="control-group">
              <label for="normal" class="control-label">Tanggal Lahir</label>
              <div class="controls">
                <input type="date" name="i_tanggal" class="span8" value="<?php echo $dataedit['tgl_lahir']; ?>" readonly>
                <span class="help-block">Bisa Diedit Melalui Tombol Edit Kependudukan</span>
              </div>
            </div>

            <div class="control-group">
              <label for="normal" class="control-label">Hari Lahir</label>
              <div class="controls">
                <select name="i_hari"sss>
                  <option value="<?php echo$dataedit['hari_lahir'] ?>"><?php echo$dataedit['hari_lahir'] ?></option>
                  <option value="Senin">Senin</option>
                  <option value="Selasa">Selasa</option>
                  <option value="Rabu">Rabu</option>
                  <option value="Kamis">Kamis</option>
                  <option value="Jum'at">Jum'at</option>
                  <option value="Sabtu">Sabtu</option>
                  <option value="Minggu">Minggu</option>
                </select>
                <!-- <span class="help-block">Bisa Diedit Melalui Tombol Edit Kependudukan</span> -->
              </div>
            </div>

            <div class="control-group">
              <label for="normal" class="control-label">Pukul</label>
              <div class="controls">
                <input type="text" name="i_pukul" class="span8" value="<?php echo $dataedit['pukul']; ?>" required>
                <span class="help-block">Contoh : 19.20</span> </div>
            </div>

            <div class="control-group">
              <label class="control-label">Penolong Kelahiran</label>
              <div class="controls">
                <label>
                  <input type="radio" name="i_penolong" value="Dokter" <?php $stat=$dataedit['penolong_kelahiran']; if($stat=="Dokter"){ echo "checked=\"checked\"";};?> required />
                  Dokter</label>
                <label>
                  <input type="radio" name="i_penolong" value="Bidan/Perawat" <?php $stat=$dataedit['penolong_kelahiran']; if($stat=="Bidan/Perawat"){ echo "checked=\"checked\"";};?> />
                  Bidan/Perawat</label>
                <label>
                  <input type="radio" name="i_penolong" value="Dukun" <?php $stat=$dataedit['penolong_kelahiran']; if($stat=="Dukun"){ echo "checked=\"checked\"";};?> />
                  Dukun</label>
                <label>
                  <input type="radio" name="i_penolong" value="Lainnya" <?php $stat=$dataedit['penolong_kelahiran']; if($stat=="Lainnya"){ echo "checked=\"checked\"";};?> />
                  Lainnya</label>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Jenis Kelahiran</label>
              <div class="controls">
                <label>
                  <input type="radio" name="i_jkelahiran" value="Tunggal" <?php $stat=$dataedit['jenis_kelahiran']; if($stat=="Tunggal"){ echo "checked=\"checked\"";};?> required />
                  Tunggal</label>
                <label>
                  <input type="radio" name="i_jkelahiran" value="Kembar 2" <?php $stat=$dataedit['jenis_kelahiran']; if($stat=="Kembar 2"){ echo "checked=\"checked\"";};?>/>
                  Kembar 2</label>
                <label>
                  <input type="radio" name="i_jkelahiran" value="Kembar 3" <?php $stat=$dataedit['jenis_kelahiran']; if($stat=="Kembar 3"){ echo "checked=\"checked\"";};?>/>
                  Kembar 3</label>
                <label>
                  <input type="radio" name="i_jkelahiran" value="Kembar 4" <?php $stat=$dataedit['jenis_kelahiran']; if($stat=="Kembar 4"){ echo "checked=\"checked\"";};?>/>
                  Kembar 4</label>
                <label>
                  <input type="radio" name="i_jkelahiran" value="Lainnya" <?php $stat=$dataedit['jenis_kelahiran']; if($stat=="Lainnya"){ echo "checked=\"checked\"";};?>/>
                  Lainnya</label>
              </div>
            </div>

            <div class="control-group">
              <label for="normal" class="control-label">Kelahiran Ke</label>
              <div class="controls">
                <input type="number" name="i_kelke" class="span8" value="<?php echo $dataedit['kelahiran_ke']; ?>"  required>
                <!-- <span class="help-block">Dalam Centimeter</span> --> </div>
            </div>

            <div class="control-group">
              <label for="normal" class="control-label">Berat Bayi</label>
              <div class="controls">
                <input type="number" name="i_berat" class="span8" value="<?php echo $dataedit['berat_bayi']; ?>"  required>
                <span class="help-block">Dalam Kilogram</span> </div>
            </div>

            <div class="control-group">
              <label for="normal" class="control-label">Panjang Bayi</label>
              <div class="controls">
                <input type="number" name="i_panjang" class="span8" value="<?php echo $dataedit['panjang_bayi']; ?>"  required>
                <span class="help-block">Dalam Centimeter</span> </div>
            </div>

            <div class="control-group" hidden>
              <label for="normal" class="control-label">ID Bayi</label>
              <div class="controls">
                <input type="number" name="i_id" class="span8" value="<?php echo $dataedit['id_kelahiran']; ?>"  required>
                <span class="help-block">Dalam Centimeter</span> </div>
            </div>

            <div class="control-group">
              <label class="control-label">Pilih Ayah</label>
              <div class="controls">
                <select name="i_nama" id="i_nama">
                  <option value="<?php echo $dataedit['ayah'] ?>"><?php echo $dataedit['ayah'] ?></option>
                  <option>--Pilih Ayah--</option>
                  <?php 
                  $querydusun = $dbconnect -> query("SELECT nik, no_kk, nama_lengkap FROM tb_penduduk");
                  while ($datadusun = $querydusun -> fetch_array()) {
                  ?>
                  <option value="<?php echo $datadusun['no_kk'].','.$datadusun['nik'] ?>"><?php echo $datadusun['nama_lengkap']." - NIK ".$datadusun['nik']?></option>
                  <?php } ?>
                </select>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Pilih Ibu</label>
              <div class="controls">
                <select name="i_pengikut" id="i_pengikut">
                  <option value="<?php echo $dataedit['ibu'] ?>"><?php echo $dataedit['ibu'] ?></option>
                  <option>--Pilih Ibu--</option>
                </select>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Pilih Saksi 1</label>
              <div class="controls">
                <select name="i_saksi1" required>
                  <option value="<?php echo $dataedit['nik_saksi1'] ?>"><?php echo $dataedit['nik_saksi1'] ?></option>
                  <?php 
                  $querypenduduk = $dbconnect -> query("SELECT * FROM tb_penduduk");
                  while ($datapenduduk = $querypenduduk -> fetch_array()) {
                  ?>
                  <option value="<?php echo $datapenduduk['nama_lengkap'] ?>"><?php echo $datapenduduk['nama_lengkap'] ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Pilih Saksi 2</label>
              <div class="controls">
                <select name="i_saksi2" required>
                  <option value="<?php echo $dataedit['nik_saksi2'] ?>"><?php echo $dataedit['nik_saksi2'] ?></option>
                  <?php 
                  $querypenduduk = $dbconnect -> query("SELECT * FROM tb_penduduk");
                  while ($datapenduduk = $querypenduduk -> fetch_array()) {
                  ?>
                  <option value="<?php echo $datapenduduk['nama_lengkap'] ?>"><?php echo $datapenduduk['nama_lengkap'] ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Pilih Pelapor</label>
              <div class="controls">
                <select name="i_pelapor" required>
                  <option value="<?php echo $dataedit['nik_pelapor'] ?>"><?php echo $dataedit['nik_pelapor'] ?></option>
                  <?php 
                  $querypenduduk = $dbconnect -> query("SELECT * FROM tb_penduduk where jk='Perempuan'");
                  while ($datapenduduk = $querypenduduk -> fetch_array()) {
                  ?>
                  <option value="<?php echo $datapenduduk['nama_lengkap'] ?>"><?php echo $datapenduduk['nama_lengkap'] ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>

            <div class="form-actions">
              <input type="submit" name="update" class="btn btn-success" value="Simpan">
            </div>
          </form>
          <?php }
          if (isset($_POST['update'])) {
            $kode = $_GET['kode'];
            // $NIK = addslashes($_POST['i_nik']);
            $ID = addslashes($_POST['i_id']);
            $NamaBayi = addslashes($_POST['i_bayi']);
            $JK = addslashes($_POST['i_jenis']);
            $Tempat = addslashes($_POST['i_tempat']);
            $Tanggal = addslashes($_POST['i_tanggal']);
            $Hari = addslashes($_POST['i_hari']);
            $Pukul = addslashes($_POST['i_pukul']);
            $Lokasi = addslashes($_POST['i_lokasi']);
            $Penolong = addslashes($_POST['i_penolong']);
            $Jeniskel = addslashes($_POST['i_jkelahiran']);
            $Berat = addslashes($_POST['i_berat']);
            $Panjang = addslashes($_POST['i_panjang']);
            $KelahiranKe = addslashes($_POST['i_kelke']);
            $Ayah = addslashes($_POST['i_ayah']);
            $Ibu = addslashes($_POST['i_ibu']);
            $TanggalLaporan = date("Y-m-d");
            $Saksi1 = addslashes($_POST['i_saksi1']);
            $Saksi2 = addslashes($_POST['i_saksi2']);
            $Pelapor = addslashes($_POST['i_pelapor']);

            $tanggal_lahir = explode("-", $Tanggal);
            $tgl = $tanggal_lahir[2];
            $bln = $tanggal_lahir[1];
            $thn = $tanggal_lahir[0];

            $query = mysqli_query($dbconnect, "UPDATE tb_kelahiran SET hari_lahir='$Hari', pukul='$Pukul', lokasi_lahir='$Lokasi', kelahiran_ke='$KelahiranKe', penolong_kelahiran='$Penolong', jenis_kelahiran='$Jeniskel', berat_bayi='$Berat', panjang_bayi='$Panjang' WHERE id_kelahiran = '$ID'");
            if ($query) {
              echo "<script type='text/javascript'>window.location.href='?page=kelahiran';</script>";
            }
           } ?>
        </div>
    </div>
  </div>
  <?php }else{ ?>
  <hr>
  <div class="container-fluid">
    <!-- <div class="row-fluid"> -->
      <!-- <div class="span12"> -->
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Data Kelahiran</h5>
            <a href="?page=kelahiran&&aksi=tambah" class="label label-info btn btn-mini btn-info">Tambah Data</a>
            <a href="#myModal" data-toggle="modal" class="label label-warning btn btn-mini btn-warning">Cetak</a>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>No</th>
                  <th>NIK Sementara</th>
                  <th>Nama Lengkap</th>
                  <th>Jenis Kelamin</th>
                  <th>Tempat Lahir</th>
                  <th>Tanggal Lahir</th>
                  <th>Penolong Kelahiran</th>
                  <th>Lokasi Lahir</th>
                  <th>Kelahiran Ke</th>
                  <th>Jenis Kelahiran</th>
                  <th>Berat Bayi</th>
                  <th>Panjang Bayi</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                $query = $dbconnect -> query("SELECT * FROM tb_kelahiran inner join tb_penduduk on tb_kelahiran.nik=tb_penduduk.nik order by tb_kelahiran.id_kelahiran DESC");
                while ($data = $query -> fetch_array()) {
                @$no++;
                ?>
                <tr class="gradeX">
                  <td style="text-align: center;"><?php echo $no; ?></td>
                  <td><?php echo $data['nik']; ?></td>
                  <td><?php echo $data['nama_lengkap']; ?></td>
                  <td><?php echo $data['jk']; ?></td>
                  <td><?php echo $data['tpt_lahir']; ?></td>
                  <td><?php echo $data['tgl_lahir']; ?></td>
                  <td><?php echo $data['penolong_kelahiran']; ?></td>
                  <td><?php echo $data['lokasi_lahir']; ?></td>
                  <td><?php echo $data['kelahiran_ke']; ?></td>
                  <td><?php echo $data['jenis_kelahiran']; ?></td>
                  <td><?php echo $data['berat_bayi']." KG"; ?></td>
                  <td><?php echo $data['panjang_bayi']." CM"; ?></td>

                  <td style="text-align: center;">
                    

                    <?php if ($data['no_kk'] == NULL) {?>
                    <a href="?page=kelahiran&&aksi=edit&&kode=<?php echo $data['nik'] ?>" class="btn btn-mini  btn-warning tip-bottom" title="Edit"><i class="icon icon-edit"></i></a>

                    <a href="?page=editkependudukan&&kode=<?php echo $data['nik'] ?>" class="btn btn-mini btn-info tip-bottom" title="Edit Kependudukan"><i class="icon icon-edit"></i></a>

                    <?php }else{ ?>
                    <a href="?page=penduduk&&aksi=detail&&kode=<?php echo $data['nik'] ?>" class="btn btn-mini btn-success tip-bottom" title="Detail"><i class="icon icon-credit-card"></i></a>
                    <?php } ?>
                  </td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      <!-- </div> -->
    <!-- </div> -->
  </div>
  <?php } ?>
  <div id="myModal" class="modal hide">
    <div class="modal-header">
      <button data-dismiss="modal" class="close" type="button">×</button>
      <h3>Cetak Data Kelahiran</h3>
    </div>
    <div class="modal-body">
      <form action="pdf/lap_kel.php" method="post" target="blank" class="form-horizontal">
        <div class="control-group">
          <label class="control-label">Tahun </label>
          <div class="controls">
            <input type="number" name="i_tahun" value="<?php echo date('Y'); ?>" />
          </div>
        </div>
        <div class="form-actions">
          <button type="submit" target="blank" class="btn btn-success">Cetak</button>
        </div>
      </form>
    </div>
  </div>

</div>
<script src="js/jquery.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
   $('#i_nama').change(function() { // Jika Select Box id kelas dipilih
     var Kode = $(this).val(); // Ciptakan variabel kelas
     $.ajax({
            type: 'POST', // Metode pengiriman data menggunakan POST
          url: 'prosesibu.php', // File yang akan memproses data
         data: 'id_nama=' + Kode, // Data yang akan dikirim ke file pemroses
         success: function(response) { // Jika berhasil
              $('#i_pengikut').html(response); // Berikan hasil ke id penugasan
            }
       });
    });
  });
</script>