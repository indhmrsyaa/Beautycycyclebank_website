<?php 
session_start(); 
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "beautycyclebank";

$koneksi = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
$sampah ="";
$jenis_sampah ="";
$strq = "";
$strw = "";
$jmlget =0;

    if(isset($_GET['jenis_sampah'])){
      $jenis_sampah = $_GET['jenis_sampah'];
      $strc[] = "sampah.ID_Jenis_Sampah= '$jenis_sampah'";
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

    $query = "SELECT * FROM sampah 
             inner join jenis_sampah on sampah.ID_Jenis_Sampah=jenis_sampah.ID_Jenis_Sampah
             inner join jenis_satuan on sampah.ID_Satuan=jenis_satuan.ID_Satuan
   
    $strw";
    $result=mysqli_query($koneksi,$query);
    $resnum = mysqli_num_rows($result);

    $query_sampah  = "SELECT * FROM sampah";
    $result_sampah = mysqli_query($koneksi,$query_sampah);    

    $query_jenis_sampah  = "SELECT * FROM jenis_sampah";
    $result_jenis_sampah = mysqli_query($koneksi,$query_jenis_sampah);

    $title = "beautycyclebank"; 
?>

<!DOCTYPE html>
<html>
<head>
    <title> beautycyclebank </title>
    <!-- Favicon -->
    <link href="assets/img/brand/ikonn.png" rel="icon" type="image/png">
    <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
</head>

<body style="background-image:URL(Photo/bg4.jpg)">

<?php include'menu.php' ?>

<!--konten-->
<section class="konten">
    <div class="container">   
    <div class="row">
        <form action="setor_sampah.php" method="GET">
        <br></br>
          <div class="row">
            <div class="col-sm">
            <div class="col-md-12 col-lg-2 products-number-sort" >
                <div class="products-sort-by mt-2 mt-lg-0" width="15">
                      <select name="jenis_sampah" class="form-control" >
                        <option selected disabled>-- Jenis Sampah -- </option>
                            <?php while($row = mysqli_fetch_assoc($result_jenis_sampah)) { ?>
                            <option value="<?php echo $row['ID_Jenis_Sampah']; ?>"> <?php echo $row['Jenis_Sampah']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>      
           <div class="row">
            <div class="col-sm">
              <input type="submit" class="btn btn-primary mb-4" name="submit" value="Search">
              <a href="setor_sampah.php" class="btn btn-success square-btn-adjust"><i class="fa fa-refresh"></i> Refresh </a> 
            </div>
          </div>     
        </form>
    </div>

<!--konten-->
<section class="konten">
    <div class="container"> 
        <div class="row">
    <div class="col-lg-12">
        <center><h2>Daftar Sampah</h2></center>  
</div>
    </div>  

<!-- /. ROW  -->
<hr />
        <div>
        <div class="row">             
            <?php while($row = mysqli_fetch_assoc($result)) { ?>
            <div class="col-md-3" >
                <div class="thumbnail">
                    <img src="Photo/<?php echo $row['Foto_Sampah'];?>" width="300" height="300">
                    <div class="caption">
                        <h4> <?php echo $row['Nama_Sampah'];?>-<?php echo $row['Jenis_Sampah'];?></h4>
                        <h5> <?php echo number_format($row['Poin']);?> Poin/<?php echo $row['Jenis_Satuan'];?></h5>
            <a href="transaksi_setor.php?id=<?php echo $row['ID_Sampah'];?>" class="btn btn-primary">Keranjang</a>
                    </div>
                </div>
            </div>
            <?php }?> 
    </div>
</section>
</body>
</html>
