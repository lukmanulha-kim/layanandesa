<?php include 'koneksi.php'; ?>
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Data Kecamatan</a> </div>
    <h1>Data Kecamatan</h1>
  </div>
  <?php
    @$aksi = $_GET['aksi'];
    if ($aksi == "tambah") {
  ?>
  <hr>
  <div class="container-fluid">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Tambah Data Kecamatan</h5>
          <a href="?page=kec" class="label label-info btn btn-mini btn-info">Lihat Data</a>
        </div>
        <div class="widget-content">
          <form action="" method="post" class="form-horizontal">
            <div class="control-group">
              <label for="normal" class="control-label">Kecamatan</label>
              <div class="controls">
                <input type="text" id="mask-phone" name="i_kecamatan" placeholder="Kecamatan" required autofocus class="span8 mask text">
                <!-- <span class="help-block blue span8">(999) 999-9999</span> --> </div>
            </div>

            <div class="control-group">
              <label class="control-label">Pilih Kabupaten</label>
              <div class="controls">
                <select name="i_kab" required>
                  <option value="">--Pilih Kabupaten--</option>
                  <?php 
                  $queryrw = $dbconnect -> query("SELECT * FROM tb_Kabupaten");
                  while ($datarw = $queryrw -> fetch_array()) {
                  ?>
                  <option value="<?php echo $datarw['id_kabupaten'] ?>"><?php echo $datarw['kabupaten'] ?></option>
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
              $Kecamatan = addslashes($_POST['i_kecamatan']);
              $Kabupaten = addslashes($_POST['i_kab']);

              $cek = mysqli_query($dbconnect, "SELECT * FROM tb_kecamatan where id_kabupaten='$Kabupaten' AND kecamatan='$Kecamatan'");

              $cekquery = mysqli_num_rows($cek);

              if ($Kabupaten==NULL) {
                echo "<script type='text/javascript'>alert('Form Provinsi Tidak Boleh Kosong !.')</script>";
                echo "<script type='text/javascript'>history.go(-1)</script>";
              }elseif ($cekquery>0) {
                echo "<script type='text/javascript'>alert('Data Sudah Ada !.')</script>";
                echo "<script type='text/javascript'>history.go(-1)</script>";
              }else{
                $query = mysqli_query($dbconnect, "INSERT into tb_kecamatan VALUES ('', '".$Kabupaten."', '".$Kecamatan."')");
                if ($query) {
                  echo "<script type='text/javascript'>window.location.href='?page=kec';</script>";
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
          <a href="?page=kec" class="label label-info btn btn-mini btn-info">Lihat Data</a>
        </div>
        <div class="widget-content">
          <?php  
          $kode = $_GET['kode'];
          $queryedit = $dbconnect -> query("SELECT * FROM tb_kecamatan inner join tb_kabupaten on tb_kecamatan.id_kabupaten=tb_kabupaten.id_kabupaten where tb_kecamatan.id_kecamatan = $kode");
          while ($dataedit = $queryedit -> fetch_array()) {
          ?>
          <form action="" method="post" class="form-horizontal">
            <div class="control-group hidden">
              <label for="normal" class="control-label">ID RT</label>
              <div class="controls">
                <input type="text" id="mask-phone" name="i_kode" placeholder="Kode Dusun" autofocus class="span8 mask text" value="<?php echo $dataedit['id_kecamatan'] ?>">
                <!-- <span class="help-block blue span8">(999) 999-9999</span> --> </div>
            </div>

            <div class="control-group">
              <label for="normal" class="control-label">Kecamatan</label>
              <div class="controls">
                <input type="text" id="mask-phone" name="i_kecamatan" value="<?php echo $dataedit['kecamatan'] ?>" autofocus class="span8 mask text">
                <!-- <span class="help-block blue span8">(999) 999-9999</span> --> </div>
            </div>

            <div class="control-group">
              <label class="control-label">Pilih Kabupaten</label>
              <div class="controls">
                <select name="i_kab">
                  <option value="<?php echo $dataedit['id_kabupaten'] ?>"><?php echo $dataedit['kabupaten'] ?></option>
                  <?php 
                  $queryrw = $dbconnect -> query("SELECT * FROM tb_kabupaten");
                  while ($datarw = $queryrw -> fetch_array()) {
                  ?>
                  <option value="<?php echo $datarw['id_kabupaten'] ?>"><?php echo $datarw['kabupaten'] ?></option>
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
      		$Kecamatan = addslashes($_POST['i_kecamatan']);
            $Kabupaten = addslashes($_POST['i_kab']);
  		 	$query = mysqli_query($dbconnect, "UPDATE tb_kecamatan SET id_kabupaten='$Kabupaten', kecamatan = '$Kecamatan' WHERE id_kecamatan = '$Kode'");
  		 	if ($query) {
  		 		echo "<script type='text/javascript'>window.location.href='?page=kec';</script>";
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
            <h5>Data Kecamatan</h5>
            <a href="?page=kec&&aksi=tambah" class="label label-info btn btn-mini btn-info">Tambah Data</a>
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
                $query = $dbconnect -> query("SELECT * FROM tb_kecamatan inner join tb_kabupaten on tb_kecamatan.id_kabupaten=tb_kabupaten.id_kabupaten");
                while ($data = $query -> fetch_array()) {
                @$no++;
                ?>
                <tr class="gradeX">
                  <td style="text-align: center;"><?php echo $no;; ?></td>
                  <td><?php echo $data['kecamatan']; ?></td>
                  <td><?php echo $data['kabupaten']; ?></td>
                  <td style="text-align: center;"><a href="?page=kec&&aksi=edit&&kode=<?php echo $data['id_kecamatan'] ?>" class="btn btn-mini btn-warning">Edit</a></td>
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