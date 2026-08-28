<div class="container-fluid px-4">
<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label> ID Status Klaim </label>
		<input type="text" class="form-control" name="ID_Statusklaim" required>
	</div>
	<div class="form-group">
		<label> Status Klaim </label>
		<input type="text" class="form-control" name="Status_Klaim" required>
	</div>
	<button class="btn btn-primary" name="save"> Simpan </button>
</form>
<?php
if (isset ( $_POST['save']))
{
	$koneksi->query("INSERT INTO status_klaim (ID_Statusklaim, Status_Klaim) VALUES('$_POST[ID_Statusklaim]', '$_POST[Status_Klaim]')");		
	echo "<div class='alert alert-info'> Data Berhasil Ditambahkan </div>";
	echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=statusklaim'>";
}
?>
