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
    <h1 class="mt-4">Laporan Total Hadiah Berhasil Klaim</h1>
      <ol class="breadcrumb mt-2 bg-transparent">
        <li  class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
          <li class="breadcrumb-item active">Laporan Total Hadiah </li>
      </ol>
    <div class="card shadow" style="margin-top:22px">
      <div class="card-header border-4">        
        <h4 class="mb-0">Tabel Laporan Total Hadiah </h4>
      </div>
  <div class="card-body" style="margin-top:-1px">
  <table id="datatablesSimple" class="table table-bordered border-dark" background="">
  <thead>
    <a href="index.php?halaman=semualaporantotalhadiah" class="btn btn-success square-btn-adjust" style="margin-bottom:16px"><i class="fa fa-refresh"></i> Refresh </a> 
    <div style="float:right;" class="col-md-0">
    <input type="button" class="btn btn-success square-btn-adjust" style="margin-bottom:16px" class="fa fa-reply-all" value="Kembali" onclick="history.back(-1)"/>
    </div>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Hadiah</th>
            <th>Total Hadiah</th>
            <th>Total Transaksi Klaim Hadiah</th>
        </tr>
    </thead>
    <tbody>
      <?php $Total_Hadiah=0; ?>
      <?php $nomor=1; ?>
      <?php $ambil=mysqli_query($koneksi,"SELECT *, sum(QTY) AS QTY, count(transaksi_gift.ID_Nota_Gift) 
      AS Total_Transaksi_Klaim FROM transaksi_gift INNER JOIN hadiah ON transaksi_gift.ID_Gift = hadiah.ID_Gift 
      INNER JOIN nota_gift ON transaksi_gift.ID_Nota_Gift=nota_gift.ID_Nota_Gift JOIN cabang_bank_sampah 
      ON nota_gift.ID_Cabang_Bank=cabang_bank_sampah.ID_Cabang_Bank JOIN status_klaim 
      ON nota_gift.ID_Statusklaim=status_klaim.ID_Statusklaim WHERE nota_gift.ID_Statusklaim='SK000001' 
      GROUP BY hadiah.ID_Gift ORDER BY QTY DESC LIMIT 5");?>
      <?php while($pecah=mysqli_fetch_array($ambil)){?>     
      <tr>
          <td><?php echo $nomor;?></td>
          <td><?php echo $pecah['Nama_Gift'];?></td>  
          <td><?php echo $pecah['QTY'];?></td>
          <td><?php echo $pecah['Total_Transaksi_Klaim'];?></td>
      </tr>
      <?php $Total_Hadiah+=$pecah['QTY'];?>
      <?php $nomor++ ?>
      <?php } ?>
      <tr>
          <td colspan="2"><center> Total Hadiah Per Periode </td>
          <td><?php echo number_format($Total_Hadiah);?>
      </tr> 
    </tbody>
  </table>