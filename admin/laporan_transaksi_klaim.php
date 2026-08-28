<?php 
$semuadata=array();
$tgl_mulai = "-";
$tgl_selesai = "-";
$cabangbank="";
if(isset($_POST["proses"]))
{
	$cabangbank=$_POST["id_cabang_bank"];
	$tgl_mulai=$_POST["tgl1"];
	$tgl_selesai=$_POST["tgl2"];
	$ambil= $koneksi->query("SELECT * FROM nota_gift JOIN akun ON nota_gift.ID_Akun = akun.ID_Akun WHERE nota_gift.ID_Statusklaim='SK000001' AND Tanggal_Klaim BETWEEN '$tgl_mulai' AND'$tgl_selesai'");
	while($pecah = $ambil->fetch_assoc())
	{
		$semuadata[]=$pecah;
	}
}
?>

<div class="container-fluid px-4">
<center><h3> Laporan Transaksi Klaim dari <?php echo $tgl_mulai?> hingga <?php echo $tgl_selesai?> <?php echo $cabangbank?></h3>
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
                    <label>Cabang Bank</label>
                    <select class="form-control" name="id_cabang_bank">
                        <option style="display: none;" value="cabang_bank_sampah">--Pilih Cabang Bank--</option>
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
				<div class="col-md-1">
      				<div class="form-group">
      					<label>&nbsp;</label> 
        				<a href="index.php?halaman=semualaporantransaksiklaim" class="btn btn-warning square-btn-adjust"><i class="fa fa-folder-open-o"></i> Lihat Semua Laporan
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
				untuk
				<b>
					<?php echo $cabangbank?>
				</b>
		</i>
<!-- End Navbar -->
<div class="card shadow" style="margin-top:22px">
    <div class="card-header border-4">        
        <h4 class="mb-0">Laporan Member Klaim</h4>
    </div>
<div class="card-body" style="margin-top:-1px">
<table id="datatablesSimple" class="table table-bordered border-dark" background="">
<thead>
    <a href="index.php?halaman=laporanmemberklaim" class="btn btn-success square-btn-adjust" style="margin-bottom:16px"><i class="fa fa-refresh"></i> Refresh </a> 
    <div style="float:right;" class="col-md-0">
        <input type="button" class="btn btn-success square-btn-adjust" style="margin-bottom:16px" class="fa fa-reply-all" value="Kembali" onclick="history.back(-1)"/>
    </div>
    <thead>
<tr>
    <th>No</th>
    <th>Nama Lengkap</th>
    <th>Jumlah Klaim Member</th>
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
	if(empty($dt1) || empty($dt2))
	{
	  //jika data tanggal kosong
?>
	<script language="JavaScript">
        alert('Tanggal Awal dan Tanggal Akhir Harap di Isi!');
        document.location='index.php?halaman=laporantransaksiklaim';
    </script>	

<?php
    }
    else
    {
?>
	<br>
<?php
	$ambil= mysqli_query ($koneksi,"SELECT *, count(akun.ID_Akun) AS jumlah_klaim_akun FROM nota_gift 
	INNER JOIN akun ON nota_gift.ID_akun = akun.ID_akun JOIN cabang_bank_sampah
            ON nota_gift.ID_Cabang_Bank=cabang_bank_sampah.ID_Cabang_Bank
	 WHERE nota_gift.ID_Statusklaim='SK000001' AND Nama_Bank='$cabangbank' AND Tanggal_Klaim BETWEEN '$dt1' AND'$dt2' GROUP BY nota_gift.ID_akun ORDER BY jumlah_klaim_akun DESC LIMIT 5");
	}
?>
        <?php
        $nomor=1;
        $jumlah_klaim_akun=0;
        while($pecah=mysqli_fetch_array($ambil)){?>
        <tr>        
            <td><?php echo $nomor; ?></td>
            <td><?php echo $pecah['Nama_Lengkap']; ?></td>  
            <td><?php echo $pecah['jumlah_klaim_akun']; ?></td>                
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
