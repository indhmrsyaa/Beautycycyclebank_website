<div class="container-fluid px-4">
<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label> ID Kota </label>
		<input type="text" class="form-control" name="ID_kota" required>
	</div>
	<div class="form-group">
		<label> Nama Kota </label>
		<input type="text" class="form-control" name="Nama_kota" required>
	</div>
	<div class="form-group">
    <label> Id_Kota </label>
    <select class="form-control" name="ID_Provinsi">
        <option value="">--Pilih Provinsi--</option>
    <?php $ambil=$koneksi->query("SELECT*FROM provinsi");?>
    <?php while($pecahh=$ambil->fetch_assoc()){?>
  <option value="<?php echo $pecahh['ID_Provinsi']?>" required><?php echo $pecahh['Nama_Provinsi']?></option>
  <?php } ?>
    </select>
  </div>
	<button class="btn btn-primary" name="save"> Simpan </button>
</form>
<?php
if (isset ( $_POST['save']))
{
	$koneksi->query("INSERT INTO kota
	 (ID_kota, Nama_Kota,ID_Provinsi) VALUES('$_POST[ID_kota]', '$_POST[Nama_kota]','$_POST[ID_Provinsi]')");
	echo "<div class='alert alert-info'> Data Berhasil Ditambahkan </div>";
	echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=kota'>";
}
?>