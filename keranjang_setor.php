<?php
session_start();

$koneksi=new mysqli("localhost","root","","beautycyclebank");

if(empty($_SESSION["keranjang_setor"]) OR !isset($_SESSION["keranjang_setor"]))
{
		echo "<script>alert('Keranjang belum diisi, silahkan belanja dahulu ^-^');</script>";
		echo "<script>location='setor_sampah.php';</script>";
}
?>

<!DOCTYPE html>
<html>

<head>
	<title> Beautycyclebank </title>
	<!-- Favicon -->
	<link href="assets/img/brand/ikonn.png" rel="icon" type="image/png">
	<link rel="stylesheet" href="admin/assets/css/bootstrap.css">
</head>

<body style="background-image:URL(Photo/bg4.jpg)">

<?php include'menu.php'?>

<section class="konten">
	<div class="container">
	<marquee><h1> <b><font face ="cornsilk"color="black">Keranjang Setor </font></b></h1></marquee>
		<hr>
		<table class= "table table-bordered bg-white" style="background-color:cornsilk;">
			<thead>
				<tr>
					<th>No.</th>
					<th>Nama Sampah</th>
					<th>Bonus Poin</th>
					<th>Sub Total</th>
					<th>Ubah Sub Berat</th>
					<th>Sub Penambahan Poin</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php $nomor=1;?>
				<?php $Total_Berat=0;?>
            	<?php $Sub_Penambahan_Poin=0;?>
            	<?php $Penambahan_Poin=0;?>
            	<?php $Total_Poin=0;?>
				<?php foreach ($_SESSION["keranjang_setor"] as $ID_Sampah=> $Sub_Berat):?>
				<!-- menampilkan produk yg sedang diperulangkan berdasarkan ID Sampah-->
				<?php
					$ambil=$koneksi->query("SELECT*FROM sampah inner join Jenis_Satuan on sampah.ID_Satuan=jenis_satuan.ID_Satuan WHERE ID_Sampah='$ID_Sampah'");
					$pecah=$ambil->fetch_assoc();
					$Sub_Penambahan_Poin=$pecah["Poin"]*$Sub_Berat;
					$Total_Berat+=$Sub_Berat;
					$Penambahan_Poin+=$Sub_Penambahan_Poin;
					$Total_Poin+=$Penambahan_Poin;
				?>
				<tr>
					<td><?php echo $nomor;?></td>
					<td><?php echo $pecah["Nama_Sampah"];?></td>
					<td><?php echo number_format($pecah['Poin']);?> Poin</td>
					<td><?php echo number_format($Sub_Berat); ?> <?php echo $pecah["Jenis_Satuan"];?></td>
					<td> <a href ="keranjang_setor.php?id=<?php echo $ID_Sampah ?>" class="btn btn-default"> <strong> <font size="3"> - </font><strong> </a> 
					<?php echo $Sub_Berat; ?>
					<a href ="keranjang_setor.php?kode=<?php echo $ID_Sampah ?>" class="btn btn-default"> <strong> <font size="3"> + </font><strong></a></td>					
					<td><?php echo number_format($Sub_Penambahan_Poin);?> Poin</td>
					<td>
						<a href="hapus_keranjang_setor.php?id=<?php echo $ID_Sampah?>" class="btn btn-danger btn-xs"> Hapus </a>
					</td>
				</tr>
				<?php $nomor++;?>
				<?php endforeach ?>
			</tbody>
		</table>
		<h3>Total Poin <?php echo number_format($Penambahan_Poin,1,',','.');?> Poin</h3>
		<a href="index.php" class="btn btn-default">Lanjutkan Setor</a>
		<a href="checkout_setor.php" class="btn btn-primary">Checkout Setor</a>
	</div>
	
		<?php if(isset($_GET['id'])):
				$ID_Sampah=$_GET['id'];
				$_SESSION["keranjang_setor"][$ID_Sampah]-=1;
				if ($_SESSION["keranjang_setor"][$ID_Sampah]==0):
					unset($_SESSION["keranjang_setor"][$ID_Sampah]);
				endif;
				echo "<script>location='keranjang_setor.php';</script>";
			elseif (isset($_GET['kode'])):
				$ID_Sampah=$_GET['kode'];
				$_SESSION["keranjang_setor"][$ID_Sampah]+=1;
				echo "<script>location='keranjang_setor.php';</script>";
			else :
			endif ?>	
</section>			
</body>
</html>