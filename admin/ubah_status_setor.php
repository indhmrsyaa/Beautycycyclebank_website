<?php
$ambil=$koneksi->query("SELECT*FROM status_setor WHERE ID_Statussetor='$_GET[id]'");
$pecah=$ambil->fetch_assoc();
?>

<div class="container-fluid px-4">
<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label> ID Status Setor</label>
		<input type="text" class="form-control" name="IDStatussetor"  value="<?php echo $pecah['ID_Statussetor'];?>"required>
	</div>
	<div class="form-group">
		<label> Status Setor </label>
		<input type="text" class="form-control" name="Statussetor" value="<?php echo $pecah['Status_Setor'];?>"required>
	</div>
	<button class="btn btn-primary" name="ubah"> Ubah </button>
</form>

<?php
if(isset($_POST['ubah']))
{
	$koneksi->query("UPDATE status_setor SET ID_Statussetor='$_POST[IDStatussetor]',Status_Setor='$_POST[Statussetor]' WHERE ID_Statussetor='$_GET[id]'");

echo "<script> alert(' Data Berhasil Diubah');</script>";
echo "<script>location='index.php?halaman=statussetor';</script>";
}

?>