<div class="container-fluid px-4">
<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label> Nama Lengkap </label>
		<input type="text" class="form-control" name="Nama_Admin" required>
	</div>
	<div class="form-group">
		<label> Email </label>
		<input type="text" class="form-control" name="Email" required>
	</div>
	<div class="form-group">
		<label> Password </label>
		<input type="text" class="form-control" name="Password" required>
	</div>
	<div class="form-group">
		<label> Level </label>
		<input type="text" class="form-control" name="Level" required>
	</div>
	<button class="btn btn-primary" name="save"> Simpan </button>
</form>
<?php
if (isset ( $_POST['save']))
{
	$koneksi->query("INSERT INTO admin (Nama_Admin,Email,Password,Level) VALUES('$_POST[Nama_Admin]','$_POST[Email]', '$_POST[Password]', '$_POST[Level]')");
	echo "<div class='alert alert-info'> Data Berhasil Ditambahkan </div>";
	echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=admin'>";
}
?>