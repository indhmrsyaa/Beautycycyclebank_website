<?php
session_start();

$koneksi=new mysqli("localhost","root","","beautycyclebank");
?>

<?php
if(!isset($_SESSION["akun"]))
{
	echo "<script>alert('Anda Harus Login Terlebih Dahulu');</script>";
	echo "<script>location='login.php';</script>";
}
?>

<!DOCTYPE html>
<html>

<head>
	<title> Beautycyclebank </title>
	<!-- Favicon -->
	<link href="assets/img/brand/ikonn.png" rel="icon" type="image/png">
   	 <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
    	<link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
</head>

<body style="background-image:URL(Photo/bg4.jpg)">
<?php include 'menu.php';?>
<section class="riwayat">
<div class="container">
	<div class="row">
		<div class="col-md-9" style="margin-bottom:35px">
			<div style="color: black" >
				<h2>Riwayat Klaim <?php echo $_SESSION["akun"]["Nama_Lengkap"];?></h2>
			</div>
		</div>
	</div>
  	<table id="datatablesSimple" class="table table-bordered" style="background-color:white">
  	<thead>
    	<a href="riwayat_klaim.php" class="btn btn-success square-btn-adjust" style="margin-bottom:16px"><i class="fa fa-refresh"></i> Refresh </a> 
    	<div style="float:right;" class="col-md-0">
    	<input type="button" class="btn btn-success square-btn-adjust" style="margin-bottom:16px" class="fa fa-reply-all" value="Kembali" onclick="history.back(-1)"/>
    	</div>
    	<thead>
    		<tr>
			<th><center>No</th>
			<th><center>ID Nota Klaim</th>
			<th><center>Tanggal Klaim</th>
			<th><center>Cabang Bank</th>	
			<th><center>Poin Klaim</th>
			<th><center>Status Klaim</th>
			<th><center>Aksi</th>
		</tr>
	</thead>
	<tbody>
	<?php $nomor=1;?>	
	<?php
		//mendapatkan id pelanggan yg login dari session
		$id_member = $_SESSION["akun"]["ID_Akun"];
		$ambil = $koneksi->query("SELECT * FROM nota_gift JOIN cabang_bank_sampah ON nota_gift.ID_Cabang_Bank = cabang_bank_sampah.ID_Cabang_Bank JOIN status_klaim ON nota_gift.ID_Statusklaim = status_klaim.ID_Statusklaim WHERE ID_Akun='$id_member'");
			while ($pecah = $ambil->fetch_assoc()){?>
		<tr>
			<td><center><?php echo $nomor;?></td>
			<td><center><?php echo $pecah["ID_Nota_Gift"];?></td>
			<td><center><?php echo date("d F Y",strtotime($pecah["Tanggal_Klaim"])); ?></td>
			<td><center><?php echo $pecah["Nama_Bank"];?></td>	
			<td><center><?php echo $pecah["Poin_Klaim"];?></td>
			<td><center><?php echo $pecah["Status_Klaim"];?></td>	
			<td><center>
	        <a href="lihat_bukti_klaim.php?id=<?php echo $pecah["ID_Nota_Gift"];?>" class="btn btn-primary"><center>Lihat Bukti</center></a>
			<?php if ( $pecah['ID_Statusklaim']=='SK000002') { ?>
				<a href="kirim_bukti_klaim.php?id=<?php echo $pecah["ID_Nota_Gift"];?>" class="btn btn-danger"><center>Kirim Bukti</center></a>
             <?php } ?>
	    </td>	
		</tr>
		<?php $nomor++; ?>
		<?php } ?>
	</tbody>
	</table>
</div>
</section>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
	</body>
</html>