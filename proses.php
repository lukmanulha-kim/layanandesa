<?php

include 'koneksi.php';

$username = mysqli_real_escape_string($dbconnect, $_POST['username']);
$sql = "SELECT * from tb_penduduk where nik = '$username'";
$process = mysqli_query($dbconnect, $sql);
$num = mysqli_num_rows($process);
if($num == 0){
	echo "<img style='width:25px' src='img/sip.png'>";
}else{
	echo "<img style='width:25px' src='img/pret.gif'> NIK Sudah Ada Dalam Data Base !.";
}
?>