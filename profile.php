<?php

session_start ();
$koneksi=new mysqli("localhost","root","","beautycyclebank");
?>
<?php
if(!isset($_SESSION["akun"]))
{
	echo "<script>alert('Anda Harus Login Terlebih Dahulu');</script>";
	echo "<script>location='login.php';</script>";
}
?>
<!DOCTYPE html>
<html>

<head>
	<title> beautycyclebank </title>
	<!-- Favicon -->
	<link href="assets/img/brand/ikonn.png" rel="icon" type="image/png">
	<link rel="stylesheet" href="assets/css/bootstrap.css">
</head>

<body STYLE="BACKGROUND-IMAGE:URL(faktur.jpg)">

<!-- /. navbar  -->
<?php include'menu.php'?>
<section class="konten">
	<div class="container">
</br>	
</br>
<h2>PROFILE</h2>

<?php
$id_member = $_SESSION["akun"]["ID_Akun"];
$ambil=$koneksi->query("SELECT * FROM akun JOIN jenis_akun on akun.ID_Jenis_Akun=jenis_akun.ID_Jenis_Akun WHERE akun.ID_Akun='$id_member'");
$detail=$ambil->fetch_assoc();
?>
<p>

<div class="row">
	<div class="col-md-4">
	<h4> <strong> 
	Nama Lengkap	: <?php echo $_SESSION["akun"]["Nama_Lengkap"];?></strong><br>
    Jenis Akun  	: <?php echo $detail['jenis_akun'];?><br>
	Alamat Rumah	: <?php echo $_SESSION["akun"]['Alamat_Rumah'];?><br>
	Nomor Handphone	: <?php echo $_SESSION["akun"]['No_Hp'];?><br>
	Email			: <?php echo $_SESSION["akun"]['Email'];?><br>
    Poin Anda       : <?php echo $_SESSION["akun"]['Total_Poin_Akun'];?><br>
</h4></div>
</p>
</br>
</br>
</body>
</html>