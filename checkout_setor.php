<?php
session_start();

$koneksi=new mysqli("localhost","root","","beautycyclebank");

if(!isset($_SESSION["akun"]))
{
	echo "<script>alert('Anda Harus Login Terlebih Dahulu');</script>";
	echo "<script>location='login.php';</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
	<title> beautycyclebank </title>
	<!-- Favicon -->
	<link href="assets/img/brand/ikonn.png" rel="icon" type="image/png">
	<link rel="stylesheet" href="admin/assets/css/bootstrap.css">
</head>
<body style="background-image:URL(Photo/bg4.jpg)">
<?php include'menu.php'?>
<section class="konten">
	<div class="container">
	<h1> Checkout Setor </h1>
		<hr>
		<table class= "table table-bordered" style="background-color:cornsilk;" >
			<thead>
				<tr>
					<th>No.</th>
					<th>Nama Sampah</th>
					<th>Sub Total</th>
					<th>Sub Penambahan Poin</th>
				</tr>
			</thead>
			<tbody>
				<?php $nomor=1;?>
            	<?php $Penambahan_Poin=0;?>
            	<?php $Total_Poin=0;?>
				<?php $Sub_Penambahan_Poin=0;?>
				<?php foreach ($_SESSION['keranjang_setor'] as $ID_Sampah=> $Sub_Total):?>
				<!-- menampilkan produk yg sedang diperulangkan brdsrkan ID_Sampah-->
				<?php
					$ambil=$koneksi->query("SELECT * FROM sampah inner join Jenis_Satuan on sampah.ID_Satuan=jenis_satuan.ID_Satuan WHERE ID_Sampah='$ID_Sampah'");
					$pecah=$ambil->fetch_assoc();
					$Sub_Penambahan_Poin=$pecah["Poin"]*$Sub_Total;
					$Penambahan_Poin+=$Sub_Penambahan_Poin;
				?>
				<tr>
					<td><?php echo $nomor;?></td>
					<td><?php echo $pecah["Nama_Sampah"];?></td>
					<td><?php echo $Sub_Total; ?> <?php echo $pecah["Jenis_Satuan"];?></ td>
					<td><?php echo number_format($Sub_Penambahan_Poin,0,',',',');?></td>
				</tr>
				<?php $nomor++;?>
				<?php endforeach ?>
			</tbody>
			<tfoot>
				<tr>
					<th colspan="3">Penambahan Poin</th>
					<th><?php echo number_format($Penambahan_Poin,1,',','.')?> Poin
				</tr>
			</tfoot>
		</table>
		<form method="post">	
			<div class="row">
				<div class="col-md-4">
					<label>Nama Lengkap</label>
					<div class="form-group" name="Nama_Lengkap">
						<input type="text" readonly value="<?php echo $_SESSION["akun"]["Nama_Lengkap"]?>" 
						class="form-control">
					</div>
				</div>
				<div class="col-md-4">
					<label>Cabang Bank</label>
					<select class="form-control" name="ID_Cabang_Bank">
						<option value="">--Pilih Cabang Bank--</option>
						<?php
						$ambil=$koneksi->query("SELECT * FROM cabang_bank_sampah  ");
						while($pecahh=$ambil->fetch_assoc()){
						?>
						<option value="<?php echo $pecahh['ID_Cabang_Bank']?>">
							<?php echo $pecahh['Nama_Bank']?>
						</option>
						<?php }?>
					</select>
				</div>
				<div class="col-md-4">
					<label>Nomor Handphone</label>
					<div class="form-group" name="Nomor_Handphone">
						<input type="text" readonly value="<?php echo $_SESSION["akun"]["No_Hp"]?>" class="form-control">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<label>Email</label>
					<div class="form-group" name="Email">
						<input type="text" readonly value="<?php echo $_SESSION["akun"]["Email"]?>" class="form-control">
					</div>
				</div>	
				<div class="col-md-4">
					<label>Alamat Rumah</label>
					<div class="form-group" name="Alamat_Rumah">
						<input type="text" readonly value="<?php echo $_SESSION["akun"]["Alamat_Rumah"]?>" class="form-control">
					</div>
				</div>
			</div>
			<br>				
			<div class="form-group">
				<label>Alamat Lengkap</label>	
				<textarea class="form-control" name="Alamat_Lengkap" placeholder="Masukkan Alamat Lengkap"></textarea>
			</div>				
				<button class="btn btn-primary" name="checkout_setor">Checkout</button>
		</form>
		<?php $ambil=$koneksi->query("SELECT*FROM nota_setor JOIN Akun ON nota_setor.ID_Akun=Akun.ID_Akun JOIN cabang_bank_sampah ON nota_setor.ID_Cabang_Bank=cabang_bank.ID_Cabang_Bank");?>			
		<?php
		if(isset($_POST["checkout_setor"]))
		{
			if((empty($_POST['ID_Cabang_Bank']) OR (empty($_POST['Alamat_Lengkap'])))):
				if((empty($_POST['ID_Cabang_Bank']) AND (empty($_POST['Alamat_Lengkap'])))):
					echo "<script>alert('Harap Semua Data Diisi');</script>";
					echo "<script>location='checkout_setor.php';</script>";
			endif;
			else:
			$ID_Member=$_SESSION["akun"]["ID_Akun"];
			$ID_Cabangbank=$_POST["ID_Cabang_Bank"];
			$ID_Statussetor="SS000002";
			$Tanggal_Penyetoran=date("Y-m-d");
			$tgl_update=date("Y-m-d");
			$sub_jumlah_stok=$Sub_Total;
			$Alamat_Lengkap=$_POST["Alamat_Lengkap"];
			$query=mysqli_query($koneksi, "SELECT max(ID_Nota_Setor) as kodeTerbesar FROM nota_setor");
			$data=mysqli_fetch_array($query);
			$idnotasetor=$data['kodeTerbesar'];
			$urutan=(int)substr($idnotasetor, 6, 6);
			$urutan++;
			$huruf="NS";
			$id_notasetor=$huruf.sprintf("%06s", $urutan);
			//$a="NS00";
			//$b=$Kode_Konsumen;
			//$ID_Notasetor=$a.$b.rand(100,999);
			//menyimpan data ke tabel nota_setor
			$koneksi->query("INSERT INTO nota_setor (ID_Nota_Setor, ID_Akun, Tanggal_Setor,  ID_Cabang_Bank, Total_Poin, ID_Statussetor) 
			VALUES ('$id_notasetor', '$ID_Member','$Tanggal_Penyetoran', '$ID_Cabangbank ','$Penambahan_Poin', '$ID_Statussetor')");
			//mendapatkan id Faktur barusan
			//$id_pembelian_barusan=$kode_auto_faktur;
			//$ambil=$koneksi->query("SELECT*FROM nota_setor");
			//$pecahh=$ambil->fetch_assoc();
			//$idnotasetorbaru=$pecahh['ID_Notasetor'];
			foreach($_SESSION["keranjang_setor"] as $ID_Sampah=>$Sub_Total)
			{
				$ambils=$koneksi->query("SELECT * FROM sampah WHERE ID_Sampah='$ID_Sampah'");
				$perproduk=$ambils->fetch_assoc();	
				$sub_jumlah_stok=$Sub_Total;
				$Sub_Penambahan_Poin=$perproduk['Poin']*$Sub_Total;
				$koneksi->query("INSERT INTO transaksi_setor ( ID_Nota_Setor,ID_Sampah,  Sub_Total, Sub_Poin) 
				VALUES ( '$id_notasetor','$ID_Sampah','$Sub_Total','$Sub_Penambahan_Poin')");
				$transaksi_daftar_stok_result = $koneksi->query("SELECT * FROM transaksi_daftar_stok WHERE ID_Sampah='$ID_Sampah' AND ID_Cabang_Bank='$ID_Cabangbank'");
				if ($transaksi_daftar_stok_result) 
				{
					if ($transaksi_daftar_stok_result->num_rows > 0) {

						$transaksi_daftar_stok = $transaksi_daftar_stok_result->fetch_assoc();
						$koneksi->query("UPDATE transaksi_daftar_stok SET Stok=Stok+'$Sub_Total', Tanggal_Update='$tgl_update' WHERE ID_Sampah='$ID_Sampah' AND ID_Cabang_Bank='$ID_Cabangbank'");
					} else {
						$koneksi->query("INSERT INTO transaksi_daftar_stok (ID_Cabang_Bank, ID_Sampah, Stok, Tanggal_Update) VALUES ('$ID_Cabangbank', '$ID_Sampah', '$Sub_Total', '$tgl_update')");
					}
				} 
				else 
				{
					echo "Error in query: " . $koneksi->error;
				}

			}	
			
				
			//mengosongkan keranjang_setor belanja
			unset($_SESSION['keranjang_setor']);
				echo "<script>alert('Penyetoran Sukses');</script>";
				echo "<script>location='nota_setor.php?id=$id_notasetor';</script>";	
		endif;
		}
		?>	
	</div>
</section>
</body>
</html>