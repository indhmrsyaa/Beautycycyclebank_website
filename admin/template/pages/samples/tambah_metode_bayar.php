<div class="container-fluid px-4">
<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label> ID Metode Bayar </label>
		<input type="text" class="form-control" name="ID_metyar" required>
	</div>
	<div class="form-group">
		<label> Metode Bayar </label>
		<input type="text" class="form-control" name="Metode_Bayar" required>
	</div>
	<button class="btn btn-primary" name="save"> Simpan </button>
</form>
<?php
if (isset ( $_POST['save']))
{
	$koneksi->query("INSERT INTO Metode_Bayar (ID_metyar, Metode_Bayar) VALUES('$_POST[ID_metyar]', '$_POST[Metode_Bayars]')");
	echo "<div class='alert alert-info'> Data Berhasil Ditambahkan </div>";
	echo "<meta http-equiv='refresh' content='1;url=../../index.php?halaman=jenismember'>";
}
?>