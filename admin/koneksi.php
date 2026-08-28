<?php
$database_host = "localhost";
$database_user = "root";
$database_pass = "";
$database_name = "beautycyclebank";

$koneksi = mysqli_connect($database_host, $database_user, $database_pass, $database_name);

if ($koneksi&&$database_name){
}else{
?>
	echo "Gagal Koneksi!";
<?php
}