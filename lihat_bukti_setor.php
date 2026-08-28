<?php
session_start();
$koneksi=new mysqli ("localhost","root", "", "beautycyclebank");
//mendapatkan kode nota dari url
	$ID_Notasetor = $_GET["id"];

	//mendapatkan data pembayaran berdasarkan kode nota
	$ambil = $koneksi->query("SELECT * FROM nota_setor INNER JOIN akun ON nota_setor.ID_Nota_Setor = '$ID_Notasetor' AND nota_setor.ID_Akun = akun.ID_Akun");
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
		<h3>Lihat Bukti Pembayaran</h3>
		<div class="row">
			<div class="col-md-6">
				<table class="table">
					<tr>
						<th>ID Notasetor</th>
						<td><?php echo $detail["ID_Nota_Setor"]; ?></td>
					</tr>
					<tr>
						<th>Nama Lengkap</th>
						<td><?php echo $detail["Nama_Lengkap"]; ?></td>
					</tr>
					<tr>
						<th>Tanggal Penyetoran</th>
						<td><?php echo  date("l, d F Y",strtotime($detail["Tanggal_setor"])); ?></td>
					</tr>					
					<tr>
						<th> Total Poin</th>
						<td><?php echo number_format($detail["Total_Poin"]);?> Poin</td>
					</tr>
				</table>
			</div>
			<div class="col-md-6">
				<img src="admin/Bukti_Pembayaran/<?php echo $detail["Bukti_Penyetoran"]; ?>" alt="" class="img-responsive" height="300" width="300">
			</div>
		</div>
		<br>
		<table id="datatablesSimple" class="table table-bordered border-dark" background="">
  		<thead>
    	  </div>
		  <h3>DETAIL TRANSAKSI</h3>
    	  <thead>
		  <tr>
			<th> No. </th>
			<th> NO Nota Setor </th>
			<th> Nama sampah</th>
			<th> Sub Berat </th>
			<th> Sub Poin  </th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1;?>
		<?php $ambil=$koneksi->query("SELECT * FROM transaksi_setor 
          INNER JOIN sampah ON transaksi_setor.ID_Sampah=sampah.ID_Sampah JOIN jenis_satuan on sampah.ID_Satuan=jenis_satuan.ID_Satuan
          INNER JOIN nota_setor ON transaksi_setor.ID_Nota_Setor=nota_setor.ID_Nota_Setor WHERE nota_setor.ID_Nota_Setor='$_GET[id]' ");?>
		<?php while($pecah=$ambil->fetch_assoc()){?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['ID_Nota_Setor']; ?></td>
			<td><?php echo $pecah['Nama_Sampah']; ?></td>
			<td><?php echo number_format($pecah['Sub_Total']);?> <?php echo $pecah['Jenis_Satuan']; ?></td></td>
			<td><?php echo number_format($pecah['Sub_Poin']);?></td>
		</tr>
		<?php $nomor++; ?>
		<?php } ?>
	</tbody>
</table>
		<a href="riwayat_setor.php" class="btn btn-primary">Kembali</a>
	</div>
</body>
</html>
