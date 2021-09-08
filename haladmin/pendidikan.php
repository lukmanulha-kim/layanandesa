<?php include 'koneksi.php'; ?>
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Data Pendidikan</a> </div>
    <h1>Data Pendidikan</h1>
  </div>
  <?php
    @$aksi = $_GET['aksi'];
    if ($aksi == "tambah") {
  ?>
  <hr>
  <div class="container-fluid">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Tambah Data Pendidikan</h5>
          <a href="?page=pendidikan" class="label label-info btn btn-mini btn-info">Lihat Data</a>
        </div>
        <div class="widget-content">
          <form action="" method="post" class="form-horizontal">
            <div class="control-group">
              <label for="normal" class="control-label">Nama Pendidikan</label>
              <div class="controls">
                <input type="text" id="mask-phone" name="i_pendidikan" placeholder="Pendidikan" autofocus required class="span8 mask text">
                <!-- <span class="help-block blue span8">(999) 999-9999</span> --> </div>
            </div>
            <div class="form-actions">
              <input type="submit" name="simpan" class="btn btn-success" value="Simpan">
            </div>
          </form>
          <?php 
          if (isset($_POST['simpan'])) {
            $Pendidikan = addslashes($_POST['i_pendidikan']);

            $cek = mysqli_query($dbconnect, "SELECT * FROM tb_pendidikan where pendidikan='$Pendidikan'");

            $cekquery = mysqli_num_rows($cek);

            if($cekquery>0) {
              echo "<script type='text/javascript'>alert('Data Sudah Ada !.')</script>";
              echo "<script type='text/javascript'>history.go(-1)</script>";
            }else{
              $query = mysqli_query($dbconnect, "INSERT into tb_pendidikan VALUES ('', '".$Pendidikan."')");
              if ($query) {
                echo "<script type='text/javascript'>window.location.href='?page=pendidikan';</script>";
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
          <h5>Edit Data Pendidikan</h5>
          <a href="?page=pendidikan" class="label label-info btn btn-mini btn-info">Lihat Data</a>
        </div>
        <div class="widget-content">
          <?php  
          $kode = $_GET['kode'];
          $queryedit = $dbconnect -> query("SELECT * FROM tb_pendidikan where id_pendidikan = $kode");
          while ($dataedit = $queryedit -> fetch_array()) {
          ?>
          <form action="" method="post" class="form-horizontal">
            <div class="control-group hidden">
              <label for="normal" class="control-label">ID Pendidikan</label>
              <div class="controls">
                <input type="text" id="mask-phone" name="i_kode" placeholder="Kode Dusun" autofocus class="span8 mask text" value="<?php echo $dataedit['id_pendidikan'] ?>">
                <!-- <span class="help-block blue span8">(999) 999-9999</span> --> </div>
            </div>

            <div class="control-group">
              <label for="normal" class="control-label">Nama Dusun</label>
              <div class="controls">
                <input type="text" id="mask-phone" name="i_pendidikan" placeholder="Nama Dusun" autofocus class="span8 mask text" value="<?php echo $dataedit['pendidikan'] ?>">
                <!-- <span class="help-block blue span8">(999) 999-9999</span> --> </div>
            </div>
            <div class="form-actions">
              <input type="submit" name="update" class="btn btn-success" value="Simpan">
            </div>
          </form>
          <?php }
          if (isset($_POST['update'])) {
            $Kode = ($_POST['i_kode']);
            $Nama_Pendidikan = addslashes($_POST['i_pendidikan']);
            $query = mysqli_query($dbconnect, "UPDATE tb_pendidikan SET pendidikan = '$Nama_Pendidikan' WHERE id_pendidikan = '$Kode'");
            if ($query) {
              echo "<script type='text/javascript'>window.location.href='?page=pendidikan';</script>";
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
            <h5>Data Pendidikan</h5>
            <a href="?page=pendidikan&&aksi=tambah" class="label label-info btn btn-mini btn-info">Tambah Data</a>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Pendidikan</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                $query = $dbconnect -> query("SELECT * FROM tb_pendidikan");
                while ($data = $query -> fetch_array()) {
                @$no++;
                ?>
                <tr class="gradeX">
                  <td style="text-align: center;"><?php echo $no;; ?></td>
                  <td><?php echo $data['pendidikan']; ?></td>
                  <td style="text-align: center;"><a href="?page=pendidikan&&aksi=edit&&kode=<?php echo $data['id_pendidikan'] ?>" class="btn btn-mini btn-warning">Edit</a></td>
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