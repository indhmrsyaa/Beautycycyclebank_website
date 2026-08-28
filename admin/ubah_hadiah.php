<?php
$ambil=$koneksi->query("SELECT * FROM hadiah WHERE ID_Gift='$_GET[id]'");
$pecah=$ambil->fetch_assoc();
?>

<div class="container-fluid px-4">
<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label> ID Gift </label>
		<input type="text" class="form-control"name="IDGift"  value="<?php echo $pecah['ID_Gift'];?>"required>
	</div>
	<div class="form-group">
		<label> Nama Gift </label>
		<input type="text" class="form-control" name="Namagift" value="<?php echo $pecah['Nama_Gift'];?>">
	</div>
	<div class="form-group">
		<label> Poin Gift </label>
		<input type="text" class="form-control" name="Poingift" value="<?php echo $pecah['Poin_Gift'];?>">
	</div>
	<div class="form-group">
		<label> Stok Gift </label>
		<input type="text" class="form-control" name="Stokgift" value="<?php echo $pecah['Stok_Gift'];?>">
	</div>
	<div class="form-group">
		<img src="../Photo/<?php echo $pecah['Foto_Gift']?>" width="200" required>
	</div>
	<div class="form-group">
		<label> Ganti photo </label>
		<input type="file" name="Fotohadiah" class="form-control">
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

    // Cek apakah ada file foto yang diupload
    if ($_FILES['Fotohadiah']['name'] != '')
    {
		$nama=$_FILES['Fotohadiah']['name'];
		$lokasi=$_FILES['Fotohadiah']['tmp_name'];
		move_uploaded_file($lokasi, "../Photo/$nama");	

		$sql="UPDATE hadiah SET ID_Gift='$ID_Gift',Nama_Gift='$Nama_Gift',Poin_Gift='$Poin_Gift',Stok_Gift='$Stok_Gift',Foto_Gift='$nama' WHERE ID_Gift='$ID_Gift'";
	}
	else
	{
		$sql="UPDATE hadiah SET ID_Gift='$ID_Gift',Nama_Gift='$Nama_Gift',Poin_Gift='$Poin_Gift',Stok_Gift='$Stok_Gift' WHERE ID_Gift='$ID_Gift'";
	}
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