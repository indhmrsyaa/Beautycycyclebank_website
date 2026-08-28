<?php 
$semuadata=array();
$tgl_mulai = "-";
$tgl_selesai = "-";
if(isset($_POST["proses"]))
{
	$tgl_mulai=$_POST["tgl1"];
	$tgl_selesai=$_POST["tgl2"];
   $ambil=$koneksi->query("SELECT * , sum(Sub_Total) AS Sub_Total, count(transaksi_setor.ID_Nota_Setor) AS Total_Transaksi_Setor FROM transaksi_setor 
   INNER JOIN sampah ON transaksi_setor.ID_Sampah = sampah.ID_Sampah JOIN jenis_sampah ON sampah.ID_Jenis_Sampah=jenis_sampah.ID_Jenis_Sampah 
   INNER JOIN nota_setor ON transaksi_setor.ID_Nota_Setor=nota_setor.ID_Nota_Setor JOIN status_setor ON nota_setor.ID_Statussetor=status_setor.ID_Statussetor 
   WHERE Tanggal_setor BETWEEN '$tgl_mulai' AND'$tgl_selesai'");
	while($pecah = $ambil->fetch_assoc())
	{
		$semuadata[]=$pecah;
	}
}
?>

<div class="container-fluid px-4">
<center><h3> Laporan Total Berat Berdasarkan Jenis Sampah dari <?php echo $tgl_mulai?> hingga <?php echo $tgl_selesai?></h3>
</center><hr>
	<form method="post">
		<div class="row">
			<div class="col-md-3">
				<div class="form-group">
					<label> Dari Tanggal </label>
					<input type="date" class="form-control" name="tgl1" value="<?php echo $tgl_mulai?>">
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label> Sampai Tanggal </label>
					<input type="date" class="form-control" name="tgl2" value="<?php echo $tgl_selesai?>">
				</div>
			</div>
      		<div class="col-md-2">
        		<div class="form-group">
          			<label>Jenis Sampah</label>
          			<select class="form-control" name="ID_Jenissampah">
            			<option value="jenis_sampah">--Pilih Jenis Sampah--</option>
            			<?php $ambil=$koneksi->query("SELECT * FROM jenis_sampah ");
                		while($persampah=$ambil->fetch_assoc()){?>
                		<option value="<?php echo $persampah['Jenis_Sampah'];?>"><?php echo $persampah['Jenis_Sampah'];?></option>
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
				<div class="col-md-1">
      				<div class="form-group">
      					<label>&nbsp;</label> 
        				<a href="index.php?halaman=semualaporantotalberatberdasarkanjenissampah" class="btn btn-warning square-btn-adjust"><i class="fa fa-folder-open-o"></i> Lihat Semua Laporan
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
<!-- End Navbar -->
    <div class="card shadow" style="margin-top:22px">
      <div class="card-header border-4">        
        <h4 class="mb-0">Tabel Laporan Total Berat Berdasarkan Jenis Sampah</h4>
      </div>
  <div class="card-body" style="margin-top:-1px">
  <table id="datatablesSimple" class="table table-bordered border-dark" background="">
  <thead>
    <a href="index.php?halaman=laporantotalberatberdasarkanjenissampah" class="btn btn-success square-btn-adjust" style="margin-bottom:16px"><i class="fa fa-refresh"></i> Refresh </a> 
    <div style="float:right;" class="col-md-0">
    <input type="button" class="btn btn-success square-btn-adjust" style="margin-bottom:16px" class="fa fa-reply-all" value="Kembali" onclick="history.back(-1)"/>
    </div>
    <thead>
        <tr>
            <th>No</th>
            <th>Jenis Sampah</th>
            <th>Total Berat</th>
            <th>Total Transaksi Setor</th>
        </tr>
    </thead>
    <tbody>

<?php
    //proses jika sudah klik tombol pencarian data
    if(isset($_POST['proses']))
    {
	    //menangkap nilai form
	    $dt1=$_POST['tgl1'];
	    $dt2=$_POST['tgl2'];
	    $IDJenissampah=$_POST['ID_Jenissampah'];
	if(empty($dt1) || empty($dt2))
	{
	  //jika data tanggal kosong
?>
	<script language="JavaScript">
        alert('Tanggal Awal dan Tanggal Akhir Harap di Isi!');
        document.location='index.php?halaman=laporantotalberatberdasarkanjenissampah';
    </script>	

<?php
    }
    else
    {
?>
	<br>
<?php
   $ambil=mysqli_query($koneksi,"SELECT * , sum(Sub_Total) AS Sub_Total, count(transaksi_setor.ID_Nota_Setor) AS Total_Transaksi_Setor FROM transaksi_setor 
   INNER JOIN sampah ON transaksi_setor.ID_Sampah = sampah.ID_Sampah JOIN jenis_sampah ON sampah.ID_Jenis_Sampah=jenis_sampah.ID_Jenis_Sampah 
   INNER JOIN nota_setor ON transaksi_setor.ID_Nota_Setor=nota_setor.ID_Nota_Setor JOIN status_setor ON nota_setor.ID_Statussetor=status_setor.ID_Statussetor 
   WHERE Jenis_Sampah='$_POST[ID_Jenissampah]' AND nota_setor.ID_Statussetor='SS000001' AND Tanggal_Setor BETWEEN '$dt1' AND'$dt2' ORDER BY Sub_Total DESC LIMIT 5");
	}
?>
			<?php $Total_Berat_Per_Periode=0; ?>
			<?php $nomor=1; ?>
			<?php while($pecah=mysqli_fetch_array($ambil)){?>			
      		<tr>
       			<td><?php echo $nomor;?></td>
        		<td><?php echo $pecah['Jenis_Sampah'];?></td>  
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
<?php
    }
    else
    {
        unset($_POST['proses']);
    }
?>