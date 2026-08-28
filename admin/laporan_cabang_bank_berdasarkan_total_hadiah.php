<?php 
$semuadata=array();
$tgl_mulai = "-";
$tgl_selesai = "-";
$hadiah="";
if(isset($_POST["proses"]))
{
	$hadiah=$_POST["ID_Hadiah"];
	$tgl_mulai=$_POST["tgl1"];
	$tgl_selesai=$_POST["tgl2"];
   $ambil=$koneksi->query("SELECT *, sum(QTY) AS QTY, count(transaksi_gift.ID_Nota_Gift) AS Total_Transaksi_Gift FROM transaksi_gift 
   INNER JOIN hadiah ON transaksi_gift.ID_Gift = hadiah.ID_Gift 
   INNER JOIN nota_gift ON transaksi_gift.ID_Nota_Gift=nota_gift.ID_Nota_Gift JOIN cabang_bank_sampah ON nota_gift.ID_Cabang_Bank=cabang_bank_sampah.ID_Cabang_Bank JOIN status_klaim ON nota_gift.ID_Statusklaim=status_klaim.ID_Statusklaim 
   WHERE Tanggal_Klaim BETWEEN '$tgl_mulai' AND'$tgl_selesai'");
	while($pecah = $ambil->fetch_assoc())
	{
		$semuadata[]=$pecah;
	}
}
?>

<div class="container-fluid px-4">
<center><h3> Laporan Total Hadiah klaim Berdasarkan Cabang Bank  <?php echo $tgl_mulai?> hingga <?php echo $tgl_selesai?></h3>
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
          			<label>Jenis Hadiah</label>
          			<select class="form-control" name="ID_Hadiah">
            			<option value="hadiah">--Pilih Hadiah--</option>
            			<?php $ambil=$koneksi->query("SELECT * FROM hadiah ");
                		while($perhadiah=$ambil->fetch_assoc()){?>
                		<option value="<?php echo $perhadiah['Nama_Gift'];?>"><?php echo $perhadiah['Nama_Gift'];?></option>
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
        			<a href="index.php?halaman=semualaporancabangbankberdasarkantotalhadiah" class="btn btn-warning square-btn-adjust"><i class="fa fa-folder-open-o"></i> Lihat Semua Laporan
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
        <h4 class="mb-0">Tabel Laporan Cabang Bank Berdasarkan Berat Total Hadiah <?php echo $hadiah?> </h4>
      </div>
  <div class="card-body" style="margin-top:-1px">
  <table id="datatablesSimple" class="table table-bordered border-dark" background="">
  <thead>
    <a href="index.php?halaman=laporancabangbankberdasarkantotalhadiah" class="btn btn-success square-btn-adjust" style="margin-bottom:16px"><i class="fa fa-refresh"></i> Refresh </a> 
    <div style="float:right;" class="col-md-0">
    <input type="button" class="btn btn-success square-btn-adjust" style="margin-bottom:16px" class="fa fa-reply-all" value="Kembali" onclick="history.back(-1)"/>
    </div>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Cabang</th>
            <th>Total Hadiah</th>
            <th>Total Transaksi Klaim</th>
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
	    $IDHadiah=$_POST['ID_Hadiah'];
	if(empty($dt1) || empty($dt2))
	{
	  //jika data tanggal kosong
?>
	<script language="JavaScript">
        alert('Tanggal Awal dan Tanggal Akhir Harap di Isi!');
        document.location='index.php?halaman=laporancabangbankberdasarkantotalhadiah';
    </script>	

<?php
    }
    else
    {
?>
	<br>
<?php
   $ambil=mysqli_query($koneksi,"SELECT *, sum(QTY) AS QTY, count(transaksi_Gift.ID_Nota_Gift) AS Total_Transaksi_Gift FROM transaksi_gift
   iNNER JOIN hadiah ON transaksi_gift.ID_Gift = hadiah.ID_Gift 
   INNER JOIN nota_gift ON transaksi_gift.ID_Nota_Gift=nota_gift.ID_Nota_Gift JOIN cabang_bank_sampah ON nota_gift.ID_Cabang_Bank=cabang_bank_sampah.ID_Cabang_Bank JOIN status_klaim ON nota_gift.ID_Statusklaim=status_klaim.ID_Statusklaim 
   WHERE Nama_Gift='$_POST[ID_Hadiah]' AND nota_Gift.ID_Statusklaim='SK000001' AND Tanggal_Klaim BETWEEN '$dt1' AND'$dt2' GROUP BY hadiah.ID_Gift ORDER BY QTY DESC LIMIT 5");
	}
?>
			<?php $Total_Hadiah=0; ?>
			<?php $nomor=1; ?>
			<?php while($pecah=mysqli_fetch_array($ambil)){?>			
      		<tr>
       			<td><?php echo $nomor;?></td>
        		<td><?php echo $pecah['Nama_Bank'];?></td>  
        		<td><?php echo $pecah['QTY'];?></td>
        		<td><?php echo $pecah['Total_Transaksi_Gift'];?></td>
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
  <!--   Core   -->
  <script src="assets/js/plugins/jquery/dist/jquery.min.js"></script>
  <script src="assets/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!--   Optional JS   -->
  <script src="assets/js/plugins/chart.js/dist/Chart.min.js"></script>
  <script src="assets/js/plugins/chart.js/dist/Chart.extension.js"></script>
  <!--   Argon JS   -->
  <script src="assets/js/argon-dashboard.min.js?v=1.1.2"></script>
  <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
  <script>
    window.TrackJS &&
      TrackJS.install({
        token: "ee6fab19c5a04ac1a32a645abde4613a",
        application: "argon-dashboard-free"
      });
</script>