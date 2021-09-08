<?php  ?>
<div class="row-fluid">
  <div id="footer" class="span12"> 2018 &copy; Layanan Desa. TA <a href="" target="blank">AMIKI</a>.<Br> 2013 &copy; Matrix Admin. Brought to you by <a href="http://themedesigner.in">Themedesigner.in</a> </div>
</div>
<!--end-Footer-part-->
<script src="js/jquery.min.js"></script> 
<script src="js/jquery.ui.custom.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/jquery.uniform.js"></script> 
<script src="js/select2.min.js"></script> 
<script src="js/jquery.dataTables.min.js"></script> 
<script src="js/matrix.js"></script> 
<script src="js/matrix.tables.js"></script>
<script src="js/matrix.interface.js"></script>
<script src="js/jquery.gritter.min.js"></script> 
<script src="js/jquery.peity.min.js"></script>
<?php  
	$query = $dbconnect->query("SELECT COUNT(tgl_pelayanan) AS jumlah FROM tb_layanan where tgl_pelayanan=0");
    $hitung = $query->fetch_array();
    if ($hitung['jumlah']>0 && $_SESSION['Jabatan']=="Sekretaris Desa") {
    	echo "<script type='text/javascript'>
		$.gritter.add({
		title:	'Terdapat ".$hitung['jumlah']." Permohonan Pelayanan Baru',
		text:	'Silahkan Buka Halaman Pelayanan',
		image: 	'img/demo/envelope.png',
		sticky: false
			});
		</script>";
    }
?> 
</a>
</body>
</html>