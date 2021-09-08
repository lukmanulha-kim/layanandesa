<?php include 'koneksi.php'; ?>
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Data Penduduk</a> </div>
    <h1>Data Penduduk</h1>
  </div>
  <hr>
  <div class="container-fluid">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Edit Data Penduduk</h5>
          <a href="?page=penduduk" class="label label-info btn btn-mini btn-info">Lihat Data</a>
        </div>
        <div class="widget-content">
          <?php  
          $kode = $_GET['kode'];
          $dataedit = $dbconnect -> query("SELECT * FROM tb_penduduk where tb_penduduk.nik='$kode'")-> fetch_array();
          $databapak = $dbconnect -> query("SELECT * FROM tb_penduduk inner join tb_dusun on tb_penduduk.kode_dusun=tb_dusun.id_dusun inner join tb_rw on tb_penduduk.kode_rw=tb_rw.id_rw inner join tb_rt on tb_penduduk.kode_rt=tb_rt.id_rt where tb_penduduk.nik='$dataedit[ayah]'")-> fetch_array();
          $dataibu = $dbconnect -> query("SELECT * FROM tb_penduduk where tb_penduduk.nik='$dataedit[ibu]'")-> fetch_array();
          // while ($dataedit = $queryedit -> fetch_array()) {
          ?>
          <form action="" method="post" class="form-horizontal">

            <div class="control-group">
              <label for="normal" class="control-label">NIK</label>
              <div class="controls">
                <input type="text" name="i_nik" value="<?php echo $dataedit['nik']; ?>" required class="span8">
                <!-- <span class="help-block blue span8">(999) 999-9999</span> --> </div>
            </div>

            <div class="control-group">
              <label for="normal" class="control-label">No KK</label>
              <div class="controls">
                <input type="text" name="i_nokk" value="<?php echo $databapak['no_kk']; ?>" required class="span8">
                <!-- <span class="help-block blue span8">(999) 999-9999</span> --> </div>
            </div>

            <div class="control-group">
              <label for="normal" class="control-label">Nama Lengkap</label>
              <div class="controls">
                <input type="text" name="i_naleng" value="<?php echo $dataedit['nama_lengkap']; ?>" required class="span8">
                <!-- <span class="help-block blue span8">(999) 999-9999</span> --> </div>
            </div>

            <div class="control-group">
              <label for="normal" class="control-label">Alamat</label>
              <div class="controls">
                <textarea name="i_alamat" class="span8" required><?php echo $databapak['alamat']; ?></textarea>
                <!-- <span class="help-block blue span8">(999) 999-9999</span> --> </div>
            </div>

            <div class="control-group">
              <label class="control-label">Pilih Dusun</label>
              <div class="controls">
                <select name="i_dusun" id="i_dusun" required>
      					<option value="<?php echo $databapak['id_dusun'] ?>"><?php echo $databapak['nama_dusun'] ?></option>
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
                <select name="i_rw" id="i_rw" required>
      					<option value="<?php echo $databapak['id_rw'] ?>"><?php echo $databapak['no_rw'] ?></option>
      					<?php 
      					$queryrw = $dbconnect -> query("SELECT * FROM tb_rw");
      					while ($datarw = $queryrw -> fetch_array()) {
      					?>
      					<option value="<?php echo $datarw['id_rw'] ?>"><?php echo $datarw['no_rw'] ?></option>
      					<?php } ?>
      				</select>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Pilih RT</label>
              <div class="controls">
                <select name="i_rt" id="i_rt" required>
                  <option value="<?php echo $databapak['id_rt'] ?>"><?php echo $databapak['no_rt'] ?></option>
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
                  <input type="radio" name="i_jenis" value="Laki-Laki" <?php $stat=$dataedit['jk']; if($stat=="Laki-Laki"){ echo "checked=\"checked\"";};?> required/>
                  Laki-Laki</label>
                <label>
                  <input type="radio" name="i_jenis" value="Perempuan" <?php $stat=$dataedit['jk']; if($stat=="Perempuan"){ echo "checked=\"checked\"";};?> />
                  Perempuan</label>
              </div>
            </div>

            <div class="control-group">
              <label for="normal" class="control-label">Tempat Lahir</label>
              <div class="controls">
                <input type="text" name="i_tempat" class="span8" required value="<?php echo $dataedit['tpt_lahir'] ?>">
                <!-- <span class="help-block blue span8">(999) 999-9999</span> --> </div>
            </div>

            <div class="control-group">
              <label for="normal" class="control-label">Tanggal Lahir</label>
              <div class="controls">
                <input type="date" name="i_tanggal" class="span8" required value="<?php echo $dataedit['tgl_lahir'] ?>">
                <!-- <span class="help-block blue span8">(999) 999-9999</span> --> </div>
            </div>

            <div class="control-group">
              <label class="control-label">Pilih Golongan Darah</label>
              <div class="controls">
  	            <select name="i_goldar" required>
      					<option value="-">Pilih</option>
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
    	            <select name="i_agama" required>
          					<option value="">Silahkan Pilih</option>
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
                <select name="i_pend" required>
                  <option value="">Silahkan Pilih</option>
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
                <select name="i_pekerjaan" required>
      					<option value="">Silahkan Pilih</option>
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
                  <input type="radio" name="i_statkawin" value="Belum Menikah" <?php $stat=$dataedit['stat_kawin']; if($stat=="Belum Menikah"){ echo "checked=\"checked\"";};?> required/>
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
                  <input type="radio" name="i_statka" value="Kepala Keluarga" <?php $stat=$dataedit['stat_hub_kel']; if($stat=="Kepala Keluarga"){ echo "checked=\"checked\"";};?> required/>
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

            <div class="control-group">
              <label for="normal" class="control-label">Nama Ayah</label>
              <div class="controls">
                <input type="text" name="i_ayah" required value="<?php echo $databapak['nama_lengkap'] ?>" class="span8">
                <!-- <span class="help-block blue span8">(999) 999-9999</span> --> </div>
            </div>

            <div class="control-group">
              <label for="normal" class="control-label">Nama Ibu</label>
              <div class="controls">
                <input type="text" name="i_ibu" required value="<?php echo $dataibu['nama_lengkap'] ?>" class="span8">
                <!-- <span class="help-block blue span8">(999) 999-9999</span> --> </div>
            </div>

            <div class="form-actions">
              <input type="submit" name="update" class="btn btn-success" value="Simpan">
            </div>
          </form>
          <?php
          if (isset($_POST['update'])) {
      		  echo $NIK = addslashes($_POST['i_nik']);
            echo $NOKK = addslashes($_POST['i_nokk']);
            echo $NaLeng = addslashes($_POST['i_naleng']);
            echo $Alamat = addslashes($_POST['i_alamat']);
            echo $Dusun = addslashes($_POST['i_dusun']);
            echo $RT = addslashes($_POST['i_rt']);
            echo $RW = addslashes($_POST['i_rw']);
            echo $JK = addslashes($_POST['i_jenis']);
            echo $Tempat = addslashes($_POST['i_tempat']);
            echo $Tanggal = addslashes($_POST['i_tanggal']);
            echo $GolDar = addslashes($_POST['i_goldar']);
            echo $Agama = addslashes($_POST['i_agama']);
            echo $Pendidikan = addslashes($_POST['i_pend']);
            echo $Pekerjaan = addslashes($_POST['i_pekerjaan']);
            echo $Status = addslashes($_POST['i_statka']);
            echo $StatusKawin = addslashes($_POST['i_statkawin']);
            echo $NoPaspor = addslashes($_POST['i_nopaspor']);
            echo $TglPaspor = addslashes($_POST['i_tgpaspor']);
            echo $Ayah = addslashes($_POST['i_ayah']);
            echo $Ibu = addslashes($_POST['i_ibu']);
            echo $kode = $_GET['kode'];

            $query = mysqli_query($dbconnect, "UPDATE tb_penduduk SET nik = '$NIK', no_kk='$NOKK', nama_lengkap='$NaLeng', alamat='$Alamat', kode_dusun='$Dusun', kode_rt='$RT', kode_rw='$RW', jk='$JK', tpt_lahir='$Tempat', tgl_lahir='$Tanggal', goldar='$GolDar', agama='$Agama', pendidikan='$Pendidikan', pekerjaan='$Pekerjaan', stat_hub_kel='$Status', no_passpor='$NoPaspor', tgl_akhir_passpor='$TglPaspor', stat_kawin='$StatusKawin', ayah='$Ayah', ibu='$Ibu' WHERE nik = '$kode'");
            if ($query) {
              $queryeditkel = $dbconnect->query("UPDATE tb_kelahiran set nik = '$NIK' WHERE nik = '$kode'");
              if ($queryeditkel) {
      		 		 echo "<script type='text/javascript'>window.location.href='?page=penduduk';</script>";
              }
      		 	}
      		 } ?>
        </div>
  	</div>
  </div>
  </div>