<?php
$ambil=$koneksi->query("SELECT*FROM provinsi WHERE ID_Provinsi='$_GET[id]'");
$pecah=$ambil->fetch_assoc();
?>

<div class="container-fluid px-4">
<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label> ID provinsi</label>
		<input type="text" class="form-control" name="IDprovinsi"  value="<?php echo $pecah['ID_Provinsi'];?>"required>
	</div>
	<div class="form-group">
		<label> Nama provinsi </label>
		<input type="text" class="form-control" name="namaprovinsi" value="<?php echo $pecah['Nama_Provinsi'];?>"required>
	</div>
	<button class="btn btn-primary" name="ubah"> Ubah </button>
</form>

<?php
if(isset($_POST['ubah']))
{
	$koneksi->query("UPDATE provinsi SET ID_Provinsi='$_POST[IDprovinsi]',Nama_Provinsi='$_POST[namaprovinsi]' WHERE ID_Provinsi='$_GET[id]'");

echo "<script> alert(' Data Berhasil Diubah');</script>";
echo "<script>location='index.php?halaman=provinsi';</script>";
}

?>