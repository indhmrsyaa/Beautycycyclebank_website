<?php 
$cabang="";
$semuadata=array();
if(isset($_POST["proses"]))
{
	$cabang=$_POST['id_cabang_bank'];
   $ambil=$koneksi->query("SELECT * FROM transaksi_stok_hadiah 
   INNER JOIN hadiah ON transaksi_stok_hadiah.ID_Gift = hadiah.ID_Gift 
   INNER JOIN cabang_bank_sampah ON transaksi_stok_hadiah.ID_Cabang_Bank=cabang_bank_sampah.ID_Cabang_Bank");
	while($pecah = $ambil->fetch_assoc())
	{
		$semuadata[]=$pecah;
	}
}
?>

<div class="container-fluid px-4">
<center><h3> Laporan Stok Hadiah Berdasarkan cabang bank </h3>
</center><hr>
	<form method="post">
		<div class="row">
      		<div class="col-md-2">
        		<div class="form-group">
          			<label>Cabang Bank</label>
          			<select class="form-control" name="id_cabang_bank">
            			<option value="cabang_bank">--Pilih Cabang Bank--</option>
            			<?php $ambil=$koneksi->query("SELECT * FROM cabang_bank_sampah ");
                		while($percabangbank=$ambil->fetch_assoc()){?>
                		<option value="<?php echo $percabangbank['Nama_Bank'];?>"><?php echo $percabangbank['Nama_Bank'];?></option>
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
        <h4 class="mb-0">Tabel Laporan Stok Hadiah <?php echo $cabang?></td></h4>
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
			<th>Tanggal update</th>
        </tr>
    </thead>
    <tbody>

<?php
    //proses jika sudah klik tombol pencarian data
    if(isset($_POST['proses']))
    {

?>
<?php
   $ambil=mysqli_query($koneksi,"SELECT * FROM transaksi_stok_hadiah 
   INNER JOIN hadiah ON transaksi_stok_hadiah.ID_Gift = hadiah.ID_Gift 
   INNER JOIN cabang_bank_sampah ON transaksi_stok_hadiah.ID_Cabang_Bank=cabang_bank_sampah.ID_Cabang_Bank 
   WHERE Nama_Bank='$_POST[id_cabang_bank]' GROUP BY hadiah.ID_Gift ORDER BY Stok_Hadiah DESC LIMIT 5");
?>
			<?php $nomor=1; ?>
			<?php while($pecah=mysqli_fetch_array($ambil)){?>		
      		<tr>
       			<td><?php echo $nomor;?></td>
            	<td><?php echo $pecah['Nama_Gift'];?></td> 
        		<td><?php echo $pecah['Stok_Hadiah'];?></td>
				<td><?php echo date("l, d F Y",strtotime($pecah["Tanggal_Update"]));?></td> 
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
<?php
    }
    else
    {
        unset($_POST['proses']);
    }
?>