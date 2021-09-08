<?php include 'koneksi.php'; ?>
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Hal Pencarian</a> </div>
    <h1>Pencarian</h1>
  </div>
  <?php
    @$aksi = $_GET['aksi'];
    if ($aksi == "cari") {
  ?>
  <hr>
  <div class="container-fluid">
    <div class="widget-box">
      <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
        <h5>Data Penduduk</h5>
        <!-- <a href="?page=penduduk&&aksi=tambah" class="label label-info btn btn-mini btn-info">Tambah Data</a> -->
        <a href="?page=pencarian" data-toggle="modal" class="label label-warning btn btn-mini btn-warning">Pencarian</a>
      </div>
      <div class="widget-content nopadding">
        <table class="table table-bordered data-table">
          <thead>
            <tr>
              	<th>No</th>
				<th>NIK-No KK</th>
				<th>Nama Lengkap</th>
				<th>Alamat</th>
				<th>JK</th>
				<th>Agama</th>
				<th>Ket</th>
		        <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            if (isset($_POST['cari'])) {
		  		$bagianWhere = "";

			if (isset($_POST['nikCat']))
			{
			   $nik = $_POST['i_nik'];
			   if (empty($bagianWhere))
			   {
			        $bagianWhere .= "nik = '$nik'";
			   }
			}

			if (isset($_POST['kkCat']))
			{
			   $nokk = $_POST['i_nokk'];
			   if (empty($bagianWhere))
			   {
			        $bagianWhere .= "no_kk = '$nokk'";
			   }
			   else
			   {
			        $bagianWhere .= " AND no_kk = '$nokk'";
			   }
			}

			if (isset($_POST['namaCat']))
			{
			   $nama = $_POST['i_naleng'];
			   if (empty($bagianWhere))
			   {
			        $bagianWhere .= "nama_lengkap LIKE '%$nama%'";
			   }
			   else
			   {
			        $bagianWhere .= " AND nama_lengkap LIKE '%$nama%'";
			   }
			}

			if (isset($_POST['alamatCat']))
			{
			   $alamat = $_POST['i_alamat'];
			   if (empty($bagianWhere))
			   {
			        $bagianWhere .= "alamat LIKE '%$alamat%'";
			   }
			   else
			   {
			        $bagianWhere .= " AND alamat LIKE '%$alamat%'";
			   }
			}

			if (isset($_POST['dusunCatCat']))
			{
			   $dusun = $_POST['i_dusun'];
			   if (empty($bagianWhere))
			   {
			        $bagianWhere .= "kode_dusun = '$dusun'";
			   }
			   else
			   {
			        $bagianWhere .= " AND kode_dusun = '$dusun'";
			   }
			}

			if (isset($_POST['rtCat']))
			{
			   $rt = $_POST['i_rt'];
			   if (empty($bagianWhere))
			   {
			        $bagianWhere .= "kode_rt = '$rt'";
			   }
			   else
			   {
			        $bagianWhere .= " AND kode_rt = '$rt'";
			   }
			}

			if (isset($_POST['rwCat']))
			{
			   $rw = $_POST['i_jenis'];
			   if (empty($bagianWhere))
			   {
			        $bagianWhere .= "kode_rw = '$rw'";
			   }
			   else
			   {
			        $bagianWhere .= " AND kode_rw = '$rw'";
			   }
			}

			if (isset($_POST['kelaminCat']))
			{
			   $kelamin = $_POST['i_jenis'];
			   if (empty($bagianWhere))
			   {
			        $bagianWhere .= "jk = '$kelamin'";
			   }
			   else
			   {
			        $bagianWhere .= " AND jk = '$kelamin'";
			   }
			}

			if (isset($_POST['tempatCat']))
			{
			   $tempat = $_POST['i_tempat'];
			   if (empty($bagianWhere))
			   {
			        $bagianWhere .= "tpt_lahir LIKE '%$tempat%'";
			   }
			   else
			   {
			        $bagianWhere .= " AND tpt_lahir LIKE '%$tempat%'";
			   }
			}

			if (isset($_POST['tanggalCat']))
			{
			   $tanggal = $_POST['i_tanggal'];
			   if (empty($bagianWhere))
			   {
			        $bagianWhere .= "tgl_lahir = '$tanggal'";
			   }
			   else
			   {
			        $bagianWhere .= " AND tgl_lahir = '$tanggal'";
			   }
			}

			if (isset($_POST['goldarCat']))
			{
			   $goldar = $_POST['i_goldar'];
			   if (empty($bagianWhere))
			   {
			        $bagianWhere .= "goldar = '$goldar'";
			   }
			   else
			   {
			        $bagianWhere .= " AND goldar = '$goldar'";
			   }
			}

			if (isset($_POST['agamaCat']))
			{
			   $agama = $_POST['i_agama'];
			   if (empty($bagianWhere))
			   {
			        $bagianWhere .= "agama = '$agama'";
			   }
			   else
			   {
			        $bagianWhere .= " AND agama = '$agama'";
			   }
			}

			if (isset($_POST['pendidikanCat']))
			{
			   $pendidikan = $_POST['i_pend'];
			   if (empty($bagianWhere))
			   {
			        $bagianWhere .= "pendidikan = '$pendidikan'";
			   }
			   else
			   {
			        $bagianWhere .= " AND pendidikan = '$pendidikan'";
			   }
			}

			if (isset($_POST['pekerjaanCat']))
			{
			   $pekerjaan = $_POST['i_pekerjaan'];
			   if (empty($bagianWhere))
			   {
			        $bagianWhere .= "pekerjaan = '$pekerjaan'";
			   }
			   else
			   {
			        $bagianWhere .= " AND pekerjaan = '$pekerjaan'";
			   }
			}

			if (isset($_POST['statkaCat']))
			{
			   $statka = $_POST['i_statkawin'];
			   if (empty($bagianWhere))
			   {
			        $bagianWhere .= "stat_kawin = '$statka'";
			   }
			   else
			   {
			        $bagianWhere .= " AND stat_kawin = '$statka'";
			   }
			}

			if (isset($_POST['stathubCat']))
			{
			   $stathub = $_POST['i_statka'];
			   if (empty($bagianWhere))
			   {
			        $bagianWhere .= "stat_hub_kel = '$stathub'";
			   }
			   else
			   {
			        $bagianWhere .= " AND stat_hub_kel = '$stathub'";
			   }
			}

			if (isset($_POST['nopasCat']))
			{
			   $nopas = $_POST['i_nopaspor'];
			   if (empty($bagianWhere))
			   {
			        $bagianWhere .= "no-passpor = '$nopas'";
			   }
			   else
			   {
			        $bagianWhere .= " AND no-passpor = '$nopas'";
			   }
			}

			if (isset($_POST['tglpasCat']))
			{
			   $tglpas = $_POST['i_tgpaspor'];
			   if (empty($bagianWhere))
			   {
			        $bagianWhere .= "tgl_akhir_passpor = '$tglpas'";
			   }
			   else
			   {
			        $bagianWhere .= " AND tgl_akhir_passpor = '$tglpas'";
			   }
			}

			if (isset($_POST['ayahCat']))
			{
			   $ayah = $_POST['i_ayah'];
			   if (empty($bagianWhere))
			   {
			        $bagianWhere .= "ayah LIKE '%$ayah%'";
			   }
			   else
			   {
			        $bagianWhere .= " AND ayah LIKE '%$ayah%'";
			   }
			}

			if (isset($_POST['ibuCat']))
			{
			   $ibu = $_POST['i_ibu'];
			   if (empty($bagianWhere))
			   {
			        $bagianWhere .= "ibu LIKE '%$ibu%'";
			   }
			   else
			   {
			        $bagianWhere .= " AND ibu LIKE '%$ibu%'";
			   }
			}
			}
            $query = $dbconnect -> query("SELECT * FROM tb_penduduk where ".$bagianWhere);
            while ($data = $query -> fetch_array()) {
            @$no++;
            $cek2 = $dbconnect->query("SELECT nik_penduduk FROM tb_mutasi_keluar");
            while ($data1=$cek2->fetch_array()) {
              $DataNIK = $data1['nik_penduduk'];
            }
            $cek3 = $dbconnect->query("SELECT nik FROM tb_pengikut_keluar");
            while ($data2=$cek3->fetch_array()) {
              $DataNIK2 = $data2['nik'];
            }
            if ($data['nik']==$DataNIK) {
              $Ket = "Pindah";
            }else{
              $Ket = "-";
            }
            ?>
            <tr class="gradeX">
              	<td style="text-align: center;"><?php echo $no; ?></td>
				<td>NIK : <?php echo $data['nik']." <br> No KK : ".$data['no_kk']; ?></td>
				<td><?php echo $data['nama_lengkap']; ?></td>
				<td><?php echo $data['alamat']; ?></td>
				<td><?php echo $data['jk']; ?></td>
				<td><?php echo $data['agama']; ?></td>
				<td style="text-align: center;"><?php echo $Ket; ?></td>

				<td style="text-align: center;">
	            	<?php if ($data['kode_dusun']==0) {?>
	                  <span class="label label-danger">Data Kelahiran</span>
	                <?php }else{ ?>
	                  <a href="?page=penduduk&&aksi=detail&&kode=<?php echo $data['nik'] ?>" class="btn btn-mini btn-info">Detail</a>
	                  <!-- <a href="?page=penduduk&&aksi=edit&&kode=<?php echo $data['nik'] ?>" class="btn btn-mini btn-warning">Edit</a> -->
	                <?php } ?>
				</td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <?php }else{ ?>
  <hr>
  <div class="container-fluid">
    <div class="widget-box">
      <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
        <h5>Tambah Data Penduduk</h5>
        <a href="?page=penduduk" class="label label-info btn btn-mini btn-info">Lihat Data</a>
      </div>
      <div class="widget-content nopadding">
        <form action="?page=pencarian&&aksi=cari" method="post" name="forminput" class="form-horizontal">
          
          <div class="control-group" id="div">
            <label for="normal" class="control-label"><input type="checkbox" name="nikCat"> NIK</label>
            <div class="controls">
              <input type="number" id="i_nik" name="i_nik" class="span8" onkeyup="HitungNIK()">
              <span class="help-inline" id="pesan"></span> <span class="help-inline" id="sisa"></span> </div>
          </div>

          <div class="control-group">
            <label for="normal" class="control-label"><input type="checkbox" name="kkCat"> No KK</label>
            <div class="controls">
              <input type="number" name="i_nokk" class="span8" onkeyup="HitungNIK()">
              <span class="help-inline" id="sisakk"></span> </div>
          </div>

          <div class="control-group">
            <label for="normal" class="control-label"><input type="checkbox" name="namaCat"> Nama Lengkap</label>
            <div class="controls">
              <input type="text" name="i_naleng" class="span8">
              <!-- <span class="help-block blue span8">(999) 999-9999</span> --> </div>
          </div>

          <div class="control-group">
            <label for="normal" class="control-label"> <input type="checkbox" name="alamatCat">Alamat </label>
            <div class="controls">
              <textarea name="i_alamat" class="span8" >Pecalongan</textarea>
              <!-- <span class="help-block blue span8">(999) 999-9999</span> --> </div>
          </div>

          <div class="control-group">
            <label class="control-label"><input type="checkbox" name="dusunCat"> Pilih Dusun</label>
            <div class="controls">
              	<select name="i_dusun" id="i_dusun">
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

          <div class="control-group">
            <label class="control-label"><input type="checkbox" name="rwCat">Pilih RW</label>
            <div class="controls">
              	<select name="i_rw" id="i_rw">
					<option>--Pilih RW--</option>
					<?php 
  					$queryrw = $dbconnect -> query("SELECT * FROM tb_rw");
  					while ($datarw = $queryrw -> fetch_array()) {
  					?>
  					<option value="<?php echo $datarw['id_rw'] ?>"><?php echo $datarw['no_rw'] ?></option>
  					<?php } ?>
				</select>
            </div>
          </div>

          <div class="control-group">
            <label class="control-label"><input type="checkbox" name="rtCat"> Pilih RT</label>
            <div class="controls">
              <select name="i_rt" id="i_rt">
                <option>--Pilih RT--</option>
                <?php 
                  $queryrt = $dbconnect -> query("SELECT * FROM tb_rt");
                  while ($datart = $queryrt -> fetch_array()) {
                  ?>
                  <option value="<?php echo $datart['id_rt'] ?>"><?php echo $datart['no_rt'] ?></option>
                <?php } ?>
              </select>
            </div>
          </div>

          <div class="control-group">
            <label class="control-label"><input type="checkbox" name="kelaminCat"> Jenis Kelamin </label>
            <div class="controls">
              <label>
                <input type="radio" name="i_jenis" value="Laki-Laki" />
                Laki-Laki</label>
              <label>
                <input type="radio" name="i_jenis" value="Perempuan" />
                Perempuan</label>
            </div>
          </div>

          <div class="control-group">
            <label for="normal" class="control-label"><input type="checkbox" name="tempatCat"> Tempat Lahir</label>
            <div class="controls">
              <input type="text" name="i_tempat" class="span8">
              <!-- <span class="help-block blue span8">(999) 999-9999</span> --> </div>
          </div>

          <div class="control-group">
            <label for="normal" class="control-label"><input type="checkbox" name="tanggalCat"> Tanggal Lahir</label>
            <div class="controls">
              <input type="date" name="i_tanggal" class="span8">
              <!-- <span class="help-block blue span8">(999) 999-9999</span> --> </div>
          </div>

          <div class="control-group">
            <label class="control-label"><input type="checkbox" name="goldarCat"> Pilih Golongan Darah</label>
              <div class="controls">
  	            <select name="i_goldar">
					<option value="-">Pilih Golongan Darah</option>
					<option value="A">A</option>
					<option value="B">B</option>
					<option value="AB">AB</option>
					<option value="O">O</option>
				</select>
    			  </div>
          </div>

    			<div class="control-group">
            <label class="control-label"><input type="checkbox" name="agamaCat"> Pilih Agama</label>
              <div class="controls">
                <select name="i_agama">
					<option >Pilih Agama</option>
					<option value="Islam">Islam</option>
					<option value="Kristen">Kristen</option>
					<option value="Budha">Budha</option>
					<option value="Protestan">Protestan</option>
					<option value="Konghuchu">Konghuchu</option>
					<option value="Lain-Lain">Lain-Lain</option>
				</select>
      			  </div>
    			</div>

          <div class="control-group">
            <label class="control-label"><input type="checkbox" name="pendidikanCat"> Pilih Pendidikan</label>
            <div class="controls">
              <select name="i_pend">
                <option>--Pilih Pendidikan--</option>
                <?php 
                $querypendidikan = $dbconnect -> query("SELECT * FROM tb_pendidikan");
                while ($datapendidikan = $querypendidikan -> fetch_array()) {
                ?>
                <option value="<?php echo $datapendidikan['id_pendidikan'] ?>"><?php echo $datapendidikan['pendidikan'] ?></option>
                <?php } ?>
              </select>
            </div>
          </div>

			     <div class="control-group">
              <label class="control-label"><input type="checkbox" name="pekerjaanCat"> Pilih Pekerjaan</label>
              <div class="controls">
                <select name="i_pekerjaan">
					<option>--Pilih Pekerjaan--</option>
					<?php 
					$querypekerjaan = $dbconnect -> query("SELECT * FROM tb_pekerjaan");
					while ($datapekerjaan = $querypekerjaan -> fetch_array()) {
					?>
					<option value="<?php echo $datapekerjaan['id_pekerjaan'] ?>"><?php echo $datapekerjaan['nama_pekerjaan'] ?></option>
					<?php } ?>
				</select>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label"><input type="checkbox" name="statkaCat"> Status Kawin</label>
              <div class="controls">
                <label>
                  <input type="radio" name="i_statkawin" value="Belum Menikah" />
                  Belum Menikah</label>
                <label>
                  <input type="radio" name="i_statkawin" value="Menikah" />
                  Menikah</label>
                <label>
                  <input type="radio" name="i_statkawin" value="Cerai" />
                  Cerai</label>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label"><input type="checkbox" name="stathubCat">Status Hub Keluarga</label>
              <div class="controls">
                <label>
                  <input type="radio" name="i_statka" value="Kepala Keluarga" />
                  Kepala Keluarga</label>
                <label>
                  <input type="radio" name="i_statka" value="Istri" />
                  Istri</label>
                <label>
                  <input type="radio" name="i_statka" value="Anak" />
                  Anak</label>
              </div>
            </div>

            <div class="control-group">
              <label for="normal" class="control-label"><input type="checkbox" name="nopasCat">No Paspor</label>
              <div class="controls">
                <input type="text" name="i_nopaspor" class="span8">
                <!-- <span class="help-block blue span8">(999) 999-9999</span> --> </div>
            </div>

            <div class="control-group">
              <label for="normal" class="control-label"><input type="checkbox" name="tglpasCat">Tgl Akhir Paspor</label>
              <div class="controls">
                <input type="date" name="i_tgpaspor" class="span8">
                <!-- <span class="help-block blue span8">(999) 999-9999</span> --> </div>
            </div>

            <div class="control-group">
              <label for="normal" class="control-label"><input type="checkbox" name="ayahCat">Nama Ayah</label>
              <div class="controls">
                <input type="text" name="i_ayah" class="span8">
                <!-- <span class="help-block blue span8">(999) 999-9999</span> --> </div>
            </div>

            <div class="control-group">
              <label for="normal" class="control-label"><input type="checkbox" name="ibuCat">Nama Ibu</label>
              <div class="controls">
                <input type="text" name="i_ibu" class="span8">
                <!-- <span class="help-block blue span8">(999) 999-9999</span> --> </div>
            </div>

            <div class="form-actions">
              <input type="submit" name="cari" class="btn btn-success" value="Carai Data">
            </div>
        </form>
      </div>
    </div>
  </div>
  <?php } ?>
</div>
<div id="myModal" class="modal hide">
  <div class="modal-header">
    <button data-dismiss="modal" class="close" type="button">×</button>
    <h3>Info</h3>
  </div>
  <div class="modal-body">
    <p>Silahkan Edit Melalui Halaman <a href="?page=kelahiran" class="btn btn-danger">Kelahiran</a></p>
  </div>
</div>
<script type="text/javascript">
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