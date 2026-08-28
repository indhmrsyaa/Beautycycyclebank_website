<?php
$ambil=$koneksi->query("SELECT * FROM sampah JOIN jenis_sampah ON sampah.ID_Jenis_Sampah=sampah.ID_Jenis_Sampah JOIN jenis_satuan ON sampah.ID_Satuan=jenis_satuan.ID_Satuan WHERE ID_Sampah='$_GET[id]'");
$pecah=$ambil->fetch_assoc();
?>

<div class="container-fluid px-4">
<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label> ID Sampah </label>
		<input type="text" class="form-control" name="IDSampah"  value="<?php echo $pecah['ID_Sampah'];?>"required>
	</div>
	<div class="form-group">
		<label> Jenis Sampah </label>
		<select class="form-control" name="IDJenisSampah">
		<?php $ambil=$koneksi->query("SELECT*FROM jenis_sampah");?>
		<?php while($pecahh=$ambil->fetch_assoc()){?>
	<option style="display: none;" value="<?php echo $pecahh['ID_Jenis_Sampah']?>"<?php echo ($pecahh['ID_Jenis_Sampah'] == $pecah['ID_Jenis_Sampah']) ? 'selected' : ''; ?>><?php echo $pecahh['ID_Jenis_Sampah']?>-<?php echo $pecahh['Jenis_Sampah']?></option>
	<?php } ?>
		</select>
	</div>		
	<div class="form-group">
		<label> Nama Sampah </label>
		<input type="text" class="form-control" name="NamaSampah" value="<?php echo $pecah['Nama_Sampah'];?>"required>
	</div>
	<div class="form-group">
		<label> Jenis Satuan </label>
		<select class="form-control" name="IDSatuan">
		<?php $ambil=$koneksi->query("SELECT*FROM jenis_satuan");?>
		<?php while($pecahh=$ambil->fetch_assoc()){?>
	<option style="display: none;" value="<?php echo $pecahh['ID_Satuan']?>"<?php echo ($pecahh['ID_Satuan'] == $pecah['ID_Satuan']) ? 'selected' : ''; ?>><?php echo $pecahh['ID_Satuan']?>-<?php echo $pecahh['Jenis_Satuan']?></option>
	<?php } ?>
		</select>
	</div>
	<div class="form-group">
		<label> Bonus Poin </label>
		<input type="text" class="form-control" name="BonusPoin" value="<?php echo $pecah['Poin'];?>">
	</div>
	<div class="form-group">
		<img src="../Photo/<?php echo $pecah['Foto_Sampah']?>" width="200" required>
	</div>
	<div class="form-group">
		<label> Ganti photo </label>
		<input type="file" name="Fotosampah" class="form-control">
	</div>
	<button class="btn btn-primary" name="ubah"> Ubah </button>
</form>

<?php
if(isset($_POST['ubah']))
{
	$ID_Sampah=isset($_POST['IDSampah']) ? $_POST['IDSampah']:'';
	$Nama_Sampah=isset($_POST['NamaSampah']) ? $_POST['NamaSampah']:'';
	$Bonus_Poin=isset($_POST['BonusPoin']) ? $_POST['BonusPoin']:'';
	$Fotosampah=isset($_FILES['foto']['name']) ? $_FILES['foto']['name']:'';
	$ID_Satuan=isset($_POST['IDSatuan']) ? $_POST['IDSatuan']:'';	
	$ID_Jenis_Sampah=isset($_POST['IDJenisSampah']) ? $_POST['IDJenisSampah']:'';

    // Cek apakah ada file foto yang diupload
    if ($_FILES['Fotosampah']['name'] != '')
    {
        $nama = $_FILES['Fotosampah']['name'];
        $lokasi = $_FILES['Fotosampah']['tmp_name'];
        move_uploaded_file($lokasi, "../Photo/$nama");

  		$sql ="UPDATE sampah SET ID_Sampah='$_POST[IDSampah]',ID_Jenis_Sampah='$_POST[IDJenisSampah]',Nama_Sampah='$_POST[NamaSampah]',ID_Satuan='$_POST[IDSatuan]',Bonus_Poin='$_POST[BonusPoin]', Foto_Sampah='$nama' WHERE ID_Sampah='$_GET[id]'";
    }
    else 
    {
        // Jika tidak ada file foto yang diupload, tidak perlu mengganti foto
        $sql ="UPDATE sampah SET ID_Sampah='$_POST[IDSampah]',ID_Jenis_Sampah='$_POST[IDJenisSampah]',Nama_Sampah='$_POST[NamaSampah]',ID_Satuan='$_POST[IDSatuan]',Poin='$_POST[BonusPoin]' WHERE ID_Sampah='$_GET[id]'";
    }

	$hasil = mysqli_query($koneksi, $sql);
	if($hasil) 
	{
		echo "<script>alert('Data Berhasil Diubah'); document.location.href='index.php?halaman=sampah'; </script>";
	} 
	else 
	{
		echo "<script>alert('Proses Gagal'); document.location.href='index.php?halaman=ubahsampah'; </script>";
	}
   }
?>