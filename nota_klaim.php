<?php

session_start ();
$koneksi=new mysqli("localhost","root","","beautycyclebank");
$id_notaklaim='$_GET[id]';
?>

<!DOCTYPE html>
<html>

<head>
	<title> beautycyclebank </title>
	<!-- Favicon -->
	<link href="assets/img/brand/ikonn.png" rel="icon" type="image/png">
	<link rel="stylesheet" href="assets/css/bootstrap.css">
</head>

<body STYLE="BACKGROUND-IMAGE:URL(faktur.jpg)">

<!-- /. navbar  -->
<?php include'menu.php'?>
<section class="konten">
	<div class="container">
</br>	
</br>
<h2>Nota Klaim</h2>

<?php
$ambil=$koneksi->query("SELECT * FROM nota_gift JOIN akun on nota_gift.ID_Akun=akun.ID_Akun WHERE nota_gift.ID_Nota_Gift='$_GET[id]' ");
$detail=$ambil->fetch_assoc();
?>
<p>

<?php
$ambilll=$koneksi->query("SELECT * FROM nota_gift JOIN cabang_bank_sampah on nota_gift.ID_Cabang_Bank=cabang_bank_sampah.ID_Cabang_Bank WHERE nota_gift.ID_Nota_Gift='$_GET[id]' ");
$detailll=$ambilll->fetch_assoc();
?>
<?php
$ambilllll= $koneksi->query("SELECT * FROM nota_gift JOIN status_klaim on nota_gift.ID_Statusklaim=status_klaim.ID_Statusklaim
						   WHERE nota_gift.ID_Nota_Gift='$_GET[id]'");
$detailllll = $ambilllll->fetch_assoc();
?>

<div class="row">
	<div class="col-md-4">
		<h3>Klaim Hadiah</h3>
			<h4> 
				<strong> 
						ID Nota Gift 	: <?php echo $detail['ID_Nota_Gift']; ?></strong><br>
						Tanggal Klaim  	: <?php echo date("d F Y",strtotime($detail['Tanggal_Klaim']));?><br>
						Cabang Bank 	: <?php echo $detailll['Nama_Bank']; ?></strong><br>
						Poin Klaim 		: <?php echo number_format($detail['Poin_Klaim']);?> Poin<br>
	</div>
	<div class="col-md-4">
		<h3>Member</h3>
	<h4> <strong> 
	Nama Lengkap	: <?php echo $detail['Nama_Lengkap'];?></strong><br>
	Alamat Rumah	: <?php echo $detail['Alamat_Rumah'];?><br>
	Nomor Handphone	: <?php echo $detail['No_Hp'];?><br>
	Email			: <?php echo $detail['Email'];?><br></h4></div>
</p>
</br>
</br>
<table class="table table-bordered"> 
	<thead>
		<tr>
			<th>No</th>
			<th>Nama Hadiah</th>
			<th>Jumlah Hadiah</th>
			<th>Besar Poin</th>
			<th>Sub Poin Klaim</th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1;?>
		<?php $Total_Hadiah=0;?>
		<?php $Poin_Klaim=0;?>
		<?php $ambil=$koneksi->query("SELECT * FROM transaksi_gift JOIN hadiah ON transaksi_gift.ID_Gift=hadiah.ID_Gift 
		WHERE transaksi_gift.ID_Nota_Gift='$_GET[id]' ");?>
		<?php while($pecah=$ambil->fetch_assoc()){?>
		<tr>
			<td><?php echo $nomor?></td>
			<td><?php echo $pecah['Nama_Gift'];?></td>
			<td><?php echo $pecah['QTY']; ?></td>
			<td><?php echo $pecah['sub_poin'];?></td>
			<td><?php echo $pecah['sub_poin']*$pecah['QTY'];?></td>		
		</tr>
		<?php $nomor++;?>
		<?php $Total_Hadiah+=$pecah['QTY'];?>
		<?php $Poin_Klaim+=$pecah['sub_poin']*$pecah['QTY'];?>	
			<?php } ?>
	</tbody>
	<tfoot>
	<tr>
		<th colspan="3">Total Hadiah</th>
		<th><?php echo number_format($Total_Hadiah)?>
	</tr>
	<tr>
		<th colspan="4">Poin Klaim</th>
		<th><?php echo number_format($Poin_Klaim)?> Poin
	</tr>
</table>
<?php if (empty($detail["info"])): ?>
			<div class="row">
				<div class="col-md-7">
					<div class="alert alert-info">
						<p>Silahkan tunggu konfirmasi max 2x24 jam untuk pengambilan hadiah, Terimakasih><<strong></strong></p>					
					</div>
				</div>
			</div>
<?php elseif (isset($detail["info"])): ?>
			<div class="row">
				<div class="col-md-7">
					<div class="alert alert-info">
						<?php echo $detail['info']; ?>
					</div>
				</div>
			</div>
<?php endif ?>
<a href="klaim_hadiah.php" class="btn btn-warning">Selesai</a>
	</div>
</section>
</body>
</html>