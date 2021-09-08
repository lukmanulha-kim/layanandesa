<?php include 'koneksi.php'; ?>
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Data Kabupaten</a> </div>
    <h1>Data Kabupaten</h1>
  </div>
  <?php
    @$aksi = $_GET['aksi'];
    if ($aksi == "tambah") {
  ?>
  <hr>
  <div class="container-fluid">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Tambah Data Kabupaten</h5>
          <a href="?page=kab" class="label label-info btn btn-mini btn-info">Lihat Data</a>
        </div>
        <div class="widget-content">
          <form action="" method="post" class="form-horizontal">
            <div class="control-group">
              <label for="normal" class="control-label">Kabupaten</label>
              <div class="controls">
                <input type="text" id="mask-phone" id="i_kabupaten" name="i_kabupaten" placeholder="Kabupaten" required autofocus class="span8 mask text">
                <!-- <span class="help-block blue span8">(999) 999-9999</span> --> </div>
            </div>

            <div class="control-group">
              <label class="control-label">Pilih Provinsi</label>
              <div class="controls">
                <select name="i_prov" id="i_provinsi"  required>
                  <option value="">--Pilih Provinsi--</option>
                  <?php 
                  $queryrw = $dbconnect -> query("SELECT * FROM tb_provinsi");
                  while ($datarw = $queryrw -> fetch_array()) {
                  ?>
                  <option value="<?php echo $datarw['id_provinsi'] ?>"><?php echo $datarw['provinsi'] ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="form-actions">
              <input type="submit" name="simpan" class="btn btn-success" value="Simpan">
              <input type="reset" name="reset" class="btn btn-danger" value="Reset">
            </div>
          </form>
          <?php 
	          if (isset($_POST['simpan'])) { 
              $Kabupaten = addslashes($_POST['i_kabupaten']);
              $Provinsi = addslashes($_POST['i_prov']);

              $cek = mysqli_query($dbconnect, "SELECT * FROM tb_kabupaten where id_provinsi='$Provinsi' AND kabupaten='$Kabupaten'");

              $cekquery = mysqli_num_rows($cek);

              if ($Provinsi==NULL) {
                echo "<script type='text/javascript'>alert('Form Provinsi Tidak Boleh Kosong !.')</script>";
                echo "<script type='text/javascript'>history.go(-1)</script>";
              }elseif ($cekquery>0) {
                echo "<script type='text/javascript'>alert('Data Sudah Ada !.')</script>";
                echo "<script type='text/javascript'>history.go(-1)</script>";
              }else{
                $query = mysqli_query($dbconnect, "INSERT into tb_kabupaten VALUES ('', '".$Provinsi."', '".$Kabupaten."')");
                if ($query) {
                 echo "<script type='text/javascript'>window.location.href='?page=kab';</script>";
                }
              }
    				}
    		  ?>
        </div>
  </div>
  </div>
  <?php }elseif ($aksi=="edit") {?>
  <hr>
  <div class="container-fluid">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Edit Data Dusun</h5>
          <a href="?page=kab" class="label label-info btn btn-mini btn-info">Lihat Data</a>
        </div>
        <div class="widget-content">
          <?php  
          $kode = $_GET['kode'];
          $queryedit = $dbconnect -> query("SELECT * FROM tb_kabupaten inner join tb_provinsi on tb_kabupaten.id_provinsi=tb_provinsi.id_provinsi where tb_kabupaten.id_kabupaten = $kode");
          while ($dataedit = $queryedit -> fetch_array()) {
          ?>
          <form action="" method="post" class="form-horizontal">
            <div class="control-group hidden">
              <label for="normal" class="control-label">ID RT</label>
              <div class="controls">
                <input type="text" id="mask-phone" name="i_kode" placeholder="Kode Dusun" autofocus class="span8 mask text" value="<?php echo $dataedit['id_kabupaten'] ?>">
                <!-- <span class="help-block blue span8">(999) 999-9999</span> --> </div>
            </div>

            <div class="control-group">
              <label for="normal" class="control-label">Kabupaten</label>
              <div class="controls">
                <input type="text" id="mask-phone" name="i_kabupaten" value="<?php echo $dataedit['kabupaten'] ?>" autofocus class="span8 mask text">
                <!-- <span class="help-block blue span8">(999) 999-9999</span> --> </div>
            </div>

            <div class="control-group">
              <label class="control-label">Pilih Provinsi</label>
              <div class="controls">
                <select name="i_prov">
                  <option value="<?php echo $dataedit['id_provinsi'] ?>"><?php echo $dataedit['provinsi'] ?></option>
                  <?php 
                  $queryrw = $dbconnect -> query("SELECT * FROM tb_provinsi");
                  while ($datarw = $queryrw -> fetch_array()) {
                  ?>
                  <option value="<?php echo $datarw['id_provinsi'] ?>"><?php echo $datarw['provinsi'] ?></option>
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
            $Kode = ($_POST['i_kode']);
      		$Kabupaten = addslashes($_POST['i_kabupaten']);
            $Provinsi = addslashes($_POST['i_prov']);
      		 	$query = mysqli_query($dbconnect, "UPDATE tb_kabupaten SET id_provinsi='$Provinsi', kabupaten = '$Kabupaten' WHERE id_kabupaten = '$Kode'");
      		 	if ($query) {
      		 		echo "<script type='text/javascript'>window.location.href='?page=kab';</script>";
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
            <h5>Data RT</h5>
            <a href="?page=kab&&aksi=tambah" class="label label-info btn btn-mini btn-info">Tambah Data</a>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Kabupaten</th>
                  <th>Provinsi</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                $query = $dbconnect -> query("SELECT * FROM tb_kabupaten inner join tb_provinsi on tb_kabupaten.id_provinsi=tb_provinsi.id_provinsi");
                while ($data = $query -> fetch_array()) {
                @$no++;
                ?>
                <tr class="gradeX">
                  <td style="text-align: center;"><?php echo $no;; ?></td>
                  <td><?php echo $data['kabupaten']; ?></td>
                  <td><?php echo $data['provinsi']; ?></td>
                  <td style="text-align: center;"><a href="?page=kab&&aksi=edit&&kode=<?php echo $data['id_kabupaten'] ?>" class="btn btn-mini btn-warning">Edit</a></td>
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