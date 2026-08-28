<div class="container-fluid px-4">
<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label> ID provinsi </label>
		<input type="text" class="form-control" name="ID_provinsi" required>
	</div>
	<div class="form-group">
		<label> Nama provinsi </label>
		<input type="text" class="form-control" name="Nama_provinsi" required>
	</div>
	<button class="btn btn-primary" name="save"> Simpan </button>
</form>
<?php
if (isset ( $_POST['save']))
{
	$koneksi->query("INSERT INTO provinsi
	 (ID_Provinsi, Nama_Provinsi) VALUES('$_POST[ID_provinsi]', '$_POST[Nama_provinsi]')");
	echo "<div class='alert alert-info'> Data Berhasil Ditambahkan </div>";
	echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=provinsi'>";
}
?>