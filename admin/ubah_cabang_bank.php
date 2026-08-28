<?php
$ambil=$koneksi->query("SELECT * FROM cabang_bank_sampah JOIN kota ON cabang_bank_sampah.ID_Kota=kota.ID_Kota WHERE ID_Cabang_Bank='$_GET[id]'");
$pecah=$ambil->fetch_assoc();
?>

<div class="container-fluid px-4">
<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label> ID Cabang Bank </label>
		<input type="text" class="form-control" name="IDCabangbank"  value="<?php echo $pecah['ID_Cabang_Bank'];?>"required>
	</div>
	<div class="form-group">
		<label> Nama Cabang </label>
		<input type="text" class="form-control" name="Namabank" value="<?php echo $pecah['Nama_Bank'];?>"required>
	</div>
	<div class="form-group">
    <label> Id_Kota </label>
    <select class="form-control" name="ID_Kota">
        <option style="display: none;" value="">--Pilih Kota--</option>
    <?php $ambil=$koneksi->query("SELECT * FROM kota");?>
    <?php while($pecahh=$ambil->fetch_assoc()){?>
  <option value="<?php echo $pecahh['ID_Kota']?>"<?php echo ($pecahh['ID_Kota'] == $pecah['ID_Kota']) ? 'selected' : ''; ?>><?php echo $pecahh['ID_Kota']?>-<?php echo $pecahh['Nama_Kota']?></option>
  <?php } ?>
    </select>
  </div>
	<div class="form-group">
		<label> Alamat Cabang </label>
		<input type="text" class="form-control" name="Alamatbank" value="<?php echo $pecah['Alamat_Bank'];?>"required>
	</div> 
	<button class="btn btn-primary" name="ubah"> Ubah </button>
</form>

<?php
if(isset($_POST['ubah']))
{
	$koneksi->query("UPDATE cabang_bank_sampah SET ID_Cabang_Bank='$_POST[IDCabangbank]',Nama_Bank='$_POST[Namabank]', ID_Kota='$_POST[ID_Kota]', Alamat_Bank='$_POST[Alamatbank]' WHERE ID_Cabang_Bank='$_GET[id]'");

echo "<script> alert(' Data Berhasil Diubah ');</script>";
echo "<script>location='index.php?halaman=cabangbank';</script>";
}


?>