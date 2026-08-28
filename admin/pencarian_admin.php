<?php

if(isset($_POST['cari']))
{
  $_SESSION['session_pencarian'] = $_POST["keyword"];
  $keyword=$_SESSION['session_pencarian'];
}
else
{
  $keyword=$_SESSION['session_pencarian'];
}

$query=mysqli_query($koneksi, "SELECT * FROM admin WHERE Email LIKE '%$keyword%' OR Nama_Admin LIKE '%$keyword%' OR Level LIKE '%$keyword%'")

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

<!-- End Navbar -->
<div class="container-fluid px-4">
    <h1 class="mt-4">User</h1>
      <ol class="breadcrumb mt-2 bg-transparent">
        <li  class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
          <li class="breadcrumb-item active">User</li>
      </ol>
<form class="form-horizontal" role="search" method="post" action="index.php?halaman=pencarianadmin">
  <div class="row">
      <div class="col-md-3">
        <div class="form-group">
          <input type="text" class="form-control" name="keyword" placeholder="Masukkan User" autofocus autocomplete="off">
        </div>
    </div>
    <div class="col-md-2">
      <div class="form-group">
        <label></label>
        <button class="btn btn-primary" name="cari">Cari</button>
      </div>
    </div>
  </div>
</form>
    <div class="card shadow" style="margin-top:22px">
      <div class="card-header border-4">        
        <h4 class="mb-0">Tabel User</h4>
      </div>
  <div class="card-body" style="margin-top:-1px">
  <table id="datatablesSimple" class="table table-bordered border-dark" background="">
  <thead>
    <a href="index.php?halaman=admin" class="btn btn-success square-btn-adjust" style="margin-bottom:16px"><i class="fa fa-refresh"></i> Refresh </a> 
    <div style="float:right;" class="col-md-0">
    <input type="button" class="btn btn-success square-btn-adjust" style="margin-bottom:16px" class="fa fa-reply-all" value="Kembali" onclick="history.back(-1)"/>
    </div>
    <thead>
    <tr>
			<th> No. </th>
			<th> Nama Lengkap </th>
			<th> Email </th>
			<th> Password </th>
			<th> Level </th>
			<th> Aksi </th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1;?>
		<?php $ambil=$koneksi->query("SELECT * FROM admin WHERE Email LIKE '%$keyword%' OR Nama_Admin LIKE '%$keyword%' OR Level LIKE '%$keyword%'");?>
		<?php while($pecah=$ambil->fetch_assoc()){?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td> <?php echo $pecah['Nama_Admin']; ?></td>
			<td> <?php echo $pecah['Email']; ?></td>
			<td> <?php echo $pecah ['Password']; ?></td>
			<td><?php echo $pecah['Level']; ?></td>
			<td> 
		<a href="index.php?halaman=hapusadmin&id=<?php echo $pecah['Email'];?> " class="btn-danger btn" >Hapus</a>
		<a href="index.php?halaman=ubahadmin&id=<?php echo $pecah['Email'];?>" class="btn btn-warning"> Ubah </a>
			</td>
		</tr>
		<?php $nomor++; ?>
		<?php } ?>
	</tbody>
</table>
<a href=" index.php?halaman=tambahadmin" class ="btn btn-primary"> Tambah </a>
</html>