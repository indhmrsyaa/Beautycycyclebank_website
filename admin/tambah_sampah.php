<div class="container-fluid px-4">
<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label> ID Sampah </label>
		<input type="text" class="form-control" name="ID_Sampah" required>
	</div>
	<div class="form-group">
		<label> Jenis Sampah </label>
		<select class="form-control" name="ID_Jenis_Sampah">
	<option value=""-->--Pilih Jenis Sampah--</option>
		<?php $ambil=$koneksi->query("SELECT*FROM jenis_sampah");?>
		<?php while($pecahh=$ambil->fetch_assoc()){?>
	<option value="<?php echo $pecahh['ID_Jenis_Sampah']?>" required><?php echo $pecahh['ID_Jenis_Sampah']?>-<?php echo $pecahh['Jenis_Sampah']?></option>
	<?php } ?>
		</select>
	</div>
	<div class="form-group">
		<label> Nama Sampah </label>
		<input type="text" class="form-control" name="Nama_Sampah" required>
	</div>
	<div class="form-group">
		<label> Jenis Satuan </label>
		<select class="form-control" name="ID_Satuan">
	<option value="">--Pilih Jenis Satuan--</option>
		<?php $ambil=$koneksi->query("SELECT*FROM jenis_satuan");?>
		<?php while($pecahh=$ambil->fetch_assoc()){?>
	<option value="<?php echo $pecahh['ID_Satuan']?>" required><?php echo $pecahh['ID_Satuan']?>-<?php echo $pecahh['Jenis_Satuan']?></option>
	<?php } ?>
		</select>
	</div>
	<div class="form-group">
		<label> Poin per satuan </label>
		<input type="text" class="form-control" name="Poin" required>
	</div>
	<div class="form-group">
		<label>Foto Sampah</label> 
		<input type="file" class="form-control" name="Foto_Sampah" >
	</div>
	<button class="btn btn-primary" name="save"> Simpan </button>
</form>
<?php
if (isset ( $_POST['save']))
{
	$file = $_FILES['Foto_Sampah']['name'];
	$tmp_name = $_FILES['Foto_Sampah']['tmp_name'];
	move_uploaded_file($tmp_name, "../Photo/".$file);
	$koneksi->query("INSERT INTO sampah (ID_Sampah, ID_Jenis_Sampah, Nama_Sampah, ID_Satuan, Poin, Foto_Sampah)
	VALUES('$_POST[ID_Sampah]','$_POST[ID_Jenis_Sampah]','$_POST[Nama_Sampah]','$_POST[ID_Satuan]','$_POST[Poin]','$file')");	
	echo "<div class='alert alert-info'> Data Berhasil Ditambahkan </div>";
	echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=sampah'>";

}
?>