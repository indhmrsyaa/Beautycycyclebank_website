<div class="container-fluid px-4">
<form method="post" anction="" enctype="multipart/form-data">
	<div class="form-group">
		<label> ID Hadiah </label>
		<input type="text" class="form-control" name="ID_Gift">
	</div>
	<div class="form-group">
		<label> Nama Hadiah </label>
		<input type="text" class="form-control" name="Nama_Gift">
	</div>
	<div class="form-group">
		<label> Poin </label>
		<input type="text" class="form-control" name="Poin_Gift">
	</div>
	<div class="form-group">
		<label> Stok </label>
		<input type="text" class="form-control" name="Stok_Gift">
	</div>
	<div class="form-group">
		<label>Foto Hadiah</label>
		<input type="file" class="form-control" name="Foto_Gift" >
	</div>

	<button class="btn btn-primary" name="save"> Simpan </button>
</form>
<?php
if (isset ( $_POST['save']))
{
	$file = $_FILES['Foto_Gift']['name'];
	$tmp_name = $_FILES['Foto_Gift']['tmp_name'];
	move_uploaded_file($tmp_name, "../Photo/".$file);
		$koneksi->query("INSERT INTO hadiah (ID_Gift, Nama_Gift, Poin_Gift, Stok_Gift, Foto_Gift)
		VALUES('$_POST[ID_Gift]','$_POST[Nama_Gift]','$_POST[Poin_Gift]','$_POST[Stok_Gift]','$file') ");
		echo "<div class='alert alert-info'> Data Berhasil Ditambahkan </div>";
		echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=hadiah'>";
	}
?>