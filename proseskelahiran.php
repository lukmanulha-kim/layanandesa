<?php

include 'koneksi.php';


$tampil=mysqli_query($dbconnect, "SELECT * from tb_penduduk where stat_hub_kel='Istri'");
$jml=mysqli_num_rows($tampil);
if($jml > 0){
echo"<option>- Pilih Ibu -</option>";
while($r=mysqli_fetch_array($tampil)){
echo "<option value=$r[nik]>$r[nama_lengkap] - $r[stat_hub_kel]</option>";
}}else{
    echo "<option selected value='0'>0</option>";
}

