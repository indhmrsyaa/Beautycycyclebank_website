

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
    <h1 class="mt-4">Nota Setor</h1>
      <ol class="breadcrumb mt-2 bg-transparent">
        <li  class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
          <li class="breadcrumb-item active">Nota Setor</li>
      </ol>
<form class="form-horizontal" role="search" method="post" action="index.php?halaman=pencariansemuanotasetor">
  <div class="row">
      <div class="col-md-3">
        <div class="form-group">
          <input type="text" class="form-control" name="keyword" placeholder="Masukkan Nota Setor" autofocus autocomplete="off">
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
        <h4 class="mb-0">Tabel Nota Setor</h4>
        <a href="index.php?halaman=semuanotasetor" class="btn btn-success square-btn-adjust" style="margin-top:16px"><i class="fa fa-refresh"></i> Refresh </a> 
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
      <th> ID Nota Setor </th>
      <th> Tanggal Penyetoran </th>        
      <th> Cabang Bank </th>      
      <th> Nama Lengkap </th>   
      <th> Email </th>   
      <th> Alamat Rumah </th>          
      <th> Nomor Handphone </th>            
      <th> Penambahan Poin </th>
      <th> Bukti Setor </th>
      <th> Status Setor </th>      
      <th> Aksi </th>
    </tr>
  </thead>
  <tbody>
    <?php $nomor=1;?>
    <?php $ambil=$koneksi->query("SELECT * FROM nota_setor JOIN akun ON nota_setor.ID_Akun=akun.ID_Akun 
    JOIN cabang_bank_sampah ON nota_setor.ID_Cabang_Bank=cabang_bank_sampah.ID_Cabang_Bank JOIN status_setor
      ON nota_setor.ID_Statussetor=status_setor.ID_Statussetor ");?>
    <?php while($pecah=$ambil->fetch_assoc()){?>
      <tr>
      <td><?php echo $nomor;?></td>
      <td><?php echo $pecah['ID_Nota_Setor'];?></td>
      <td><?php echo date("l, d F Y",strtotime($pecah["Tanggal_setor"]));?></td>
      <td><?php echo $pecah['Nama_Bank'];?></td>              
      <td><?php echo $pecah['Nama_Lengkap'];?></td>    
      <td><?php echo $pecah['Email'];?></td>
      <td><?php echo $pecah['Alamat_Rumah'];?></td>  
      <td><?php echo $pecah['No_Hp'];?></td>       
      <td><?php echo number_format($pecah['Total_Poin'],1,',',);?> Poin</td>
      <td>
      <img src="Bukti_Pembayaran/<?php echo $pecah['Bukti_Penyetoran'];?>" width="100" height="100">
      </td>
      <td><?php echo $pecah['Status_Setor'];?></td>      
      <td> 
        <a href="index.php?halaman=hapusnotasetor&id=<?php echo $pecah['ID_Nota_Setor'];?>" class="btn-danger btn" >Hapus</a>
        <?php if ( $pecah['ID_Statussetor']=='SS000002') { ?>
          <a href="index.php?halaman=konfirmasinotasetor&id=<?php echo $pecah['ID_Nota_Setor'];?>" class="btn btn-warning">Konfirmasi</a>
        <?php } ?>
        <a href="index.php?halaman=detailtransaksi&id=<?php echo $pecah['ID_Nota_Setor'];?>" class="btn btn-warning">Lihat Transaksi</a>
      </td>
    </tr>
    <?php $nomor++; ?>
    <?php } ?>
  </tbody>
</table>
</html>