<?php  ?>
<?php include 'koneksi.php'; ?>
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Data Perangkat</a> </div>
    <h1>Data Perangkat</h1>
  </div>
  <?php
    @$aksi = $_GET['aksi'];
    if ($aksi == "tambah") {
  ?>
  <hr>
  <div class="container-fluid">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Tambah Data Perangkat</h5>
          <a href="?page=perangkat" class="label label-info btn btn-mini btn-info">Lihat Data</a>
        </div>
        <div class="widget-content">
          <form action="" method="post" class="form-horizontal">
          	<div class="control-group">
              <label class="control-label">Pilih Perangkat</label>
              <div class="controls">
                <select name="i_nama" required>
      					<option value="">--Pilih Penduduk--</option>
      					<?php 
      					$querypenduduk = $dbconnect -> query("SELECT * FROM tb_penduduk");
      					while ($datapenduduk = $querypenduduk -> fetch_array()) {
      					?>
      					<option value="<?php echo $datapenduduk['nik'] ?>"><?php echo $datapenduduk['nama_lengkap']." - NIK ".$datapenduduk['nik']?></option>
      					<?php } ?>
      				</select>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Pilih Jabatan</label>
              <div class="controls">
                <select name="i_jabatan" required>
        					<option value="">--Pilih Jabatan--</option>
        					<?php 
        					$queryjabatan = $dbconnect -> query("SELECT * FROM tb_jabatan");
        					while ($datajabatan = $queryjabatan -> fetch_array()) {
        					?>
        					<option value="<?php echo $datajabatan['id_jabatan'] ?>"><?php echo $datajabatan['nama_jabatan'] ?></option>
        					<?php } ?>
        				</select>
              </div>
            </div>

            <div class="control-group">
              <label for="normal" class="control-label">Tanggal SK</label>
              <div class="controls">
                <input type="date" name="i_tgsk" class="span8 mask text" required>
                <!-- <span class="help-block blue span8">(999) 999-9999</span> --> </div>
            </div>

            <div class="control-group">
              <label for="normal" class="control-label">No. SK</label>
              <div class="controls">
                <input type="number" name="i_nosk" class="span8" required>
                <!-- <span class="help-block blue span8">(999) 999-9999</span> --> </div>
            </div>

            <div class="control-group">
              <label for="normal" class="control-label">Tanggal Berhenti</label>
              <div class="controls">
                <input type="date" name="i_tgberhenti" class="span8" required>
                <!-- <span class="help-block blue span8">(999) 999-9999</span> --> </div>
            </div>

            <div class="control-group">
              <label for="normal" class="control-label">Nama Pengguna</label>
              <div class="controls">
                <input type="text" name="i_user" class="span8" required>
                <!-- <span class="help-block blue span6">Digunakan Untuk Login Ke Sistem</span>--> </div>
            </div>

            <div class="control-group">
              <label for="normal" class="control-label">Password</label>
              <div class="controls">
                <input type="password" name="i_pass" class="span8" required>
                <!-- <span class="help-block blue span8">(999) 999-9999</span> --> </div>
            </div>

            <div class="form-actions">
              <input type="submit" name="simpan" class="btn btn-success" value="Simpan">
            </div>
          </form>
          <?php 
          if (isset($_POST['simpan'])) {
            $Nama = addslashes($_POST['i_nama']);
      		 	$Jabatan = addslashes($_POST['i_jabatan']);
      		 	$TgSK = addslashes($_POST['i_tgsk']);
            $TgBerhenti = addslashes($_POST['i_tgberhenti']);
      		 	$NoSK = addslashes($_POST['i_nosk']);
            $User = addslashes($_POST['i_user']);
            $Pass = md5(addslashes($_POST['i_pass']));

      		 	$query = mysqli_query($dbconnect, "INSERT into tb_perangkat VALUES ('', '".$Nama."','".$Jabatan."','".$TgSK."','".$NoSK."','".$TgBerhenti."','".$User."','".$Pass."')");
      		 	if ($query) {
      		 		echo "<script type='text/javascript'>window.location.href='?page=perangkat';</script>";
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
          <h5>Edit Data Jabatan</h5>
          <a href="?page=perangkat" class="label label-info btn btn-mini btn-info">Lihat Data</a>
        </div>
        <div class="widget-content nopadding">
          <?php  
          $kode = $_GET['kode'];
          $queryedit = $dbconnect -> query("SELECT * FROM tb_perangkat inner join tb_penduduk on tb_perangkat.id_penduduk=tb_penduduk.nik inner join tb_jabatan on tb_perangkat.id_jabatan=tb_jabatan.id_jabatan where tb_perangkat.id_perangkat=$kode");
          while ($dataedit = $queryedit -> fetch_array()) {
          ?>
          <form action="" method="post" class="form-horizontal">
            <div class="control-group hidden">
              <label for="normal" class="control-label">ID jabatan</label>
              <div class="controls">
                <input type="text" id="mask-phone" name="i_kodeperangkat" placeholder="Kode Jabatan" autofocus class="span8 mask text" value="<?php echo $dataedit['id_perangkat'] ?>">
                <!-- <span class="help-block blue span8">(999) 999-9999</span> --> </div>
            </div>

            <div class="control-group">
              <label class="control-label">Pilih Perangkat</label>
              <div class="controls">
                <select name="i_nama">
        					<option value="<?php echo $dataedit['nik'] ?>"><?php echo $dataedit['nama_lengkap'] ?></option>
        					<?php 
        					$querypenduduk = $dbconnect -> query("SELECT * FROM tb_penduduk");
        					while ($datapenduduk = $querypenduduk -> fetch_array()) {
        					?>
        					<option value="<?php echo $datapenduduk['nik'] ?>"><?php echo $datapenduduk['nama_lengkap'] ?></option>
        					<?php } ?>
        				</select>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Pilih Jabatan</label>
              <div class="controls">
                <select name="i_jabatan">
        					<option value="<?php echo $dataedit['id_jabatan'] ?>"><?php echo $dataedit['nama_jabatan'] ?></option>
        					<?php 
        					$queryjabatan = $dbconnect -> query("SELECT * FROM tb_jabatan");
        					while ($datajabatan = $queryjabatan -> fetch_array()) {
        					?>
        					<option value="<?php echo $datajabatan['id_jabatan'] ?>"><?php echo $datajabatan['nama_jabatan'] ?></option>
        					<?php } ?>
        				</select>
              </div>
            </div>

            <div class="control-group">
              <label for="normal" class="control-label">Tanggal SK</label>
              <div class="controls">
                <input type="date" name="i_tgsk" value="<?php echo $dataedit['tgl_sk'] ?>" class="span8">
                <!-- <span class="help-block blue span8">(999) 999-9999</span> --> </div>
            </div>

            <div class="control-group">
              <label for="normal" class="control-label">No. SK</label>
              <div class="controls">
                <input type="number" name="i_nosk" value="<?php echo $dataedit['no_sk'] ?>" class="span8">
                <!-- <span class="help-block blue span8">(999) 999-9999</span> --> </div>
            </div>

            <div class="control-group">
              <label for="normal" class="control-label">Tanggal Berhenti</label>
              <div class="controls">
                <input type="date" name="i_tgberhenti" value="<?php echo $dataedit['tgl_berhenti'] ?>" class="span8">
                <!-- <span class="help-block blue span8">(999) 999-9999</span> --> </div>
            </div>

            <div class="control-group">
              <label for="normal" class="control-label">Nama Pengguna</label>
              <div class="controls">
                <input type="text" name="i_user" value="<?php echo $dataedit['username'] ?>" class="span8">
                <!-- <span class="help-block blue span6">Digunakan Untuk Login Ke Sistem</span>--> </div>
            </div>

            <div class="control-group">
              <label for="normal" class="control-label">Password</label>
              <div class="controls">
                <input type="password" name="i_pass" placeholder="Password" class="span8">
                <span class="help-block">Tulis Ulang Password Anda</span> </div>
            </div>

            <div class="form-actions">
              <input type="submit" name="update" class="btn btn-success" value="Simpan">
            </div>
          </form>
          <?php }
          if (isset($_POST['update'])) {
            $Kode_Perangkat = ($_POST['i_kodeperangkat']);
      		 	$Nama = addslashes($_POST['i_nama']);
            $Jabatan = addslashes($_POST['i_jabatan']);
            $TgSK = addslashes($_POST['i_tgsk']);
            $TgBerhenti = addslashes($_POST['i_tgberhenti']);
            $NoSK = addslashes($_POST['i_nosk']);
            $User = addslashes($_POST['i_user']);
            $Pass = md5(addslashes($_POST['i_pass']));

      		 	$query = mysqli_query($dbconnect, "UPDATE tb_perangkat SET id_penduduk = '$Nama', id_jabatan = '$Jabatan', tgl_sk = '$TgSK', no_sk = '$NoSK' , tgl_berhenti = '$TgBerhenti', username = '$User', password = '$Pass' WHERE id_perangkat = '$Kode_Perangkat'");
      		 	if ($query) {
      		 		echo "<script type='text/javascript'>window.location.href='?page=perangkat';</script>";
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
            <h5>Data Perangkat</h5>
            <a href="?page=perangkat&&aksi=tambah" class="label label-info btn btn-mini btn-info">Tambah Data</a>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
	                <th>No</th>
        					<th>Nama</th>
        					<th>Jabatan</th>
        					<th>Tanggal Lahir</th>
        					<th>Pendidikan Terakhir</th>
        					<th>Tanggal SK</th>
        					<th>Nomor SK</th>
        					<th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                $query = $dbconnect -> query("SELECT * FROM
                                              tb_perangkat
                                              Inner Join tb_jabatan ON tb_jabatan.id_jabatan = tb_perangkat.id_jabatan
                                              Inner Join tb_penduduk ON tb_penduduk.nik = tb_perangkat.id_penduduk
                                              Inner Join tb_pendidikan ON tb_pendidikan.id_pendidikan = tb_penduduk.pendidikan");
                while ($data = $query -> fetch_array()) {
                @$no++;
                ?>
                <tr class="gradeX">
	                <td style="text-align: center;"><?php echo $no; ?></td>
        					<td><?php echo $data['nama_lengkap']; ?></td>
        					<td><?php echo $data['nama_jabatan']; ?></td>
        					<td><?php echo $data['tgl_lahir']; ?></td>
        					<td><?php echo $data['pendidikan']; ?></td>
        					<td><?php echo $data['tgl_sk']; ?></td>
        					<td><?php echo $data['no_sk']; ?></td>

                	<td style="text-align: center;"><a href="?page=perangkat&&aksi=edit&&kode=<?php echo $data['id_perangkat'] ?>" class="btn btn-mini btn-warning">Edit</a></td>
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

</div>