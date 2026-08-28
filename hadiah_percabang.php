<?php
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "beautycyclebank";

$koneksi = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
?>

<?php
$cabang=$_GET["keyword"];
$semuadata=array();
$ambil=$koneksi->query("SELECT * FROM transaksi_stok_hadiah 
inner join hadiah on transaksi_stok_hadiah.ID_Gift=hadiah.ID_Gift
inner join cabang_bank_sampah on transaksi_stok_hadiah.ID_Cabang_Bank=cabang_bank_sampah.ID_Cabang_Bank WHERE transaksi_stok_sammpah.ID_Cabang_Bank='%$cabang%' ORDER BY Hadiah.ID_Gift ASC");
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
        <form action="hadiah_percabang.php" method="GET">
        <br></br>
          <div class="row">
            <div class="col-sm">
            <div class="col-md-12 col-lg-2 products-number-sort" >
                <div class="products-sort-by mt-2 mt-lg-0" width="15">
                      <select name="cabang_bank" class="form-control" >
                        <option selected disabled>-- Cabang Bank -- </option>
                            <?php while($row = mysqli_fetch_assoc($result_cabang_bank)) { ?>
                            <option value="<?php echo $row['ID_Cabang_Bank']; ?>"> <?php echo $row['Nama_Bank']; ?></option>
                            <?php } ?>
                        </select>
                    </div></div>      
           <div class="row">
            <div class="col-sm">
              <input type="submit" class="btn btn-primary mb-4" name="submit" value="Search">
              <a href="klaim_hadiah.php" class="btn btn-success square-btn-adjust"><i class="fa fa-refresh"></i> Refresh </a> 
            </div>
          </div>   
        </form>
    </div>
<section class="konten">
    <div class="container">     
        <div class="row">
    <div class="col-lg-12">
        <center><h2>Daftar Hadiah</h2></center>  
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
                    <img src="Photo/<?php echo $value['Foto_Gift'];?>" width="300" height="300">
                    <div class="caption">
                        <h4> <?php echo $value['Nama_Gift'];?></h4>
                        <h5> stok : <?php echo number_format($value['Stok_Hadiah']);?> Poin</h5>
          <a href="transaksi_klaim.php?id=<?php echo $value['ID_Gift'];?>" class="btn btn-primary">Keranjang</a>
                    </div>
                </div>
            </div>
			<?php endforeach?>		
		</div>
	</div>
    <div>               

	</div> 
        
    </div>
</body>
</html>