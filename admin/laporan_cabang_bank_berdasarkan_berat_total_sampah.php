<?php 
$semuadata=array();
$idsampah="";
if(isset($_POST["proses"]))
{
   $idsampah=$_POST["ID_Sampah"];
   $ambil=$koneksi->query("SELECT *, sum(Sub_Total) AS Sub_Total, count(transaksi_setor.ID_Nota_Setor) AS total_transaksi_setor FROM transaksi_setor 
   INNER JOIN sampah ON transaksi_setor.ID_Sampah = sampah.ID_Sampah 
   JOIN jenis_satuan ON sampah.ID_Satuan = jenis_satuan.ID_Satuan
   INNER JOIN nota_setor ON transaksi_setor.ID_Nota_Setor=nota_setor.ID_Nota_Setor 
   JOIN cabang_bank_sampah ON nota_setor.ID_Cabang_Bank=cabang_bank_sampah.ID_Cabang_Bank 
   JOIN status_setor ON nota_setor.ID_Statussetor=status_setor.ID_Statussetor where Nama_Sampah='$idsampah'");
	while($pecah = $ambil->fetch_assoc())
	{
		$semuadata[]=$pecah;
	}
}
?>

<div class="container-fluid px-4">
<center><h3> Laporan Total Sampah </h3>
</center><hr>
	<form method="post">
	<div class="row">
      		<div class="col-md-2">
        		<div class="form-group">
          			<label> Nama Sampah</label>
          			<select class="form-control" name="ID_Sampah">
            			<option value="sampah">--Pilih Sampah--</option>
            			<?php $ambil=$koneksi->query("SELECT * FROM sampah ");
                		while($persampah=$ambil->fetch_assoc()){?>
                		<option value="<?php echo $persampah['Nama_Sampah'];?>"><?php echo $persampah['Nama_Sampah'];?></option>
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
        <h4 class="mb-0">Tabel Laporan Total sampah <?php echo $idsampah?> di setiap Cabang Bank</h4>
      </div>
  <div class="card-body" style="margin-top:-1px">
  <table id="datatablesSimple" class="table table-bordered border-dark" background="">
  <thead>
    <a href="index.php?halaman=laporancabangbankberdasarkanberattotalsampah" class="btn btn-success square-btn-adjust" style="margin-bottom:16px"><i class="fa fa-refresh"></i> Refresh </a> 
    <div style="float:right;" class="col-md-0">
    <input type="button" class="btn btn-success square-btn-adjust" style="margin-bottom:16px" class="fa fa-reply-all" value="Kembali" onclick="history.back(-1)"/>
    </div>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Cabang</th>
            <th>Total Sampah</th>
            <th>Total Transaksi Setor</th>
        </tr>
    </thead>
    <tbody>

<?php
    //proses jika sudah klik tombol pencarian data
    if(isset($_POST['proses']))
    {
	    //menangkap nilai form

	    $IDSampah=$_POST['ID_Sampah'];
	if(empty($IDSampah))
	{
	  //jika data tanggal kosong
    ?>
	<script language="JavaScript">
        alert('kategori sampah harus diisi!');
        document.location='index.php?halaman=laporancabangbankberdasarkanberattotalsampah';
    </script>	
     <?php
    }
    else
    {
    ?>
	<br>
    <?php
   $ambil=mysqli_query($koneksi,"SELECT *, sum(Sub_Total) AS Sub_Total, count(transaksi_setor.ID_Nota_Setor) AS total_transaksi_setor FROM transaksi_setor 
   INNER JOIN sampah ON transaksi_setor.ID_Sampah = sampah.ID_Sampah JOIN jenis_satuan ON sampah.ID_Satuan = jenis_satuan.ID_Satuan
   INNER JOIN nota_setor ON transaksi_setor.ID_Nota_Setor=nota_setor.ID_Nota_Setor JOIN cabang_bank_sampah ON nota_setor.ID_Cabang_Bank=cabang_bank_sampah.ID_Cabang_Bank JOIN status_setor ON nota_setor.ID_Statussetor=status_setor.ID_Statussetor 
   WHERE Nama_Sampah='$IDSampah' AND nota_setor.ID_Statussetor='SS000001'
   GROUP BY cabang_bank_sampah.ID_Cabang_Bank ORDER BY Sub_Total DESC LIMIT 5");
	}
    ?>
			<?php $Total_Berat_Per_Periode=0; ?>
			<?php $nomor=1; ?>
			<?php while($pecah=mysqli_fetch_array($ambil)){?>			
      		<tr>
       			<td><?php echo $nomor;?></td>
        		<td><?php echo $pecah['Nama_Bank'];?></td>  
        		<td><?php echo $pecah['Sub_Total'];?> <?php echo $pecah['Jenis_Satuan'];?></td>
        		<td><?php echo $pecah['total_transaksi_setor'];?></td>
      		</tr>
      		<?php $Total_Berat_Per_Periode+=$pecah['Sub_Total'];?> 
      		<?php $nomor++ ?>
      		<?php } ?>
      		<tr>
        		<td colspan="2"><center> Total Berat dan transaksi Per Periode </td>
        		<td><?php echo number_format($Total_Berat_Per_Periode);?>

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
