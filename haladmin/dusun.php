<?php include 'koneksi.php'; ?>
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Data Dusun</a> </div>
    <h1>Data Dusun</h1>
  </div>
  <?php
    @$aksi = $_GET['aksi'];
    if ($aksi == "tambah") {
  ?>
  <hr>
  <div class="container-fluid">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Tambah Data Dusun</h5>
          <a href="?page=dusun" class="label label-info btn btn-mini btn-info">Lihat Data</a>
        </div>
        <div class="widget-content nopadding">
          <form action="" method="post" class="form-horizontal">
            <div class="control-group">
              <label for="normal" class="control-label">Nama Dusun</label>
              <div class="controls">
                <input type="text" id="mask-phone" name="i_dusun" placeholder="Nama Dusun" required autofocus class="span8 mask text" required>
                <!-- <span class="help-block blue span8">(999) 999-9999</span> --> </div>
            </div>
            <div class="form-actions">
              <input type="submit" name="simpan" class="btn btn-success" value="Simpan">
            </div>
          </form>
          <?php 
          if (isset($_POST['simpan'])) {
            $Nama_Dusun = addslashes($_POST['i_dusun']);

            $cek = mysqli_query($dbconnect, "SELECT * FROM tb_dusun where nama_dusun='$Nama_Dusun'");

            $cekquery = mysqli_num_rows($cek);

            if ($cekquery>0) {
              echo "<script type='text/javascript'>alert('Data Sudah Ada !.')</script>";
              echo "<script type='text/javascript'>history.go(-1)</script>";
            }else{
              $query = mysqli_query($dbconnect, "INSERT into tb_dusun VALUES ('', '".$Nama_Dusun."')");
              if ($query) {
                echo "<script type='text/javascript'>window.location.href='?page=dusun';</script>";
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
          <h5>Edit Data Dusun</h5>
          <a href="?page=dusun" class="label label-info btn btn-mini btn-info">Lihat Data</a>
        </div>
        <div class="widget-content nopadding">
          <?php  
          $kode = $_GET['kode'];
          $queryedit = $dbconnect -> query("SELECT * FROM tb_dusun where id_dusun = $kode");
          while ($dataedit = $queryedit -> fetch_array()) {
          ?>
          <form action="" method="post" class="form-horizontal">
            <div class="control-group hidden">
              <label for="normal" class="control-label">ID Dusun</label>
              <div class="controls">
                <input type="text" id="mask-phone" name="i_kodedusun" placeholder="Kode Dusun" autofocus class="span8 mask text" value="<?php echo $dataedit['id_dusun'] ?>">
                <!-- <span class="help-block blue span8">(999) 999-9999</span> --> </div>
            </div>

            <div class="control-group">
              <label for="normal" class="control-label">Nama Dusun</label>
              <div class="controls">
                <input type="text" id="mask-phone" name="i_dusun" placeholder="Nama Dusun" autofocus class="span8 mask text" value="<?php echo $dataedit['nama_dusun'] ?>">
                <!-- <span class="help-block blue span8">(999) 999-9999</span> --> </div>
            </div>
            <div class="form-actions">
              <input type="submit" name="update" class="btn btn-success" value="Simpan">
            </div>
          </form>
          <?php }
          if (isset($_POST['update'])) {
            $Kode_Dusun = ($_POST['i_kodedusun']);
            $Nama_Dusun = addslashes($_POST['i_dusun']);
            $query = mysqli_query($dbconnect, "UPDATE tb_dusun SET nama_dusun = '$Nama_Dusun' WHERE id_dusun = '$Kode_Dusun'");
            if ($query) {
              echo "<script type='text/javascript'>window.location.href='?page=dusun';</script>";
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
            <a href="?page=dusun&&aksi=tambah" class="label label-info btn btn-mini btn-info">Tambah Data</a>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Dusun</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                $query = $dbconnect -> query("SELECT * FROM tb_dusun");
                while ($data = $query -> fetch_array()) {
                @$no++;
                ?>
                <tr class="gradeX">
                  <td style="text-align: center;"><?php echo $no;; ?></td>
                  <td><?php echo $data['nama_dusun']; ?></td>
                  <td style="text-align: center;"><a href="?page=dusun&&aksi=edit&&kode=<?php echo $data['id_dusun'] ?>" class="btn btn-mini btn-warning">Edit</a></td>
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