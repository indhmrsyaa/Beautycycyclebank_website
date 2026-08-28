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
      $strc[] = "nota_gift.Tanggal_Klaim >= '$tgl_mulai'";
      $jmlh++;
  }
}
if (isset($_POST['tgl_selesai'])) {
  $tgl_selesai = $_POST['tgl_selesai'];
  if (!empty($tgl_selesai)) {
      $strc[] = "nota_gift.Tanggal_Klaim <= '$tgl_selesai'";
      $jmlh++;
  }
}
if (isset($_POST['ID_Cabang_Bank']))
{
    $ID_Cabangbank=$_POST['ID_Cabang_Bank'];
    $strc[]="nota_gift.ID_Cabang_bank='$ID_Cabangbank'";
    $jmlh++;
}
if (isset($_POST['ID_Statusklaim']))
{
    $ID_Statusklaim=$_POST['ID_Statusklaim'];
    $strc[]="nota_gift.ID_Statusklaim='$ID_Statusklaim'";
    $jmlh++;
}
$i=1;
if($jmlh>0)
{
    $strw="WHERE ";
    foreach ($strc as $strs)
    {
        $strw .=$strs;
        if($i<$jmlh)
        {
            $strw .=" AND ";
            $i++;
        }
    }
}
$query=("SELECT * FROM nota_gift JOIN akun ON nota_gift.ID_Akun=akun.ID_Akun 
JOIN cabang_bank_sampah ON nota_gift.ID_Cabang_Bank=cabang_bank_sampah.ID_Cabang_Bank 
JOIN status_klaim ON nota_gift.ID_Statusklaim=status_klaim.ID_Statusklaim $strw AND Tanggal_setor BEETWEN");
$result=mysqli_query($koneksi,$query);
$resnum=mysqli_num_rows($result);                   
$pecah2=$koneksi->query("SELECT * From status_klaim"); 
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
    <h1 class="mt-4">Nota Gift</h1>
      <ol class="breadcrumb mt-2 bg-transparent">
        <li  class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
          <li class="breadcrumb-item active">Nota Gift</li>
      </ol>
<form action="index.php?halaman=notagift" method="post" class="form">
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
                <option selected disabled>--Pilih Cabang Bank--</option>
                <?php while($row = mysqli_fetch_assoc($pecah3)) { ?>
                    <option value="<?php echo $row['ID_Cabang_Bank']; ?>"> <?php echo $row['Nama_Bank']; ?></option>
                <?php } ?>
            </select>
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label>Status Klaim</label>
            <select class="form-control" name="ID_Statusklaim">
                <option selected disabled>--Pilih Status Klaim--</option>
                <?php while($row = mysqli_fetch_assoc($pecah2)) { ?>
                    <option value="<?php echo $row['ID_Statusklaim']; ?>"> <?php echo $row['Status_Klaim']; ?></option>
                <?php } ?>
            </select>
        </div>
    </div>
    <div class="col-md-1">
      <div class="form-group">
      <label>&nbsp;</label> 
        <button  name="proses" class="btn btn-primary"><i class="fa fa-search fa-1x"></i>Lihat</button>
      </div>    
    </div>
    <div class="col-md-1">
      <div class="form-group">
      <label>&nbsp;</label> 
        <a href="index.php?halaman=semuanotagift" class="btn btn-warning square-btn-adjust"><i class="fa fa-folder-open-o"></i> Lihat Semua Nota
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
    <div class="card shadow" style="margin-top:22px">
      <div class="card-header border-9">        
        <h4 class="mb-0">Tabel Nota Gift</h4>
      </div>
  <div class="table-responsive">
  <div class="card-body" style="margin-top:-22px">
  <table id="datatablesSimple" class="table table-bordered border-dark" background="pink">
  <thead>
    <thead>
    <tr>
      <th> No </th>
      <th> ID Nota Gift</th>
      <th> Tanggal Klaim </th>
      <th> Cabang Bank </th>      
      <th> Nama Lengkap </th>   
      <th> Email </th>   
      <th> Alamat Rumah </th>        
      <th> Nomor Handphone </th>          
      <th> Poin Klaim </th>
      <th> Bukti Klaim </th>
      <th> Status Klaim </th>
      <th> Aksi </th>

    </tr>
  </thead>
  <tbody>
    <?php $nomor=1;?>
    <?php while($pecah=$result->fetch_assoc()){?>  
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
      <img src="Bukti_Klaim/<?php echo $pecah['Bukti_Klaim'];?>" width="100">
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
    <?php $nomor++ ?>
    <?php } ?>
  </tbody>
</table>

       