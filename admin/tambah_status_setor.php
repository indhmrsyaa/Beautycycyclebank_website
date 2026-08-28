<div class="container-fluid px-4">
<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label> ID Status Setor </label>
		<input type="text" class="form-control" name="ID_Statussetor" required>
	</div>
	<div class="form-group">
		<label> Status Setor </label>
		<input type="text" class="form-control" name="Status_Setor" required>
	</div>
	<button class="btn btn-primary" name="save"> Simpan </button>
</form>
<?php
if (isset ( $_POST['save']))
{
	$koneksi->query("INSERT INTO status_setor (ID_Statussetor, Status_Setor) VALUES('$_POST[ID_Statussetor]', '$_POST[Status_Setor]')");		
	echo "<div class='alert alert-info'> Data Berhasil Ditambahkan </div>";
	echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=statussetor'>";
}
?>
