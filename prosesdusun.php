<?php

include 'koneksi.php';

$tampil=mysqli_query($dbconnect, "SELECT * from tb_rw where id_dusun = '$_POST[id_dusun]'");
$jml=mysqli_num_rows($tampil);
if($jml > 0){
echo"<option selected>- Pilih Kota -</option>";
while($r=mysqli_fetch_array($tampil)){
echo "<option value=$r[id_rw]>$r[no_rw]</option>";
}}else{
    echo "<option selected>- Data Wilayah Tidak Ada, Pilih Yang Lain -</option>";
}
?>