<?php  
include 'header2.php';
if(isset($_GET['page'])){
	$page = $_GET['page'];

	switch ($page) {
	case 'home':
		include "halpenduduk/awal.php";
		break;
	case 'mohon':
		include "halpenduduk/permohonan.php";
		break;
	case 'datadiri':
		include "halpenduduk/datadiri.php";
		break;				
	default:
	echo "DAta Tak ADa";
		// echo "<script type='text/javascript'>window.location.href='error403.php';</script>";
		break;
	}
	}else{
	include "halpenduduk/awal.php";
	}
include 'footer2.php';
?>