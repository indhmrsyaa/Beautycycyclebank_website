<?php
	include 'koneksi.php';

	if(!isset($_SESSION["akun"]))
	{

	}
?>

<?php
$idmem = $_GET["id"];
$ambil=$koneksi->query("SELECT * FROM nota_setor JOIN akun ON nota_setor.ID_Akun=akun.ID_Akun WHERE nota_setor.ID_Nota_Setor='$_GET[id]' ");
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
		<?php
		$ambilll=$koneksi->query("SELECT * FROM nota_setor JOIN cabang_bank on nota_setor.ID_Cabangbank=cabang_bank.ID_Cabangbank WHERE nota_setor.ID_Nota_Setor='$_GET[id]' ");
		$detailll=$ambilll->fetch_assoc();
		?>
			<?php if (empty($detail["info"])): ?>
			<div class="row">
				<div class="col-md-7">
					<p>Silahkan kirim  </br>
					<strong> <?php echo $detail ['Nomor_Rekening']; ?>   AN. <?php echo $detail ['Nama_Lengkap'];?> </strong></p>
				</div>
			</div>
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
				<input type="text" name="nama" class="form-control" readonly value ="<?php echo $_SESSION["akun"]["Nama_Lengkap"];?>"></input>
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
			$nama = date("YmdHis").$namabukti;
			move_uploaded_file($lokasibukti, "Bukti_Pembayaran/$nama");
			$Tanggal_Penyetoran = date("l, Y-m-d");
			$koneksi->query("UPDATE nota_setor SET Bukti_Penyetoran='$nama',Tanggal_Penyetoran='$Tanggal_Penyetoran' WHERE ID_Nota_Setor='$idmem'");
			//$koneksi->query("UPDATE nota_setor SET Kode_Statbayar='SB003' WHERE Kode_Faktur='$idmem'");
			$koneksi->query("UPDATE nota_setor SET ID_Statussetor='SS000001' WHERE ID_Nota_Setor='$idmem'");
			echo "<script>alert('pembayaran selesai ');</script>";
			echo "<script>location='index.php?halaman=notasetor';</script>";
		}
	?>
</body>
</html>