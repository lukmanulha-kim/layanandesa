<?php 
error_reporting(0);
include 'header3.php';
?>
<?php 
		if(isset($_GET['page'])){
			$page = $_GET['page'];

			switch ($page) {
			case 'home':
				include "halkades/home.php";
				break;
			case 'penduduk':
				include "halkades/penduduk.php";
				break;
			case 'kelahiran':
				include "halkades/kelahiran.php";
				break;
			case 'pelayanan':
				include "halkades/pelayanan.php";
				break;
			case 'mukel':
				include "halkades/mutakel.php";
				break;
			case 'pencarian':
				include "halkades/pencarian.php";
				break;			
			default:
				echo "<script type='text/javascript'>alert('Halaman Tidak Ditemukan !'); history.go(-1);</script>";
				break;
			}
		}else{
			include "halkades/home.php";
		}
	?>
<?php include 'footer1.php'; ?>
