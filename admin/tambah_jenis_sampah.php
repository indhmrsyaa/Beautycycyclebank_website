<div class="container-fluid px-4">
<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label> ID Jenis Sampah </label>
		<input type="text" class="form-control" name="ID_Jenis_Sampah" required>
	</div>
	<div class="form-group">
		<label> Jenis Sampah </label>
		<input type="text" class="form-control" name="Jenis_Sampah" required>
	</div>
	<button class="btn btn-primary" name="save"> Simpan </button>
</form>
<?php
if (isset ( $_POST['save']))
{
	$koneksi->query("INSERT INTO jenis_sampah (ID_Jenis_Sampah, Jenis_Sampah) VALUES('$_POST[ID_Jenis_Sampah]', '$_POST[Jenis_Sampah]')");
		echo "<div class='alert alert-info'> Data Berhasil Ditambahkan </div>";
		echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=jenissampah'>";
}
?>