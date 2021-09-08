<?php include 'koneksi.php'; ?>
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Data Dusun</a> </div>
    <h1>Data Pekerjaan</h1>
  </div>
  <?php
    @$aksi = $_GET['aksi'];
    if ($aksi == "tambah") {
  ?>
  <hr>
  <div class="container-fluid">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Tambah Data Pekerjaan</h5>
          <a href="?page=pekerjaan" class="label label-info btn btn-mini btn-info">Lihat Data</a>
        </div>
        <div class="widget-content">
          <form action="" method="post" class="form-horizontal">
            <div class="control-group">
              <label for="normal" class="control-label">Nama Pekerjaan</label>
              <div class="controls">
                <input type="text" id="mask-phone" name="i_pekerjaan" placeholder="Nama Pekerjaan" autofocus required class="span8 mask text">
                <!-- <span class="help-block blue span8">(999) 999-9999</span> --> </div>
            </div>
            <div class="form-actions">
              <input type="submit" name="simpan" class="btn btn-success" value="Simpan">
            </div>
          </form>
          <?php 
          if (isset($_POST['simpan'])) {
            $Nama_Pekerjaan = addslashes($_POST['i_pekerjaan']);

            $cek = mysqli_query($dbconnect, "SELECT * FROM tb_pekerjaan where nama_pekerjaan='$Nama_Pekerjaan'");

            $cekquery = mysqli_num_rows($cek);

            if($cekquery>0) {
              echo "<script type='text/javascript'>alert('Data Sudah Ada !.')</script>";
              echo "<script type='text/javascript'>history.go(-1)</script>";
            }else{
        		 	$query = mysqli_query($dbconnect, "INSERT into tb_pekerjaan VALUES ('', '".$Nama_Pekerjaan."')");
        		 	if ($query) {
        		 		echo "<script type='text/javascript'>window.location.href='?page=pekerjaan';</script>";
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
          <h5>Edit Data Pekerjaan</h5>
          <a href="?page=pekerjaan" class="label label-info btn btn-mini btn-info">Lihat Data</a>
        </div>
        <div class="widget-content">
          <?php  
          $kode = $_GET['kode'];
          $queryedit = $dbconnect -> query("SELECT * FROM tb_pekerjaan where id_pekerjaan = $kode");
          while ($dataedit = $queryedit -> fetch_array()) {
          ?>
          <form action="" method="post" class="form-horizontal">
            <div class="control-group hidden">
              <label for="normal" class="control-label">ID Pekerjaan</label>
              <div class="controls">
                <input type="text" id="mask-phone" name="i_kodepekerjaan" placeholder="Kode Pekerjaan" autofocus class="span8 mask text" value="<?php echo $dataedit['id_pekerjaan'] ?>">
                <!-- <span class="help-block blue span8">(999) 999-9999</span> --> </div>
            </div>

            <div class="control-group">
              <label for="normal" class="control-label">Nama Pekerjaan</label>
              <div class="controls">
                <input type="text" id="mask-phone" name="i_pekerjaan" placeholder="Nama Dusun" autofocus class="span8 mask text" value="<?php echo $dataedit['nama_pekerjaan'] ?>">
                <!-- <span class="help-block blue span8">(999) 999-9999</span> --> </div>
            </div>
            <div class="form-actions">
              <input type="submit" name="update" class="btn btn-success" value="Simpan">
            </div>
          </form>
          <?php }
          if (isset($_POST['update'])) {
            $Kode_Pekerjaan = ($_POST['i_kodepekerjaan']);
      		 	$Nama_Pekerjaan = addslashes($_POST['i_pekerjaan']);
      		 	$query = mysqli_query($dbconnect, "UPDATE tb_pekerjaan SET nama_pekerjaan = '$Nama_Pekerjaan' WHERE id_pekerjaan = '$Kode_Pekerjaan'");
      		 	if ($query) {
      		 		echo "<script type='text/javascript'>window.location.href='?page=pekerjaan';</script>";
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
            <h5>Data Pekerjaan</h5>
            <a href="?page=pekerjaan&&aksi=tambah" class="label label-info btn btn-mini btn-info">Tambah Data</a>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Pekerjaan</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                $query = $dbconnect -> query("SELECT * FROM tb_pekerjaan");
                while ($data = $query -> fetch_array()) {
                @$no++;
                ?>
                <tr class="gradeX">
                  <td style="text-align: center;"><?php echo $no;; ?></td>
                  <td><?php echo $data['nama_pekerjaan']; ?></td>
                  <td style="text-align: center;"><a href="?page=pekerjaan&&aksi=edit&&kode=<?php echo $data['id_pekerjaan'] ?>" class="btn btn-mini btn-warning">Edit</a></td>
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