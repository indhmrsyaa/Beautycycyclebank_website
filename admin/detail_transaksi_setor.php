
<div class="container-fluid px-4">
        	<h1 class="mt-4">Data Transaksi Setor</h1>
			<ol class="breadcrumb mt-2">
 				<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
  					<li class="breadcrumb-item active">Data Transaksi Setor</li>
  			</ol>
    		<div class="card shadow" style="margin-top:22px">
      			<div class="card-header border-4">        
        			<h4 class="mb-0">Tabel Transaksi Setor</h4>
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
			<th> Id Nota Setor </th>
			<th> Nama sampah</th>
			<th> Poin</th>
			<th> Sub Berat </th>
			<th> Sub Poin  </th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1;?>
		<?php $ambil=$koneksi->query("SELECT * FROM transaksi_setor 
          INNER JOIN sampah ON transaksi_setor.ID_Sampah=sampah.ID_Sampah JOIN jenis_satuan on sampah.ID_Satuan=jenis_satuan.ID_Satuan
          INNER JOIN nota_setor ON transaksi_setor.ID_Nota_Setor=nota_setor.ID_Nota_Setor WHERE nota_setor.ID_Nota_Setor='$_GET[id]' ");?>
		<?php while($pecah=$ambil->fetch_assoc()){?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['ID_Nota_Setor']; ?></td>
			<td><?php echo $pecah['Nama_Sampah']; ?></td>
			<td><?php echo $pecah['Poin']; ?></td>
			<td><?php echo number_format($pecah['Sub_Total']);?> <?php echo $pecah['Jenis_Satuan']; ?></td></td>
			<td><?php echo number_format($pecah['Sub_Poin']);?></td>
		</tr>
		<?php $nomor++; ?>
		<?php } ?>
	</tbody>
</table>