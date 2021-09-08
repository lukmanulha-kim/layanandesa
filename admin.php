
<?php
error_reporting(0);
include 'header1.php';
?>
<?php 
		if(isset($_GET['page'])){
			$page = $_GET['page'];

			switch ($page) {
			case 'home':
				include "haladmin/home.php";
				break;
			case 'penduduk':
				include "haladmin/penduduk.php";
				break;
			case 'pendudu':
				include "haladmin/kelahiran.php";
				break;
			case 'pendidikan':
				include "haladmin/pendidikan.php";
				break;
			case 'rt':
				include "haladmin/rt.php";
				break;
			case 'rw':
				include "haladmin/rw.php";
				break;
			case 'dusun':
				include "haladmin/dusun.php";
				break;
			case 'prov':
				include "haladmin/provinsi.php";
				break;
			case 'kab':
				include "haladmin/kabupaten.php";
				break;
			case 'kec':
				include "haladmin/kecamatan.php";
				break;
			case 'perangkat':
				include "haladmin/perangkat.php";
				break;
			case 'jabatan':
				include "haladmin/jabatan.php";
				break;
			case 'pekerjaan':
				include "haladmin/pekerjaan.php";
				break;
			case 'jenis':
				include "haladmin/jenis.php";
				break;
			case 'pemohon':
				include "haladmin/pemohon.php";
				break;
			case 'kelahiran':
				include "haladmin/lahir.php";
				break;
			case 'pelayanan':
				include "haladmin/pelayanan.php";
				break;
			case 'mukel':
				include "haladmin/mutakel.php";
				break;	
			case 'pencarian':
				include "haladmin/pencarian.php";
				break;
			case 'editkependudukan':
				include "haladmin/edit.php";
				break;			
			default:
				echo "<script type='text/javascript'>window.location.href='error403.php';</script>";
				break;
			}
		}else{
			include "haladmin/home.php";
		}
	?>
<?php include 'footer1.php'; ?>