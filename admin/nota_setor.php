<?php
include 'koneksi.php';
$ID_Cabangbank="";
$ID_Statussetor="";
$strq="";
$strw="";
$jmlh=0;
$tgl_mulai="";
$tgl_selesai="";


if (isset($_POST['tgl_mulai'])) {
  $tgl_mulai = $_POST['tgl_mulai'];
  if (!empty($tgl_mulai)) {
      $strc[] = "nota_setor.Tanggal_setor >= '$tgl_mulai'";
      $jmlh++;
  }
}
if (isset($_POST['tgl_selesai'])) {
  $tgl_selesai = $_POST['tgl_selesai'];
  if (!empty($tgl_selesai)) {
      $strc[] = "nota_setor.Tanggal_setor <= '$tgl_selesai'";
      $jmlh++;
  }
}
if (isset($_POST['ID_Cabang_Bank']))
{
    $ID_Cabangbank=$_POST['ID_Cabang_Bank'];
    $strc[]="nota_setor.ID_Cabang_Bank='$ID_Cabangbank'";
    $jmlh++;
}
if (isset($_POST['ID_Statussetor']))
{
    $ID_Statussetor=$_POST['ID_Statussetor'];
    $strc[]="nota_setor.ID_Statussetor='$ID_Statussetor'";
    $jmlh++;
}


if ($jmlh > 0) {
  $strw = "WHERE ";
  $i = 1;
  foreach ($strc as $strs) {
      $strw .= $strs;
      if ($i < $jmlh) {
          $strw .= " AND ";
          $i++;
      }
  }
}
$query=("SELECT * FROM nota_setor JOIN akun ON nota_setor.ID_Akun=akun.ID_Akun 
JOIN cabang_bank_sampah ON nota_setor.ID_Cabang_Bank=cabang_bank_sampah.ID_Cabang_Bank 
JOIN status_setor ON nota_setor.ID_Statussetor=status_setor.ID_Statussetor $strw ");
$result=mysqli_query($koneksi,$query);
$resnum=mysqli_num_rows($result);                   
$pecah2=$koneksi->query("SELECT * From status_setor"); 
$pecah3=$koneksi->query("SELECT * From cabang_bank_sampah");                                 
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
    <h1 class="mt-4">Nota Setor</h1>
      <ol class="breadcrumb mt-2 bg-transparent">
        <li  class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
          <li class="breadcrumb-item active">Nota Setor</li>
      </ol>
<form action="index.php?halaman=notasetor" method="post" class="form">
  <div class="row">
    <div class="col-md-2">
      <div class="form-group">
        <label> Dari Tanggal </label>
        <input type="date" class="form-control" name="tgl_mulai" value="<?php echo $tgl_mulai?>">
      </div>
    </div>
    <div class="col-md-2">
      <div class="form-group">
        <label> Sampai Tanggal </label>
        <input type="date" class="form-control" name="tgl_selesai" value="<?php echo $tgl_selesai?>">
      </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label>Cabang Bank</label>
            <select class="form-control" name="ID_Cabang_Bank">
                <option selected disabled>--Pilih Cabang --</option>
                <?php while($row = mysqli_fetch_assoc($pecah3)) { ?>
                    <option value="<?php echo $row['ID_Cabang_Bank']; ?>"> <?php echo $row['Nama_Bank']; ?></option>
                <?php } ?>
            </select>
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label>Status Setor</label>
            <select class="form-control" name="ID_Statussetor">
                <option selected disabled>--Pilih Status Setor--</option>
                <?php while($row = mysqli_fetch_assoc($pecah2)) { ?>
                    <option value="<?php echo $row['ID_Statussetor']; ?>"> <?php echo $row['Status_Setor']; ?></option>
                <?php } ?>
            </select>
        </div>
    </div>
    <div class="col-md-1">
      <div class="form-group">
      <label>&nbsp;</label><br>
        <button  name="submit" class="btn btn-primary"><i class="fa fa-play-circle-o"></i> Lihat</button>
      </div>
    </div>
    <div class="col-md-1">
          <div class="form-group">
            <label>&nbsp;</label> 
            <a href="index.php?halaman=semuanotasetor" class="btn btn-warning square-btn-adjust"><i class="fa fa-folder-open-o"></i> Lihat Semua Nota
            </a>
          </div> 
        </div> 
  </div>
</form>
    <i>
      <b>Informasi : </b> 
        Hasil pencarian data berdasarkan periode Tanggal 
        <b>
            <?php echo $tgl_mulai?>
        </b> 
            s/d 
        <b>
            <?php echo $tgl_selesai?>
        </b>

    </i>
</br>
    <div class="card shadow">
      <div class="card-header border-4">        
        <h4 class="mb-0">Tabel Nota Setor</h4>
        <a href="index.php?halaman=notasetor" class="btn btn-success square-btn-adjust" style="margin-top:16px"><i class="fa fa-refresh"></i> Refresh </a> 
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
      <th> Total Poin </th> 
      <th> Status Setor </th>  
      <th> Buki Setor </th>    
      <th> Aksi </th>
    </tr>
  </thead>
    <tbody>
      <?php $nomor=1;?> 
      <?php $Total_Berat=0?>      
      <?php while($pecah=$result->fetch_assoc()){?>    
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
      <?php $nomor++ ?>
      <?php } ?>
  </tbody>
</table>
