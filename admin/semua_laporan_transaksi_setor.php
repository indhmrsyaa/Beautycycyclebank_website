<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT)
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
    <h1 class="mt-4">Laporan Member Setor</h1>
      <ol class="breadcrumb mt-2 bg-transparent">
        <li  class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
          <li class="breadcrumb-item active">Laporan Member Setor</li>
      </ol>
<div class="card shadow" style="margin-top:22px">
    <div class="card-header border-4">        
        <h4 class="mb-0">Laporan Member Setor</h4>
    </div>
<div class="card-body" style="margin-top:-1px">
<table id="datatablesSimple" class="table table-bordered border-dark" background="">
<thead>
    <a href="index.php?halaman=semualaporanmembersetor" class="btn btn-success square-btn-adjust" style="margin-bottom:16px"><i class="fa fa-refresh"></i> Refresh </a> 
    <div style="float:right;" class="col-md-0">
        <input type="button" class="btn btn-success square-btn-adjust" style="margin-bottom:16px" class="fa fa-reply-all" value="Kembali" onclick="history.back(-1)"/>
    </div>
    <thead>
<tr>
    <th>No</th>
    <th>Nama Lengkap</th>
    <th>Jumlah Setor Member</th>
</tr>
</thead>
<tbody>
        <?php
        $nomor=1;
        $jumlah_setor_member=0;
        $ambil= mysqli_query ($koneksi,"SELECT *, count(akun.ID_Akun) AS jumlah_setor_member FROM nota_setor INNER JOIN akun ON nota_setor.ID_Akun = akun.ID_Akun 
        WHERE nota_setor.ID_Statussetor='SS000001' GROUP BY nota_setor.ID_Akun order by jumlah_setor_member desc limit 5");
        while($pecah=mysqli_fetch_array($ambil)){?>
        <tr>        
            <td><?php echo $nomor++; ?></td>
            <td><?php echo $pecah['Nama_Lengkap']; ?></td>  
            <td><?php echo $pecah['jumlah_setor_member']; ?></td>                
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>