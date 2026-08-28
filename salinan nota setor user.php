<?php
session_start();

$koneksi=new mysqli("localhost","root","","beautycyclebank");
//$id_notasetor='$_GET[id]';
?>

<!DOCTYPE html>
<html>

<head>
	<title> Beautycyclebank </title>
	<!-- Favicon -->
	<link href="assets/img/brand/ikonn.png" rel="icon" type="image/png">
	<link rel="stylesheet" href="admin/assets/css/bootstrap.css">
</head>

<body style="background-image:URL(faktur.jpg)">
<!-- /. navbar  -->
<?php include'menu.php'?>
<section class="konten">
	<div class="container">
</br>	
</br>
	<h2>Nota Setor</h2>
<?php
$ambil=$koneksi->query("SELECT * FROM nota_setor JOIN akun on nota_setor.ID_Akun=akun.ID_Akun WHERE nota_setor.ID_Nota_Setor='$_GET[id]' ");
$detail=$ambil->fetch_assoc();
?>
<p>
<?php
$ambilll=$koneksi->query("SELECT * FROM nota_setor JOIN cabang_bank_sampah on nota_setor.ID_Cabang_Bank=cabang_bank_sampah.ID_Cabang_Bank WHERE nota_setor.ID_Nota_Setor='$_GET[id]' ");
 $detailll=$ambilll->fetch_assoc();
?>
<div class="row">
	<div class="col-md-4">
	<h3>Penyetoran</h3>
<h4> <strong> 
ID Notasetor        : <?php echo $detail['ID_Nota_Setor'];?></strong> <br>
Tanggal Penyetoran  : <?php echo date("l, d F Y",strtotime($detail['Tanggal_Setor']));?><br>
Cabang Bank			: <?php echo $detailll['Nama_Bank'];?><br>
Total Poin  		: <?php echo number_format($detail['Total_Poin']);?><br>
	</div>
	<div class="col-md-4">
		<h3>akun</h3>
	<h4> 
	<strong> 
	Nama Lengkap	: <?php echo $detail['Nama_Lengkap'];?></strong><br>
	Alamat Lengkap	: <?php echo $detail['Alamat_Rumah'];?><br>
	Nomor Handphone : <?php echo $detail['Nomor_Handphone'];?><br>
	Email : <?php echo $detail['Email'];?><br>
	</h4>
</div>
</P>
</br>
</br>
<table class="table table-bordered"> 
	<thead>
		<tr>
			<th>No</th>
			<th>ID Nota Setor</th>
			<th>Nama Sampah</th>
			<th>Total Berat</th>
			<th>Sub Penambahan Poin</th>
		</tr>
	</thead>
	<tbody>
	<?php $nomor=1;?>
	<?php $Penambahan_Poin=0;?>
		<?php $ambil=$koneksi->query("SELECT * FROM transaksi_setor JOIN sampah ON transaksi_setor.ID_Sampah=sampah.ID_Sampah WHERE transaksi_setor.ID_Nota_Setor='$_GET[id]'"); ?>
		<?php while($pecah=$ambil->fetch_assoc()){?>
		<tr>
			<td><?php echo $nomor ?></td>
			<td><?php echo $pecah['ID_Nota_Setor'];?></td>
			<td><?php echo $pecah['Nama_Sampah'];?></td>
			<td><?php echo number_format ($pecah['Sub_Berat']);?> Kg</td>
			<td><?php echo number_format ($pecah['Total_Poin']*$pecah['Sub_Berat']);?> Poin</td>			
		</tr>
		<?php $nomor++; ?>
		<?php $Penambahan_Poin+=($pecah['Total_Poin']*$pecah['Sub_Berat']);?>
		<?php } ?>
	</tbody>
	<tfoot>
		<tr>
			<th colspan="4"> Penambahan Poin </th>
			<th><?php echo number_format ($Penambahan_Poin);?> Poin
		</tr>
</table>

<a href="setor_sampah.php" class="btn btn-warning">Selesai</a>
	</div>
</section>
</body>
</html>