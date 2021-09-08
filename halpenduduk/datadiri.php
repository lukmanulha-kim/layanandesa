<?php  
include 'koneksi.php';
$NIK = $_POST['i_nik'];

$cek = mysqli_query($dbconnect, "SELECT nik FROM tb_penduduk where nik='$NIK'");
$cek2 = mysqli_query($dbconnect, "SELECT nik_penduduk FROM tb_mutasi_keluar where nik_penduduk='$NIK'");
$cek3 = mysqli_query($dbconnect, "SELECT nik FROM tb_pengikut_keluar where nik='$NIK'");

$cekquery = mysqli_num_rows($cek);
$cekquery2 = mysqli_num_rows($cek2);
$cekquery3 = mysqli_num_rows($cek3);

if($cekquery<1) {
  echo "<script type='text/javascript'>alert('Maaf Anda Belum Terdaftar Sebagai Penduduk Desa Pecalongan. Silahkan Hubungi Aparat Desa !.')</script>";
  echo "<script type='text/javascript'>history.go(-1)</script>";
}elseif($cekquery2>0 || $cekquery3>0){
  echo "<script type='text/javascript'>alert('Maaf Anda Tidak Bisa Mendapatkan Pelayanan Karena Sudah Pindah Domisili !.')</script>";
  echo "<script type='text/javascript'>history.go(-1)</script>";
}else{

$data = $dbconnect->query("SELECT
tb_rt.no_rt,
tb_dusun.nama_dusun,
tb_rw.no_rw,
tb_penduduk.nama_lengkap,
tb_pekerjaan.nama_pekerjaan,
tb_pendidikan.pendidikan,
tb_penduduk.nik,
tb_penduduk.no_kk,
tb_penduduk.alamat,
tb_penduduk.jk,
tb_penduduk.tpt_lahir,
tb_penduduk.tgl_lahir,
tb_penduduk.goldar,
tb_penduduk.agama,
tb_penduduk.stat_kawin,
tb_penduduk.stat_hub_kel
FROM
tb_penduduk
Inner Join tb_rw ON tb_rw.id_rw = tb_penduduk.kode_rw
Inner Join tb_rt ON tb_rt.id_rt = tb_penduduk.kode_rt
Inner Join tb_dusun ON tb_dusun.id_dusun = tb_penduduk.kode_dusun
Inner Join tb_pekerjaan ON tb_pekerjaan.id_pekerjaan = tb_penduduk.pekerjaan
Inner Join tb_pendidikan ON tb_pendidikan.id_pendidikan = tb_penduduk.pendidikan
where tb_penduduk.nik=$NIK")->fetch_array();
?>
<section id="title" class="emerald">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <h1>Layanan Desa</h1>
                <p>Pastikan Anda Memasukkan Data Dengan Benar</p>
            </div>
            <div class="col-sm-6">
                <ul class="breadcrumb pull-right">
                    <li><a href="Awal">Home</a></li>
                    <li class="active">Layanan</li>
                </ul>
            </div>
        </div>
    </div>
</section><!--/#title-->

<section id="about-us" class="container">
    <div class="row">
        <div class="col-sm-6">
            <h2>Data Diri Anda</h2>
            <table class="table table-bordered table-striped table-hover">
                <tr>
                    <th>NIK</th>
                    <td><?php echo $data['nik'] ?></td>
                </tr>
                <tr>
                    <th>Nomor KK</th>
                    <td><?php echo $data['no_kk']; ?></td>
                </tr>
                <tr>
                    <th>Nama</th>
                    <td><?php echo $data['nama_lengkap'] ?></td>
                </tr>
                <tr>
                    <th>Alamat</th>
                    <td>Desa <?php echo $data['alamat']." RT ".$data['no_rt']." RW ".$data['no_rw']." Kecamatan Sukosari Kabupaten Bondowoso."; ?></td>
                </tr>
                <tr>
                    <th>Tempat Lahir</th>
                    <td><?php echo $data['tpt_lahir'] ?></td>
                </tr>
                <tr>
                    <th>Tanggal Lahir</th>
                    <td><?php echo $data['tgl_lahir'] ?></td>
                </tr>
                <tr>
                    <th>Jenis Kelamin</th>
                    <td><?php echo $data['jk'] ?></td>
                </tr>
                <tr>
                    <th>Golongan Darah</th>
                    <td><?php echo $data['goldar'] ?></td>
                </tr>
                <tr>
                    <th>Agama</th>
                    <td><?php echo $data['agama'] ?></td>
                </tr>
                <tr>
                    <th>Pendidikan</th>
                    <td><?php echo $data['pendidikan'] ?></td>
                </tr>
                <tr>
                    <th>Pekerjaan</th>
                    <td><?php echo $data['nama_pekerjaan'] ?></td>
                </tr>
                <tr>
                    <th>Status Kawin</th>
                    <td><?php echo $data['stat_kawin'] ?></td>
                </tr>
                <tr>
                    <th>SHDK</th>
                    <td><?php echo $data['stat_hub_kel'] ?></td>
                </tr>
            </table>
        </div><!--/.col-sm-6-->
        <div class="col-sm-6">
            <h2>Dapatkan Layanan</h2>
            <form action="" method="post">
                <fieldset class="registration-form col-sm-12">
                    <div class="form-group">
                        <input type="text" name="i_nik" class="form-control" value="<?php echo $data['nik'] ?>" readonly>
                    </div>
                    <div class="form-group" required>
                        <select name="i_jenis" class="form-control">
                            <option value="">Pilih Surat</option>
                            <?php  
                            $querysurat = $dbconnect->query("SELECT * FROM tb_jenissurat where id_jenis!=4 and id_jenis!=6");
                            while ($datasurat = $querysurat->fetch_array()) {
                            ?>
                            <option value="<?php echo $datasurat['id_jenis'] ?>"><?php echo $datasurat['nama_surat'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="i_keperluan"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="simpan" class="btn btn-info" value="Get Layanan">
                    </div>
                </fieldset>
            </form>
            <?php  
            if (isset($_POST['simpan'])) {
                $NIK = $_POST['i_nik'];
                $Jenis = $_POST['i_jenis'];
                $Keperluan = $_POST['i_keperluan'];

                // $querycek = $dbconnect->query("SELECT nik_penduduk FROM tb_mutasi_keluar");
                // while ($datacek=$querycek->fetch_array()) {
                //     $DataCek = $datacek['nik_penduduk'];
                // }
                // $querycek2 = $dbconnect->query("SELECT nik FROM tb_pengikut_keluar");
                // while ($datacek2=$querycek2->fetch_array()) {
                //     $DataCek2 = $datacek2['nik'];
                // }
                // if ($DataCek==$NIK) {
                //     echo "<script type='text/javascript'>alert('Anda Sudah Pindah Dari Desa Pecalongan')</script>";
                // }elseif ($DataCek2==$NIK) {
                //     echo "<script type='text/javascript'>alert('Anda Sudah Pindah Dari Desa Pecalongan')</script>";
                // }

                $query = $dbconnect->query("INSERT into tb_layanan (id_pelayanan, id_jenissurat, id_penduduk, keperluan) VALUES ('', '".$Jenis."', '".$NIK."','".$Keperluan."')");
                if ($query) {
                    echo "<script type='text/javascript'>alert('Terimakasih !. :) Permohonan Anda Akan Segera Dilayani')</script>";
                    echo "<script type='text/javascript'>window.location.href='Awal';</script>";
                }
            }
            ?>
        </div><!--/.col-sm-6-->
    </div><!--/.row-->
    </section><!--/#about-us-->
<?php } ?>