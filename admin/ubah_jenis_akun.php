<?php
$ambil=$koneksi->query("SELECT * FROM jenis_akun WHERE ID_jenis_akun='$_GET[id]'");
$pecah=$ambil->fetch_assoc();
?>

<div class="container-fluid px-4">
<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label> ID Jenis Akun </label>
		<input type="text" class="form-control" name="ID_jenis_akun"  value="<?php echo $pecah['ID_jenis_akun'];?>"required>
	</div>
	<div class="form-group">
		<label> Jenis Akun </label>
		<input type="text" class="form-control" name="jenis_akun" value="<?php echo $pecah['jenis_akun'];?>"required>
	</div>
	<button class="btn btn-primary" name="ubah"> Ubah </button>
</form>

<?php
if(isset($_POST['ubah']))
{
	$koneksi->query("UPDATE jenis_akun SET ID_jenis_akun='$_POST[ID_jenis_akun]',jenis_akun='$_POST[jenis_akun]' WHERE ID_Jenis_Akun='$_GET[id]'");

echo "<script> alert(' Data Berhasil Diubah');</script>";
echo "<script>location='index.php?halaman=jenisakun';</script>";
}

?>