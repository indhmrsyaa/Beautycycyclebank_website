<div class="container-fluid px-4">
<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label> ID Satuan </label>
		<input type="text" class="form-control" name="ID_Satuan" required>
	</div>
	<div class="form-group">
		<label> Jenis Satuan </label>
		<input type="text" class="form-control" name="Jenis_Satuan" required>
	</div>
	<button class="btn btn-primary" name="save"> Simpan </button>
</form>
<?php
if (isset ( $_POST['save']))
{
	$koneksi->query("INSERT INTO jenis_satuan (ID_Satuan, Jenis_Satuan) VALUES('$_POST[ID_Satuan]', '$_POST[Jenis_Satuan]')");
		echo "<div class='alert alert-info'> Data Berhasil Ditambahkan </div>";
		echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=jenissatuan'>";
}
?>