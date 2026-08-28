<?php
   session_start();
   if(isset($_SESSION['Email'])) 
   header(''); 
   require_once("admin/koneksi.php");
?>

<?php
if(isset($_POST["login"]))
{
	
	$Email = $_POST["Email"];
	$Password = $_POST["Password"];
	
	//lakukan query ngecek akun di tabel akun di db
	$ambil=$koneksi->query("SELECT * FROM akun WHERE Email='$Email' AND Password='$Password'");
	
	//itung akun yg terambil
	$akunyangcocok=$ambil->num_rows;
	
	//jika 1 akun yg cocok, maka diloginkan
	if($akunyangcocok==1)
	{
		//sukses  login
		$akun = $ambil->fetch_assoc();
		$_SESSION["akun"]=$akun;
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