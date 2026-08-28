<?php
$ambil=$koneksi->query("SELECT * FROM hadiah WHERE ID_Gift='$_GET[id]'");
$pecah=$ambil->fetch_assoc();
?>
<div class="container-fluid px-4">
        	<h1 class="mt-4">Data Stok hadiah Per Cabang</h1>
			<ol class="breadcrumb mt-2 bg-transparent">
 				<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
  					<li class="breadcrumb-item active">Data Stok hadiah Per Cabang< </li>
  			</ol>
    		<div class="card shadow" style="margin-top:22px">
      			<div class="card-header border-4">        
        			<h4 class="mb-0">Tabel stok hadiah</h4>
      			</div>
    	<div class="card-body" style="margin-top:-1px">
  	<table id="datatablesSimple" class="table table-bordered border-dark" background="">
  		<thead>
    	  <a href="index.php?halaman=stokhadiahcabang" class="btn btn-success square-btn-adjust" style="margin-bottom:16px"><i class="fa fa-refresh"></i> Refresh </a> 
    	  <div style="float:right;" class="col-md-0">
        <a href="index.php?halaman=stokhadiah&id=<?php echo $pecah['ID_Gift'];?>" class ="btn btn-primary"> Ubah Stok </a></div>
    	  </div>
    	  <thead>
		  <tr>
			<th> No. </th>
			<th> Nama Cabang </th>
			<th> Nama Gift </th>
			<th> Stok </th>
			<th> Tanggal Update </th>
			<th> Aksi </th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1;?>
		<?php $ambil=$koneksi->query("SELECT * FROM transaksi_stok_hadiah
        join hadiah on transaksi_stok_hadiah.ID_Gift=hadiah.ID_Gift 
        join cabang_bank_sampah on transaksi_stok_hadiah.ID_Cabang_Bank=cabang_bank_sampah.ID_Cabang_Bank where hadiah.ID_Gift='$_GET[id]'");?>
		<?php while($pecah=$ambil->fetch_assoc()){?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['Nama_Bank']; ?></td>
			<td><?php echo $pecah['Nama_Gift']; ?></td>
			<td><?php echo number_format($pecah['Stok_Hadiah']);?></td>
			<td><?php echo date("l, d F Y",strtotime($pecah["Tanggal_Update"]));?></td> 
			<td><a href="index.php?halaman=tambahstok&id_gift=<?php echo $pecah['ID_Gift']; ?>&id_cabang=<?php echo $pecah['ID_Cabang_Bank']; ?>" class="btn btn-warning">Tambah Stok</a></td>
		</tr>
		<?php $nomor++; ?>
		<?php } ?>
	</tbody>
</table>