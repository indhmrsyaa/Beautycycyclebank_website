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
			<h2>Riwayat Setor <?php echo $_SESSION["akun"]["Nama_Lengkap"];?></h2>
			</div>
	</div>
</div>
  <table id="datatablesSimple" class="table table-bordered border-dark" style="background-color:white">
  <thead>
    	<a href="riwayat_setor.php" class="btn btn-success square-btn-adjust" style="margin-bottom:16px"><i class="fa fa-refresh"></i> Refresh </a> 
    	<div style="float:right;" class="col-md-0">
    	<input type="button" class="btn btn-success square-btn-adjust" style="margin-bottom:16px" class="fa fa-reply-all" value="Kembali" onclick="history.back(-1)"/>
    	</div>
    	<thead>
    <tr>
		<th><center>No</th>
		<th><center>ID Nota Setor</th>
		<th><center>Tanggal Penyetoran</th>
		<th><center>Cabang Bank</th>	
		<th><center>Penambahan Poin</th>
		<th><center>Status Setor</th>
		<th><center>Aksi</th>
	</tr>
</thead>
<tbody>
	<?php $nomor=1;?>
	<?php
	//mendapatkan id pelanggan yg login dari session
	$id_akun = $_SESSION["akun"]["ID_Akun"];
	$ambil = $koneksi->query("SELECT * FROM nota_setor JOIN cabang_bank_sampah ON nota_setor.ID_Cabang_Bank = cabang_bank_sampah.ID_Cabang_Bank JOIN status_setor ON nota_setor.ID_Statussetor = status_setor.ID_Statussetor WHERE ID_Akun='$id_akun'");
	
	while ($pecah = $ambil->fetch_assoc()) {?>
	<tr>
	    <td><center><?php echo $nomor;?><center></td>
	    <td><center><?php echo $pecah["ID_Nota_Setor"];?><center></td>
	    <td><center><?php echo date("l, d F Y",strtotime($pecah["Tanggal_setor"]));?><center></td>
	    <td><center><?php echo $pecah["Nama_Bank"];?><center></td>	
	    <td><center><?php echo $pecah["Total_Poin"];?> Poin<center></td>
	    <td><center><?php echo $pecah["Status_Setor"];?><center></td>
	    <td><center>
	        <a href="lihat_bukti_setor.php?id=<?php echo $pecah["ID_Nota_Setor"];?>" class="btn btn-primary"><center>Lihat Bukti</center></a>
			<?php if ( $pecah['ID_Statussetor']=='SS000002') { ?>
				<a href="kirim_bukti_setor.php?id=<?php echo $pecah["ID_Nota_Setor"];?>" class="btn btn-danger"><center>Kirim Bukti</center></a>
             <?php } ?>
	       
	    </td>
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