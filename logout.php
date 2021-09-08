<?php  
session_start();
$hancur = session_destroy();
if ($hancur) {
	echo "<script type='text/javascript'>window.location.href='Login';</script>";
}
?>