<?php  ?>
<form action="" method="post">
	<input type="text" name="coba[]"> | 
	<input type="text" name="coba[]"> | 
	<input type="text" name="coba[]"> | 
	<input type="text" name="coba[]"> | 

	<input type="submit" name="post" value="Post">
</form>
<?php  
	if (isset($_POST['post'])) {
		// print_r($_POST);
		$coba = implode(', ', $_POST['coba']);
		echo $coba;
	}
?>