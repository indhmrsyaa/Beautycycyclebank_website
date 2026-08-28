

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
    <h1 class="mt-4">Nota Klaim</h1>
      <ol class="breadcrumb mt-2 bg-transparent">
        <li  class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
          <li class="breadcrumb-item active">Nota Klaim</li>
      </ol>
    <div class="card shadow" style="margin-top:24px">
      <div class="card-header border-4">        
        <h4 class="mb-0">Tabel Nota Klaim</h4>
        <a href="index.php?halaman=semuanotagift" class="btn btn-success square-btn-adjust" style="margin-top:16px"><i class="fa fa-refresh"></i> Refresh </a> 
    <div style="float:right;" class="col-md-0">
    <input type="button" class="btn btn-success square-btn-adjust" style="margin-top:16px" class="fa fa-reply-all" value="Kembali" onclick="history.back(-1)"/>
      </div>
</div>

      <div class="table-responsive">
  <div class="card-body" style="margin-top:-1px">
  <table id="datatablesSimple" class="table table-bordered border-dark" background="">
  <thead>
   
    </div>

    <thead>
    <tr>
      <th> No </th>
      <th> ID Nota Klaim </th>
      <th> Tanggal Klaim </th>
      <th> Cabang Bank </th>      
      <th> Nama Lengkap </th>   
      <th> Email </th>   
      <th> Alamat Rumah </th>        
      <th> Nomor Handphone </th>           
      <th> Poin Klaim </th>
      <th> Bukti Klaim
      <th> Status Klaim </th>
      <th> Aksi </th>
    </tr>
  </thead>
  <tbody>
    <?php $nomor=1;?>
    <?php $ambil=mysqli_query($koneksi, "SELECT * FROM nota_gift 
    JOIN akun ON nota_gift.ID_Akun=akun.ID_Akun 
    JOIN cabang_bank_sampah ON nota_gift.ID_Cabang_Bank=cabang_bank_sampah.ID_Cabang_Bank 
    JOIN status_klaim ON nota_gift.ID_Statusklaim=status_klaim.ID_Statusklaim");?>  
    <?php while($pecah=$ambil->fetch_assoc()){?>
    <tr>
      <td><?php echo $nomor;?></td>
      <td><?php echo $pecah['ID_Nota_Gift'];?></td>
      <td><?php echo date("l, d F Y",strtotime($pecah["Tanggal_Klaim"]));?></td>
      <td><?php echo $pecah['Nama_Bank'];?></td>          
      <td><?php echo $pecah['Nama_Lengkap'];?></td>     
      <td><?php echo $pecah['Email'];?></td>
      <td><?php echo $pecah['Alamat_Rumah'];?></td>   
      <td><?php echo $pecah['No_Hp'];?></td>       
      <td><?php echo number_format($pecah['Poin_Klaim']);?> Poin</td>  
      <td>
      <img src="Bukti_Klaim/<?php echo $pecah['Bukti_Klaim'];?>" width="100" height="100">
      </td> 
      <td><?php echo $pecah['Status_Klaim'];?></td>      
      <td> 
      <a href="index.php?halaman=hapusnotaklaim&id=<?php echo $pecah['ID_Nota_Gift'];?>" class="btn-danger btn" >Hapus</a>
         <a href="index.php?halaman=detailtransaksigift&id=<?php echo $pecah['ID_Nota_Gift'];?>" class="btn btn-warning">Lihat Transaksi</a>
      <?php if ( $pecah['ID_Statusklaim']=='SK000002') { ?>
            <a href="index.php?halaman=konfirmasinotaklaim&id=<?php echo $pecah['ID_Nota_Gift'];?>" class="btn btn-warning">Konfirmasi</a>
      <?php } ?>
    </td>
    </tr>
    <?php $nomor++; ?>
    <?php } ?>
  </tbody>
</table>
</html>