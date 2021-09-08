<?php include 'koneksi.php'; ?>
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Data RW</a> </div>
    <h1>Data RW</h1>
  </div>
  <?php
    @$aksi = $_GET['aksi'];
    if ($aksi == "tambah") {
  ?>
  <hr>
  <div class="container-fluid">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Tambah Data RW</h5>
          <a href="?page=rw" class="label label-info btn btn-mini btn-info">Lihat Data</a>
        </div>
        <div class="widget-content">
          <form action="" method="post" class="form-horizontal">
            <div class="control-group">
              <label for="normal" class="control-label">Nomor RW</label>
              <div class="controls">
                <input type="text" id="mask-phone" name="i_rw" placeholder="Nomor RW" autofocus required class="span8 mask text">
                <!-- <span class="help-block blue span8">(999) 999-9999</span> --> </div>
            </div>

            <div class="control-group">
              <label class="control-label">Pilih Dusun</label>
              <div class="controls">
                <select name="i_dusun" required>
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
            <div class="form-actions">
              <input type="submit" name="simpan" class="btn btn-success" value="Simpan">
            </div>
          </form>
          <?php 
	          if (isset($_POST['simpan'])) { 
	          	$RW = addslashes($_POST['i_rw']);
              $Dusun = addslashes($_POST['i_dusun']);

              $cek = mysqli_query($dbconnect, "SELECT * FROM tb_rw where id_dusun='$Dusun' AND no_rw='$RW'");

              $cekquery = mysqli_num_rows($cek);

              if ($Dusun==NULL) {
                echo "<script type='text/javascript'>alert('Form Provinsi Tidak Boleh Kosong !.')</script>";
                echo "<script type='text/javascript'>history.go(-1)</script>";
              }elseif ($cekquery>0) {
                echo "<script type='text/javascript'>alert('Data Sudah Ada !.')</script>";
                echo "<script type='text/javascript'>history.go(-1)</script>";
              }else{
      				 	$query = mysqli_query($dbconnect, "INSERT into tb_rw VALUES ('', '".$Dusun."', '".$RW."')");
      				 	if ($query) {
      				 		echo "<script type='text/javascript'>window.location.href='?page=rw';</script>";
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
          <a href="?page=rw" class="label label-info btn btn-mini btn-info">Lihat Data</a>
        </div>
        <div class="widget-content">
          <?php  
          $kode = $_GET['kode'];
          $queryedit = $dbconnect -> query("SELECT * FROM tb_rw inner join tb_dusun on tb_rw.id_dusun=tb_dusun.id_dusun where tb_rw.id_rw = $kode");
          while ($dataedit = $queryedit -> fetch_array()) {
          ?>
          <form action="" method="post" class="form-horizontal">
            <div class="control-group hidden">
              <label for="normal" class="control-label">ID Rw</label>
              <div class="controls">
                <input type="text" id="mask-phone" name="i_koderw" placeholder="Kode Dusun" autofocus class="span8 mask text" value="<?php echo $dataedit['id_rw'] ?>">
                <!-- <span class="help-block blue span8">(999) 999-9999</span> --> </div>
            </div>

            <div class="control-group">
              <label for="normal" class="control-label">Nomor RW</label>
              <div class="controls">
                <input type="text" id="mask-phone" name="i_rw" value="<?php echo $dataedit['no_rw'] ?>" autofocus class="span8 mask text">
                <!-- <span class="help-block blue span8">(999) 999-9999</span> --> </div>
            </div>

            <div class="control-group">
              <label class="control-label">Pilih Dusun</label>
              <div class="controls">
                <select name="i_dusun">
                  <option value="<?php echo $dataedit['id_dusun'] ?>"><?php echo $dataedit['nama_dusun'] ?></option>
                  <?php 
                  $querydusun = $dbconnect -> query("SELECT * FROM tb_dusun");
                  while ($datadusun = $querydusun -> fetch_array()) {
                  ?>
                  <option value="<?php echo $datadusun['id_dusun'] ?>"><?php echo $datadusun['nama_dusun'] ?></option>
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
            $Kode_RW = ($_POST['i_koderw']);
      		 	$RW = addslashes($_POST['i_rw']);
            $Dusun = addslashes($_POST['i_dusun']);

    			 	$query = mysqli_query($dbconnect, "UPDATE tb_rw SET id_dusun='$Dusun', no_rw = '$RW' WHERE id_rw = '$Kode_RW'");
    			 	if ($query) {
    			 		echo "<script type='text/javascript'>window.location.href='?page=rw';</script>";
    			 	}
    			}
      	?>
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
            <h5>Data RW</h5>
            <a href="?page=rw&&aksi=tambah" class="label label-info btn btn-mini btn-info">Tambah Data</a>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>No</th>
                  <th>RW</th>
                  <th>Dalam Dusun</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                $query = $dbconnect -> query("SELECT * FROM tb_rw inner join tb_dusun on tb_rw.id_dusun=tb_dusun.id_dusun order by tb_rw.id_rw ASC");
                while ($data = $query -> fetch_array()) {
                @$no++;
                ?>
                <tr class="gradeX">
                  <td style="text-align: center;"><?php echo $no;; ?></td>
                  <td><?php echo $data['no_rw']; ?></td>
                  <td><?php echo $data['nama_dusun']; ?></td>
                  <td style="text-align: center;"><a href="?page=rw&&aksi=edit&&kode=<?php echo $data['id_rw'] ?>" class="btn btn-mini btn-warning">Edit</a></td>
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