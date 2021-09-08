<?php include 'koneksi.php'; ?>
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Data Penduduk</a> </div>
    <h1>Data Penduduk</h1>
  </div>
  <?php
    @$aksi = $_GET['aksi'];
    if ($aksi == "tambah") {
  ?>
  <hr>
  <div class="container-fluid">
    <div class="widget-box">
      <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
        <h5>Tambah Data Penduduk</h5>
        <a href="?page=penduduk" class="label label-info btn btn-mini btn-info">Lihat Data</a>
      </div>
      <div class="widget-content nopadding">
        <form action="" method="post" name="forminput" class="form-horizontal">
          
          <div class="control-group" id="div">
            <label for="normal" class="control-label">NIK</label>
            <div class="controls">
              <input type="number" id="i_nik" name="i_nik" class="span8" onkeyup="HitungNIK()" required>
              <span class="help-inline" id="pesan"></span> <span class="help-inline" id="sisa"></span> </div>
          </div>

          <div class="control-group">
            <label for="normal" class="control-label">No KK</label>
            <div class="controls">
              <input type="number" name="i_nokk" class="span8" onkeyup="HitungNOKK()" required>
              <span class="help-inline" id="sisakk"></span> </div>
          </div>

          <div class="control-group">
            <label for="normal" class="control-label">Nama Lengkap</label>
            <div class="controls">
              <input type="text" name="i_naleng" class="span8" required>
              <!-- <span class="help-block blue span8">(999) 999-9999</span> --> </div>
          </div>

          <div class="control-group">
            <label for="normal" class="control-label">Alamat</label>
            <div class="controls">
              <textarea name="i_alamat" class="span8" >Pecalongan</textarea>
              <!-- <span class="help-block blue span8">(999) 999-9999</span> --> </div>
          </div>

          <div class="control-group">
            <label class="control-label">Pilih Dusun</label>
            <div class="controls">
              <select name="i_dusun" id="i_dusun">
      					<option>--Pilih Dusun--</option>
      					<?php 
      					$querydusun = $dbconnect -> query("SELECT * FROM tb_dusun");
      					while ($datadusun = $querydusun -> fetch_array()) {
      					?>
      					<option value="<?php echo $datadusun['id_dusun'] ?>"><?php echo $datadusun['nama_dusun'] ?></option>
      					<?php } ?>
      				</select>
            </div>
          </div>

          <div class="control-group">
            <label class="control-label">Pilih RW</label>
            <div class="controls">
              <select name="i_rw" id="i_rw">
      					<option>--Pilih RW--</option>
      				</select>
            </div>
          </div>

          <div class="control-group">
            <label class="control-label">Pilih RT</label>
            <div class="controls">
              <select name="i_rt" id="i_rt">
                <option>--Pilih RT--</option>
              </select>
            </div>
          </div>

          <div class="control-group">
            <label class="control-label">Jenis Kelamin</label>
            <div class="controls">
              <label>
                <input type="radio" name="i_jenis" value="Laki-Laki" />
                Laki-Laki</label>
              <label>
                <input type="radio" name="i_jenis" value="Perempuan" />
                Perempuan</label>
            </div>
          </div>

          <div class="control-group">
            <label for="normal" class="control-label">Tempat Lahir</label>
            <div class="controls">
              <input type="text" name="i_tempat" class="span8">
              <!-- <span class="help-block blue span8">(999) 999-9999</span> --> </div>
          </div>

          <div class="control-group">
            <label for="normal" class="control-label">Tanggal Lahir</label>
            <div class="controls">
              <input type="date" name="i_tanggal" class="span8">
              <!-- <span class="help-block blue span8">(999) 999-9999</span> --> </div>
          </div>

          <div class="control-group">
            <label class="control-label">Pilih Golongan Darah</label>
              <div class="controls">
  	            <select name="i_goldar">
        					<option value="-">Pilih Golongan Darah</option>
        					<option value="A">A</option>
        					<option value="B">B</option>
        					<option value="AB">AB</option>
        					<option value="O">O</option>
        				</select>
    			  </div>
          </div>

    			<div class="control-group">
            <label class="control-label">Pilih Agama</label>
              <div class="controls">
                <select name="i_agama">
        					<option >Pilih Agama</option>
        					<option value="Islam">Islam</option>
        					<option value="Kristen">Kristen</option>
        					<option value="Budha">Budha</option>
        					<option value="Protestan">Protestan</option>
        					<option value="Konghuchu">Konghuchu</option>
        					<option value="Lain-Lain">Lain-Lain</option>
        				</select>
      			  </div>
    			</div>

          <div class="control-group">
            <label class="control-label">Pilih Pendidikan</label>
            <div class="controls">
              <select name="i_pend">
                <option>--Pilih Pendidikan--</option>
                <?php 
                $querypendidikan = $dbconnect -> query("SELECT * FROM tb_pendidikan");
                while ($datapendidikan = $querypendidikan -> fetch_array()) {
                ?>
                <option value="<?php echo $datapendidikan['id_pendidikan'] ?>"><?php echo $datapendidikan['pendidikan'] ?></option>
                <?php } ?>
              </select>
            </div>
          </div>

			     <div class="control-group">
              <label class="control-label">Pilih Pekerjaan</label>
              <div class="controls">
                <select name="i_pekerjaan">
        					<option>--Pilih Pekerjaan--</option>
        					<?php 
        					$querypekerjaan = $dbconnect -> query("SELECT * FROM tb_pekerjaan");
        					while ($datapekerjaan = $querypekerjaan -> fetch_array()) {
        					?>
        					<option value="<?php echo $datapekerjaan['id_pekerjaan'] ?>"><?php echo $datapekerjaan['nama_pekerjaan'] ?></option>
        					<?php } ?>
        				</select>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Status Kawin</label>
              <div class="controls">
                <label>
                  <input type="radio" name="i_statkawin" value="Belum Menikah" />
                  Belum Menikah</label>
                <label>
                  <input type="radio" name="i_statkawin" value="Menikah" />
                  Menikah</label>
                <label>
                  <input type="radio" name="i_statkawin" value="Cerai" />
                  Cerai</label>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Status Hub Keluarga</label>
              <div class="controls">
                <label>
                  <input type="radio" name="i_statka" value="Kepala Keluarga" />
                  Kepala Keluarga</label>
                <label>
                  <input type="radio" name="i_statka" value="Istri" />
                  Istri</label>
                <label>
                  <input type="radio" name="i_statka" value="Anak" />
                  Anak</label>
              </div>
            </div>

            <div class="control-group">
              <label for="normal" class="control-label">No Paspor</label>
              <div class="controls">
                <input type="text" name="i_nopaspor" class="span8">
                <!-- <span class="help-block blue span8">(999) 999-9999</span> --> </div>
            </div>

            <div class="control-group">
              <label for="normal" class="control-label">Tgl Akhir Paspor</label>
              <div class="controls">
                <input type="date" name="i_tgpaspor" class="span8">
                <!-- <span class="help-block blue span8">(999) 999-9999</span> --> </div>
            </div>

            <div class="control-group">
              <label for="normal" class="control-label">Nama Ayah</label>
              <div class="controls">
                <input type="text" name="i_ayah" class="span8">
                <!-- <span class="help-block blue span8">(999) 999-9999</span> --> </div>
            </div>

            <div class="control-group">
              <label for="normal" class="control-label">Nama Ibu</label>
              <div class="controls">
                <input type="text" name="i_ibu" class="span8">
                <!-- <span class="help-block blue span8">(999) 999-9999</span> --> </div>
            </div>

            <div class="form-actions">
              <input type="submit" name="simpan" class="btn btn-success" value="Simpan">
            </div>
        </form>
        <?php 
        if (isset($_POST['simpan'])) {
          $JumlahNIK = strlen($_POST['i_nik']);
          $JumlahKK = strlen($_POST['i_nokk']);
          $NIK = addslashes($_POST['i_nik']);
          $NOKK = addslashes($_POST['i_nokk']);
    		 	$NaLeng = addslashes($_POST['i_naleng']);
    		 	$Alamat = addslashes($_POST['i_alamat']);
    		 	$Dusun = addslashes($_POST['i_dusun']);
    		 	$RT = addslashes($_POST['i_rt']);
    		 	$RW = addslashes($_POST['i_rw']);
    		 	$JK = addslashes($_POST['i_jenis']);
    		 	$Tempat = addslashes($_POST['i_tempat']);
    		 	$Tanggal = addslashes($_POST['i_tanggal']);
    		 	$GolDar = addslashes($_POST['i_goldar']);
    		 	$Agama = addslashes($_POST['i_agama']);
    		 	$Pendidikan = addslashes($_POST['i_pend']);
    		 	$Pekerjaan = addslashes($_POST['i_pekerjaan']);
    		 	$Status = addslashes($_POST['i_statka']);
          $StatusKawin = addslashes($_POST['i_statkawin']);
          $NoPaspor = addslashes($_POST['i_nopaspor']);
          $TglPaspor = addslashes($_POST['i_tgpaspor']);
          $Ayah = addslashes($_POST['i_ayah']);
          $Ibu = addslashes($_POST['i_ibu']);

          $cek = mysqli_query($dbconnect, "SELECT nik FROM tb_penduduk where nik='$NIK'");

          $cekquery = mysqli_num_rows($cek);

          if ($JumlahNIK<16 || $JumlahNIK>16 || $JumlahKK<16 || $JumlahKK>16) {
            echo "<script type='text/javascript'>window.alert('Nomor NIK Anda Kurang Atau Bahkan Lebih !.');</script>";
          }elseif($cekquery>0){
            echo "<script type='text/javascript'>alert('Data Sudah Ada !.')</script>";
            echo "<script type='text/javascript'>history.go(-1)</script>";
          }else{
      	 	 	$query = mysqli_query($dbconnect, "INSERT into tb_penduduk VALUES ('".$NIK."', '".$NOKK."', '".$NaLeng."', '".$Alamat."', '".$Dusun."', '".$RT."', '".$RW."', '".$JK."', '".$Tempat."', '".$Tanggal."', '".$GolDar."', '".$Agama."', '".$Pendidikan."', '".$Pekerjaan."', '".$StatusKawin."', '".$Status."', '".$NoPaspor."', '".$TglPaspor."','".$Ayah."','".$Ibu."')");
      		 	if ($query) {
      		 		echo "<script type='text/javascript'>window.location.href='?page=penduduk';</script>";
      		 	}
          }

    		 } ?>
      </div>
    </div>
  </div>
  <?php }elseif ($aksi=="edit") {?>
  <hr>
  <div class="container-fluid">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Edit Data Penduduk</h5>
          <a href="?page=penduduk" class="label label-info btn btn-mini btn-info">Lihat Data</a>
        </div>
        <div class="widget-content nopadding">
          <?php  
          $kode = $_GET['kode'];
          $queryedit = $dbconnect -> query("SELECT * FROM tb_penduduk inner join tb_dusun on tb_penduduk.kode_dusun=tb_dusun.id_dusun inner join tb_rt on tb_penduduk.kode_rt=tb_rt.id_rt inner join tb_rw on tb_penduduk.kode_rw=tb_rw.id_rw inner join tb_pekerjaan on tb_penduduk.pekerjaan=tb_pekerjaan.id_pekerjaan inner join tb_pendidikan on tb_penduduk.pendidikan=tb_pendidikan.id_pendidikan  where tb_penduduk.nik=$kode");
          while ($dataedit = $queryedit -> fetch_array()) {
          ?>
          <form action="" method="post" class="form-horizontal">

            <div class="control-group">
              <label for="normal" class="control-label">NIK</label>
              <div class="controls">
                <input type="text" name="i_nik" value="<?php echo $dataedit['nik']; ?>" class="span8">
                <!-- <span class="help-block blue span8">(999) 999-9999</span> --> </div>
            </div>

            <div class="control-group">
              <label for="normal" class="control-label">No KK</label>
              <div class="controls">
                <input type="text" name="i_nokk" value="<?php echo $dataedit['no_kk']; ?>" class="span8">
                <!-- <span class="help-block blue span8">(999) 999-9999</span> --> </div>
            </div>

            <div class="control-group">
              <label for="normal" class="control-label">Nama Lengkap</label>
              <div class="controls">
                <input type="text" name="i_naleng" value="<?php echo $dataedit['nama_lengkap']; ?>" class="span8">
                <!-- <span class="help-block blue span8">(999) 999-9999</span> --> </div>
            </div>

            <div class="control-group">
              <label for="normal" class="control-label">Alamat</label>
              <div class="controls">
                <textarea name="i_alamat" class="span8" ><?php echo $dataedit['alamat']; ?></textarea>
                <!-- <span class="help-block blue span8">(999) 999-9999</span> --> </div>
            </div>

            <div class="control-group">
              <label class="control-label">Pilih Dusun</label>
              <div class="controls">
                <select name="i_dusun" id="i_dusun">
        					<option value="<?php echo $dataedit['id_dusun']; ?>"><?php echo $dataedit['nama_dusun']; ?></option>
        					<?php 
        					$querydusun = $dbconnect -> query("SELECT * FROM tb_dusun");
        					while ($datadusun = $querydusun -> fetch_array()) {
        					?>
        					<option value="<?php echo $datadusun['id_dusun'] ?>"><?php echo $datadusun['nama_dusun'] ?></option>
        					<?php } ?>
        				</select>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Pilih RW</label>
              <div class="controls">
                <select name="i_rw" id="i_rw">
          					<option value="<?php echo $dataedit['id_rw']; ?>"><?php echo $dataedit['no_rw']; ?></option>
          					<?php 
          					// $queryrw = $dbconnect -> query("SELECT * FROM tb_rw");
          					// while ($datarw = $queryrw -> fetch_array()) {
          					?>
          					<!-- <option value="<?php echo $datarw['id_rw'] ?>"><?php echo $datarw['no_rw'] ?></option> -->
          					<?php #} ?>
          				</select>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Pilih RT</label>
              <div class="controls">
                <select name="i_rt" id="i_rt">
                  <option value="<?php echo $dataedit['id_rt']; ?>"><?php echo $dataedit['no_rt']; ?></option>
                  <?php 
                  $queryrt = $dbconnect -> query("SELECT * FROM tb_rt");
                  while ($datart = $queryrt -> fetch_array()) {
                  ?>
                  <option value="<?php echo $datart['id_rt'] ?>"><?php echo $datart['no_rt'] ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Jenis Kelamin</label>
              <div class="controls">
                <label>
                  <input type="radio" name="i_jenis" value="Laki-Laki" <?php $stat=$dataedit['jk']; if($stat=="Laki-Laki"){ echo "checked=\"checked\"";};?> />
                  Laki-Laki</label>
                <label>
                  <input type="radio" name="i_jenis" value="Perempuan" <?php $stat=$dataedit['jk']; if($stat=="Perempuan"){ echo "checked=\"checked\"";};?> />
                  Perempuan</label>
              </div>
            </div>

            <div class="control-group">
              <label for="normal" class="control-label">Tempat Lahir</label>
              <div class="controls">
                <input type="text" name="i_tempat" class="span8" value="<?php echo $dataedit['tpt_lahir'] ?>">
                <!-- <span class="help-block blue span8">(999) 999-9999</span> --> </div>
            </div>

            <div class="control-group">
              <label for="normal" class="control-label">Tanggal Lahir</label>
              <div class="controls">
                <input type="date" name="i_tanggal" class="span8" value="<?php echo $dataedit['tgl_lahir'] ?>">
                <!-- <span class="help-block blue span8">(999) 999-9999</span> --> </div>
            </div>

            <div class="control-group">
              <label class="control-label">Pilih Golongan Darah</label>
              <div class="controls">
  	            <select name="i_goldar">
        					<option value="<?php echo $dataedit['goldar'] ?>"><?php echo $dataedit['goldar'] ?></option>
        					<option value="A">A</option>
        					<option value="B">B</option>
        					<option value="AB">AB</option>
        					<option value="O">O</option>
        				</select>
      			  </div>
      			</div>

            <div class="control-group">
              <label class="control-label">Pilih Agama</label>
                <div class="controls">
    	            <select name="i_agama">
          					<option value="<?php echo $dataedit['agama'] ?>"><?php echo $dataedit['agama'] ?></option>
          					<option value="Islam">Islam</option>
          					<option value="Kristen">Kristen</option>
          					<option value="Budha">Budha</option>
          					<option value="Protestan">Protestan</option>
          					<option value="Konghuchu">Konghuchu</option>
          					<option value="Lain-Lain">Lain-Lain</option>
        				</select>
      			  </div>
      			</div>

            <div class="control-group">
            <label class="control-label">Pilih Pendidikan</label>
              <div class="controls">
                <select name="i_pend">
                  <option value="<?php echo $dataedit['id_pendidikan'] ?>"><?php echo $dataedit['pendidikan'] ?></option>
                  <?php 
                  $querypendidikan = $dbconnect -> query("SELECT * FROM tb_pendidikan");
                  while ($datapendidikan = $querypendidikan -> fetch_array()) {
                  ?>
                  <option value="<?php echo $datapendidikan['id_pendidikan'] ?>"><?php echo $datapendidikan['pendidikan'] ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Pilih Pekerjaan</label>
              <div class="controls">
                <select name="i_pekerjaan">
        					<option value="<?php echo $dataedit['id_pekerjaan'] ?>"><?php echo $dataedit['nama_pekerjaan'] ?></option>
        					<?php 
        					$querypekerjaan = $dbconnect -> query("SELECT * FROM tb_pekerjaan");
        					while ($datapekerjaan = $querypekerjaan -> fetch_array()) {
        					?>
        					<option value="<?php echo $datapekerjaan['id_pekerjaan'] ?>"><?php echo $datapekerjaan['nama_pekerjaan'] ?></option>
        					<?php } ?>
        				</select>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Status Kawin</label>
              <div class="controls">
                <label>
                  <input type="radio" name="i_statkawin" value="Belum Menikah" <?php $stat=$dataedit['stat_kawin']; if($stat=="Belum Menikah"){ echo "checked=\"checked\"";};?> />
                  Belum Menikah</label>
                <label>
                  <input type="radio" name="i_statkawin" value="Menikah" <?php $stat=$dataedit['stat_kawin']; if($stat=="Menikah"){ echo "checked=\"checked\"";};?>/>
                  Menikah</label>
                <label>
                  <input type="radio" name="i_statkawin" value="Cerai" <?php $stat=$dataedit['stat_kawin']; if($stat=="Cerai"){ echo "checked=\"checked\"";};?>/>
                  Cerai</label>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Status Hub Keluarga</label>
              <div class="controls">
                <label>
                  <input type="radio" name="i_statka" value="Kepala Keluarga" <?php $stat=$dataedit['stat_hub_kel']; if($stat=="Kepala Keluarga"){ echo "checked=\"checked\"";};?> />
                  Kepala Keluarga</label>
                <label>
                  <input type="radio" name="i_statka" value="Istri" <?php $stat=$dataedit['stat_hub_kel']; if($stat=="Istri"){ echo "checked=\"checked\"";};?>/>
                  Istri</label>
                <label>
                  <input type="radio" name="i_statka" value="Anak" <?php $stat=$dataedit['stat_hub_kel']; if($stat=="Anak"){ echo "checked=\"checked\"";};?>/>
                  Anak</label>
              </div>
            </div>

            <div class="control-group">
              <label for="normal" class="control-label">No Paspor</label>
              <div class="controls">
                <input type="text" name="i_nopaspor" value="<?php echo $dataedit['no_passpor'] ?>" class="span8">
                <!-- <span class="help-block blue span8">(999) 999-9999</span> --> </div>
            </div>

            <div class="control-group">
              <label for="normal" class="control-label">Tgl Akhir Paspor</label>
              <div class="controls">
                <input type="date" name="i_tgpaspor" value="<?php echo $dataedit['tgl_akhir_passpor'] ?>" class="span8">
                <!-- <span class="help-block blue span8">(999) 999-9999</span> --> </div>
            </div>

            <div class="form-actions">
              <input type="submit" name="update" class="btn btn-success" value="Simpan">
            </div>
          </form>
          <?php }
          if (isset($_POST['update'])) {
      		 	$NIK = addslashes($_POST['i_nik']);
            $NOKK = addslashes($_POST['i_nokk']);
            $NaLeng = addslashes($_POST['i_naleng']);
            $Alamat = addslashes($_POST['i_alamat']);
            $Dusun = addslashes($_POST['i_dusun']);
            $RT = addslashes($_POST['i_rt']);
            $RW = addslashes($_POST['i_rw']);
            $JK = addslashes($_POST['i_jenis']);
            $Tempat = addslashes($_POST['i_tempat']);
            $Tanggal = addslashes($_POST['i_tanggal']);
            $GolDar = addslashes($_POST['i_goldar']);
            $Agama = addslashes($_POST['i_agama']);
            $Pendidikan = addslashes($_POST['i_pend']);
            $Pekerjaan = addslashes($_POST['i_pekerjaan']);
            $Status = addslashes($_POST['i_statka']);
            $StatusKawin = addslashes($_POST['i_statkawin']);
            $NoPaspor = addslashes($_POST['i_nopaspor']);
            $TglPaspor = addslashes($_POST['i_tgpaspor']);

      		 	$query = mysqli_query($dbconnect, "UPDATE tb_penduduk SET nik = '$NIK', no_kk='$NOKK', nama_lengkap='$NaLeng', alamat='$Alamat', kode_dusun='$Dusun', kode_rt='$RT', kode_rw='$RW', jk='$JK', tpt_lahir='$Tempat', tgl_lahir='$Tanggal', goldar='$GolDar', agama='$Agama', pendidikan='$Pendidikan', pekerjaan='$Pekerjaan', stat_hub_kel='$Status', no_passpor='$NoPaspor', tgl_akhir_passpor='$TglPaspor', stat_kawin='$StatusKawin' WHERE nik = '$NIK'");
      		 	if ($query) {
      		 		echo "<script type='text/javascript'>window.location.href='?page=penduduk';</script>";
      		 	}
      		 } ?>
        </div>
  </div>
  </div>
  <?php }elseif ($aksi=="detail") {?>
  <hr>
  <div class="container-fluid">
    <div class="widget-box">
      <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
        <h5>Data Penduduk</h5>
        <!-- <a href="?page=penduduk&&aksi=tambah" class="label label-info btn btn-mini btn-info">Tambah Data</a> -->
        <a href="?page=penduduk" class="label label-info btn btn-mini btn-info">Lihat Data</a>
      </div>
      <?php  
      $kode = $_GET['kode'];
      $data = $dbconnect -> query("SELECT * FROM tb_penduduk inner join tb_dusun on tb_penduduk.kode_dusun=tb_dusun.id_dusun inner join tb_rt on tb_penduduk.kode_rt=tb_rt.id_rt inner join tb_rw on tb_penduduk.kode_rw=tb_rw.id_rw inner join tb_pekerjaan on tb_penduduk.pekerjaan=tb_pekerjaan.id_pekerjaan inner join tb_pendidikan on tb_penduduk.pendidikan = tb_pendidikan.id_pendidikan where tb_penduduk.nik=$kode")->fetch_array();
      ?>
      <div class="widget-content nopadding">
        <table class="table table-bordered data-table">
          <tr>
              <th>NIK</th>
              <td><?php echo $data['nik'] ?></td>
          </tr>
          <tr>
              <th>Nomor KK</th>
              <td><?php echo $data['no_kk']; ?></td>
          </tr>
          <tr>
              <th>Nama</th>
              <td><?php echo $data['nama_lengkap'] ?></td>
          </tr>
          <tr>
              <th>Alamat</th>
              <td>Desa <?php echo $data['alamat']." RT ".$data['no_rt']." RW ".$data['no_rw']." Kecamatan Sukosari Kabupaten Bondowoso."; ?></td>
          </tr>
          <tr>
              <th>Tempat Lahir</th>
              <td><?php echo $data['tpt_lahir'] ?></td>
          </tr>
          <tr>
              <th>Tanggal Lahir</th>
              <td><?php echo $data['tgl_lahir'] ?></td>
          </tr>
          <tr>
              <th>Jenis Kelamin</th>
              <td><?php echo $data['jk'] ?></td>
          </tr>
          <tr>
              <th>Golongan Darah</th>
              <td><?php echo $data['goldar'] ?></td>
          </tr>
          <tr>
              <th>Agama</th>
              <td><?php echo $data['agama'] ?></td>
          </tr>
          <tr>
              <th>Pendidikan</th>
              <td><?php echo $data['pendidikan'] ?></td>
          </tr>
          <tr>
              <th>Pekerjaan</th>
              <td><?php echo $data['nama_pekerjaan'] ?></td>
          </tr>
          <tr>
              <th>Status Kawin</th>
              <td><?php echo $data['stat_kawin'] ?></td>
          </tr>
          <tr>
              <th>SHDK</th>
              <td><?php echo $data['stat_hub_kel'] ?></td>
          </tr>
        </table>
      </div>
    </div>
  </div>
  <?php }else{ ?>
  <hr>
  <div class="container-fluid">
    <div class="widget-box">
      <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
        <h5>Data Penduduk</h5>
        <a href="?page=pencarian" class="label label-warning btn btn-mini btn-warning">Pencarian</a>
      </div>
      <div class="widget-content nopadding">
        <table class="table table-bordered data-table">
          <thead>
            <tr>
              	<th>No</th>
      					<th>NIK-No KK</th>
      					<th>Nama Lengkap</th>
      					<th>Alamat</th>
      					<th>JK</th>
      					<th>Agama</th>
                <th>Ket</th>               
      		      <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            $query = $dbconnect -> query("SELECT * FROM tb_penduduk inner join tb_dusun on tb_penduduk.kode_dusun=tb_dusun.id_dusun inner join tb_rt on tb_penduduk.kode_rt=tb_rt.id_rt inner join tb_rw on tb_penduduk.kode_rw=tb_rw.id_rw inner join tb_pekerjaan on tb_penduduk.pekerjaan=tb_pekerjaan.id_pekerjaan inner join tb_pendidikan on tb_penduduk.pendidikan = tb_pendidikan.id_pendidikan");
            while ($data = $query -> fetch_array()) {
            @$no++;
            $cek2 = $dbconnect->query("SELECT nik_penduduk FROM tb_mutasi_keluar");
            while ($data1=$cek2->fetch_array()) {
              $DataNIK = $data1['nik_penduduk'];
            }
            $cek3 = $dbconnect->query("SELECT nik FROM tb_pengikut_keluar");
            while ($data2=$cek3->fetch_array()) {
              $DataNIK2 = $data2['nik'];
            }
            if ($data['nik']==$DataNIK) {
              $Ket = "Pindah";
            }else{
              $Ket = "-";
            }
            ?>
            <tr class="gradeX">
              <td style="text-align: center;"><?php echo $no; ?></td>
      				<td>NIK : <?php echo $data['nik']." <br> No KK : ".$data['no_kk']; ?></td>
      				<td><?php echo $data['nama_lengkap']; ?></td>
      				<td><?php echo $data['alamat']; ?></td>
      				<td><?php echo $data['jk']; ?></td>
      				<td><?php echo $data['agama']; ?></td>
              <td style="text-align: center;"><?php echo $Ket; ?></td>

            	<td style="text-align: center;">
                  <a href="?page=penduduk&&aksi=detail&&kode=<?php echo $data['nik'] ?>" class="btn btn-mini btn-info">Detail</a>
              </td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <?php }  ?>
</div>
<div id="myModal" class="modal hide">
  <div class="modal-header">
    <button data-dismiss="modal" class="close" type="button">×</button>
    <h3>Pop up Header</h3>
  </div>
  <div class="modal-body">
    <p>Here is the text coming you can put also image if you want…</p>
  </div>
</div>
<script src="js/jquery.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $('#i_nik').blur(function(){
      $('#pesan').html('<img style="width:25px" src="img/loading.gif">');
      var username = $(this).val();

      $.ajax({
        type  : 'POST',
        url   : 'proses.php',
        data  : 'username='+username,
        success : function(data){
          $('#pesan').html(data);
        }
      })

    });
  });
  $(document).ready(function() {
   $('#i_dusun').change(function() { // Jika Select Box id kelas dipilih
     var Kode = $(this).val(); // Ciptakan variabel kelas
     $.ajax({
            type: 'POST', // Metode pengiriman data menggunakan POST
          url: 'prosesdusun.php', // File yang akan memproses data
         data: 'id_dusun=' + Kode, // Data yang akan dikirim ke file pemroses
         success: function(response) { // Jika berhasil
              $('#i_rw').html(response); // Berikan hasil ke id penugasan
            }
       });
    });
  });
  $(document).ready(function() {
   $('#i_rw').change(function() { // Jika Select Box id kelas dipilih
     var KodeRW = $(this).val(); // Ciptakan variabel kelas
     $.ajax({
            type: 'POST', // Metode pengiriman data menggunakan POST
          url: 'prosesrw.php', // File yang akan memproses data
         data: 'id_rw=' + KodeRW, // Data yang akan dikirim ke file pemroses
         success: function(response) { // Jika berhasil
              $('#i_rt').html(response); // Berikan hasil ke id penugasan
            }
       });
    });
  });
  function HitungNIK() {
    var nik = document.forminput.i_nik.value.length;
    var seharusnya = 16;
    var jumlah = seharusnya-nik;
    var sisa = document.getElementById('sisa');
    if (nik==16) {sisa.innerHTML = ' '};
    if (nik>16) {
      sisa.innerHTML = 'Tidak Boleh Lebih Dari 16 digit, Jumlah '+nik;
      document.getElementById('i_nik').required;
    };
    if (nik<16) {sisa.innerHTML = 'Tidak Boleh Kurang Dari 16 digit, Sisa '+jumlah;};
  }

  function HitungNOKK () {
    var nokk = document.forminput.i_nokk.value.length;
    var seharusnya = 16;
    var jumlah = seharusnya-nokk;
    var sisa = document.getElementById('sisakk');
    if (nokk==16) {sisa.innerHTML = ' '};
    if (nokk>16) {sisa.innerHTML = 'Tidak Boleh Lebih Dari 16 digit, Jumlah '+nokk;};
    if (nokk<16) {sisa.innerHTML = 'Tidak Boleh Kurang Dari 16 digit, Sisa '+jumlah;};
  }
</script>