<?php
$ambil=$koneksi->query("SELECT * FROM admin WHERE Email='$_GET[id]'");
$pecah=$ambil->fetch_assoc();
?>

<div class="container-fluid px-4">
<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label> Nama Lengkap </label>
		<input type="text" class="form-control" name="Nama_Lengkap" value="<?php echo $pecah['Nama_Lengkap'];?>"required>
	</div>
	<div class="form-group">
		<label> Email </label>
		<input type="text" class="form-control" name="Email" readonly value="<?php echo $pecah['Email'];?>"required>
	</div>
	<div class="form-group">
		<label> Password </label>
		<input type="text" class="form-control" name="Password" value="<?php echo $pecah['Password'];?>"required>
	</div>
	<div class="form-group">
		<label> Level </label>
		<input type="text" class="form-control" name="Level" value="<?php echo $pecah['Level'];?>"required>
	</div>
	<button class="btn btn-primary" name="ubah"> Ubah </button>
</form>

<?php
if(isset($_POST['ubah']))
{
	$koneksi->query("UPDATE admin SET Nama_Lengkap='$_POST[Nama_Lengkap]', Email='$_POST[Email]',Password='$_POST[Password]', Level='$_POST[Level]' WHERE Email='$_GET[id]'");

echo "<script> alert(' Data Berhasil Diubah');</script>";
echo "<script>location='index.php?halaman=admin';</script>";
}
?>