<?php
$ambil=$koneksi->query("SELECT * FROM transaksi_stok_hadiah JOIN cabang_bank_sampah ON transaksi_stok_hadiah.ID_Cabang_Bank=cabang_bank_sampah.ID_Cabang_Bank
JOIN hadiah ON transaksi_stok_hadiah.ID_Gift=hadiah.ID_Gift WHERE ID_Gift='$_GET[id_gift]' AND ID_Cabang_Bank='$_GET[id_cabang]' ");
$pecah=$ambil->fetch_assoc();
?>

<div class="container-fluid px-4">
<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label> Nama Cabang </label>
		<input type="text" class="form-control"name="Namacabang" readonly value="<?php echo $pecah['ID_Cabang_Bank '];?>"required><?php echo $pecahh['Nama_Bank']?>
	</div>
	<div class="form-group">
		<label> Nama Gift </label>
		<input type="text" class="form-control" name="Namagift" readonly value="<?php echo $pecah['ID_Gift'];?>"required><?php echo $pecahh['Nama_Gift']?>
	</div>
	<div class="form-group">
		<label> Tambah Stok </label>
		<input type="text" class="form-control" name="Stok" required>
	</div>
	<button class="btn btn-primary" name="ubah"> Ubah </button>
</form>

<?php
if(isset($_POST['ubah']))
{
	$ID_Gift=isset($_POST['IDGift']) ? $_POST['IDGift']:'';
	$Nama_Gift=isset($_POST['Namagift']) ? $_POST['Namagift']:'';
	$Poin_Gift=isset($_POST['Poingift']) ? $_POST['Poingift']:'';
	$Stok_Gift=isset($_POST['Stokgift']) ? $_POST['Stokgift']:'';	
	$Fotohadiah=isset($_FILES['foto']['name']) ? $_FILES['foto']['name']:'';
	$nama=$_FILES['Fotohadiah']['name'];
	$lokasi=$_FILES['Fotohadiah']['tmp_name'];

	move_uploaded_file($lokasi, "../Photo/$nama");	

	$sql="UPDATE hadiah SET ID_Gift='$ID_Gift',Nama_Gift='$Nama_Gift',Poin_Gift='$Poin_Gift',Stok_Gift='$Stok_Gift',Foto_Gift='$nama' WHERE ID_Gift='$ID_Gift'";
		$hasil = mysqli_query($koneksi, $sql);
		if($hasil) 
		{
			echo "<script>alert('Data Berhasil Diubah'); document.location.href='index.php?halaman=hadiah';</script>";
		} 
		else 
		{
			echo "<script>alert('Proses Gagal'); document.location.href='index.php?halaman=ubahhadiah';</script>";
		}
}


?>