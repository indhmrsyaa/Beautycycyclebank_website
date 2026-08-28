<?php
$ambil=$koneksi->query("SELECT*FROM kota WHERE ID_Kota='$_GET[id]'");
$pecah=$ambil->fetch_assoc();
?>

<div class="container-fluid px-4">
<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label> ID Kota</label>
		<input type="text" class="form-control" name="IDkota"  value="<?php echo $pecah['ID_Kota'];?>"required>
	</div>
	<div class="form-group">
		<label> Nama Kota </label>
		<input type="text" class="form-control" name="namakota" value="<?php echo $pecah['Nama_Kota'];?>"required>
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
	<button class="btn btn-primary" name="ubah"> Ubah </button>
</form>

<?php
if(isset($_POST['ubah']))
{
	$koneksi->query("UPDATE kota SET ID_Kota='$_POST[IDkota]',Nama_Kota='$_POST[namakota]',ID_Provinsi='$_POST[ID_Provinsi]' WHERE ID_Kota='$_GET[id]'");

echo "<script> alert(' Data Berhasil Diubah');</script>";
echo "<script>location='index.php?halaman=kota';</script>";
}

?>