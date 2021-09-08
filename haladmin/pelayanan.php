<?php include 'koneksi.php'; ?>
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Data Pelayanan</a> </div>
    <h1>Data Pelayanan</h1>
  </div>
  <?php
    @$aksi = $_GET['aksi'];
    if ($aksi == "tambah") {
  ?>
  <hr>
  <div class="container-fluid">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Tambah Data Pelayanan</h5>
          <a href="?page=pelayanan" class="label label-info btn btn-mini btn-info">Lihat Data</a>
        </div>
        <div class="widget-content">
          <form action="" method="post" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">Pilih Penduduk</label>
              <div class="controls">
                <select name="i_nama" id="i_nama">
                  <option>--Pilih Penduduk--</option>
                  <?php 
                  $querypenduduk = $dbconnect -> query("SELECT nik, nama_lengkap FROM tb_penduduk");
                  while ($datapenduduk = $querypenduduk -> fetch_array()) {
                  ?>
                  <option value="<?php echo $datapenduduk['nik'] ?>"><?php echo $datapenduduk['nama_lengkap']." - NIK ".$datapenduduk['nik'] ?></option>
                  <?php } ?>
                </select>
                <span class="help-inline" id="i_pengikut"></span>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Pilih Jenis Surat</label>
              <div class="controls">
                <select name="i_jenis">
                <option>--Pilih Jenis Surat--</option>
                <?php 
                $queryjenis = $dbconnect -> query("SELECT * FROM tb_jenissurat where id_jenis!=4 and id_jenis!=6");
                while ($datajenis = $queryjenis -> fetch_array()) {
                ?>
                <option value="<?php echo $datajenis['id_jenis'] ?>"><?php echo $datajenis['nama_surat'] ?></option>
                <?php } ?>
              </select>
              </div>
            </div>

            <?php  
            $datanomor = $dbconnect->query("SELECT max(no_surat) as no_terakhir from tb_layanan")->fetch_array();
            $NoSurat = $datanomor['no_terakhir'];
            ?>

            <div class="control-group">
              <label for="normal" class="control-label">No Surat</label>
              <div class="controls">
                <input type="number" name="i_nosurat" class="span8">
                <span class="help-block">No Surat Terakhir Adalah <?php echo$NoSurat ?></span> </div>
            </div>

            <div class="control-group">
              <label for="normal" class="control-label">Keperluan</label>
              <div class="controls">
                <input type="text" name="i_keperluan" class="span8">
                <!-- <span class="help-block blue span8">(999) 999-9999</span> --> </div>
            </div>

            <div class="control-group">
              <label for="normal" class="control-label">Isi</label>
              <div class="controls">
                <textarea name="i_isi" class="span8" ></textarea>
                <!-- <span class="help-block blue span8">(999) 999-9999</span> --> </div>
            </div>

            <div class="form-actions">
              <input type="submit" name="simpan" class="btn btn-success" value="Simpan">
            </div>
          </form>
          <?php 
          if (isset($_POST['simpan'])) {
            $Nama = addslashes($_POST['i_nama']);
            $Jenis = addslashes($_POST['i_jenis']);
            $Tanggal = date("Y-m-d");
            $Keperluan = addslashes($_POST['i_keperluan']);
            $Isi = addslashes($_POST['i_isi']);
            @$NoSurat = addslashes($_POST['i_nosurat']);

            $cek2 = mysqli_query($dbconnect, "SELECT nik_penduduk FROM tb_mutasi_keluar where nik_penduduk='$Nama'");
            $cek3 = mysqli_query($dbconnect, "SELECT nik FROM tb_pengikut_keluar where nik='$Nama'");
            $cek4 = $dbconnect->query("SELECT * FROM tb_layanan Inner Join tb_jenissurat ON tb_jenissurat.id_jenis = tb_layanan.id_jenissurat where tb_layanan.no_surat=$NoSurat AND tb_jenissurat.jenis='Administrasi'");
            $cek5 = $dbconnect->query("SELECT * FROM tb_layanan where id_penduduk = '$Nama' AND id_jenissurat = '$Jenis' AND tgl_pelayanan = '$Tanggal'");

            $cekquery2 = mysqli_num_rows($cek2);
            $cekquery3 = mysqli_num_rows($cek3);
            $cekquery4 = mysqli_num_rows($cek4);
            $cekquery5 = mysqli_num_rows($cek5);

            if ($cekquery2>0 || $cekquery3>0) {
              echo "<script type='text/javascript'>alert('Maaf Penduduk Yang Dipilih Sudah Pindah Domisili !.')</script>";
              echo "<script type='text/javascript'>history.go(-1)</script>";
            }elseif ($cekquery4>0) {
              echo "<script type='text/javascript'>alert('No Surat Sudah Ada !.')</script>";
              echo "<script type='text/javascript'>history.go(-1)</script>";
            }elseif ($cekquery5>0){
              echo "<script type='text/javascript'>alert('Penduduk Tersebut Sudah Menadapat Pelayanan Yang Sama Hari Ini !.')</script>";
              echo "<script type='text/javascript'>history.go(-1)</script>";
            }else{
              $query = mysqli_query($dbconnect, "INSERT into tb_layanan (id_pelayanan, id_jenissurat, id_penduduk, tgl_pelayanan, keperluan, isi, no_surat) VALUES ('', '".$Jenis."', '".$Nama."', '".$Tanggal."', '".$Keperluan."', '".$Isi."', '".$NoSurat."')");
              if ($query) {
                echo "<script type='text/javascript'>window.location.href='?page=pelayanan';</script>";
              }
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
          <h5>Edit Data Pelayanan</h5>
          <a href="?page=pelayanan" class="label label-info btn btn-mini btn-info">Lihat Data</a>
        </div>
        <div class="widget-content">
          <?php  
          $kode = $_GET['kode'];
          $Tgl_Pelayanan = date('Y-m-d');
          $queryval = $dbconnect -> query("SELECT * FROM tb_layanan inner join tb_penduduk on tb_layanan.id_penduduk=tb_penduduk.nik inner join tb_jenissurat on tb_layanan.id_jenissurat=tb_jenissurat.id_jenis where tb_layanan.id_pelayanan=$kode");
          while ($dataval = $queryval -> fetch_array()) {
          $Jenis = $dataval['id_jenissurat'];
          $Penduduk = $dataval['id_penduduk'];
          $Nama = $dataval['nama_lengkap'];
          $Surat = $dataval['nama_surat'];
          $Keperluan = $dataval['keperluan'];
          $Nomor = $dataval['no_surat'];
          $Isi = $dataval['isi'];
          }
          ?>
          <form action="" method="post" class="form-horizontal">
            <div class="control-group">
              <label for="normal" class="control-label">Nama Pemohon</label>
              <div class="controls">
                <input type="text" id="mask-phone" value="<?php echo $Nama ?>" readonly class="span8 mask text">
                <!-- <span class="help-block blue span8">(999) 999-9999</span> --> </div>
            </div>

            <div class="control-group">
              <label for="normal" class="control-label">Jenis Permohonan</label>
              <div class="controls">
                <input type="text" id="mask-phone" value="<?php echo $Surat ?>" readonly class="span8 mask text">
                <!-- <span class="help-block blue span8">(999) 999-9999</span> --> </div>
            </div>

            <div class="control-group">
              <label for="normal" class="control-label">Nomor Surat</label>
              <div class="controls">
                <input type="text" id="mask-phone" value="<?php echo $Nomor ?>" readonly class="span8 mask text">
                <!-- <span class="help-block blue span8">(999) 999-9999</span> --> </div>
            </div>

            <div class="control-group">
              <label for="normal" class="control-label">Keperluan</label>
              <div class="controls">
                <textarea class="span8" readonly><?php echo $Keperluan ?></textarea>
                <!-- <span class="help-block blue span8">(999) 999-9999</span> --> </div>
            </div>

            <div class="control-group">
              <label for="normal" class="control-label">Isi Surat</label>
              <div class="controls">
                <textarea class="span8" readonly><?php echo $Isi ?></textarea>
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
          <h5>Edit Data Pelayanan</h5>
          <a href="?page=pelayanan" class="label label-info btn btn-mini btn-info">Lihat Data</a>
        </div>
        <div class="widget-content nopadding">
          <?php  
          $kode = $_GET['kode'];
          $Tgl_Pelayanan = date('Y-m-d');
          $queryval = $dbconnect -> query("SELECT * FROM tb_layanan inner join tb_penduduk on tb_layanan.id_penduduk=tb_penduduk.nik inner join tb_jenissurat on tb_layanan.id_jenissurat=tb_jenissurat.id_jenis where tb_layanan.id_pelayanan=$kode");
          while ($dataval = $queryval -> fetch_array()) {
          $Jenis = $dataval['id_jenissurat'];
          $Penduduk = $dataval['nik'];
          $Nama = $dataval['nama_lengkap'];
          $Surat = $dataval['nama_surat'];
          $Keperluan = $dataval['keperluan'];
          $Isi = $dataval['isi'];
          
          ?>
          <?php  
            $datanomor1 = $dbconnect->query("SELECT max(no_surat) as no_terakhir from tb_layanan")->fetch_array();
            $NoSurat1 = $datanomor1['no_terakhir'];
            ?>
          <form action="" method="post" class="form-horizontal">
            <div class="control-group">
              <label for="normal" class="control-label">Nama Pemohon</label>
              <div class="controls">
                <input type="text" id="mask-phone" value="<?php echo $Nama ?>" readonly class="span8 mask text">
                <!-- <span class="help-block blue span8">(999) 999-9999</span> --> </div>
            </div>

            <div class="control-group">
              <label for="normal" class="control-label">Jenis Permohonan</label>
              <div class="controls">
                <input type="text" id="mask-phone" value="<?php echo $Surat ?>" readonly class="span8 mask text">
                <!-- <span class="help-block blue span8">(999) 999-9999</span> --> </div>
            </div>

            <div class="control-group">
              <label for="normal" class="control-label">Keperluan</label>
              <div class="controls">
                <textarea class="span8" readonly><?php echo $Keperluan ?></textarea>
                <!-- <span class="help-block blue span8">(999) 999-9999</span> --> </div>
            </div>

            <div class="control-group">
              <label for="normal" class="control-label">Nomor Surat</label>
              <div class="controls">
                <input type="text" id="mask-phone" name="i_nomor" class="span8 mask text">
                <span class="help-block">No Surat Terakhir Adalah <?php echo$NoSurat1 ?></span> </div>
            </div>

            <div class="control-group">
              <label for="normal" class="control-label">Isi Surat</label>
              <div class="controls">
                <textarea class="span8" name="i_isi"><?php echo $Isi ?></textarea>
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
            $Nomor = addslashes($_POST['i_nomor']);

            $cek22 = mysqli_query($dbconnect, "SELECT nik_penduduk FROM tb_mutasi_keluar where nik_penduduk='$Nama'");
            $cek33 = mysqli_query($dbconnect, "SELECT nik FROM tb_pengikut_keluar where nik='$Nama'");
            $cek44 = $dbconnect->query("SELECT * FROM tb_layanan Inner Join tb_jenissurat ON tb_jenissurat.id_jenis = tb_layanan.id_jenissurat where tb_layanan.no_surat='$Nomor' AND tb_jenissurat.jenis='Administrasi'");
            $cek55 = $dbconnect->query("SELECT * FROM tb_layanan where id_penduduk = '$Penduduk' AND id_jenissurat = '$Jenis' AND tgl_pelayanan = '$Tgl_Pelayanan'");

            $cekquery22 = mysqli_num_rows($cek22);
            $cekquery33 = mysqli_num_rows($cek33);
            $cekquery44 = mysqli_num_rows($cek44);
            $cekquery55 = mysqli_num_rows($cek55);

            if ($cekquery22>0 || $cekquery33>0) {
              echo "<script type='text/javascript'>alert('Maaf Penduduk Yang Dipilih Sudah Pindah Domisili !.')</script>";
              echo "<script type='text/javascript'>history.go(-1)</script>";
            }elseif ($cekquery44>0) {
              echo "<script type='text/javascript'>alert('No Surat Sudah Ada !.')</script>";
              echo "<script type='text/javascript'>history.go(-1)</script>";
            }elseif ($cekquery55>0){
              echo "<script type='text/javascript'>alert('Penduduk Tersebut Sudah Menadapat Pelayanan Yang Sama Hari Ini !.')</script>";
              echo "<script type='text/javascript'>history.go(-1)</script>";
            }else{
              $query = mysqli_query($dbconnect, "UPDATE tb_layanan set id_jenissurat='$Jenis', id_penduduk='$Penduduk', isi='$Isi', tgl_pelayanan='$Tgl_Pelayanan', no_surat='$Nomor' where id_pelayanan=$kode");
              if ($query) {
                  echo "<script type='text/javascript'>window.location.href='?page=pelayanan';</script>";
              } 
            }
          } ?>
        </div>
      </div>
  </div>
  <?php }}elseif ($aksi=="cetak") {?>
  <hr>
  <div class="container-fluid">
    <div class="accordion" id="collapse-group">
      <div class="accordion-group widget-box">
        <div class="accordion-heading">
          <div class="widget-title"> <a data-parent="#collapse-group" href="#collapseGOne" data-toggle="collapse"> <span class="icon"><i class="icon-print"></i></span>
            <h5>Cetak Semua</h5>
            </a> <a href="?page=pelayanan" class="label label-info btn btn-mini btn-info">Lihat Data</a> </div>
        </div>
        <div class="collapse in accordion-body" id="collapseGOne">
          <div class="widget-content">
            <form action="pdf/lap_pel.php" method="post" class="form-horizontal" target="blank">
              <div class="control-group">
                <label class="control-label">Pilih Bulan</label>
                <div class="controls">
                  <select name="i_bulan" required>
                    <option value="">--Pilih Bulan--</option>
                    <option value="01">Januari</option>
                    <option value="02">Februari</option>
                    <option value="03">Maret</option>
                    <option value="04">April</option>
                    <option value="05">Mei</option>
                    <option value="06">Juni</option>
                    <option value="07">Juli</option>
                    <option value="08">Agustus</option>
                    <option value="09">September</option>
                    <option value="10">Oktober</option>
                    <option value="11">November</option>
                    <option value="12">Desember</option>
                  </select>
                </div>
              </div>

              <div class="control-group">
                <label for="normal" class="control-label">Tahun</label>
                <div class="controls">
                  <input type="text" id="mask-phone" name="i_tahun" value="<?php echo date('Y'); ?>" class="span8 mask text" required>
                  <!-- <span class="help-block blue span8">(999) 999-9999</span> --> </div>
              </div>

              <div class="form-actions">
                <input type="submit" name="simpan" class="btn btn-success" value="Cetak">
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="accordion-group widget-box">
        <div class="accordion-heading">
          <div class="widget-title"> <a data-parent="#collapse-group" href="#collapseGTwo" data-toggle="collapse"> <span class="icon"><i class="icon-edit"></i></span>
            <h5>Cetak Berdasrkan Kategori</h5>
            </a> </div>
        </div>
        <div class="collapse accordion-body" id="collapseGTwo">
          <div class="widget-content">
            <form action="pdf/lap_kat.php" method="post" class="form-horizontal" target="blank">
              <div class="control-group">
                <label class="control-label">Pilih Bulan</label>
                <div class="controls">
                  <select name="i_bulan" required>
                    <option value="">--Pilih Bulan--</option>
                    <option value="01">Januari</option>
                    <option value="02">Februari</option>
                    <option value="03">Maret</option>
                    <option value="04">April</option>
                    <option value="05">Mei</option>
                    <option value="06">Juni</option>
                    <option value="07">Juli</option>
                    <option value="08">Agustus</option>
                    <option value="09">September</option>
                    <option value="10">Oktober</option>
                    <option value="11">November</option>
                    <option value="12">Desember</option>
                  </select>
                </div>
              </div>

              <div class="control-group">
                <label for="normal" class="control-label">Tahun</label>
                <div class="controls">
                  <input type="text" id="mask-phone" name="i_tahun" value="<?php echo date('Y'); ?>" class="span8 mask text" required>
                  <!-- <span class="help-block blue span8">(999) 999-9999</span> --> </div>
              </div>

              <div class="control-group">
                <label class="control-label">Pilih Jenis Surat</label>
                <div class="controls">
                  <select name="i_jenis" required>
                    <option value="">--Pilih Jenis Surat--</option>
                    <?php  
                      $query = $dbconnect->query("SELECT id_jenis, nama_surat FROM tb_jenissurat");
                      while ($datasurat = $query->fetch_array()) {
                    ?>
                    <option value="<?php echo $datasurat['id_jenis'] ?>"><?php echo $datasurat['nama_surat'] ?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>
              <div class="form-actions">
                <input type="submit" name="simpan" class="btn btn-success" value="Cetak">
              </div>
            </form>
          </div>
        </div>
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
            <h5>Data Pelayanan</h5>
            <a href="?page=pelayanan&&aksi=tambah" class="label label-info btn btn-mini btn-success">Tambah Data</a>
            <a href="?page=pelayanan&&aksi=cetak" class="label label-warning btn btn-mini btn-warning">Cetak Laporan</a>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Pemohon</th>
                  <th>Jenis Permohonan</th>
                  <th>Keperluan</th>
                  <th>Isi Surat</th>
                  <th>Tanggal Pelayanan</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                $query = $dbconnect -> query("SELECT * FROM tb_layanan Inner Join tb_jenissurat ON tb_jenissurat.id_jenis = tb_layanan.id_jenissurat Inner Join tb_penduduk ON tb_penduduk.nik = tb_layanan.id_penduduk order by tb_layanan.id_pelayanan DESC");
                while ($data = $query -> fetch_array()) {
                @$no++;
                ?>
                <tr class="gradeX">
                  <td style="text-align: center;"><?php echo $no;; ?></td>
                  <td><?php echo $data['nama_lengkap']; ?></td>
                  <td><?php echo $data['nama_surat']; ?></td>
                  <td><?php echo $data['keperluan']; ?></td>
                  <td><?php echo $data['isi']; ?></td>
                  <td><?php echo $data['tgl_pelayanan']; ?></td>
                  <td style="text-align: center;">
                    <?php  
                      if ($data['tgl_pelayanan']==0) {
                    ?>
                    <a href="?page=pelayanan&&aksi=det&&kode=<?php echo $data['id_pelayanan'] ?>" class="btn btn-mini btn-warning">Detail</a>
                    <a href="?page=pelayanan&&aksi=val&&kode=<?php echo $data['id_pelayanan'] ?>" class="btn btn-mini btn-success">Terima</a>
                    <?php }else{ ?>
                    <?php  
                      if ($data['id_jenis']==1) {
                        $pdf = "pdf/suratketerangan.php";
                      }elseif ($data['id_jenis']==2) {
                        $pdf = "pdf/skusaha.php";
                      }elseif ($data['id_jenis']==3) {
                        $pdf = "pdf/skusaha.php";
                      }elseif ($data['id_jenis']==4) {
                        $pdf = "pdf/form_kelahiran.php";
                      }elseif ($data['id_jenis']==5) {
                        $pdf = "pdf/form_ktp.php";
                      }elseif ($data['id_jenis']==6) {
                        $pdf = "pdf/pengantar.php";
                      }elseif ($data['id_jenis']==7) {
                        $pdf = "pdf/formkk.php";
                      }
                    ?>
                    <a href="?page=pelayanan&&aksi=det&&kode=<?php echo $data['id_pelayanan'] ?>" class="btn btn-mini btn-warning">Detail</a>
                    <a href="<?php echo $pdf; ?>?kode=<?php echo $data['id_pelayanan'] ?>" class="btn btn-mini btn-info" target="blank">Cetak</a>
                    <?php } ?>
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
<script src="js/jquery.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
   $('#i_nama').change(function() { // Jika Select Box id kelas dipilih
     $('#i_pengikut').html('<img style="width:25px" src="img/loading.gif">');
     var Kode = $(this).val(); // Ciptakan variabel kelas
     $.ajax({
            type: 'POST', // Metode pengiriman data menggunakan POST
          url: 'prosescek.php', // File yang akan memproses data
         data: 'id_nama=' + Kode, // Data yang akan dikirim ke file pemroses
         success: function(response) { // Jika berhasil
              $('#i_pengikut').html(response); // Berikan hasil ke id penugasan
            }
       });
    });
  });
</script>