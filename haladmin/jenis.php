<?php include 'koneksi.php'; ?>
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Data Surat / Formulir</a> </div>
    <h1>Data Surat / Formulir</h1>
  </div>
  <?php
    @$aksi = $_GET['aksi'];
    if ($aksi == "tambah") {
  ?>
  <hr>
  <div class="container-fluid">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Tambah Data Surat / Formulir</h5>
          <a href="?page=jenis" class="label label-info btn btn-mini btn-info">Lihat Data</a>
        </div>
        <div class="widget-content">
          <form action="" method="post" class="form-horizontal">
            <div class="control-group">
              <label for="normal" class="control-label">Nama Surat / Formulir</label>
              <div class="controls">
                <input type="text" id="mask-phone" name="i_surat" placeholder="Nama Surat / Formulir" required autofocus class="span8 mask text">
                <!-- <span class="help-block blue span8">(999) 999-9999</span> --> </div>
            </div>

            <div class="control-group">
              <label for="normal" class="control-label">Nomor Surat / Kode Formulir</label>
              <div class="controls">
                <input type="text" id="mask-phone" name="i_nomor" placeholder="Nomor Surat / Kode Formulir" required class="span8 mask text">
                <!-- <span class="help-block blue span8">(999) 999-9999</span> --> </div>
            </div>

            <div class="control-group">
              <label class="control-label">Jenis</label>
              <div class="controls">
                <label>
                  <input type="radio" name="i_jenis" value="Administrasi" required />
                  Administrasi</label>
                <label>
                  <input type="radio" name="i_jenis" value="Formulir" required />
                  Formulir</label>
              </div>
            </div>

            <div class="form-actions">
              <input type="submit" name="simpan" class="btn btn-success" value="Simpan">
            </div>
          </form>
          <?php 
          if (isset($_POST['simpan'])) {
            $Nama_Surat = addslashes($_POST['i_surat']);
      		 	$Nomor_Surat = addslashes($_POST['i_nomor']);
      		 	$Jenis = addslashes($_POST['i_jenis']);

            $cek = mysqli_query($dbconnect, "SELECT * FROM tb_jenissurat where nama_surat='$Nama_Surat' AND jenis='$Jenis'");

            $cekquery = mysqli_num_rows($cek);

            if($cekquery>0) {
              echo "<script type='text/javascript'>alert('Data Sudah Ada !.')</script>";
              echo "<script type='text/javascript'>history.go(-1)</script>";
            }else{
        		 	$query = mysqli_query($dbconnect, "INSERT into tb_jenissurat VALUES ('', '".$Nama_Surat."','".$Nomor_Surat."', '".$Jenis."')");
        		 	if ($query) {
        		 		echo "<script type='text/javascript'>window.location.href='?page=jenis';</script>";
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
          <h5>Edit Data Jabatan</h5>
          <a href="?page=jenis" class="label label-info btn btn-mini btn-info">Lihat Data</a>
        </div>
        <div class="widget-content">
          <?php  
          $kode = $_GET['kode'];
          $queryedit = $dbconnect -> query("SELECT * FROM tb_jenissurat where id_jenis = $kode");
          while ($dataedit = $queryedit -> fetch_array()) {
          ?>
          <form action="" method="post" class="form-horizontal">
            <div class="control-group hidden">
              <label for="normal" class="control-label">ID Surat / Formulir</label>
              <div class="controls">
                <input type="text" id="mask-phone" name="i_kodejenis" value="<?php echo $dataedit['id_jenis'] ?>" autofocus class="span8 mask text">
                <!-- <span class="help-block blue span8">(999) 999-9999</span> --> </div>
            </div>

            <div class="control-group">
              <label for="normal" class="control-label">Nama Surat / Formulir</label>
              <div class="controls">
                <input type="text" id="mask-phone" name="i_surat" value="<?php echo $dataedit['nama_surat'] ?>"  class="span8 mask text">
                <!-- <span class="help-block blue span8">(999) 999-9999</span> --> </div>
            </div>

            <div class="control-group">
              <label for="normal" class="control-label">Nomor Surat / Kode Formulir</label>
              <div class="controls">
                <input type="text" id="mask-phone" name="i_nomor" value="<?php echo $dataedit['nomor_kode'] ?>" class="span8 mask text">
                <!-- <span class="help-block blue span8">(999) 999-9999</span> --> </div>
            </div>

            <div class="control-group">
              <label class="control-label">Jenis</label>
              <div class="controls">
                <label>
                  <input type="radio" name="i_jenis" value="Administrasi" <?php $stat=$dataedit['jenis']; if($stat=="Administrasi"){ echo "checked=\"checked\"";};?>/>
                  Administrasi</label>
                <label>
                  <input type="radio" name="i_jenis" value="Formulir" <?php $stat=$dataedit['jenis']; if($stat=="Formulir"){ echo "checked=\"checked\"";};?>/>
                  Formulir</label>
              </div>
            </div>

            <div class="form-actions">
              <input type="submit" name="update" class="btn btn-success" value="Simpan">
            </div>
          </form>
          <?php }
          if (isset($_POST['update'])) {
            $Kode_Surat = ($_POST['i_kodejenis']);
		 	$Nama_Surat = addslashes($_POST['i_surat']);
		 	$Nomor_Surat = addslashes($_POST['i_nomor']);
		 	$Jenis = addslashes($_POST['i_jenis']);
		 	$query = mysqli_query($dbconnect, "UPDATE tb_jenissurat SET nama_surat = '$Nama_Surat', nomor_kode = '$Nomor_Surat', jenis = '$Jenis' WHERE id_jenis = '$Kode_Surat'");
		 	if ($query) {
		 		echo "<script type='text/javascript'>window.location.href='?page=jenis';</script>";
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
            <h5>Data Dusun</h5>
            <a href="?page=jenis&&aksi=tambah" class="label label-info btn btn-mini btn-info">Tambah Data</a>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Surat / Formulir</th>
                  <th>Nomor Surat / Kode Formulir</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                $query = $dbconnect -> query("SELECT * FROM tb_jenissurat");
                while ($data = $query -> fetch_array()) {
                @$no++;
                ?>
                <tr class="gradeX">
                  <td style="text-align: center;"><?php echo $no;; ?></td>
                  <td><?php echo $data['nama_surat']; ?></td>
  				        <td><?php echo $data['nomor_kode']; ?></td>
                  <td style="text-align: center;"><a href="?page=jenis&&aksi=edit&&kode=<?php echo $data['id_jenis'] ?>" class="btn btn-mini btn-warning">Edit</a></td>
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