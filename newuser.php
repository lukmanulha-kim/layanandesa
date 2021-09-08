<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Layanan Desa Pecalongan</title>
    <link href="FlatTheme/css/bootstrap.min.css" rel="stylesheet">
    <link href="FlatTheme/css/font-awesome.min.css" rel="stylesheet">
    <link href="FlatTheme/css/prettyPhoto.css" rel="stylesheet">
    <link href="FlatTheme/css/animate.css" rel="stylesheet">
    <link href="FlatTheme/css/main.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="FlatTheme/images/ico/lades.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="FlatTheme/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="FlatTheme/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="FlatTheme/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="FlatTheme/images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->
<body>
    <header class="navbar navbar-inverse navbar-fixed-top wet-asphalt" role="banner">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="Awal"><img src="FlatTheme/images/logo.png" alt="logo"></a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="Awal">Home</a></li>
                    <!-- <li><a href="Permohonan">Permohonan</a></li> -->
                    <!-- <li><a href="Tentang">Tentang</a></li> -->
                    <!-- <li><a href="about-us.html">About Us</a></li> -->
                </ul>
            </div>
        </div>
    </header><!--/header-->
    <section id="title" class="emerald">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <h1>Layanan Desa</h1>
                    <p>Pastikan Anda Memasukkan Data Dengan Benar</p>
                </div>
                <div class="col-sm-6">
                    <ul class="breadcrumb pull-right">
                        <li><a href="Awal">Home</a></li>
                        <li class="active">Tambah Data Pengguna Baru</li>
                    </ul>
                </div>
            </div>
        </div>
    </section><!--/#title-->

    <section id="about-us" class="container">
        <div class="row">
            <div class="col-md-6 col-sm-6 col-md-offset-3 col-xs-12">
                <h2>Masukkan Data Pengguna Baru</h2>
                <form action="" method="post">
                    <fieldset class="registration-form col-sm-12">
                        <div class="form-group">
                          <label class="control-label">Pilih Perangkat</label>
                            <select name="i_nama" class="form-control" required>
                                <option value="">--Pilih Penduduk--</option>
                                <?php 
                                $querypenduduk = $dbconnect -> query("SELECT * FROM tb_penduduk");
                                while ($datapenduduk = $querypenduduk -> fetch_array()) {
                                ?>
                                <option value="<?php echo $datapenduduk['nik'] ?>"><?php echo $datapenduduk['nama_lengkap']." - NIK ".$datapenduduk['nik']?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="form-group">
                          <label class="control-label">Pilih Jabatan</label>
                            <select name="i_jabatan" class="form-control" required>
                                <option value="">--Pilih Jabatan--</option>
                                <?php 
                                $queryjabatan = $dbconnect -> query("SELECT * FROM tb_jabatan");
                                while ($datajabatan = $queryjabatan -> fetch_array()) {
                                ?>
                                <option value="<?php echo $datajabatan['id_jabatan'] ?>"><?php echo $datajabatan['nama_jabatan'] ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="normal" class="control-label">Tanggal SK</label>
                            <input type="date" class="form-control" name="i_tgsk" class="span8" required>
                        </div>

                        <div class="form-group">
                            <label for="normal" class="control-label">No. SK</label>
                            <input type="number" class="form-control" name="i_nosk" class="span8" required>
                        </div>

                        <div class="form-group">
                            <label for="normal" class="control-label">Tanggal Berhenti</label>
                            <input type="date" class="form-control" name="i_tgberhenti" class="span8" required>
                        </div>

                        <div class="form-group">
                            <label for="normal" class="control-label">Nama Pengguna</label>
                            <input type="text" class="form-control" name="i_user" class="span8" required>
                        </div>

                        <div class="form-group">
                            <label for="normal" class="control-label">Password</label>
                            <input type="password" class="form-control" name="i_pass" class="span8" required>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="simpan" class="btn btn-info" value="Get Layanan">
                        </div>
                    </fieldset>
                </form>
                <?php 
                  if (isset($_POST['simpan'])) {
                    $Nama = addslashes($_POST['i_nama']);
                    $Jabatan = addslashes($_POST['i_jabatan']);
                    $TgSK = addslashes($_POST['i_tgsk']);
                    $TgBerhenti = addslashes($_POST['i_tgberhenti']);
                    $NoSK = addslashes($_POST['i_nosk']);
                    $User = addslashes($_POST['i_user']);
                    $Pass = md5(addslashes($_POST['i_pass']));

                    $query = mysqli_query($dbconnect, "INSERT into tb_perangkat VALUES ('', '".$Nama."','".$Jabatan."','".$TgSK."','".$NoSK."','".$TgBerhenti."','".$User."','".$Pass."')");
                    if ($query) {
                        echo "<script type='text/javascript'>window.location.href='Loginadmin';</script>";
                    }
                  } 
                ?>
            </div><!--/.col-sm-6-->
        </div><!--/.row-->
    </section><!--/#about-us-->
    <footer id="footer" class="midnight-blue">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    SI Layanan Desa | 2018 | &copy; <a target="_blank" href="http://shapebootstrap.net/" title="Free Twitter Bootstrap WordPress Themes and HTML templates">ShapeBootstrap</a>. All Rights Reserved.
                </div>
                <div class="col-sm-6">
                    <ul class="pull-right">
                        <li><a id="gototop" class="gototop" href="#"><i class="icon-chevron-up"></i></a></li><!--#gototop-->
                    </ul>
                </div>
            </div>
        </div>
    </footer><!--/#footer-->

    <script src="FlatTheme/js/jquery.js"></script>
    <script src="FlatTheme/js/bootstrap.min.js"></script>
    <script src="FlatTheme/js/jquery.prettyPhoto.js"></script>
    <script src="FlatTheme/js/main.js"></script>
</body>
</html>