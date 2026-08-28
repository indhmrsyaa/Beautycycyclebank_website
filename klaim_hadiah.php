<?php 
session_start(); 
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "beautycyclebank";

$koneksi = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

$hadiah ="";
$cabang_bank ="";
$strq = "";
$strw = "";
$jmlget =0;

if(isset($_GET['cabang_bank'])){
    $cabang_bank = $_GET['cabang_bank'];
    $strc[] = "transaksi_stok_hadiah.ID_Cabang_Bank= '$cabang_bank'";
    $jmlget++;
  }
    // susun string
    $i = 1;
    if($jmlget > 0){
      $strw = "WHERE ";
      foreach($strc as $strs){
        $strw .= $strs;
        if($i < $jmlget){
          $strw .= " AND ";
          $i++;
        }
      }
    }
    $query = "SELECT * FROM transaksi_stok_hadiah 
    inner join hadiah on transaksi_stok_hadiah.ID_Gift=hadiah.ID_Gift
    inner join cabang_bank_sampah on transaksi_stok_hadiah.ID_Cabang_Bank=cabang_bank_sampah.ID_Cabang_Bank

    $strw";
    $result=mysqli_query($koneksi,$query);
    $resnum = mysqli_num_rows($result);

    $query_transaksi  = "SELECT * FROM transaksi_stok_hadiah ";
    $result_transaksi = mysqli_query($koneksi, $query_transaksi);

    $query_hadiah  = "SELECT * FROM hadiah ";
    $result_hadiah = mysqli_query($koneksi, $query_hadiah); 
    
    $query_cabang_bank = "SELECT * FROM cabang_bank_sampah";
    $result_cabang_bank = mysqli_query($koneksi,$query_cabang_bank);

    $title = "beautycyclebank"; 
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


<!--k
<section class="konten">
    <div class="container">   
    <div class="row">
        <form action="Klaim_hadiah.php" method="GET">
        <br></br>
          <div class="row">
            <div class="col-sm">
            <div class="col-md-12 col-lg-2 products-number-sort" >
                <div class="products-sort-by mt-2 mt-lg-0" width="15">
                      <select name="cabang_bank" class="form-control" >
                        <option selected disabled>-- Cabang Bank -- </option>
                            ?php while($row = mysqli_fetch_assoc($result_cabang_bank)) { ?>
                            <option value="php echo $row['ID_Cabang_Bank']; ?>"> </option>
                        
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

. ROW  -->
<section class="konten">
    <div class="container"> 
        <div class="row">
    <div class="col-lg-12">
        <br>
        <center><h2>Daftar Hadiah</h2></center>  
</div>
    </div> 
<section class="konten">
<div class="container"> 
    <div class="row">
        <div class="col-lg-12">
            <?php if(isset($_SESSION["akun"])):?>
            <left-top-bar><h4>Poin Anda =
            <?php
            $ID_Akun=$_SESSION["akun"]["ID_Akun"];
           
            $ambil=$koneksi->query("SELECT*FROM akun WHERE ID_Akun='$ID_Akun'");
            $pecah=$ambil->fetch_assoc();?>
            <?php echo $pecah['Total_Poin_Akun']?></h4></left-top-bar>     
        </div>
    </div> 
</div>
<?php endif?>
<hr/>
        <div class="row">  
        <?php while($row = mysqli_fetch_assoc($result_hadiah)) { ?>           
            <?php if($row["Stok_Gift"]>'0'): ?>
            <div class="col-md-3" >
                <div class="thumbnail">
                    <img src="Photo/<?php echo $row['Foto_Gift'];?>" width="300" height="300">
                    <div class="caption">
                        <h4><?php echo $row['Nama_Gift'];?></h4>
                        <h5><?php echo number_format($row['Poin_Gift']);?> Poin</h5>
                        <h5>Stok: <?php echo number_format($row['Stok_Gift']);?></h5> 
            <a href="transaksi_klaim.php?id=<?php echo $row['ID_Gift']; ?>" class="btn btn-primary">Klaim Hadiah</a>
                    </div>
                </div>
            </div>
            <?php else: ?>
            <div class="col-md-3" >
                <div class="thumbnail">
                    <img src="Photo/<?php echo $row['Foto_Gift'];?>" width="300" height="300">
                    <div class="caption">
                        <h4><?php echo $row['Nama_Gift'];?></h4>
                        <h5><?php echo number_format($row['Poin_Gift']);?> Poin</h5>
                        <h5>Stok: <?php echo number_format($row['Stok_Gift']);?></h5>
            <a href="transaksi_klaim_2.php" class="btn btn-primary">Klaim Hadiah</a>
                    </div>
                </div>
            </div>
            <?php endif ?>
            <?php }?>

        </div>      
    </div>
    </div>
</section>
</body>
</html>
