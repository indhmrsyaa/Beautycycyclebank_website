<?php 
$semuadata=array();
if(isset($_POST["proses"]))
{
   $ambil=$koneksi->query("SELECT * FROM transaksi_stok_hadiah 
   INNER JOIN hadiah ON transaksi_stok_hadiah.ID_Gift = hadiah.ID_Gift 
   INNER JOIN cabang_bank_sampah ON transaksi_stok_hadiah.ID_Cabang_Bank=cabang_bank_sampah.ID_Cabang_Bank 
   JOIN kota ON cabang_bank_sampah.ID_Kota=kota.ID_Kota");
	while($pecah = $ambil->fetch_assoc())
	{
		$semuadata[]=$pecah;
	}
}
?>

<div class="container-fluid px-4">
<center><h3> Laporan Stok Hadiah Berdasarkan Kota </h3>
</center><hr>
	<form method="post">
		<div class="row">
      		<div class="col-md-2">
        		<div class="form-group">
          			<label>provinsi</label>
          			<select class="form-control" id="ID_Provinsi" name="ID_Provinsi">
            			<option value="provinsi">--Pilih provinsi--</option>
            			<?php $ambil=$koneksi->query("SELECT * FROM provinsi ");
                		while($perprovinsi=$ambil->fetch_assoc()){?>
                		<option value="<?php echo $perprovinsi['ID_Provinsi'];?>"><?php echo $perprovinsi['Nama_Provinsi'];?></option>
              			<?php }?>
          			</select>
        		</div>
      		</div>
			  <div class="col-md-2">
        		<div class="form-group">
          			<label>Kota</label>
          			<select class="form-control" id="ID_Kota"  name="ID_Kota">
            			<option value="kota">--Pilih Kota--</option>
            			<?php $ambil=$koneksi->query("SELECT * FROM kota ");
                		while($perkota=$ambil->fetch_assoc()){?>
                		<option value="<?php echo $perkota['ID_Kota'];?>"><?php echo $perkota['Nama_Kota'];?></option>
              			<?php }?>
          			</select>
        		</div>
      		</div>
			<div class="col-md-1">
				<div class="form-group">
				<label>&nbsp; </label><br>
					<button  name="proses" class="btn btn-primary"><i class="fa fa-play-circle-o"></i>Lihat</button>
				</div>
			</div> 
		</div>
	</form>
<!-- End Navbar -->
    <div class="card shadow" style="margin-top:22px">
      <div class="card-header border-4">        
        <h4 class="mb-0">Tabel Laporan Stok Hadiah</h4>
      </div>
  <div class="card-body" style="margin-top:-1px">
  <table id="datatablesSimple" class="table table-bordered border-dark" background="">
  <thead>
    <a href="index.php?halaman=laporanstokhadiah" class="btn btn-success square-btn-adjust" style="margin-bottom:16px"><i class="fa fa-refresh"></i> Refresh </a> 
    <div style="float:right;" class="col-md-0">
    <input type="button" class="btn btn-success square-btn-adjust" style="margin-bottom:16px" class="fa fa-reply-all" value="Kembali" onclick="history.back(-1)"/>
    </div>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Hadiah</th>
            <th>Total Stok</th>
			<th>Tanggal Update</th>
        </tr>
    </thead>
    <tbody>


<?php

if (isset($_POST["proses"])) {
    $ambil = mysqli_query($koneksi, "SELECT hadiah.Nama_Gift, 
      SUM(transaksi_stok_hadiah.Stok_Hadiah) AS Total_Stok,
      max(transaksi_stok_hadiah.Tanggal_Update) as max_tgl_update
        FROM transaksi_stok_hadiah
        INNER JOIN hadiah ON transaksi_stok_hadiah.ID_Gift = hadiah.ID_Gift
        INNER JOIN cabang_bank_sampah ON transaksi_stok_hadiah.ID_Cabang_Bank = cabang_bank_sampah.ID_Cabang_Bank
        JOIN kota ON cabang_bank_sampah.ID_Kota = kota.ID_Kota
        WHERE cabang_bank_sampah.ID_Kota = '$_POST[ID_Kota]'
        GROUP BY hadiah.ID_Gift
        ORDER BY Total_Stok, max_tgl_update  DESC LIMIT 5");
}
?>
			<?php $nomor=1; ?>
			<?php while($pecah=mysqli_fetch_array($ambil)){?>		
      		<tr>
       			<td><?php echo $nomor;?></td>
            	<td><?php echo $pecah['Nama_Gift'];?></td> 
        		<td><?php echo $pecah['Total_Stok'];?></td>
				<td><?php echo date("l, d F Y",strtotime($pecah["max_tgl_update"]));?></td> 
      		</tr>
      		<?php $nomor++ ?>
      		<?php } ?>

    	</tbody>
  	</table>
	<?php if (isset($_POST['proses'])): ?>
			<?php endif ?>	
		<tr>
            <td colspan="4" align="center"> 
            <?php
	            //jika pencarian data tidak ditemukan
	            if(mysqli_num_rows($ambil)==0)
	            {
	             echo "<font color=red><blink>Pencarian data tidak ditemukan!</blink></font>";
	            }
	        ?>
            </td>
        </tr>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js" type="text/javascript"></script>
<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

    <script src="js/vendor/bootstrap.min.js"></script>

    <script src="js/datepicker.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>
    <script src="js/jquery.js"></script>
    <script>
        $(document).ready(function() {
            $('#ID_Provinsi').change(function() {
                var ID_Provinsi = $(this).val();

                $.ajax({
                    type: 'POST',
                    url: 'cobaprov.php',
                    data: 'ID_Provinsi='+ID_Provinsi,
                    success: function(response) {
                        $('#ID_Kota').html (response);
                    }
                });
            })
        });
    </script>