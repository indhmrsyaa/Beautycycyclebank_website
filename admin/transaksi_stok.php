<div class="container-fluid px-4">
        	<h1 class="mt-4">Data Transaksi Stok Sampah</h1>
			<ol class="breadcrumb mt-2 bg-transparent">
 				<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
  					<li class="breadcrumb-item active">Data Transaksi Stok Sampah </li>
  			</ol>
    		<div class="card shadow" style="margin-top:22px">
      			<div class="card-header border-4">        
        			<h4 class="mb-0">Tabel stok sampah</h4>
      			</div>
    	<div class="card-body" style="margin-top:-1px">
  	<table id="datatablesSimple" class="table table-bordered border-dark" background="">
  		<thead>
    	  <a href="index.php?halaman=transaksistok" class="btn btn-success square-btn-adjust" style="margin-bottom:16px"><i class="fa fa-refresh"></i> Refresh </a> 
    	  <div style="float:right;" class="col-md-0">
    	  <input type="button" class="btn btn-success square-btn-adjust" style="margin-bottom:16px" class="fa fa-reply-all" value="Kembali" onclick="history.back(-1)"/>
    	  </div>
    	  <thead>
		  <tr>
			<th> No. </th>
			<th> Nama Cabang </th>
			<th> Nama Sampah </th>
			<th> Stok </th>
			<th> Tanggal Update </th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1;?>
		<?php $ambil=$koneksi->query("SELECT*FROM transaksi_daftar_stok
        join sampah on transaksi_daftar_stok.ID_Sampah=sampah.ID_Sampah 
        join cabang_bank_sampah on transaksi_daftar_stok.ID_Cabang_Bank=cabang_bank_sampah.ID_Cabang_Bank ");?>
		<?php while($pecah=$ambil->fetch_assoc()){?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['Nama_Bank']; ?></td>
			<td><?php echo $pecah['Nama_Sampah']; ?></td>
			<td><?php echo number_format($pecah['Stok']);?></td>
			<td><?php echo date("l, d F Y",strtotime($pecah["Tanggal_Update"]));?></td> 
		</tr>
		<?php $nomor++; ?>
		<?php } ?>
	</tbody>
</table>