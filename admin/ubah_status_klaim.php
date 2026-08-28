<?php
$ambil=$koneksi->query("SELECT*FROM status_klaim WHERE ID_Statusklaim='$_GET[id]'");
$pecah=$ambil->fetch_assoc();
?>

<div class="container-fluid px-4">
<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label> ID Status Klaim </label>
		<input type="text" class="form-control" name="IDStatusklaim"  value="<?php echo $pecah['ID_Statusklaim'];?>"required>
	</div>
	<div class="form-group">
		<label> Status Klaim </label>
		<input type="text" class="form-control" name="Statusklaim" value="<?php echo $pecah['Status_Klaim'];?>"required>
	</div>
	<button class="btn btn-primary" name="ubah"> Ubah </button>
</form>

<?php
if(isset($_POST['ubah']))
{
	$koneksi->query("UPDATE status_klaim SET ID_Statusklaim='$_POST[IDStatusklaim]',Status_Klaim='$_POST[Statusklaim]' WHERE ID_Statusklaim='$_GET[id]'");

echo "<script> alert(' Data Berhasil Diubah');</script>";
echo "<script>location='index.php?halaman=statusklaim';</script>";
}

?>