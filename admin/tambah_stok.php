<?php
$gift = $_GET['id_gift'];
$cabang = $_GET['id_cabang'];

$ambil = $koneksi->query("SELECT * FROM transaksi_stok_hadiah
    JOIN cabang_bank_sampah ON transaksi_stok_hadiah.ID_Cabang_Bank = cabang_bank_sampah.ID_Cabang_Bank
    JOIN hadiah ON transaksi_stok_hadiah.ID_Gift = hadiah.ID_Gift
    WHERE transaksi_stok_hadiah.ID_Gift = '$gift' AND transaksi_stok_hadiah.ID_Cabang_Bank = '$cabang'");

// Pemeriksaan kesalahan dalam kueri
if (!$ambil) die($koneksi->error);

$pecah = $ambil->fetch_assoc();
?>


<div class="container-fluid px-4">
<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label> Nama Cabang </label>
		<input type="text" class="form-control"name="Namacabang" readonly value="<?php echo $pecah['Nama_Bank'];?>"required>
	</div>
	<div class="form-group">
		<label> Nama Gift </label>
		<input type="text" class="form-control" name="Namagift" readonly value="<?php echo $pecah['Nama_Gift'];?>"required>
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
	$ID_Gift=isset($_POST['Stok']) ? $_POST['Stok']:'';
    $Tanggal = date(" Y-m-d");
	$koneksi->query("UPDATE hadiah SET Stok_Gift=Stok_Gift+$ID_Gift WHERE ID_Gift='$gift'");
	$sql="UPDATE transaksi_stok_hadiah SET Stok_Hadiah=Stok_Hadiah+$ID_Gift, Tanggal_Update='$Tanggal' WHERE transaksi_stok_hadiah.ID_Gift = '$gift' AND transaksi_stok_hadiah.ID_Cabang_Bank = '$cabang'";
		$hasil = mysqli_query($koneksi, $sql);
		if($hasil) 
		{
			echo "<script>alert('Data Berhasil Diubah'); document.location.href='index.php?halaman=hadiah';</script>";
		} 
		else 
		{
			echo "<script>alert('Proses Gagal'); document.location.href='index.php?halaman=tambahstok';</script>";
		}
}


?>