<?php include 'koneksi.php'; ?>
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Data Provinsi</a> </div>
    <h1>Data Provinsi</h1>
  </div>
  <?php
    @$aksi = $_GET['aksi'];
    if ($aksi == "tambah") {
  ?>
  <hr>
  <div class="container-fluid">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Tambah Data Provinsi</h5>
          <a href="?page=prov" class="label label-info btn btn-mini btn-info">Lihat Data</a>
        </div>
        <div class="widget-content">
          <form action="" method="post" class="form-horizontal">
            <div class="control-group">
              <label for="normal" class="control-label">Nama Provinsi</label>
              <div class="controls">
                <input type="text" id="mask-phone" name="i_provinsi" placeholder="Nama Provinsi" autofocus class="span8 mask text">
                <!-- <span class="help-block blue span8">(999) 999-9999</span> --> </div>
            </div>
            <div class="form-actions">
              <input type="submit" name="simpan" class="btn btn-success" value="Simpan">
            </div>
          </form>
          <?php 
          if (isset($_POST['simpan'])) {
            $Provinsi = addslashes($_POST['i_provinsi']);
            $query = mysqli_query($dbconnect, "INSERT into tb_provinsi VALUES ('', '".$Provinsi."')");
            if ($query) {
              echo "<script type='text/javascript'>window.location.href='?page=prov';</script>";
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
          <h5>Edit Data Provinsi</h5>
          <a href="?page=prov" class="label label-info btn btn-mini btn-info">Lihat Data</a>
        </div>
        <div class="widget-content">
          <?php  
          $kode = $_GET['kode'];
          $queryedit = $dbconnect -> query("SELECT * FROM tb_provinsi where id_provinsi = $kode");
          while ($dataedit = $queryedit -> fetch_array()) {
          ?>
          <form action="" method="post" class="form-horizontal">
            <div class="control-group hidden">
              <label for="normal" class="control-label">ID Provinsi</label>
              <div class="controls">
                <input type="text" id="mask-phone" name="i_kodeprov" placeholder="Kode Provinsi" autofocus class="span8 mask text" value="<?php echo $dataedit['id_provinsi'] ?>">
                <!-- <span class="help-block blue span8">(999) 999-9999</span> --> </div>
            </div>

            <div class="control-group">
              <label for="normal" class="control-label">Nama Provinsi</label>
              <div class="controls">
                <input type="text" id="mask-phone" name="i_provinsi" placeholder="Nama Provinsi" autofocus class="span8 mask text" value="<?php echo $dataedit['provinsi'] ?>">
                <!-- <span class="help-block blue span8">(999) 999-9999</span> --> </div>
            </div>
            <div class="form-actions">
              <input type="submit" name="update" class="btn btn-success" value="Simpan">
            </div>
          </form>
          <?php }
          if (isset($_POST['update'])) {
            $Kode = ($_POST['i_kodeprov']);
            $Provinsi = addslashes($_POST['i_provinsi']);
            $query = mysqli_query($dbconnect, "UPDATE tb_provinsi SET provinsi = '$Provinsi' WHERE id_provinsi = '$Kode'");
            if ($query) {
              echo "<script type='text/javascript'>window.location.href='?page=prov';</script>";
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
            <h5>Data Provinsi</h5>
            <a href="?page=prov&&aksi=tambah" class="label label-info btn btn-mini btn-info">Tambah Data</a>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Provinsi</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                $query = $dbconnect -> query("SELECT * FROM tb_provinsi");
                while ($data = $query -> fetch_array()) {
                @$no++;
                ?>
                <tr class="gradeX">
                  <td style="text-align: center;"><?php echo $no;; ?></td>
                  <td><?php echo $data['provinsi']; ?></td>
                  <td style="text-align: center;"><a href="?page=prov&&aksi=edit&&kode=<?php echo $data['id_provinsi'] ?>" class="btn btn-mini btn-warning">Edit</a></td>
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