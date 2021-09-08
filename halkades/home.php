<?php 
include 'koneksi.php';
?>
<div id="content">
<!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> <a href="BerandaKades" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div>
  </div>
<!--End-breadcrumbs-->

<?php  
  $querypelayanan = $dbconnect->query("SELECT COUNT(*) AS jumlahpelayanan FROM tb_layanan where no_surat!=0");
  $hitungpelayanan = $querypelayanan->fetch_array();

  $querypenduduk = $dbconnect->query("SELECT COUNT(*) AS jumlahpenduduk FROM tb_penduduk");
  $hitungpenduduk = $querypenduduk->fetch_array();

  $querykelahiran = $dbconnect->query("SELECT COUNT(*) AS jumlahkelahiran FROM tb_kelahiran");
  $hitungkelahiran = $querykelahiran->fetch_array();
?>

<!--Action boxes-->
  <div class="container-fluid">
    <div class="quick-actions_homepage">
      <ul class="quick-actions">
        <li class="bg_lb span4"> <a href="?page=penduduk"> <i class="icon-group"></i> <span class="label label-important"><?php echo $hitungpenduduk['jumlahpenduduk']; ?></span> Penduduk </a> </li>
        <li class="bg_lg span3"> <a href="?page=kelahiran"> <i class="icon-user"></i> <span class="label label-info"><?php echo $hitungkelahiran['jumlahkelahiran']; ?></span> Kelahiran</a> </li>
        <li class="bg_ly span3"> <a href="?page=pelayanan"> <i class="icon-inbox"></i><span class="label label-success"><?php echo $hitungpelayanan['jumlahpelayanan']; ?></span> Pelayanan </a> </li>
      </ul>
    </div>

  </div>
</div>