<?php include 'koneksi.php'; ?>
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Data RT</a> </div>
    <h1>Data RT</h1>
  </div>
  <?php
    @$aksi = $_GET['aksi'];
    if ($aksi == "tambah") {
  ?>
  <hr>
  <div class="container-fluid">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Tambah Data RT</h5>
          <a href="?page=rt" class="label label-info btn btn-mini btn-info">Lihat Data</a>
        </div>
        <div class="widget-content">
          <form action="" method="post" class="form-horizontal">
            <div class="control-group">
              <label for="normal" class="control-label">Nomor RT</label>
              <div class="controls">
                <input type="text" id="mask-phone" name="i_rt" placeholder="Nomor RT" autofocus class="span8 mask text" required>
                <!-- <span class="help-block blue span8">(999) 999-9999</span> --> </div>
            </div>

            <div class="control-group">
              <label class="control-label">Pilih RW</label>
              <div class="controls">
                <select name="i_rw" required>
                  <option value="">--Pilih RW--</option>
                  <?php 
                  $queryrw = $dbconnect -> query("SELECT * FROM tb_rw");
                  while ($datarw = $queryrw -> fetch_array()) {
                  ?>
                  <option value="<?php echo $datarw['id_rw'] ?>"><?php echo $datarw['no_rw'] ?></option>
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
	          	$RT = addslashes($_POST['i_rt']);
              $RW = addslashes($_POST['i_rw']);

              $cek = mysqli_query($dbconnect, "SELECT * FROM tb_rt where id_rw='$RW' AND no_rt='$RT'");

              $cekquery = mysqli_num_rows($cek);

              if ($RW==NULL) {
                echo "<script type='text/javascript'>alert('Form Provinsi Tidak Boleh Kosong !.')</script>";
                echo "<script type='text/javascript'>history.go(-1)</script>";
              }elseif ($cekquery>0) {
                echo "<script type='text/javascript'>alert('Data Sudah Ada !.')</script>";
                echo "<script type='text/javascript'>history.go(-1)</script>";
              }else{
      				 	$query = mysqli_query($dbconnect, "INSERT into tb_rt VALUES ('', '".$RW."', '".$RT."')");
      				 	if ($query) {
      				 		echo "<script type='text/javascript'>window.location.href='?page=rt';</script>";
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
          <a href="?page=rt" class="label label-info btn btn-mini btn-info">Lihat Data</a>
        </div>
        <div class="widget-content">
          <?php  
          $kode = $_GET['kode'];
          $queryedit = $dbconnect -> query("SELECT * FROM tb_rt inner join tb_rw on tb_rt.id_rw=tb_rw.id_rw where tb_rt.id_rt = $kode");
          while ($dataedit = $queryedit -> fetch_array()) {
          ?>
          <form action="" method="post" class="form-horizontal">
            <div class="control-group hidden">
              <label for="normal" class="control-label">ID RT</label>
              <div class="controls">
                <input type="text" id="mask-phone" name="i_kodert" placeholder="Kode Dusun" autofocus class="span8 mask text" value="<?php echo $dataedit['id_rt'] ?>">
                <!-- <span class="help-block blue span8">(999) 999-9999</span> --> </div>
            </div>

            <div class="control-group">
              <label for="normal" class="control-label">Nomor RT</label>
              <div class="controls">
                <input type="text" id="mask-phone" name="i_rt" value="<?php echo $dataedit['no_rt'] ?>" autofocus class="span8 mask text">
                <!-- <span class="help-block blue span8">(999) 999-9999</span> --> </div>
            </div>

            <div class="control-group">
              <label class="control-label">Pilih RW</label>
              <div class="controls">
                <select name="i_rw">
                  <option value="<?php echo $dataedit['no_rw'] ?>"><?php echo $dataedit['no_rw'] ?></option>
                  <?php 
                  $queryrw = $dbconnect -> query("SELECT * FROM tb_rw");
                  while ($datarw = $queryrw -> fetch_array()) {
                  ?>
                  <option value="<?php echo $datarw['id_rw'] ?>"><?php echo $datarw['no_rw'] ?></option>
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
            $Kode_RT = ($_POST['i_kodert']);
      		 	$RT = addslashes($_POST['i_rt']);
            $RW = addslashes($_POST['i_rw']);
      		 	$query = mysqli_query($dbconnect, "UPDATE tb_rt SET id_rw='$RW', no_rt = '$RT' WHERE id_rt = '$Kode_RT'");
      		 	if ($query) {
      		 		echo "<script type='text/javascript'>window.location.href='?page=rt';</script>";
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
            <a href="?page=rt&&aksi=tambah" class="label label-info btn btn-mini btn-info">Tambah Data</a>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>No</th>
                  <th>RT</th>
                  <th>Dalam RW</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                $query = $dbconnect -> query("SELECT * FROM tb_rt inner join tb_rw on tb_rt.id_rw=tb_rw.id_rw");
                while ($data = $query -> fetch_array()) {
                @$no++;
                ?>
                <tr class="gradeX">
                  <td style="text-align: center;"><?php echo $no;; ?></td>
                  <td><?php echo $data['no_rt']; ?></td>
                  <td><?php echo $data['no_rw']; ?></td>
                  <td style="text-align: center;"><a href="?page=rt&&aksi=edit&&kode=<?php echo $data['id_rt'] ?>" class="btn btn-mini btn-warning">Edit</a></td>
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