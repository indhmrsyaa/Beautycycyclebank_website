

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
    <h1 class="mt-5">AKUN PENGGUNA</h2>
      <ol class="breadcrumb mt-2 bg-transparent">
        <li  class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
          <li class="breadcrumb-item active">akun</li>
      </ol>
<form class="form-horizontal" role="search" method="post" action="index.php?halaman=pencarianakun">
  <div class="row">
      <div class="col-md-3">
        <div class="form-group">
          <input type="text" class="form-control" name="keyword" placeholder="Masukkan akun" autofocus autocomplete="off">
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
        <h4 class="mb-0">Tabel akun</h4>
        <a href="index.php?halaman=akun" class="btn btn-success square-btn-adjust" style="margin-top:20px"><i class="fa fa-refresh"></i> Refresh </a> 
    <div style="float:right;" class="col-md-0">
    <input type="button" class="btn btn-success square-btn-adjust" style="margin-top:16px" class="fa fa-reply-all" value="Kembali" onclick="history.back(-1)"/>
      </div>
      </div>
  <div class="table-responsive">
  <div class="card-body" style="margin-top:-1px">
  <table id="datatablesSimple" class="table table-bordered border-darker" background="">
  <thead>
    
    </div>
    <thead>
    <tr>
      <th> No </th>
      <th> ID akun </th>
      <th> Status akun </th>
      <th> Nama Lengkap </th>           
      <th> Alamat Rumah </th>      
      <th> Nomor Handphone </th>          
      <th> Email </th>
      <th> Password </th>         
      <th> Total Poin </th>
    </tr>
  </thead>
  <tbody>
    <?php $nomor=1;?>
    <?php $ambil=$koneksi->query("SELECT * FROM akun JOIN jenis_akun ON akun.ID_jenis_akun=jenis_akun.ID_jenis_akun");?>
    <?php while($pecah=$ambil->fetch_assoc()){?>
    <tr>
      <td><?php echo $nomor; ?></td>
      <td> <?php echo $pecah['ID_Akun']; ?></td>
      <td> <?php echo $pecah['jenis_akun']; ?></td>
      <td> <?php echo $pecah['Nama_Lengkap']; ?></td>         
      <td> <?php echo $pecah['Alamat_Rumah']; ?></td>      
      <td> <?php echo $pecah['No_Hp']; ?></td>          
      <td> <?php echo $pecah['Email']; ?></td>
      <td> <?php echo $pecah['Password']; ?></td>          
      <td> <?php echo $pecah['Total_Poin_Akun']; ?></td>
    </tr>
    <?php $nomor++; ?>
    <?php } ?>
  </tbody>
</table>
    </div>
</html>