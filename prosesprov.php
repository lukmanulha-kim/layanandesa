<?php

include 'koneksi.php';

$tampil=mysqli_query($dbconnect, "SELECT * from tb_kabupaten where id_provinsi = '$_POST[id_prov]'");
$jml=mysqli_num_rows($tampil);
if($jml > 0){
echo"<option selected>- Pilih Kota -</option>";
while($r=mysqli_fetch_array($tampil)){
echo "<option value=$r[id_kabupaten]>$r[kabupaten]</option>";
}}else{
    echo "<option selected>- Data Wilayah Tidak Ada, Pilih Yang Lain -</option>";
}
?>