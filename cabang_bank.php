<?php 
session_start(); 
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "beautycyclebank";

$koneksi = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
$cabang_bank_sampah ="";
$ID_Kota="";
$ID_Provinsi = "";
$strq = "";
$strw = "";
$jmlget =0;

    if(isset($_GET['ID_Kota'])){
      $ID_Kota = $_GET['ID_Kota'];
      $strc[] = "cabang_bank_sampah.ID_Kota= '$ID_Kota'";
      $jmlget++;
    }
    if (isset($_GET['ID_Provinsi'])) {
      $ID_Provinsi = $_GET['ID_Provinsi'];
      $strc[] = "provinsi.ID_Provinsi = '$ID_Provinsi'";
      $jmlget++;
    }

    // susun string
    
    if($jmlget > 0){
      $strw = "WHERE ";
      $i = 1;
      foreach($strc as $strs){
        $strw .= $strs;
        if($i < $jmlget){
          $strw .= " AND ";
          $i++;
        }
      }
    }

    $query = "SELECT * FROM cabang_bank_sampah 
             JOIN kota on cabang_bank_sampah.ID_Kota=kota.ID_Kota
             JOIN provinsi ON kota.ID_Provinsi=provinsi.ID_Provinsi $strw";

    $result=mysqli_query($koneksi,$query);
    $resnum = mysqli_num_rows($result);

    $query_cabang_bank_sampah  = "SELECT * FROM cabang_bank_sampah";
    $result_cabang_bank_sampah = mysqli_query($koneksi,$query_cabang_bank_sampah);    

    $query_kota = "SELECT * FROM kota";
    $result_kota= mysqli_query($koneksi,$query_kota);

    $query_prov = "SELECT * FROM provinsi";
    $result_prov = mysqli_query($koneksi,$query_prov);

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
    <div class="col-lg-12">
        <center><h2>Daftar Cabang Bank </h2></center>  
</div>
    </div>  
<section class="konten">
    <div class="container">   
    <div class="row">
        <form action="cabang_bank.php" method="GET">
        <br></br>
          <div class="row">
            <div class="col-sm">
            <div class="col-md-10 col-lg-2 products-number-sort">
                <div class="products-sort-by mt-2 mt-lg-0">
                   <select name="ID_Provinsi" id="ID_Provinsi" class="form-control">
                      <option selected disabled> -- Provinsi -- </option>
                      <?php while($perproduk = mysqli_fetch_assoc($result_prov)) { ?>
                        <option value="<?php echo $perproduk['ID_Provinsi']; ?>"> <?php echo $perproduk['Nama_Provinsi']; ?></option>
                    <?php } ?>
                </select>
            </div></div>
            <div class="col-md-12 col-lg-2 products-number-sort">
                <div class="products-sort-by mt-2 mt-lg-0">
                   <select name="ID_Kota" id="ID_Kota" class="form-control">
                      <option selected disabled>   Kota  </option>
                      <?php while($perproduk = mysqli_fetch_assoc($result_kota)) { ?>
                        <option value="<?php echo $perproduk['ID_Kota']; ?>"> <?php echo $perproduk['Nama_Kota']; ?></option>
                    <?php } ?>
                </select>
            </div></div>   
           <div class="row">
            <div class="col-sm">
              <input type="submit" class="btn btn-primary mb-4" name="submit" value="Search">
              <a href="cabang_bank.php" class="btn btn-success square-btn-adjust"><i class="fa fa-refresh"></i> Refresh </a> 
            </div>
          </div>     
        </form>
    </div>

<!--konten-->

<!-- /. ROW  -->
<hr />
        <div class="row"> 
		<?php $nomor=1;?>               
        <table id="datatablesSimple" class="table table-bordered" style="background-color:white">
    	<thead>
    		<tr>
			<th><center>No</th>
			<th><center>NAMA CABANG</th>
			<th><center>KOTA</th>
			<th><center>PROVINSI</th>	
      <th><center>ALAMAT CABANG</th>	


		</tr>
	</thead>
	<tbody>
  		<tr>
  			<?php while($row = mysqli_fetch_assoc($result)) { ?>
			<td><center><?php echo $nomor;?></td>
			<td><center><?php echo $row["Nama_Bank"];?></td>
			<td><center><?php echo $row["Nama_Kota"];?></td>	
      <td><center><?php echo $row["Nama_Provinsi"];?></td>	
			<td><center><?php echo $row["Alamat_Bank"];?></td>	
		</tr>
		<?php $nomor++; ?>
        <?php }?> 
    </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js" type="text/javascript"></script>
<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

    <script src="js/vendor/bootstrap.min.js"></script>

    <script src="js/datepicker.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>
    <script src="js/jquery.js"></script>
    <script>
        $(document).ready(function() {
            $('#ID_Provinsi').change(function() {
                var ID_Provinsi = $(this).val();

                $.ajax({
                    type: 'POST',
                    url: 'cobaprov.php',
                    data: 'ID_Provinsi='+ID_Provinsi,
                    success: function(response) {
                        $('#ID_Kota').html (response);
                    }
                });
            })
        });
    </script>
  
</body>
</html>
</body>
</body>
</html>

	