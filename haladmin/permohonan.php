<?php include 'koneksi.php'; ?>
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Data Permohonan</a> </div>
    <h1>Data Permohanan</h1>
  </div>
  <?php
    @$aksi = $_GET['aksi'];
    if ($aksi == "tambah") {
  ?>
  <hr>
  <div class="container-fluid">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Tambah Data Permohanan</h5>
          <a href="?page=permohonan" class="label label-info btn btn-mini btn-info">Lihat Data</a>
        </div>
        <div class="widget-content">
          <form action="" method="post" class="form-horizontal">

            <div class="control-group">
              <label for="normal" class="control-label">NIK Penduduk</label>
              <div class="controls">
                <input type="text" id="mask-phone" name="i_nik" value="<?php echo $_SESSION['DataNIK'] ?>" placeholder="Nama Dusun" readonly class="span8 mask text">
                <!-- <span class="help-block blue span8">(999) 999-9999</span> --> </div>
            </div>

            <div class="control-group">
              <label for="normal" class="control-label">Nama Penduduk</label>
              <div class="controls">
                <input type="text" id="mask-phone" name="i_penduduk" value="<?php echo $_SESSION['NamaLengkap'] ?>" placeholder="Nama Dusun" readonly class="span8 mask text">
                <!-- <span class="help-block blue span8">(999) 999-9999</span> --> </div>
            </div>

            <div class="control-group">
              <label class="control-label">Pilih Jenis Surat</label>
              <div class="controls">
                <select name="i_jenis">
                <option>--Pilih Jenis Surat--</option>
                <?php 
                $queryjenis = $dbconnect -> query("SELECT * FROM tb_jenissurat");
                while ($datajenis = $queryjenis -> fetch_array()) {
                ?>
                <option value="<?php echo $datajenis['id_jenis'] ?>"><?php echo $datajenis['nama_surat'] ?></option>
                <?php } ?>
              </select>
              </div>
            </div>

            <div class="control-group">
              <label for="normal" class="control-label">Keperluan</label>
              <div class="controls">
                <textarea class="span8" name="i_keperluan"></textarea>
                <!-- <span class="help-block blue span8">(999) 999-9999</span> --> </div>
            </div>

            <div class="form-actions">
              <input type="submit" name="simpan" class="btn btn-success" value="Simpan">
            </div>
          </form>
          <?php 
          if (isset($_POST['simpan'])) {
            $NIK = addslashes($_POST['i_nik']);
            $Jenis = addslashes($_POST['i_jenis']);
            $Tanggal = date("Y-m-d");
            $Keperluan = addslashes($_POST['i_keperluan']);
            $query = mysqli_query($dbconnect, "INSERT into tb_layanan (id_pelayanan, id_jenissurat, id_penduduk, keperluan) VALUES ('', '".$Jenis."', '".$NIK."','".$Keperluan."')");
            if ($query) {
              echo "<script type='text/javascript'>window.location.href='?page=permohonan';</script>";
            }
           } ?>
        </div>
  </div>
  </div>
  <?php }elseif ($aksi=="det") {?>
  <hr>
  <div class="container-fluid">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Edit Data Jabatan</h5>
          <a href="?page=permohonan" class="label label-info btn btn-mini btn-info">Lihat Data</a>
        </div>
        <div class="widget-content">
          <?php  
          $kode = $_GET['kode'];
          $Tgl_Pelayanan = date('Y-m-d');
          $queryval = $dbconnect -> query("SELECT * FROM tb_layanan inner join tb_penduduk on tb_layanan.id_penduduk=tb_penduduk.nik inner join tb_jenissurat on tb_layanan.id_jenissurat=tb_jenissurat.id_jenis where tb_layanan.id_layanan=$kode");
          while ($dataval = $queryval -> fetch_array()) {
          $Jenis = $dataval['id_jenissurat'];
          $Penduduk = $dataval['id_penduduk'];
          $Nama = $dataval['nama_lengkap'];
          $Surat = $dataval['nama_surat'];
          $Keperluan = $dataval['keperluan'];
          }
          ?>
          <form action="" method="post" class="form-horizontal">
            <div class="control-group">
              <label for="normal" class="control-label">Nama Pemohon</label>
              <div class="controls">
                <input type="text" id="mask-phone" value="<?php echo $Nama ?>" autofocus class="span8 mask text">
                <!-- <span class="help-block blue span8">(999) 999-9999</span> --> </div>
            </div>

            <div class="control-group">
              <label for="normal" class="control-label">Jenis Permohonan</label>
              <div class="controls">
                <input type="text" id="mask-phone" value="<?php echo $Surat ?>" class="span8 mask text">
                <!-- <span class="help-block blue span8">(999) 999-9999</span> --> </div>
            </div>

            <div class="control-group">
              <label for="normal" class="control-label">Keperluan</label>
              <div class="controls">
                <textarea class="span8"><?php echo $Keperluan ?></textarea>
                <!-- <span class="help-block blue span8">(999) 999-9999</span> --> </div>
            </div>

          </form>
        </div>
      </div>
  </div>
  <?php }elseif ($aksi=="val") {?>
    <hr>
  <div class="container-fluid">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Edit Data Jabatan</h5>
          <a href="?page=permohonan" class="label label-info btn btn-mini btn-info">Lihat Data</a>
        </div>
        <div class="widget-content nopadding">
          <?php  
          $kode = $_GET['kode'];
          $Tgl_Pelayanan = date('Y-m-d');
          $queryval = $dbconnect -> query("SELECT * FROM tb_layanan inner join tb_penduduk on tb_layanan.id_penduduk=tb_penduduk.nik inner join tb_jenissurat on tb_layanan.id_jenissurat=tb_jenissurat.id_jenis where tb_layanan.id_layanan=$kode");
          while ($dataval = $queryval -> fetch_array()) {
          $Jenis = $dataval['id_jenissurat'];
          $Penduduk = $dataval['nik'];
          $Nama = $dataval['nama_lengkap'];
          $Surat = $dataval['nama_surat'];
          $Keperluan = $dataval['keperluan'];
          
          ?>
          <form action="" method="post" class="form-horizontal">
            <div class="control-group">
              <label for="normal" class="control-label">Nama Pemohon</label>
              <div class="controls">
                <input type="text" id="mask-phone" value="<?php echo $Nama ?>" autofocus class="span8 mask text">
                <!-- <span class="help-block blue span8">(999) 999-9999</span> --> </div>
            </div>

            <div class="control-group">
              <label for="normal" class="control-label">Jenis Permohonan</label>
              <div class="controls">
                <input type="text" id="mask-phone" value="<?php echo $Surat ?>" class="span8 mask text">
                <!-- <span class="help-block blue span8">(999) 999-9999</span> --> </div>
            </div>

            <div class="control-group">
              <label for="normal" class="control-label">Keperluan</label>
              <div class="controls">
                <textarea class="span8"><?php echo $Keperluan ?></textarea>
                <!-- <span class="help-block blue span8">(999) 999-9999</span> --> </div>
            </div>

            <div class="control-group">
              <label for="normal" class="control-label">Isi Surat</label>
              <div class="controls">
                <textarea class="span8" name="i_isi"></textarea>
                <!-- <span class="help-block blue span8">(999) 999-9999</span> --> </div>
            </div>

            <div class="form-actions">
              <input type="submit" name="terima" class="btn btn-success" value="Simpan">
            </div>
          </form>
          <?php if (isset($_POST['terima'])) {
            $kode = $_GET['kode'];
            $Jenis = $dataval['id_jenissurat'];
            $Penduduk = $dataval['id_penduduk'];
            $Tgl_Pelayanan = date('Y-m-d');
            $Isi = addslashes($_POST['i_isi']);

            $query = mysqli_query($dbconnect, "INSERT into tb_layanan VALUES ('', '".$Jenis."', '".$Penduduk."', '".$Isi."', '".$Tgl_Pelayanan."')");
            if ($query) {
              $queryhapus = mysqli_query($dbconnect, "DELETE From tb_layanan where id_layanan = $kode");
              if ($queryhapus) {
                echo "<script type='text/javascript'>window.location.href='?page=pelayanan';</script>";
              }
            } 
          } }?>
        </div>
      </div>
  </div>
  <?php }elseif ($aksi=="tol") {
    # code...
  }else{ ?>
  <hr>
  <div class="container-fluid">
    <!-- <div class="row-fluid"> -->
      <!-- <div class="span12"> -->
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Data Jabatan</h5>
            <a href="?page=permohonan&&aksi=tambah" class="label label-info btn btn-mini btn-info">Tambah Data</a>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Pemohon</th>
                  <th>Jenis Permohonan</th>
                  <th>Keperluan</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $NIK = $_SESSION['DataNIK']; 
                $query = $dbconnect -> query("SELECT * FROM tb_layanan inner join tb_penduduk on tb_layanan.id_penduduk=tb_penduduk.nik inner join tb_jenissurat on tb_layanan.id_jenissurat=tb_jenissurat.id_jenis where tb_layanan.id_penduduk=$NIK");
                while ($data = $query -> fetch_array()) {
                @$no++;
                ?>
                <tr class="gradeX">
                  <td style="text-align: center;"><?php echo $no;; ?></td>
                  <td><?php echo $data['nama_lengkap']; ?></td>
                  <td><?php echo $data['nama_surat']; ?></td>
                  <td><?php echo $data['keperluan']; ?></td>
                  <td style="text-align: center;">
                    <a href="?page=permohonan&&aksi=det&&kode=<?php echo $data['id_layanan'] ?>" class="btn btn-mini btn-warning">Detail</a>
                    <a href="?page=permohonan&&aksi=val&&kode=<?php echo $data['id_layanan'] ?>" class="btn btn-mini btn-success">Terima</a>
                    <a href="?page=permohonan&&aksi=tol&&kode=<?php echo $data['id_layanan'] ?>" class="btn btn-mini btn-danger">Tolak</a>
                  </td>
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