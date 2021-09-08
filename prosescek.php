<?php

include 'koneksi.php';

$username = mysqli_real_escape_string($dbconnect, $_POST['id_nama']);
$sql = "SELECT * from tb_mutasi_keluar where nik_penduduk = '$username'";
$sql2 = "SELECT * from tb_pengikut_keluar where nik = '$username'";
$process = mysqli_query($dbconnect, $sql);
$num = mysqli_num_rows($process);
$process2 = mysqli_query($dbconnect, $sql2);
$num2 = mysqli_num_rows($process2);
if($num > 0 || $num2 > 0){
	echo "<script type='text/javascript'>alert('Penduduk Sudah Pindah !.'); location.reload();</script>";
}else{
	echo "<img style='width:25px' src='img/sip.png'>";
}
?>
