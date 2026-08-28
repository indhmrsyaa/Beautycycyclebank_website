<div class="container-fluid px-4">
        	<h1 class="mt-4">Data Transaksi Klaim</h1>
			<ol class="breadcrumb mt-2 bg-transparent">
 				<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
  					<li class="breadcrumb-item active">Data Transaksi Klaim</li>
  			</ol>
    		<div class="card shadow" style="margin-top:22px">
      			<div class="card-header border-4">        
        			<h4 class="mb-0">Tabel Transaksi Klaim</h4>
      			</div>
    	<div class="card-body" style="margin-top:-1px">
  	<table id="datatablesSimple" class="table table-bordered border-dark" background="">
  		<thead>
    	  <a href="index.php?halaman=transaksiklaim" class="btn btn-success square-btn-adjust" style="margin-bottom:16px"><i class="fa fa-refresh"></i> Refresh </a> 
    	  <div style="float:right;" class="col-md-0">
    	  <input type="button" class="btn btn-success square-btn-adjust" style="margin-bottom:16px" class="fa fa-reply-all" value="Kembali" onclick="history.back(-1)"/>
    	  </div>
    	  <thead>
		  <tr>
			<th> No. </th>
			<th> ID Nota Klaim </th>
			<th> ID Hadiah</th>
			<th> QTY </th>
			<th> Sub Poin Klaim </th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1;?>
		<?php $ambil=$koneksi->query("SELECT*FROM transaksi_gift join hadiah on transaksi_gift.ID_Gift=hadiah.ID_Gift ");?>
		<?php while($pecah=$ambil->fetch_assoc()){?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['ID_Nota_Gift']; ?></td>
			<td><?php echo $pecah['Nama_Gift']; ?></td>
			<td><?php echo number_format($pecah['QTY']);?></td>
			<td><?php echo number_format($pecah['sub_poin']);?></td>
		</tr>
		<?php $nomor++; ?>
		<?php } ?>
	</tbody>
</table>