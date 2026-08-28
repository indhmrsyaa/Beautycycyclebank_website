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
    <h1 class="mt-4">Laporan Cabang Bank Berdasarkan Total Sampah</h1>
      <ol class="breadcrumb mt-2 bg-transparent">
        <li  class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
          <li class="breadcrumb-item active">Laporan Cabang Bank Berdasarkan Total Sampah</li>
      </ol>
    <div class="card shadow" style="margin-top:22px">
      <div class="card-header border-4">        
        <h4 class="mb-0">Tabel Laporan Cabang Bank Berdasarkan Total Sampah</h4>
      </div>
  <div class="card-body" style="margin-top:-1px">
  <table id="datatablesSimple" class="table table-bordered border-dark" background="">
  <thead>
    <a href="index.php?halaman=semualaporancabangbankberdasarkantotalsampah" class="btn btn-success square-btn-adjust" style="margin-bottom:16px"><i class="fa fa-refresh"></i> Refresh </a> 
    <div style="float:right;" class="col-md-0">
    <input type="button" class="btn btn-success square-btn-adjust" style="margin-bottom:16px" class="fa fa-reply-all" value="Kembali" onclick="history.back(-1)"/>
    </div>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Cabang</th>
            <th>Total Berat</th>
            <th>Total Transaksi Setor</th>
        </tr>
    </thead>
    <tbody>
      <?php $Total_Berat_Per_Periode=0;?>
      <?php $nomor=1;?>
      <?php $ambil=mysqli_query($koneksi,"SELECT *, sum(Sub_Total) AS Sub_Total, count(transaksi_setor.ID_Nota_Setor) AS Total_Transaksi_Setor FROM transaksi_setor INNER JOIN sampah ON transaksi_setor.ID_Sampah = sampah.ID_Sampah JOIN jenis_sampah ON sampah.ID_Jenis_Sampah=jenis_sampah.ID_Jenis_Sampah 
      INNER JOIN nota_setor ON transaksi_setor.ID_Nota_Setor=nota_setor.ID_Nota_Setor JOIN cabang_bank_sampah ON nota_setor.ID_Cabang_Bank=cabang_bank_sampah.ID_Cabang_Bank JOIN status_setor ON nota_setor.ID_Statussetor=status_setor.ID_Statussetor 
      WHERE nota_setor.ID_Statussetor='SS000001' GROUP BY cabang_bank_sampah.ID_Cabang_Bank ORDER BY Sub_Total DESC LIMIT 5");?>
      <?php while($pecah=mysqli_fetch_array($ambil)){?>     
          <tr>
            <td><?php echo $nomor;?></td>
            <td><?php echo $pecah['Nama_Bank'];?></td>  
            <td><?php echo $pecah['Sub_Total'];?> Kg</td>
            <td><?php echo $pecah['Total_Transaksi_Setor'];?></td>
          </tr>
          <?php $Total_Berat_Per_Periode+=$pecah['Sub_Total'];?>
          <?php $nomor++ ?>
          <?php } ?>
          <tr>
            <td colspan="2"><center> Total Berat Per Periode </td>
            <td><?php echo number_format($Total_Berat_Per_Periode);?> Kg
          </tr> 
    </tbody>
  </table>