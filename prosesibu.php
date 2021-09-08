<?php

include 'koneksi.php';

$Pisah = explode(",", $_POST['id_nama']);
$NOKK = $Pisah[0];
$NIK1 = $Pisah[1];

$tampil=mysqli_query($dbconnect, "SELECT * from tb_penduduk where no_kk = '$NOKK' AND nik != '$NIK1' AND stat_hub_kel='Istri'");
$jml=mysqli_num_rows($tampil);
if($jml > 0){
echo"<option>- Pilih Pengikut -</option>";
while($r=mysqli_fetch_array($tampil)){
echo "<option value=$r[nik]>$r[nama_lengkap] - $r[stat_hub_kel]</option>";
}}else{
    echo "<option selected value='0'>0</option>";
}

