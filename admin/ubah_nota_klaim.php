<?php
	include 'koneksi.php';

	if(!isset($_SESSION["akun"]))
	{

	}
?>

<?php
$idmem = $_GET["id"];
$ambil=$koneksi->query("SELECT * FROM nota_gift JOIN akun ON nota_gift.ID_Akun=akun.ID_Akun WHERE nota_gift.ID_Nota_Gift='$_GET[id]' ");
$detail=$ambil->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="assets/js/plugins/nucleo/css/nucleo.css" rel="stylesheet" />
  <link href="assets/js/plugins/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet" />
</head>

<?php //include 'menu.php'; ?>
</br>
</br>
	<div class="container-fluid px-4">
		<h2>Konfirmasi Penyetoran</h2>
		<h5>Kirim bukti penyetoran</h5>
		<div class="alert alert-info">
		<?php
		$ambilll=$koneksi->query("SELECT * FROM nota_gift JOIN cabang_bank_sampah on nota_gift.ID_Cabang_Bank=cabang_bank_sampah.ID_Cabang_Bank WHERE nota_gift.ID_Nota_Gift='$_GET[id]' ");
		$detailll=$ambilll->fetch_assoc();
		?>
			<?php if (empty($detail["info"])): ?>
			<div class="row">
	<?php elseif (isset($detail["info"])): ?>
			<div class="row">
				<div class="col-md-7">
					<div class="alert alert-info">
						<?php echo $detail['info'];?>
					</div>
				</div>
			</div>
	<?php endif ?>		
	</div>	
		<form method="post" enctype="multipart/form-data">
			<div class="form-group">
				<label>Nama akun</label>
				<input type="text" name="akunn" class="form-control" readonly value ="<?php echo $detail["Nama_Lengkap"];?>"></input>
			</div>
			<div class="form-group">
				<label>Bukti Kirim</label>
				<input type="file" name="bukti_kirim" class="form-control" required>
			</div>
			<button class="btn btn-primary" name="kirim">Kirim</button>
		</form>
</div>
	<?php 
		if(isset($_POST["kirim"]))
		{
			$namabukti=$_FILES["bukti_kirim"]["name"];
			$lokasibukti=$_FILES["bukti_kirim"]["tmp_name"];
			move_uploaded_file($lokasibukti, "Bukti_Klaim/".$namabukti);

			$koneksi->query("UPDATE nota_gift SET Bukti_Klaim='$namabukti' WHERE ID_Nota_Gift='$idmem'");
			//$koneksi->query("UPDATE nota_gift SET Kode_Statbayar='SB003' WHERE Kode_Faktur='$idmem'");
			$koneksi->query("UPDATE nota_gift SET ID_Statusklaim='SK000001' WHERE ID_Nota_Gift='$idmem'");
			$koneksi->query("UPDATE nota_gift JOIN akun ON nota_gift.ID_Akun=akun.ID_Akun SET Total_Poin_Akun=Total_Poin_Akun-Poin_Klaim WHERE ID_Nota_Gift='$idmem'");
			echo "<script>alert('pembayaran selesai ');</script>";
			echo "<script>location='index.php?halaman=notagift';</script>";
		}
	?>
</body>
</html>