<div class="container-fluid px-4">
<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label> ID Cabang Bank </label>
		<input type="text" class="form-control" name="ID_Cabang_Bank" required>
	</div>
	<div class="form-group">
		<label> Nama Cabang </label>
		<input type="text" class="form-control" name="Nama_Bank" required>
	</div>
	<div class="form-group">
    <label> Id_Kota </label>
    <select class="form-control" name="ID_Kota">
        <option value="">--Pilih Kota--</option>
    <?php $ambil=$koneksi->query("SELECT*FROM kota");?>
    <?php while($pecahh=$ambil->fetch_assoc()){?>
  <option value="<?php echo $pecahh['ID_Kota']?>" required><?php echo $pecahh['ID_Kota']?>-<?php echo $pecahh['Nama_Kota']?></option>
  <?php } ?>
    </select>
  </div>

	<div class="form-group">
		<label> Alamat Cabang </label>
		<input type="text" class="form-control" name="Alamat_Bank" required>
	</div>
	<button class="btn btn-primary" name="save"> Simpan </button>
</form>
<?php
if (isset ( $_POST['save']))
{
	$koneksi->query("INSERT INTO cabang_bank_sampah (ID_Cabang_Bank, Nama_Bank, ID_Kota, Alamat_Bank) VALUES('$_POST[ID_Cabang_Bank]', '$_POST[Nama_Bank]', '$_POST[ID_Kota]','$_POST[Alamat_Bank]')");
		echo "<div class='alert alert-info'> Data Berhasil Ditambahkan </div>";
		echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=cabangbank'>";
}
?>