

<div class="container-fluid px-4">
        	<h1 class="mt-4">Data Transaksi Stok Hadiah</h1>
			<ol class="breadcrumb mt-2 bg-transparent">
 				<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
  					<li class="breadcrumb-item active">Data Transaksi Stok Hadiah </li>
  			</ol>
<!-- End Navbar -->
<div class="card shadow" style="margin-top:22px">
    <div class="card-header border-4">        
        <h4 class="mb-0">Laporan Stok Hadiah </h4>
    </div>
<div class="card-body" style="margin-top:-1px">
<table id="datatablesSimple" class="table table-bordered border-dark" background="">
<thead>
    <a href="index.php?halaman=pencarianstokhadiah" class="btn btn-success square-btn-adjust" style="margin-bottom:16px"><i class="fa fa-refresh"></i> Refresh </a> 
    <div style="float:right;" class="col-md-0">
        <input type="button" class="btn btn-success square-btn-adjust" style="margin-bottom:16px" class="fa fa-reply-all" value="Kembali" onclick="history.back(-1)"/>
    </div>
    <thead>
<tr>
	<th> No. </th>
	<th> Nama Hadiah </th>
	<th> Nama Bank</th>
	<th> Stok </th>
	<th> Tanggal Update </th>

</tr>
</thead>
	<tbody>

<?php
   $ambil=$koneksi->query("SELECT * FROM transaksi_stok_hadiah INNER JOIN cabang_bank_sampah ON transaksi_stok_hadiah.ID_Cabang_Bank=cabang_bank_sampah.ID_Cabang_Bank 
   INNER JOIN hadiah ON transaksi_stok_hadiah.ID_Gift=hadiah.ID_Gift ");
?>
			<?php $nomor=1; ?>
			<?php while($pecah=mysqli_fetch_array($ambil)){?>		
      		<tr>
       			<td><?php echo $nomor;?></td>
	         	<td><?php echo $pecah['Nama_Gift'];?></td>
				 <td><?php echo $pecah['Nama_Bank'];?></td> 
        		<td><?php echo $pecah['Stok_Hadiah'];?></td>
				<td><?php echo date("l, d F Y",strtotime($pecah["Tanggal_Update"]));?></td> 
      		</tr>
      		<?php $nomor++ ?>
      		<?php } ?>
 
    	</tbody>
  	</table>
