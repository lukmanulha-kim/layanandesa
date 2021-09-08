<?php  
$host = "localhost";
$user = "root";
$pass = "";
$data = "1layanandesa";

$dbconnect = new mysqli("$host","$user","$pass","$data");
if ($dbconnect -> connect_error) {
    echo "Gagal ".$dbconnect -> connect_error;
}
?>