<?php include 'koneksi.php'; ?>
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Data Pelayanan</a> </div>
    <h1>Data Pelayanan</h1>
  </div>
  <?php
    @$aksi = $_GET['aksi'];
    if ($aksi == "det") {
  ?>
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
  <?php }elseif ($aksi=="cetak") {?>
  <hr>
  <div class="container-fluid">
    <div class="widget-box">
      <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
        <h5>Tambah Data RT</h5>
        <a href="?page=pelayanan" class="label label-info btn btn-mini btn-info">Lihat Data</a>
      </div>
      <div class="widget-content nopadding">
        <form action="pdf/lap_pel.php" method="post" class="form-horizontal" target="blank">
          <div class="control-group">
            <label class="control-label">Pilih Bulan</label>
            <div class="controls">
              <select name="i_bulan">
                <option>--Pilih Bulan--</option>
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
          <label class="control-label">Jenis</label>
          <div class="controls">
            <label>
              <input type="radio" name="i_jenis" value="Administrasi" />
              Administrasi</label>
            <label>
              <input type="radio" name="i_jenis" value="Formulir" />
              Formulir</label>
          </div>
        </div>
          <div class="form-actions">
            <input type="submit" name="simpan" class="btn btn-success" value="Simpan">
          </div>
        </form>
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
                $query = $dbconnect -> query("SELECT * FROM tb_layanan Inner Join tb_jenissurat ON tb_jenissurat.id_jenis = tb_layanan.id_jenissurat Inner Join tb_penduduk ON tb_penduduk.nik = tb_layanan.id_penduduk where tb_layanan.tgl_pelayanan!=0 order by tb_layanan.no_surat DESC");
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
                    <a href="?page=pelayanan&&aksi=det&&kode=<?php echo $data['id_pelayanan'] ?>" class="btn btn-mini btn-info">Detail</a>
                    <!-- <a href="pdf/skusaha.php?kode=<?php echo $data['id_pelayanan'] ?>" data-target="_self" class="btn btn-mini btn-info" target="blank">Cetak</a> -->
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