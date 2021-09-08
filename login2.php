<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="en">
    
<head>
        <title>Sistem Informasi Layanan Desa Pecalongan Sukosari Bondowoso</title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="shortcut icon" href="FlatTheme/images/ico/lades.ico">
        <link rel="stylesheet" href="css/bootstrap.min.css" />
        <link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
        <link rel="stylesheet" href="css/matrix-login.css" />
        <link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>

    </head>
    <body style="background-image: url(FlatTheme/images/slider/banner.jpg);">
        <div id="loginbox">            
            <form id="loginform" class="form-vertical" action="" method="post">
                 <div class="control-group normal_text"> <h3><img src="img/bws.png" alt="Logo" /></h3></div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lg"><i class="icon-user"> </i></span><input type="text" name="username" placeholder="Username" autofocus="autofocus" />
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_ly"><i class="icon-lock"></i></span><input type="password" name="pass" placeholder="Password" />
                        </div>
                    </div>
                </div>
                <div class="form-actions">
                    <!-- <span class="pull-left"><a href="#" class="flip-link btn btn-info" id="to-recover">Lost password?</a></span> -->
                    <span class="pull-right"><input type="submit" name="login" class="btn btn-success" value="Login"></span>
                </div>
            </form>
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

                    // if($MasaAktif<$DateNow){
                    //     echo "<script type='text/javascript'>alert('Masa Jabatan Anda Telah Berakhir'); window.location.href='PetugasBaru'</script>";
                    // }else{
                        if ($User == $Username & $Pass == $Password & $Jabatan == "Sekretaris Desa" & $MasaAktif>$DateNow) {
                            session_start();
                            $_SESSION['Userid'] = $data['id_perangkat'];
                            $_SESSION['Nama'] = $data['nama_lengkap'];
                            $_SESSION['Jabatan'] = $data['nama_jabatan'];
                            echo "<script type='text/javascript'>window.location.href='admin.php';</script>";
                        }elseif ($User == $Username && $Pass == $Password && $Jabatan == "Kepala Desa" & $MasaAktif>$DateNow) {
                            session_start();
                            $_SESSION['Userid'] = $data['id_perangkat'];
                            $_SESSION['Nama'] = $data['nama_lengkap'];
                            $_SESSION['Jabatan'] = $data['nama_jabatan'];
                            echo "<script type='text/javascript'>window.location.href='BerandaKades';</script>";
                        }else{
                            echo "<script type='text/javascript'>alert('Maaf, Anda Tidak Punya Akses Untuk Aplikasi Ini.. Atau Nama Pengguna dan Password Anda Salah !. Atau Masa Jabatan Anda Telah Berakhir !. :)')</script>";
                        }
                    // }
                }
            ?>
            <form id="recoverform" action="#" class="form-vertical">
                <p class="normal_text">Enter your e-mail address below and we will send you instructions how to recover a password.</p>
                
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lo"><i class="icon-envelope"></i></span><input type="text" placeholder="E-mail address" />
                        </div>
                    </div>
               
                <div class="form-actions">
                    <span class="pull-left"><a href="#" class="flip-link btn btn-success" id="to-login">&laquo; Back to login</a></span>
                    <span class="pull-right"><a class="btn btn-info"/>Reecover</a></span>
                </div>
            </form>
        </div>
        
        <script src="js/jquery.min.js"></script>  
        <script src="js/matrix.login.js"></script> 
    </body>


</html>