<?php
session_start();

$koneksi=new mysqli("localhost","root","","beautycyclebank");

if(empty($_SESSION["keranjang_klaim"]) OR !isset($_SESSION["keranjang_klaim"]))
{
		echo "<script>alert('Keranjang belum diisi, silahkan pilih hadiah');</script>";
		echo "<script>location='klaim_hadiah.php';</script>";
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
	<marquee><h1> <b><font face ="cornsilk"color="black">Keranjang Klaim </font></b></h1></marquee>
		<hr>
		<table class= "table table-bordered" style="background-color:cornsilk;">
			<thead>
				<tr>
					<th>No.</th>
					<th>Nama Hadiah</th>
					<th>Besar Poin</th>
					<th>Sub Hadiah</th>
					<th>Ubah Sub Hadiah</th>
					<th>Sub Poin Klaim</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php $nomor=1;?>	
            	<?php $Sub_Poin_Klaim=0;?>
            	<?php $Total_Hadiah=0;?>
            	<?php $Poin_Klaim=0;?>

<?php if(isset($_SESSION["akun"])):?>
            	<?php $ID_Member=$_SESSION["akun"]["ID_Akun"];
					$ambil=$koneksi->query("SELECT*FROM akun WHERE ID_Akun='$ID_Member'");
					$pecah=$ambil->fetch_assoc();
					$Total_Poin=$pecah['Total_Poin_Akun']?>
				<?php foreach ($_SESSION["keranjang_klaim"] as $ID_Hadiah=> $QTY):?>
				<!-- menampilkan produk yg sedang diperulangkan berdasarkan ID Hadiah-->
				<?php
					$ambil=$koneksi->query("SELECT*FROM hadiah WHERE ID_Gift='$ID_Hadiah'");
					$pecah=$ambil->fetch_assoc();
					$Sub_Poin_Klaim=$pecah["Poin_Gift"]*$QTY;
					$Total_Hadiah+=$QTY;
					$Poin_Klaim+=$Sub_Poin_Klaim;
				?>
				<tr>
					<td><?php echo $nomor;?></td>
					<td><?php echo $pecah["Nama_Gift"];?> </td>
					<td><?php echo number_format($pecah['Poin_Gift']);?> Poin</td>
					<td><?php echo number_format($QTY);?></td>
 					<td> <a href ="keranjang_klaim.php?id=<?php echo $ID_Hadiah ?>" class="btn btn-default"> <strong> <font size="3"> - </font><strong> </a> 
					<?php echo $QTY; ?>
					<a href ="keranjang_klaim.php?kode=<?php echo $ID_Hadiah ?>" class="btn btn-default"> <strong> <font size="3"> + </font><strong></a></td>		  <td><?php echo number_format($Sub_Poin_Klaim);?> poin </td>
					<td>
						<a href="hapus_keranjang_klaim.php?id=<?php echo $ID_Hadiah?>" class="btn btn-danger btn-xs"> Hapus </a>
					</td>
				</tr>
				<?php $nomor++;?>
				<?php endforeach ?>
			</tbody>
		</table>
		<h3>Total Hadiah <?php echo number_format($Total_Hadiah,0,',','.');?> & Poin Klaim <?php echo number_format($Poin_Klaim,1,',','.');?> Poin</h3>
		<form method="post">
		<a href="klaim_hadiah.php" class="btn btn-default">Kembali</a>		
		<button class="btn btn-primary" name="checkout_klaim">Checkout</button>
	</form>
		<?php
		if(isset($_POST["checkout_klaim"]))
		{
			if($Total_Poin>=$Poin_Klaim)
			{
				echo "<script> alert('Poin Anda Berhasil Diklaim');</script>";
				echo "<script>location='checkout_klaim.php';</script>";	
			}
			else
			{
				echo "<script> alert('Maaf Poin Anda Tidak Mencukupi');</script>";
				echo "<script>location='keranjang_klaim.php';</script>";	
			}	
		}?>
	</div>
		<?php if(isset($_GET['id'])):
				  $ID_Hadiah=$_GET['id'];
				  $_SESSION["keranjang_klaim"][$ID_Hadiah]-=1;
				  if ($_SESSION["keranjang_klaim"][$ID_Hadiah]==0):
					  unset($_SESSION["keranjang_klaim"][$ID_Hadiah]);
				  endif;
				      echo "<script>location='keranjang_klaim.php';</script>";
			  elseif (isset($_GET['kode'])):
				  $ID_Hadiah=$_GET['kode'];
				  $_SESSION["keranjang_klaim"][$ID_Hadiah]+=1;
				  echo "<script>location='keranjang_klaim.php';</script>";				
				  if ($_SESSION["keranjang_klaim"][$ID_Hadiah]>=$pecah['Stok_Gift']):
					  $_SESSION["keranjang_klaim"][$ID_Hadiah]=$pecah['Stok_Gift'];
				  endif;
			  else :
			  endif ?>

<?php else: ?>
				<?php foreach ($_SESSION["keranjang_klaim"] as $ID_Hadiah=> $QTY):?>
				<!-- menampilkan produk yg sedang diperulangkan berdasarkan ID Hadiah-->
				<?php
					$ambil=$koneksi->query("SELECT*FROM hadiah WHERE ID_Gift='$ID_Hadiah'");
					$pecah=$ambil->fetch_assoc();
					$Sub_Poin_Klaim=$pecah["Poin_Gift"]*$QTY;
					$Total_Hadiah+=$QTY;
					$Poin_Klaim+=$Sub_Poin_Klaim;
				?>
				<tr>
					<td><?php echo $nomor;?></td>
					<td><?php echo $pecah["Nama_Gift"];?> </td>
					<td><?php echo number_format($pecah['Poin_Gift']);?> Poin</td>
					<td><?php echo number_format($QTY);?></td>
 					<td> <a href ="keranjang_klaim.php?id=<?php echo $ID_Hadiah ?>" class="btn btn-default"> <strong> <font size="3"> - </font><strong> </a> 
					<?php echo $QTY; ?>
					<a href ="keranjang_klaim.php?kode=<?php echo $ID_Hadiah ?>" class="btn btn-default"> <strong> <font size="3"> + </font><strong></a></td>		  <td><?php echo number_format($Sub_Poin_Klaim);?> poin </td>
					<td>
						<a href="hapus_keranjang_klaim.php?id=<?php echo $ID_Hadiah?>" class="btn btn-danger btn-xs"> Hapus </a>
					</td>
				</tr>
				<?php $nomor++;?>
				<?php endforeach ?>
			</tbody>
		</table>
		<h3>Total Hadiah <?php echo number_format($Total_Hadiah,0,',','.');?> & Poin Klaim <?php echo number_format($Poin_Klaim,1,',','.');?> Poin</h3>
		<form method="post">
		<a href="klaim_hadiah.php" class="btn btn-default">Kembali</a>		
		<button class="btn btn-primary" name="checkout_klaim">Checkout</button>
	</form>
		<?php
		if(isset($_POST["checkout_klaim"]))
		{
			echo "<script> alert('Anda Harus Login Terlebih Dahulu');</script>";
			echo "<script>location='login.php';</script>";	
		}?>
	</div>
		<?php if(isset($_GET['id'])):
				  $ID_Hadiah=$_GET['id'];
				  $_SESSION["keranjang_klaim"][$ID_Hadiah]-=1;
				  if ($_SESSION["keranjang_klaim"][$ID_Hadiah]==0):
					  unset($_SESSION["keranjang_klaim"][$ID_Hadiah]);
				  endif;
				      echo "<script>location='keranjang_klaim.php';</script>";
			  elseif (isset($_GET['kode'])):
				  $ID_Hadiah=$_GET['kode'];
				  $_SESSION["keranjang_klaim"][$ID_Hadiah]+=1;
				  echo "<script>location='keranjang_klaim.php';</script>";				
				  if ($_SESSION["keranjang_klaim"][$ID_Hadiah]>=$pecah['Stok']):
					  $_SESSION["keranjang_klaim"][$ID_Hadiah]=$pecah['Stok'];
				  endif;
			  else :
			  endif ?>

<?php endif ?>

</section>			
</body>
</html>