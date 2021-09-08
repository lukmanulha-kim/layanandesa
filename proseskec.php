<?php

include 'koneksi.php';

$tampil=mysqli_query($dbconnect, "SELECT * from tb_kecamatan where id_kabupaten = '$_POST[id_kab]'");
$jml=mysqli_num_rows($tampil);
if($jml > 0){
echo"<option selected>- Pilih Kecamatan -</option>";
while($r=mysqli_fetch_array($tampil)){
echo "<option value=$r[id_kecamatan]>$r[kecamatan]</option>";
}}else{
    echo "<option selected>- Data Wilayah Tidak Ada, Pilih Yang Lain -</option>";
}
?>