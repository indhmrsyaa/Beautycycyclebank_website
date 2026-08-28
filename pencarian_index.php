<?php
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "beautycyclebank";

$koneksi = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
?>

<?php
$keyword=$_GET["keyword"];
$semuadata=array();
$ambil=$koneksi->query("SELECT * FROM sampah INNER JOIN jenis_sampah ON sampah.ID_Jenis_Sampah=jenis_sampah.ID_Jenis_Sampah WHERE ID_Sampah LIKE '%$keyword%' OR Jenis_Sampah LIKE '%$keyword%' OR Nama_Sampah LIKE '%$keyword%'OR Foto_Sampah LIKE '%$keyword%'  ORDER BY sampah.ID_Jenis_Sampah ASC");
while($pecah=$ambil->fetch_assoc())
{
	$semuadata[]=$pecah;
}	
?>

<?php
$keyword=$_GET["keyword"];
$semuadataa=array();
$ambill=$koneksi->query("SELECT * FROM hadiah WHERE ID_Gift LIKE '%$keyword%'  OR Nama_Gift LIKE '%$keyword%'OR Poin_Gift LIKE '%$keyword%'");
while($pecahh=$ambill->fetch_assoc())
{
    $semuadataa[]=$pecahh;
}
?>
<?php
$keyword=$_GET["keyword"];
$semuadata=array();
$ambil=$koneksi->query("SELECT * FROM cabang_bank_sampah INNER JOIN kota ON cabang_bank_sampah.ID_Kota=kota.ID_Kota WHERE Nama_Bank LIKE '%$keyword%' OR Nama_Kota LIKE '%$keyword%' OR Alamat_Bank LIKE '%$keyword%'  ORDER BY cabang_bank_sampah.ID_Kota ASC");
while($pecah=$ambil->fetch_assoc())
{
	$semuadata[]=$pecah;
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
<!--konten-->
<section class="konten">
    <div class="container">     
        <div class="row">
    <div class="col-lg-12">
        <center><h2>Daftar Pencarian</h2></center>  
</div>
    </div>  

<!-- /. ROW  -->
<hr />
        <div>
        <div class="row">
            <?php if(empty($semuadata)):?>
            <?php endif?> 					
			<?php foreach ($semuadata as $key =>$value):?>		
            <div class="col-md-3" >
                <div class="thumbnail">
                    <img src="Photo/<?php echo $value['Foto_Sampah'];?>" width="300" height="300">
                    <div class="caption">
                        <h4> <?php echo $value['Nama_Sampah'];?>-<?php echo $value['Jenis_Sampah'];?></h4>
                        <h5> <?php echo number_format($value['Poin']);?> Poin</h5>
          <a href="transaksi_setor.php?id=<?php echo $value['ID_Sampah'];?>" class="btn btn-primary">Keranjang</a>
                    </div>
                </div>
            </div>
			<?php endforeach?>		
		</div>
	</div>
    <div>        
        <div class="row">   
            <?php if(empty($semuadataa)):?>
            <?php endif?>         
            <?php foreach ($semuadataa as $keyy =>$valuee):?>  
            <?php if($valuee["Stok_Gift"]>'0'): ?>    
            <div class="col-md-3" >
                <div class="thumbnail">
                    <img src="Photo/<?php echo $valuee['Foto_Gift'];?>" width="300" height="300">
                    <div class="caption">
                        <h4> <?php echo $valuee['Nama_Gift'];?></h4>
                        <h5> Rp. <?php echo number_format($valuee['Poin_Gift']);?>/Kg</h5>
                        <h5>Stok: <?php echo number_format($valuee['Stok_Gift']);?></h5>
          <a href="transaksi_klaim.php?id=<?php echo $valuee['ID_Gift'];?>" class="btn btn-primary">Klaim Hadiah</a>
                    </div>
                </div>
            </div>
            <?php else: ?>
            <div class="col-md-3" >
                <div class="thumbnail">
                    <img src="Photo/<?php echo $valuee['Foto_Gift'];?>" width="300" height="300">
                    <div class="caption">
                        <h4><?php echo $valuee['Nama_Gift'];?></h4>
                        <h5><?php echo number_format($valuee['Poin_Gift']);?> Poin</h5>
                        <h5>Stok: <?php echo number_format($valuee['Stok_Gift']);?></h5>
            <a href="transaksi_klaim_2.php" class="btn btn-primary">Klaim Hadiah</a>
                    </div>
                </div>
            </div>
            <div>
        <div class="row">
	</div>
            <?php endif ?>
            <?php endforeach?>      
        </div>
    </div>
</body>
</html>