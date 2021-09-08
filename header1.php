<?php  
include 'koneksi.php';
session_start();
if (!isset($_SESSION['Userid'])) {
  echo "<script type='text/javascript'>window.location.href='Login';</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Sistem Informasi Layanan Desa Pecalongan Sukosari Bondowoso</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="shortcut icon" href="FlatTheme/images/ico/lades.ico">
<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="css/uniform.css" />
<link rel="stylesheet" href="css/select2.css" />
<link rel="stylesheet" href="css/matrix-style.css" />
<link rel="stylesheet" href="css/matrix-media.css" />
<link rel="stylesheet" href="css/jquery.gritter.css" />
<link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
<body>

<!--Header-part-->
<div id="header">
  <h1><a href="Beranda"><img src="img/coba.png"></a></h1>
</div>
<!--close-Header-part--> 

<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
  <ul class="nav">
    <li  class="dropdown" id="profile-messages" ><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>  <span class="text">Welcome <?php echo $_SESSION['Nama']; ?> </span><!-- <b class="caret"></b> --></a>
      <!-- <ul class="dropdown-menu">
        <li><a href="#"><i class="icon-user"></i> My Profile</a></li>
        <li class="divider"></li>
        <li><a href="#"><i class="icon-check"></i> My Tasks</a></li>
        <li class="divider"></li>
        <li><a href="Logout"><i class="icon-key"></i> Log Out</a></li>
      </ul> -->
    </li>
    <!-- <li class="dropdown" id="menu-messages"><a href="#" data-toggle="dropdown" data-target="#menu-messages" class="dropdown-toggle"><i class="icon icon-envelope"></i> <span class="text">Messages</span> <span class="label label-important">5</span> <b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li><a class="sAdd" title="" href="#"><i class="icon-plus"></i> new message</a></li>
        <li class="divider"></li>
        <li><a class="sInbox" title="" href="#"><i class="icon-envelope"></i> inbox</a></li>
        <li class="divider"></li>
        <li><a class="sOutbox" title="" href="#"><i class="icon-arrow-up"></i> outbox</a></li>
        <li class="divider"></li>
        <li><a class="sTrash" title="" href="#"><i class="icon-trash"></i> trash</a></li>
      </ul>
    </li>
    <li class=""><a title="" href="#"><i class="icon icon-cog"></i> <span class="text">Settings</span></a></li> -->
    <li class=""><a title="" href="Logout"><i class="icon icon-share-alt"></i> <span class="text">Logout</span></a></li>
  </ul>
</div>

<!--start-top-serch
<div id="search">
  <input type="text" placeholder="Search here..."/>
  <button type="submit" class="tip-bottom" title="Search"><i class="icon-search icon-white"></i></button>
</div>
close-top-serch--> 

<!--sidebar-menu-->

<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
  <ul>
    <li class="active"><a href="Beranda"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Data Penunjang</span></a>
      <ul>
        <li> <a href="?page=prov"><i class="icon icon-inbox"></i> <span>Provinsi</span></a> </li>
        <li> <a href="?page=kab"><i class="icon icon-inbox"></i> <span>Kabupaten</span></a> </li>
        <li> <a href="?page=kec"><i class="icon icon-inbox"></i> <span>Kecamatan</span></a> </li>
        <li> <a href="?page=dusun"><i class="icon icon-inbox"></i> <span>Dusun</span></a> </li>
        <li><a href="?page=rw"><i class="icon icon-th"></i> <span>RW</span></a></li>
        <li><a href="?page=rt"><i class="icon icon-th"></i> <span>RT</span></a></li>
        <li><a href="?page=perangkat"><i class="icon icon-group"></i> <span>Perangkat</span></a></li>
        <li><a href="?page=jabatan"><i class="icon icon-cogs"></i> <span>Jabatan</span></a></li>
        <li><a href="?page=pendidikan"><i class="icon icon-cog"></i> <span>Penddikan</span></a></li>
        <li><a href="?page=pekerjaan"><i class="icon icon-wrench"></i> <span>Pekerjaan</span></a></li>
        <li><a href="?page=jenis"><i class="icon icon-pencil"></i> <span>Surat &amp; Formulir</span></a></li>
      </ul>
    </li>
    <!-- <li class="submenu"> <a href="#"><i class="icon icon-group"></i> <span>Penduduk</span></a>
      <ul>
        <li><a href="?page=penduduk"><i class="icon icon-group"></i> <span>Penduduk Aktif</span></a></li>
        <li><a href="?page="><i class="icon icon-share-alt"></i> <span>Penduduk Mutasi Keluar</span></a></li>
      </ul>
    </li> -->
    <li> <a href="?page=penduduk"><i class="icon icon-group"></i> <span>Penduduk</span></a> </li>
    <?php  
      $query = $dbconnect->query("SELECT COUNT(tgl_pelayanan) AS jumlah FROM tb_layanan where tgl_pelayanan=0");
      $hitung = $query->fetch_array();
      
    ?>
    <li class="submenu"> <a href="#"><i class="icon icon-edit"></i> <span>Pelayanan</span> <?php if ($hitung['jumlah']>0) {echo"<span class='label label-important'>".$hitung['jumlah']."</span>";} ?></a>
      <ul>
        <li><a href="?page=kelahiran"><i class="icon icon-user"></i> <span>Kelahiran</span></a></li>
        <li><a href="?page=pelayanan"><i class="icon icon-pencil"></i> <span>Pelayanan</span> <?php if ($hitung['jumlah']>0) {echo"<span class='label label-important'>".$hitung['jumlah']."</span>";} ?></a></li>
        <li><a href="?page=mukel"><i class="icon icon-share-alt"></i> <span>Mutasi Keluar</span></a></li>
      </ul>
    </li>
  </ul>
</div>