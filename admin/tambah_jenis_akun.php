<div class="container-fluid px-4">
<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label> ID Jenis Akun </label>
		<input type="text" class="form-control" name="ID_jenis_akun" required>
	</div>
	<div class="form-group">
		<label> Jenis akun </label>
		<input type="text" class="form-control" name="jenis_akun" required>
	</div>
	<button class="btn btn-primary" name="save"> Simpan </button>
</form>
<?php
if (isset ( $_POST['save']))
{
	$koneksi->query("INSERT INTO jenis_akun
	 (ID_jenis_akun, jenis_akun) VALUES('$_POST[ID_jenis_akun]', '$_POST[jenis_akun]')");
	echo "<div class='alert alert-info'> Data Berhasil Ditambahkan </div>";
	echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=jenisakun'>";
}
?>