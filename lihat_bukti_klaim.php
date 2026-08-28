<?php
session_start();
$koneksi=new mysqli ("localhost","root", "", "beautycyclebank");
//mendapatkan kode nota dari url
	$ID_Notagift = $_GET["id"];

	//mendapatkan data pembayaran berdasarkan kode nota
	$ambil = $koneksi->query("SELECT * FROM nota_gift INNER JOIN akun ON nota_gift.ID_Nota_Gift = '$ID_Notagift' AND nota_gift.ID_Akun = akun.ID_Akun");
	$detail = $ambil->fetch_assoc();
	//echo "<pre>";
	//print_r($detail);
	//echo "</pre>";
?>

<!DOCTYPE html>
<html>
<head>
	<title> Beautycyclebank </title>
	<!-- Favicon -->
	<link href="assets/img/brand/ikonn.png" rel="icon" type="image/png">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
</head>
<body style="background-image:URL()">
	<div class="container">
		<h3>Lihat Bukti Klaim Hadiah</h3>
		<div class="row">
			<div class="col-md-6">
				<table class="table">
					<tr>
						<th>ID Notasetor</th>
						<td><?php echo $detail["ID_Nota_Gift"]; ?></td>
					</tr>
					<tr>
						<th>Nama Lengkap</th>
						<td><?php echo $detail["Nama_Lengkap"]; ?></td>
					</tr>
					<tr>
						<th>Tanggal Penyetoran</th>
						<td><?php echo  date("l, d F Y",strtotime($detail["Tanggal_Klaim"])); ?></td>
					</tr>					
					<tr>
						<th> Total Poin</th>
						<td><?php echo number_format($detail["Poin_Klaim"]);?> Poin</td>
					</tr>
				</table>
			</div>
			<div class="col-md-6">
				<img src="admin/Bukti_Klaim/<?php echo $detail["Bukti_Klaim"]; ?>" alt="" class="img-responsive" height="300" width="300">
			</div>
		</div>
		<h3>Detail Transaksi</h3>
		<br>
		<table id="datatablesSimple" class="table table-bordered border-dark" background="">
  		<thead>
    	  </div>
    	  <thead>
		  <tr>
			<th> No. </th>
			<th> NO Nota Klaim Gift </th>
			<th> Nama Hadiah </th>
			<th> Sub Total </th>
			<th> Sub Poin  </th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1;?>
		<?php $ambil=$koneksi->query("SELECT * FROM transaksi_gift 
          INNER JOIN hadiah ON transaksi_gift.ID_Gift=hadiah.ID_Gift
          INNER JOIN nota_gift ON transaksi_gift.ID_Nota_Gift=nota_gift.ID_Nota_Gift WHERE nota_gift.ID_Nota_Gift='$_GET[id]' ");?>
		<?php while($pecah=$ambil->fetch_assoc()){?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['ID_Nota_Gift']; ?></td>
			<td><?php echo $pecah['Nama_Gift']; ?></td>
			<td><?php echo number_format($pecah['QTY']);?></td>
			<td><?php echo number_format($pecah['sub_poin']);?></td>
		</tr>
		<?php $nomor++; ?>
		<?php } ?>
	</tbody>
</table>
		<a href="riwayat_klaim.php" class="btn btn-primary">Kembali</a>
	</div>
</body>
</html>
