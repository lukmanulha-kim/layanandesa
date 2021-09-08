<?php include 'koneksi.php'; ?>
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Data Mutasi Keluar</a> </div>
    <h1>Data Mutasi Keluar</h1>
  </div>
  <?php
    @$aksi = $_GET['aksi'];
    if ($aksi == "tambah") {
  ?>
  <hr>
  <div class="container-fluid">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Tambah Data Mutasi Keluar</h5>
          <a href="?page=mukel" class="label label-info btn btn-mini btn-info">Lihat Data</a>
        </div>
        <div class="widget-content">
         <form action="" method="post" name="forminput" class="form-horizontal">

            <div class="control-group">
              <label class="control-label">Pilih Penduduk</label>
              <div class="controls">
                <select name="i_nama" id="i_nama">
                  <option>--Pilih Penduduk--</option>
                  <?php 
                  $querydusun = $dbconnect -> query("SELECT nik, no_kk, nama_lengkap FROM tb_penduduk");
                  while ($datadusun = $querydusun -> fetch_array()) {
                  ?>
                  <option value="<?php echo $datadusun['no_kk'].','.$datadusun['nik'] ?>"><?php echo $datadusun['nama_lengkap']." - NIK ".$datadusun['nik']?></option>
                  <?php } ?>
                </select>
              </div>
            </div>

            <div class="control-group">
              <label for="normal" class="control-label">Pindah Ke</label>
              <div class="controls">
                <textarea name="i_pindahke" class="span8" ></textarea>
                <!-- <span class="help-block blue span8">(999) 999-9999</span> --> </div>
            </div>

            <div class="control-group">
              <label class="control-label">Pilih Provinsi</label>
              <div class="controls">
                <select name="i_provinsi" id="i_provinsi">
                  <option>--Pilih Provinsi--</option>
                  <?php 
                  $querydusun = $dbconnect -> query("SELECT * FROM tb_provinsi");
                  while ($datadusun = $querydusun -> fetch_array()) {
                  ?>
                  <option value="<?php echo $datadusun['id_provinsi'] ?>"><?php echo $datadusun['provinsi'] ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Pilih Kabupaten</label>
              <div class="controls">
                <select name="i_kabupaten" id="i_kabupaten">
                  <option>--Pilih Kabupaten--</option>
                </select>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Pilih Kecamatan</label>
              <div class="controls">
                <select name="i_kecamatan" id="i_kecamatan">
                  <option>--Pilih Kecamatan--</option>
                </select>
              </div>
            </div>

            <div class="control-group">
              <label for="normal" class="control-label">Alasan</label>
              <div class="controls">
                <textarea name="i_alasan" class="span8" ></textarea>
                <!-- <span class="help-block blue span8">(999) 999-9999</span> --> </div>
            </div>

            <div class="control-group">
              <label class="control-label">Pilih Pengikut</label>
              <div class="controls">
                <select multiple name="i_pengikut[]" id="i_pengikut">
                  <option>--Pilih Pengikut--</option>
                </select>
              </div>
            </div>

            <div class="form-actions">
              <input type="submit" name="simpan" class="btn btn-success" value="Simpan">
            </div>
          </form>
          <?php 
          if (isset($_POST['simpan'])) {
            $Pisah = explode(",", $_POST['i_nama']);
            $NOKK = $Pisah[0];
            $NIK1 = $Pisah[1];
            $PindahKe = addslashes($_POST['i_pindahke']);
            $Kecamatan = addslashes($_POST['i_kecamatan']);
            $Kabupaten = addslashes($_POST['i_kabupaten']);
            $Provinsi = addslashes($_POST['i_provinsi']);
            $Alasan = addslashes($_POST['i_alasan']);
            // $Jumlah = addslashes($_POST['i_jumlah']);
            $Pengikut = implode(",", $_POST['i_pengikut']);
            $PisahJumlah = explode(",", $Pengikut);
            @$NIK0 = $PisahJumlah[0];
            @$NIK2 = $PisahJumlah[1];
            @$NIK3 = $PisahJumlah[2];
            @$NIK4 = $PisahJumlah[3];
            @$NIK5 = $PisahJumlah[4];
            @$NIK6 = $PisahJumlah[5];
            @$NIK7 = $PisahJumlah[6];
            if ($NIK7==NULL && $NIK6==NULL && $NIK5==NULL && $NIK4==NULL && $NIK3==NULL && $NIK2==NULL && $NIK0==NULL) {
              $JmlPengikut = '0';
            }elseif ($NIK7==NULL && $NIK6==NULL && $NIK5==NULL && $NIK4==NULL && $NIK3==NULL && $NIK2==NULL) {
              $JmlPengikut = 1;
            }elseif ($NIK7==NULL && $NIK6==NULL && $NIK5==NULL && $NIK4==NULL && $NIK3==NULL) {
              $JmlPengikut = 2;
            }elseif ($NIK7==NULL && $NIK6==NULL && $NIK5==NULL && $NIK4==NULL) {
              $JmlPengikut = 3;
            }elseif ($NIK7==NULL && $NIK6==NULL && $NIK5==NULL) {
              $JmlPengikut = 4;
            }elseif ($NIK7==NULL && $NIK6==NULL) {
              $JmlPengikut = 5;
            }elseif ($NIK7==NULL) {
              $JmlPengikut = 6;
            }else{
              $JmlPengikut = 7;
            }

            $JmlPengikut;
            $Isi ="Dikirim dengan hormat untuk diterima sebagai warga baru dan harap menjadikan maklum.";

            $cek = $dbconnect->query("SELECT nik_penduduk from tb_mutasi_keluar where nik_penduduk='$NIK1'");
            $cekquery = mysqli_num_rows($cek);
            if ($cekquery>0) {
              echo "<script type='text/javascript'>alert('Maaf Penduduk Yang Dipilih Sudah Pindah Domisili !.')</script>";
              echo "<script type='text/javascript'>history.go(-1)</script>";
            }elseif ($JmlPengikut==0) {
              $query = $dbconnect->query("INSERT INTO tb_mutasi_keluar VALUES('','$NIK1','$Kecamatan','$Kabupaten','$Provinsi','$PindahKe','$Alasan','$JmlPengikut')");

              $querylayanan = $dbconnect->query("INSERT INTO tb_layanan (id_jenissurat, id_penduduk, keperluan, isi) VALUES ('6','$NIK1', '-', '$Isi')");
              if ($query && $querylayanan) {
                echo "<script type='text/javascript'>window.location.href='?page=mukel';</script>";
              }
            }elseif ($JmlPengikut==1) {
              $query = $dbconnect->query("INSERT INTO tb_mutasi_keluar VALUES('','$NIK1','$Kecamatan','$Kabupaten','$Provinsi','$PindahKe','$Alasan','$JmlPengikut')");
              if ($query) {
                $selectid = $dbconnect->query("SELECT id_mutasi_keluar from tb_mutasi_keluar ORDER BY id_mutasi_keluar DESC LIMIT 1")->fetch_array();
                $querypengikut = $dbconnect->query("INSERT INTO tb_pengikut_keluar VALUES ('','$selectid[id_mutasi_keluar]','$NIK0')");
                if ($querypengikut) {
                  echo "<script type='text/javascript'>window.location.href='?page=mukel';</script>";
                }
              }
            }elseif ($JmlPengikut==2) {
              $query = $dbconnect->query("INSERT INTO tb_mutasi_keluar VALUES('','$NIK1','$Kecamatan','$Kabupaten','$Provinsi','$PindahKe','$Alasan','$JmlPengikut')");
              if ($query) {
                $selectid = $dbconnect->query("SELECT id_mutasi_keluar from tb_mutasi_keluar ORDER BY id_mutasi_keluar DESC LIMIT 1")->fetch_array();
                $querypengikut = $dbconnect->query("INSERT INTO tb_pengikut_keluar VALUES ('','$selectid[id_mutasi_keluar]','$NIK0'),('','$selectid[id_mutasi_keluar]','$NIK2')");
                if ($querypengikut) {
                  echo "<script type='text/javascript'>window.location.href='?page=mukel';</script>";
                }
              }
            }elseif ($JmlPengikut==3) {
              $query = $dbconnect->query("INSERT INTO tb_mutasi_keluar VALUES('','$NIK1','$Kecamatan','$Kabupaten','$Provinsi','$PindahKe','$Alasan','$JmlPengikut')");
              if ($query) {
                $selectid = $dbconnect->query("SELECT id_mutasi_keluar from tb_mutasi_keluar ORDER BY id_mutasi_keluar DESC LIMIT 1")->fetch_array();
                $querypengikut = $dbconnect->query("INSERT INTO tb_pengikut_keluar VALUES ('','$selectid[id_mutasi_keluar]','$NIK0'),('','$selectid[id_mutasi_keluar]','$NIK2'),('','$selectid[id_mutasi_keluar]','$NIK3')");
                if ($querypengikut) {
                  echo "<script type='text/javascript'>window.location.href='?page=mukel';</script>";
                }
              }
            }elseif ($JmlPengikut==4) {
              $query = $dbconnect->query("INSERT INTO tb_mutasi_keluar VALUES('','$NIK1','$Kecamatan','$Kabupaten','$Provinsi','$PindahKe','$Alasan','$JmlPengikut')");
              if ($query) {
                $selectid = $dbconnect->query("SELECT id_mutasi_keluar from tb_mutasi_keluar ORDER BY id_mutasi_keluar DESC LIMIT 1")->fetch_array();
                $querypengikut = $dbconnect->query("INSERT INTO tb_pengikut_keluar VALUES ('','$selectid[id_mutasi_keluar]','$NIK0'),('','$selectid[id_mutasi_keluar]','$NIK2'),('','$selectid[id_mutasi_keluar]','$NIK3'),('','$selectid[id_mutasi_keluar]','$NIK4')");
                if ($querypengikut) {
                  echo "<script type='text/javascript'>window.location.href='?page=mukel';</script>";
                }
              }
            }elseif ($JmlPengikut==5) {
              $query = $dbconnect->query("INSERT INTO tb_mutasi_keluar VALUES('','$NIK1','$Kecamatan','$Kabupaten','$Provinsi','$PindahKe','$Alasan','$JmlPengikut')");
              if ($query) {
                $selectid = $dbconnect->query("SELECT id_mutasi_keluar from tb_mutasi_keluar ORDER BY id_mutasi_keluar DESC LIMIT 1")->fetch_array();
                $querypengikut = $dbconnect->query("INSERT INTO tb_pengikut_keluar VALUES ('','$selectid[id_mutasi_keluar]','$NIK0'),('','$selectid[id_mutasi_keluar]','$NIK2'),('','$selectid[id_mutasi_keluar]','$NIK3'),('','$selectid[id_mutasi_keluar]','$NIK4'),('','$selectid[id_mutasi_keluar]','$NIK5')");
                if ($querypengikut) {
                  echo "<script type='text/javascript'>window.location.href='?page=mukel';</script>";
                }
              }
            }elseif ($JmlPengikut==6) {
              $query = $dbconnect->query("INSERT INTO tb_mutasi_keluar VALUES('','$NIK1','$Kecamatan','$Kabupaten','$Provinsi','$PindahKe','$Alasan','$JmlPengikut')");
              if ($query) {
                $selectid = $dbconnect->query("SELECT id_mutasi_keluar from tb_mutasi_keluar ORDER BY id_mutasi_keluar DESC LIMIT 1")->fetch_array();
                $querypengikut = $dbconnect->query("INSERT INTO tb_pengikut_keluar VALUES ('','$selectid[id_mutasi_keluar]','$NIK0'),('','$selectid[id_mutasi_keluar]','$NIK2'),('','$selectid[id_mutasi_keluar]','$NIK3'),('','$selectid[id_mutasi_keluar]','$NIK4'),('','$selectid[id_mutasi_keluar]','$NIK5'),('','$selectid[id_mutasi_keluar]','$NIK6')");
                if ($querypengikut) {
                  echo "<script type='text/javascript'>window.location.href='?page=mukel';</script>";
                }
              }
            }elseif ($JmlPengikut==7) {
              $query = $dbconnect->query("INSERT INTO tb_mutasi_keluar VALUES('','$NIK1','$Kecamatan','$Kabupaten','$Provinsi','$PindahKe','$Alasan','$JmlPengikut')");
              if ($query) {
                $selectid = $dbconnect->query("SELECT id_mutasi_keluar from tb_mutasi_keluar ORDER BY id_mutasi_keluar DESC LIMIT 1")->fetch_array();
                $querypengikut = $dbconnect->query("INSERT INTO tb_pengikut_keluar VALUES ('','$selectid[id_mutasi_keluar]','$NIK0'),('','$selectid[id_mutasi_keluar]','$NIK2'),('','$selectid[id_mutasi_keluar]','$NIK3'),('','$selectid[id_mutasi_keluar]','$NIK4'),('','$selectid[id_mutasi_keluar]','$NIK5'),('','$selectid[id_mutasi_keluar]','$NIK6'),('','$selectid[id_mutasi_keluar]','$NIK7')");
                if ($querypengikut) {
                  echo "<script type='text/javascript'>window.location.href='?page=mukel';</script>";
                }
              }
            }
           } ?>
        </div>
    </div>
  </div>
  <?php }elseif ($aksi=="lihat") { ?>

  <hr>
  <div class="container-fluid">
    <!-- <div class="row-fluid"> -->
      <!-- <div class="span12"> -->
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Data Pengikut</h5>
            <a href="?page=mukel" class="label label-info btn btn-mini btn-info">Lihat Data</a>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>No</th>
                  <th>NIK Pengikut</th>
                  <th>Nama Lengkap</th>
                  <th>Jenis Kelamin</th>
                  <th>SHDK</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                $Kode = $_GET['kode'];
                $query = $dbconnect -> query("SELECT
				*
				FROM
				tb_mutasi_keluar
				Inner Join tb_pengikut_keluar ON tb_mutasi_keluar.id_mutasi_keluar = tb_pengikut_keluar.id_mutasi
				Inner Join tb_penduduk ON tb_penduduk.nik = tb_pengikut_keluar.nik where tb_pengikut_keluar.id_mutasi='$Kode'");
                while ($data = $query -> fetch_array()) {
                @$no++;
                ?>
                <tr class="gradeX">
                  <td style="text-align: center;"><?php echo $no;; ?></td>
                  <td><?php echo $data['nik']; ?></td>
                  <td><?php echo $data['nama_lengkap']; ?></td>
                  <td><?php echo $data['jk']; ?></td>
                  <td style="text-align: center;">
                  	<?php echo $data['stat_hub_kel']; ?>
                  	<!-- <a href="?page=mukel&aksi=lihat&kode=<?php echo $data['id_mutasi_keluar'] ?>" class="btn btn-mini btn-info">Lihat Pengikut</a> -->
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
  <?php }else{ ?>
  <hr>
  <div class="container-fluid">
    <!-- <div class="row-fluid"> -->
      <!-- <div class="span12"> -->
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Data Mutasi Keluar</h5>
            <a href="?page=mukel&&aksi=tambah" class="label label-info btn btn-mini btn-info">Tambah Data</a>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Pemohon</th>
                  <th>Pindah Ke</th>
                  <th>Alasan</th>
                  <th>Pengikut</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                $query = $dbconnect -> query("SELECT
					tb_provinsi.provinsi,
					tb_kabupaten.kabupaten,
					tb_kecamatan.kecamatan,
					tb_penduduk.nama_lengkap,
					tb_mutasi_keluar.pindah_ke,
					tb_mutasi_keluar.alasan_pindah,
					tb_mutasi_keluar.id_mutasi_keluar,
					tb_mutasi_keluar.pengikut
					FROM
					tb_mutasi_keluar
					Inner Join tb_kabupaten ON tb_kabupaten.id_kabupaten = tb_mutasi_keluar.id_kabupaten
					Inner Join tb_kecamatan ON tb_kecamatan.id_kabupaten = tb_kabupaten.id_kabupaten AND tb_kecamatan.id_kecamatan = tb_mutasi_keluar.id_kecamatan
					Inner Join tb_provinsi ON tb_kabupaten.id_provinsi = tb_provinsi.id_provinsi AND tb_provinsi.id_provinsi = tb_mutasi_keluar.id_provinsi
					Inner Join tb_penduduk ON tb_penduduk.nik = tb_mutasi_keluar.nik_penduduk
          order by tb_mutasi_keluar.id_mutasi_keluar DESC");
                while ($data = $query -> fetch_array()) {
                @$no++;
                ?>
                <tr class="gradeX">
                  <td style="text-align: center;"><?php echo $no;; ?></td>
                  <td><?php echo $data['nama_lengkap']; ?></td>
                  <td><?php echo $data['pindah_ke'].", Kecamatan ".$data['kecamatan'].", Kabupaten ".$data['kabupaten'].", Provinsi ".$data['provinsi']; ?></td>
                  <td><?php echo $data['alasan_pindah']; ?></td>
                  <td><?php echo $data['pengikut']." Orang"; ?></td>
                  <td style="text-align: center;">
                  	<a href="?page=mukel&aksi=lihat&kode=<?php echo $data['id_mutasi_keluar'] ?>" class="btn btn-mini btn-info">Lihat Pengikut</a>
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
     var Kode = $(this).val(); // Ciptakan variabel kelas
     $.ajax({
            type: 'POST', // Metode pengiriman data menggunakan POST
          url: 'prosess.php', // File yang akan memproses data
         data: 'id_nama=' + Kode, // Data yang akan dikirim ke file pemroses
         success: function(response) { // Jika berhasil
              $('#i_pengikut').html(response); // Berikan hasil ke id penugasan
            }
       });
    });
  });
  $(document).ready(function() {
   $('#i_provinsi').change(function() { // Jika Select Box id kelas dipilih
     var KodeRW = $(this).val(); // Ciptakan variabel kelas
     $.ajax({
            type: 'POST', // Metode pengiriman data menggunakan POST
          url: 'proseskab.php', // File yang akan memproses data
         data: 'id_prov=' + KodeRW, // Data yang akan dikirim ke file pemroses
         success: function(response) { // Jika berhasil
              $('#i_kabupaten').html(response); // Berikan hasil ke id penugasan
            }
       });
    });
  });
  $(document).ready(function() {
   $('#i_kabupaten').change(function() { // Jika Select Box id kelas dipilih
     var KodeRW = $(this).val(); // Ciptakan variabel kelas
     $.ajax({
            type: 'POST', // Metode pengiriman data menggunakan POST
          url: 'proseskec.php', // File yang akan memproses data
         data: 'id_kab=' + KodeRW, // Data yang akan dikirim ke file pemroses
         success: function(response) { // Jika berhasil
              $('#i_kecamatan').html(response); // Berikan hasil ke id penugasan
            }
       });
    });
  });
  function HitungNIK() {
    var nik = document.forminput.i_nik.value.length;
    var seharusnya = 16;
    var jumlah = seharusnya-nik;
    var sisa = document.getElementById('sisa');
    if (nik==16) {sisa.innerHTML = ' '};
    if (nik>16) {
      sisa.innerHTML = 'Tidak Boleh Lebih Dari 16 digit, Jumlah '+nik;
      document.getElementById('i_nik').required;
    };
    if (nik<16) {sisa.innerHTML = 'Tidak Boleh Kurang Dari 16 digit, Sisa '+jumlah;};
  }

  function HitungNOKK () {
    var nokk = document.forminput.i_nokk.value.length;
    var seharusnya = 16;
    var jumlah = seharusnya-nokk;
    var sisa = document.getElementById('sisakk');
    if (nokk==16) {sisa.innerHTML = ' '};
    if (nokk>16) {sisa.innerHTML = 'Tidak Boleh Lebih Dari 16 digit, Jumlah '+nokk;};
    if (nokk<16) {sisa.innerHTML = 'Tidak Boleh Kurang Dari 16 digit, Sisa '+jumlah;};
  }
</script>