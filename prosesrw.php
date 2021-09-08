<?php

include 'koneksi.php';

$tampil=mysqli_query($dbconnect, "SELECT * from tb_rt where id_rw = '$_POST[id_rw]'");
$jml=mysqli_num_rows($tampil);
if($jml > 0){
echo"<option selected>- Pilih Kota -</option>";
while($r=mysqli_fetch_array($tampil)){
echo "<option value=$r[id_rt]>$r[no_rt]</option>";
}}else{
    echo "<option selected>- Data Wilayah Tidak Ada, Pilih Yang Lain -</option>";
}
?>