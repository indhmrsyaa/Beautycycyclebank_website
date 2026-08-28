<?php
   session_start();
   if(isset($_SESSION['admin'])) 
   header(''); 
   require_once("koneksi.php");
?>

<?php
//jk ada tombol login(login) ditekan
if(isset($_POST["login"]))
{
	
	$Email = $_POST["Email"];
	$Password = $_POST["Password"];
	$Level = $_POST["Level"];
	
	//lakukan query ngecek akun di tabel admin di db
	$ambil=$koneksi->query("SELECT * FROM admin WHERE Email='$Email' AND Password='$Password' AND Level='$Level'");
	
	//itung akun yg terambil
	$akunyangcocok=$ambil->num_rows;
	
	//jika 1 akun yg cocok, maka diloginkan
	if($akunyangcocok==1)
	{
		//sukses  login
		$akun = $ambil->fetch_assoc();
		$_SESSION["admin"]=$akun;
		echo "<script> alert('Login Berhasil');</script>";
		echo "<script> location='index.php';</script>";
	}
	else
	{
		//gagal login
		echo "<script> alert('anda gagal login, periksa kembali data Anda');</script>";
		echo "<script> location ='login.php';</script>";
	}
}
?>