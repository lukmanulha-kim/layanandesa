<?php  
include 'koneksi.php';
// if (isset($_SESSION['ID'])) {
// 	echo "<script type='text/javascript'>window.location.href='../'</script>";
// }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Sistem Informasi Layanan Desa Pecalongan Sukosari Bondowoso</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="shortcut icon" href="FlatTheme/images/ico/lades.ico">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="log/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="log/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="log/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="log/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="log/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="log/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="log/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="log/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="log/css/util.css">
	<link rel="stylesheet" type="text/css" href="log/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(log/images/bg-01.jpg);">
					<span class="login100-form-title-1">
						Masuk Aplikasi
					</span>
				</div>

				<form class="login100-form validate-form" action="" method="post">
					<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span class="label-input100">Username</span>
						<input class="input100" type="text" name="username" placeholder="Enter username">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="pass" placeholder="Enter password">
						<span class="focus-input100"></span>
					</div>

					<!-- <div class="flex-sb-m w-full p-b-30">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
							<label class="label-checkbox100" for="ckb1">
								Remember me
							</label>
						</div>

						<div>
							<a href="#" class="txt1">
								Forgot Password?
							</a>
						</div>
					</div> -->

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="login">
							Login
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<?php  
		if (isset($_POST['login'])) {
			$User = $_POST['username'];
			$Pass = md5($_POST['pass']);
	        $DateNow = date("Y-m-d");

	        $data = $dbconnect -> query("SELECT * FROM tb_perangkat inner join tb_penduduk on tb_perangkat.id_penduduk=tb_penduduk.nik inner join tb_jabatan on tb_perangkat.id_jabatan=tb_jabatan.id_jabatan where tb_perangkat.username='$User' and tb_perangkat.password='$Pass'")->fetch_array();
	        $Username = $data['username'];
	        $Password = $data['password'];
	        $Jabatan = $data['nama_jabatan'];
	        $MasaAktif = $data['tgl_berhenti'];

	        if($MasaAktif<$DateNow){
	            echo "<script type='text/javascript'>alert('Masa Jabatan Anda Telah Berakhir'); window.location.href='PetugasBaru'</script>";
	        }else{
	            if ($User == $Username & $Pass == $Password & $Jabatan == "Sekretaris Desa") {
	                session_start();
	                $_SESSION['Userid'] = $data['id_perangkat'];
	                $_SESSION['Nama'] = $data['nama_lengkap'];
	                $_SESSION['Jabatan'] = $data['nama_jabatan'];
	                echo "<script type='text/javascript'>window.location.href='Beranda';</script>";
	            }elseif ($User == $Username && $Pass == $Password && $Jabatan == "Kepala Desa") {
	                session_start();
	                $_SESSION['Userid'] = $data['id_perangkat'];
	                $_SESSION['Nama'] = $data['nama_lengkap'];
	                $_SESSION['Jabatan'] = $data['nama_jabatan'];
	                echo "<script type='text/javascript'>window.location.href='BerandaKades';</script>";
	            }else{
	                echo "<script type='text/javascript'>alert('Maaf, Anda Tidak Punya Akses Untuk Aplikasi Ini.. Atau Nama Pengguna dan Password Anda Salah !. :)')</script>";
	            }
	        }
		}
	?>
	
<!--===============================================================================================-->
	<script src="log/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="log/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="log/vendor/bootstrap/js/popper.js"></script>
	<script src="log/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="log/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="log/vendor/daterangepicker/moment.min.js"></script>
	<script src="log/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="log/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="log/js/main.js"></script>

</body>
</html>